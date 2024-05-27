<!DOCTYPE html>
<html>
<head>
	<title>User Database</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		/* Custom Styles */
		.header {
			background-color: #343a40; /* Dark background color */
			color: #ffffff; /* Light text color */
			padding: 20px; /* Add padding for spacing */
			margin-bottom: 20px; /* Add margin to separate from content */
			border-bottom: 3px solid #ffffff; /* Add border bottom for visual separation */
		}

		.container {
			padding: 20px; /* Add padding to the container */
		}

		.table-header {
			background-color: #212529; /* Dark background color */
			color: #ffffff; /* Light text color */
		}

		.table-header th {
			padding: 15px 10px; /* Add padding for spacing */
			font-size: 18px; /* Increase font size for table header */
		}

		.table-content tr:nth-child(even) {
			background-color: #f8f9fa; /* Alternate row background color */
		}

		.table-content tr:hover {
			background-color: #e9ecef; /* Hover row background color */
		}

		.btn-back {
			margin-right: 10px; /* Add margin between buttons */
		}
	</style>
</head>
<body>
	<div class="header text-light">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-6">
					<h1 class="mb-0">USER DATABASE</h1>
				</div>
				<div class="col-sm-6 text-right">
					<a href="admindash.php" class="btn btn-success btn-back"><< BACK</a>
					<a href="../logout.php" class="btn btn-danger">LOGOUT</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<table class="table table-bordered table-striped table-hover table-responsive-md table-content">
			<thead class="table-header">
				<tr>
					<th width="100">No.</th>
					<th width="150">Name</th>
					<th width="150">Mobile</th>
					<th width="400">Address</th>
					<th width="180">Email</th>
					<th width="150">Password</th>
					<th width="150">Confirm Password</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include('../dbcon.php');
					$query = "SELECT * FROM `user` ";
					$run = mysqli_query($conn, $query);
					if (mysqli_num_rows($run) < 1) {
						echo "<tr><td colspan='7' align='center'>No data found</td></tr>";
					} else {
						$count = 0;
						while ($data = mysqli_fetch_assoc($run)) {
							$count++;
							?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $data['name']; ?></td>
								<td><?php echo $data['mobile']; ?></td>
								<td><?php echo $data['address']; ?></td>
								<td><?php echo $data['email']; ?></td>
								<td><?php echo $data['password']; ?></td>
								<td><?php echo $data['cpassword']; ?></td>
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
