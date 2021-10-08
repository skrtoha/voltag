<?php
namespace app\models;
session_start();
use Yii;

class Helper{
    public static function debug($ar, $isOnlyToConsole = true) {
        if (!$isOnlyToConsole){
            echo '<pre>';
            print_r($ar);
            echo '</pre>';
        }
        echo '<script>console.log('.json_encode($ar).');</script>';
    }
    
    public static function randomFileName($extension = false){
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
    
    public static  function getQueryParams(){
        $request = Yii::$app->request;
        $params = $request->get();
        $rawBody = json_decode($request->rawBody, true);
        if (is_array($rawBody)){
            $params = array_merge($params, $rawBody);
        }
        if (!empty($request->post())){
            $params = array_merge($params, $request->post());
        }
        return $params;
    }
    
    public static function checkMethod($method){
        if (Yii::$app->request->method != strtoupper($method)) return false;
        return true;
    }
    
    public static function getStockCommonAmountItems(){
        if (!isset($_SESSION['stock'])) return 0;
        $count = 0;
        foreach($_SESSION['stock'] as $value) $count += $value['count'];
        return $count;
    }
}
