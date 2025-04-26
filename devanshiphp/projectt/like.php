<?php
$server = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "shopping";

$conn = mysqli_connect($server, $user, $pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['reac']) && isset($_GET['id'])) {
    $reaction = $_GET['reac'];
    $item_id = $_GET['id'];
    $sql = ""; 

    if ($reaction == "likes") {
        
        $check_query = "SELECT * FROM likes WHERE `id`='$item_id' AND `likes`='1'";
        $check_result = mysqli_query($conn, $check_query);
        $already_liked = mysqli_num_rows($check_result);

        if ($already_liked == 0) {
            $sql = "UPDATE `likes` SET `likes`='1' WHERE `id`='$item_id'";
        } else {
            $sql = "UPDATE `likes` SET `likes`='0' WHERE `id`='$item_id'";
        }
    } else if ($reaction == "thumbsup") {
        
        $check_query = "SELECT * FROM `likes` WHERE `id`='$item_id' AND `thumbsup`='1'";
        $check_result = mysqli_query($conn, $check_query);
        $already_up = mysqli_num_rows($check_result);

        if ($already_up == 0) {
            $sql = "UPDATE `likes` SET `thumbsup`='1' WHERE `id`='$item_id'";
        } else {
            $sql = "UPDATE `likes` SET `thumbsup`='0' WHERE `id`='$item_id'";
        }
    } else if ($reaction == "dislike") {
        $check_query = "SELECT * FROM `likes` WHERE id='$item_id' AND `dislike`='1'";
         $check_result = mysqli_query($conn, $check_query);
        $already_dis = mysqli_num_rows($check_result);

        if ($already_dis == 0) {
            $sql = "UPDATE `likes` SET `dislike`='1' WHERE `id`='$item_id'";
        } else {
            $sql = "UPDATE `likes` SET `dislike`='0' WHERE `id`='$item_id'";
        }
    }
   
        $result = mysqli_query($conn, $sql);
     
}
?>

