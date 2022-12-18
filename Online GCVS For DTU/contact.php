<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body>
    <section class="sub-header">
        <nav>
            <a href="index.html"><img src="images/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="department.html">DEPARTMENTS</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="./MainPage/index.php">LOGIN</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Contact Us</h1>
    </section>

    <!-------- contact us ------->
    <section class="location">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.7360667701446!2d38.040621114344574!3d11.853739241626151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x16447de6a5f8ada3%3A0xf5dfe212ff827aa4!2z4Yuo4Yuw4Yml4YioIOGJs-GJpuGIrSDhi6nhipLhiajhiK3hiLLhibI!5e0!3m2!1sam!2set!4v1650884237236!5m2!1sam!2set"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>

    <section class="contact-us">
        <div class="contact-row">
            <div class="contact-col">
                <div>
                    <img src="images/developers.jpg">
                    <p>Group -6 Members <br>
                    </p>
                </div>
                <div>
                    <img src="images/phone.png">
                    <p>+251 97 544 3303</p>
                </div>
                <div>
                    <img src="images/email.jpg">
                    <p>fuye460@gmail.com</p>
                </div>
            </div>
            <div class="contact-col">
                <form action="" method="post">
                    <input type="text" name="name" placeholder="Enter your name"
                    pattern="[a-zA-Z_]*" maxlength="16" minlength="4" required>
                    <input type="email" name="email" placeholder="Enter email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                    <textarea rows="8" name="message" placeholder="Message"
                     maxlength="120" minlength="5" required></textarea>
                    <button type="submit" name="sendmail" class="hero-btn red-btn">Send Comment</button>
                </form>
            </div>
        </div>
    </section>

    <!--------------- footer section ------------------->

    <section class="footer">
        <h4>Contact Us</h4>
        <p>If you have any general information as well as any ideas or comments, please contact us at the links below
        </p>
        <div class="icons">
            <a href=""><img src="images/facebook.png" alt=""></a>
            <a href=""><img src="images/telegram.png" alt=""></a>
            <a href=""><img src="images/instagram.png" alt=""></a>
            <a href=""><img src="images/twitter.png" alt=""></a>
        </div>
        <p>Made By<i class="fa fa-heart-o"></i> CS Group 6 Students</p>
    </section>

    <!--------------- End of footer section ------------------->

    <!------JavaScript for Toggle Menu-------->
    <script>

        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }

    </script>
</body>
</html>


<?php
if(isset($_POST['sendmail'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $insert="INSERT INTO comments (name,email,message)VALUES ('$name','$email','$message')";
    $insert_q=mysqli_query($con,$insert);
    if($insert_q){
        echo '<script type="text/javascript">alert("your comment is successfully sent thankyou for your comment !");window.location=\'contact.php\';</script>';
    }
    else{
        echo '<script type="text/javascript">alert("please try again!");window.location=\'contact.php\';</script>';
    }
}
?>
