<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
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
    <title>Serior Staff</title>
    <style>
        h1 {
            text-align: center;
            font-size: 450%;
            color: rgb(202, 103, 115);
        }
        
        form {
            margin-top: 10%;
            margin-left: 30%;
            margin-right: 30%;
            color: rgb(255, 63, 78);
        }
        
        .login {
            margin-left: 20%;
        }
        body{
            background-color: rgb(139, 141, 165);
        }
    </style>
</head>
<body>
    <header>
        <p style="color:white; font-size:30px;">Hi <?php echo ($_SESSION['username']); ?></p>
        <a href="Seniorstaff.php"><button class="btn btn-success">Back</button></a>
    </header>
    <div class="container">
        <h1>Create Account For Store</h1>
        <form action="createacc.php" method="POST">
            <label for="username" class="mr-sm-2">Username:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="username" name="username" placeholder="Enter your User name" required>
            <label for="pwd" class="mr-sm-2">Password:</label>
            <input type="password" class="form-control mb-2 mr-sm-2" id="pwd" name="pass" placeholder="Enter your password" required>
            <label for="store">Adress</label>
            <input type="text" name="store"  class="form-control mb-2 mr-sm-2" placeholder="Enter store's address" required>
            <div class ="login">
            <input type="submit" class="btn btn-success login" value="Create" name="create">
        </form>
    </div>
    <?php
        require_once "connect.php";
        if(!isset($_POST['create']))
        {
            
        }
        else
        {
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $store = $_POST['store'];
            $sql = "Insert Into store(usernamestore, pass, addres) values(:username, :pass, :addres)";
            $query = $pdo->prepare($sql);
            $query->bindparam(':username', $username);
            $query->bindparam(':pass', $pass);
            $query->bindparam(':addres', $store);
            $query->execute();
            echo'<script language="javascript">alert("Create account sucessfully")</script>';
        }
    ?>
</body>
</html>