<?php
session_start();
if (isset($_SESSION['uid'])) {
	include ('dbcon.php');
	$uid = $_SESSION['uid'];
	$query = "SELECT * FROM `user` WHERE `id` = '$uid'";
	$run = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($run);
} else {

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Jhatpat Foods</title>
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
		integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Bootstrap -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script> -->
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Pacifico&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="./css/main.css">
</head>

<body>
	<div class="main">

		<div class="logout">
			<?php
			if (isset($_SESSION['uid'])) {
				?><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Logout</a><?php
			} else {

			}
			?>
		</div>
		<div class="log-reg">
			<?php
			if (isset($_SESSION['uid'])) {
				?><a href="ulogin/account.php"><i class="fa fa-user" aria-hidden="true">&nbsp;</i><?php echo $data['name'] ?></a><?php
			} else {
				?><a href="login.php">Login/Sign up</a><?php
			}
			?>
		</div>

		<div class="site-title">
			<h1 class="title">Jhatpat Foods</h1>
		</div>

		<div class="site-menu">
			<?php
			if (isset($_SESSION['uid'])) {
				?><a href="menu.php">MENU</a><?php
			} else {
				?><a href="menu.php">MENU</a><?php
			}
			?>
		</div>
		<div class="site-steps">
			<div class="site-action">
				<div class="food-icons"><i class="fa-solid fa-location-dot"></i></div>
				<button type="button" class="action-btn">Choose Location</button>
			</div>
			<div class="site-action">
				<div class="food-icons"><i class="fa-solid fa-bowl-food"></i></div>
				<button type="button" class="action-btn">Order Food</button>
			</div>
			<div class="site-action">
				<div class="food-icons"><i class="fa-solid fa-truck"></i></div>
				<button type="button" class="action-btn">Delivery</button>
			</div>

		</div>
	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>

	
<!-- 
    // Your PHP code to display the menu items
    // foreach ($menuItems as $item) {
    //     echo '<div class="menu-item">';
    //     echo '<img src="./dataimg/' . strtolower($item['name']) . '.jpg" alt="' . $item['name'] . '">';
    //     echo '<div>';
    //     echo '<h3>' . $item['name'] . '</h3>';
    //     echo '<p>' . $item['description'] . '</p>';
    //     echo '<p>Price: Rs. ' . $item['price'] . '</p>';
    //     echo '<form class="add-to-cart-form" data-item-id="' . $item['id'] . '">';
    //     echo '<input type="hidden" name="item_id" value="' . $item['id'] . '">';
    //     echo '<input type="hidden" name="item_name" value="' . $item['name'] . '">';
    //     echo '<input type="hidden" name="item_price" value="' . $item['price'] . '">';
    //     echo '<label for="quantity_' . $item['id'] . '">Quantity:</label>';
    //     echo '<input type="number" id="quantity_' . $item['id'] . '" name="quantity" value="1" min="1">';
    //     echo '<button type="submit">Add to Cart</button>';
    //     echo '</form>';
    //     echo '</div>';
    //     echo '</div>';
    // }
    // ?> -->

    
<script>
$(document).ready(function() {
    $('.remove-from-cart-form').on('submit', function(event) {
        event.preventDefault();

        var form = $(this);
        var itemId = form.data('item-id');

        $.ajax({
            url: 'remove_from_cart.php',
            type: 'POST',
            data: { item_id: itemId },
            success: function(response) {
                alert(response); // Optional: Display a message to the user
                location.reload(); // Reload the page to update the cart display
            }
        });
    });
});
</script>

<?php
// session_start();

// Function to display the cart count
function displayCartCount() {
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        echo "<span><b id='cart-count'>$count</b></span>";
    } else {
        echo "<span><b id='cart-count'>0</b></span>";
    }
}

// Update cart count if an item is added
if (isset($_POST['item_id']) && isset($_POST['item_name']) && isset($_POST['item_price'])) {
    // Assuming the item details are passed via POST request
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    // Add the item to the cart array
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $_SESSION['cart'][$item_id] = array(
        'name' => $item_name,
        'price' => $item_price,
        'quantity' => 1  // Initial quantity set to 1
    );

    // Display updated cart count
    displayCartCount();
    exit; // Stop further execution after updating the count
}
?>





</body>

</html>