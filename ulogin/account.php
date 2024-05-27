<?php
	session_start();

	if (!isset($_SESSION['uid'])) 
	{
		header('location: ../login.php');
	}

	include('../dbcon.php');
	$uid = $_SESSION['uid'];
	$query = "SELECT * FROM `user` WHERE `id` = '$uid'";
	$run = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Information</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<style>
		body {
			background-image: url('../images/back.jpg');
			background-repeat: no-repeat;    
			background-attachment: fixed;
   		 	background-position: center;
    		background-size: cover;
		}
		.container {
			padding: 50px 20px;
		}
		.main {
			background-color: rgba(255, 255, 255, 0.8);
			border-radius: 15px; 
			padding: 20px;
		}
		.info {
			background-color: #4542f5;
			color: #fff;
			border-radius: 5px;
			padding: 10px 20px;
			margin-bottom: 30px;
		}
		.table td, .table th {
			border-top: none;
			border-color: #fff;
		}
		.tag {
			font-weight: bold;
			font-size: 18px;
		}
		.data {
			font-weight: 600;
			font-size: 18px;
		}
		.btn {
			border-radius: 20px;
			padding: 8px 20px;
			font-size: 16px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	
	<div class="bg-dark pt-3 pb-3">
		<a href="../index.php" class="ml-3"><button type="button" class="btn btn-success">HOME</button></a>
		<a href="../menu/cart.php" class="mr-3"><button type="button" class="btn btn-danger">CART</button></a>
		<h1 class="text-center text-light">JHATPAT FOODS</h1>
	</div>

	<div class="text-center pt-4">
		<h1 class="info">ACCOUNT INFORMATION</h1>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="main">
					<h2 class="text-center mb-4">Welcome, <?php echo $data['name'] ?></h2>

					<table class="table">
						<tr>
							<td class="tag">Name:</td>
							<td class="data"><?php echo $data['name'] ?></td>
						</tr>
						<tr>
							<td class="tag">Mobile No.:</td>
							<td class="data"><?php echo $data['mobile'] ?></td>
						</tr>
						<tr>
							<td class="tag">Address:</td>
							<td class="data"><?php echo $data['address'] ?></td>
						</tr>
						<tr>
							<td class="tag">Email:</td>
							<td class="data"><?php echo $data['email'] ?></td>
						</tr>
					</table>

					<div class="text-center">
						<a href="editInfo.php" class="btn btn-primary mr-3">Edit Information</a>
						<a href="chngePwd.php" class="btn btn-primary">Change Password</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>		
</body>
</html>
