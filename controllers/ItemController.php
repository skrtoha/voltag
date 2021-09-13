<?php

namespace app\controllers;

use app\models\Item;

class ItemController extends CommonController{
    public function actionIndex(){
        $id = \Yii::$app->getRequest()->get('id');
        $item = Item::getQueryMeta()->andWhere(['i.id' => $id])->one();
        return $this->render('index', [
           'item' => $item
        ]);
    }
}