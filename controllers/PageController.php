<?php

namespace app\controllers;

use app\models\Text;

class PageController extends CommonController{
    public function actionIndex($alias){
        $page = Text::find()->where(['alias' => $alias])->one();
        return $this->render('index', [
            'page' => $page
        ]);
    }
}