<?php
    include('../dbcon.php');

    $sid = $_GET['sid'];

    $query = "SELECT * FROM `menu` WHERE `id` = $sid";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Item Details</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <style type="text/css">
        .abc {
            border-radius: 20px; 
            padding-bottom: 50px;
            margin: 50px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(to right, #007bff, #00c6ff);
            color: white;
            padding: 20px 0;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0;
        }
        .corner-btn {
            position: absolute;
            top: 10px;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 16px;
        }
        .corner-btn.left {
            left: 10px;
        }
        .corner-btn.right {
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="header text-center">
        
        <a href="menudb.php" class="corner-btn left btn btn-success"><< BACK</a>
		<a href="../logout.php" class="corner-btn right btn btn-danger">LOGOUT</a>
        <h1>WELCOME TO ADMIN DASHBOARD</h1>    
    </div>

    <div class="container abc">
        <div class="text-center mt-5 pt-5">
            <h1>UPDATE ITEM DETAILS</h1>
        </div>
    
        <form action="updateitem2.php" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="item_no">Item No.</label>
                        <input type="text" class="form-control" id="item_no" name="item_no" value="<?php echo $data['item_no']; ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $data['type']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <textarea class="form-control" id="detail" name="detail" required><?php echo $data['detail']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $data['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="simg">Image</label>
                        <input type="file" class="form-control-file" id="simg" name="simg" required>
                    </div>
                    <input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">UPDATE</button>
                </div>
            </div>
        </form>
    </div>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
