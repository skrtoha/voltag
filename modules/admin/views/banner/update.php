<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */
/* @var $uploadForm array */

$this->title = 'Обновить баннер: ' . $model->title;
$this->registerCssFile('/assets/admin/css/banner.css');
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="slider-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm
    ]) ?>

</div>
