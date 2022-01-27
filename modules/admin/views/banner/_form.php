<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm \app\models\UploadForm  */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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
    
    <?if (empty($model->file)){?>
        <?=$form->field($uploadForm, 'imageFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])?>
    <?}?>
    
    <?if (!empty($model->file)){?>
        <h2>Изображение</h2>
        <div class="form-group image-wrap">
            <div class="image">
                <?$fullPath = Yii::$app->params['imgUrl']."{$model->file->path}{$model->file->title}"?>
                <a target="_blank" href="<?=$fullPath?>">
                    <img alt="" src="<?=$fullPath?>">
                </a>
                <?=Html::a(
                    'Удалить',
                    [
                        'image-delete',
                        'file_id' => $model->file->id,
                        'banner_id' => $model->id
                    ]
                )?>
            </div>
        </div>
    <?}?>
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
