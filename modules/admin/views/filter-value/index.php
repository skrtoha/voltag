<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Category;

/* @var array $filterList */
/* @var $this yii\web\View */
/* @var $searchModel app\models\FilterValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Значения фильтра';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-value-index panel-body">
    <p>
        <?= Html::a('Создать значение фильтра', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'filter_id',
                'filter' => $filterList,
                'value' => function($model){
                    return $model->getFilterTitle();
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
