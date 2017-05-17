<?php
use yii\helpers\Url;
?>
<ul class="nav nav-pills nav-stacked">
    <?php foreach($content as $category):?>
        <li><a href="<?= Url::to(['category/view', 'id' => $category->id])?>"><?=$category->name;?></a></li>
    <?php endforeach;?>
</ul>