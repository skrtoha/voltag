<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FilterValue */
/* @var $filterList array */

$this->title = 'Обновить значение фильтра: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-value-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'filterList' => $filterList
    ]) ?>
</div>
