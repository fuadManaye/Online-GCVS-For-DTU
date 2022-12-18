<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Request Details</title>
        <link rel="stylesheet" href="css/view_request.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "headers/for_request.php"; 
?>
<h1>Request Details</h1>
<?php
    
    include("functions.php");
    include("config.php");

    $id = $_GET['id'];

    $query ="UPDATE `messaging` SET `status` = 'read' WHERE `id` = $id;";
    performQuery($query);

    $query = "SELECT * from `messaging` where `id` = '$id';";
    $select_d=mysqli_query($con,$query);
    $data=mysqli_num_rows($select_d);
    
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            if($i['type']=='like'){
                echo ucfirst($i['name'])." liked your post. <br/>".$i['date'];
            }else{
                echo "
                <table border='1px' cellspacing='0' cellpadding='10px'>
                <tr>
                <th> ID </td>
                <th> Name </th>
                <th> Message</td>
                <th> Date </th>
                <th colspan='2'>Action</th>
                </tr>
                
                <tr>
                <td>$i[studid] </td>
                <td>$i[name] </td>
                <td>$i[message] </td>
                <td>$i[date] </td>
                <td><a href='view_service_request.php'>Back</a></td>
                </tr>
                </table>
                ";
            }
        }
    }
    
?>
</body>
</html>

