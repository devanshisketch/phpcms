<?php
include_once('connect.php');
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
$del ="DELETE FROM `addcart` WHERE ID = $id ";
$result =mysqli_query($conn,$del);
if($result){
    echo "Record with ID $id deleted successfully.";
    header("Location: mycart.php"); 
    
  
}else{
    
    echo "Error deleting record: ";
}
} else {
    echo "Invalid ID.";
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
    <h1>REMOVE</h1>
</body>
</html>