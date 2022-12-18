<?php
include 'config.php';
$select="SELECT *FROM student";
$select_q=mysqli_query($con,$select);
$data=mysqli_num_rows($select_q);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/view.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
    <?php
        include "headers/for_view_header.php"; 
         ?>

         <!---- View Graduate Student Information Code --->
         <h1 style="width: 80%;color: rgb(30, 46, 48); display: flex; font-family:Lobster; margin-top:40px; margin-left:20px;">Select Department</h1><br>

         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
         <div>
         <select name="departments[]" id="departments">
             <option>--select one--</option>
             <option>Computer Science</option>
             <option>Information Thechnology</option>
             <option>Electrical and Computer Engineering</option>
             <option>Chemical Engineering</option>
             <option>Electro Mechanical Engineering</option>
             <option>Mechanical Engineering</option>
             <option>Civil Engineering</option>
             <option>Hydraulics and Water Engineering</option>
             <option>Civics and Ethical Studies</option>
             <option>History and Heritage Managment</option>
             <option>Geography and Environmental Science</option>
             <option>English Language and Litrature</option>
             <option>Amharic Language and Litrature</option>
             <option>Psychology</option>
             <option>Sociology</option>
             <option>Special Needs</option>
             <option>Theatre Arts</option>
             <option>Law</option>
             <option>ECCE</option>
             <option>Biology </option>
             <option>Chemistry</option>
             <option>Mathematics</option>
             <option>Physics</option>
             <option>Statistics</option>
             <option>Accounting and Finance</option>
             <option>Economics</option>
             <option>Management</option>
             <option>Turism and Hotel Managment</option>
             <option>Psychatry</option>
             <option>Ansthesia</option>
             <option>Internal</option>
             <option>Surgery</option>
             <option>Pediatrics</option>
             <option>Gynaecology</option>
             <option>Obsthetrics</option>
             <option>Neonatal and Pediatrics nursing</option>
             <option>Medical labratory Science</option>
             <option>Midwifery</option>
             <option>Nursing</option>
             <option>Pharmacy</option>
             <option>Health Informatics</option>
             <option>Agro Economics</option>
             <option>Animal Science</option>
             <option>Forestry</option>
             <option>Horticulture</option>
             <option>NARM</option>
             <option>Plant Science</option>
             <option>Veternary Science</option>
            </select>
        </div>
        <div>
            <button type="submit">Retrive</button>
        </div>
    </form>
                </body>
                </html>
                
                <?php
                $selected_departments = filter_input(
                    INPUT_POST,
                    'departments',
                    FILTER_SANITIZE_STRING,
                    FILTER_REQUIRE_ARRAY
                );
                ?>
                <?php if ($selected_departments) : ?>
                    <ul>
                        <?php foreach ($selected_departments as $department) : ?>
                            <?php
                            $select="SELECT *FROM student where Department='$department'";
                            $select_d=mysqli_query($con,$select);
                            $data=mysqli_num_rows($select_d);
                            if(isset($_POST['']))
                            ?>
            <div class="div">
                <table border="1px" cellspacing="0" cellpadding="10px">
                 <tr>
                     <th> Graduate ID </td>
                     <th> First Name </th>
                     <th> Middle Name </th>
                     <th> Last Name </td>
                     <th> Gender </th>
                     <th> Email </th>
                     <th> Year of Graduation </th>
                     <th> Cumulative_Gpa </td>
                     <th> Qualification </th>
                     <th> Department </th>
                     <th> Photo </th>
                     <th>Action</th>
                    </tr>
                    
                    <?php
                    if($data){
                        while($row=mysqli_fetch_array($select_d)){
                            ?>
                            <tr>
                                <td> <?php echo $row['Graduate_ID']?></td>
                                <td> <?php echo $row['First_Name']?></td>
                                <td> <?php echo $row['Middle_Name']?> </td>
                                <td> <?php echo $row['Last_Name']?></td>
                                <td> <?php echo $row['Gender']?></td>
                                <td> <?php echo $row['Email']?></td>
                                <td> <?php echo $row['Year_of_Graduation']?> </td>
                                <td> <?php echo $row['Cumulative_Gpa']?></td>
                                <td> <?php echo $row['Qualification']?></td>
                                <td> <?php echo $row['Department']?> </td>
                                <td><img src="studentImages/<?php echo $row['Photo'] ?>"width="50px"></td>
                                <td><a href="edit.php? id=<?php echo $row['Graduate_ID']?> ">Edit</a></td>
                            </tr>
                            <?php
                            }
                        }
                        else{
                            echo "<script> alert('there is no student registered in $department') </script>";
                        }
                        ?>
                        </table>
                    </div>
                            <?php endforeach ?>
                        </ul>
                        <p>

                        </p>
                        <?php else : ?>
                            <p>You did not select any department.</p>
                            <?php endif ?>
                        </body>
                        </html>