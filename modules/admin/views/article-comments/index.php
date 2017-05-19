<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'article_id',
                'value' => function($data){
                    return $data->article->title;
                },
            ],
            [
                'attribute' => 'user_id',
                'value' => function($data){
                    return $data->user->username;
                },
            ],
            'content:ntext',
            'created_at',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ? "<span class='text-danger'> No Published</span>" : "<span class='text-success'>Published</span>" ;
                },
                'format' => 'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
