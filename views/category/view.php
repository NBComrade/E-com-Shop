<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */

$this->title = "{$category->name} | Eshopper";

?>
<section id="advertisement">
    <div class="container">
        <img src="/images/shop/1.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row product-row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog">
                        <?=
                            \app\components\MenuWidget::widget(['tpl' => 'menu'])
                        ?>
                    </ul>
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?=
                                    \app\components\CategoryWidget::widget()
                                ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?= $category->name;?></h2>
                    <?php if(!empty($products)):?>
                        <?php $i = 0; foreach($products as $product):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?=Html::img("@web/images/products/{$product->img}")?>
                                            <h2>$<?=$product->price;?></h2>
                                            <p><a href="<?= Url::to(['product/view', 'id' => $product->id])?>"><?=$product->name;?></a></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="choose">

                                    </div>
                                </div>
                            </div>
                            <?php $i++; if($i % 3 == 0):?>
                                      <div class="clearfix"></div>
                             <?php endif;?>
                        <?php endforeach;?>
                        <div class="clearfix"></div>
                        <?php
                            echo LinkPager::widget([
                                'pagination' => $pages
                            ]);
                        ?>
                    <?php else:?>
                        <p>No goods in this category!</p>
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
