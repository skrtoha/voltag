<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $brendList array*/
/* @var $this yii\web\View */
/* @var $model app\models\Cross */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cross-form ">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'brend_id')->dropDownList($brendList) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
