<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$_SESSION ['user'] =1;
$server = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "shopping";

$conn = mysqli_connect($server, $user, $pass, $db_name);

function getlikes($ids, $conn) {
    $checklikes = "SELECT `likes` FROM `likes` WHERE `imgid` ='$ids'";
    $result = mysqli_query($conn, $checklikes);     
    $data = mysqli_fetch_assoc($result);
    if ($data) {
        return $data['likes'];
    } else {
        return 0; 
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Reactions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

       
        

        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        body {
            font-family: sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .image-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap; 
        }
        .image-item {
            margin-bottom: 30px;
            text-align: center;
            display: inline-grid;

        }
        .image-item img {
            width: 300px;
            height:300px;
            max-width: 400px;
           
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 10px;
        }
        .like-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #555; 
            outline: none;
           
        }

        .like-button:hover {
            transform: scale(1.1);
        }

        .like-button .fa-solid {
            color: red; 
        
        }


    </style>
</head>
<body>
    <div class="container">
        
        <div class="image-container">
        <div id="display-image">    
            <?php
        $query = " select * from img ";
        $result = mysqli_query($conn, $query);
          
        while ($data = mysqli_fetch_assoc($result)) {
             $likes =getlikes($data['id'],$conn);
             if(isset($_SESSION['user'])){
                $user_id =$_SESSION['user'];
             }
            ?>
               <div class="image-item">
        <img src="./image/<?php echo $data['image']; ?>" alt="Image">
        <div class="reaction-container">
        <button class="like-button"  data-user ="<?php echo $user-id ?>" data-image-id="<?php echo $data['id']; ?>">
    <i class="fa-regular fa-heart like"></i>
    <span class="like-count"><?php echo $likes; ?> Likes</span>
</button>

        </div>
    </div>
<?php
}
?>
       
</div>
</body>
</html>
<Script>
let likeBtn = document.querySelectorAll(".like-button");
    const like = ()=> {
        if(likeBtn.classList.contains("fa-regular")){
            likeBtn.classList.replace("fa-regular","fa-solid");
            likeBtn.classList.add("like-animation");
        }else{
            likeBtn.classList.replace("fa-solid","fa-regular");
            likeBtn.classList.remove("like-animation");
        }
    }
    // likeBtn.addEventListener("click",like);

    const likeButtons = document.querySelectorAll('.like-button');

            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const heartIcon = this.querySelector('i');
                    heartIcon.classList.toggle('fa-regular');
                    heartIcon.classList.toggle('fa-solid');
                   // heartIcon.classList.add('like-animation');
                   const imageId = this.getAttribute('data-image-id');
                   const userid = this.getAttribute('data-user');
console.log(`Like toggled for image ID: ${imageId}`);

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        console.log("Server response:", this.responseText);
    }
};
xmlhttp.open("GET", "update.php?id=" + encodeURIComponent(imageId),="&" true);
xmlhttp.send();
                });
            });
</script>