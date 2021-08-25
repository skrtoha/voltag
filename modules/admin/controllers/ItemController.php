<?php

namespace app\modules\admin\controllers;

use app\models\Brend;
use app\models\FilterValue;
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
            'brendList' => Brend::getList()
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
        return $this->render('view', [
            'model' => $this->findItem($id)
        ]);
    }
    
    

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'uploadForm' => new UploadForm(),
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
        $model = $this->findModel($id);
        $itemValues = ItemValue::getQuery(['item_id' => $id])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('update', [
            'model' => $model,
            'filterValues' => FilterValue::getList([
                'filter_id' => array_column($itemValues, 'filter_id')
            ]),
            'itemValues' => $itemValues,
            'uploadForm' => new UploadForm(),
            'brendList' => Brend::getList()
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
