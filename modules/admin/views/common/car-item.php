<?php
/* @var $this yii\web\View */
/* @var $car \app\models\Car */
/* @var $carList array */
?>
<div class="cross-item">
    <select name="ItemCar[]">
        <?foreach($carList as $car){
            $selectedOption = isset($selected) && $selected == $car->id ? 'selected' : ''; ?>
            <option <?=$selectedOption?> value="<?=$car->id?>">
                <?=$car->title?>
            </option>
        <?}?>
    </select>
    <span class="icon-close"></span>
</div>


