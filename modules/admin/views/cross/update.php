<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $brendList array */
/* @var $model app\models\Cross */

$this->title = 'Обновить кросс: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="cross-update panel-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'brendList' => $brendList
    ]) ?>

</div>
