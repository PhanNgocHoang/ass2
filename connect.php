<?php 
//  $dbconn3 = pg_connect("host=ec2-50-19-222-129.compute-1.amazonaws.com port=5432 dbname=d59drdf1vuv8v9 user=qaotrimwoaboes password=9530aa2adfbe2297542280a0d4fe9fc0b4ca4f020c4a483a94f75e5ba15035e7");
 $pdo= new PDO('pgsql:host=ec2-50-19-222-129.compute-1.amazonaws.com; port=5432; dbname=d59drdf1vuv8v9', 'qaotrimwoaboes', '9530aa2adfbe2297542280a0d4fe9fc0b4ca4f020c4a483a94f75e5ba15035e7');
// if(!$pdo)
// {
//     echo "loi";
// }
// else
// {
//     echo"done";
// }
// if(!$dbconn3)
// {
//     echo "fail";
// }
// else
// {
//     echo "ok";
// }
?>