<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $post->title;
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
                        <?= Html::img('@web/images/home/shipping.jpg'); ?>
                    </div><!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
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
                    </div>
                </div><!--/blog-post-area-->
                <div class="response-area">
                    <h2>RESPONSES</h2>
                    <p>If you want leave the comment, <a href="<?=Url::toRoute('site/login')?>">login</a> please! </p>
                    <ul class="media-list">
                        <?php foreach($comments as $item):?>
                        <li class="media">
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i><?=$item->user->username;?></li>
                                    <li><i class="fa fa-calendar"></i><?=$item->created_at;?></li>
                                </ul>
                                <p><?=$item->content;?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div><!--/Response-area-->
                <?php if(!Yii::$app->user->isGuest):?>
                <div class="replay-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-area">
                                <?php $form = ActiveForm::begin()?>
                                <div class="blank-arrow">
                                    <label>Your Comment</label>
                                </div>
                                <span>*</span>
                                <?= $form->field($comment, 'content')->textarea(['rows'=>11])->label(false);?>
                                <?= Html::submitButton('post comment', ['class' => 'btn btn-primary'])?>
                                <?php ActiveForm::end()?>
                            </div>
                        </div>
                    </div>
                </div><!--/Repaly Box-->
                <?php endif;?>
            </div>
        </div>
    </div>
</section>

