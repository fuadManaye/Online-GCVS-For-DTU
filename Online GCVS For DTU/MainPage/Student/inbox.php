<?php
session_start();
include 'connect/connection.php';
include('functions.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Response</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/inbox1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_inbox.php"; 
         ?>
    <!---- Insert Graduate Student  Code --->
    <?php
          $email=$_SESSION['email'];
          $select="SELECT *FROM student where Email='$email'";
          $select_d=mysqli_query($connect,$select);
          $data=mysqli_num_rows($select_d);

          if($data){
            while($row=mysqli_fetch_array($select_d)){
                ?>
            <div class="info">
                <pre>
                <?php
                $tostudent=$row['Graduate_ID'];
                $select2="SELECT *FROM registral_reply_message where to_student='$tostudent'";
                $select_r=mysqli_query($connect,$select2);
                $data=mysqli_num_rows($select_r);

                if(count(fetchAll($select2))>0){
                    foreach(fetchAll($select2) as $i){
                        if($i['type']=='like'){
                            echo ucfirst($i['name'])." liked your post. <br/>".$i['date'];
                        }else{
                            echo "
                            <table border='1px' cellspacing='0' cellpadding='10px'>
                            <tr>
                            <th> Sender </th>
                            <th> Message</td>
                            <th> Date </th>
                            </tr>
                            
                            <tr>
                            <td>$i[sender] </td>
                            <td>$i[message] </td>
                            <td>$i[date] </td>
                            </tr>
                            </table>
                            ";
                        }
                    }
                }
                else{
                    echo "<h3 style='margin-left:600px; margin-top:100px; color:black;'>there is no reply message<h3>";
                }

                ?>
            </pre>
                <div>
                <?php
                }
            }
            else{
                echo "<script> alert('there is no reply message') </script>";
            }
        ?>
        </body>
        </html>