<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $item app\models\Item */
/* @var $itemValues app\models\ItemValue */
/* @var $itemCrossDataProvider array */

$this->title = $item->title;
\yii\web\YiiAsset::register($this);
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
        ],
    ]) ?>
    
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

</div>
