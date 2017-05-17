<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php foreach($articles as $article):?>
<div class="col-sm-3">
    <div class="video-gallery text-center">
        <a href="<?=Url::toRoute(['article/view', 'id' =>  $article->id])?>">
            <div class="iframe-img">
                <?php echo Html::img("@web/images/" . $article->img) ?>
            </div>
            <div class="overlay-icon">
                <i class="fa fa-play-circle-o"></i>
            </div>
        </a>
        <p><?=$article->title;?></p>
        <h2><?= substr($article->created_at, 0, 10);?></h2>
    </div>
</div>
<?php endforeach;?>