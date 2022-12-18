<?php
include 'config.php';
$id=$_GET['id'];

$sql="DELETE FROM comments where email='$id'";
if($con->query($sql)){
    echo '<script type="text/javascript">alert("comment deleted successfully!");window.location=\'comment.php\';</script>';
    exit();
}
else
echo '<script type="text/javascript">alert("not deleted!");window.location=\'comment.php\';</script>';
exit();
?>



