<?php
// session_start();

function getCartCount() {
    if (isset($_SESSION['cart'])) {
        return count($_SESSION['cart']);
    } else {
        return 0;
    }
}

// Return the cart count
echo getCartCount();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-cart-button').click(function() {
        var itemId = $(this).data('item-id');
        var itemName = $(this).data('item-name');
        var itemPrice = $(this).data('item-price');

        $.ajax({
            url: 'update_cart_update.php',
            type: 'POST',
            data: {
                item_id: itemId,
                item_name: itemName,
                item_price: itemPrice
            },
            success: function(response) {
                $('#cart-logo').text(response);
            }
        });
    });
});
</script>
