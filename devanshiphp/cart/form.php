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


include_once('connect.php');
echo "<pre>";
print_r($_POST);
echo "</pre>";
if (isset($_POST['submit'])) {
   
        $itemname = $_POST['itemname'];
        $itemprice = $_POST['itemprice'];
        $image = $_FILES['image'];
        $stock = $_POST['stock'] ;

        $image = $_FILES['image'];
        $filename = $image['name'];
        $tmpname = $image['tmp_name'];
        $folder = "image/" . basename($filename);
    
        if (move_uploaded_file($tmpname, $folder)) {
          
            $sql = "INSERT INTO `cart` (`itemname`, `itemprice`, `image`, `stock`) 
            VALUES ('$itemname', '$itemprice', '$filename', '$stock')";

    
            if (mysqli_query($conn, $sql)) {
                echo " New record created successfully";
            } else {
                echo " Error: " . mysqli_error($conn);
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
    <title>Add Item</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" >
        <label>Item Name</label>
        <input type="text" name="itemname" required><br>

        <label>Item Price</label>
        <input type="text" name="itemprice" required><br>

        <label>Stock</label>
        <input type="text" name="stock"><br>

        <label>Image</label>
        <input type="file" name="image"><br>

        

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
