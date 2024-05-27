<?php
// Start the session
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include('dbcon.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);

    // Insert order details into database
    $stmt = $conn->prepare("INSERT INTO order_details (email, phone, address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $phone, $address);
    $stmt->execute();
    $stmt->close();

    // Redirect to order confirmation page
    $_SESSION['payment_message'] = "Your order has been confirmed. Thank you!";
    header("Location: order_confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
        }
        form {
            margin-top: 20px;
            text-align: left;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Order Confirmation</h1>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // Check if payment message is set in the session
        if (isset($_SESSION['payment_message'])) {
            $message = $_SESSION['payment_message'];
            echo '<p>' . htmlspecialchars($message) . '</p>';
            // Remove payment message from session
            unset($_SESSION['payment_message']);
        } else {
            // If payment message is not set, display a generic message
            echo '<p>Your order has been confirmed. Thank you!</p>';
        }
    } else {
        // If the user is not logged in, display a message
        echo '<p>User is not logged in.</p>';
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone" required><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>
        <input type="submit" value="Proceed to Payment">
    </form>
    <a href="menu.php">Continue Shopping</a>
</body>
</html>
