<?php
include "connect/session.php";
include('connect/connection.php');

    if(isset($_POST["login"])){
        // if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) 
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
      
          $email = test_input($_POST['email']);
          $password = test_input($_POST['password']);
          $id = test_input($_POST['id']);

        // $email = mysqli_real_escape_string($connect, trim($_POST['email']));
        // $password = trim($_POST['password']);
        // $id=$_POST['id'];

        $sql2 = "SELECT * FROM student WHERE Graduate_ID='$id'";
        $result = mysqli_query($connect, $sql2);

        $password = md5($password);

        $sql = "SELECT * FROM student_login where email = '$email' and password='$password'";
        $count = mysqli_query($connect, $sql);
        
        if(mysqli_num_rows($result) === 1){
            if (mysqli_num_rows($count) === 1) {
                $row = mysqli_fetch_assoc($count);
                if ($row['email'] === $email && $row['password'] == $password) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION["status"]= true;
                    header("Location:student_main_page.php");
                }else {
                    ?>
                    <script>
                    alert("<?php echo "Incorect User name or password "?>");
                    </script>
                    <?php
                }
            }else {
                ?>
                <script>
                alert("<?php echo "Incorect User name or password "?>");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
            alert("<?php echo "student with ID: ".$id." are not registered in DTU Sorry we can't help you!!" ?>");
            </script>
            <?php 
            }
        }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style1.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Login Form</title>
    <script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
</head>
<body style="background: linear-gradient(to right, #99a399, #aabbaa);">

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background: linear-gradient(to right, #b2fefa, #0ed2f7);">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-family:lobster;">Student Login Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-weight:bold; color:black; text-decoration:underline; font-family:lobster;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" style="font-family:lobster;">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" style="font-family:lobster;">Home</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color:#7f977f; margin:30px;">
                    <div class="card-header" style="font-family:lobster; font-size:20px;">Login</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">

                           <div class="form-group row">
                                <label for="stud_id" class="col-md-4 col-form-label text-md-right">Your ID</label>
                                <div class="col-md-6">
                                    <input type="text" id="stud_id" class="form-control" name="id" pattern="[a-zA-Z]{()}[0-9]*" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Login" name="login">
                                <a href="forgetpassword.php" class="btn btn-link" id="forget">
                                    Forget Password 
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
