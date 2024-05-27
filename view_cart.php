<?php
// session_start();

function displayCart() {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table border='1'>";
        echo "<tr><th>Item Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>";
        $total = 0;
        foreach ($_SESSION['cart'] as $itemId => $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['name']) . "</td>";
            echo "<td>Rs. " . htmlspecialchars($item['price']) . "</td>";
            echo "<td>" . htmlspecialchars($item['quantity']) . "</td>";
            echo "<td>Rs. " . htmlspecialchars($itemTotal) . "</td>";
            echo "<td>";
            echo "<form class='remove-from-cart-form' method='post' action='remove_from_cart.php'>";
            echo "<input type='hidden' name='item_id' value='" . htmlspecialchars($itemId) . "'>";
            echo "<button type='submit'>Remove</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='3'>Grand Total</td><td>Rs. " . htmlspecialchars($total) . "</td><td></td></tr>";
        echo "</table>";
    } else {
        echo "Your cart is empty!";
    }
}

// Display the cart
displayCart();
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        td {
            text-align: center;
        }
        form {
            margin: 0;
        }
        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
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
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <div id="cart-contents">
        <?php displayCart(); ?>
    </div>
    <a href="menu.php">Continue Shopping</a>
</body>
</html>
