<?php 
include "config.php";

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['c_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$c_password = validate($_POST['c_password']);
    
    if(empty($username)){
      header("Location: createaccount.php?error=user name is required");
	  exit();
    }else if(empty($password)){
      header("Location: createaccount.php?error=Password is required");
	  exit();
    }else if($password !== $c_password){
      header("Location: createaccount.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$password = md5($password);
        $sql = "INSERT INTO main_users(userName, Password, Role,status) VALUES('$username', '$password', 'Registral',0)";
        
        if($con->multi_query($sql)===true){
            header("Location: createaccount.php?success=account created successfully");
            exit();
        }
        else{
            header("Location: createaccount.php?error=account not created");
	        exit();
        }
    }
}else{
	header("Location: createaccount.php");
	exit();
}