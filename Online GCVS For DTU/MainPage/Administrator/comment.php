<?php
include 'config.php';
$select="SELECT *FROM comments";
$select_q=mysqli_query($con,$select);
$data=mysqli_num_rows($select_q);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Comments</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/comment.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="menu-bar">
        <ul>
            <li class="welcome">Comments</li>
            <li><a href="index.php">Home</a>
        </ul>
    </div>
    <h1 style="width: 80%;color: rgb(30, 46, 48); display: flex; font-family:Lobster; margin-top:40px; margin-left:20px;">Commments Here</h1><br>
                <div class="div">
                <table border="1px" cellspacing="0" cellpadding="10px">
                 <tr>
                     <th>ID</td>
                     <th>Name</td>
                     <th>Email</th>
                     <th>Message</th>
                     <th>Action</th>
                    </tr>
                    
                    <?php
                    if ($stmt = $con->prepare($select)) {
                        $stmt->execute();
                        $stmt->store_result();
                    if($data){
                        while($row=mysqli_fetch_array($select_q)){
                            ?>
                            <tr>
                                <td> <?php echo $row['id']?></td>
                                <td> <?php echo $row['name']?></td>
                                <td> <?php echo $row['email']?> </td>
                                <td> <?php echo $row['message']?></td>
                                <td><a href="deletecomment.php? id=<?php echo $row['email']?> ">Delete Comment</a></td>
                            </tr>
                            <?php
                            }
                        }
                    }
                        else{
                            echo "<script> alert('') </script>";
                        }
                        ?>
                        </table>

</body>
</html>