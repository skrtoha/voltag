<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var array $categoryList */
/* @var $this yii\web\View */
/* @var $searchModel app\models\FilterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фильтры';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-index panel-body">
    <p>
        <?= Html::a('Создать фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'category_id',
                'filter' => $categoryList,
                'value' => function($model){
                    return $model->getCategoryTitle();
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {createFilterValue}',
                'buttons' => [
                    'createFilterValue' => function($url, $model, $key){
                        return Html::a('Создать значение', ['filter-value/create', 'filter_id' => $model->id]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
