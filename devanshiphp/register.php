
<?php
$server = "127.0.0.1";
$user = "root";
$pass = "";
$dbname ="register";

$db_con = mysqli_connect($server, $user, $pass,$dbname );


if (!$db_con) {
     die("Connection failed: " . mysqli_connect_error());
 }


$dbs = "CREATE DATABASE IF NOT EXISTS register";
 if (mysqli_query($db_con, $dbs)) {
    echo "Database created or already exists.<br>";
 } else {
    die("Error creating database: " . mysqli_error($db_con));
 }
mysqli_select_db($db_con, "register");

$tb = "CREATE TABLE IF NOT EXISTS reg (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    cpassword VARCHAR(255)
)";

 if (mysqli_query($db_con, $tb)) {
    echo "Table 'reg' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($db_con);
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if ($password === $cpassword) {

        $hashedPassword = md5($password);
        $emailCheck = "SELECT * FROM reg WHERE email = '$email'";
        $nameCheck = "SELECT * FROM reg WHERE name = '$name'";
        $emailresult = mysqli_query($db_con, $emailCheck);
        $nameResult = mysqli_query($db_con, $nameCheck);

        if (mysqli_num_rows($emailresult ) > 0) {
            echo "Email already registered.";
        } elseif (mysqli_num_rows($nameResult) > 0) {
            echo "Name already registered.";
        } else {
            $sql = "INSERT INTO reg (name, email, password, cpassword) VALUES ('$name', '$email', '$hashedPassword', '$cpassword')";

            if (mysqli_query($db_con, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db_con);
            }
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up / Registration Form </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Register</h1>
          <form method="POST" action="">
              <div class="txt_field">
                  <input type="text" name="name" required>
                  <span></span>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="email" name="email" required>
                  <span></span>
                  <label>Email</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password" required>
                  <span></span>
                  <label>Password</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="cpassword" required>
                  <span></span>
                  <label>Confirm Password</label>
              </div>
              <input name="submit" type="Submit" value="Sign Up">
              <div class="signup_link">
                  Have an Account ? <a href="login.php">Login Here</a>
              </div>
          </form>
      </div>
  </div>
  </body>
</html>