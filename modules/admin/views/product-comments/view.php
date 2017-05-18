<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductComments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=> 'product_id',
                'value' =>  $model->product->name
            ],
            [
                'attribute'=> 'user_id',
                'value' =>  $model->user->username
            ],
            'content:ntext',
            'created_at',
            [
                'attribute' => 'status',
                'value' => !$model->status ? "<span class='text-success'>Published</span>" : "<span class='text-danger'>No Published</span>",
                'format' => 'html'
            ],
        ],
    ]) ?>

</div>
