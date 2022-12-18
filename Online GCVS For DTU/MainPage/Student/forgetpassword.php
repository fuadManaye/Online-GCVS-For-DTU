<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/changePassword.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <style>
        .text h3{
            float:right;
            font-family: Lobster;
            margin-top:-450px;
            margin-right:200px;
        }
        .text p{
            float:right;
            font-family: Lobster;
            margin-top:-400px;
            margin-right:30px;
        }
        </style>
    </head>
    <body>
        <?php
        include "headers/for_forget_password.php"; 
         ?>
             <form action="password_recovery.php" method="post">
     	<h2>Change Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Enter Your Email</label>
     	<input type="email" 
     	       name="op" 
     	       placeholder="your email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
     	       <br>

     	<label>New Password</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     	       <br>

     	<button type="submit">Update</button>
     </form>
     <div class="text">
        <h3>Rules</h3>
        <p>1. if you forget your password you should know your email <br>
        2. use your email as old password <br>
    3. enter your new password and click update button </p>
        <div>
        </body>
        </html>