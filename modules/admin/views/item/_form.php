<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $brendList */
/* @var $this yii\web\View */
/* @var \app\models\UploadForm $uploadForm */
/* @var $model app\models\Item */
/* @var $itemValues array */
/* @var $filterValues array */
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
    
    <h3>Фильтры</h3>
    
    <?if ($itemValues){
        foreach($itemValues as $itemValue){?>
            <div class="form-group">
                <?if ($itemValue['enum'] == 0){?>
                    <label class="control-label" for="ItemValue_<?=$itemValue['filter_id']?>">
                        <?=$itemValue['filter']?>
                    </label>
                    <input
                        id="ItemValue_<?=$itemValue['filter_id']?>"
                        type="text"
                        class="form-control"
                        name="ItemValue[<?=$itemValue['filter_id']?>]"
                        value="<?=$itemValue['value']?>"
                    >
                <?}
                else{?>
                    <label for="ItemValue_<?=$itemValue['filter_id']?>">
                        <?=$itemValue['filter']?>
                    </label>
                    <select
                        name="ItemValue[<?=$itemValue['filter_id']?>]"
                        id="ItemValue_<?=$itemValue['filter_id']?>"
                        class="form-control"
                    >
                        <option value="">...выберите</option>
                        <?foreach($filterValues[$itemValue['filter_id']]['values'] as $filter_id => $value){
                            $selected = $itemValue['filter_value_id'] == $value['id'] ? 'selected' : '';?>
                            <option <?=$selected?> value="<?=$value['id']?>"><?=$value['title']?></option>
                        <?}?>
                    </select>
                <?}?>
            </div>
        <?}
    }?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?=$this->render('/common/upload-image', ['model' => $uploadForm]);
