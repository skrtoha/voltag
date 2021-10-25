<?php

namespace app\modules\admin\controllers;

use app\models\Brend;
use app\models\Item;
use app\models\OrderValue;
use Yii;
use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUpdate($id){
        $order = $this->findModel($id);

        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            return $this->redirect(['view', 'id' => $order->id]);
        }
    
        $query = OrderValue::find()
            ->from(['ov' => OrderValue::tableName()])
            ->select([
                'ov.*',
                'i.title',
                'i.brend_id',
                'brend' => 'b.title',
                'i.article'
            ])
            ->where(['order_id' => $order->id])
            ->leftJoin(['i' => Item::tableName()], "i.id = ov.item_id")
            ->leftJoin(['b' => Brend::tableName()], "b.id = i.brend_id");
        $orderValueDataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        
        return $this->render('update', [
            'order' => $order,
            'orderValueDataProvider' => $orderValueDataProvider
        ]);
    }

    /**
     * Deletes an existing Order model.
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

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
