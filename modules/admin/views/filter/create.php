<?php

use yii\helpers\Html;

/* @var string $categoryList */
/* @var $this yii\web\View */
/* @var $model app\models\Filter */

$this->title = 'Создать фильтр';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="filter-create panel-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoryList' => $categoryList
    ]) ?>

</div>
