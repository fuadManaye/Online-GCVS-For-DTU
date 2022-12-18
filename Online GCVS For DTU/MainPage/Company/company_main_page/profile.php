<?php
session_start();

if ($_SESSION["status"] != true){

    header("Location: ../index.php");
}

?>
<?php
include 'config.php';
$_SESSION["id"]=1;
$sessionId=$_SESSION["id"];
$user=mysqli_fetch_assoc(mysqli_query($con,"SELECT *FROM company_profile WHERE id=$sessionId"));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Company Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <style>
        .back{
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(rgba(4, 9, 30, 0.3), rgba(4, 9, 30, 0.3)), url(images/proback.jpg);
            background-position: center;
            background-size: cover;
            position: relative;
        }
        </style>
    </head>
    <body class="back">
        <?php
        include "headers/for_profile_header.php"; 
         ?>
    <!---- Graduate Student Profile Code --->
    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
        <div class="upload">
            <?php
            $id=$user["id"];
            $image=$user["image"];
            ?>
            <img src="images/<?php echo $image;?> " width=150 height=150 title="<?php echo $image;?> ">
            <div class="round">
                <input type="hidden" name="id" value="<?php echo $id;?> ">
                <input type="file" name="image" id="image" accept=".jpg, .jpeg .png">
                <i class="fa fa-camera" style="color:#fff"></i>
            </div>
        </div>
    </form>

<script type="text/javascript">
    document.getElementById("image").onchange=function(){
        document.getElementById('form').submit();
    }
    </script>

    <?php
    if(isset($_FILES["image"]["name"])){
        $id=$_POST["id"];
        $imageName=$_FILES["image"]["name"];
        $imageSize=$_FILES["image"]["size"];
        $tmpName=$_FILES["image"]["tmp_name"];

        $validImageExtension=['jpg', 'jpeg','png'];
        $imageExtension=explode('.', $imageName);
        $imageExtension=strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo 
            "
            <script>
            alert('Invalid Image Extension');
            document.location.href='profile.php'
            </script>
            ";
        }
        else{
            $newImageName=" - ". date("y.m.d")." - " . date("h.i.sa");
            $newImageName.= "." . $imageExtension;
            $query="UPDATE company_profile SET image='$newImageName' WHERE id=$id";
            mysqli_query($con,$query);
            move_uploaded_file($tmpName,'images/'.$newImageName);
            echo
            "
            <script>
            document.location.href='profile.php';
            </script>
            ";
        }
    }
    ?>
    <div class="information">
        <a href="changepassword.php">Change Your Password </a>&emsp;&emsp;
        <a href="logout.php">Logout </a>
    </div>
</body>
</html>