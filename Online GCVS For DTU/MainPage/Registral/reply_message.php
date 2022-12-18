<?php

include('config.php');
include("functions.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reply Message</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/inbox1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_reply.php"; 
         ?>
    <!---- Insert Graduate Student  Code --->

    <form action="" method="POST" enctype="multipart/form-data"> 
    <h1><i class='bx bx-user-plus'></i> <span>Reply Message</span></h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <table class="form">
            <tr>
                <td>
                    Stud ID:
                </td>
                <td>
                    <input type="text" placeholder="id" name="id" pattern="[a-zA-Z]{()}[0-9]*">
                </td>
            </tr>
            <tr>
                <td>
                    Message:
                </td>
                <td>
                    <textarea name="message" placeholder="message" rows="10" cols="80"  maxlength="500" minlength="5" required></textarea>
                </td>
            </tr>
                <tr>
                    <td>
                        <input type="submit" value="Send" name="reply" class="hero-btn">
                    </td>
                </tr>
            </table>
        </form>
        </body>
        </html>
        
        <?php 
        if(isset($_POST['reply'])){
            $studid=$_POST['id'];
            $message = $_POST['message'];
            
            $sql = "SELECT * FROM student WHERE Graduate_ID='$studid'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) === 1){
                $query ="INSERT INTO registral_reply_message (id,to_student,sender,type,message,status,date) VALUES (NULL,'$studid', 'Registral', 'reply', '$message', 'unread', CURRENT_TIMESTAMP)";
                if(performQuery($query)){
                    echo '<script type="text/javascript">alert("your reply message is sent to the student!");window.location=\'reply_message.php\';</script>';
                }
            }
            else{
                ?>
                <script>
                alert("<?php echo "you put incorrect id please try again!!" ?>");
                </script>
                <?php 
                }
            }
            ?>