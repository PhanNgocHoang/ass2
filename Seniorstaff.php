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
        .header{
            magin-left: 10px;
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
            <a href="logout.php"><button class="btn btn-primary">LogOut</button></a>
            <a href="createacc.php"><button class= "btn btn-primary">Create Accout for Store</button></a>
            <a href="managestore.php"><button class="btn btn-primary">Manage Accout of Store</button></a>
    </header>
    <div class="container">
        <h1>Store 1</h1>
        <form action="Seniorstaff.php" method="POST">
        <table class="table" >
            <tr>
                <th>id order</th>
                <th>Name Customer</th>
                <th>Customer's Phone</th>
                <th>Name of Product</th>
                <th>Pay</th>
                <th>Date</th>
                <th>Store</th>
            </tr>
           <?php
           require_once "connect.php";
        $sql = "select * from orderpr where orderpr.store = 'store1' ";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
    ?>
    <?php
        foreach($result as $row){
           echo'<tr>';
            echo "<td>" .$row['id']."</td>";
            echo "<td>" .$row['customer']."</td>";
            echo "<td>" .$row['csphone']."</td>";
            echo "<td>" .$row['product']."</td>";
            echo "<td>" .$row['price']."</td>";
            echo "<td>" .$row['dateb']."</td>";
            echo "<td>" .$row['store']."</td>";
          echo'</tr>';
        }
    ?>
    <?php
        
        if(!isset($_POST['Sum1']))
        {

        }
        else
        {   
            $from1 = $_POST['datefrom1'];
            $to1 = $_POST['dateto1'];
            $sql1 = "SELECT SUM(price) FROM orderpr WHERE  orderpr.store = 'store1' AND dateb BETWEEN '$from1' AND '$to1'";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute();
            $stmt1->setFetchMode(PDO::FETCH_ASSOC);
            $result1 = $stmt1->fetchAll();
            foreach ($result1 as $row1) {
                echo"Total sales from: ".$from1."To: ".$to1." is". " ". array_sum($row1);}
            
        }
        
    ?>
            <tr>
                <td><button class = "btn btn-success" name="Sum1">SUM</button></td>
                <td>
                <label>From</label>
                <input type="date" name="datefrom1" required>
                </td>
                <td>
                <label>To</label>
                <input type="date" name="dateto1" required>
                </td>
            </tr>
        </table>
        </form>
        
        <h2>Store 2</h2>
        <form action="Seniorstaff.php" method="POST">
            <table class="table">
                <tr>
                    <th>id order</th>
                    <th>Name Customer</th>
                    <th>Customer's Phone</th>
                    <th>Name of Product</th>
                    <th>Pay</th>
                    <th>Date</th>
                    <th>Store</th>
            </tr>
    <?php
        $sql = "select * from orderpr where orderpr.store = 'store2' ";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
    ?>
    <?php
        foreach($result as $row){
            echo'<tr>';
            echo "<td>" .$row['id']."</td>";
            echo "<td>" .$row['customer']."</td>";
            echo "<td>" .$row['csphone']."</td>";
            echo "<td>" .$row['product']."</td>";
            echo "<td>" .$row['price']."</td>";
            echo "<td>" .$row['dateb']."</td>";
            echo "<td>" .$row['store']."</td>";
          echo'</tr>';
        }
    ?>
        <?php
         if(!isset($_POST['Sum2']))
         {
 
         }
         else
         {  
            $from2 = $_POST['datefrom2'];
            $to2 = $_POST['dateto2'];
            $sql2 = "SELECT SUM(price) FROM orderpr WHERE  orderpr.store = 'store2' AND dateb BETWEEN '$from2' AND '$to2'";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute();
            $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            $result2 = $stmt2->fetchAll();
            foreach($result2 as $row2){
                echo"Total sales of Store 2 from: ".$from2."To: ".$to2." is". " ". array_sum($row2);}
        }
        ?>
            <tr>
                <td><button class = "btn btn-success" name="Sum2">SUM</button></td>
                <td>
                    <label>From</label>
                    <input type="date" name="datefrom2">
                </td>
                <td>
                    <label>To</label>
                    <input type="date" name="dateto2">
                </td>
                </tr>
            </table>  
        </form>

        <h3>Store 3</h3>
        <form action="Seniorstaff.php" method="POST">
        <table class="table">
            <tr>
                <th>id order</th>
                <th>Name Customer</th>
                <th>Customer's Phone</th>
                <th>Name of Product</th>
                <th>Pay</th>
                <th>Date</th>
                <th>Store</th>
            </tr>
    <?php
        $sql = "select * from orderpr where orderpr.store = 'store3' ";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetchAll();
    ?>
    <?php
        foreach($result as $row){
            echo'<tr>';
            echo "<td>" .$row['id']."</td>";
            echo "<td>" .$row['customer']."</td>";
            echo "<td>" .$row['csphone']."</td>";
            echo "<td>" .$row['product']."</td>";
            echo "<td>" .$row['price']."</td>";
            echo "<td>" .$row['dateb']."</td>";
            echo "<td>" .$row['store']."</td>";
          echo'</tr>';
        }
    ?>
    <?php 
        if(!isset($_POST['Sum3']))
        {

        }
        else
        {  
            $from3 = $_POST['datefrom3'];
            $to3 = $_POST['dateto3'];
            $sql3 = "SELECT SUM(price) FROM orderpr WHERE  orderpr.store = 'store3' AND dateb BETWEEN '$from3' AND '$to3'";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->execute();
            $stmt3->setFetchMode(PDO::FETCH_ASSOC);
            $result3 = $stmt3->fetchAll();
            foreach($result3 as $row3){
                echo"Total sales of store 3 from: ".$from3."To: ".$to3." is". " ". array_sum($row3);}
        }
    ?>
<tr>
                <td><button class = "btn btn-success" name="Sum3">SUM</button></td>
                <td>
                    <label>From</label>
                    <input type="date" name="datefrom">
                </td>
                <td>
                    <label>To</label>
                    <input type="date" name="dateto">
                </td>
                </tr>
        </table>
        </form><br>
        <?php
        if(!isset($_POST['sums']))
        {

        }
        else
        {  
            $from = $_POST['datefrom'];
            $to = $_POST['dateto'];
            $sql = "SELECT SUM(price) FROM orderpr WHERE dateb BETWEEN '$from' AND '$to'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            foreach($result as $row){
                echo"Total sales of all store from: ".$from."To: ".$to." is". " ". array_sum($row);}
        }
    ?>
        <form action="Seniorstaff.php" method = "POST">
            <label>From</label>
            <input type="date" name="datefrom">
            <label>To</label>
            <input type="date" name="dateto">
            <button class="btn btn-success" name="sums">Sum from 3 store</button>
        </form>
        
    </div>
</body>
</html>