<?php
/* @var $this \yii\web\View */
/* @var $items array */
/* @var $item \app\models\Item */

$this->title = 'Оформление заказа';
\app\assets\OrderAsset::register($this);
?>
<div id="order" class="container">
    <form action="">
        <div class="order-customer">
            <div class="form-group">
                <label for="name">Имя</label>
                <input required class="form-control" id="name" type="text" name="name" value="">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input required class="form-control" id="phone" type="text" name="phone" value="">
            </div>
            <div class="form-group">
                <label for="email">Адрес e-mail</label>
                <input required class="form-control" id="email" type="text" name="email" value="">
            </div>
        </div>
        <table class="order-items">
            <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th></th>
                </tr>
            </thead>
            <?$totalSumm = 0;
            foreach($items as $item){
                $totalSumm += $item['price'] * $item['quan'];
                ?>
                <tr item_id="<?=$item['id']?>">
                    <td>
                        <div class="image-wrap">
                            <img src="<?=Yii::$app->params['imgUrl']?><?=$item['file_path']?>" alt="">
                        </div>
                    </td>
                    <td>
                        <input type="hidden" name="items[item_id][]" value="<?=$item['id']?>">
                        <span class="item-title"><?=$item['brend']?> <?=$item['article']?> <?=$item['title']?></span>
                    </td>
                    <td class="item-price-td">
                        <input type="hidden" name="items[price][]" value="<?=$item['price']?>">
                        <span class="item-price"><?=$item['price']?></span> руб.
                    </td>
                    <td>
                        <div class="order-counter">
                            <button class="up">+</button>
                            <input type="text" name="items[quan][]" value="<?=$item['quan']?>">
                            <button class="down">-</button>
                        </div>
                    </td>
                    <td class="td-summ">
                        <span class="summ"><?=$item['quan'] * $item['price']?></span> руб.
                    </td>
                    <td>
                        <span title="Удалить" class="icon-bin"></span>
                    </td>
                </tr>
            <?}?>
            <tr>
                <td colspan="6"><b>Итого:</b> <span id="order-total-summ"><?=$totalSumm?></span> руб.</td>
            </tr>
        </table>
        
        
    </form>
</div>
