<?php

include '../config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Result</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css\computer.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_computer.php";
        ?>
            <form enctype="multipart/form-data" method="POST">
        <input name="userfile" size="14"type="file">
        <input type="submit" value="Import Student Result" id="upload">
        <br/><br/><br/><br/><br/><br/>
        <pre>
            <h2>Before you import student result you should read bellow</h2>
            <h3>- You can Submit more than 1000 students at a time.</h3>
            <h3>- The file extention must be .CSV <br><i>Example:Law_Department.csv</i></h3>
        </pre>
    </form>
</body>
</html>

<?php

if ( isset( $_FILES['userfile'] ) )
{
	$csv_file = $_FILES['userfile']['tmp_name'];
	if ( ! is_file( $csv_file ) ){
		// echo'<p class="wrong">file not found/empty?</p>';
		// echo'<meta content="5;index.php" http-equiv="refresh" />';
        echo '<script type="text/javascript">alert("file not found/empty!");window.location=\'computer.php\';</script>';
	}
	else
	{
		$sql = '';
		if (($handle = fopen( $csv_file, "r")) !== FALSE)
		{
			$allowed =  array('csv'); //you can mentions all the allowed file format you need to accept, like .jpg, gif.
			$filename = $_FILES['userfile']['name']; // csv_file is the file name on the form
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			
			if(!in_array($ext,$allowed) ) {
				// echo'<p class="wrong">file Extention must be CSV! ?</p>';
				// echo'<meta content="5;index.php" http-equiv="refresh" />';
                echo '<script type="text/javascript">alert("file Extention must be CSV!");window.location=\'computer.php\';</script>';
                
			}
			else{ $co=0;
				$result=false;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE &&isset($data['33']))
                {  
					$co++;
					$sql="SELECT * FROM computer_student_lists where Graduate_ID='{$data[1]}' ;";
					$result = $con->query($sql);
					$row=mysqli_fetch_array($result);
					
					$sql="INSERT INTO computer_student_lists(First_Name,Middle_Name,Last_Name,Graduate_ID,Gender,Faculty,Department,cour1,cour2,cour3,cour4,cour5,cour6,cour7,cour8,cour9,cour10,cour11,cour12,cour13,cour14,cour15,cour16,cour17,cour18,cour19,cour20,cour21,cour22,cour23,cour24,cour25,cour26,cour27)";
					$sql .=" values ('{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}','{$data[6]}','{$data[7]}','{$data[8]}','{$data[9]}','{$data[10]}','{$data[11]}','{$data[12]}','{$data[13]}','{$data[14]}','{$data[15]}','{$data[16]}','{$data[17]}','{$data[18]}','{$data[19]}','{$data[20]}','{$data[21]}','{$data[22]}','{$data[23]}','{$data[24]}','{$data[25]}','{$data[26]}','{$data[27]}','{$data[28]}','{$data[29]}','{$data[30]}','{$data[31]}','{$data[32]}','{$data[33]}'); ";
					$result = $con->query($sql);
				}
				if(!$result)
				{
                    echo '<script type="text/javascript">alert("Repeted data intry Or Incompatible column Size!");window.location=\'computer.php\';</script>';
                }
                else
                {
                    echo '<script type="text/javascript">alert("List of 30 Students Are  Submited Successfuly!!");window.location=\'computer.php\';</script>';
                }
                fclose($handle);
            }
        }
        else{
            echo '<script type="text/javascript">alert("file Extention must be CSV!!");window.location=\'computer.php\';</script>';
        }
    }
}
?>
