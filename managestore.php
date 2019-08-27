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
    <style>
         table{
            boder:1px;
        }
        body{
            background-color: rgb(139, 141, 165);
        }
    </style>
    <title>Serior Staff</title>
</head>
<body>

    <header>
        <p style="color:white; font-size:30px;">Hi <?php echo ($_SESSION['username']); ?></p>
        <a href="Seniorstaff.php"><button class="btn btn-success">Back</button></a>
    </header>
    <table class="table">
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Address</th>
        <?php
            require_once "connect.php";
            $sql = "select * from store";
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
        ?>
        <?php 
            foreach($result as $row){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['usernamestore']."</td>";
                echo "<td>".$row['pass']."</td>";
                echo "<td>".$row['addres']."</td>";
                echo "<td><a href=\"editstore.php?id=$row[id]\">Edit</a> | <a href=\"deletestore.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>