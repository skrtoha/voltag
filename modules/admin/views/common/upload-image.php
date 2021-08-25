<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
/* @var string $title */
/* @var $model \app\models\UploadForm */

$this->registerJsFile('/assets/admin/js/upload-file.js', ['depends' => 'app\assets\AdminAsset']);
\app\assets\UploadFormAsset::register($this);
?>

<div class="hidden uploadFileForm">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>
    
    <?php ActiveForm::end() ?>
</div>

