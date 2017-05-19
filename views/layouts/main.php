<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use \app\components\ArticleWidget;
use app\assets\AppAsset;
use app\assets\LtAppAsset;
use yii\helpers\Url;
AppAsset::register($this);
LtAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i><?=Yii::$app->params['adminPhone']?></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i><?=Yii::$app->params['adminEmail']?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="<?=Yii::$app->params['fb']?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?=Yii::$app->params['tw']?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?=Yii::$app->params['in']?>"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?=Yii::$app->params['yt']?>"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="<?=Yii::$app->params['g+']?>"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?=Url::home();?>"><img src="/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#" id="show-cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php if(Yii::$app->user->isGuest):?>
                                <li><a href="<?=Url::toRoute('site/login')?>"><i class="fa fa-lock"></i> Login</a></li>
                            <?php else: ?>
                                <li><a href="<?=Url::toRoute('/site/logout')?>"><i class="fa fa-lock"></i> Logout</a></li>
                            <?php endif;?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?=Url::home();?>" class="active">Home</a></li>
                            <li class="dropdown"><a href="<?=Url::toRoute('product/')?>">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=Url::toRoute('product/')?>">Products</a></li>
                                    <li><a href="#" class="show-cart" >Cart</a></li>
                                    <li><a href="<?=Url::toRoute('site/login');?>">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=Url::toRoute('article/');?>">Blog</a></li>

                            </li>
                            <li><a href="<?=Url::toRoute('site/contact');?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?=Url::toRoute('category/search')?>">
                            <input type="text" placeholder="Search" name="q"/>
                            <button class="search-button" type="submit"></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content; ?>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <?= ArticleWidget::widget(); ?>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <?=date('Y');?> E-SHOPPER Inc. All rights reserved.</p>

            </div>
        </div>
    </div>

</footer><!--/Footer-->
<?php $this->endBody() ?>
<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Cart</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => "<button type='button' class='btn btn-default' data-dismiss='modal'>Continue</button>
        <a href=" . Url::toRoute('cart/order') . " class='btn btn-success'>Get order</a>
        <button type='button' class='btn btn-danger delete-basket'>Clear cart</button>"
]);

\yii\bootstrap\Modal::end();
$this->registerJsFile('@web/js/ajax.js');
?>

</body>
</html>
<?php $this->endPage() ?>