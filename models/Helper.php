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
    
    public static function randomFileName($extension = false){
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
}
