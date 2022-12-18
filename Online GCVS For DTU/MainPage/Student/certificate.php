<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Certificate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/certificate1.css">
        <style>
        .back{
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(to right, #c9cec9, #606160);
        }
        </style>
    </head>
    <body>
    <section class="back">
        <?php
        include "headers/for_certificate.php"; 
        ?>

        <!------------ code for view certificate ------------->

        <div class="box">
            <form action="view_certificate.php" method="POST"> 
                <input type="password" name="code" placeholder="enter your certificate code">
                <input type="submit" name="verify" value="View">
            </form>
    </div>
        
        </section>
    </body>
    </html>