<!DOCTYPE html>
<html>
<head>
	<title>Order Detail</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		/* Custom Styles */
		.header {
			background-color: #343a40; /* Dark background color */
			color: #ffffff; /* Light text color */
			padding: 20px; /* Add padding for spacing */
			margin-bottom: 20px; /* Add margin to separate from content */
		}

		.table-header {
			background-color: #212529; /* Dark background color */
			color: #ffffff; /* Light text color */
		}

		.table-header th {
			padding: 10px; /* Add padding for spacing */
		}

		.table-content tr:nth-child(even) {
			background-color: #f2f2f2; /* Alternate row background color */
		}

		.table-content tr:hover {
			background-color: #dddddd; /* Hover row background color */
		}
	</style>
</head>
<body>
	<div class="header text-light">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h1 class="mb-0">ORDER DETAIL</h1>
				</div>
				<div class="col-sm-6 text-right">
					<a href="admindash.php" class="btn btn-success"><< BACK</a>
					<a href="../logout.php" class="btn btn-danger mr-3">LOGOUT</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<table class="table table-bordered table-striped table-hover table-responsive-md table-content">
			<thead class="table-header">
				<tr>
					<th width="100">Order ID</th>
					<th width="150">Item Name</th>
					<th width="150">Price</th>
					<th width="150">Qty</th>
					<th width="180">Total</th>
					<th width="150">Name</th>
					<th width="400">Address</th>
					<th width="150">Email</th>
				</tr>
			</thead>
			<tbody>
			<?php
include('../dbcon.php');
$query = "SELECT * FROM `order` ";
$run = mysqli_query($conn, $query);
if (!$run) {
    // Output MySQL error if query fails
    echo "Error: " . mysqli_error($conn);
} elseif (mysqli_num_rows($run) < 1) {
    echo "<tr><td colspan='8' align='center'>No data found</td></tr>";
} else {
    while ($data = mysqli_fetch_assoc($run)) {
        ?>
        <tr>
            <td><?php echo isset($data['orderId']) ? $data['orderId'] : ''; ?></td>
            <td><?php echo isset($data['itemName']) ? $data['itemName'] : ''; ?></td>
            <td><?php echo isset($data['price']) ? $data['price'] : ''; ?></td>
            <td><?php echo isset($data['qty']) ? "x".$data['qty'] : ''; ?></td>
            <td><?php echo isset($data['total']) ? $data['total'] : ''; ?></td>
            <td><?php echo isset($data['name']) ? $data['name'] : ''; ?></td>
            <td><?php echo isset($data['address']) ? $data['address'] : ''; ?></td>
            <td><?php echo isset($data['email']) ? $data['email'] : ''; ?></td>
        </tr>
        <?php
    }
}
?>

			</tbody>
		</table>
	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>
