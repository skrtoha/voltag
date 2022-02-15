<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var array $brendList */
/* @var array $categoryList */
/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \app\models\Item */

$this->title = 'Товары';
$this->registerCssFile('/admin_assets/css/item.css');
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="item-index panel-body">
    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'brend_id',
                'filter' => $brendList,
                'value' => function($model){
                    return $model->getBrendTitle();
                }
            ],
            'article',
            [
                'attribute' => 'category_id',
                'filter' => $categoryList,
                'value' => function($model){
                    return $model->getCategoryTitle();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
