<?php
session_start();

if (isset($_POST['item_id']) && isset($_POST['quantity'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]['quantity'] = $quantity;
        echo "Quantity updated successfully.";
    } else {
        echo "Item not found in the cart.";
    }
} else {
    echo "Invalid request.";
}
?>
