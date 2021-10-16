<?php
namespace app\assets;
class OrderAsset extends \yii\web\AssetBundle
{
    public $js = [
        'assets/front/order.js'
    ];
    public $css = [
        'assets/front/css/order.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}