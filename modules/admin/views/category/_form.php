<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var array $mainCategories */
/* @var $uploadForm \app\models\UploadForm */
/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList($mainCategories)?>
    
    <?= $form->field($model, 'transliteration')->textInput();?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?=$this->render('/common/upload-image', ['model' => $uploadForm]);
