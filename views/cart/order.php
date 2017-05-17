<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Order | Eshopper'
?>
<div class="container">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
    <?php if(!empty($session['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sum</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($session['cart'] as $id => $item):?>
                    <tr>
                        <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'height' => 50]) ?></td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><?= $item['qty'] * $item['price']?></td>
                    </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="4">Total: </td>
                    <td><?= $session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">Shipping: </td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td colspan="4">Sum price: </td>
                    <td><?= $session['cart.sum']?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr/>
        <?php $form = ActiveForm::begin()?>
        <?= $form->field($order, 'name')?>
        <?= $form->field($order, 'email')?>
        <?= $form->field($order, 'phone')?>
        <?= $form->field($order, 'address')?>
        <?= Html::submitButton('Get Order', ['class' => 'btn btn-primary'])?>
        <?php ActiveForm::end()?>
    <?php else: ?>
        <h3>No items in basket!</h3>
    <?php endif;?>
</div>