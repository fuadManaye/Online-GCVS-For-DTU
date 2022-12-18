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
        </style>
        </head>
        <body>
            <section class="back">
                <?php
                include "headers/for_view_certificate.php"; 
                ?>
    
    <?php
    require('fpdf.php');
    include('config.php');
    if(isset($_POST['view'])){
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
         $code = validate($_POST['code']);
         $code =$_POST['code'];
         if (empty($code)) {
             ?>
             <script>
             alert("<?php echo "please put your ID!!"?>");
             window.location.replace('certificate.php');
             </script>
             <?php
             }
             else{
                 $sql = "SELECT * FROM student WHERE Certificate_code='$code'";
                 $result = mysqli_query($connect, $sql);
                 
                 if (mysqli_num_rows($result) === 1) {
                     $row = mysqli_fetch_assoc($result);
                     if ($row['Certificate_code'] === $code) {
                        $_SESSION['Certificate_code'] = $row['Certificate_code'];

                        $select="SELECT *FROM student where Certificate_code='$code'";
                        $select_d=mysqli_query($connect,$select);
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
                                            deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Certificate');

                                            if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Certificate" , 0777)){
                                            }
                                            else{
                                                echo "failed to create directory ";
                                            }
                                            imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Certificate/'.$name.'.jpg');
                                            $pdf=new FPDF('L','in',[11.7,8.27]);
                                            $pdf->AddPage();
                                            $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Certificate/".$name.".jpg",0,0,11.7,8.27);
                                            $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Certificate/".$name.".pdf","F");
                                            imagedestroy($img_source);
                                            echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your certificate is saved.. check in your document.</h2>";
                                            ?>
                                        <!-- </tr> -->
                                        <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <script>
                                        echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                        window.location.replace('certificate.php');
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
                                    window.location.replace('certificate.php');
                                    </script>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <script>
                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                    window.location.replace('certificate.php');
                                    </script>
                                    <?php
                                    }
                                }
                            }
                            ?>
                            </section>

                            
                        </body>
                        </html>


