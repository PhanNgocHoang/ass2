<?php
session_start();
if(isset($_SESSION['username']))//check session and delete session
// after switch users comeback home page
{
    unset($_SESSION['username']);
    header('location: index.php');
}
else
{
    header('location: index.php');
}
?>