<?php
include 'con.php';
$alldata = "SELECT * FROM `post`";
$allpost = mysqli_query($conn,$alldata);
$totalpost = mysqli_num_rows($allpost);

$alldata = "SELECT * FROM `category`";
 $allcat = mysqli_query($conn,$alldata);
 $totalcat = mysqli_num_rows($allcat);

 $alldata = "SELECT * FROM `login`";
 $alluser = mysqli_query($conn,$alldata);
 $totaluser = mysqli_num_rows($alluser);
?>

<div class="list-group">
                            <a href="#" class="list-group-item active main-color-bg"> <span></span>
                                Dashboard <span class="badge ">430</span></a>
                            <a href="post.php" class="list-group-item"> <span></span>
                                Post <span class="badge"><?php echo $totalpost?></span></a>
                            <a href="category.php" class="list-group-item"> <span></span>
                                categories <span class="badge"><?php echo $totalcat?></span></a>
                            <a href="user.php" class="list-group-item"> <span></span>
                                Users <span class="badge"><?php echo $totaluser?></span></a>
                        </div>
                        