<?php
namespace app\assets;
class CategoryAsset extends \yii\web\AssetBundle
{
    public $js = [
        'assets/bootstrap-treeview-1.2.0/bootstrap-treeview.js',
        'assets/front/category.js',
        'assets/ion-rangeslider/js/ion.rangeSlider.min.js'
    ];
    public $css = [
        'assets/ion-rangeslider/css/ion.rangeSlider.min.css',
        'assets/front/css/category.css'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}