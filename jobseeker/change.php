<?php
 // Connect to MySQL
     $username = "ruchira";
     $password = "Nizar0756%";
     $host = "localhost";
     $dbname = "lobjobs";
     
 try {
 $conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username,
$password);
 }
 catch(PDOException $ex)
     {
         $msg = "Failed to connect to the database";
     }

 // Was the form submitted?
 if (isset($_POST["ForgotPassword"])) {
     
     // Harvest submitted e-mail address
     if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
         $email = $_POST["email"];
         
     }else{
         echo "email is not valid";
         exit;
     }

    // Check to see if a user exists with this e-mail
     $query = $conn->prepare('SELECT user_name FROM user_info WHERE user_name = :email');
     $query->bindParam(':email', $email);
    $query->execute();
     $userExists = $query->fetch(PDO::FETCH_ASSOC);
    
     $conn = null;
     
    if ($userExists["user_name"])
     {


         // Create a unique salt. This will never leave PHP unencrypted.
         $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

         // Create the unique user password reset key
         $password = hash('sha512', $salt.$userExists["user_name"]);

         // Create a url which we will direct them to reset their password
         $pwrurl = "www.lobjobs.lk/jobseeker/reset.php?q=".$password;
         
         // Mail them their key
        $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please
ignore it. It appears that you have requested a password reset at our website
46 www.lobjobs.lk\n\nTo reset your password, please click the link below. If you
cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl
. "\n\nThanks,\nThe Administration";
        mail($userExists["user_name"], "www.lobjobs.lk - Password Reset",
$mailbody);
	include('success.php'); 
         
     }
     else
        echo "No user with that e-mail address exists.";
 }
?>
