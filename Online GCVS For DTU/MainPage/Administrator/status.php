<?php
include 'config.php';
if(isset($_GET['status']))
{
    $status=$_GET['status'];
    $select_status=mysqli_query($con,"select * from main_users where id='$status'");
    while($row=mysqli_fetch_object($select_status))
    {
        $st=$row->status;
        if($st=='0')
        {
            $status2=1;
        }
        else
        {
            $status2=0;
        }
        $update=mysqli_query($con,"update main_users set status='$status2' where id='$status' ");
        if($update)
        {
            header("Location:system_users.php");
        }
        else
        {
            echo mysqli_error();
        }
    }
    ?>
    <?php
    }
?>