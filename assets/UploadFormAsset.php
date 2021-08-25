<?php
namespace app\assets;
class UploadFormAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@app/node_modules';
    public $css = [
        'cropperjs/dist/cropper.css',
    ];
    public $js = [
        'cropperjs/dist/cropper.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}