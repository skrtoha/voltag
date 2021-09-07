<?php
/* @var $this yii\web\View */
/* @var $cross \app\models\Cross */
/* @var $crossList array */
?>
<div class="cross-item">
    <select name="ItemCross[]">
        <?foreach($crossList as $cross){
            $selectedOption = isset($selected) && $selected == $cross->id ? 'selected' : ''; ?>
            <option <?=$selectedOption?> value="<?=$cross->id?>">
                <?=$cross->brendTitle?> - <?=$cross->title?>
            </option>
        <?}?>
    </select>
    <span class="icon-close"></span>
</div>


