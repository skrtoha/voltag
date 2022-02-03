<?php
namespace app\assets;
use yii\web\AssetBundle;

class CategoryAsset extends AssetBundle
{
    public $js = [
        '/bootstrap-treeview-1.2.0/bootstrap-treeview.js',
        '/front/category.js',
        '/ion-rangeslider/js/ion.rangeSlider.min.js'
    ];
    public $css = [
        '/ion-rangeslider/css/ion.rangeSlider.min.css',
        '/front/css/category.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}