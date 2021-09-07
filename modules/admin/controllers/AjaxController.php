<?php

namespace app\modules\admin\controllers;

use app\models\Cross;

class AjaxController extends \app\controllers\CommonController{
    public function actionAddCrossItem(){
        $crossList = Cross::find()
            ->where(['NOT IN', 'id', json_decode($_GET['selectedCross'], false)])
            ->all();
        return $this->renderPartial('/common/cross-item', [
            'crossList' => $crossList
        ]);
    }
    
}