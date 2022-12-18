<?php  
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);

		// Hashing the password
		$password = md5($password);
        
        $sql = "SELECT * FROM main_users WHERE userName='$username' AND Password='$password'";
        $result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		if (mysqli_num_rows($result) === 1) {
			if($row['status']==='1'){
				if ($row['userName'] === $username && $row['Password'] === $password && $row['Role'] == $role) {
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $row['Role'];
					$_SESSION['username'] = $row['userName'];
					$_SESSION["status"]= true;
					$_SESSION['logged']= 'yes';
					
					header("Location:home.php");
				}else {
					header("Location: index.php?error=Incorect User name or password");
				}
			}
			else{
				header("Location: index.php?error=you are not activated by admin...please try again later");
				exit();
			}
		}
		else {
			header("Location: index.php?error=Incorect User name or password");
		}
	}else {
		header("Location:index.php");
	}