<?php 
session_start();
include "db_conn.php";
?>
<?php

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM company WHERE company_email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		if (mysqli_num_rows($result) === 1) {
			if($row['status']==='1'){
				if ($row['company_email'] === $email && $row['password'] === $pass) {
					$_SESSION['company_email'] = $row['company_email'];
					$_SESSION['password'] = $row['password'];
					$_SESSION["status"]= true;
					header("Location: company_main_page");
					exit();
				}else{
					header("Location: index.php?error=Incorect Email or password");
					exit();
				}
			}
			else{
				header("Location: index.php?error=you are not activated by admin...please try again later");
				exit();
			}
		}else{
			header("Location: index.php?error=Incorect Email or password");
			exit();
		}
	}
}else{
	header("Location: login.php");
	exit();
}