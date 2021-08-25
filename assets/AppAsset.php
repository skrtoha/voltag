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
        'assets/front/bootstrap/css/bootstrap.css',
        'assets/front/style.css',
        'assets/front/owl-carousel/owl.carousel.css',
        'assets/front/owl-carousel/owl.theme.css',
        'assets/front/slitslider/css/style.css',
        'assets/front/slitslider/css/custom.css',
        'assets/front/bootstrap/css/bootstrap.css',
        'assets/front/css/site.css',
        'assets/front/icomoon/icomoon.eot',
        'assets/front/icomoon/icomoon.svg',
        'assets/front/icomoon/icomoon.ttf',
        'assets/front/icomoon/icomoon.woff'
    ];
    public $js = [
        'assets/front/bootstrap/js/bootstrap.js',
        'assets/front/script.js',
        'assets/front/owl-carousel/owl.carousel.js',
        'assets/front/slitslider/js/modernizr.custom.79639.js',
        'assets/front/slitslider/js/jquery.ba-cond.min.js',
        'assets/front/slitslider/js/jquery.slitslider.js',
        'assets/front/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
