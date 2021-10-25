<?php
namespace app\controllers;
use app\models\File;
use app\models\Item;
use app\models\ItemFile;
use app\models\Order;
use app\models\OrderValue;

session_start();

class OrderController extends CommonController{
    public function actionIndex(){
        $post = \Yii::$app->request->post();
        if (!empty($post)){
            $order = new Order();
            $order->name = $post['name'];
            $order->email = $post['email'];
            $order->phone = $post['phone'];
            $order->delivery = $post['delivery'];
            $order->addressee = $post['addressee'];
            $order->save();
            
            $order_id = \Yii::$app->db->getLastInsertID();
            
            for($i = 0; $i < count($post['items']); $i++){
                $orderValue = new OrderValue();
                $orderValue->order_id = $order_id;
                $orderValue->item_id = $post['item_id'][$i];
                $orderValue->price = $post['price'][$i];
                $orderValue->quan = $post['quan'][$i];
                $orderValue->save();
            }
        }
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
    
}