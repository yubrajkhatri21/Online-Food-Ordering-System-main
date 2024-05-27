<?php
session_start();
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        .menu-container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .menu-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .menu-item {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .menu-item img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
            border-radius: 8px;
        }
        .menu-item h3 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }
        .menu-item p {
            margin: 5px 0;
        }
        .menu-item button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .menu-item button:hover {
            background-color: #218838;
        }
        .menu-item:last-child {
            border-bottom: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.add-to-cart-form').on('submit', function(event) {
            event.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: 'add_to_cart.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert(response); // Optional: Display a message to the user
                    updateCartCount();
                }
            });
        });

        function updateCartCount() {
            $.ajax({
                url: 'cart_count.php',
                type: 'GET',
                success: function(response) {
                    $('#cart-count').text(response);
                }
            });
        }

        // Initial cart count update
        updateCartCount();
    });
    </script>
</head>
<body>
    <div class="page-wrapper">

        <?php include 'header.php'; ?>

        <div class="menu-container">
            <div class="menu-header">Our Menu</div>
            <?php
            $query = "SELECT * FROM menu";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="menu-item">';
                    echo '<img src="./dataimg/' . strtolower($row['image']) . '" alt="' . $row['name'] . '">';
                    echo '<div>';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>' . $row['detail'] . '</p>';
                    echo '<p>Price: Rs. ' . $row['price'] . '</p>';
                    echo '<form class="add-to-cart-form" data-id="' . $row['id'] . '">';
                    echo '<input type="hidden" name="item_id" value="' . $row['id'] . '">';
                    echo '<input type="hidden" name="item_name" value="' . $row['name'] . '">';
                    echo '<input type="hidden" name="item_price" value="' . $row['price'] . '">';
                    echo '<label for="quantity_' . $row['id'] . '">Quantity:</label>';
                    echo '<input type="number" id="quantity_' . $row['id'] . '" name="quantity" value="1" min="1">';
                    echo '<button type="submit">Add to Cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No menu items found.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
