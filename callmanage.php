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
        body{
            background-color:rgb(183, 195, 206);
        }
    </style>
</head>
<body>
    <header>
        <p style="color:red; font-size:30px;">Hi <?php echo ($_SESSION['username']); ?></p>
        <a href="logout.php"><button class="btn btn-success">LogOut</button></a>
        <a href="Manage.php"><button class="btn btn-success">Back</button></a>
    </header>
    <div class="container">
        <table class="table">
            <tr>
                <th>Name Manager</th>
                <th>Phone</th>
            </tr>
        <?php 
            require_once "connect.php";
            $sql = "select namem, phone from manage";
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
        ?>
        <?php 
            foreach($result as $row)
            {
                echo"<tr>";
                echo "<td>".$row['namem']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "</tr>";
            }
        ?>
        </table>
    </div>
</body>
</html>