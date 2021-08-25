<?php
/* @var $this yii\web\View */
/* @var $category \app\models\Category */

$this->title = $category->title;
\app\assets\CategoryAsset::register($this);
?>
<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 ">

                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
                    <input type="text" class="form-control" placeholder="Search of Properties">
                    <div class="row">
                        <div class="col-lg-5">
                            <select class="form-control">
                                <option>Buy</option>
                                <option>Rent</option>
                                <option>Sale</option>
                            </select>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Price</option>
                                <option>$150,000 - $200,000</option>
                                <option>$200,000 - $250,000</option>
                                <option>$250,000 - $300,000</option>
                                <option>$300,000 - above</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control">
                                <option>Property Type</option>
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Office Space</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary">Find Now</button>

                </div>

                <div class="hot-properties hidden-xs">
                    <h4>КАТАЛОГ</h4>
                    <div id="treeCategory">
                        <script>
                            let tree = JSON.parse('<?=json_encode($treeCategory)?>');
                        </script>
                    </div>
                </div>


            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-right">
                        <select class="form-control">
                            <option>Sort by</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select></div>

                </div>
            </div>
        </div>
    </div>
</div>
