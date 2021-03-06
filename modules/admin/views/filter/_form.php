<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var array $categoryList */
/* @var $this yii\web\View */
/* @var $model app\models\Filter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'signment')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'measure_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categoryList) ?>
    
    <?= $form->field($model, 'enum')->checkbox()?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
