<?php
include 'config.php';
$id=$_GET['id'];

$sql="DELETE FROM company where company_id=$id";
if($con->query($sql)){
    echo '<script type="text/javascript">alert("deleted successfully!");window.location=\'manage_company.php\';</script>';
    exit();
}
else
echo '<script type="text/javascript">alert("not deleted!");window.location=\'manage_company.php\';</script>';
exit();
?>



