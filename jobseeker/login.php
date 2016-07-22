<?php
include_once  'cv_gen.php';


if(!$_SESSION['username']){
session_destroy();
	$location = "signin.php?cat=seek";
header("Location:" . $location);
}
