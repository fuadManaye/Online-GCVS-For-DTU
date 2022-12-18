<?php
session_start();
include 'connect/connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Student Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/main.css">
        <style>
        .back{
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(to right, #c9cec9, #606160);
        }
        </style>
        <script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
    </head>
    <body>
    <section class="back">
        <?php
        include "headers/for_main_page.php"; 
        ?>

        <?php
        if(!isset($_SESSION['email'])){
            echo "Not loggged in";
            exit;
        }else{
            $email=$_SESSION['email'];
        }
        ?>

        </section>
      </body>
      </html>
