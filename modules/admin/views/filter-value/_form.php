<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var array $filterList */
/* @var array $categoryList */
/* @var $this yii\web\View */
/* @var $model app\models\FilterValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filter-value-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filter_id')->dropDownList($filterList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
