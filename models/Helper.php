<?php

namespace app\models;

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
}
