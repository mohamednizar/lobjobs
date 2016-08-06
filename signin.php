<?php
include_once "header2.php";
include_once "../config/db.class.php";


?>

   <a href="http://lobjobs.lk/job_seeker.php"  type="button" class="btn btn-default btn-lg btn-success" style="position:relative;">Back to Jobseeker</a>
<body>

    <?php
    $host = "mysql.hostinger.in";
    $database = "lobjobs";
    $username = "u426162963_admin";
    $password = "ICkP5hRudr";
    $port = "3036";

    
    if (isset($_POST['submit'])) {
        echo'submitetd';


        if (isset($_GET['cat'])) {
            echo 'catch category ';

            if ($_GET['cat'] == "admin") {
                $myusername = stripslashes($_POST['email']);
                $mypassword = stripslashes($_POST['password']);
                
                
                $myusername = mysql_real_escape_string($myusername);
                $mypassword = mysql_real_escape_string($mypassword);
                $e_password = hash('sha512', $mypassword);
                
                $mysqli = new mysqli($host, $username, $password, $database, $port)
                        or die('no connection to server');
                $login_suc = admin($myusername, $mypassword, $mysqli);
                    echo $login_suc;
                if ($login_suc) {

                    $data = mysql_query("SELECT id FROM admin WHERE username='$myusername' ")
                            or die(mysql_error());
                    $info = mysql_fetch_array($data);
                    $id = $_GET['username'];

                    $location = "index.php?id=".$id;
                    

                    header("Location:" . $location);
                    echo 'login success';
                    session_start();
                    
                    
                    
                }
                
            } 
        }
    }
    
    
   
    function admin($email, $password, $mysqli) {

        // Using prepared statements means that SQL injection is not possible. 
        if ($stmt = $mysqli->prepare("SELECT id, username, password 
        FROM admin
       WHERE username = ?
        LIMIT 1")) {
            $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();


            // get variables from result.
            $stmt->bind_result($user_id, $username, $db_password);
            $stmt->fetch();

            // hash the password with the unique salt.
            $password = hash('sha512', $password);
            

            if ($stmt->num_rows == 1) {
                // If the user exists we check if the account is locked
                // from too many login attempts 
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    //$user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    // $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username_job = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username_job;
                    $_SESSION['login_string'] = hash('sha512', $username_job);
                    //setcookie("user",$_SESSION['login_string'], time()+3600);
                    //
                    // Login successful.
                    
                    return true;
                } else {

                    // Password is not correct
                    // We record this attempt in the database
                    // $now = time();
                    //$mysqli->query("INSERT INTO login_attempts(user_id, time)
                    //VALUES ('$user_id', '$now')");
                    return false;
                }
            } else {
                // No user exists.
                return false;
            }
        }
       
    }
    

    ?>
<br><br>
    <div class="container">
        <p class="signin_p ">Sign in to Continue</p>
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
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        </form>

    </div> <!-- /container -->



</body>
</html>
