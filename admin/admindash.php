<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        .abc button {
            width: 300px;
            font-size: 20px;
        }
        .bg-header {
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
        }
        .container {
            padding-top: 50px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-large {
            font-size: 1.25rem;
            padding: 0.75rem 1.25rem;
        }
    </style>
</head>
<body>
    <div class="bg-header text-light py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="../index.php" class="btn btn-success btn-large">HOME</a>
            <h1 class="text-center m-0">WELCOME TO ADMIN DASHBOARD</h1>
            <a href="../logout.php" class="btn btn-danger btn-large">LOGOUT</a>
        </div>
    </div>

    <div class="container mt-5 text-center abc">
        <a href="addnewitem.php" class="d-block mb-3"><button class="btn btn-lg btn-primary">ADD ITEM</button></a>
        <a href="updateitem.php" class="d-block mb-3"><button class="btn btn-lg btn-primary">UPDATE ITEM</button></a>
        <a href="deleteitem.php" class="d-block mb-3"><button class="btn btn-lg btn-primary">DELETE ITEM</button></a>
        <a href="menudb.php" class="d-block mb-3"><button class="btn btn-lg btn-primary">MENU DETAIL</button></a>
        <a href="orderdetail.php" class="d-block mb-3"><button class="btn btn-lg btn-primary">ORDER DETAIL</button></a>
        <a href="customerdb.php" class="d-block mb-3"><button class="btn btn-lg btn-primary">CUSTOMER DETAIL</button></a>
    </div>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
