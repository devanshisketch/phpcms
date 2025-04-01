
<?php
include 'con.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `login` WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password'];
        $usertype = $row['usertype'];
        $userstatus = $row['userstatus'];

    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
    $userstatus = $_POST['userstatus'];

    $sql = "UPDATE `login` SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', usertype = '$usertype', userstatus = '$userstatus' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: user.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
</head>

<body>
    
                    
                            <div class="container_fluid">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">PHPZAG.COM</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Welcome, php zag</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><strong>Dashboard</strong> <small>Manage Your Site</small></h1>
                    </div>
                </div>
            </div>
        </header>
        <section id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                    <?php include 'sidebar.php' ?>
                    </div>
                    <div class="col-md-9">
                        <div class="container">
                            <div class="panel-handling">
                                <h3>Edit post</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-3">
                                    <div class="add">
                                     

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table border='1' style="width: 818px;">
                                    <div class="user-form">
                                    <form method="post">
                                    <form action="#">
        <h2>Add / Edit User</h2>
        <label for="title">First Name:</label><br>
                                <input type="text" id="title" name="firstname" value="<?php echo $firstname; ?>"><br><br>

                                <label for="category">Last Name:</label><br>
                                <input type="text" id="category" name="lastname" value="<?php echo $lastname; ?>"><br><br>

                                <label for="category">Email:</label><br>
                                <input type="text" id="category" name="email" value="<?php echo $email; ?>"><br><br>
                              

                                <label for="status">user type:</label><br>
                                <select id="status" name="usertype">
                                    <option value="Published" <?php if ($userstatus == 'Published') echo 'selected'; ?>>Published</option>
                                    <option value="Draft" <?php if ($userstatus == 'Draft') echo 'selected'; ?>>Draft</option>
                                    <option value="Archived" <?php if ($userstatus == 'Archived') echo 'selected'; ?>>Archived</option>
                                </select><br><br>

                                <label for="userstatus">User Status:</label>
                                <select name="userstatus">
                                    <option value="Active" <?php if ($usertype == 'Active') echo 'selected'; ?>>Active</option>
                                    <option value="Inactive" <?php if ($usertype == 'Inactive') echo 'selected'; ?>>Inactive</option>
                                </select><br><br>

                                <input type="submit" name="update">
       
    </div>
    </form>
                                
                                    </table>
                                </div>
                                <footer>
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-sm-6">
                                                <div class="datatable-info">
                                                    showing 1 to 9 entries
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="datatables">
                                                    <ul class="pagination">
                                                        
                                                        <li>
                                                            <a href="#">Previous</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Next</a>
                                                        </li>
</ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
  
</body>

</html>
