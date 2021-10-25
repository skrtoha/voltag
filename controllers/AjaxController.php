<?php
namespace app\controllers;

session_start();

use Yii;
use app\models\Helper;
use app\models\Item;
use yii\base\Controller;
use yii\web\Response;

class AjaxController extends Controller{
    protected $queryParams;
    public function init(){
        $this->queryParams = Helper::getQueryParams();
    }
    
    public function beforeAction($action){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
    
    public function actionAddToStock(){
        $query = Item::getQuery();
        $query->andWhere(['i.id' => $this->queryParams['item_id']]);
        $itemInfo = $query->asArray()->one();
        
        $s = & $_SESSION['stock'][$itemInfo['id']];
        if (isset($s)) $s['count'] += 1;
        else{
            $_SESSION['stock'][$itemInfo['id']]['count'] = 1;
            $_SESSION['stock'][$itemInfo['id']]['itemInfo'] = $itemInfo;
        }
        
        return Helper::getStockCommonAmountItems();
    }
    
    public function actionGetBasketContent(){
        return $_SESSION['stock'];
    }
    
    public function actionChangeBasket(){
        if ($_GET['currentQuan'] == 0){
            unset($_SESSION['stock'][$_GET['item_id']]);
            return;
        }
        $_SESSION['stock'][$_GET['item_id']]['count'] = $_GET['currentQuan'];
    }
}