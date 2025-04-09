<?php
$server = "127.0.0.1";
$user = "root";
$pass = "";
$dbname ="file";

$db_con = mysqli_connect($server, $user, $pass,$dbname );


if (!$db_con) {
     die("Connection failed: " . mysqli_connect_error());
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>