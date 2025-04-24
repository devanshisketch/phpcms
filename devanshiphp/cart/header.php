

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>header</title>
	
</head>
<body>
	<header>
		<img src="image/0.png" class="img">
		<div class="text">
			<h1>My Shopping <br> Bag</h1>
		</div>
		<nav>
			<a href="index.php"><img src="image/logo.png" class="logo"></a>
			<div>
			<?php
                    $total = 0;
                    
                    include('connect.php');

                    
                    $sqlcount = "SELECT * FROM `addcart`";
                    $resultcount = mysqli_query($conn,  $sqlcount);

                    if ($resultcount) {
                        $total =mysqli_num_rows($resultcount);
                    }

                   
                   
                ?>
                <a href="mycart.php"><i class='bx bx-cart-download'></i><sup><?php echo $total; ?></sup></a>
			</div>
		</nav>
	</header>
</body>
</html>