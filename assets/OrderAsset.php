<?php
namespace app\assets;
class OrderAsset extends \yii\web\AssetBundle
{
    public $js = [
        '/front/order.js'
    ];
    public $css = [
        '/front/css/order.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}