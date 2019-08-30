<?php 
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: home.php");
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Store</title>
    <style>
        form {
            margin-left: 30%;
            margin-top: 5%;
            margin-right: 30%;
            font-size: 30px;
        }
        
        .nhap {
            margin-left: 20%;
        }
        body{
            background-color:rgb(183, 195, 206);
        }
    </style>
</head>
<body>
    <header>
        <p style="color:red; font-size:30px;">Hi <?php echo ($_SESSION['username']); ?></p>
        <a href="logout.php"><button class="btn btn-success">LogOut</button></a>
        <a href="Store.php"><button class="btn btn-success">Back</button></a>
    </header>
    <?php
   include_once "connect.php"; 
    if(!isset($_POST['submit']))
    {}
    else
    {
        $namepr = $_POST['nameprd'];
        $pay = $_POST['pay'];
        $namect = $_POST['customer'];
        $store = $_POST['store'];
        $date = $_POST['date'];
        $phone = $_POST['csphone'];
        $sql = "insert into orderpr (customer, csphone, product, price, dateb, store) 
        values (:customer, :phone, :namepr, :pay, :date, :store)";
        $query = $pdo->prepare($sql);     
        $query->bindparam(':customer', $namect);
        $query->bindparam(':phone', $phone);
        $query->bindparam(':namepr', $namepr);
        $query->bindparam(':pay', $pay);
        $query->bindparam(':date', $date);
        $query->bindparam(':store', $store);
        $query->execute();
        if($pdo->exec($query)==TRUE)
        {
            echo'<script language="javascript">alert("Create order successfully");</script>';  
        }
        else
        {
            echo'<script language="javascript">alert("Create order fail!");</script>';
        }
    }
   ?>
    <div class="container bg-info">
        <form action="createoder.php" class="needs-validation" method = "POST">
            <h1 style="text-align: center">Create Order</h1>
            <div>
                <label>Name of Customer</label>
                <input type="text" class="form-control nhap"  placeholder="Enter name of Customer" name="customer" required>
            </div>
            <div>
                <label>Customer's Phone</label>
                <input type="text" class="form-control nhap"  placeholder="Enter Customer's Phone" name="csphone" required>
            </div>
            <div>
                <label>Name of product</label>
                <input type="text" class="form-control nhap"  placeholder="Enter name of product" name="nameprd" required>
            </div>
            <div>
            <label>Pay</label>
            <input type="number" name="pay" placeholder="Enter pay" required class="form-control nhap">
            </div>
            <div>
                <label>Date</label>
                <input type="date" class="form-control nhap"  name="date" required>
            </div>
            <div>
            <label>Store</label>
                <select name="store" class="nhap">
                    <option value="store1">Store 1</option>
                    <option value="store2">Store 2</option>
                    <option value="store3">Store 3</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name ="submit">Submit</button>
        </form>
    </div>
</body>
</html>