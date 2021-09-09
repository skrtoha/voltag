<?php

namespace app\modules\admin\controllers;

use app\models\Brend;
use app\models\Car;
use app\models\Category;
use app\models\Cross;
use app\models\FilterValue;
use app\models\ItemCar;
use app\models\ItemComplect;
use app\models\ItemCross;
use app\models\ItemValue;
use app\models\UploadForm;
use Yii;
use app\models\Item;
use app\models\ItemSearch;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends CommonController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'brendList' => Brend::getList(),
            'categoryList' => Category::getCommonList()
        ]);
    }

    /**
     * Displays a single Item model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $temp = FilterValue::getList(['item_id' => $id]);
        $itemValues = [];
        foreach($temp as $row){
            if (!isset($row['value'])) continue;
            if ($row['enum']){
                foreach($row['values'] as $r){
                    if (!$r['selected']) continue;
                    $itemValues[$row['title']] = $r['title'];
                }
            } else $itemValues[$row['title']] = $row['value'];
        }
        
        $query = ItemCross::find()
            ->from(['ic' => ItemCross::tableName()])
            ->select([
                'cross' => 'c.title',
                'brend' => 'b.title'
            ])
            ->leftJoin(['c' => Cross::tableName()], "c.id = ic.cross_id")
            ->leftJoin(['b' => Brend::tableName()], "b.id = c.brend_id")
            ->where(['ic.item_id' => $id]);
        $itemCrossDataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        $itemCarDataProvider = new ActiveDataProvider([
            'query' => ItemCar::getList(['item_id' => $id])
        ]);
        
        return $this->render('view', [
            'item' => $this->findItem($id),
            'itemValues' => $itemValues,
            'itemCrossDataProvider' => $itemCrossDataProvider,
            'itemCarDataProvider' => $itemCarDataProvider
        ]);
    }
    
    private function saveItem($data){
        if ($data['id']) $model = $this->findModel($data['id']);
        else $model = new Item();
        $model->attributes = $data;
        if ($model->save()) return $model->id;
        return false;
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->post('Item')){
            $item_id = $this->saveItem(Yii::$app->request->post('Item'));
        }
    
        if (!empty(Yii::$app->request->post('ItemCross'))){
            foreach(Yii::$app->request->post('ItemCross') as $cross_id){
                if (!$cross_id) continue;
                $itemCross = new ItemCross();
                $itemCross->item_id = $item_id;
                $itemCross->cross_id = $cross_id;
                $itemCross->save();
            }
        }
    
        if (!empty(Yii::$app->request->post('ItemCar'))){
            foreach(Yii::$app->request->post('ItemCar') as $car_id){
                if (!$car_id) continue;
                $itemCar = new ItemCar();
                $itemCar->item_id = $item_id;
                $itemCar->car_id = $car_id;
                $itemCar->save();
            }
        }
    
        if ($item_id) return $this->redirect(['update', 'id' => $item_id]);
        
        $model = new Item();
        return $this->render('create', [
            'model' => $model,
            'uploadForm' => new UploadForm(),
            'categoryList' => Category::getCommonList(),
            'brendList' => Brend::getList()
        ]);
    }
    
    public function actionDeleteComplect($id, $item_id_complect){
        ItemComplect::deleteAll([
            'item_id' => $id,
            'item_id_complect' => $item_id_complect
        ]);
        $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $postData = Yii::$app->request->post('Item');
        if ($postData){
            $postData['id'] = $id;
            $this->saveItem($postData);
        }
    
        if ($postData) ItemValue::deleteAll(['item_id' => $id]);
        if (!empty(Yii::$app->request->post('ItemValue'))){
            foreach(Yii::$app->request->post('ItemValue') as $filter_id => $value){
                if (!$value['value']) continue;
                $itemValue = new ItemValue();
                $itemValue->item_id = $id;
                $itemValue->filter_id = $filter_id;
                if ($value['enum']) $itemValue->filter_value_id = $value['value'];
                else $itemValue->value = $value['value'];
                $itemValue->save();
            }
        }
    
        if ($postData) ItemCross::deleteAll(['item_id' => $id]);
        if (!empty(Yii::$app->request->post('ItemCross'))){
            foreach(Yii::$app->request->post('ItemCross') as $cross_id){
                if (!$cross_id) continue;
                $itemCross = new ItemCross();
                $itemCross->item_id = $id;
                $itemCross->cross_id = $cross_id;
                $itemCross->save();
            }
        }
    
        if ($postData) ItemComplect::deleteAll(['item_id' => $id]);
        if (!empty(Yii::$app->request->post('ItemComplect'))){
            foreach(Yii::$app->request->post('ItemComplect') as $item_id){
                if (!$item_id) continue;
                $itemComplect = new ItemComplect();
                $itemComplect->item_id = $id;
                $itemComplect->item_id_complect = $item_id;
                $itemComplect->save();
            }
        }
        
        $itemComplectDataProvider = new ActiveDataProvider([
            'query' => Item::getQuery()
                ->addSelect(['item_id_complect'])
                ->leftJoin(['ic' => ItemComplect::tableName()], "ic.item_id_complect = i.id")
                ->where(['ic.item_id' => $id])
        ]);
    
        $model = $this->findModel($id);
        return $this->render('update', [
            'item_id' => $id,
            'model' => $model,
            'filterValues' => FilterValue::getList([
                'category_id' => $model->category_id,
                'item_id' => $id
            ]),
            'crossList' => Cross::find()->all(),
            'itemCrossList' => ItemCross::find()->where(['item_id' => $id])->all(),
            'itemComplectDataProvider' => $itemComplectDataProvider,
            'uploadForm' => new UploadForm(),
            'brendList' => Brend::getList(),
            'carList' => Car::find()->all(),
            'itemCarList' => ItemCar::getList(['item_id' => $id])->all(),
            'categoryList' => array_merge([0 => 'не указана'], Category::getCommonList())
        ]);
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    protected function findModel($id){
        $model = Item::find()->with('itemValue')->where(['id' => $id])->one();
        
        if ($model) return $model;
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return array
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findItem($id)
    {
        $array = Item::getQuery()->where(['i.id' => $id])->asArray()->one();
        if ($array !== null) {
            return $array;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
