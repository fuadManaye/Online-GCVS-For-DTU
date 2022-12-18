<?php
include 'config.php';
$target_dir = "studentImages/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST['insert_btn'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = test_input($_POST['id']);
    $firstname = test_input($_POST['firstname']);
    $middlename = test_input($_POST['middlename']);
    $lastname = test_input($_POST['lastname']);
    $gender = test_input($_POST['gender']);
    $email = test_input($_POST['email']);
    $yearofgraduation = test_input($_POST['yearofgraduation']);
    $cumulative_gpa = test_input($_POST['cumulative_gpa']);
    $qualification = test_input($_POST['qualification']);
    $department = test_input($_POST['department']);
    $image_size=getimagesize($_FILES['photo']['tmp_name']);
    
    if (empty($id)) {
        header("Location: insert.php?error=student id is Required");
    }else if (empty($firstname)) {
        header("Location: insert.php?error=first name is Required");
    }
    else if(empty($middlename)){
        header("Location: insert.php?error=middle name is Required");
    }
    else if(empty($lastname)){
        header("Location: insert.php?error=last name is Required");
    }
    else if(empty($gender)){
        header("Location: insert.php?error=gender is Required");
    }
    else if(empty($email)){
        header("Location: insert.php?error=email is Required");
    }
    else if($yearofgraduation=="--select one--"){
        header("Location: insert.php?error=year of graduation is Required");
    }
    else if(empty($cumulative_gpa)){
        header("Location: insert.php?error=student gpa is Required");
    }
    else if($qualification=="--select one--"){
        header("Location: insert.php?error=qualification is Required");
    }
    else if($department=="--select one--"){
        header("Location: insert.php?error=department is Required");
    }
    else if(empty($image_size)){
        header("Location: insert.php?error=student image is Required");
    }
    else {

        $id=$_POST['id'];
        $firstname=$_POST['firstname'];
        $middlename=$_POST['middlename'];
        $lastname=$_POST['lastname'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $yearofgraduation=$_POST['yearofgraduation'];
        $cumulative_gpa=$_POST['cumulative_gpa'];
        $qualification=$_POST['qualification'];
        $department=$_POST['department'];
        $image=$_FILES['photo']['name'];
        $tmp_name=$_FILES['photo']['tmp_name'];
        $destination="studentImages/".$image;
        
        $img_loc=$_FILES['photo']['tmp_name'];
        $img_name=$_FILES['photo']['name'];
        $img_des="studentImages/".$img_name;

        if (file_exists($target_file)) {
            echo '<script type="text/javascript">alert("Sorry, file already exists.!");window.location=\'insert.php\';</script>';
            $uploadOk = 0;
        }
        else{
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");window.location=\'insert.php\';</script>';
                $uploadOk = 0;
            }
            else{
                if ($image_size==FALSE)
                {
                    echo '<script type="text/javascript">alert("Please select student an image!");window.location=\'insert.php\';</script>';
                    exit();
                }
                else
                {
                    if ($_FILES['photo']['size']<=1457520)
                    {
                        $query=mysqli_query($con,"SELECT *FROM  student WHERE Graduate_ID='$id'");
                        if(mysqli_num_rows($query)>0){
                            echo '<script type="text/javascript">alert("student id is already in use!");window.location=\'insert.php\';</script>';
                        }
                        else{
                        $uniqu_code=rand(1000000000,9999999999);
                        $code = md5($uniqu_code);
                        $insert="INSERT INTO student (Graduate_ID,First_Name,Middle_Name,Last_Name,Gender,Email,Certificate_code,Year_of_Graduation,Cumulative_Gpa,Qualification,Department, Photo) 
                        VALUES ('$id','$firstname','$middlename','$lastname','$gender','$email','$code','$yearofgraduation','$cumulative_gpa','$qualification','$department','$image')";
                        $insert_q=mysqli_query($con,$insert);
                        if($insert_q){
                            move_uploaded_file($tmp_name,$destination);
                            echo '<script type="text/javascript">alert("Student Data Successfully Registered!");window.location=\'insert.php\';</script>';
                        }
                        else{
                            echo '<script type="text/javascript">alert("please try again!");window.location=\'insert.php\';</script>';
                        }
                    }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("The image is to big!");window.location=\'insert.php\';</script>';
                        exit();
                    }
                }
            }
        }
    }
}
else{
    header("Location:insert.php");
}
?>