<?php
include("db_conn.php");
?>

<?php
$adminName="FuadManaye";
$adminPassword="Fuad1232";
$adminRole="Administrator";

$RegName="DerejeGirma";
$RegPassword="Dereje11";
$RegRole="Registral";

$adminPassword = md5($adminPassword);
$RegPassword = md5($RegPassword);

$sql = "INSERT INTO main_users(userName, Password, Role,status) VALUES('$adminName', '$adminPassword', '$adminRole',1);";
$sql .= "INSERT INTO main_users(userName, Password, Role,status) VALUES('$RegName', '$RegPassword', '$RegRole',0);";

if($conn->multi_query($sql)===true){
    // echo "the data is inserted successfully!!";
}
else
    // echo "error inserting data into a table".$conn->error;

$conn->close();
?>
