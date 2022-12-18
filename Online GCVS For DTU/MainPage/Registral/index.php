<?php
include 'config.php';
include('functions.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Registral Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
       <style>
        .background{
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(to right, #c9cec9, #606160);
        }
        </style>
        <script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
    </head>
    <body>
        <section class="background">
        <div class="menu-bar">
        <ul>
            <li class="welcome">Welcome to Registration Page</li>
            <li><a href="#">Home</a>
            <li><a href="">Manage Graduate Information</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="student_results.php">Insert Student Results</a></li>
                        <li><a href="insert.php">Insert Graduate Information</a></li>
                        <li><a href="view.php">View Graduate Information</a></li>
                        <li><a href="search.php">Search Graduate Information</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="">View</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="view_companies.php">View Registered companies</a></li>
                        <li><a href="Request from student.php">Request from student
                        <?php
                        $query = "SELECT * from `messaging` where `status` = 'unread' order by `date` DESC";
                        if(count(fetchAll($query))>=0){
                            ?>
                            <span class="badge badge-light" style="color:yellow; font-weight:bold;"><?php echo "<br>student: [".count(fetchAll($query))."]"; ?></span>
                            <?php
                            }
                            ?>
                        </a></li>
                        <li><a href="Request from company.php">Request from company
                            <?php
                            $query = "SELECT * from `company_message` where `status` = 'unread' order by `date` DESC";
                            if(count(fetchAll($query))>=0){
                                ?>
                                <span class="badge badge-light" style="color:yellow; font-weight:bold;"><?php echo "<br>company: [".count(fetchAll($query))."]"; ?></span>
                                <?php
                                }
                            ?>
                        </a></li>
                    </ul>
                </div>
            </li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </div>
</section>

    </body>
    </html>