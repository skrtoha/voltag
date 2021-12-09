<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $item app\models\Item */
/* @var $itemValues app\models\ItemValue */
/* @var $itemCrossDataProvider array */
/* @var $itemCarDataProvider array */
/* @var $itemComplectDataProvider \yii\data\ActiveDataProvider */
/* @var $itemAggregateDataProvider \yii\data\ActiveDataProvider */
/* @var $imagesDataProvider \yii\data\ActiveDataProvider */

$this->title = $item->title;
\yii\web\YiiAsset::register($this);
$this->registerCssFile('/assets/admin/css/item.css')
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="item-view panel-body">
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $item['id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $item['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $item,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'brend_id',
                'label' => 'Бренд',
                'value' => function($model){
                    return $model['brend'];
                }
            ],
            'article',
            'price'
        ],
    ]) ?>

    <h3>Изображения</h3>
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
                                    </div>';
                        }
                    ]
                ]
            ])?>
        <?}?>
    </div>
    <h3>Фильтры</h3>
    
    <?=DetailView::widget([
        'model' => $itemValues
    ])?>

    <h3>Кроссы</h3>
    <?=\yii\grid\GridView::widget([
        'dataProvider' => $itemCrossDataProvider,
        'columns' => [
            'brend',
            'cross'
        ]
    ])?>

    <h3>Применяется для автомобилей</h3>
    <?=\yii\grid\GridView::widget([
        'dataProvider' => $itemCarDataProvider,
        'columns' => [
            'car_title'
        ]
    ])?>
    
    <h3>Комплектующие</h3>
    <?=\yii\grid\GridView::widget([
        'dataProvider' => $itemComplectDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'brend',
            'article'
        ]
    ])?>

    <h3>Агрегаты</h3>
    <?=\yii\grid\GridView::widget([
        'dataProvider' => $itemAggregateDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'brend',
            'article'
        ]
    ])?>
</div>
