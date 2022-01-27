<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $uploadForm */

$this->title = 'Баннеры на главной';
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title]);?>
<div class="slider-create panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm
    ]) ?>

</div>
