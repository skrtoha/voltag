<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Text */

$this->title = 'Создание пункта меню';
$this->params['breadcrumbs'][] = ['label' => 'Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="text-create panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
