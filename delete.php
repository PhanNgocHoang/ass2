<?php
require_once "connect.php";
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM product WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $id));
 

header("Location: Store.php");
?>