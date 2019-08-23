<?php
require_once "connect.php";
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM product WHERE id=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $id));
 
//redirecting to the display page (index.php in our case)
header("Location:Store.php");
?>