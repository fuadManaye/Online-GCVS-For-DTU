<?php
include 'config.php';
$select="SELECT *FROM company";
$select_q=mysqli_query($con,$select);
$data=mysqli_num_rows($select_q);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Companies</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/view_company.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_view_registered_companies.php"; 
         ?>
    <!---- View Registered Companies  Code --->
    <h1 style="width: 80%;color: rgb(30, 46, 48); display: flex; font-family:Lobster; margin-top:40px; margin-left:20px;">Registered Companies</h1><br>
                <div class="div">
                <table border="1px" cellspacing="0" cellpadding="10px">
                 <tr>
                     <th>Company ID</td>
                     <th>Company Name </th>
                     <th>Company_Phone</th>
                     <th>Company Email</td>
                     <th>Company_Region</th>
                     <th>Company_City</th>
                     <th>Reg_Date</td>
                     <th>Reason_Of_Verification</th>
                     <!-- <th>Action</th> -->
                    </tr>
                    
                    <?php
                    if ($stmt = $con->prepare($select)) {
                        $stmt->execute();
                        $stmt->store_result();
                    if($data){
                        while($row=mysqli_fetch_array($select_q)){
                            ?>
                            <tr>
                                <td> <?php echo $row['company_id']?></td>
                                <td> <?php echo $row['company_name']?></td>
                                <td> <?php echo $row['company_phone']?> </td>
                                <td> <?php echo $row['company_email']?></td>
                                <td> <?php echo $row['company_region']?></td>
                                <td> <?php echo $row['company_city']?> </td>
                                <td> <?php echo $row['reg_date']?></td>
                                <td> <?php echo $row['reason_of_verification']?> </td>
                                <!-- <td><a href="verify.php? id=<?php echo $row['company_email']?> ">Verify</a></td> -->
                            </tr>
                            <?php
                            }
                        }
                    }
                        else{
                            echo "<script> alert('there is no registered companies') </script>";
                        }
                        ?>
                        </table>
                    </div>
</body>
</html>