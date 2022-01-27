<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AdminAsset;
AdminAsset::register($this);
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
<body id="mimin" class="dashboard">
<!-- start: Header -->
<nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
        <div class="navbar-header" style="width:100%;">
            <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
            </div>
            <a href="/" class="navbar-brand">
                <b>Компрессоры</b>
            </a>

            <ul class="nav navbar-nav search-nav">
                <li>
                    <div class="search">
                        <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                        <div class="form-group form-animate-text">
                            <input type="text" class="form-text" required>
                            <span class="bar"></span>
                            <label class="label-search"><b>Поиск</b> </label>
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Админ</span></li>
                <li><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- end: Header -->

<div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    <div id="left-menu">
        <div class="sub-left-menu scroll">
            <ul class="nav nav-list">
                <li>
                    <div class="left-bg"></div>
                </li>
                <li class="time">
                    <h1 class="animated fadeInLeft">21:00</h1>
                    <p class="animated fadeInRight">Sat,October 1st 2029</p>
                </li>
                <?if (!Yii::$app->user->isGuest){?>
                    <li class="active ripple">
                        <a class="tree-toggle nav-header"><span class="fa-home fa"></span>
                            Магазин
                        </a>
                        <ul class="nav nav-list tree">
                            <li><?=Html::a('Категории', ['category/index'])?></li>
                            <li><?=Html::a('Бренды', ['brend/index'])?></li>
                            <li><?=Html::a('Товары', ['item/index'])?></li>
                            <li><?=Html::a('Фильтры', ['filter/index'])?></li>
                            <li><?=Html::a('Значения фильтров', ['filter-value/index'])?></li>
                            <li><?=Html::a('Кроссы', ['cross/index'])?></li>
                            <li><?=Html::a('Автомобили', ['car/index'])?></li>
                            <li><?=Html::a('Заказы', ['order/index'])?></li>
                            <li><?=Html::a('Верхнее меню', ['top-menu/index'])?></li>
                            <li><?=Html::a('Перед футером', ['before-footer/index'])?></li>
                            <li><?=Html::a('Баннер', ['banner/index'])?></li>
                        </ul>
                    </li>
                <?}?>
            </ul>
        </div>
    </div>
    <!-- end: Left Menu -->
    <div id="content">
        <?=$content?>
    </div>
    <!-- start: right menu -->
    <div id="right-menu">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#right-menu-user">
                    <span class="fa fa-comment-o fa-2x"></span>
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#right-menu-notif">
                    <span class="fa fa-bell-o fa-2x"></span>
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#right-menu-config">
                    <span class="fa fa-cog fa-2x"></span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="right-menu-user" class="tab-pane fade in active">
                <div class="search col-md-12">
                    <input type="text" placeholder="search.."/>
                </div>
                <div class="user col-md-12">
                    <ul class="nav nav-list">
                        <li class="online">
                            <div class="name">
                                <h5><b>Bill Gates</b></h5>
                                <p>Hi there.?</p>
                            </div>
                            <div class="gadget">
                                <span class="fa  fa-mobile-phone fa-2x"></span>
                            </div>
                            <div class="dot"></div>
                        </li>
                    </ul>
                </div>
                <!-- Chatbox -->
                <div class="col-md-12 chatbox">
                    <div class="col-md-12">
                        <a href="#" class="close-chat">X</a><h4>Akihiko Avaron</h4>
                    </div>
                    <div class="chat-area">
                        <div class="chat-area-content">
                            <div class="msg_container_base">
                                <div class="row msg_container send">
                                    <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_sent">
                                            <p>that mongodb thing looks good, huh?
                                                tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                </div>

                                <div class="row msg_container receive">
                                    <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                    <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_receive">
                                            <p>that mongodb thing looks good, huh?
                                                tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                    </div>
                                </div>

                                <div class="row msg_container send">
                                    <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_sent">
                                            <p>that mongodb thing looks good, huh?
                                                tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                </div>

                                <div class="row msg_container receive">
                                    <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                    <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_receive">
                                            <p>that mongodb thing looks good, huh?
                                                tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                    </div>
                                </div>

                                <div class="row msg_container send">
                                    <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_sent">
                                            <p>that mongodb thing looks good, huh?
                                                tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                </div>

                                <div class="row msg_container receive">
                                    <div class="col-md-3 col-xs-3 avatar">
                                        <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                    <div class="col-md-9 col-xs-9 bubble">
                                        <div class="messages msg_receive">
                                            <p>that mongodb thing looks good, huh?
                                                tiny master db, and huge document store</p>
                                            <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-input">
                        <textarea placeholder="type your message here.."></textarea>
                    </div>
                    <div class="user-list">
                        <ul>
                            <li class="online">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <div class="user-avatar"><img src="asset/img/avatar.jpg" alt="user name"></div>
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="away">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="away">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="offline">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="away">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="online">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="away">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                            <li class="away">
                                <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                    <img src="asset/img/avatar.jpg" alt="user name">
                                    <div class="dot"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="right-menu-notif" class="tab-pane fade">

                <ul class="mini-timeline">
                    <li class="mini-timeline-highlight">
                        <div class="mini-timeline-panel">
                            <h5 class="time">07:00</h5>
                            <p>Coding!!</p>
                        </div>
                    </li>

                    <li class="mini-timeline-highlight">
                        <div class="mini-timeline-panel">
                            <h5 class="time">09:00</h5>
                            <p>Playing The Games</p>
                        </div>
                    </li>
                    <li class="mini-timeline-highlight">
                        <div class="mini-timeline-panel">
                            <h5 class="time">12:00</h5>
                            <p>Meeting with <a href="#">Clients</a></p>
                        </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-warning">
                        <div class="mini-timeline-panel">
                            <h5 class="time">15:00</h5>
                            <p>Breakdown the Personal PC</p>
                        </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-info">
                        <div class="mini-timeline-panel">
                            <h5 class="time">15:00</h5>
                            <p>Checking Server!</p>
                        </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-success">
                        <div class="mini-timeline-panel">
                            <h5 class="time">16:01</h5>
                            <p>Hacking The public wifi</p>
                        </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-danger">
                        <div class="mini-timeline-panel">
                            <h5 class="time">21:00</h5>
                            <p>Sleep!</p>
                        </div>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>

            </div>
            <div id="right-menu-config" class="tab-pane fade">
                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Notification</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-info">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch1"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch1"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Custom Designer</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-danger">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch2"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch2"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Autologin</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-success">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch3"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch3"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Auto Hacking</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-warning">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch4"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch4"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Auto locking</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch5"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch5"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>FireWall</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch6"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch6"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>CSRF Max</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-warning">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch7"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch7"></label>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Man In The Middle</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-danger">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch8"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch8"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                        <h5>Auto Repair</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mini-onoffswitch onoffswitch-success">
                            <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch9"
                                   checked>
                            <label class="onoffswitch-label" for="myonoffswitch9"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <input type="button" value="More.." class="btnmore">
                </div>

            </div>
        </div>
    </div>
    <!-- end: right menu -->
