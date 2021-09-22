<?php
/* @var $this \yii\web\View */
/* @var $item \app\models\Item */

$this->title = $item->title;
\app\models\Helper::debug($item);
$this->registerCssFile('/assets/front/css/item.css');
$this->registerJsFile('/assets/front/item.js', ['depends' => ['app\assets\MagnificPopupAsset']]);
?>
<div class="container" id="item">
    <div class="wrapper">
        <?if (!empty($item->itemValue)){?>
            <div class="item_info">
                <h4>Характеристики</h4>
                <ul>
                    <?foreach($item->itemValue as $itemValue){?>
                        <li>
                            <?if ($itemValue->filter->signment){?>
                                <b><?=$itemValue->filter->signment?>:</b>
                            <?}?>
                            <span><?=$itemValue->filter->title?></span>
                            <?if ($itemValue->filter->enum){?>
                                <span><?=$itemValue->filterValue->title?></span>
                            <?}
                            else{?>
                                <span><?=$itemValue->value?></span>
                            <?}?>
                            <?if ($itemValue->filter->measure_string){?>
                                <span><?=$itemValue->filter->measure_string?></span>
                            <?}?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <?if (!empty($item->itemFile)){?>
            <div class="item_info gallery">
                <div class="gallery">
                    <?foreach($item->itemFile as $itemFile){
                        $src = Yii::$app->params['imgUrl'].$itemFile->file->path.$itemFile->file->title; ?>
                        <a href="<?=$src?>">
                            <img src="<?=$src?>" alt="">
                        </a>
                    <?}?>
                </div>
                <h3 class="title">
                    <?=\yii\helpers\Html::a(
                        "$item->article $item->title",
                        ['/item', 'id' => $item->id]
                    )?>
                </h3>
                <div class="buy">
                    <div class="price">
                        <span><?=$item->price?></span> руб.
                    </div>
                    <button>Купить</button>
                </div>
            </div>
        <?}?>
        <?if (!empty($item->itemComplect)){?>
            <div class="item_info">
                <h4>Комплектующие</h4>
                <ul>
                    <?foreach($item->itemComplect as $itemComplect){?>
                        <li>
                            <?=\yii\helpers\Html::a(
                                $itemComplect->complect->title.' '.$itemComplect->complect->article,
                                ['/item', 'id' => $itemComplect->item_id_complect]
                            )?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <?if (!empty($item->itemCross)){?>
            <div class="item_info">
                <h4>Кроссы</h4>
                <ul>
                    <?foreach($item->itemCross as $itemCross){?>
                        <li>
                            <?=\yii\helpers\Html::a(
                                $itemCross->item->title.' '.$itemComplect->item->article,
                                ['/item', 'id' => $itemCross->cross_id]
                            )?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <?if (!empty($item->itemCar)){?>
            <div class="item_info">
                <h4>Применяется для автомобилей</h4>
                <ul>
                    <?foreach($item->itemCar as $itemCar){?>
                        <li>
                            <?=$itemCar->car->title?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
    </div>
</div>