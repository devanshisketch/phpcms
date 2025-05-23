<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "shopping";

$conn = mysqli_connect($server, $user, $pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $imgid = $_GET['id'];
    $check_query = "SELECT * FROM likes WHERE imgid = $imgid";
    $check_result = mysqli_query($conn, $check_query);

    if (!$check_result) {
        echo "Error in SELECT query: " . mysqli_error($conn);    
    }
    if (mysqli_num_rows($check_result) > 0) {   
        $row = mysqli_fetch_assoc($check_result);
        $current_like = $row['likes'];

        if ($current_like == 1) {   
            $update_query = "UPDATE likes SET likes = 0 WHERE imgid = $imgid";
            mysqli_query($conn, $update_query);
            echo "Like removed!";
        } else {   
            $update_query = "UPDATE likes SET likes = 1 WHERE imgid = $imgid";
            mysqli_query($conn, $update_query);
            echo "Like added!";
        }
    } else {     
        $insert_query = "INSERT INTO likes (imgid, likes) VALUES ($imgid, 1)";
        if (mysqli_query($conn, $insert_query)) {
            echo "First like added!";
        } else {
            echo "Insert error: ";
        }
    }
} else {
    echo "Error: No image ID provided.";
}
?>
