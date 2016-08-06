<?php
include_once "../config/header.php";
include_once "../config/db.class.php";


$host = "mysql.hostinger.in";
$database = "u426162963_lob";
$password = "ICkP5hRudr";
$username = "u426162963_admin";
$port = "3036";

if (isset($_POST['email'])) {


    $email = mysql_real_escape_string(stripslashes($_POST['email']));
    $mysqli = new mysqli($host, $username, $password, $database, $port);
    $data = ("SELECT * FROM org_info where username='$email'");
    $rest = jobseeker($email, $mysqli);
    echo $rest;
    if ($rest) {
        $result = mysql_query($data);


        $Results = mysqli_fetch_array($result);
        echo count($Results);
    }
} else {

}

function jobseeker($email, $mysqli) {

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, user_name
        FROM org_info
       WHERE username = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();


        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password);
        $stmt->fetch();



        if ($stmt->num_rows == 1) {


            $encrypt = md5($email + rand(100, 200));
            echo $encrypt;
            $message = "Your password reset link send to your e-mail address.";
            $quary = "UPDATE org_info SET encrypt = '".$encrypt."' WHERE username = '".$email."'" ;
                $to = $email;
                mysql_query($quary);
            $subject = "Forget Password";
            $from = 'accounts@lobjobs.lk';
            $body = 'Hi, <br/> <br/>Your Membership ID is ' . $Results['id'] . ' <br><br>Click here to reset your password http://www.lobjobs.lk/jobseeker/reset.php?encrypt=' . $encrypt . '&action=reset   <br/> <br/>--<br>lobjobs.lk<br>Solve your problems.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
            mail($to, $subject, $body, $headers);
            redirect('success.php');


            

            //redirect('reset.php?cat=seek');
        } else {
            echo ' No user exists.';
            return false;
        }
    }
}
?>
<div class="container">
    <p class="signin_p ">Reset your Password</p>
    <form class="form-signin" role="form" action="" method="post">

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
            }
        }
        ?>


        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <button class="" type="submit" name="submit">Send Email</button>
    </form>

</div> <!-- /container -->
