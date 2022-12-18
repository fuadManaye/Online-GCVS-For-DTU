<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="css/signup1.css">
     <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body class="back">
    <div class="home">
    &emsp;<a href="../index.php"><img src="images/home.png"></a>
	</div>
    <form action="signup-check.php" method="POST" enctype="multipart/form-data"> 
    <h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
        <table>
            <tr>
                <td>
                    Company_Name:
                </td>
                <td>
                    <input type="text" placeholder="company name" name="company_name" pattern="[a-zA-Z]*" maxlength="12" minlength="4" required>
                </td>
            </tr>
            <tr>
                <td>
                    Company_Phone:
                </td>
                <td>
                    <input type="text" name="company_phone" placeholder="8888888888" name="company_phone" pattern="[09]{2}[0-9]{8}" title="phone number must be start with 09 and has length of ten" required/>
                </td>
            </tr>
            <tr>
                <td>
                    Company Email:
                </td>
                <td>
                    <input type="email" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />                          
                </td>
            </tr>
            <tr>
                <td>
                    Password:
                </td>
                <td>
                    <input type="password" placeholder="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>                                 
                </td>
            </tr>
            <tr>
                <td>
                    Confirm Password:
                </td>
                <td>
                    <input type="password" placeholder="confirm password" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>                                 
                </td>
            </tr>
            <tr>
                <td>
                    Company_Region:
                </td>
                <td>
                    <select name="company_region" required>
                        <option>--select one--</option>
                        <option>Afar</option>
                        <option>Amhara</option>
                        <option>Benishangul-Gumuz</option>
                        <option>Gambela</option>
                        <option>Harari</option>
                        <option>Oromia</option>
                        <option>Somali</option>
                        <option>Tigray</option>
                        <option>SNNPR</option>
                        <option>Sidama</option>
                        <option>SWEPR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Company_City:
                    </td>
                    <td>
                        <select name="company_city" required>
                            <option>--select one--</option>
                            <option>Addis Ababa</option>
                            <option>Dire Dawa</option>
                            <option>Nazret</option>
                            <option>Gondar</option>
                            <option>Mekele</option>
                            <option>Desse</option>
                            <option>Bahir Dar</option>
                            <option>Jimma</option>
                            <option>Bishoftu</option>
                            <option>Awasa</option>
                            <option>Jijiga</option>
                            <option>Nekemte</option>
                            <option>Debre Markos</option>
                            <option>Asella</option>
                            <option>Arba Minch</option>
                            <option>Debre Berhan</option>
                            <option>Kombolcha</option>
                            <option>Waliso</option>
                            <option>Weldiya</option>
                            <option>Debre Tabor</option>
                            <option>Ambo</option>
                            <option>Axum</option>
                            <option>Lalibela</option>
                            <option>Maji</option>
                        </select>
                    </td>
                </tr>
            <tr>
                <td>
                    Reg_Date:
                </td>
                <td>
                    <input type="date" placeholder="date" name="reg_date" required>                                 
                </td>
            </tr>
            <tr>
                <td>
                    Reason_Of_Verification:
                </td>
                <td>
                <textarea name="message" placeholder="Message" rows="3" cols="20"  maxlength="200" minlength="5" required></textarea>
                </td>
            </tr>
                <tr>
                    <td>
                        <button type="submit" name="insert_btn">Submit</button>
                    </td>
                </tr>
            </table>
            <a href="index.php" class="ca">Already have an account?</a>
        </form>
</body>
</html>