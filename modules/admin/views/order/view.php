<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Order №<?= Html::encode($this->title) ?></h1>

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
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status ? "<span class='text-danger'>Active</span>" : "<span class='text-success'>Close</span>",

                'format' => 'html'
            ],
            'name',
            'email:email',
            'phone',
            'address',
            'created_at',
        ],
    ]) ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model->orderItems as $item):?>
                <tr class="cart-product">
                    <td><?= $item['name']?></td>
                    <td>
                        <div class="cart_quantity_button">
                           <p><?= $item['qty_item']?></p>
                        </div>

                    </td>
                    <td><?= $item['price']?></td>
                    <td class="cart_info"><p class="cart_total_price">$<?= $item['sum_item']?></p></td>
                </tr>
            <?php endforeach;?>
                <tr>
                    <td>Sum</td>
                    <td></td>
                    <td></td>
                    <td>$<?=$model->sum;?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
