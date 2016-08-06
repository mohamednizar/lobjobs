<?php
include_once "../config/header.php";
include_once "../config/db.class.php";

 // Connect to MySQL
     $password = "ICkP5hRudr";
     $username = "u426162963_admin";
     $host = "mysql.hostinger.in";
     $dbname = "lobjobs";
 try {
 $conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username,
$password);
 //$conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');
 }
 catch(PDOException $ex)
     {
         $msg = "Failed to connect to the database";
     }
     
 // Was the form submitted?
 if (isset($_POST["ResetPasswordForm"]))
 {
     // Gather the post data
     $email = $_POST["email"];
     $password = $_POST["password"];
     $confirmpassword = $_POST["password2"];
     $hash = $_POST["q"];

     // Use the same salt from the forgot_password.php file
     $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

     // Generate the reset key
     $resetkey = hash('sha512', $salt.$email);
     // Does the new reset key match the old one?
    
     if ($resetkey == $hash)
     {
         if ($password == $confirmpassword)
         {
             //has and secure the password
             $password = hash('sha512',$password);
             // Update the user's passwrd
                 $query = $conn->prepare('UPDATE user_info SET password = :password WHERE
user_name = :email');
                 $query->bindParam(':password', $password);
                 $query->bindParam(':email', $email);
                 $query->execute();
                 $conn = null;
             echo "Your password has been successfully reset.";
             header("Location:signin.php?cat=seek");
             
         }
         else
             echo "Your password's do not match.";
     }
     else
         echo "Your password reset key is invalid.";
 }

 ?>

<div class="container">
    <p class="signin_p ">Reset Password</p>
    <form class="form-signin validatedForm" role="form" action="" method="post">

<?php
if (isset($_GET['cat'])) {

    if ($_GET['cat'] == "org") {
        ?>
                <div class="pro_box_login"><span class="icon org"></span><span class="title">ORGANIZATIONS </span></div> 
                <?php
            }
            if ($_GET['cat'] == "seek") {
                ?>
                <div class="pro_box_login"><span class="icon seek"></span><span class="title">JOB SEEKERS </span></div> 
                <?php
            }if ($_GET['cat'] == "seek") {
                ?>
                <div class="pro_box_login"><span class="icon seek"></span><span class="title">JOB SEEKERS </span></div> 
                <label>your password changed and you can login with your new password</label>
                    <?php
            }
        }
        ?>

	<input type="email" class="form-control" name="email" placeholder="Email" name="email" size="20" />
        <input type="password" class="form-control" placeholder="Password" name="password" required pattern=".{9,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 9 characters' : ''); if(this.checkValidity()) form.Password2.pattern = this.value;">
                <input type="password" class="form-control" placeholder="Confirm Password" name="Password2" pattern=".{9,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>
        <input type="hidden" name="q" value="<?php if (isset($_GET["q"])) {

	    echo $_GET["q"];

	} ?>"/>

        <button class="btn-success form-control" id ="reset" type="submit" name="ResetPasswordForm">Reset Password</button>
    </form>
    <script>
    jQuery('.validatedForm').validate({
            rules : {
                Password : {
                    minlength : 9
                },
                Password2: {
                    minlength : 9,
                    equalTo : "Password"
                }
            }
    
    
    </script>


</div> <!-- /container -->
