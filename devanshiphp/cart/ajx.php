<?php
print_r($_GET);
include_once('connect.php');
if (isset($_REQUEST['id']) &&  $id = $_REQUEST['id']) {
   $id =$_GET['id'];
   $stk =$_GET['stk'];

$updatequery ="UPDATE `addcart` SET `stock`= $stk' WHERE  ID ='$id";
$result =mysqli_query($conn,$del);
$result =mysqli_query($conn,$updatequery);
    
  
}else{
    
    echo "INvalID USER ID";
}

?>