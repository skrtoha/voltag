<?php
/* @var ActiveDataProvider $dataProvider */
/* @var array $treeCategory */
/* @var string $sort */
/* @var $this \yii\web\View */
/* @var $filterValues array */
/* @var $filter array */
/* @var $query array */

use yii\data\ActiveDataProvider;

$this->title = 'Каталог';

\app\assets\CategoryAsset::register($this);
?>
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <div class="col-lg-3 col-sm-4 ">
                <div class="hot-properties hidden-xs">
                    <h4>КАТАЛОГ</h4>
                    <div id="treeCategory">
                        <script>
                            let tree = JSON.parse('<?=json_encode($treeCategory)?>');
                        </script>
                    </div>
                </div>
                <?if (!empty($filterValues['countable'])){?>
                    <div class="hot-properties hidden-xs filter_wrapper">
                        <form action="">
                            <?foreach($filterValues['countable'] as $filter_id => $fv){
                                if (isset($query[$filter_id])){
                                    $array = explode(';', $query[$filter_id]);
                                    $from = $array[0];
                                    $to = $array[1];
                                }
                                else{
                                    $from = $fv['min'];
                                    $to = $fv['to'];
                                }
                                ?>
                                <div class="filter slider">
                                    <p><?=$filter[$filter_id]['title']?>, <?=$filter[$filter_id]['signment']?></p>
                                    <input
                                            data-type="double"
                                            data-min="<?=$fv['min']?>"
                                            data-max="<?=$fv['max']?>"
                                            data-from="<?=$from?>"
                                            data-to="<?=$to?>"
                                            type="text"
                                            class="js-range-slider"
                                            name="filter[<?=$filter_id?>]"
                                            value=""
                                    />
                                </div>
                            <?}?>
                            <div class="filter">
                                <input type="submit" value="Показать">
                            </div>
                        </form>

                    </div>
                <?}?>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-right">
                        <form action="">
                            <select class="form-control" name="sort">
                                <option>Сортировать по...</option>
                                <option <?=$sort == 'asc' ? 'selected' : ''?> value="asc">Цена: от дешовых к дорогим</option>
                                <option <?=$sort == 'desc' ? 'selected' : ''?> value="desc">Цена: от дорогих к дешовым</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div id="catalog">
                    <?=\yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_category-item'
                    ])?>
                </div>
            </div>
        </div>
    </div>
</div>
