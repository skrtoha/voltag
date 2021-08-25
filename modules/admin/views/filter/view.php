<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Filter */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="filter-view  panel-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'category_id',
                'value' => function($model){
                    return $model->getCategoryTitle();
                }
            ],
            'signment',
            'measure_string',
            [
                'attribute' => 'enum',
                'value' => function($model){
                    return $model->enum == 1 ? 'Да' : 'Нет';
                }
            ]
        ]
    ]) ?>

</div>
