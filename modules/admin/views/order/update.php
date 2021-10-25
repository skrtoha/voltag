<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $order app\models\Order */
/* @var $orderValueDataProvider \yii\data\ActiveDataProvider */

$this->title = 'Заказ №'.$order->id;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="order-update panel-body">
    <?= $this->render('_form', [
        'order' => $order,
        'orderValueDataProvider' => $orderValueDataProvider
    ]) ?>
</div>
