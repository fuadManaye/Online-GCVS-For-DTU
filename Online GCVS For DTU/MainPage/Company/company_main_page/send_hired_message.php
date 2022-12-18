<?php
session_start();
$email=$_SESSION['company_email'];
?>
<?php 
 include('config.php');
 include("success_message.php");
            $studid=$_GET['sid'];      
            $sql = "SELECT * FROM student WHERE Graduate_ID='$studid'";
            $result = mysqli_query($con, $sql);
            if(mysqli_num_rows($result) === 1){
                $query ="INSERT INTO registral_reply_message (id,to_student,sender,type,message,status,date) VALUES (NULL,'$studid', 'Company', 'reply', 'you are hire by a company for other information talk to them by email .$email.', 'unread', CURRENT_TIMESTAMP)";
                if(performQuery($query)){
                    echo '<script type="text/javascript">alert("you hired the student successfully!");window.location=\'view_student_certificate.php\';</script>';
                }
            }
            else{
                ?>
                <script>
                alert("<?php echo "you put incorrect id please try again!!" ?>");
                </script>
                <?php 
                }
            ?>