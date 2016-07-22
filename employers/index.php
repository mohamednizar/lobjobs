<?php
 
include_once "../config/header.php";
include_once "../config/db.class.php";
include_once 'header.php';


if (!isset($_SESSION['username'])) {
 
   redirect('signin.php?cat=org');
      
}

?>
