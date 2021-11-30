<?php

namespace app\controllers;

use app\models\Car;
use app\models\Cross;
use app\models\FilterValue;
use app\models\ItemCar;
use app\models\ItemCross;
use app\models\ItemValue;
use Yii;
use app\models\Category;
use app\models\Item;
use yii\data\ActiveDataProvider;

class CatalogController extends CommonController{
    public function actionIndex(){
        $sort = Yii::$app->getRequest()->get('sort');
        $query = Item::getQueryMeta();
        if (isset($_GET['search']) && $_GET['search']){
            $query->orWhere(['LIKE', 'i.title', $_GET['search']]);
            $query->orWhere(['i.article' => $_GET['search']]);
    
            $query->leftJoin(['ic' => ItemCross::tableName()], 'ic.item_id = i.id');
            $query->leftJoin(['cr' => Cross::tableName()], 'cr.id = ic.cross_id');
            $query->orWhere(['LIKE', 'cr.title', $_GET['search']]);
            
            $query->leftJoin(['icar' => ItemCar::tableName()], "icar.item_id = i.id");
            $query->leftJoin(['car' => Car::tableName()], "car.id = icar.car_id");
            $query->orWhere(['like', 'car.title', $_GET['search']]);
            
            $query->groupBy('i.id');
        }
        
        if ($sort) $query->orderBy("i.price $sort");

        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => $query
            ]),
            'sort' => $sort,
            'filter' => FilterValue::getList(),
            'treeCategory' => Category::getTree()
        ]);
    }
    
    public function actionCategory(){
        $transliteration = Yii::$app->getRequest()->get('transliteration');
        $sort = Yii::$app->getRequest()->get('sort');
        $category = Category::find()->where(['transliteration' => $transliteration])->one();
        $query = Item::getQueryMeta()->andWhere(['i.category_id' => $category->id]);
        
        if (isset($_GET['filter'])){
            $query->leftJoin(['iv' => ItemValue::tableName()], "iv.item_id = i.id");
            $query->addSelect(['cnt' => 'COUNT(*)']);
            $or = ['OR'];
            foreach($_GET['filter'] as $filter_id => $value){
                $array = explode(';', $value);
                $or[] = "iv.filter_id = {$filter_id} and iv.value BETWEEN {$array[0]} AND {$array[1]}";
            }
            $query->andWhere($or);
            $query->andHaving(['>=', 'cnt', count($_GET['filter'])]);
            $query->addGroupBy('iv.item_id');
        }
        
        if ($sort) $query->orderBy("i.price $sort");
        
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => $query
            ]),
            'query' => empty(!$_GET['filter']) ? $_GET['filter'] : [],
            'sort' => $sort,
            'category' => $category,
            'filter' => FilterValue::getList(['category_id' => $category->id]),
            'filterValues' => FilterValue::getFilterValues($category->id),
            'treeCategory' => Category::getTree($transliteration)
        ]);
    }
}