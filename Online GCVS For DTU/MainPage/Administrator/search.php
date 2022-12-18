<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/search.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="menu-bar">
        <ul>
            <li class="welcome">Search Graduate Student</li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </div>
    <!---- Search Graduate Student  Code --->

    <center>
    <div class="container">
        <form action="" method="POST">
        <h1><i class='bx bx-user-plus'></i> <span>Search Graduate Student Here</span></h1>
            <input type="text" name="name" placeholder="Enter Student Name">
            <input id="submit" type="submit" name="search" value="Search">
        </form>
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
            </tr><br>
            <?php
            if(isset($_POST['search']))
            {
                $name=$_POST['name'];
                $query="SELECT *From student where First_Name='$name'";
                $query_run=mysqli_query($con,$query);
                $data=mysqli_num_rows($query_run);

                if($data){
                    while($row=mysqli_fetch_array($query_run)){
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
                            <td><img src="../Registral/studentImages/<?php echo $row['Photo'] ?>"width="50px"></td>
                            <td><a href="edit.php? id=<?php echo $row['Graduate_ID']?> ">Edit</a></td>
                        </tr>
                        <?php
                        }
                    }
                    else if(empty($name)){
                        echo "<script>alert('student name required!!  please enter student name you wnat to view') </script>";
                    }
                    else{
                        echo "<script>alert('There is no registered student in this name') </script>";
                    }
            }
            ?>
        </div>
    </center>

</body>
</html>