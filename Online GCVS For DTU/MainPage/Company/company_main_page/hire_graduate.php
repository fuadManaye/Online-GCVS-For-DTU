<?php
session_start();
include('config.php');
include("functions.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hire Graduates</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/hire.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        include "headers/for_hire_graduate.php";
        ?>
        <form action="view_student_certificate.php" method="POST" enctype="multipart/form-data"> 
    <h1><i class='bx bx-user-plus'></i> <span>See student result to hire</span></h1>
        <table class="form">
        <tr>
                <td>
                    Graduate ID:
                </td>
                <td>
                    <input type="text" placeholder="student ID" name="id" pattern="[a-zA-Z]{()}[0-9]*" required>
                </td>
            </tr>
                <tr>
                    <td>
                        <input type="submit" value="View Student Certificate" name="view" class="hero-btn">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>