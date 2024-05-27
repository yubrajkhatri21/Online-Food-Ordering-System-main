<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f4f4f4;
        }
        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        a:hover {
            background-color: #45a049;
        }
        form {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p><?php echo isset($message) ? htmlspecialchars($message) : "Your order has been confirmed. Thank you!"; ?></p>
    <form action="payment_order.php" method="post">
        <label>
            <input type="radio" name="payment_method" value="cod" checked>
            Cash on Delivery
        </label>
        <label>
            <input type="radio" name="payment_method" value="epayment">
            Esewa
        </label>
        <button type="submit">Proceed to Payment</button>
    </form>
    <a href="menu.php">Continue Shopping</a>
</body>
</html>
