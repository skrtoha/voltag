<?php

use yii\helpers\Html;

/* @var array $categoryList */
/* @var $this yii\web\View */
/* @var $model app\models\Filter */

$this->title = 'Обновить фильтр: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-update panel-body">

    <?= $this->render('_form', [
        'model' => $model,
        'categoryList' => $categoryList
    ]) ?>

</div>
