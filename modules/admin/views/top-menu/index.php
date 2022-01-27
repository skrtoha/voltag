<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Верхнее меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="text-index panel-body">
    <p>
        <?= Html::a('Создать пункт меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'alias',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ]
        ],
    ]); ?>


</div>
