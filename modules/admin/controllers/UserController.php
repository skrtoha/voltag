<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class UserController extends CommonController{
    public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin/index');
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('/admin/item');
        }
        
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }
}