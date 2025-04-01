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
                <div class="navbar_foorter">
                    <ul class="rotate" style="list-style: none;
                    display: flex;
                    gap: 30px;
                    color: black;
                    text-decoration: none;">
                        <li><a href="#">Dashboard</a></li>
                   
                    
                        <li><a href="#">Welcome php,zag</a></li>
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
                            <div class="panel panel-default">
                            <div class="panel-handling">
                                <h3>Category</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-3">
                                    <div class="add">
                                    
                                        <a href="category2.php">Add New</a>
                                        <label>Search:</label>
                                        <input type="search">

                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <table border='1' style="width:805px;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>                                         
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>420</td>
                                            <td>123567</td>
                                            
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>419</td>
                                            <td>keoz</td>                                          
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>418</td>
                                            <td>aaa</td>                                          
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>417</td>
                                            <td>xyz99</td>                                          
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>416</td>
                                            <td>asu</td>                                          
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                        <tr>
                                            <td>415</td>
                                            <td>kjhkjhj</td>                                          
                                            <td><a href="#" class="btn-edit">Edit</a></td>
                                            <td><button type="button" class="btn" name="delete">delete</button></td>
                                        </tr>
                                       
                                    </table> -->
                                    <table border='1'style="width:805px;">
        <tr>
            <th>id</th>
            <th>categoryname</th>
          
           
                                            <?php
                                            $alldata = "SELECT * FROM `category`";
                                            $result = mysqli_query($conn,$alldata);
                           if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";    
                                echo "<td>{$row['id']}</td>";                                                     
                                echo "<td>{$row['categoryname']}</td>";
                                echo "<td><a href='editcat.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a></td>";
                            echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn' 'style=background-color:red;' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
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
                </div>
        </section>

    </div>
</body>

</html>