<?php
/* @var \app\models\Item $model */
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to(['catalog/item', 'id' => $model->id]);
?>
<!--<pre>--><?//print_r($model);?><!--</pre>-->
<div class="col-lg-4 col-sm-6">
    <div class="properties">
        <div class="image-holder">
            <img src="images/properties/1.jpg" class="img-responsive" alt="properties">
            <div class="status sold">Sold</div>
        </div>
        <h4>
            <a href="<?=$url?>"><?=$model->brend?> <?=$model->title?> <?=$model->article?></a>
        </h4>
        <p class="price">Цена: не установлено</p>
        <div class="listing-detail">
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span>
        </div>
        <?=Html::a('Подробнее', $url, ['class' => 'btn btn-primary'])?>
    </div>
</div>