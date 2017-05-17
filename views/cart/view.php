<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):?>
                <tr class="cart-product-<?=$id;?>">
                    <td><img  width="50px" height="50px" src="/images/products/<?= $item['img']?>" alt=""></td>
                    <td><?= $item['name']?></td>
                    <td>
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href=""  data-id="<?=$id?>"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="<?= $item['qty']?>" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href=""  data-id="<?=$id?>"> - </a>
                        </div>

                    </td>
                    <td><?= $item['price']?></td>
                    <td><a href='#' class="delete-from-cart" data-id="<?=$id?>"><i class="fa fa-times"></i></a></td>
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
<?php else: ?>
    <h3>No items in the cart!</h3>
<?php endif;?>
<script>
    $(".delete-from-cart").on('click', function(e){
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: '/cart/clear',
            data: {id: id},
            type: 'GET',
            success : function(res){
                $('.modal-body').html(res);
                $("#cart").modal();
            },
            error: function(error){
                console.log(error);
            }
        });

    });

    $(".delete-basket").on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: '/cart/delete',
            type: 'GET',
            success : function(res){
                $('.modal-body').html(res);
                $("#cart").modal();
            },
            error: function(error){
                console.log(error);
            }
        });

    });

    $(".cart_quantity_up").on('click', function(e){
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: '/cart/plus',
            data: {id: id},
            type: 'GET',
            success : function(res){
                $('.modal-body').html(res);
                $("#cart").modal();
            },
            error: function(error){
                console.log(error);
            }
        });

    });
    $(".cart_quantity_down").on('click', function(e){
        e.preventDefault();

        var id = $(this).data('id');

        $.ajax({
            url: '/cart/minus',
            data: {id: id},
            type: 'GET',
            success : function(res){
                $('.modal-body').html(res);
                $("#cart").modal();
            },
            error: function(error){
                console.log(error);
            }
        });

    });
</script>
