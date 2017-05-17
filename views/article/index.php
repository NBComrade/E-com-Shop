<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Blog | Eshopper';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category </h2>
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
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
                    <?php foreach($posts as $post):?>
                        <div class="single-blog-post">
                        <h3><?=$post->title;?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i><?=$post->user->username;?></li>
                                <li><i class="fa fa-calendar"></i><?=$post->created_at;?></li>
                            </ul>
                        </div>
                        <a href="<?=Url::toRoute(['article/view', 'id' =>  $post->id]);?>">
                            <?= Html::img('@web/images/' . $post->img ); ?>
                        </a>
                        <p><?=$post->content;?></p>
                        <a  class="btn btn-primary" href="<?=Url::toRoute(['article/view', 'id' =>  $post->id]);?>">Read More</a>
                    </div>
                    <?php endforeach;?>


                    <div class="pagination-area">
                        <?php
                            echo LinkPager::widget([
                                'pagination' => $pages
                            ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

