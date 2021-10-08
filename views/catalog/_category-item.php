<?php
/* @var \app\models\Item $model */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?=Html::a('', ['/item', 'id' => $model->id], ['class' => ['wrap']])?>
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
            <div class="info">
                <h3><?=$model->title?></h3>
                <p><?=Html::a($model->article, ['/item', 'id' => $model->id])?></p>
                <div class="price">
                    <span><?=$model->price?></span> руб.
                </div>
                <button class="add_to_stock">Купить</button>
            </div>
        </div>
    <?}?>
    <div class="clearfix"></div>
</div>
<div class="bottom">
    <?if (!empty($model->itemComplect)){?>
        <div class="complects">
            <?foreach($model->itemComplect as $row){?>
                <span class="complect"><?=$row->complect->article?></span>
            <?}?>
        </div>
    <?}?>
    <?if (!empty($model->itemCar)){?>
        <div class="cars">
            <?foreach($model->itemCar as $row){?>
                <span class="car"><?=$row->car->title?></span>
            <?}?>
        </div>
    <?}?>
</div>