<?php
namespace app\controllers;
use app\models\File;
use app\models\Item;
use app\models\ItemFile;
use app\models\Order;
use app\models\OrderValue;
use yii\web\Controller;

session_start();

class OrderController extends Controller {
    public function actionIndex(){
        $post = \Yii::$app->request->post();
        if (!empty($post)){
            $order = new Order();
            $order->name = $post['name'];
            $order->email = $post['email'];
            $order->phone = $post['phone'];
            $order->delivery = $post['delivery'];
            $order->addressee = $post['addressee'];
            $order->pay_type = $post['pay_type'];
            $order->comment = $post['comment'];
            $order->save();
            
            $order_id = \Yii::$app->db->getLastInsertID();
            
            for($i = 0; $i < count($post['items']); $i++){
                $orderValue = new OrderValue();
                $orderValue->order_id = $order_id;
                $orderValue->item_id = $post['items']['item_id'][$i];
                $orderValue->price = $post['items']['price'][$i];
                $orderValue->quan = $post['items']['quan'][$i];
                $orderValue->save();
            }
            unset($_SESSION['stock']);
            return $this->redirect('order/success');
        }
        if (!$_SESSION['stock']) return $this->render('index');
        $query = Item::getQuery()
            ->leftJoin(['if' => ItemFile::tableName()], "if.item_id = i.id")
            ->leftJoin(['f' => File::tableName()], "f.id = if.file_id")
            ->addSelect([
                'file_path' => "CONCAT(f.path, f.title)"
            ]);
        $items = $query->where(['i.id' => array_keys($_SESSION['stock'])])->asArray()->all();
        foreach($items as & $item){
            $item['quan'] = $_SESSION['stock'][$item['id']]['count'];
        }
        return $this->render('index', ['items' => $items]);
    }
    
    public function actionSuccess(){
        return $this->render('success');
    }
}