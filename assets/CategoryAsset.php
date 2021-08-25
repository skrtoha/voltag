<?php
namespace app\assets;
class CategoryAsset extends \yii\web\AssetBundle
{
    public $js = [
        'assets/bootstrap-treeview-1.2.0/bootstrap-treeview.js',
        'assets/front/category.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}