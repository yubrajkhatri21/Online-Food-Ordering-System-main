<?php
session_start();

function addToCart($itemId, $itemName, $itemPrice, $quantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$itemId] = array(
            'name' => $itemName,
            'price' => $itemPrice,
            'quantity' => $quantity
        );
    }
}

if (isset($_POST['item_id']) && isset($_POST['item_name']) && isset($_POST['item_price']) && isset($_POST['quantity'])) {
    $itemId = $_POST['item_id'];
    $itemName = $_POST['item_name'];
    $itemPrice = $_POST['item_price'];
    $quantity = $_POST['quantity'];
    addToCart($itemId, $itemName, $itemPrice, $quantity);
    echo "Item added to cart!";
} else {
    echo "Item ID, name, price, and quantity are required!";
}
?>
