<?php
namespace app\modules\admin\controllers;

use Yii;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\UploadedFile;

class CommonController extends Controller{
    public function actionUpload()
    {
        $model = new UploadForm();
        
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }
    }
}