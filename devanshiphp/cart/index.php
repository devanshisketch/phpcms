<?php
session_Start();
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>cart</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="wraper">
        <?php
      
            include('header.php');
        ?>
     <div class="container">
        
        <?php
            $sql_select = "SELECT * FROM `cart`"; 
            $result = mysqli_query($conn, $sql_select);
 
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="item-box">';
                    echo '<img src="image/' . ($row['image']) . '" class="card-img" alt="' . ($row['itemname']) . '">';
                    echo '<div class="item-name">' . ($row['itemname']) . '</div>';
                    echo '<div class="item-price">₹' . ($row['itemprice']) . '</div>';
                    echo '<div class="add-to-cart">';
                    echo '<a href="mycart.php?btn=add&itemname=' . ($row['itemname']) . '&itemprice=' . ($row['itemprice']) . '&product_id=' . ($row['id']) . '">Add to Cart</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No items found in the database.</p>';
            }
        ?>
     </div>
    </div>
</body>
</html>