<?php
namespace app\assets;
class MagnificPopupAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/node_modules';
    public $css = [
        'magnific-popup/dist/magnific-popup.css'
    ];
    public $js = [
        'magnific-popup/dist/jquery.magnific-popup.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}