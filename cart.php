<?php
session_start();

function displayCart() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table class='cart-table'>";
        echo "<tr><th>Item Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Actions</th></tr>";
        $total = 0;
        foreach ($_SESSION['cart'] as $itemId => $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['name']) . "</td>";
            echo "<td>Rs. " . htmlspecialchars($item['price']) . "</td>";
            echo "<td><input type='number' class='update-quantity' data-item-id='" . $itemId . "' value='" . htmlspecialchars($item['quantity']) . "' min='1'></td>";
            echo "<td>Rs. " . htmlspecialchars($itemTotal) . "</td>";
            echo "<td><button class='remove-item' data-item-id='" . $itemId . "'>Remove</button></td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='3'>Grand Total</td><td>Rs. " . htmlspecialchars($total) . "</td><td></td></tr>";
        echo "</table>";
    } else {
        echo "<p>Your cart is empty!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .cart-table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .cart-table td input {
            width: 50px;
        }
        .remove-item {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .remove-item:hover {
            background-color: #d32f2f;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #45a049;
        }
        #cart-contents p {
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <div id="cart-contents">
        <?php displayCart(); ?>
    </div>
    <a href="menu.php">Continue Shopping</a>
    <a href="checkout.php">Check Out</a>

    <script>
    $(document).ready(function() {
        // Update cart count
        function updateCartCount() {
            $.ajax({
                url: 'cart_count.php',
                type: 'GET',
                success: function(response) {
                    $('#cart-count').text(response);
                }
            });
        }

        // Update item quantity
        $('.update-quantity').on('change', function() {
            var itemId = $(this).data('item-id');
            var newQuantity = $(this).val();

            $.ajax({
                url: 'update_cart.php',
                type: 'POST',
                data: { item_id: itemId, quantity: newQuantity },
                success: function(response) {
                    alert(response); // Optional: Display a message to the user
                    location.reload(); // Reload the page to update the cart display
                }
            });
        });

        // Remove item from cart
        $('.remove-item').on('click', function() {
            var itemId = $(this).data('item-id');

            $.ajax({
                url: 'remove_from_cart.php',
                type: 'POST',
                data: { item_id: itemId },
                success: function(response) {
                    alert(response); // Optional: Display a message to the user
                    location.reload(); // Reload the page to update the cart display
                }
            });
        });
    });
    </script>
</body>
</html>
