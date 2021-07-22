<?php

namespace app\modules\admin\controllers;

use app\controllers\CommonController;

class DefaultController extends CommonController
{
    public function actionIndex(){
        return $this->render('index');
    }
}
