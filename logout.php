<?php
session_start();
if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
    header('location: Index.php');
}
else
{
    header('location: Index.php');
}
?>