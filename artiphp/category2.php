<?php
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
$servername = "localhost";
$usrname = "root";
$password = "root";
$dbname = "site";
$conn = mysqli_connect($servername, $usrname, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>"; 
if (isset($_POST['submit'])) {
    if (isset($_POST['categoryname'])) {
       
        $categoryname = $_REQUEST['categoryname'];

        $sql = "INSERT INTO `category` (`id`,`categoryname`) VALUES ( NULL ,'$categoryname')";
        echo $sql . "<br>"; 

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully<br>"; 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
}
$alldata = "SELECT * FROM `category`";
            $result = mysqli_query($conn,$alldata);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add / Edit User</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <style>
        body {
            font-family: sans-serif;
           
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;        
        }
        .user-form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 800px;
        }
        .user-form h2 {
            margin-top: 0;
            text-align: center;
        }
        .user-form label {
            display: block;
            margin-bottom: 5px;
        }
        .user-form input[type="text"],
        .user-form input[type="email"],
        .user-form input[type="password"] {
            width: calc(100% - 12px);
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .user-form .radio-group {
            margin-bottom: 10px;
        }
        .user-form .radio-group label {
            display: inline-block;
            margin-right: 15px;
        }
        .user-form button {
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .user-form button:hover {
            background-color: #3e8e41;          
        }
       
    </style>
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
                                <h3>Post Listening</h3>
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
        <form action="#" method="POST">
        <h2>Add / Edit category</h2>
        <label for="firstName">Category</label>
        <input type="text" id="firstName" name="categoryname">



        <button type="submit" class="btn-info" name="submit">Save</button>
       
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