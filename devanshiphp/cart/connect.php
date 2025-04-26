<?php

$server = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "shopping";

$conn = mysqli_connect($server, $user, $pass, $db_name);

if (isset($_GET['submit'])) {
    $itemname = $_GET['itemname'];
    $itemprice = $_GET['itemprice'];
    $quantity = 1; 
    $action = 'add'; 

    $sql = "INSERT INTO `cart` (`itemname`, `itemprice`, `quantity`, `action`)
            VALUES ('$itemname', '$itemprice', '$quantity', '$action')";

    $sql_insert = mysqli_query($conn, $sql);

    if ($sql_insert) {
        echo "<script>alert('Item added to cart successfully!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
function showList($table,$conn){
    $sql_select = "SELECT * FROM `addcart`";
  return $cart_items = mysqli_query($conn, $sql_select);

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