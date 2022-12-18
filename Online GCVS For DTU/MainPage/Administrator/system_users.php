<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Users of the system</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/system_user.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <style>
        .hero-btn {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 10px;
            padding: 6px 17px;
            font-size: 13px;
            background:rgb(43, 110, 112);
            position: relative;
            cursor: pointer;
        }
        .hero-btn:hover {
            border: 1px solid #d3918c;
            background: #1043cf;
            transition: 1s;
        }
        </style>
    </head>
    <body>
        <?php
        include "headers/for_system_users.php"; 
        ?>
        <h4>Managing Director Of Registral<h4>
        <a href="createaccount.php" class='hero-btn' style="float:right; margin-right:-500px; margin-top:65px;">Create Account</a>
        <!---- Users of the system Code --->
        <div class="div">
        <?php
        $result = mysqli_query($con,"SELECT * FROM main_users where Role='Registral'");
        echo" <table border=''>
        <tr>
        <th>User Type</th>
        <th>User Name</th>
        <th>Activate <br>(Deactivate)</th>
        <th>Remove Account</th>
        </tr>";
        while($row = mysqli_fetch_array($result))
        {
            $emp_id=$row['id'];
            $ctrl = $row['Role'];
            $account=$row['userName'];
            $status=$row['status'];	
            print ("<tr>");
            print ("<td>" . $row['Role'] . "</td>");
            print ("<td>" . $row['userName'] . "</td>");
            ?>
            <td>
                <?php
                if(($status)=='0')
                {
                    ?>
                    <a href="status.php?status=<?php echo $row['id'];?>" onclick="return confirm('DO you want to activate (<?php echo $account?>)');" class='btn red'>
                    Deactivated </a>
                    <?php
                    }
                    if(($status)=='1')
                    {
                        ?>
                        <a href="status.php?status=<?php echo $row['id'];?>" onclick="return confirm('Do you want to De-activate (<?php echo $account?>)');" class='btn green'> 
                        Activated</a>
                        <?php
                        }
                        ?>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete (<?php echo $account?>)');" class='hero-btn'> 
                            Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    print( "</table>");
                    ?>
                    </div>
                </body>
            </html>