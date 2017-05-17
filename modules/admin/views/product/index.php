<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img',
            'name',
            [
              'attribute' => 'category_id',
              'value' => function($data){
                  return $data->category->name;
              }
            ],
            [
                'attribute' => 'hit',
                'value' => function($data){
                    return !$data->hit ? "<span class='text-success'>Yes</span>" : "<span class='text-danger'>No</span>" ;
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'new',
                'value' => function($data){
                    return !$data->new ? "<span class='text-success'>Yes</span>" : "<span class='text-danger'>No</span>" ;
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'sale',
                'value' => function($data){
                    return !$data->sale ? "<span class='text-success'>Yes</span>" : "<span class='text-danger'>No</span>" ;
                },
                'format' => 'html'
            ],
            'price',
            // 'keywords',
            // 'description',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
