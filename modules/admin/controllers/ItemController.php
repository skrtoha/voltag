<?php

namespace app\modules\admin\controllers;

use app\models\Brend;
use app\models\Category;
use app\models\Cross;
use app\models\FilterValue;
use app\models\ItemCross;
use app\models\ItemValue;
use app\models\UploadForm;
use Yii;
use app\models\Item;
use app\models\ItemSearch;
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
        return $this->render('view', [
            'item' => $this->findItem($id),
            'itemValues' => $itemValues
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
            if ($item_id) return $this->redirect(['update', 'id' => $item_id]);
        }
        
        $model = new Item();
        return $this->render('create', [
            'model' => $model,
            'uploadForm' => new UploadForm(),
            'categoryList' => Category::getCommonList(),
            'brendList' => Brend::getList()
        ]);
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
    
        ItemValue::deleteAll(['item_id' => $id]);
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
    
        ItemCross::deleteAll(['item_id' => $id]);
        if (!empty(Yii::$app->request->post('ItemCross'))){
            ItemCross::deleteAll(['item_id' => $id]);
            foreach(Yii::$app->request->post('ItemCross') as $cross_id){
                if (!$cross_id) continue;
                $itemCross = new ItemCross();
                $itemCross->item_id = $id;
                $itemCross->cross_id = $cross_id;
                $itemCross->save();
            }
        }
    
        $model = $this->findModel($id);
        return $this->render('update', [
            'model' => $model,
            'filterValues' => FilterValue::getList([
                'category_id' => $model->category_id,
                'item_id' => $id
            ]),
            'crossList' => Cross::find()->all(),
            'itemCrossList' => ItemCross::find()->where(['item_id' => $id])->all(),
            'uploadForm' => new UploadForm(),
            'brendList' => Brend::getList(),
            'categoryList' => Category::getCommonList()
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
