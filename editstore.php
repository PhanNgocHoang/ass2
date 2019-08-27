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
    <title>Serior Staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        form {
            margin-left: 30%;
            margin-top: 10%;
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
        <a href="managestore.php"><button class="btn btn-success">Back</button></a>
    </header>
        <?php 
        include_once "connect.php";
            $id = $_GET['id'];
            $sql1 = "Select * from store where id = :id";
            $query = $pdo->prepare($sql1);
            $query->execute(array(':id' => $id));
            while($row = $query->fetch(PDO::FETCH_ASSOC))
            {
                $id1 = $row['id'];
                $username = $row['usernamestore'];
                $pass = $row['pass'];
                $addres = $row['addres'];
            }
        ?>

    <div class="container bg-info">
        <form action="editstore1.php" class="needs-validation" method = "POST">
            <input type="hidden" name="id" value="<?php echo $id1;?>">
            <h1 style="text-align: center">Edit Store</h1>
            <div>
                <label>Username</label>
                <input type="text" class="form-control nhap"  placeholder="Enter name of store" name="names" value="<?php echo $username;?>" required>
            </div>
            <div>
                <label>Pass</label>
                <input type="text" class="form-control nhap"  placeholder="Enter password" value="<?php echo $pass;?>" name="pass" required>
            </div>
            <div>
                <label>Addres</label>
                <input type="text" class="form-control nhap"  placeholder="Enter addres of store" value="<?php echo $addres;?>" name="addres" required>
            </div>
            <button type="submit" class="btn btn-primary" name ="edit">Edit</button>
        </form>
    </div>
</body>
</html>