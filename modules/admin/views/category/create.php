<?php

use yii\helpers\Html;

/* @var array $mainCategories */
/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Создать категорию';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="category-create panel-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCategories' => $mainCategories
    ]) ?>

</div>
