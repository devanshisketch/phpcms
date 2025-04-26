<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "shopping";

$conn = mysqli_connect($server, $user, $pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $likeimg = 0;
        $thumbsup = 0;
        $dislike = 0;

        if ($action === 'like') {
            $likeimg = 1;
        } elseif ($action === 'thumbsup') {
            $thumbsup = 1;
        } elseif ($action === 'dislike') {
            $dislike = 1;
        }

    
        $sql = "INSERT INTO `likes`(`likeimg`, `thumbsup`, `dislike`) VALUES ('$likeimg','$thumbsup','$dislike')";

        if (mysqli_query($conn, $sql)) {
            echo "Data saved successfully";
        } else {
            echo "Error saving data: " . mysqli_error($conn);
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
    <style>
       
        .like-button {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem; 
            background-color: #f0f0f0; 
            color: #1f2937;
            cursor: pointer;
            transition: background-color 0.3s ease; 
            border: 1px solid #d1d5db;
        }

        .like-button:hover {
            background-color: #e0e0e0; 
        }

        .like-button.liked {
            background-color: #fecaca;
            color: #b91c1c; 
            border-color: #fca5a5;
        }

        .like-count {
            margin-left: 0.5rem; 
            font-weight: 600; 
        }
        img{
            width: 500px;
            height: 500px;
        }
        button{
            font-size: 24px;
            padding: 8px 13px;
            background-color: skyblue;
            color: #fff;
            border: none;
        }
    </style>
</head>
<body class="bg-gray-100 font-inter flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <img id="myImage" src="dog.jpg" alt="Placeholder Image" class="mb-4 rounded-md">
        <div class="flex justify-center">
           
                <div class="counts">
                    <button class="button" onclick="react('like')">❤️ Like</button>
                    <button class="button" onclick="react('thumbsup')">👍 Thumbs Up</button>
                    <button class="button" onclick="react('dislike')">👎 Dislike</button>
                </div>
           
        </div>
    </div>
</body>
</html>
<script>

        function react(reactionType) {
  
  console.log('User reacted with:', reactionType);
 
}


        
</script>