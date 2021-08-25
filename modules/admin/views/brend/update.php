<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brend */

$this->title = 'Обновление бренда: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="brend-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