</div>
<div id="mimin-mobile" class="reverse">
    <div class="mimin-mobile-menu-list">
        <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
            <ul class="nav nav-list">
                <li class="active ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                        <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="topnav.html">Top Navigation</a></li>
                        <li><a href="boxed.html">Boxed</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="chartjs.html">ChartJs</a></li>
                        <li><a href="morris.html">Morris</a></li>
                        <li><a href="flot.html">Flot</a></li>
                        <li><a href="sparkline.html">SparkLine</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span>Ui Elements
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="color.html">Color</a></li>
                        <li><a href="weather.html">Weather</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="media.html">Media</a></li>
                        <li><a href="panels.html">Panels & Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltip</a></li>
                        <li><a href="badges.html">Badges & Label</a></li>
                        <li><a href="progress.html">Progress</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="modal.html">Modals</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-check-square-o"></span>Forms
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="formelement.html">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-table"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="datatables.html">Data Tables</a></li>
                        <li><a href="handsontable.html">handsontable</a></li>
                        <li><a href="tablestatic.html">Static</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a href="calendar.html">
                        <span class="fa fa-calendar-o"></span>Calendar
                    </a>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-envelope-o"></span>Mail
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                    </ul>
                </li>
                <li class="ripple">
                    <a class="tree-toggle nav-header">
                        <span class="fa fa-file-code-o"></span>Pages
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                    </a>
                    <ul class="nav nav-list tree">
                        <li><a href="forgotpass.html">Forgot Password</a></li>
                        <li><a href="login.html">SignIn</a></li>
                        <li><a href="reg.html">SignUp</a></li>
                        <li><a href="article-v1.html">Article v1</a></li>
                        <li><a href="search-v1.html">Search Result v1</a></li>
                        <li><a href="productgrid.html">Product Grid</a></li>
                        <li><a href="profile-v1.html">Profile v1</a></li>
                        <li><a href="invoice-v1.html">Invoice v1</a></li>
                    </ul>
                </li>
                <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel <span
                                class="fa-angle-right fa right-arrow text-right"></span> </a>
                    <ul class="nav nav-list tree">
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li class="ripple">
                            <a class="sub-tree-toggle nav-header">
                                <span class="fa fa-envelope-o"></span> Level 1
                                <span class="fa-angle-right fa right-arrow text-right"></span>
                            </a>
                            <ul class="nav nav-list sub-tree">
                                <li><a href="mail-box.html">Level 2</a></li>
                                <li><a href="compose-mail.html">Level 2</a></li>
                                <li><a href="view-mail.html">Level 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="credits.html">Credits</a></li>
            </ul>
        </div>
    </div>
</div>
<button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
    <span class="fa fa-bars"></span>
</button>

<div id="gif" style="display: none"><img src="/images/preload.gif" alt=""></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
