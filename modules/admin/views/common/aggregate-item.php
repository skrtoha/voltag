<?php
/* @var $this yii\web\View */
/* @var $item \app\models\Item */
/* @var $itemList array */
?>
<div class="aggregate-item">
    <select name="ItemAggregate[]">
        <?foreach($itemList as $item){
            $selectedOption = isset($selected) && $selected == $item->id ? 'selected' : ''; ?>
            <option <?=$selectedOption?> value="<?=$item->id?>">
                <?=$item->brend?> <?=$item->article?> <?=$item->title?>
            </option>
        <?}?>
    </select>
    <span class="icon-close"></span>
</div>


