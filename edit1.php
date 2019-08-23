<?php
    include_once "connect.php";
     $namepr = $_POST['namep'];
     $price= $_POST['price'];
     $id = $_POST['id'];
     $query = "UPDATE product SET namepr = '$namepr', price= '$price' WHERE id= $id";
     $res = $pdo->prepare($query);
     $res->execute();
     if($pdo->exec($query)==TRUE)
     {
        echo'<script language="javascript">alert("Edit sucessfully"); window.location="Store.php";</script>';
     }
     else
     {
        echo'<script language="javascript">alert("Edit fail");</script>';
     }
?>  