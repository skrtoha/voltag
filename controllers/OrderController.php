<?php
namespace app\controllers;
use app\models\File;
use app\models\Item;
use app\models\ItemFile;

session_start();

class OrderController extends CommonController{
    public function actionIndex(){
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