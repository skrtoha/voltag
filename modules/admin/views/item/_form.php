<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $brendList array*/
/* @var $categoryList array*/
/* @var $this yii\web\View */
/* @var $uploadForm \app\models\UploadForm  */
/* @var $model app\models\Item */
/* @var $itemValues array */
/* @var $filterValues array */
/* @var $itemCrossList array */
/* @var $itemComplectList array */
/* @var $crossList array */
/* @var $imagesDataProvider \yii\data\ActiveDataProvider*/
/* @var $carList array */
/* @var $itemCarList array */
/* @var $itemCross \app\models\ItemCross */
/* @var $itemCar \app\models\ItemCar */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm \app\models\UploadForm */
/* @var $itemComplectDataProvider \yii\data\ActiveDataProvider */

$this->registerJsFile('/assets/admin/js/item.js', ['depends' => ['app\assets\AdminAsset']]);
$this->registerCssFile('/assets/admin/css/item.css')
?>

<div class="item-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brend_id')->dropDownList($brendList) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList($categoryList) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'price')->textInput() ?>
    
    <h2>Изображения</h2>
    <div class="form-group image-wrap">
        <?if (isset($imagesDataProvider)){?>
            <?=\yii\grid\GridView::widget([
                'dataProvider' => $imagesDataProvider,
                'columns' => [
                    [
                        'attribute' => 'fullPath',
                        'format' => 'raw',
                        'value' => function(\app\models\ItemFile $model){
                            return '<div class="image">
                                        <a target="_blank" href="'.$model->fullPath.'">
                                            <img alt="" src="'.$model->fullPath.'">
                                        </a>
                                        '.Html::a(
                                            'Удалить',
                                            [
                                                'image-delete',
                                                'item_id' => $model->item_id,
                                                'file_id' => $model->file_id
                                            ]
                                        ).'
                                    </div>';
                        }
                    ]
                ]
            ])?>
        <?}?>
    </div>
    
    <?= $form->field($uploadForm, 'imageFile[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])?>
    
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
    <?}?>
    
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
    
    <h2>Используется для автомобилей</h2>
    <div class="form-group">
        <a href="#" id="add_car">Добавить</a>
        <?if (isset($itemCarList)){
            foreach($itemCarList as $itemCar){?>
                <?=$this->render('/common/car-item', [
                    'carList' => $carList,
                    'selected' => $itemCar->car_id
                ]);?>
            <?}
        }?>
    </div>

    <h2>Комплектующие</h2>
    <div class="form-group">
        <a href="#" id="add_complect">Добавить</a>
        <?if (isset($itemComplectDataProvider)){?>
            <?=\yii\grid\GridView::widget([
                'dataProvider' => $itemComplectDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'title',
                    'brend',
                    'article',
                    [
                        'class' => \yii\grid\ActionColumn::class,
                        'urlCreator' => function($action, $model){
                            return [
                                "$action-complect",
                                'id' => $_GET['id'],
                                'item_id_complect' => $model['item_id_complect']
                            ];
                        },
                        'template' => '{delete}',
                        'buttons' => [
                            'delete' => function ($url, $model, $key) {
                                $output = Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => 'Уверены, что хотите удалить?',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]);
                                $output .= '<input type="hidden" name="ItemComplect[]" value="'.$model->id.'">';
                                return $output;
                            },
                        ]
                    ]
                ]
            ])?>
        <?}?>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
