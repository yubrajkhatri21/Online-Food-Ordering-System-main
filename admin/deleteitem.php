<!DOCTYPE html>
<html>
<head>
    <title>Menu Database</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .header {
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
            padding: 15px 0;
        }
        .header h1 {
            margin: 0;
        }
        .header a {
            color: white;
            text-decoration: none;
        }
        .header button {
            font-size: 18px;
        }
        .search-form {
            margin: 20px auto;
            max-width: 600px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .search-form input[type="text"] {
            width: calc(100% - 100px);
            display: inline-block;
        }
        .search-form input[type="submit"] {
            width: 80px;
        }
        .table-responsive {
            margin: 20px auto;
            max-width: 90%;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header text-center">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="admindash.php"><button class="btn btn-success btn-lg ml-3">&lt;&lt; BACK</button></a>
            <h1>WELCOME TO ADMIN DASHBOARD</h1>
            <a href="../logout.php"><button class="btn btn-danger btn-lg mr-3">LOGOUT</button></a>
        </div>
    </div>

    <div class="search-form text-center">
        <form action="deleteitem.php" method="post">
            <div class="form-group">
                <label for="name">Enter Item Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Item Name" required>
            </div>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>    
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['submit'])) {
                    include('../dbcon.php');
                    $name = $_POST['name'];
                    $query = "SELECT * FROM `menu` WHERE `name` LIKE '%$name%'";
                    $run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($run) < 1) {
                        echo "<tr><td colspan='6'>No data found</td><tr>";
                    } else {
                        $count = 0;
                        while ($data = mysqli_fetch_assoc($run)) {
                            $count++;
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo htmlspecialchars($data['name']); ?></td>
                                <td><?php echo htmlspecialchars($data['type']); ?></td>
                                <td>Rs. <?php echo htmlspecialchars($data['price']); ?></td>
                                <td><img src="../dataimg/<?php echo htmlspecialchars($data['image']); ?>" alt="<?php echo htmlspecialchars($data['name']); ?>"></td>
                                <td><a href="deleteitem1.php?sid=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-danger">DELETE</a></td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
