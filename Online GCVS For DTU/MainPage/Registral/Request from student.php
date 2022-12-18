<?php
include 'config.php';
include('functions.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Request</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/inbox.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body style="background: linear-gradient(to right, #c9cec9, #606160);">
        <?php
        include "headers/for_view_service_request.php"; 
         ?>
    <!---- Insert Graduate Student  Code --->


<div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <div class="dropdown-menu" aria-labelledby="dropdown01" style="margin-left:550px; margin-top:40px;">
                <?php
                $query = "SELECT * from `messaging` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
              <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;color:green";
                            }
                         ?>
                         " class="dropdown-item" href="view_request.php?id=<?php echo $i['id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php 
                  
                if($i['type']=='comment'){
                    echo "student with id ".$i['studid']." send request"."<br><br>";
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." liked your post.";
                }
                  
                  ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "No Records yet.";
                 }
                     ?>
            </div>

        </body>
        </html>