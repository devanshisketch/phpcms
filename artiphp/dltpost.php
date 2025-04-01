<?php
include 'con.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
     $del_user = "DELETE FROM post WHERE ID = $id";
     $user_result = mysqli_query($conn, $del_user);
    if($user_result){
        echo "Record with ID $id deleted successfully.";
        header("Location: post.php"); 
         }else{
        
        echo "Error deleting record: ";
    }
}else {
        echo "Invalid ID.";
    }

?>