<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $bannerList array */
/* @var $banner \app\models\Banner */
/* @var $newsList array */
/* @var $item \app\models\Item */
/* @var $beforeFooter \app\models\Text */

$this->title = 'Компрессоры';
?>
<?if (!empty($bannerList)){?>
    <div class="container">
        <div id="slider" class="sl-slider-wrapper">
            <div class="sl-slider">
                <?foreach ($bannerList as $banner){?>
                    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                        <div class="sl-slide-inner">
                            <div class="bg-img">
                                <?$src = Yii::$app->params['imgUrl'].$banner->file->path.$banner->file->title;?>
                                <img src="<?=$src?>" alt="">
                            </div>
                            <h2><a href=""><?=$banner->title?></a></h2>
                            <blockquote>
                                <?=$banner->content?>
                            </blockquote>
                        </div>
                    </div>
                <?}?>
            </div>
            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <?for($i = 1; $i < count($bannerList); $i++){?>
                    <span></span>
                <?}?>
            </nav>
    
        </div>
    </div>
<?}?>
<?if (!empty($newsList)){?>
    <div class="container">
        <div class="properties-listing spacer">
<!--            <a href="buysalerent.php" class="pull-right viewall">Смотреть всё</a>-->
            <h2>Новинки</h2>
            <div id="owl-example" class="owl-carousel">
                <?foreach($newsList as $item){?>
                    <div class="properties">
                        <?if (isset($item->itemFile[0]->file)){
                            $f = & $item->itemFile[0]->file?>
                            <div class="image-holder">
                                <?$src = Yii::$app->params['imgUrl'].$f->path.$f->title?>
                                <img src="<?=$src?>" class="img-responsive" alt="properties"/>
                            </div>
                        <?}
                        else{?>
                            <div class="image-holder">
                                <img class="img-responsive" src="/images/no_image.png" alt="Нет изображения">
                            </div>
                        <?}?>
                        <h4>
                            <a href="<?=Url::to(['/item', 'id' => $item->id])?>"><?=$item->title?></a>
                        </h4>
                        <p class="price"><?=$item->category?></p>
                        <a class="btn btn-primary" href="<?=Url::to(['/item', 'id' => $item->id])?>">Подробнее</a>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
<?}?>
<?if (!empty($beforeFooter)){?>
    <div class="container" style="margin-bottom: 20px">
        <?=$beforeFooter->content?>
    </div>
<?}?>

