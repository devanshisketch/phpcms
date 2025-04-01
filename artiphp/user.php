<?php
include 'con.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                <h3>User Listening</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-3">
                                    <div class="add">
                                        <a href="newuser.php">Add New</a>
                                        <label>Search:</label>
                                        <input type="search">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <table border='1' style="width: 818px;">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>User</td>
                                            <td>user@phpzag.com</td>
                                            <td><span class="label label-warning">Author</span></td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>php zag</td>
                                            <td>PHP testTTTT</td>
                                            <td><span class="label label-danger">Author</span></td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                            </tr>
</table> -->
                                            <table border='1'style="width:815px;">
        <tr>
            <th>id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>usertype</th>
            <th>userstatus</th>
           
                                            <?php
                                            $alldata = "SELECT * FROM `login`";
                                            $result = mysqli_query($conn,$alldata);
                           if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['email']}</td>";
                                echo "<td>{$row['usertype']}</td>";
                                echo "<td>{$row['userstatus']}</td>";
                                echo "<td><a href='edituser.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a></td>";
                                        echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "no user found in database";
                        }
                                       ?>
                                       </tr> 
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