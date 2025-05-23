<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "shopping"; 

$conn = mysqli_connect($host, $user, $pass, $db);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = ($_POST['password']);

    
    if ($username && $email && $_POST['password']) {
        $check = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $check);
        if (mysqli_num_rows($result) > 0) {
            $message = "Email already exists!";
        } else {
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                $message = "User created successfully!";
            } else {
                $message = "Error: ";
            }
        }
    } else {
        $message = "user created.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
    body {
      background: #f4f4f4;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }
    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 15px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 300px;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .message {
      margin-top: 15px;
      color: #d9534f;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Create User</h2>
    <form method="POST" action="">
      <label for="name">username</label>
      <input type="text" id="name" name="username" required>

      <label for="email">Email </label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Register</button>
    </form>
    <!-- <?php if ($message): ?>
      <div class="message"><?php echo $message; ?></div>
    <?php endif; ?> -->
  </div>
</body>
</html>
