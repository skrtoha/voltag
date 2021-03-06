<?php

namespace app\modules\admin\controllers;

use app\models\Car;
use app\models\Cross;
use app\models\Item;

class AjaxController extends \app\controllers\CommonController{
    public function actionAddCrossItem(){
        $crossList = Cross::find()
            ->where(['NOT IN', 'id', json_decode($_GET['selected'], false)])
            ->all();
        return $this->renderPartial('/common/cross-item', [
            'crossList' => $crossList
        ]);
    }
    public function actionAddCarItem(){
        $carList = Car::find()
            ->where(['NOT IN', 'id', json_decode($_GET['selected'], false)])
            ->all();
        return $this->renderPartial('/common/car-item', [
            'carList' => $carList
        ]);
    }
    public function actionAddComplectItem(){
        $itemList = Item::getQuery()
            ->where(['NOT IN', 'i.id', json_decode($_GET['selected'], false)])
            ->all();
        return $this->renderPartial('/common/complect-item', [
            'itemList' => $itemList
        ]);
    }
    public function actionAddAggregateItem(){
        $itemList = Item::getQuery()
            ->where(['NOT IN', 'i.id', json_decode($_GET['selected'], false)])
            ->all();
        return $this->renderPartial('/common/aggregate-item', [
            'itemList' => $itemList
        ]);
    }
    
}