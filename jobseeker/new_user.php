<!DOCTYPE html>
<html>
<?php

include_once "../config/header.php";
include_once "../config/db.class.php";
?>

    <body>

        <?php


         
        if (isset($_POST['submit'])) {
                                        $cat=$_POST["cat_info"];
                                        
					$myusername = mysql_real_escape_string($_POST['email']);
					$mypassword = mysql_real_escape_string($_POST['password']);
					$myusername = stripslashes($myusername);
        				$mypassword = stripslashes($mypassword);
                                        $pass = hash('sha512', $mypassword);
                                        $id = $_GET['id'];
                                      
					
                                         $check = mysql_query("select user_name from user_info where user_name = '$myusername'") or die (mysql_error());
                                         $checked = mysql_fetch_array($check);
                                         
                                         if ($checked>=1){
                                         
                                        	echo '<script type="text/javascript">'; 
						echo "alert('User Name exist,Plaes Login with your email');"; 
						echo '</script>';
                                        			
					
                                         }else{
                                        
                                         $id = $_GET['id'];
					$data = mysql_query("UPDATE user_info SET user_name = '$myusername', password = '$pass'  where id = '$id' ") 
					or die(mysql_error());
					
				    	$url = "add_info2.php?id=".$id;
                                        echo '<script>window.location = "'.$url.'";</script>';       
					
                     			}
                                                 
                                        
                                                
                            }
				
	
			
        
        
        

        
        ?>

        <div class="container">
            <p class="signin_p ">Sign up with Lobjobs</p>
            <form class="form-signin validatedForm" role="form" action='' method="post">

                <?php
                if (isset($_GET['cat'])){
                    
                    if ($_GET['cat']=="org"){
                        ?>
                       <div class="pro_box_login"><span class="icon org"></span><span class="title">ORGANIZATIONS </span></div> 
                       <?php
                    
                    }
                      if ($_GET['cat']=="seek"){
                          ?>
                         <div class="pro_box_login"><span class="icon seek"></span><span class="title">JOB SEEKERS </span></div> 
                         <?php
                    
                    }
                    
                    
                }
                
                ?>
                

                <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name="password" required pattern=".{9,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 9 characters' : ''); if(this.checkValidity()) form.Password2.pattern = this.value;">
                <input type="password" class="form-control" placeholder="Confirm Password" name="Password2" pattern=".{9,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="nextv" name="submit">Sign up</button>
            </form>

        </div> <!-- /container -->



    </body>
    <script src="../js/jobseeker.js">
    
    
    <script >
    jQuery('.validatedForm').validate({
            rules : {
                password : {
                    minlength : 9
                },
                Password2: {
                    minlength : 9,
                    equalTo : "Password2"
                }
            }
    
    
    </script>
</html>