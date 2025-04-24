<?php
$server = "127.0.0.1";
$user = "root";
$pass = "";
 $dbname = "image";
 $db_con = mysqli_connect($server, $user, $pass, $dbname);
if (!$db_con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $filename;
 if (move_uploaded_file($tempname, $folder)) {
  
        $query = "INSERT INTO uploadimg (file) VALUES ('$filename')";
        if(mysqli_query($conn,$query)){
        echo "<h2>File uploaded successfully</h2>";
    } else {
       echo"<h2>File upload successfully but failed to save filename</h2>";
        
    } 
}else{
    echo "<h2>File not uploaded!</h2>";     
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
    <input type="file" name="image">
    <button type="submit" name="submit">submit</button>
</form>
<div>
    <?php
   
        $res = mysqli_query($db_con, "SELECT * FROM uploadimg"); 
       
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <img src="images/<?php echo $row['file']; ?>" style="max-width:200px; max-height:200px;">
             
  <?php  }
    ?>
</div>
</body>
</html>