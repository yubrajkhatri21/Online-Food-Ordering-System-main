<!DOCTYPE html>
<html>
<head>
    <title>Menu Database</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
            padding: 20px 0;
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
        .table-container {
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

    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item No.</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../dbcon.php');
                $query = "SELECT * FROM `menu`";
                $run = mysqli_query($conn, $query);

                if (mysqli_num_rows($run) < 1) {
                    echo "<tr><td colspan='8' align='center'>No data found</td></tr>";
                } else {
                    while ($data = mysqli_fetch_assoc($run)) {
                        ?>
                        <tr>
                            <td><?php echo $data['item_no']; ?></td>
                            <td><?php echo htmlspecialchars($data['name']); ?></td>
                            <td><?php echo htmlspecialchars($data['type']); ?></td>
                            <td><?php echo htmlspecialchars($data['detail']); ?></td>
                            <td>Rs. <?php echo htmlspecialchars($data['price']); ?></td>
                            <td><img src="../dataimg/<?php echo htmlspecialchars($data['image']); ?>" alt="<?php echo htmlspecialchars($data['name']); ?>"></td>
                            <td><a href="updateitem1.php?sid=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning btn-sm">Edit</a></td>
                            <td><a href="deleteitem1.php?sid=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        <?php
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
