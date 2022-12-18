<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style_main.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
</head>
<body class="back">
	<div class="home1">
		<a href="Student/index.php"><button >Student</button></a>
	</div>
	<div class="home2">
		<a href="./Company/index.php"><button >Company</button></a>
	</div>
	<div class="home">
		<a href="../index.html"><img src="images/home.png"></a>
		<!-- <a href="../index.html"><button >Home</button></a> -->
	</div>
	<form  method="post" action="check-login.php">
		<h2>Login Page</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p> <?php echo "<script> alert('$_GET[error]'); </script>"?> </p>
     	<?php } ?>
     	<label> User Name</label>
     	<input type="text" name="username" placeholder="User Name" pattern="[a-zA-Z_]*" maxlength="12" minlength="4" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
		 <div class="form-label">
		    <label>Select User Type:</label>
		  </div>
		  <select class="form-select" name="role" >
			  <option selected value="Administrator">Administrator</option>
			  <option value="Registral">Registral</option>
		  </select>
		  <button type="submit">LOGIN</button>
     </form>
</body>
</html>

