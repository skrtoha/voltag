<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Обновить автомобиль: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="car-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
