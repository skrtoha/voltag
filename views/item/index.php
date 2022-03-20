<?php
/* @var $this \yii\web\View */
/* @var $item array */

$this->title = $item['title'];
$this->registerCssFile('/front/css/item.css');
$this->registerJsFile('/front/item.js', ['depends' => ['app\assets\MagnificPopupAsset']]);
?>
<div class="container" id="item">
    <div class="wrapper" data-key="<?=$item['id']?>">
        <?if (!empty($item['itemValue'])){?>
            <div class="item_info">
                <h4>Характеристики</h4>
                <ul>
                    <?foreach($item['itemValue'] as $itemValue){?>
                        <li>
                            <?if ($itemValue['filter']['signment']){?>
                                <b><?=$itemValue['filter']['signment']?>:</b>
                            <?}?>
                            <span><?=$itemValue['filter']['title']?></span>
                            <?if ($itemValue['filter']['enum']){?>
                                <span><?=$itemValue['filterValue']['title']?></span>
                            <?}
                            else{?>
                                <span><?=$itemValue['value']?></span>
                            <?}?>
                            <?if ($itemValue['filter']['measure_string']){?>
                                <span><?=$itemValue['filter']['measure_string']?></span>
                            <?}?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <div class="item_info gallery-wrapper">
            <?if (!empty($item['itemFile'])){?>
                <div class="gallery">
                    <?foreach($item['itemFile'] as $itemFile){
                        $src = Yii::$app->params['imgUrl'].$itemFile['file']['path'].$itemFile['file']['title']; ?>
                        <a href="<?=$src?>">
                            <img src="<?=$src?>" alt="">
                        </a>
                    <?}?>
                </div>
            <?}
            else {?>
                <div class="gallery">
                    <a href="/images/no_image.png">
                        <img src="/images/no_image.png" alt="Нет изображения">
                    </a>
                </div>
            <?}?>
            <h3 class="title">
                <?=\yii\helpers\Html::a(
                    "{$item['article']} {$item['title']}",
                    ['/item', 'id' => $item['id']]
                )?>
            </h3>
            <div class="buy">
                <div class="price">
                    <span><?=$item['price']?></span> руб.
                </div>
                <button class="add_to_stock">Купить</button>
            </div>
        </div>
        <?if (!empty($item['itemComplect'])){?>
            <div class="item_info">
                <h4>Комплектующие</h4>
                <ul>
                    <?foreach($item['itemComplect'] as $itemComplect){?>
                        <li>
                            <?=\yii\helpers\Html::a(
                                $itemComplect['complect']['title'].' '.$itemComplect['complect']['article'],
                                ['/item', 'id' => $itemComplect['item_id_complect']]
                            )?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <?if (!empty($item['itemAggregate'])){?>
            <div class="item_info">
                <h4>Применяется в агрегатах</h4>
                <ul>
                    <?foreach($item['itemAggregate'] as $itemAggregate){?>
                        <li>
                            <?=\yii\helpers\Html::a(
                                $itemAggregate['aggregate']['title'].' '.$itemAggregate['aggregate']['article'],
                                ['/item', 'id' => $itemAggregate['item_id_aggregate']]
                            )?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <?if (!empty($item['itemCross'])){?>
            <div class="item_info">
                <h4>Кроссы</h4>
                <ul>
                    <?foreach($item['itemCross'] as $itemCross){?>
                        <li>
                            <?=\yii\helpers\Html::a(
                                $itemCross['cross']['brend']['title'].' - '.$itemCross['cross']['title'],
                                ['/item', 'id' => $itemCross['cross_id']]
                            )?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
        <?if (!empty($item['itemCar'])){?>
            <div class="item_info">
                <h4>Применяется для автомобилей</h4>
                <ul>
                    <?foreach($item['itemCar'] as $itemCar){?>
                        <li>
                            <?=$itemCar['car']['title']?>
                        </li>
                    <?}?>
                </ul>
            </div>
        <?}?>
    </div>
</div>