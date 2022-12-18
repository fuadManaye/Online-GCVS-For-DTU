<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Credential</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/credential.css">
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
        include "headers/for_credential.php"; 
        ?>

        <!------------ code for view credential ------------->

        <div class="box">
            <form action="view_credential.php" method="POST"> 
                <input type="text" name="code" placeholder="enter your ID">
                <input type="submit" name="verify" value="View">
            </form>
    </div>
        
        </section>
    </body>
    </html>