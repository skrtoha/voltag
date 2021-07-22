<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FilterValue */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-value-view panel-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены?',
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
                'attribute' => 'filter_id',
                'value' => function($model){
                    return $model->getFilterTitle();
                }
            ]
        ],
    ]) ?>

</div>
