<?php
namespace app\assets;
class AdminAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/admin/css/plugins/font-awesome.min.css',
        'assets/admin/css/plugins/simple-line-icons.css',
        'assets/admin/css/plugins/animate.min.css',
        'assets/admin/css/plugins/fullcalendar.min.css',
        'assets/admin/css/style.css',
    ];
    public $js = [
        'assets/admin/js/jquery.ui.min.js',
        'assets/admin/js/bootstrap.min.js',
        'assets/admin/js/plugins/moment.min.js',
        'assets/admin/js/plugins/fullcalendar.min.js',
        'assets/admin/js/plugins/jquery.nicescroll.js',
        'assets/admin/js/plugins/jquery.vmap.min.js',
        'assets/admin/js/plugins/maps/jquery.vmap.world.js',
        'assets/admin/js/plugins/jquery.vmap.sampledata.js',
        'assets/admin/js/plugins/chart.min.js',
//        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
//        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        'assets/admin/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}