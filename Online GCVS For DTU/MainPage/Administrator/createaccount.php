<!DOCTYPE html>
<html>
    <head>
        <title>Account Create</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/createAccount.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_createAccount.php"; 
         ?>
    <!---- Account Create Code --->
    <form action="account_creater.php" method="post">
     	<h2>Create Account For Registral</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>User Name</label>
     	<input type="text" 
     	       name="username" 
     	       placeholder="user name"
			   pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
     	       <br>

     	<label>Password</label>
     	<input type="password" 
     	       name="password" 
     	       placeholder="password"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="c_password" 
     	       placeholder="Confirm New Password"
			   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     	       <br>

     	<button type="submit">Create</button>
     </form>

</body>
</html>