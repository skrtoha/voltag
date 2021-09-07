<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $brendList array*/
/* @var $categoryList array*/
/* @var $this yii\web\View */
/* @var \app\models\UploadForm $uploadForm */
/* @var $model app\models\Item */
/* @var $itemValues array */
/* @var $filterValues array */
/* @var $itemCrossList array */
/* @var $crossList array */
/* @var $itemCross \app\models\ItemCross */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('/assets/admin/js/item.js', ['depends' => ['app\assets\AdminAsset']]);
$this->registerCssFile('/assets/admin/css/item.css')
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brend_id')->dropDownList($brendList) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList($categoryList) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?=Html::button('Загрузить изображение', ['class' => 'uploadFile'])?>
    </div>
    
    <?if ($filterValues){?>
        <h3>Фильтры</h3>
        <?foreach($filterValues as $row){?>
            <div class="form-group">
                <input type="hidden" name="ItemValue[<?=$row['filter_id']?>][enum]?>" value="<?=$row['enum']?>">
                <?if ($row['enum'] == 0){?>
                    <label class="control-label" for="ItemValue_<?=$row['filter_id']?>">
                        <?=$row['title']?>
                    </label>
                    <input
                        id="ItemValue_<?=$row['filter_id']?>"
                        type="text"
                        class="form-control"
                        name="ItemValue[<?=$row['filter_id']?>][value]"
                        value="<?=$row['value']?>"
                    >
                <?}
                else{?>
                    <label for="ItemValue_<?=$row['filter_id']?>">
                        <?=$row['title']?>
                    </label>
                    <select
                        name="ItemValue[<?=$row['filter_id']?>][value]?>"
                        id="ItemValue_<?=$row['filter_id']?>"
                        class="form-control"
                    >
                        <option value="">...выберите</option>
                        <?foreach($row['values'] as $value){
                            $selected = $value['selected'] ? 'selected' : '';?>
                            <option <?=$selected?> value="<?=$value['id']?>"><?=$value['title']?></option>
                        <?}?>
                    </select>
                <?}?>
            </div>
        <?}
    }?>
    
    <h2>Кроссы</h2>
    <div class="form-group">
        <a href="#" id="add_cross">Добавить</a>
        <?if (isset($itemCrossList)){
            foreach($itemCrossList as $itemCross){?>
                <?=$this->render('/common/cross-item', [
                    'crossList' => $crossList,
                    'selected' => $itemCross->cross_id
                ]);?>
            <?}
        }?>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?=$this->render('/common/upload-image', ['model' => $uploadForm]);?>
