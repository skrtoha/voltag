<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Баннеры на главной';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="slider-index panel-body">
    <p><?= Html::a('Создать баннер', ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'content',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
