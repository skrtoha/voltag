<?php

use yii\helpers\Html;

/* @var $uploadForm \app\models\UploadForm */
/* @var array $brendList */
/* @var array $categoryList */
/* @var array $filterValues */
/* @var array $crossList */
/* @var array $carList */
/* @var array $itemCarList array */
/* @var array $itemCrossList */
/* @var $this yii\web\View */
/* @var $itemValues \app\models\ItemValue */
/* @var $model app\models\Category */

$this->title = 'Обновить: ' . $model->title;
?>
<?=$this->render('/common/pannel-title', ['title' => $this->title])?>
<div class="item-update panel-body">
    <?= $this->render('_form', [
        'model' => $model,
        'brendList' => $brendList,
        'carList' => $carList,
        'itemCarList' => $itemCarList,
        'categoryList' => $categoryList,
        'filterValues' => $filterValues,
        'itemValues' => $itemValues,
        'crossList' => $crossList,
        'itemCrossList' => $itemCrossList,
        'uploadForm' => $uploadForm
    ]) ?>
</div>
