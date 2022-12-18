<?php
session_start();

if ($_SESSION["status"] != true){

    header("Location: index.php");
}

?>
<?php
include 'connect/connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Student Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/profile1.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    </head>
    <body>
    <?php
        include "headers/for_profile.php"; 
        ?>
        <?php
          $email=$_SESSION['email'];
          $select="SELECT *FROM student where Email='$email'";
          $select_d=mysqli_query($connect,$select);
          $data=mysqli_num_rows($select_d);

          if($data){
            while($row=mysqli_fetch_array($select_d)){
                ?>
                <div>
                <img src="../Registral/studentImages/<?php echo $row['Photo'] ?>"width="50px"><br>
            </div>
            <div class="info">
                <pre>
                <p>ID:  <?php echo $row['Graduate_ID']?></p>
                <p>Name:  <?php echo $row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name']?></p>
                <p>Your Certificate Code:  <?php echo $row['Certificate_code'] ?></p>
                </pre>
                <br>
                <div class="information">
                &emsp;&emsp;<a href="changepassword.php">Change Password </a>&emsp;&emsp;
                    <a href="logout.php">Logout </a>
                </div>
            
                <div>
                <?php
                }
            }
            else{
                echo "<script> alert('no profile') </script>";
            }
        ?>


        
</body>
</html>