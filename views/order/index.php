<?php
/* @var $this \yii\web\View */
/* @var $items array */
/* @var $item \app\models\Item */

$this->title = 'Оформление заказа';
\app\assets\OrderAsset::register($this);
?>
<div id="order" class="container">
    <?if (isset($items)){?>
        <form action="" method="post">
            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
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
                <div class="form-group">
                    <label>Способ доставки</label>
                    <select class="form-control" name="delivery">
                        <option value="Самовывоз">Самовывоз</option>
                        <option value="Курьерская доставка по Санкт-Петербургу">
                            Курьерская доставка по Санкт-Петербургу
                        </option>
                        <option value="Доставка по России">Доставка по России</option>
                    </select>
                </div>
                <div class="form-group addressee">
                    <label for="addressee">Адрес доставки</label>
                    <input type="text" class="form-control" id="addressee" name="addressee">
                </div>
                <div class="form-group pay_type">
                    <label>Способ доставки</label>
                    <select class="form-control" name="pay_type">
                        <option value="Онлайн на сайте">Онлайн на сайте</option>
                        <option value="Наложенный платеж">Наложенный платеж</option>
                    </select>
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
            <div class="form-group comment">
                <label for="comment">Комментарий к заказу</label>
                <textarea  class="form-control" name="comment" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="Заказать">
        </form>
    <?}
    else{?>
        <p>Товаров для заказа не обнаружено!</p>
    <?}?>
</div>
