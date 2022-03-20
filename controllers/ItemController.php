<?php

namespace app\controllers;

use app\models\Item;

class ItemController extends CommonController{
    public function actionIndex(){
        $id = \Yii::$app->getRequest()->get('id');
        $item = Item::getQueryMeta()
            ->with('itemCross.cross.brend')
            ->andWhere(['i.id' => $id])
            ->asArray()
            ->one();
        return $this->render('index', [
           'item' => $item
        ]);
    }
}