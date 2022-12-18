<?php
include 'config.php';
$select="SELECT *FROM company";
$select_q=mysqli_query($con,$select);
$data=mysqli_num_rows($select_q);
?>
<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Users of the system</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/view_companies.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_manage_company.php"; 
        ?>
        <!---- Users of the system Code --->
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
                     <th>Action</th>
                     <th>Delete</th>
                    </tr>
                    
                    <?php
                    if ($stmt = $con->prepare($select)) {
                        $stmt->execute();
                        $stmt->store_result();
                    if($data){
                        while($row=mysqli_fetch_array($select_q)){
                            $emp_id=$row['company_id'];
                            $name=$row['company_name'];
                            $status=$row['status'];	
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
                                
                    <td>
                        <?php
                        if(($status)=='0')
                        {
                            ?>
                            <a href="company_status.php?status=<?php echo $row['company_id'];?>" onclick="return confirm('DO you want to activate (<?php echo $name?>)');" class='btn red'>
                            Deactivated </a>
                            <?php
                            }
                            if(($status)=='1')
                            {
                                ?>
                                <a href="company_status.php?status=<?php echo $row['company_id'];?>" onclick="return confirm('Do you want to De-activate (<?php echo $name?>)');" class='btn green'> 
                                Activated</a>
                                <?php
                                }
                                ?>
                                </td>
                                <td>
                                    <a href="deletecompany.php?id=<?php echo $row['company_id'];?>" onclick="return confirm('Do you want to delete (<?php echo $name?>)');" class='hero-btn'> 
                            Delete</a>
                        </td>
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