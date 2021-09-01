<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var array $brendList */
/* @var $this yii\web\View */
/* @var $searchModel app\models\CrossSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кроссы';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="cross-index  panel-body">

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'brend_id',
                'filter' => $brendList,
                'value' => function($model){
                    return $model->getBrendTitle();
                }
            ],
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
