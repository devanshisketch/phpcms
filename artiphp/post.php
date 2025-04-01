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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://www.phpzag.com/">PHPZAG.COM</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.html">Welcome, php zag</a></li>
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
                                        <a href="newpost.php">Add New</a>
                                        <label>Search:</label>
                                        <input type="search">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <!-- <table border='1'>
                                         <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>created</th>
                                            <th>updated</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>What is HTML?</td>
                                            <td>HTML</td>
                                            <td>User</td>
                                            <td><span class="label label-success">Publish</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>bbbbcc</td>
                                            <td>PHP testTTTT</td>
                                            <td>php zag</td>
                                            <td><span class="label label-warning"
                                                    style="background-color: yellow;">draft</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>What is jQuery?</td>
                                            <td>jQuery</td>
                                            <td>php zag</td>
                                            <td><span class="label label-success">Publish</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>What is java?</td>
                                            <td>Ola</td>
                                            <td>php zag</td>
                                            <td><span class="label label-success">Publish</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>What is Javascript?</td>
                                            <td>jawascript w</td>
                                            <td>php zag</td>
                                            <td><span class="label label-success">Published</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>Vzxvzx</td>
                                            <td>Php testTTTT</td>
                                            <td>php zag</td>
                                            <td><span class="label label-danger">Archived</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>Fhdfh</td>
                                            <td>Php testTTTT</td>
                                            <td>php zag</td>
                                            <td><span class="label label-warning">Draft</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>Fhdfh</td>
                                            <td>Php testTTTT</td>
                                            <td>php zag</td>
                                            <td><span class="label label-danger">Archived</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>what is PHP?</td>
                                            <td>Php testTTTT</td>
                                            <td>php zag</td>
                                            <td><span class="label label-success">Published</span></td>
                                            <td>2019-11-30 16:14:46</td>
                                            <td>2019-12-01 07:56:44</td>
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr> -->
                                        <table border='1'style="width:815px;">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>category</th>
            <th>status</th>
           
                                            <?php
                                            $alldata = "SELECT * FROM `post`";
                                            $sql_category = mysqli_query($conn,$alldata);
                           if (mysqli_num_rows($sql_category) > 0) {
                            while($row = mysqli_fetch_assoc($sql_category)) {
                                echo "<tr>";
                                echo "<td>{$row['id']}</td>";
                                echo "<td>{$row['title']}</td>";
                                echo "<td>{$row['category']}</td>";
                               
                                echo "<td>{$row['status']}</td>";
                                echo "<td><a href='editpost.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a></td>";
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
                                
                                    <div class="row">
                                        <div class="container">
                                            <div class="col-md-5">
                                                <div class="datatable-info">
                                                    showing 1 to 9 entries
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="database_pagignate">
                                                    <ul class="pagination">
                                                        
                                                        <li class="end">
                                                            <a href="#" class="end">Previous</a>
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
                              
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
</body>

</html>