<?php

use yii\helpers\Html;

/* @var array $filterList */
/* @var string $categoryList */
/* @var $this yii\web\View */
/* @var $model app\models\FilterValue */

$this->title = 'Создать значение фильтра';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-value-create panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'filterList' => $filterList
    ]) ?>

</div>
