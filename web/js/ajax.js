$(".add-to-cart").on('click', function(e){
    e.preventDefault();

    var id = $(this).data('id');
    var qty = $("#qty").val();

    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
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
$("#show-cart").on('click', function(e){
    e.preventDefault();
    $.ajax({
        url: '/cart/show',
        data: {id: ''},
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
