<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):?>
                <tr class="cart-product-<?=$id;?>">
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="4">Total:</td>
                <td><?= $session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">Sum:</td>
                <td class="cart_info"><p class="cart_total_price">$<?= $session['cart.sum']?></p></td>
            </tr>
            </tbody>
        </table>
    </div>