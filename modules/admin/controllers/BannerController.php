<?php

namespace app\modules\admin\controllers;

use app\models\Banner;
use app\models\File;
use app\models\UploadForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class BannerController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Banner::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    private function saveBanner($data){
        if ($data['id']) $model = $this->findModel($data['id']);
        else $model = new Banner();
        $model->attributes = $data;
        if ($model->save()) return $model->id;
        return false;
    }
    
    private function saveFile($type){
        $uploadForm = new UploadForm();
        
        $uploadForm->imageFile = UploadedFile::getInstances($uploadForm, 'imageFile');
        if ($uploadForm->upload($type)){
            foreach($uploadForm->imageFile as $fileObject){
                $file = new File();
                $file->path = "/$type/";
                $file->title = $fileObject->getBaseName().'.'.$fileObject->getExtension();
                $file->save();
                return \Yii::$app->db->getLastInsertID();
            }
        }
        return false;
    }

    /**
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(){
        $bannerObject = new Banner();
        
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post('Banner');
            $bannerObject->file_id = $this->saveFile('banners');
            $bannerObject->title = $post['title'];
            $bannerObject->content = $post['content'];
            $bannerObject->save();
            return $this->redirect(['index']);
        }
        

        return $this->render('create', [
            'model' => $bannerObject,
            'uploadForm' => new UploadForm()
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $file_id = $this->saveFile('banners');
            if ($file_id) $model->file_id = $file_id;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'uploadForm' => new UploadForm()
        ]);
    }
    
    public function actionImageDelete($banner_id, $file_id){
        $fileInfo = File::find()->where(['id' => $file_id])->one();
        unlink(Yii::$app->params['imgPath'].$fileInfo['path'].$fileInfo['title']);
        File::deleteAll(['id' => $file_id]);
        Banner::updateAll(['file_id' => null], ['id' => $banner_id]);
        return $this->redirect(['update', 'id' => $banner_id]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Banner::find()->with('file')->where(['id' => $id])->one();
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
