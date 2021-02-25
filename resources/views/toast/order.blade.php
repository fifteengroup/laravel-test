<div class="order-toast-container position-fixed bottom-0 right-0 p-3"
    style="z-index: 5; right: 0; bottom: 0;"></div>
<div id="orderToastTemplate">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="mr-auto">Order created!</strong>
            <small>30 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div>Product Name: <span class="product-name"></span></div>
            <div>Price: <span class="price"></span></div>
            <div>Quantity: <span class="quantity"></span></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var orderToastTemplate = $('#orderToastTemplate').children().clone();
        $('#orderToastTemplate').remove();

        var thirtyMins = 30 * 60 * 1000;
        $.ajax({
            url: 'orders/list',
            data: {
                createdAtGreaterThan: (new Date(Date.now() - thirtyMins))
                    .toISOString()
            }
        })
            .done(function(data) {
                data = data || [];
                var now = Date.now();
                data.forEach(function(order) {
                    var createdAt = new Date(order.created_at);
                    setTimeout(function() {
                        var toast = orderToastTemplate.clone();
                        toast.find('.toast-body .product-name').html('' + order.product_name);
                        toast.find('.toast-body .price').html('' + order.price);
                        toast.find('.toast-body .quantity').html('' + order.quantity);
                        $('.order-toast-container').prepend(toast);
                        toast.toast({
                            delay: 3000
                        })
                            .toast('show');
                    }, thirtyMins - (now - createdAt));
                });
            });
    });
</script>
