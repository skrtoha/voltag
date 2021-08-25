<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Item;
use yii\data\ActiveDataProvider;

class CatalogController extends CommonController{
    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => Item::getQuery()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'treeCategory' => Category::getTree()
        ]);
    }
    
    public function actionCategory(){
        $transliteration = Yii::$app->getRequest()->get('transliteration');
        $category = Category::find()->where(['transliteration' => $transliteration])->one();
        return $this->render('category', [
            'category' => $category,
            'treeCategory' => Category::getTree($transliteration)
        ]);
    }
    
}