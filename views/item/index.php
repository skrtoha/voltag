<?php
/* @var $this \yii\web\View */
/* @var $item \app\models\Item */

$this->title = $item->title;
?>
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div id="item">
                <div class="top">
                    <h3><?=\yii\helpers\Html::a($item->article, ['/item', 'id' => $item->id])?></h3>
                    <p><?=$item->title?></p>
                </div>
                <div class="middle">
                    <div class="left">
                        <?if (!empty($item->itemValue)){
                            foreach($item->itemValue as $value){?>
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
                    <?if (!empty($item->itemFile)){?>
                        <div class="right">
                            <div class="image">
                                <img src="<?=Yii::$app->params['imgUrl'].$item->itemFile[0]->file->path.$item->itemFile[0]->file->title?>" alt="">
                            </div>
                        </div>
                    <?}?>
                    <div class="clearfix"></div>
                </div>
                <div class="price">
                    Цена: <?=$item->price?>
                </div>
                <div class="bottom">
                    <div class="left">
                        <?if (!empty($item->itemComplect)){
                            foreach($item->itemComplect as $row){?>
                                <span class="complect"><?=$row->complect->article?></span>
                            <?}?>
                        <?}?>
                    </div>
                    <div class="right">
                        <?if (!empty($item->itemCar)){
                            foreach($item->itemCar as $row){?>
                                <span class="car"><?=$row->car->title?></span>
                            <?}?>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
