<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Text;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * TextController implements the CRUD actions for Text model.
 */
class BeforeFooterController extends Controller{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = Text::find()->where(['type' => 'before-footer'])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
