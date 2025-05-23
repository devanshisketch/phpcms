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

if (isset($_POST['submit'])) {

    $image = $_FILES['image'];
    $filename = $image['name'];
    $tmpname = $image['tmp_name'];
    $folder = "image/" . basename($filename);

    if (move_uploaded_file($tmpname, $folder)) {
        
        $sql = "INSERT INTO `img`(`image`) VALUES ('$filename')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
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
<form method="post" enctype="multipart/form-data">
    <input type="file" id="imageUpload" name="image"><br><br>
    <button type="submit" name="submit">Upload</button>
</form>

</body>
</html>