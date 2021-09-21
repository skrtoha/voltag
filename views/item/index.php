<?php
/* @var $this \yii\web\View */
/* @var $item \app\models\Item */

$this->title = $item->title;
\app\models\Helper::debug($item);
$this->registerCssFile('/assets/front/css/item.css');
$this->registerJsFile('/assets/front/item.js', ['depends' => ['app\assets\MagnificPopupAsset']]);
?>
<div class="container" id="item">
    <h3 class="title">
        <?=\yii\helpers\Html::a(
            "$item->brend $item->article $item->title",
            ['/item', 'id' => $item->id]
        )?>
    </h3>
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
                <?foreach($item->itemFile as $itemFile){
                    $src = Yii::$app->params['imgUrl'].$itemFile->file->path.$itemFile->file->title; ?>
                    <a href="<?=$src?>">
                        <img src="<?=$src?>" alt="">
                    </a>
                <?}?>
            </div>
        <?}?>
    </div>
</div>