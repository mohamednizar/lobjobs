<?php
include_once "../config/header.php";
include_once "../config/db.class.php";
include_once 'login.php';


$orgid = $_GET['id'];
if (!isset($_SESSION['username'])) {

    redirect('signin.php?cat=admin');
}



    $href_view = 'profile.php?id=' . $orgid;
    $href_vacncy = 'jobsubmit.php?id=' . $orgid;
    $href_banner = 'banner.php?banner&id=' . $orgid;
    $href_visiting = 'visiting.php?id=' . $orgid;
    ?>
    <div class="col-md-12">
        <br>
        <?php
        $data = mysql_query("SELECT * FROM org_info WHERE id='$id'")
        or die(mysql_error());
while ($info = mysql_fetch_array($data)) {
    $basic_info = ($info['basic_info']);

    $basic_info_array = explode('|', $basic_info);
    if (!isset($basic_info)) {//removing the offset error
        $basic_info = null;
    }
    
    
}
$cname= ($info['cname']);
 echo $cname;
?>
        
        <a href="index.php"  type="button" class="btn btn-default btn-lg btn-success" style="position:relative;">Back to Admin</a>
        
        <br>
        <br>
        <div class="container">

            <p>
                <a href="<?php echo $href_view; ?>" type="button" class="btn btn-default btn-lg col-md-3">Profile</a>
                <a href="<?php echo $href_vacncy; ?>" type="button" class="btn btn-default btn-lg col-md-3">Vacancy Submistion</a>
                <a href="<?php echo $href_banner ?>" type="button" class="btn btn-default btn-lg col-md-3">Intresting Candidates</a>
                <a href="<?php echo $href_visiting ?>" type="button" class="btn btn-default btn-lg col-md-3">Website Visiting</a>


        </p>

        <br>
        <br>
        <br>