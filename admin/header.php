<?php
include_once "../config/header.php";
include_once "../config/db.class.php";
// include_once 'login.php';

if (!isset($_SESSION['username'])) {

    redirect('signin.php?cat=admin');
}
?>
<div class="col-md-12">
<br>
 <a href="logout.php"  type="button" class="btn btn-default btn-lg btn-danger" style="position:relative;left:90%">logout</a>
       
    <br>
    <div class="container">

        <p>
            <a href="jobseeker_cv.php?id=nactive" type="button" class="btn btn-primary ">New Cvs</a>
            <a href="jobseeker_cv.php?id=active" type="button" class="btn btn-default ">Approved Cvs</a>
            <a href="org_info.php?app=nactive" type="button" class="btn btn-default ">Hide CVs</a>
            <a href="org_info.php?app=nactive" type="button" class="btn btn-default ">Empolyer 1</a>
            <a href="org_info.php?app=active" type="button" class="btn btn-default ">Empolyer 2</a>
            <a href="organization.php" type="button" class="btn btn-default ">Cv search</a>
            <a href="vacancies.php" type="button" class="btn btn-default ">Vacancies</a>
            <a href="comments_info.php" type="button" class="btn btn-default ">Comments</a>
            <a href="comments_info.php" type="button" class="btn btn-default ">Website Visiting</a>


        </p>

