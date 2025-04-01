
<?php
include 'con.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM category WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
       
        $categoryname = $row['categoryname'];
      
      

    } else {
        echo "category  not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

if (isset($_POST['update'])) {
  
        
       
      
        $categoryname = $_REQUEST['categoryname'];
        

    $sql = "UPDATE category SET  categoryname  = '$categoryname' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: category.php"); 
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
                               

                                <label for="category">Categoryname:</label><br>
                                <input type="text" id="category" name="categoryname" value="<?php echo $categoryname; ?>"><br><br>

                              
                               

                                <input type="submit" name="update">



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
