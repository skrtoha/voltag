<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Text */

$this->title = 'Обновить пункт: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="text-update panel-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
