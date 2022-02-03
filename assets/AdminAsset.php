<?php
namespace app\assets;
use yii\web\AssetBundle;

class AdminAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/admin_assets/css/plugins/font-awesome.min.css',
        '/admin_assets/css/plugins/simple-line-icons.css',
        '/admin_assets/css/plugins/animate.min.css',
        '/admin_assets/css/plugins/fullcalendar.min.css',
        '/admin_assets/css/style.css',
    ];
    public $js = [
        '/admin_assets/js/jquery.ui.min.js',
        '/admin_assets/js/bootstrap.min.js',
        '/admin_assets/js/plugins/moment.min.js',
        '/admin_assets/js/plugins/fullcalendar.min.js',
        '/admin_assets/js/plugins/jquery.nicescroll.js',
        '/admin_assets/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}