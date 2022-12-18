<?php

include 'config.php';
$id=$_GET['id'];

$select="SELECT * FROM student WHERE Graduate_ID='$id'";
$select_q=mysqli_query($con,$select);
$fetch=mysqli_fetch_array($select_q);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/edit.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_edit_header.php"; 
        ?>
        
        <!---- Insert Graduate Student  Code --->
        <form action="" method="POST" enctype="multipart/form-data"> 
            <h1><i class='bx bx-user-plus'></i> <span>Edit Here</span></h1>
        <table class="form">
            <tr>
                <td>
                    First Name:
                </td>
                <td>
                    <input type="text" placeholder="First Name" name="firstname" value="<?php echo $fetch['First_Name'] ?>" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                <td>
                    Middle Name:
                </td>
                <td>
                    <input type="text" placeholder="Middle  Name" name="middlename" value="<?php echo $fetch['Middle_Name'] ?>" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                <td>
                    Last Name:
                </td>
                <td>
                    <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $fetch['Last_Name'] ?>" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                    <td>
                        Gender:
                    </td>
                    <td>
                        <?php $gendr=$fetch['Gender']; ?>

                        <input type="radio" name="gender" value="Male"
                        <?php
                        if($gendr=='Male')
                        {
                            echo "checked";
                        }
                        ?>
                        >Male
                        <input type="radio" name="gender" value="Female"
                        <?php
                        if($gendr=='Female')
                        {
                            echo "checked";
                        }
                        ?>
                        >Female
                    </td>
                </tr>
            <tr>
                <td>
                    Student Email:
                </td>
                <td>
                    <input type="email" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $fetch['Email'] ?>" required />                          
                </td>
            </tr>
            <tr>
                <td>
                    Year of Graduation:
                </td>
                <td>
                    <select name="yearofgraduation">
                    <?php $retrive=$fetch['Year_of_Graduation'] ?>
                        <option value="">--select one--</option>
                        <option value="2002"
                        <?php 
                        if($retrive=='2002')
                        {
                            echo "selected";
                        }
                        ?>
                        >2002</option>

                        <option value="2003"
                        <?php 
                        if($retrive=='2003')
                        {
                            echo "selected";
                        }
                        ?>
                        >2003</option>

                        <option value="2004"
                        <?php 
                        if($retrive=='2004')
                        {
                            echo "selected";
                        }
                        ?>
                        >2004</option>

                        <option value="2005"
                        <?php 
                        if($retrive=='2005')
                        {
                            echo "selected";
                        }
                        ?>
                        >2005</option>

                        <option value="2006"
                        <?php 
                        if($retrive=='2006')
                        {
                            echo "selected";
                        }
                        ?>
                        >2006</option>

                        <option value="2007"
                        <?php 
                        if($retrive=='2007')
                        {
                            echo "selected";
                        }
                        ?>
                        >2007</option>

                        <option value="2008"
                        <?php 
                        if($retrive=='2008')
                        {
                            echo "selected";
                        }
                        ?>
                        >2008</option>

                        <option value="2009"
                        <?php 
                        if($retrive=='2009')
                        {
                            echo "selected";
                        }
                        ?>
                        >2009</option>

                        <option value="2010"
                        <?php 
                        if($retrive=='2010')
                        {
                            echo "selected";
                        }
                        ?>
                        >2010</option>

                        <option value="2011"
                        <?php 
                        if($retrive=='2011')
                        {
                            echo "selected";
                        }
                        ?>
                        >2011</option>

                        <option value="2012"
                        <?php 
                        if($retrive=='2012')
                        {
                            echo "selected";
                        }
                        ?>
                        >2012</option>

                        <option value="2013"
                        <?php 
                        if($retrive=='2013')
                        {
                            echo "selected";
                        }
                        ?>
                        >2013</option>

                        <option value="2014"
                        <?php 
                        if($retrive=='2014')
                        {
                            echo "selected";
                        }
                        ?>
                        >2014</option>

                        <option value="2015"
                        <?php 
                        if($retrive=='2015')
                        {
                            echo "selected";
                        }
                        ?>
                        >2015</option>

                        <option value="2016"
                        <?php 
                        if($retrive=='2016')
                        {
                            echo "selected";
                        }
                        ?>
                        >2016</option>

                        <option value="2017"
                        <?php 
                        if($retrive=='2017')
                        {
                            echo "selected";
                        }
                        ?>
                        >2017</option>

                        <option value="2018"
                        <?php 
                        if($retrive=='2018')
                        {
                            echo "selected";
                        }
                        ?>
                        >2018</option>

                        <option value="2019"
                        <?php 
                        if($retrive=='2019')
                        {
                            echo "selected";
                        }
                        ?>
                        >2019</option>

                        <option value="2020"
                        <?php 
                        if($retrive=='2020')
                        {
                            echo "selected";
                        }
                        ?>
                        >2020</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                Cumulative_Gpa:
                </td>
                <td>
                    <input type="number" placeholder="Your GPA" name="cumulative_gpa" value="<?php echo $fetch['Cumulative_Gpa'] ?>" step="0.01">                                 
                </td>
            </tr>
            <tr>
                <td>
                    Qualification:
                    </td>
                    <td>
                        <select name="qualification">
                        <?php $qual=$fetch['Qualification']; ?>

                            <option value="">--select one--</option>
                            <option value="Bachelors Degree"
                            <?php 
                            if($qual=='Bachelors Degree')
                            {
                                echo "selected";
                            }
                            ?>
                            >Bachelors Degree</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Department:
                    </td>
                    <td>
                        <select name="department">
                        <?php $depr=$fetch['Department'];?>

                            <option value="">--select one--</option>

                            <option value="Computer Science"
                            <?php 
                            if($depr=='Computer Science')
                            {
                                echo "selected";
                            }
                            ?>
                            >Computer Science</option>

                            <option value="Information Technology"
                            <?php 
                            if($depr=='Information Technology')
                            {
                                echo "selected";
                            }
                            ?>
                            >Information Technology</option>

                            <option value="Electrical and Computer Engineering"
                            <?php 
                            if($depr=='Electrical and Computer Engineering')
                            {
                                echo "selected";
                            }
                            ?>
                            >Electrical and Computer Engineering</option>

                            <option value="Chemical Engineering"
                            <?php 
                            if($depr=='Chemical Engineering')
                            {
                                echo "selected";
                            }
                            ?>
                            >Chemical Engineering</option>

                            <option value="Electro Mechanical Engineering"
                            <?php 
                            if($depr=='Electro Mechanical Engineering')
                            {
                                echo "selected";
                            }
                            ?>
                            >Electro Mechanical Engineering</option>

                            <option value="Mechanical Engineering"
                            <?php 
                            if($depr=='Mechanical Engineering')
                            {
                                echo "selected";
                            }
                            ?>
                            >Mechanical Engineering</option>

                            <option value="Civil Engineering"
                            <?php 
                            if($depr=='Civil Engineering')
                            {
                                echo "selected";
                            }
                            ?>
                            >Civil Engineering</option>

                            <option value="Hydraulics and Water Engineering"
                            <?php 
                            if($depr=='Hydraulics and Water Engineering')
                            {
                                echo "selected";
                            }
                            ?>
                            >Hydraulics and Water Engineering</option>

                            <option value="Civics and Ethical Studies"
                            <?php 
                            if($depr=='Civics and Ethical Studies')
                            {
                                echo "selected";
                            }
                            ?>
                            >Civics and Ethical Studies</option>

                            <option value="History and Heritage Managment"
                            <?php 
                            if($depr=='History and Heritage Managment')
                            {
                                echo "selected";
                            }
                            ?>
                            >History and Heritage Managment</option>

                            <option value="Geography and Environmental Science"
                            <?php 
                            if($depr=='Geography and Environmental Science')
                            {
                                echo "selected";
                            }
                            ?>
                            >Geography and Environmental Science</option>

                            <option value="English Language and Litrature"
                            <?php 
                            if($depr=='English Language and Litrature')
                            {
                                echo "selected";
                            }
                            ?>
                            >English Language and Litrature</option>

                            <option value="Amharic Language and Litrature"
                            <?php 
                            if($depr=='Amharic Language and Litrature')
                            {
                                echo "selected";
                            }
                            ?>
                            >Amharic Language and Litrature</option>

                            <option value="Psychology"
                            <?php 
                            if($depr=='Psychology')
                            {
                                echo "selected";
                            }
                            ?>
                            >Psychology</option>

                            <option value="Sociology"
                            <?php 
                            if($depr=='Sociology')
                            {
                                echo "selected";
                            }
                            ?>
                            >Sociology</option>

                            <option value="Special Needs"
                            <?php 
                            if($depr=='Special Needs')
                            {
                                echo "selected";
                            }
                            ?>
                            >Special Needs</option>

                            <option value="Theatre Arts"
                            <?php 
                            if($depr=='Theatre Arts')
                            {
                                echo "selected";
                            }
                            ?>
                            >Theatre Arts</option>

                            <option value="Law"
                            <?php 
                            if($depr=='Law')
                            {
                                echo "selected";
                            }
                            ?>
                            >Law</option>

                            <option value="ECCE"
                            <?php 
                            if($depr=='ECCE')
                            {
                                echo "selected";
                            }
                            ?>
                            >ECCE</option>

                            <option value="Biology "
                            <?php 
                            if($depr=='Biology ')
                            {
                                echo "selected";
                            }
                            ?>
                            >Biology </option>

                            <option value="Chemistry"
                            <?php 
                            if($depr=='Chemistry')
                            {
                                echo "selected";
                            }
                            ?>
                            >Chemistry</option>

                            <option value="Mathematics"
                            <?php 
                            if($depr=='Mathematics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Mathematics</option>

                            <option value="Physics"
                            <?php 
                            if($depr=='Physics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Physics</option>

                            <option value="Statistics"
                            <?php 
                            if($depr=='Statistics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Statistics</option>

                            <option value="Accounting and Finance"
                            <?php 
                            if($depr=='Accounting and Finance')
                            {
                                echo "selected";
                            }
                            ?>
                            >Accounting and Finance</option>

                            <option value="Economics"
                            <?php 
                            if($depr=='Economics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Economics</option>

                            <option value="Management"
                            <?php 
                            if($depr=='Management')
                            {
                                echo "selected";
                            }
                            ?>
                            >Management</option>

                            <option value="Turism and Hotel Managment"
                            <?php 
                            if($depr=='Turism and Hotel Managment')
                            {
                                echo "selected";
                            }
                            ?>
                            >Turism and Hotel Managment</option>

                            <option value="Psychatry"
                            <?php 
                            if($depr=='Psychatry')
                            {
                                echo "selected";
                            }
                            ?>
                            >Psychatry</option>

                            <option value="Ansthesia"
                            <?php 
                            if($depr=='Ansthesia')
                            {
                                echo "selected";
                            }
                            ?>
                            >Ansthesia</option>

                            <option value="Internal"
                            <?php 
                            if($depr=='Internal')
                            {
                                echo "selected";
                            }
                            ?>
                            >Internal</option>

                            <option value="Surgery"
                            <?php 
                            if($depr=='Surgery')
                            {
                                echo "selected";
                            }
                            ?>
                            >Surgery</option>

                            <option value="Pediatrics"
                            <?php 
                            if($depr=='Pediatrics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Pediatrics</option>

                            <option value="Gynaecology"
                            <?php 
                            if($depr=='Gynaecology')
                            {
                                echo "selected";
                            }
                            ?>
                            >Gynaecology</option>

                            <option value="Obsthetrics"
                            <?php 
                            if($depr=='Obsthetrics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Obsthetrics</option>

                            <option value="Neonatal and Pediatrics nursing"
                            <?php 
                            if($depr=='Neonatal and Pediatrics nursing')
                            {
                                echo "selected";
                            }
                            ?>
                            >Neonatal and Pediatrics nursing</option>

                            <option value="Medical labratory Science"
                            <?php 
                            if($depr=='Medical labratory Science')
                            {
                                echo "selected";
                            }
                            ?>
                            >Medical labratory Science</option>

                            <option value="Midwifery"
                            <?php 
                            if($depr=='Midwifery')
                            {
                                echo "selected";
                            }
                            ?>
                            >Midwifery</option>

                            <option value="Nursing"
                            <?php 
                            if($depr=='Nursing')
                            {
                                echo "selected";
                            }
                            ?>
                            >Nursing</option>

                            <option value="Pharmacy"
                            <?php 
                            if($depr=='Pharmacy')
                            {
                                echo "selected";
                            }
                            ?>
                            >Pharmacy</option>

                            <option value="Health Informatics"
                            <?php 
                            if($depr=='Health Informatics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Health Informatics</option>

                            <option value="Agro Economics"
                            <?php 
                            if($depr=='Agro Economics')
                            {
                                echo "selected";
                            }
                            ?>
                            >Agro Economics</option>

                            <option value="Animal Science"
                            <?php 
                            if($depr=='Animal Science')
                            {
                                echo "selected";
                            }
                            ?>
                            >Animal Science</option>

                            <option value="Forestry"
                            <?php 
                            if($depr=='Forestry')
                            {
                                echo "selected";
                            }
                            ?>
                            >Forestry</option>


                            <option value="Horticulture"
                            <?php 
                            if($depr=='Horticulture')
                            {
                                echo "selected";
                            }
                            ?>
                            >Horticulture</option>

                            <option value="NARM"
                            <?php 
                            if($depr=='NARM')
                            {
                                echo "selected";
                            }
                            ?>
                            >NARM</option>

                            <option value="Plant Science"
                            <?php 
                            if($depr=='Plant Science')
                            {
                                echo "selected";
                            }
                            ?>
                            >Plant Science</option>

                            <option value="Veternary Science"
                            <?php 
                            if($depr=='Veternary Science')
                            {
                                echo "selected";
                            }
                            ?>
                            >Veternary Science</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Upload Photo:
                    </td>
                    <td>
                        <input type="file" name="photo"><br><br>
                        <img src="studentImages/<?php echo $fetch['Photo'] ?>" width="50px"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="update_btn" value="Update" class="hero-btn">  
                    </td>
                </tr>
            </table>
        </form>
            
            <?php
            if(isset($_POST['update_btn'])){
                
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $firstname=$_POST['firstname'];
                $middlename=$_POST['middlename'];
                $lastname=$_POST['lastname'];
                $gender=$_POST['gender'];
                $email=$_POST['email'];
                $yearofgraduation=$_POST['yearofgraduation'];
                $cumulative_gpa=$_POST['cumulative_gpa'];
                $qualification=$_POST['qualification'];
                $department=$_POST['department'];
                $image=$_FILES['photo']['name'];
                $tmp_name=$_FILES['photo']['tmp_name'];
                $destination="studentImages/".$image;
                
                $img_loc=$_FILES['photo']['tmp_name'];
                $img_name=$_FILES['photo']['name'];
                $img_des="studentImages/".$img_name;
                
                if($image!="")
                {
                    // echo "Image selected";
                    move_uploaded_file($tmp_name,$destination);
                    $update="UPDATE student Set First_Name='$firstname',Middle_Name='$middlename',Last_Name='$lastname',Gender='$gender',Email='$email',Year_of_Graduation='$yearofgraduation',Cumulative_Gpa='$cumulative_gpa',Qualification='$qualification',Department='$department',Photo='$image' WHERE Graduate_ID='$id'";
                    $update_q=mysqli_query($con,$update);
                    echo "<script>alert('student information updated successfully!!') </script>";
                    // header('location:view.php');
                }
                else{
                    // echo "Image not selected";
                    $update="UPDATE student Set First_Name='$firstname',Middle_Name='$middlename',Last_Name='$lastname',Gender='$gender',Email='$email',Year_of_Graduation='$yearofgraduation',Cumulative_Gpa='$cumulative_gpa',Qualification='$qualification',Department='$department' WHERE Graduate_ID='$id'";
                    $update_q=mysqli_query($con,$update);
                    echo "<script>alert('student information updated successfully!!') </script>";
                    // header('location:view.php');
                }
            }
            ?>
            </body>
            </html>