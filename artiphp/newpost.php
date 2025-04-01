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
    if (isset($_POST['title'])) {
        
        $title = $_REQUEST['title'];
        $message = $_REQUEST['message'];
        $category = $_REQUEST['category'];
        $status = $_REQUEST['status'];

        $sql = "INSERT INTO `post` (`id`,`title`,`message`,`category`,`status`) VALUES ( NULL ,'$title','$message','$category','$status')";
        echo $sql . "<br>"; 

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully<br>"; 
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
}
$alldata = "SELECT * FROM `category`";
            $sql_category = mysqli_query($conn,$alldata);
?>
<!DOCTYPE html>
<html>
<head>
<title>Add New Post</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
<style>


.form-container {
   
    padding: 20px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    margin-top: 0;
    margin-bottom: 20px;
    text-align: center;
}

.form-container label {
    display: block;
    margin-bottom: 5px;
}

.form-container input[type="text"],
.form-container textarea,
.form-container select {
    width: calc(100% - 12px); 
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box; 
}

.form-container textarea {
    height: 100px; 
}

.form-container .radio-group {
    margin-bottom: 10px;
}

.form-container .radio-group label {
    display: inline-block;
    margin-right: 15px;
}

.form-container input[type="radio"] {
    margin-right: 5px;
}

.form-container button {
    background-color: #5bc0de;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
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
       
                                    <div class="form-container">
    <h2>Add New Post</h2>
    <form action="#" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Post title">

        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Post message"></textarea>

        <label for="category">Category</label>
        <select id="category" name="category">
            <!-- <option value="general">General</option>
            <option value="news">News</option>
            <option value="events">Events</option> -->
            <?php
                               
                               if (mysqli_num_rows($sql_category) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_category)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['categoryname'] . "</option>"; // Corrected line
                                }
                            } else {
                                echo "<option value=''>No categories available</option>";
                            }
                     ?>
        </select>

        <div class="radio-group">
            <label><input type="radio" name="status" value="publish" checked> Publish</label>
            <label><input type="radio" name="status" value="draft"> Draft</label>
            <label><input type="radio" name="status" value="archive"> Archive</label>
        </div>

        <button type="submit" name="submit">Save</button>
    </form>
</div>
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