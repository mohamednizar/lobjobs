<?php  
include_once "../config/header.php";
include_once "../config/db.class.php";
unset($_SESSION['url']);
if (!isset($_SESSION['username']) ) {
	
 unset($_SESSION['url']);
   redirect('signin.php?cat=org');
      
}

include_once 'profile.php';