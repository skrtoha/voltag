<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Создать автомобиль';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="car-create panel-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
