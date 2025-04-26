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
        $likes = 0;
        $thumbsup = 0;
        $dislike = 0;

        if ($action === 'like') {
            $likes = 1;
        } elseif ($action === 'thumbsup') {
            $thumbsup = 1;
        } elseif ($action === 'dislike') {
            $dislike = 1;
        }

        $sql = "INSERT INTO `likes`(`likes`, `thumbsup`, `dislike`) VALUES ('$likes','$thumbsup','$dislike')";

        if (mysqli_query($conn, $sql)) {
          echo "<p style='color: green;'>Reaction saved successfully!</p>";
        } else {
           echo "<p style='color: red;'>Error saving reaction: " . mysqli_error($conn) . "</p>";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Reactions</title>
    <style>
        .like-button-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }

        .reaction-button {
            font-size: 24px;
            padding: 8px 13px;
            background-color: skyblue;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .reaction-button:hover {
            background-color: #87ceeb;
        }

        img {
            width: 500px;
            height: auto;
            border-radius: 8px;
            
        }

        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
          
            text-align: center;
        }

        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <img id="myImage" src="dog.jpg" >
    <div class="like-button-container">
        <button class='reaction-button' data-id="1" onclick="react(this,'likes')">❤️ Like</button>
        <button class='reaction-button' data-id="1" onclick="react(this,'thumbsup')">👍 Thumbs Up</button>
        <button class='reaction-button' data-id="1" onclick="react(this,'dislike')">👎 Dislike</button>
    </div>
</div>

</body>
</html>
<script>
    function react(pic,reactionType){
        console.log('user reacted with:',reactionType,pic.dataset.id);
        PId=pic.dataset.id;
        var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       // console.log(this.responseText);
        //document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "like.php?reac="+reactionType+"&id="+PId , true);
    xmlhttp.send();
    }
    </script>