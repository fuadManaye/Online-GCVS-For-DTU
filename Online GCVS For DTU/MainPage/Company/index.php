<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<style>
	.back{
		background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('./images/back.webp');
		height:90vh;
		background-size: cover;
		background-position: center;
	}
	body {
		background: #1690A7;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		flex-direction: column;
	}
	.list {
		font-size:12px;
		position: absolute;
		transform: scaleY(0);
		transform-origin;
		transition: 0.3s;
	}
	.newlist {
		margin:35px;
		margin-left:-12px;
		transform: scaleY(1);
	}
	.links {
		margin:5px;
		background-color: #cbd4e6;
	}
	.links:hover {
		background-color: #01579B;
		transform: scale(1.1);
	}
	form {
		width: 350px;
		border: 2px solid rgb(161, 157, 157);
		border-radius:20px;
		padding: 30px;
		background: lightgrey;
		border-radius: 15px;
	}
	h2 {
		text-align: center;
		margin-bottom: 40px;
		color:rgb(228, 102, 102);
		font-size:20px;
		font-family:Lobster;
	}
	input {
		display: block;
		border: 2px solid #ccc;
		width: 95%;
		padding: 10px;
		margin: 10px auto;
		border-radius: 15px;
	}
	label {
		color: #888;
		font-size: 18px;
		padding: 10px;
		font-family:Lobster;
	}
	button {
		float: right;
		background: #555;
		padding: 4px 26px;
		color: #fff;
		border-radius: 10px;
		margin-right: 10px;
		border: none;
	}
	button:hover{
		opacity: .7;
		color:red;
	}
	.ca {
		font-size: 14px;
		display: inline-block;
		padding: 10px;
		text-decoration: none;
		color: #444;
		font-family:Lobster;
	}
	.ca:hover {
		text-decoration: underline;
	} 
	.fo{
		font-size: 14px;
		padding: 10px;
		text-decoration: none;
		color: #444;
		font-family:Lobster;
	}
	.fo:hover {
		text-decoration: underline;
	} 
    .tohome button{
        margin-top:-85px;
        margin-left: 1250px;
    }
    </style>
		<script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
    </head>
    <body class="back">
        <div class="tohome">
            <a href="../index.php"><button >Home</button></a>
        </div>
        <form action="login.php" method="post">
            <h2>Login</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required><br>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                <button type="submit">Login</button>
				<a href="forgetpassword.php" class="fo">Forget Password</a>
				<a href="signup.php" class="ca">Register Here</a>
            </form>
        </body>
        </html>