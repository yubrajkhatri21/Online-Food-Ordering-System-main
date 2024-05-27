<?php
session_start();
@include 'dbcon.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $delete_all_query = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $delete_all_query->bind_param('i', $user_id);
    if ($delete_all_query->execute()) {
        header('Location: cart.php');
    } else {
        echo "Failed to clear cart.";
    }
}
?>
