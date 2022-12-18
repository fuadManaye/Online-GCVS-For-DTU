<?php
include("db_conn.php");
?>

<?php 
session_start();
if(isset($_POST['insert_btn'])){

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['confirm_password']);

    $company_name = validate($_POST['company_name']);
    $company_phone = validate($_POST['company_phone']);
    $company_region = validate($_POST['company_region']);
    $company_city = validate($_POST['company_city']);
    $reg_date = validate($_POST['reg_date']);
    $message = validate($_POST['message']);
    


    if(empty($company_name)){
        header("Location: signup.php?error=company name is Required");
    }
    else if(empty($company_phone)){
        header("Location: signup.php?error=company phone number is Required");
    }
	else if(empty($email)) {
		header("Location: signup.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=confirm your password");
	    exit();
	}
    else if($company_region=="--select one--"){
        header("Location: signup.php?error=company region is Required");
    }
    else if($company_city=="--select one--"){
        header("Location: signup.php?error=compay city is Required");
    }
    else if(empty($reg_date)){
        header("Location: signup.php?error=registration date is Required");
    }
    else if(empty($message)){
        header("Location: signup.php?error=write something why you register is Required");
    }
	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

        $company_name=$_POST['company_name'];
        $company_phone=$_POST['company_phone'];
        $company_email=$_POST['email'];
        $password=$_POST['password'];
        $company_region=$_POST['company_region'];
        $company_city=$_POST['company_city'];
        $reg_date=$_POST['reg_date'];
        $reason=$_POST['message'];
        
        // hashing the password
        $password = md5($pass);

	    $sql = "SELECT * FROM company WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The Email is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO company(company_name,company_phone,company_email, password,company_region,company_city,reg_date,reason_of_verification,status) VALUES('$company_name', '$company_phone', '$company_email', '$password', '$company_region', '$company_city', '$reg_date', '$reason',0)";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}