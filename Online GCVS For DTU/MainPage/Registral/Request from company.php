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
                $query = "SELECT * from `company_message` order by `date` DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                      ?>
                    <a style ="
                               " class="dropdown-item" href="company_view_request.php?cid=<?php echo $i['id'] ?>">
                      <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                        <?php 
                        
                      if($i['type']=='request'){
                          echo "company with email ".$i['email']." send request"."<br><br>";
                      }else if($i['type']==''){
                          echo "";
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