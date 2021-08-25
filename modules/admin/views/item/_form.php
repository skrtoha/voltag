<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $brendList */
/* @var $this yii\web\View */
/* @var \app\models\UploadForm $uploadForm */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brend_id')->dropDownList($brendList) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?=Html::button('Загрузить изображение', ['class' => 'uploadFile'])?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?=$this->render('/common/upload-image', ['model' => $uploadForm]);
