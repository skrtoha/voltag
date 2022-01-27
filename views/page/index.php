<?php

/* @var $this yii\web\View */
/* @var $page \app\models\Text */

$this->title = $page->title;
?>

<div class="container">
    <div class="row">
        <h2><?=$this->title?></h2>
        <?=$page->content?>
    </div>
</div>
