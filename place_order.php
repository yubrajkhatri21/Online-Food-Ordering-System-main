<?php
session_start();
include('dbcon.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $total_price = $_POST['total_price'];

    // Insert the order into the orders table
    $order_query = $conn->prepare("INSERT INTO orders (user_id, address, payment_method, total_price, status) VALUES (?, ?, ?, ?, 'Pending')");
    $order_query->bind_param('isss', $user_id, $address, $payment_method, $total_price);

    if ($order_query->execute()) {
        $order_id = $order_query->insert_id;

        // Move items from cart to order_items table
        $cart_query = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
        $cart_query->bind_param('i', $user_id);
        $cart_query->execute();
        $cart_result = $cart_query->get_result();

        while ($cart_item = $cart_result->fetch_assoc()) {
            $item_id = $cart_item['item_id'];
            $quantity = $cart_item['quantity'];
            $price = $cart_item['price'];

            $order_item_query = $conn->prepare("INSERT INTO order_items (order_id, item_id, quantity, price) VALUES (?, ?, ?, ?)");
            $order_item_query->bind_param('iiis', $order_id, $item_id, $quantity, $price);
            $order_item_query->execute();
        }

        // Clear the cart
        $clear_cart_query = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $clear_cart_query->bind_param('i', $user_id);
        $clear_cart_query->execute();

        echo "<script>alert('Order placed successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to place order.'); window.location.href='checkout.php';</script>";
    }
} else {
    header("Location: checkout.php");
}
?>
