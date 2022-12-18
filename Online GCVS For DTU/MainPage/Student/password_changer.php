<?php 
include "connection.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: changepassword.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: changepassword.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: changepassword.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);

        $sql = "SELECT Password FROM student_login WHERE password='$op'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) === 1){
            
            $sql_2 = "UPDATE student_login SET password='$np' WHERE password='$op'";
        	mysqli_query($con, $sql_2);
        	header("Location: changepassword.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: changepassword.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: changepassword.php");
	exit();
}