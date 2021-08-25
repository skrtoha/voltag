<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brend */

$this->title = 'Создать';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="brend-create panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
