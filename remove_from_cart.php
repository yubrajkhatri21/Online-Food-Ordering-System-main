<?php
session_start();

if (isset($_POST['item_id'])) {
    $itemId = $_POST['item_id'];

    if (isset($_SESSION['cart'][$itemId])) {
        unset($_SESSION['cart'][$itemId]);
        echo "Item removed successfully.";
    } else {
        echo "Item not found in the cart.";
    }
} else {
    echo "Invalid request.";
}
?>
