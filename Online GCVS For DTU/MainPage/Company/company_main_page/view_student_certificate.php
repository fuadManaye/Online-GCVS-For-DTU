<?php
session_start();
include('config.php');
include("functions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> View Certificate</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <style>
        .back{
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(to right, #c9cec9, #606160);
        }
        .information{
            text-align: center;
            font-family: Lobster;
            font-size:20px;
            margin-top: -120px;
        }
        .information a{
            display: inline-block;
            text-decoration: none;
            color: rgb(19, 22, 19);
            border: 2px solid rgb(218, 224, 219);
            border-radius: 10px;
            padding: 4px 14px;
            font-size: 16px;
            background: transparent;
            position: relative;
            cursor: pointer;
            margin-left:40px;
        }
        .information a:hover{
            border: 1px solid #d3918c;
            background: #0ea158;
            transition: 1s;
            color:black;
        }
        </style>
        </head>
        <body>
            <section class="back">
                <?php
                include "headers/for_view_certificate.php"; 
                ?>
    
    <?php
    require('fpdf.php');
    if(isset($_POST['view'])){
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
         $id = validate($_POST['id']);
         $id =$_POST['id'];
         if (empty($id)) {
             ?>
             <script>
             alert("<?php echo "please put student ID!!"?>");
             window.location.replace('hire_graduate.php');
             </script>
             <?php
             }
             else{
                 $sql = "SELECT * FROM student WHERE Graduate_ID='$id'";
                 $result = mysqli_query($con, $sql);
                 
                 if (mysqli_num_rows($result) === 1) {
                     $row = mysqli_fetch_assoc($result);
                     if ($row['Graduate_ID'] === $id) {
                        $_SESSION['Graduate_ID'] = $row['Graduate_ID'];

                        $select="SELECT *FROM student where Graduate_ID='$id'";
                        $select_d=mysqli_query($con,$select);
                        $data=mysqli_num_rows($select_d);


                        // code for retriving student  information 
                        ?>
                        
                        <div class="div">
                                <?php
                                if($data){
                                    while($row=mysqli_fetch_array($select_d)){
                                        ?>
                                            <?php
                                            // header("content-type:image/jpg");
                                            $fontmain="C:\wamp64\www\GraduationProject\MainPage\Student\AGENCYR.TTF";
                                            $font="C:\wamp64\www\GraduationProject\MainPage\Student\BRUSHSCI.TTF";
                                            $file_name='format.jpg';
                                            $x=200;
                                            $y=200;

                                            $img_source=imagecreatefromjpeg($file_name);

                                            $text_color=imagecolorallocate($img_source,0,0,255);
                                            $color=imagecolorallocate($img_source,19,21,22);

                                            $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                            imagettftext($img_source,30,0,580,594,$color,$fontmain,$name);
                                            // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);


                                            $department=$row['Department'];
                                            imagettftext($img_source,30,0,1490,594,$color,$fontmain,$department);

                                            $cgpa=$row['Cumulative_Gpa'];
                                            imagettftext($img_source,30,0,320,648,$color,$fontmain,$cgpa);

                                            $x=1700;
                                            $y=900;
                                            $studid=$row['Graduate_ID'];
                                            $code="ID: ".$row['Graduate_ID'];
                                            // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                            imagettftext($img_source,30,0,$x,$y,$text_color,$font,$code);

                                            $x=80;
                                            $y=1380;
                                            $today=new DateTime;
                                            $str_date=$today->format('d-m-Y H:i:s');
                                            // ImageString($img_source,3000,$x,$y,$str_date,$text_color);
                                            imagettftext($img_source,30,0,$x,$y,$color,$font,$str_date);

                                            // $QR=imagecreatefromstring(file_get_contents(
                                            //     "https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl="
                                            //     .urlencode($row->id)));
                                            // imagecopyresampled($img_source, $QR, 475, 40, 0, 0, 100, 100, 100, 100);

                                            // $str=imagecreatefromjpeg("../Registral/studentImages/".$row['Graduate_ID'].".png");
                                            // imagecopy($img_source,$str,60,310,0,0,100,100);

                                            function deleteAll($str)
                                            {
                                                if(is_file($str)){
                                                    return unlink($str);
                                                }
                                                else if(is_dir($str)){
                                                    $scan=glob(rtrim($str,'/').'/*');
                                                    foreach($scan as $index=>$path){
                                                        deleteAll($path);
                                                    }
                                                    return @rmdir($str);
                                                }
                                            }
                                            deleteAll('C:\Users\fuye4\OneDrive\Documents\Student Certificate');

                                            if(mkdir("C:/Users/fuye4/OneDrive/Documents/Student Certificate" , 0777)){
                                            }
                                            else{
                                                echo "failed to create directory ";
                                            }
                                            imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Student Certificate/'.$name.'.jpg');
                                            $pdf=new FPDF('L','in',[11.7,8.27]);
                                            $pdf->AddPage();
                                            $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Student Certificate/".$name.".jpg",0,0,11.7,8.27);
                                            $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Student Certificate/".$name.".pdf","F");
                                            imagedestroy($img_source);
                                            echo "<h2 style='text-align:center; color:green;margin:150px;font-family:Lobster;font-size:22px;color:rgb(14, 20, 20);'>student certificate is saved in your document<br>You can see in <br> <span style='font-size:20px; color:rgb(14, 20, 20);'>C:/Users/fuye4/OneDrive/Documents/Student Certificate/ </span></h2>";
                                            ?>
                                        <!-- </tr> -->
                                        <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <script>
                                        echo "<script> alert('the student certificate is not prepared now... please try again later!') </script>";
                                        window.location.replace('hire_graduate.php');
                                        </script>
                                        <?php

                                    }
                                    ?>
                                    <!-- </table> -->
                                </div>
                                <?php
                                }else{
                                    ?>
                                    <script>
                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                    window.location.replace('hire_graduate.php');
                                    </script>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <script>
                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                    window.location.replace('hire_graduate.php');
                                    </script>
                                    <?php
                                    }
                                }
                            }
                            ?>
                            </section>
                            <div class="information">
                                <a href="see_background_info.php?studid=<?php echo $studid?>" onclick="return confirm('Do you want to see background information of (<?php echo $name?>)');">See Background Information of the student</a>&emsp;&emsp;
                                <a href="send_hired_message.php?sid=<?php echo $studid?>" onclick="return confirm('Do you want to hire (<?php echo $name?>)');">Hire Graduate</a>
                            </div>

                            
                        </body>
                        </html>


