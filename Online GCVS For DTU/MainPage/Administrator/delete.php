<?php
include 'config.php';
$id=$_GET['id'];

$sql="DELETE FROM main_users where id=$id";
if($con->query($sql)){
    echo '<script type="text/javascript">alert("account is deleted successfully!");window.location=\'system_users.php\';</script>';
    exit();
}
else
echo '<script type="text/javascript">alert("account is not deleted!");window.location=\'system_users.php\';</script>';
exit();
?>



