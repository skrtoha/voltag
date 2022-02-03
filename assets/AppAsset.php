<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/front/bootstrap/css/bootstrap.css',
        '/front/style.css',
        '/front/owl-carousel/owl.carousel.css',
        '/front/owl-carousel/owl.theme.css',
        '/front/slitslider/css/style.css',
        '/front/slitslider/css/custom.css',
        '/front/bootstrap/css/bootstrap.css',
        '/front/css/site.css',
        '/front/icomoon/icomoon.eot',
        '/front/icomoon/icomoon.svg',
        '/front/icomoon/icomoon.ttf',
        '/front/icomoon/icomoon.woff'
    ];
    public $js = [
        '/front/bootstrap/js/bootstrap.js',
        '/front/script.js',
        '/front/owl-carousel/owl.carousel.js',
        '/front/slitslider/js/modernizr.custom.79639.js',
        '/front/slitslider/js/jquery.ba-cond.min.js',
        '/front/slitslider/js/jquery.slitslider.js',
        '/front/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
