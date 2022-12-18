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
      header("Location: forgetpassword.php?error=email is required");
	  exit();
    }else if(empty($np)){
      header("Location: forgetpassword.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: forgetpassword.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	// $op = md5($op);
    	$np = md5($np);

        $sql = "SELECT password FROM student_login WHERE email='$op'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) === 1){
            
            $sql_2 = "UPDATE student_login SET password='$np' WHERE email='$op'";
        	mysqli_query($con, $sql_2);
        	header("Location: forgetpassword.php?success=Your password has been updated successfully.. don't forget your password");
	        exit();

        }else {
        	header("Location: forgetpassword.php?error=Incorrect email");
	        exit();
        }

    }

    
}else{
	header("Location: forgetpassword.php");
	exit();
}