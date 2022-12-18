<?php
session_start();

include('config.php');
include("functions.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Send Request</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/compose.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_compose.php";
         ?>
    <!---- Insert Graduate Student  Code --->

    <form action="" method="POST" enctype="multipart/form-data"> 
    <h1><i class='bx bx-user-plus'></i> <span>Send Message Here</span></h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <table class="form">
            <tr>
                <td>
                    Company Name:
                </td>
                <td>
                    <input type="text" placeholder="name" name="name" pattern="[a-zA-Z]*" required>
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <input type="email" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
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
                        <input type="submit" value="Send" name="submit" class="hero-btn">
                    </td>
                </tr>
            </table>
        </form>
        </body>
        </html>
        
        <?php             
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $message = $_POST['message'];
                $email=$_POST['email'];
                $query ="INSERT INTO company_message (id,company_name,email,type,message,status,date) VALUES (NULL,'$name','$email','request','$message','unread',CURRENT_TIMESTAMP)";
                if(performQuery($query)){
                    echo '<script type="text/javascript">alert("your message is sent!");window.location=\'compose.php\';</script>';
                    header("location:compose.php");
                }
            }
            ?>