<?php
namespace app\modules\admin\controllers;

class DefaultController extends CommonController
{
    public function actionIndex(){
        return $this->render('index');
    }
}
