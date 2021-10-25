<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $order app\models\Order */
/* @var $orderValueDataProvider \yii\data\ActiveDataProvider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($order, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($order, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($order, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($order, 'delivery')->dropDownList([ 'Самовывоз' => 'Самовывоз', 'Курьерская доставка по Санкт-Петербургу' => 'Курьерская доставка по Санкт-Петербургу', 'Доставка по России' => 'Доставка по России', ], ['prompt' => '']) ?>
    
    <?= $form->field($order, 'addressee')->textInput(['maxlength' => true]) ?>
    
    <h2>Товары в заказе</h2>
    <?=\yii\grid\GridView::widget([
        'dataProvider' => $orderValueDataProvider,
        'columns' => [
            ['class' => \yii\grid\SerialColumn::class],
            'brend',
            'article',
            'title',
            'quan',
            'price'
        ]
    ])?>
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
