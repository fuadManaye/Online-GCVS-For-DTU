<?php
session_start();
if(!isset($_SESSION['logged'])){
    header('Location: ../index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Administrator Home Page
		</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!--google material icon-->
    
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
      <script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
  </head>
  <body>
  



<div class="wrapper">


<div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid"/><span>Administrator</span></h3>
            </div>
            <ul class="list-unstyled components">
			<li  class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i><span>Home</span></a>
                </li>
			
			
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">aspect_ratio</i><span>Manage Graduate</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li>
                            <a href="view.php">View Graduate</a>
                        </li>
                        <li>
                            <a href="search.php">Search Graduate</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">apps</i><span>Manage User Profile</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li>
                            <a href="system_users.php">Users of the system</a>
                        </li>
                        <li>
                            <a href="changepassword.php">Change Password</a>
                        </li>
                    </ul>
                </li>
               
                <li  class="">
                    <a href="profile.php"><i class="material-icons">library_books</i><span>Setting</span></a>
                </li>
                <li  class="">
                    <a href="comment.php"><i class="material-icons">library_books</i><span>Comments</span></a>
                </li>
            </ul>    
        </nav>
		
		

        <!-- Page Content  -->
        <div id="content">
		
		<div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
					
					<a class="navbar-brand" href="#"> Admin Home Page </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>
                </div>
            </nav>
	    </div>
			
			
			<div class="main-content">			
					<div class="row ">
                      
                        <div class="col-lg-5 col-md-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Tasks you do</h4>
                                </div>
                                <div class="card-content">
                                    <div class="streamline">
                                        <div class="sl-item sl-primary">
                                            <div class="sl-content">
                                                <small class="text-muted">1</small>
                                                <p>View graduate information</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-danger">
                                            <div class="sl-content">
                                                <small class="text-muted">2</small>
                                                <p>search graduate information</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-success">
                                            <div class="sl-content">
                                                <small class="text-muted">3</small>
                                                <p>see registered companies</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-content">
                                                <small class="text-muted">4</small>
                                                <p>activate or deactivate user accounts</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-warning">
                                            <div class="sl-content">
                                                <small class="text-muted">5</small>
                                                <p>create account for office of registral</p>
                                            </div>
                                        </div>
                                        <!-- <div class="sl-item">
                                            <div class="sl-content">
                                                <small class="text-muted">6</small>
                                                <p>change their own password</p>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
					<footer class="footer">
                        <div class="container-fluid">
                          <div class="row">
                        <div class="col-md-6">
                         <p class="copyright d-flex justify-content-end"> &copy 2021 Design by
                             Group-6 Students
                            </p>
                        </div>
                          </div>
                            </div>
                    </footer>
                </div>
        </div>
    </div>


     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });     
</script>
  </body>

  </html>


