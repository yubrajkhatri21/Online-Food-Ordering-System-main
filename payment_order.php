<?php
session_start();
include 'dbcon.php'; // Ensure this file has the correct connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if payment method is set and not empty
    if (isset($_POST["payment_method"]) && !empty($_POST["payment_method"])) {
        $paymentMethod = $_POST["payment_method"];

        // Check if user is logged in and has items in the cart
        if (isset($_SESSION['loggedin']) && isset($_SESSION['user_id']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Process payment based on the selected method
            if ($paymentMethod == "cod") {
                // Handle Cash on Delivery payment
                $message = processOrder($conn); // Assume processOrder function is defined in this file
            } elseif ($paymentMethod == "epayment") {
                // Handle Electronic Payment
                // Add your e-payment processing logic here
                // This could involve redirecting to a payment gateway or integrating with a third-party service
                $message = "Electronic payment processing will be implemented soon."; // Placeholder message
            } else {
                $message = "Invalid payment method.";
            }
        } else {
            $message = "Error: User not logged in or empty cart.";
        }
    } else {
        $message = "Error: Payment method not selected.";
    }
} else {
    $message = "Error: Invalid request method.";
}

// Redirect back to the confirmation page with the appropriate message
$_SESSION['payment_message'] = $message;
header("Location: order_confirmation.php");
exit();

// Function to process the order (you can place this function in a separate file and include it)
function processOrder($conn) {
    // Insert order details into the database and clear the cart
    // Example implementation:
    // $userId = $_SESSION['user_id'];
    // $totalAmount = calculateTotalAmount($_SESSION['cart']);
    // $orderId = insertOrderDetails($conn, $userId, $totalAmount);
    // insertOrderItems($conn, $orderId, $_SESSION['cart']);
    // clearCart();

    // Placeholder message
    $message = "Order processed successfully.";

    return $message;
}
?>
