<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'value' => function($data){
                    return $data->product->name;
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
                    return !$data->status ? "<span class='text-success'>Published</span>" : "<span class='text-danger'>No Published</span>" ;
                },
                'format' => 'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
