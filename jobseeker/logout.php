<?php

session_start();
session_destroy();
$location = "signin.php?cat=seek";
header("Location:" . $location);
?>