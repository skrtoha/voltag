<?php
/* @var \app\models\Item $model */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="top">
    <h3><?=Html::a($model->article, ['/item', 'id' => $model->id])?></h3>
    <p><?=$model->title?></p>
</div>
<div class="middle">
    <div class="left">
        <?if (!empty($model->itemValue)){
            foreach($model->itemValue as $value){?>
                <p class="item_value">
                    <?if ($value->filter->signment){?>
                        <b class="signment"><?=$value->filter->signment?></b>:
                    <?}?>
                    <?if ($value->filter->enum){?>
                        <span class="filter_value"><?=$value->filterValue->title?></span>
                    <?}
                    else{?>
                        <span class="filter_value"><?=$value->value?></span>
                    <?}?>
                    <?if ($value->filter->measure_string){?>
                        <span class="measure_string"><?=$value->filter->measure_string?></span>
                    <?}?>
                </p>
            <?}
        }?>
    </div>
    <?if (!empty($model->itemFile)){?>
        <div class="right">
            <div class="image">
                <img src="<?=Yii::$app->params['imgUrl'].$model->itemFile[0]->file->path.$model->itemFile[0]->file->title?>" alt="">
            </div>
        </div>
    <?}?>
    <div class="clearfix"></div>
</div>
<div class="price">
    Цена: <?=$model->price?>
</div>
<div class="bottom">
    <div class="left">
        <?if (!empty($model->itemComplect)){
            foreach($model->itemComplect as $row){?>
                <span class="complect"><?=$row->complect->article?></span>
            <?}?>
        <?}?>
    </div>
    <div class="right">
        <?if (!empty($model->itemCar)){
            foreach($model->itemCar as $row){?>
                <span class="car"><?=$row->car->title?></span>
            <?}?>
        <?}?>
    </div>
</div>