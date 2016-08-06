<?php

include_once "../config/header.php";
include_once "../config/db.class.php";
?>

    <body>

        <?php



 $host = "mysql.hostinger.in";
    $database = "u426162963_lob";
    $password = "6pgHDcoHxo";
    $password = "adminwagSBFP";
    $port = "3036";
      
         
        if (isset($_POST['submit'])) {

			
		
				
                                        $cat=$_POST["cat_info"];
					$myusername = stripslashes($_POST['email']);
					$mypassword = stripslashes($_POST['password']);
                                        $pass = hash('sha512', $mypassword);
                                        $id = $_GET['id'];
                                        $encrypt = Md5(90*13 + $id);
					
				   
					$mysqli = new mysqli($host, $username, $password, $database ,$port) 
					or die('no connection to server');
					
                                         $check = mysql_query("select user_name from user_info where user_name = '$myusername'") or die (mysql_error());
                                         $checked = mysql_fetch_array($check);
                                         
                                         if ($checked>=1){
                                         ?>
					         <style>
					          #div1
					        {
					            margin-top: 10px;
					            padding-left: 10px;
					            position: absolute;
					            left:35%;
					            top:20%;
					            float: left;
					            border-top: 25px solid #8CAAE8;
					            background-color: White;
					            border-left: 5px solid #8CAAE8;
					            border-right: 5px solid #8CAAE8;
					            border-bottom: 5px solid #8CAAE8;
					            font-family: Calibri;
					            margin-left: 20px;
					   	    width: 450px;
					           height : 150px;
					        }
					        
					    </style>
                                         <div class="container" id="div1" style="">
					The user name is alredy exist!pleas login or recover your password<br>
					<a type="button" value="Ok"  href="signin.php?cat=seek" style="float: right; margin-right: 20px;
            					font-weight: bold; width: 50px">Ok</a>
					</div>
					
<?php					
					echo '<script>alert(document.div1.value);</script>';
					
                                         }
					$data = mysql_query("UPDATE user_info SET user_name = '$myusername',password='$pass'  where id = '$id' ") 
					or die ; 
                                                $info = mysql_fetch_array( $data );
                                                if ($data){
                   			        $id = $_GET['id'];

                    				
                    				$location = "add_info2.php?id=" . $id ; 
				    
                     				header("Location:".$location );
                    			 	if(isset($_GET['id'])){
                                            $data = mysql_query("SELECT id FROM user_info WHERE user_name='$myusername'") 
						or die(mysql_error()); 
                                           $vacant = $_GET['id'];
                                           $info = mysql_fetch_array( $data );
                                            $id = $info['id'];
                                           
                                          $add_vacant =  "INSERT INTO seeker_vacant(vacant_id,seeker_id) "
                                            . "VALUES('$vacant','$id')";
                                        mysql_query($add_vacant);
                                        }
				
					
                                        echo 'reg fail';
                                                }
                                                else{
                                                    
                                                    redirect("new_user.php?id='$id'");
                                                 
                                                }
				
					
        }
			
        
        
        

        
        ?>

        <div class="container">
            <p class="signin_p ">Sign up with Lobjobs</p>
            <form class="form-signin validatedForm" role="form" action="" method="post">

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
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <input type="password" class="form-control" placeholder="Conform Password" name="password2" required>
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
                Password : {
                    minlength : 5
                },
                Password2_: {
                    minlength : 5,
                    equalTo : "#Password2"
                }
            }
    
    
    </script>
</html>