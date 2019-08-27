<?php
    include_once "connect.php";
     $names = $_POST['names'];
     $pass= $_POST['pass'];
     $addres = $_POST['addres'];
     $id = $_POST['id'];
     $query = "UPDATE store SET usernamestore = '$names', pass= '$pass', addres = '$addres' WHERE id= $id";
     $res = $pdo->prepare($query);
     $res->execute();
     if($pdo->exec($query)==TRUE)
     {
        echo'<script language="javascript">alert("Edit sucessfully"); window.location="managestore.php";</script>';
     }
     else
     {
        echo'<script language="javascript">alert("Edit fail"); window.location="managestore.php";</script>';
     }
?>  