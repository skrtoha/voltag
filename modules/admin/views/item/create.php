<?php

use yii\helpers\Html;

/* @var $brendList array */
/* @var $uploadForm */
/* @var $categoryList array */
/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'Создать товар';
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="item-create panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'brendList' => $brendList,
        'categoryList' => $categoryList,
        'uploadForm' => $uploadForm
    ]) ?>
</div>
