<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Item;
use yii\data\ActiveDataProvider;

class CatalogController extends CommonController{
    public function actionIndex(){
        $sort = Yii::$app->getRequest()->get('sort');
        $query = Item::getQueryMeta();
        
        if ($sort) $query->orderBy("i.price $sort");

        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => $query
            ]),
            'sort' => $sort,
            'treeCategory' => Category::getTree()
        ]);
    }
    
    public function actionCategory(){
        $transliteration = Yii::$app->getRequest()->get('transliteration');
        $sort = Yii::$app->getRequest()->get('sort');
        $category = Category::find()->where(['transliteration' => $transliteration])->one();
        $query = Item::getQueryMeta()->andWhere(['i.category_id' => $category->id]);
        
        if ($sort) $query->orderBy("i.price $sort");
        
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => $query
            ]),
            'sort' => $sort,
            'category' => $category,
            'treeCategory' => Category::getTree($transliteration)
        ]);
    }
}