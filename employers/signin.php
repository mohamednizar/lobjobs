<?php
include_once "../config/header.php";
include_once "../config/db.class.php";


?>

<body>

    <?php
    $host = "localhost";
    $database = "lobjobs";
    $username = "ruchira";
    $password = "Nizar0756%";
    $port = "3036";


    if (isset($_POST['submit'])) {


        if (isset($_GET['cat'])) {

            if ($_GET['cat'] == "org") {
                $myusername = stripslashes($_POST['email']);
                $mypassword = stripslashes($_POST['password']);
                $myusername = mysql_real_escape_string($myusername);
                $mypassword = mysql_real_escape_string($mypassword);

                $mysqli = new mysqli($host, $username, $password, $database, $port)
                        or die('no connection to server');
                $login_suc = login($myusername, $mypassword, $mysqli);
                if ($login_suc) {

                    $data = mysql_query("SELECT id FROM org_info WHERE username='$myusername' ")
                            or die(mysql_error());
                    $info = mysql_fetch_array($data);
                    

                    $id = $info['id'];
                    $today = date("Y-m-d");
                    
                    
                    $count = mysql_query("INSERT INTO logincount(org_id,date, logcount) VALUES ('$id','$today',1) ON DUPLICATE KEY UPDATE logcount=logcount+1")
                            or die(mysql_error());
                            
                     if(isset($_SESSION['url'])) {
			   $location = $_SESSION['url'];
		     }else{	         

                          $location = "loggedin.php?id=" . $id;
			}
                    header("Location:" . $location);
                }
            } else {

                $myusername = stripslashes($_POST['email']);
                $mypassword = stripslashes($_POST['password']);
                $myusername = mysql_real_escape_string($myusername);
                $mypassword = mysql_real_escape_string($mypassword);

                $mysqli_job = new mysqli($host, $username, $password, $database, $port)
                        or die('no connection to server');
                $jobseeker = jobseeker($myusername, $mypassword, $mysqli_job);
                if ($jobseeker) {
                    $data = mysql_query("SELECT id FROM user_info WHERE user_name='$myusername'")
                            or die(mysql_error());
                    $info = mysql_fetch_array($data);
                    $id = $info['id'];
                    $href = "cv_gen.php?id=" . $id . "&org=1&jobseek=1";
                    header("Location:" . $href);
                }
            }
        }
    }

    function jobseeker($email, $password, $mysqli) {

        // Using prepared statements means that SQL injection is not possible. 
        if ($stmt = $mysqli->prepare("SELECT id, user_name, password 
        FROM user_info
       WHERE user_name = ?
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
                     $_SESSION['id'] = $user_id;
                    $_SESSION['login_string'] = hash('sha512', $username_job);
                    //setcookie("user",$_SESSION['login_string'], time()+3600);
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

    <div class="container">
        <p class="signin_p ">Sign in to Continue</p>
        <form class="form-signin" role="form" action="" method="post">

    <?php
    if (isset($_GET['cat'])) {

        if ($_GET['cat'] == "org") {
            ?>
                    <div class="pro_box_login"><span class="icon org"></span><span class="title">EMPLOYERS </span></div> 
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
            <a href="forget.php?cat=org">Forget Password</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            <a class="btn btn-lg btn-primary btn-block" type="submit" href="http://lobjobs.lk/organization.php" name="submit">Back to Employer</a>
            
            
        </form>

    </div> <!-- /container -->



</body>
</html>