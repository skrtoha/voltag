<?php

use yii\helpers\Html;

/* @var array $mainCategories */
/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Редактирование категории: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>

<div class="category-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'mainCategories' => $mainCategories
    ]) ?>

</div>
