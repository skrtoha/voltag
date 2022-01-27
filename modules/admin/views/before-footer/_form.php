<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Text */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="text-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->widget(TinyMce::class, [
        'options' => ['rows' => 6],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                'advlist autolink lists link charmap  print hr preview pagebreak',
                'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                'save insertdatetime media table contextmenu template paste image'
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
