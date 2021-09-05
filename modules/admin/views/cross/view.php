<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cross */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="cross-view panel-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'brend_id',
                'value' => function($model){
                    return $model->getBrendTitle();
                }
            ],
            'title',
            'created',
        ],
    ]) ?>

</div>
