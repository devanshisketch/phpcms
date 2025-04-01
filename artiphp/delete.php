<?php
include 'con.php';
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];


    $dltpost = "DELETE FROM post WHERE ID = $id"; 
    $result = mysqli_query($conn, $dltpost);

    $dltcat = "DELETE FROM `category` WHERE ID = $id"; 
    $result = mysqli_query($conn, $dltcat);

    $dltuser = "DELETE FROM `login` WHERE ID = $id"; 
    $result = mysqli_query($conn, $dltuser);

   
  
     if ($result) {
            echo "Record with id $id deleted successfully";
          
    } else {
        echo "error deleting record";
    }

}else{
    echo "invalid ID";
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
<h1>Delete</h1>
</body>
</html>