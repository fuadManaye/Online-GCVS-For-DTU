<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Insert Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/insert.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_insert_header.php"; 
         ?>
    <!---- Insert Graduate Student  Code --->

    <form action="insert_check.php" method="POST" enctype="multipart/form-data"> 
    <h1><i class='bx bx-user-plus'></i> <span>Register Here</span></h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <table class="form">
            <tr>
                <td>
                    Graduate ID:
                </td>
                <td>
                    <input type="text" placeholder="Graduate ID" name="id" pattern="[a-zA-Z]{()}[0-9]*" required>
                </td>
            </tr>
            <tr>
                <td>
                    First Name:
                </td>
                <td>
                    <input type="text" placeholder="First Name" name="firstname" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                <td>
                    Middle Name:
                </td>
                <td>
                    <input type="text" placeholder="Middle  Name" name="middlename" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                <td>
                    Last Name:
                </td>
                <td>
                    <input type="text" placeholder="Last Name" name="lastname" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                    <td>
                        Gender:
                    </td>
                    <td>
                        <input type="radio" name="gender" value="Male">Male
                        <input type="radio" name="gender" value="Female">Female
                    </td>
                </tr>
            <tr>
                <td>
                    Student Email:
                </td>
                <td>
                    <input type="email" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />                          
                </td>
            </tr>
            <tr>
                <td>
                    Year of Graduation:
                </td>
                <td>
                    <select name="yearofgraduation">
                        <option>--select one--</option>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                Cumulative_Gpa:
                </td>
                <td>
                    <input type="number" placeholder="Your GPA" name="cumulative_gpa" step="0.01">                                 
                </td>
            </tr>
            <tr>
                <td>
                    Qualification:
                    </td>
                    <td>
                        <select name="qualification">
                            <option>--select one--</option>
                            <option>Bachelors Degree</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Department:
                    </td>
                    <td>
                        <select name="department">
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
                    </td>
                </tr>
                <tr>
                    <td>
                        Upload Photo:
                    </td>
                    <td>
                        <input type="file" name="photo">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit" name="insert_btn" class="hero-btn">
                        <input type="reset" value="Reset" class="hero-btn">
                    </td>
                </tr>
            </table>
        </form>
        <div id="side-bar-right">
            <p>There are <?php
            $sql = "SELECT * FROM student";
            if ($stmt = $con->prepare($sql)) {
                $stmt->execute();
                $stmt->store_result();
                printf($stmt->num_rows);
            }
            ?> Students registered</p>
            </div>
        </body>
        </html>