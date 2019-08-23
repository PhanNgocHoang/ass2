<?php
    session_start();
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
            color: rgb(255, 63, 78);
        }
        
        form {
            margin-top: 10%;
            margin-left: 30%;
            margin-right: 30%;
        }
        
        .login {
            margin-left: 20%;
        }
        body{
            background-color: rgb(186, 242, 167);
        }
        form{
            color: rgb(255, 63, 78);
        }
    </style>
</head>
<body>
    <header>
        <a href="home.php"><button class="btn btn-danger">Back</button></a>
    </header>
    <h1>Serior Staff Login</h1>
    <form action="login1.php" method="POST">
        <div class="form-group">
            <label for="username">User name:</label>
            <input type="text" class="form-control" name="username">
         </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pass">
        </div>
        </div>
        <button type="submit" class="btn btn-danger" name="login">Login</button>
    </form>
    
</body>
<?php 
    require_once "connect.php";
    if(!isset($_POST['login']))
    {

    }
    else{
        $sql = "SELECT * FROM manage where username = :username and pass = :pass";
        $stmt = $pdo->prepare($sql);
        $stmt->execute
        (
            array(
                'username' => $_POST['username'],
                'pass' => $_POST['pass'],
            )
        );
        $count = $stmt->rowCount();
        if($count > 0)
        {   
            $_SESSION['username'] = $_POST['username'];
           echo'<script language="javascript">alert("Login sucessfully"); window.location="Seniorstaff.php";</script>';
            
        }
        else
        {
            echo'<script language="javascript">alert("Uesername or password incorrect");</script>';
        }
    }
?>
</html>