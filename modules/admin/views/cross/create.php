<?php

use yii\helpers\Html;

/* @var $brendList array */
/* @var $this yii\web\View */
/* @var $model app\models\Cross */

$this->title = 'Создать кросс';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="cross-create panel-body">

    <?= $this->render('_form', [
        'model' => $model,
        'brendList' => $brendList,
    ])?>

</div>
