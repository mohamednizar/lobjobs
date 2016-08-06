<?php
include_once "../config/header.php";
include_once "../config/db.class.php";
?>

<body>

    <?php
    $host = "mysql.hostinger.in";
    $database = "u426162963_lob";
    $password = "ICkP5hRudr";
    $username = "u426162963_admin";
    $port = "3036";
    if (isset($_POST['submit2'])) {
        $myusername = stripslashes($_POST['email']);
        $mypassword = stripslashes($_POST['password']);
        $pass = hash('sha512', $mypassword);
        $id = $_GET['id'];
        $encrypt = Md5(90 * 13 + $id);
        $mysqli = new mysqli($host, $username, $password, $database, $port)
                or die('no connection to server');
         $check = mysql_query("select user_name from user_info where user_name = '$myusername'") or die (mysql_error());
                                              
                                         if (mysql_affected_rows()>=1){
	                                         
	  					echo '<script type="text/javascript">'; 
						echo "alert('User Name exist,Plaes Login with your email');"; 
						echo '</script>';
                                         }else{
        
        $catq = mysql_query("SELECT cat from vacancies where id =$vacant"); 
        while ($info = mysql_fetch_array($catq)){
            
        }
        $cat_dat = "Add your other positions also here";
        $data = mysql_query("insert into user_info (cat,user_name,password) VALUES('$cat_dat','$myusername','$pass')");
        $vacant = $_GET['id'];
        $id = mysql_insert_id();
        $updatetime = mysql_query("UPDATE user_info SET updateTime=now() where user_name='$myusername'");
        $add_vacant = "INSERT INTO seeker_vacant(vacant_id,seeker_id) "
                . "VALUES('$vacant','$id')";
        mysql_query($add_vacant);
        
         $quary = "SELECT org_info.*,vacancies.* FROM org_info INNER JOIN vacancies ON vacancies.Orgid = org_info.id WHERE vacancies.id = $vacant" ;
                $d = mysql_query($quary);	
                $result = mysql_fetch_array($d);
                $email = $result['username'];
                $org_id = $result['Orgid'];
                $to = $email;
                
            $subject = "New CV";
            $from = 'admin@lobjobs.lk';
            $body = 'Hi, <br/> <br/>You Have updated a new CV on your Vacancy ' . $vacant . ' <br>View your vacancy:http://lobjobs.lk/employers/eachJob.php?org='.$org_id.'&id='.$vacant.'<br>';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
            if($info['active']=='1'){
            mail($email, $subject, $body, $headers);
            } 
            
            $href = "add_info2.php?id=" . $id . "";
            header("Location:" . $href);
       
        
    }
    }
   

    if (isset($_POST['submit'])) {


        if (isset($_GET['cat'])) { {

                $myusername = stripslashes($_POST['email']);
                $mypassword = stripslashes($_POST['password']);
                $myusername = mysql_real_escape_string($myusername);
                $mypassword = mysql_real_escape_string($mypassword);
                $mysqli_job = new mysqli($host, $username, $password, $database, $port)
                        or die('no connection to server');
                $jobseeker = jobseeker($myusername, $mypassword, $mysqli_job);
                if ($jobseeker) {
                    $data = mysql_query("SELECT id,active FROM user_info WHERE user_name='$myusername'")
                            or die(mysql_error());
                    $info = mysql_fetch_array($data);
                    $id = $info['id'];
                    $active = $info['active'];
                    $href = "cv_gen.php?id=" . $id . "";
                    header("Location:" . $href);
                    $vacant = $_GET['id'];
                    $updatetime = mysql_query("UPDATE user_info SET updateTime=now() where user_name='$myusername'");
                    $add_vacant = "INSERT INTO seeker_vacant(vacant_id,seeker_id) "
                            . "VALUES('$vacant','$id')";
                    mysql_query($add_vacant);
                    
               $quary = "SELECT org_info.*,vacancies.* FROM org_info INNER JOIN vacancies ON vacancies.Orgid = org_info.id WHERE vacancies.id = $vacant" ;
                $d = mysql_query($quary);	
                $result = mysql_fetch_array($d);
                $email = $result['username'];
                $org_id = $result['Orgid'];
                $to = $email;
                
            $subject = "New CV";
            $from = 'admin@lobjobs.lk';
            $body = 'Hi, <br/> <br/>You Have updated a new CV on your Vacancy ' . $vacant . ' <br>View your vacancy:http://lobjobs.lk/employers/eachJob.php?org='.$org_id.'&id='.$vacant.'<br>';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            if( $active =='1'){
            		mail($to, $subject, $body, $headers);
            		}            
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

    <div class="container col-lg-6">
        <p class="signin_p col-lg-12 ">Sign up with Lobjobs</p>
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
            <input type="password" class="form-control" placeholder="Password" name="password" required pattern=".{9,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 9 characters' : ''); if(this.checkValidity()) form.Password2.pattern = this.value;">
                <input type="password" class="form-control" placeholder="Confirm Password" name="Password2" pattern=".{9,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required> <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit" id="nextv" name="submit2">Sign up</button>
        </form>

    </div> <!-- /container -->


    <div class="container col-lg-6" >
        <p class="signin_p col-lg-12">Sign in to Continue</p>
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
                }
            }
            ?>

            <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
            <input type="password" class="form-control" placeholder="Password" name="password" required pattern=".{9,}"title="9 characters minimum">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label><br/>
            <a href="forget.php?cat=seek">Forget Password</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        </form>

    </div> <!-- /container



</body>
<script src="../js/jobseeker.js">
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
</script>
</html>