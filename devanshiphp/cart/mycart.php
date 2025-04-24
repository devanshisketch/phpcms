
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

print_r($_GET);

$server = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "shopping";

$conn = mysqli_connect($server, $user, $pass, $db_name);

if (isset($_GET['product_id']) ) {
    $product_id = $_GET['product_id'];
    
  $sql_insert = "INSERT INTO `addcart` (`id`, `stock`,`productid`) VALUES ( NULL,'0','$product_id')";


if (mysqli_query($conn, $sql_insert)) {
    echo "<p style='color:Tomato;'>Item added to cart successfully!</p>";
} else {
    echo "Error adding item to cart: " . mysqli_error($conn);
}


}
$sql_select = "SELECT * FROM `addcart`";
$sel = mysqli_query($conn, $sql_select);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>my cart</title>
</head>
<body>
	<div class="wraper">
		<?php 
			include('header.php');
				
		?>
	<div class="cart-container">
		<h1>my cart</h1>
		<table rules="all">
			<thead>
				<tr>
					<th>id no</th>
					<th>Item Name</th>
					<th>Item Price</th>
					<th>stock</th>
					<th>Action</th>
				</tr>
			</thead>
            <tbody>
              

            <?php
                    $totalQuantity = 0; 
                    if (mysqli_num_rows($sel) > 0) {
                        while ($row = mysqli_fetch_assoc($sel)) {
                            $product_id = $row['productid'];

                            $slectcart = "SELECT itemname, itemprice, stock FROM `cart` WHERE id ='$product_id'"; 
                            $result = mysqli_query($conn, $slectcart);
                            $cartRow = mysqli_fetch_assoc($result);
                            $itemname = $cartRow['itemname'];
                            $itemprice = $cartRow['itemprice'];
                            $stock = $cartRow['stock']; 
                            $quantity = $row['stock'];
                            

                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$itemname}</td>";
                            echo "<td>{$itemprice}</td>";
                            echo "<td>{$stock}</td>"; 
                            echo "<td><a href='remove.php?id={$row['id']}' ?\")'>Remove</a> </td>";
                            echo "</tr>";
                            $totalQuantity += $stock; 
                        }
                    } else {
                        echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
                    }
                    ?>
             
                   
            </tbody>
		</table>
	</div>
</div>
</body>
</html>