<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Text */

$this->title = 'Обновить пункт: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="text-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
