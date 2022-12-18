<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> View Credential</title>
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
                include "headers/for_view_credential.php"; 
                ?>
                <?php
                require('fpdf.php');
                include('connect/connection.php');
                if(isset($_POST['verify'])){
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
                            $sql = "SELECT * FROM computer_student_lists WHERE Graduate_ID='$code'";
                            $result = mysqli_query($connect, $sql);

                            $sql2 = "SELECT * FROM electrical WHERE Graduate_ID='$code'";
                            $result2 = mysqli_query($connect, $sql2);

                            $sql3 = "SELECT * FROM chemical WHERE Graduate_ID='$code'";
                            $result3 = mysqli_query($connect, $sql3);

                            $sql4 = "SELECT * FROM it WHERE Graduate_ID='$code'";
                            $result4 = mysqli_query($connect, $sql4);

                            $sql5 = "SELECT * FROM law WHERE Graduate_ID='$code'";
                            $result5 = mysqli_query($connect, $sql5);

                            $sql6 = "SELECT * FROM managment WHERE Graduate_ID='$code'";
                            $result6 = mysqli_query($connect, $sql6);

                            $sql7 = "SELECT * FROM nursing WHERE Graduate_ID='$code'";
                            $result7 = mysqli_query($connect, $sql7);
                            
                            
                            // give credential for computer science students
                            if (mysqli_num_rows($result) === 1) {
                                $row = mysqli_fetch_assoc($result);
                                if ($row['Graduate_ID'] === $code) {
                                    $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                    $select="SELECT *FROM computer_student_lists where Graduate_ID='$code'";
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
                                                $file_name='credent.jpg';
                                                $x=200;
                                                $y=200;
                                                
                                                $img_source=imagecreatefromjpeg($file_name);
                                                $text_color=imagecolorallocate($img_source,0,0,255);
                                                $color=imagecolorallocate($img_source,19,21,22);
                                                
                                                $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                
                                                $faculty=$row['Faculty'];
                                                imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);

                                                $department=$row['Department'];
                                                imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                
                                                // $co1=$row['cour1'];
                                                // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                
                                                $x=850;
                                                $y=540;
                                                $code1="cour1                 ".$row['cour1'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);

                                                $x=850;
                                                $y=580;
                                                $code2="cour2                 ".$row['cour2'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);

                                                $x=850;
                                                $y=620;
                                                $code3="cour3                 ".$row['cour3'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);

                                                $x=850;
                                                $y=660;
                                                $code4="cour4                 ".$row['cour4'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);

                                                $x=850;
                                                $y=700;
                                                $code5="cour5                 ".$row['cour5'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);

                                                $x=850;
                                                $y=750;
                                                $code6="cour6                 ".$row['cour6'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);

                                                $x=850;
                                                $y=800;
                                                $code7="cour7                 ".$row['cour7'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);


                                                $x=850;
                                                $y=850;
                                                $code8="cour8                 ".$row['cour8'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);

                                                $x=850;
                                                $y=900;
                                                $code9="cour9                 ".$row['cour9'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);

                                                $x=850;
                                                $y=950;
                                                $code10="cour10                 ".$row['cour10'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);

                                                $x=850;
                                                $y=995;
                                                $code11="cour11                 ".$row['cour11'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);

                                                $x=850;
                                                $y=1040;
                                                $code12="cour12                 ".$row['cour12'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);

                                                $x=850;
                                                $y=1085;
                                                $code13="cour13                 ".$row['cour13'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);

                                                $x=850;
                                                $y=1130;
                                                $code14="cour14                 ".$row['cour14'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);

                                                $x=850;
                                                $y=1175;
                                                $code15="cour15                 ".$row['cour15'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);

                                                $x=850;
                                                $y=1220;
                                                $code16="cour16                 ".$row['cour16'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);

                                                $x=850;
                                                $y=1265;
                                                $code17="cour17                 ".$row['cour17'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);

                                                $x=850;
                                                $y=1310;
                                                $code18="cour18                 ".$row['cour18'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                
                                                $x=850;
                                                $y=1355;
                                                $code19="cour19                 ".$row['cour19'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);

                                                $x=850;
                                                $y=1400;
                                                $code20="cour20                 ".$row['cour20'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);

                                                $x=850;
                                                $y=1450;
                                                $code21="cour21                 ".$row['cour21'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);

                                                $x=850;
                                                $y=1500;
                                                $code22="cour22                 ".$row['cour22'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code22);

                                                $x=850;
                                                $y=1550;
                                                $code23="cour23                 ".$row['cour23'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code23);

                                                $x=850;
                                                $y=1590;
                                                $code24="cour24                 ".$row['cour24'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code24);

                                                $x=850;
                                                $y=1630;
                                                $code25="cour25                 ".$row['cour25'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code25);

                                                $x=850;
                                                $y=1670;
                                                $code26="cour26                 ".$row['cour26'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code26);

                                                $x=850;
                                                $y=1710;
                                                $code27="cour27                 ".$row['cour27'];
                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code27);

                                                
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
                                            deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(CS)');
                                            if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(CS)" , 0777)){
                                            }
                                            else{
                                                echo "failed to create directory ";
                                            }
                                            imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(CS)/'.$name.'.jpg');
                                            $pdf=new FPDF('L','in',[11.7,8.27]);
                                            $pdf->AddPage();
                                            $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(CS)/".$name.".jpg",0,0,11.7,8.27);
                                            $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(CS)/".$name.".pdf","F");
                                            imagedestroy($img_source);
                                            echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                            ?>
                                            <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <script>
                                            echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                            window.location.replace('credentials.php');
                                            </script>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                            <?php
                                            }else{
                                                ?>
                                                <script>
                                                alert("<?php echo "you entered incorrect ID!!"?>");
                                                window.location.replace('credentials.php');
                                                </script>
                                                <?php
                                                }
                                            }

                                              // give credential for computer science students
                                            else if(mysqli_num_rows($result2) === 1){ 
                                                $row = mysqli_fetch_assoc($result2);
                                                if ($row['Graduate_ID'] === $code) {
                                                    $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                                    $select="SELECT *FROM electrical where Graduate_ID='$code'";
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
                                                                $file_name='credent.jpg';
                                                                $x=200;
                                                                $y=200;
                                                                
                                                                $img_source=imagecreatefromjpeg($file_name);
                                                                $text_color=imagecolorallocate($img_source,0,0,255);
                                                                $color=imagecolorallocate($img_source,19,21,22);

                                                                $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                                imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                                // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                                
                                                                $faculty=$row['Faculty'];
                                                                imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);
                
                                                                $department=$row['Department'];
                                                                imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                                
                                                                // $co1=$row['cour1'];
                                                                // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                                
                                                                $x=850;
                                                                $y=540;
                                                                $code1="cour1                 ".$row['cour1'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);
                
                                                                $x=850;
                                                                $y=580;
                                                                $code2="cour2                 ".$row['cour2'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);
                
                                                                $x=850;
                                                                $y=620;
                                                                $code3="cour3                 ".$row['cour3'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);
                
                                                                $x=850;
                                                                $y=660;
                                                                $code4="cour4                 ".$row['cour4'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);
                
                                                                $x=850;
                                                                $y=700;
                                                                $code5="cour5                 ".$row['cour5'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);
                
                                                                $x=850;
                                                                $y=750;
                                                                $code6="cour6                 ".$row['cour6'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);
                
                                                                $x=850;
                                                                $y=800;
                                                                $code7="cour7                 ".$row['cour7'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);
                
                
                                                                $x=850;
                                                                $y=850;
                                                                $code8="cour8                 ".$row['cour8'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);
                
                                                                $x=850;
                                                                $y=900;
                                                                $code9="cour9                 ".$row['cour9'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);
                
                                                                $x=850;
                                                                $y=950;
                                                                $code10="cour10                 ".$row['cour10'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);
                
                                                                $x=850;
                                                                $y=995;
                                                                $code11="cour11                 ".$row['cour11'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);
                
                                                                $x=850;
                                                                $y=1040;
                                                                $code12="cour12                 ".$row['cour12'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);
                
                                                                $x=850;
                                                                $y=1085;
                                                                $code13="cour13                 ".$row['cour13'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);
                
                                                                $x=850;
                                                                $y=1130;
                                                                $code14="cour14                 ".$row['cour14'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);
                
                                                                $x=850;
                                                                $y=1175;
                                                                $code15="cour15                 ".$row['cour15'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);
                
                                                                $x=850;
                                                                $y=1220;
                                                                $code16="cour16                 ".$row['cour16'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);
                
                                                                $x=850;
                                                                $y=1265;
                                                                $code17="cour17                 ".$row['cour17'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);
                
                                                                $x=850;
                                                                $y=1310;
                                                                $code18="cour18                 ".$row['cour18'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                                
                                                                $x=850;
                                                                $y=1355;
                                                                $code19="cour19                 ".$row['cour19'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);
                
                                                                $x=850;
                                                                $y=1400;
                                                                $code20="cour20                 ".$row['cour20'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);
                
                                                                $x=850;
                                                                $y=1450;
                                                                $code21="cour21                 ".$row['cour21'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);
                
                                                                $x=850;
                                                                $y=1500;
                                                                $code22="cour22                 ".$row['cour22'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code22);
                
                                                                $x=850;
                                                                $y=1550;
                                                                $code23="cour23                 ".$row['cour23'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code23);
                
                                                                $x=850;
                                                                $y=1590;
                                                                $code24="cour24                 ".$row['cour24'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code24);
                
                                                                $x=850;
                                                                $y=1630;
                                                                $code25="cour25                 ".$row['cour25'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code25);
                
                                                                $x=850;
                                                                $y=1670;
                                                                $code26="cour26                 ".$row['cour26'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code26);
                
                                                                $x=850;
                                                                $y=1710;
                                                                $code27="cour27                 ".$row['cour27'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code27);

                                                                $x=850;
                                                                $y=1750;
                                                                $code28="cour28                 ".$row['cour28'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code28);

                                                                $x=850;
                                                                $y=1810;
                                                                $code29="cour29                 ".$row['cour29'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code29);

                                                                $x=850;
                                                                $y=1870;
                                                                $code30="cour30                 ".$row['cour30'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code30);

                                                                $x=850;
                                                                $y=1920;
                                                                $code31="cour31                 ".$row['cour31'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code31);

                                                                $x=850;
                                                                $y=1960;
                                                                $code32="cour32                 ".$row['cour32'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code32);
                                                            
                                                                
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
                                                            deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(Elec)');
                                                            if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(Elec)" , 0777)){
                                                            }
                                                            else{
                                                                echo "failed to create directory ";
                                                            }
                                                            imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(Elec)/'.$name.'.jpg');
                                                            $pdf=new FPDF('L','in',[11.7,8.27]);
                                                            $pdf->AddPage();
                                                            $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(Elec)/".$name.".jpg",0,0,11.7,8.27);
                                                            $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(Elec)/".$name.".pdf","F");
                                                            imagedestroy($img_source);
                                                            echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                                            ?>
                                                            <?php
                                                            }
                                                        }
                                                        else{
                                                            ?>
                                                            <script>
                                                            echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                                            window.location.replace('credentials.php');
                                                            </script>
                                                            <?php
                                                            }
                                                            ?>
                                                            </div>
                                                            <?php
                                                            }else{
                                                                ?>
                                                                <script>
                                                                alert("<?php echo "you entered incorrect ID!!"?>");
                                                                window.location.replace('credentials.php');
                                                                </script>
                                                                <?php
                                                                }
                                            }

                                                // give credential for chemical_Enginnering students
                                                else if(mysqli_num_rows($result3) === 1){ 
                                                $row = mysqli_fetch_assoc($result3);
                                                if ($row['Graduate_ID'] === $code) {
                                                    $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                                    $select="SELECT *FROM chemical where Graduate_ID='$code'";
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
                                                                $file_name='credent.jpg';
                                                                $x=200;
                                                                $y=200;
                                                                
                                                                $img_source=imagecreatefromjpeg($file_name);
                                                                $text_color=imagecolorallocate($img_source,0,0,255);
                                                                $color=imagecolorallocate($img_source,19,21,22);

                                                                $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                                imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                                // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                                
                                                                $faculty=$row['Faculty'];
                                                                imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);
                
                                                                $department=$row['Department'];
                                                                imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                                
                                                                // $co1=$row['cour1'];
                                                                // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                                
                                                                $x=850;
                                                                $y=540;
                                                                $code1="cour1                 ".$row['cour1'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);
                
                                                                $x=850;
                                                                $y=580;
                                                                $code2="cour2                 ".$row['cour2'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);
                
                                                                $x=850;
                                                                $y=620;
                                                                $code3="cour3                 ".$row['cour3'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);
                
                                                                $x=850;
                                                                $y=660;
                                                                $code4="cour4                 ".$row['cour4'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);
                
                                                                $x=850;
                                                                $y=700;
                                                                $code5="cour5                 ".$row['cour5'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);
                
                                                                $x=850;
                                                                $y=750;
                                                                $code6="cour6                 ".$row['cour6'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);
                
                                                                $x=850;
                                                                $y=800;
                                                                $code7="cour7                 ".$row['cour7'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);
                
                
                                                                $x=850;
                                                                $y=850;
                                                                $code8="cour8                 ".$row['cour8'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);
                
                                                                $x=850;
                                                                $y=900;
                                                                $code9="cour9                 ".$row['cour9'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);
                
                                                                $x=850;
                                                                $y=950;
                                                                $code10="cour10                 ".$row['cour10'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);
                
                                                                $x=850;
                                                                $y=995;
                                                                $code11="cour11                 ".$row['cour11'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);
                
                                                                $x=850;
                                                                $y=1040;
                                                                $code12="cour12                 ".$row['cour12'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);
                
                                                                $x=850;
                                                                $y=1085;
                                                                $code13="cour13                 ".$row['cour13'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);
                
                                                                $x=850;
                                                                $y=1130;
                                                                $code14="cour14                 ".$row['cour14'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);
                
                                                                $x=850;
                                                                $y=1175;
                                                                $code15="cour15                 ".$row['cour15'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);
                
                                                                $x=850;
                                                                $y=1220;
                                                                $code16="cour16                 ".$row['cour16'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);
                
                                                                $x=850;
                                                                $y=1265;
                                                                $code17="cour17                 ".$row['cour17'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);
                
                                                                $x=850;
                                                                $y=1310;
                                                                $code18="cour18                 ".$row['cour18'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                                
                                                                $x=850;
                                                                $y=1355;
                                                                $code19="cour19                 ".$row['cour19'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);
                
                                                                $x=850;
                                                                $y=1400;
                                                                $code20="cour20                 ".$row['cour20'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);
                
                                                                $x=850;
                                                                $y=1450;
                                                                $code21="cour21                 ".$row['cour21'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);
                
                                                                $x=850;
                                                                $y=1500;
                                                                $code22="cour22                 ".$row['cour22'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code22);
                
                                                                $x=850;
                                                                $y=1550;
                                                                $code23="cour23                 ".$row['cour23'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code23);
                
                                                                $x=850;
                                                                $y=1590;
                                                                $code24="cour24                 ".$row['cour24'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code24);
                
                                                                $x=850;
                                                                $y=1630;
                                                                $code25="cour25                 ".$row['cour25'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code25);
                
                                                                $x=850;
                                                                $y=1670;
                                                                $code26="cour26                 ".$row['cour26'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code26);
                
                                                                $x=850;
                                                                $y=1710;
                                                                $code27="cour27                 ".$row['cour27'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code27);

                                                                $x=850;
                                                                $y=1750;
                                                                $code28="cour28                 ".$row['cour28'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code28);

                                                                $x=850;
                                                                $y=1810;
                                                                $code29="cour29                 ".$row['cour29'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code29);

                                                                $x=850;
                                                                $y=1870;
                                                                $code30="cour30                 ".$row['cour30'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code30);

                                                                $x=850;
                                                                $y=1920;
                                                                $code31="cour31                 ".$row['cour31'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code31);

                                                                $x=850;
                                                                $y=1960;
                                                                $code32="cour32                 ".$row['cour32'];
                                                                // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code32);
                                                            
                                                                
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
                                                            deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(Chemical)');
                                                            if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(Chemical)" , 0777)){
                                                            }
                                                            else{
                                                                echo "failed to create directory ";
                                                            }
                                                            imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(Chemical)/'.$name.'.jpg');
                                                            $pdf=new FPDF('L','in',[11.7,8.27]);
                                                            $pdf->AddPage();
                                                            $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(Chemical)/".$name.".jpg",0,0,11.7,8.27);
                                                            $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(Chemical)/".$name.".pdf","F");
                                                            imagedestroy($img_source);
                                                            echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                                            ?>
                                                            <?php
                                                            }
                                                        }
                                                        else{
                                                            ?>
                                                            <script>
                                                            echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                                            window.location.replace('credentials.php');
                                                            </script>
                                                            <?php
                                                            }
                                                            ?>
                                                            </div>
                                                            <?php
                                                            }else{
                                                                ?>
                                                                <script>
                                                                alert("<?php echo "you entered incorrect ID!!"?>");
                                                                window.location.replace('credentials.php');
                                                                </script>
                                                                <?php
                                                                }

                                                }

                                                   // give credential for IT students
                                                   else if(mysqli_num_rows($result4) === 1){ 
                                                    $row = mysqli_fetch_assoc($result4);
                                                    if ($row['Graduate_ID'] === $code) {
                                                        $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                                        $select="SELECT *FROM it where Graduate_ID='$code'";
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
                                                                    $file_name='credent.jpg';
                                                                    $x=200;
                                                                    $y=200;
                                                                    
                                                                    $img_source=imagecreatefromjpeg($file_name);
                                                                    $text_color=imagecolorallocate($img_source,0,0,255);
                                                                    $color=imagecolorallocate($img_source,19,21,22);
                                                                    
                                                                    $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                                    imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                                    // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                                    
                                                                    $faculty=$row['Faculty'];
                                                                    imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);
                    
                                                                    $department=$row['Department'];
                                                                    imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                                    
                                                                    // $co1=$row['cour1'];
                                                                    // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                                    
                                                                    $x=850;
                                                                    $y=540;
                                                                    $code1="cour1                 ".$row['cour1'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);
                    
                                                                    $x=850;
                                                                    $y=580;
                                                                    $code2="cour2                 ".$row['cour2'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);
                    
                                                                    $x=850;
                                                                    $y=620;
                                                                    $code3="cour3                 ".$row['cour3'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);
                    
                                                                    $x=850;
                                                                    $y=660;
                                                                    $code4="cour4                 ".$row['cour4'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);
                    
                                                                    $x=850;
                                                                    $y=700;
                                                                    $code5="cour5                 ".$row['cour5'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);
                    
                                                                    $x=850;
                                                                    $y=750;
                                                                    $code6="cour6                 ".$row['cour6'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);
                    
                                                                    $x=850;
                                                                    $y=800;
                                                                    $code7="cour7                 ".$row['cour7'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);
                    
                    
                                                                    $x=850;
                                                                    $y=850;
                                                                    $code8="cour8                 ".$row['cour8'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);
                    
                                                                    $x=850;
                                                                    $y=900;
                                                                    $code9="cour9                 ".$row['cour9'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);
                    
                                                                    $x=850;
                                                                    $y=950;
                                                                    $code10="cour10                 ".$row['cour10'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);
                    
                                                                    $x=850;
                                                                    $y=995;
                                                                    $code11="cour11                 ".$row['cour11'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);
                    
                                                                    $x=850;
                                                                    $y=1040;
                                                                    $code12="cour12                 ".$row['cour12'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);
                    
                                                                    $x=850;
                                                                    $y=1085;
                                                                    $code13="cour13                 ".$row['cour13'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);
                    
                                                                    $x=850;
                                                                    $y=1130;
                                                                    $code14="cour14                 ".$row['cour14'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);
                    
                                                                    $x=850;
                                                                    $y=1175;
                                                                    $code15="cour15                 ".$row['cour15'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);
                    
                                                                    $x=850;
                                                                    $y=1220;
                                                                    $code16="cour16                 ".$row['cour16'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);
                    
                                                                    $x=850;
                                                                    $y=1265;
                                                                    $code17="cour17                 ".$row['cour17'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);
                    
                                                                    $x=850;
                                                                    $y=1310;
                                                                    $code18="cour18                 ".$row['cour18'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                                    
                                                                    $x=850;
                                                                    $y=1355;
                                                                    $code19="cour19                 ".$row['cour19'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);
                    
                                                                    $x=850;
                                                                    $y=1400;
                                                                    $code20="cour20                 ".$row['cour20'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);
                    
                                                                    $x=850;
                                                                    $y=1450;
                                                                    $code21="cour21                 ".$row['cour21'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);
                    
                                                                    $x=850;
                                                                    $y=1500;
                                                                    $code22="cour22                 ".$row['cour22'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code22);
                    
                                                                    $x=850;
                                                                    $y=1550;
                                                                    $code23="cour23                 ".$row['cour23'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code23);
                    
                                                                    $x=850;
                                                                    $y=1590;
                                                                    $code24="cour24                 ".$row['cour24'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code24);
                    
                                                                    $x=850;
                                                                    $y=1630;
                                                                    $code25="cour25                 ".$row['cour25'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code25);
                    
                                                                    $x=850;
                                                                    $y=1670;
                                                                    $code26="cour26                 ".$row['cour26'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code26);
                    
                                                                    $x=850;
                                                                    $y=1710;
                                                                    $code27="cour27                 ".$row['cour27'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code27);
                    
                                                                    
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
                                                                deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(it)');
                                                                if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(it)" , 0777)){
                                                                }
                                                                else{
                                                                    echo "failed to create directory ";
                                                                }
                                                                imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(it)/'.$name.'.jpg');
                                                                $pdf=new FPDF('L','in',[11.7,8.27]);
                                                                $pdf->AddPage();
                                                                $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(it)/".$name.".jpg",0,0,11.7,8.27);
                                                                $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(it)/".$name.".pdf","F");
                                                                imagedestroy($img_source);
                                                                echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                                                ?>
                                                                <?php
                                                                }
                                                            }
                                                            else{
                                                                ?>
                                                                <script>
                                                                echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                                                window.location.replace('credentials.php');
                                                                </script>
                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                    <script>
                                                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                                                    window.location.replace('credentials.php');
                                                                    </script>
                                                                    <?php
                                                                    }
    
                                                    }

                                                       // give credential for law students
                                                else if(mysqli_num_rows($result5) === 1){ 
                                                    $row = mysqli_fetch_assoc($result5);
                                                    if ($row['Graduate_ID'] === $code) {
                                                        $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                                        $select="SELECT *FROM law where Graduate_ID='$code'";
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
                                                                    $file_name='credent.jpg';
                                                                    $x=200;
                                                                    $y=200;
                                                                    
                                                                    $img_source=imagecreatefromjpeg($file_name);
                                                                    $text_color=imagecolorallocate($img_source,0,0,255);
                                                                    $color=imagecolorallocate($img_source,19,21,22);
    
                                                                    $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                                    imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                                    // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                                    
                                                                    $faculty=$row['Faculty'];
                                                                    imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);
                    
                                                                    $department=$row['Department'];
                                                                    imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                                    
                                                                    // $co1=$row['cour1'];
                                                                    // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                                    
                                                                    $x=850;
                                                                    $y=540;
                                                                    $code1="cour1                 ".$row['cour1'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);
                    
                                                                    $x=850;
                                                                    $y=580;
                                                                    $code2="cour2                 ".$row['cour2'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);
                    
                                                                    $x=850;
                                                                    $y=620;
                                                                    $code3="cour3                 ".$row['cour3'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);
                    
                                                                    $x=850;
                                                                    $y=660;
                                                                    $code4="cour4                 ".$row['cour4'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);
                    
                                                                    $x=850;
                                                                    $y=700;
                                                                    $code5="cour5                 ".$row['cour5'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);
                    
                                                                    $x=850;
                                                                    $y=750;
                                                                    $code6="cour6                 ".$row['cour6'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);
                    
                                                                    $x=850;
                                                                    $y=800;
                                                                    $code7="cour7                 ".$row['cour7'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);
                    
                    
                                                                    $x=850;
                                                                    $y=850;
                                                                    $code8="cour8                 ".$row['cour8'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);
                    
                                                                    $x=850;
                                                                    $y=900;
                                                                    $code9="cour9                 ".$row['cour9'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);
                    
                                                                    $x=850;
                                                                    $y=950;
                                                                    $code10="cour10                 ".$row['cour10'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);
                    
                                                                    $x=850;
                                                                    $y=995;
                                                                    $code11="cour11                 ".$row['cour11'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);
                    
                                                                    $x=850;
                                                                    $y=1040;
                                                                    $code12="cour12                 ".$row['cour12'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);
                    
                                                                    $x=850;
                                                                    $y=1085;
                                                                    $code13="cour13                 ".$row['cour13'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);
                    
                                                                    $x=850;
                                                                    $y=1130;
                                                                    $code14="cour14                 ".$row['cour14'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);
                    
                                                                    $x=850;
                                                                    $y=1175;
                                                                    $code15="cour15                 ".$row['cour15'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);
                    
                                                                    $x=850;
                                                                    $y=1220;
                                                                    $code16="cour16                 ".$row['cour16'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);
                    
                                                                    $x=850;
                                                                    $y=1265;
                                                                    $code17="cour17                 ".$row['cour17'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);
                    
                                                                    $x=850;
                                                                    $y=1310;
                                                                    $code18="cour18                 ".$row['cour18'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                                    
                                                                    $x=850;
                                                                    $y=1355;
                                                                    $code19="cour19                 ".$row['cour19'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);
                    
                                                                    $x=850;
                                                                    $y=1400;
                                                                    $code20="cour20                 ".$row['cour20'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);
                    
                                                                    $x=850;
                                                                    $y=1450;
                                                                    $code21="cour21                 ".$row['cour21'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);
                    
                                                                    $x=850;
                                                                    $y=1500;
                                                                    $code22="cour22                 ".$row['cour22'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code22);
                    
                                                                    $x=850;
                                                                    $y=1550;
                                                                    $code23="cour23                 ".$row['cour23'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code23);
                    
                                                                    $x=850;
                                                                    $y=1590;
                                                                    $code24="cour24                 ".$row['cour24'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code24);
                    
                                                                    $x=850;
                                                                    $y=1630;
                                                                    $code25="cour25                 ".$row['cour25'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code25);
                    
                                                                    $x=850;
                                                                    $y=1670;
                                                                    $code26="cour26                 ".$row['cour26'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code26);
                    
                                                                    $x=850;
                                                                    $y=1710;
                                                                    $code27="cour27                 ".$row['cour27'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code27);
    
                                                                    $x=850;
                                                                    $y=1750;
                                                                    $code28="cour28                 ".$row['cour28'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code28);
    
                                                                    $x=850;
                                                                    $y=1810;
                                                                    $code29="cour29                 ".$row['cour29'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code29);
    
                                                                    $x=850;
                                                                    $y=1870;
                                                                    $code30="cour30                 ".$row['cour30'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code30);
    
                                                                    $x=850;
                                                                    $y=1920;
                                                                    $code31="cour31                 ".$row['cour31'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code31);
    
                                                                    $x=850;
                                                                    $y=1960;
                                                                    $code32="cour32                 ".$row['cour32'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code32);
                                                                
                                                                    
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
                                                                deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(law)');
                                                                if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(law)" , 0777)){
                                                                }
                                                                else{
                                                                    echo "failed to create directory ";
                                                                }
                                                                imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(law)/'.$name.'.jpg');
                                                                $pdf=new FPDF('L','in',[11.7,8.27]);
                                                                $pdf->AddPage();
                                                                $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(law)/".$name.".jpg",0,0,11.7,8.27);
                                                                $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(law)/".$name.".pdf","F");
                                                                imagedestroy($img_source);
                                                                echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                                                ?>
                                                                <?php
                                                                }
                                                            }
                                                            else{
                                                                ?>
                                                                <script>
                                                                echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                                                window.location.replace('credentials.php');
                                                                </script>
                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                    <script>
                                                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                                                    window.location.replace('credentials.php');
                                                                    </script>
                                                                    <?php
                                                                    }
                                                    
    
                                                    }

                                                       // give credential for plant_science students
                                                else if(mysqli_num_rows($result6) === 1){ 
                                                    $row = mysqli_fetch_assoc($result6);

                                                    if ($row['Graduate_ID'] === $code) {
                                                        $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                                        $select="SELECT *FROM managment where Graduate_ID='$code'";
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
                                                                    $file_name='credent.jpg';
                                                                    $x=200;
                                                                    $y=200;
                                                                    
                                                                    $img_source=imagecreatefromjpeg($file_name);
                                                                    $text_color=imagecolorallocate($img_source,0,0,255);
                                                                    $color=imagecolorallocate($img_source,19,21,22);
                                                                    
                                                                    $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                                    imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                                    // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                                    
                                                                    $faculty=$row['Faculty'];
                                                                    imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);
                    
                                                                    $department=$row['Department'];
                                                                    imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                                    
                                                                    // $co1=$row['cour1'];
                                                                    // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                                    
                                                                    $x=850;
                                                                    $y=540;
                                                                    $code1="cour1                 ".$row['cour1'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);
                    
                                                                    $x=850;
                                                                    $y=580;
                                                                    $code2="cour2                 ".$row['cour2'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);
                    
                                                                    $x=850;
                                                                    $y=620;
                                                                    $code3="cour3                 ".$row['cour3'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);
                    
                                                                    $x=850;
                                                                    $y=660;
                                                                    $code4="cour4                 ".$row['cour4'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);
                    
                                                                    $x=850;
                                                                    $y=700;
                                                                    $code5="cour5                 ".$row['cour5'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);
                    
                                                                    $x=850;
                                                                    $y=750;
                                                                    $code6="cour6                 ".$row['cour6'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);
                    
                                                                    $x=850;
                                                                    $y=800;
                                                                    $code7="cour7                 ".$row['cour7'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);
                    
                    
                                                                    $x=850;
                                                                    $y=850;
                                                                    $code8="cour8                 ".$row['cour8'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);
                    
                                                                    $x=850;
                                                                    $y=900;
                                                                    $code9="cour9                 ".$row['cour9'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);
                    
                                                                    $x=850;
                                                                    $y=950;
                                                                    $code10="cour10                 ".$row['cour10'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);
                    
                                                                    $x=850;
                                                                    $y=995;
                                                                    $code11="cour11                 ".$row['cour11'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);
                    
                                                                    $x=850;
                                                                    $y=1040;
                                                                    $code12="cour12                 ".$row['cour12'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);
                    
                                                                    $x=850;
                                                                    $y=1085;
                                                                    $code13="cour13                 ".$row['cour13'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);
                    
                                                                    $x=850;
                                                                    $y=1130;
                                                                    $code14="cour14                 ".$row['cour14'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);
                    
                                                                    $x=850;
                                                                    $y=1175;
                                                                    $code15="cour15                 ".$row['cour15'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);
                    
                                                                    $x=850;
                                                                    $y=1220;
                                                                    $code16="cour16                 ".$row['cour16'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);
                    
                                                                    $x=850;
                                                                    $y=1265;
                                                                    $code17="cour17                 ".$row['cour17'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);
                    
                                                                    $x=850;
                                                                    $y=1310;
                                                                    $code18="cour18                 ".$row['cour18'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                                    
                                                                    $x=850;
                                                                    $y=1355;
                                                                    $code19="cour19                 ".$row['cour19'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);
                    
                                                                    $x=850;
                                                                    $y=1400;
                                                                    $code20="cour20                 ".$row['cour20'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);
                    
                                                                    $x=850;
                                                                    $y=1450;
                                                                    $code21="cour21                 ".$row['cour21'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);
                    
                                                                    
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
                                                                deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(management)');
                                                                if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(management)" , 0777)){
                                                                }
                                                                else{
                                                                    echo "failed to create directory ";
                                                                }
                                                                imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(management)/'.$name.'.jpg');
                                                                $pdf=new FPDF('L','in',[11.7,8.27]);
                                                                $pdf->AddPage();
                                                                $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(management)/".$name.".jpg",0,0,11.7,8.27);
                                                                $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(management)/".$name.".pdf","F");
                                                                imagedestroy($img_source);
                                                                echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                                                ?>
                                                                <?php
                                                                }
                                                            }
                                                            else{
                                                                ?>
                                                                <script>
                                                                echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                                                window.location.replace('credentials.php');
                                                                </script>
                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                    <script>
                                                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                                                    window.location.replace('credentials.php');
                                                                    </script>
                                                                    <?php
                                                                    }

                                                    }

                                               // give credential for veternary_science students
                                                else if(mysqli_num_rows($result7) === 1){ 
                                                    $row = mysqli_fetch_assoc($result7);
                                                    if ($row['Graduate_ID'] === $code) {
                                                        $_SESSION['Graduate_ID'] = $row['Graduate_ID'];
                                                        $select="SELECT *FROM nursing where Graduate_ID='$code'";
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
                                                                    $file_name='credent.jpg';
                                                                    $x=200;
                                                                    $y=200;
                                                                    
                                                                    $img_source=imagecreatefromjpeg($file_name);
                                                                    $text_color=imagecolorallocate($img_source,0,0,255);
                                                                    $color=imagecolorallocate($img_source,19,21,22);
                                                                    
                                                                    $name=$row['First_Name']." ".$row['Middle_Name']." ".$row['Last_Name'];
                                                                    imagettftext($img_source,30,0,360,210,$color,$fontmain,$name);
                                                                    // ImageString($img_source,5,$x,$y,$row['First_Name'],$text_color);
                                                                    
                                                                    $faculty=$row['Faculty'];
                                                                    imagettftext($img_source,30,0,230,290,$color,$fontmain,$faculty);
                    
                                                                    $department=$row['Department'];
                                                                    imagettftext($img_source,30,0,330,384,$color,$fontmain,$department);
                                                                    
                                                                    // $co1=$row['cour1'];
                                                                    // imagettftext($img_source,30,0,320,648,$color,$fontmain,$co1);
                                                                    
                                                                    $x=850;
                                                                    $y=540;
                                                                    $code1="cour1                 ".$row['cour1'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code1);
                    
                                                                    $x=850;
                                                                    $y=580;
                                                                    $code2="cour2                 ".$row['cour2'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code2);
                    
                                                                    $x=850;
                                                                    $y=620;
                                                                    $code3="cour3                 ".$row['cour3'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code3);
                    
                                                                    $x=850;
                                                                    $y=660;
                                                                    $code4="cour4                 ".$row['cour4'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code4);
                    
                                                                    $x=850;
                                                                    $y=700;
                                                                    $code5="cour5                 ".$row['cour5'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code5);
                    
                                                                    $x=850;
                                                                    $y=750;
                                                                    $code6="cour6                 ".$row['cour6'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code6);
                    
                                                                    $x=850;
                                                                    $y=800;
                                                                    $code7="cour7                 ".$row['cour7'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code7);
                    
                    
                                                                    $x=850;
                                                                    $y=850;
                                                                    $code8="cour8                 ".$row['cour8'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code8);
                    
                                                                    $x=850;
                                                                    $y=900;
                                                                    $code9="cour9                 ".$row['cour9'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code9);
                    
                                                                    $x=850;
                                                                    $y=950;
                                                                    $code10="cour10                 ".$row['cour10'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code10);
                    
                                                                    $x=850;
                                                                    $y=995;
                                                                    $code11="cour11                 ".$row['cour11'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code11);
                    
                                                                    $x=850;
                                                                    $y=1040;
                                                                    $code12="cour12                 ".$row['cour12'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code12);
                    
                                                                    $x=850;
                                                                    $y=1085;
                                                                    $code13="cour13                 ".$row['cour13'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code13);
                    
                                                                    $x=850;
                                                                    $y=1130;
                                                                    $code14="cour14                 ".$row['cour14'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code14);
                    
                                                                    $x=850;
                                                                    $y=1175;
                                                                    $code15="cour15                 ".$row['cour15'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code15);
                    
                                                                    $x=850;
                                                                    $y=1220;
                                                                    $code16="cour16                 ".$row['cour16'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code16);
                    
                                                                    $x=850;
                                                                    $y=1265;
                                                                    $code17="cour17                 ".$row['cour17'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code17);
                    
                                                                    $x=850;
                                                                    $y=1310;
                                                                    $code18="cour18                 ".$row['cour18'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code18);
                                                                    
                                                                    $x=850;
                                                                    $y=1355;
                                                                    $code19="cour19                 ".$row['cour19'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code19);
                    
                                                                    $x=850;
                                                                    $y=1400;
                                                                    $code20="cour20                 ".$row['cour20'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code20);
                    
                                                                    $x=850;
                                                                    $y=1450;
                                                                    $code21="cour21                 ".$row['cour21'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code21);
                    
                                                                    $x=850;
                                                                    $y=1500;
                                                                    $code22="cour22                 ".$row['cour22'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code22);
                    
                                                                    $x=850;
                                                                    $y=1550;
                                                                    $code23="cour23                 ".$row['cour23'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code23);
                    
                                                                    $x=850;
                                                                    $y=1590;
                                                                    $code24="cour24                 ".$row['cour24'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code24);
                    
                                                                    $x=850;
                                                                    $y=1630;
                                                                    $code25="cour25                 ".$row['cour25'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code25);
                    
                                                                    $x=850;
                                                                    $y=1670;
                                                                    $code26="cour26                 ".$row['cour26'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code26);
                    
                                                                    $x=850;
                                                                    $y=1710;
                                                                    $code27="cour27                 ".$row['cour27'];
                                                                    // ImageString($img_source,3000,$x,$y,"ID: ".$code,$text_color);
                                                                    imagettftext($img_source,30,0,$x,$y,$color,$fontmain,$code27);
                    
                                                                    
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
                                                                deleteAll('C:\Users\fuye4\OneDrive\Documents\Your Credential(nursing)');
                                                                if(mkdir("C:/Users/fuye4/OneDrive/Documents/Your Credential(nursing)" , 0777)){
                                                                }
                                                                else{
                                                                    echo "failed to create directory ";
                                                                }
                                                                imagejpeg($img_source,'C:/Users/fuye4/OneDrive/Documents/Your Credential(nursing)/'.$name.'.jpg');
                                                                $pdf=new FPDF('L','in',[11.7,8.27]);
                                                                $pdf->AddPage();
                                                                $pdf->Image("C:/Users/fuye4/OneDrive/Documents/Your Credential(nursing)/".$name.".jpg",0,0,11.7,8.27);
                                                                $pdf->Output("C:/Users/fuye4/OneDrive/Documents/Your Credential(nursing)/".$name.".pdf","F");
                                                                imagedestroy($img_source);
                                                                echo "<h2 style='text-align:center; color:green;margin:200px;font-family:Lobster;font-size:22px;'>your credential is saved.. check in your document.</h2>";
                                                                ?>
                                                                <?php
                                                                }
                                                            }
                                                            else{
                                                                ?>
                                                                <script>
                                                                echo "<script> alert('please try again after your certificate is prepared!') </script>";
                                                                window.location.replace('credentials.php');
                                                                </script>
                                                                <?php
                                                                }
                                                                ?>
                                                                </div>
                                                                <?php
                                                                }else{
                                                                    ?>
                                                                    <script>
                                                                    alert("<?php echo "you entered incorrect ID!!"?>");
                                                                    window.location.replace('credentials.php');
                                                                    </script>
                                                                    <?php
                                                                    }
                                                    
    
                                                    }


                                            else{
                                                ?>
                                                <script>
                                                alert("<?php echo "you entered incorrect ID!!"?>");
                                                window.location.replace('credentials.php');
                                                </script>
                                                <?php
                                                }
                                            }
                                        }
                                        ?>
                                        </section>
                                    </body>
                                    </html>


