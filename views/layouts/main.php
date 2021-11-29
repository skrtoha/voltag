<?php
session_start();
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\MagnificPopupAsset;
use app\models\Helper;

MagnificPopupAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <?=Html::a('Home', ['site/index'])?>
                    <li><a href="about.php">About</a></li>
                    <li><a href="agents.php">Agents</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->
<div class="container">
    <!-- Header Starts -->
    <div class="header">
        <a class="pull-left" href="/"><img src="/images/logo.png" alt="Realestate"></a>
        <div class="center">
            <form action="<?=Url::to(['catalog/index'])?>" id="search">
                <input type="text" name="search" value="<?=$_GET['search']?>">
                <input type="submit" value="ПОИСК">
            </form>
            <ul class="">
                <li><a href="#">Цены</a></li>
                <li><a href="<?=Url::to(['/catalog'])?>">Каталог</a></li>
                <li><a href="#">Комплектующие</a></li>
            </ul>
        </div>
        <div class="header_telephone">
            <a href="tel:+7 999 99 99">+7 (999) 999 99 99</a>
            <span>заказать звонок</span>
        </div>
       
        <div class="right-header">
            <a href="#profile" class="profile open-popup-link">
                <span class="icon-person"></span>
            </a>
            <a href="#basket" class="basket open-popup-link">
                <span class="icon-local_grocery_store"></span>
                <?if ($count = Helper::getStockCommonAmountItems()){?>
                    <i id="total_count__basket"><?=$count?></i>
                <?}?>
                
            </a>
        </div>
    </div>
</div>

<?=$content?>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <h4>Information</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.php">About</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agents</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.php">Blog</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-sm-4">
                <h4>Follow us</h4>
                <a href="#"><img src="/images/facebook.png" alt="facebook"></a>
                <a href="#"><img src="/images/twitter.png" alt="twitter"></a>
                <a href="#"><img src="/images/linkedin.png" alt="linkedin"></a>
                <a href="#"><img src="/images/instagram.png" alt="instagram"></a>
                <div class="payments">
                    <img src="/images/mc-logo.png" alt="">
                    <img src="/images/mir-logo.png" alt="">
                    <img src="/images/visa-logo.png" alt="">
                </div>
            </div>

            <div class="col-lg-4 col-sm-4">
                <h4>Contact us</h4>
                <p><b>Bootstrap Realestate Inc.</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span> 8290 Walk Street, Australia <br>
                    <span class="glyphicon glyphicon-envelope"></span> hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
            </div>
        </div>
        <p class="copyright">Copyright 2021. All rights reserved.	</p>
    </div>
</div>

<div id="profile" class="white-popup mfp-hide">
    <div class="row">
        <div class="col-sm-6 login">
            <h4>Login</h4>
            <form class="" role="form">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h4>New User Sign Up</h4>
            <p>Join today and get updated with all the properties deal happening around.</p>
            <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
        </div>
    
    </div>
</div>

<div id="basket"  class="white-popup mfp-hide">
    Корзина пуста
</div>
<!-- /.modal -->
</body>
</html>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
