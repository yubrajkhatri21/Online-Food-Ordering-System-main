<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jhatpat Foods - Checkout & Payment</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        /* Your custom styles here */
        /* Adjust styles to match the design of your website */
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout & Payment</h1>
    </div>
    <div class="main-contain container">
        <h1>Payment Option</h1>
        <input type="radio" id="showForm1" name="showForm" value="form1" checked>
        <label for="showForm1"> Cash on Delivery </label>
        <form id="form1">
            <!-- Your checkout form fields here for Cash on Delivery -->
            <!-- Example: Full Name, Phone Number, Email, Delivery Address -->
        </form>

        <input type="radio" id="showForm2" name="showForm" value="form2">
        <label for="showForm2"> Online Payment </label>
        <form id="form2" class="hidden">
            <!-- Your online payment form fields here -->
            <!-- Example: Credit Card Number, Expiry Date, CVV -->
        </form>
    </div>

    <script>
        // JavaScript to toggle between payment options
        const showForm1Radio = document.getElementById('showForm1');
        const showForm2Radio = document.getElementById('showForm2');
        const form1 = document.getElementById('form1');
        const form2 = document.getElementById('form2');

        showForm1Radio.addEventListener('click', () => {
            form1.classList.remove('hidden');
            form2.classList.add('hidden');
        });

        showForm2Radio.addEventListener('click', () => {
            form1.classList.add('hidden');
            form2.classList.remove('hidden');
        });
    </script>

    <!-- Bootstrap and jQuery scripts -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
