<?php
include 'config.php';
if(isset($_GET['status']))
{
    $status=$_GET['status'];
    $select_status=mysqli_query($con,"select * from student_login where id='$status'");
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
        $update=mysqli_query($con,"update student_login set status='$status2' where id='$status' ");
        if($update)
        {
            header("Location:manage_student.php");
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