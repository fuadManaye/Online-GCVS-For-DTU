<?php
$server_name="localhost";
$user_name="root";
$password="";
$dbName="Graduation DB";
$conn=new mysqli($server_name,$user_name,$password,$dbName);
if($conn->connect_error){
    // die("connection failed: ".$conn->connect_error);
}
// echo "connected successfully <br>";
?>