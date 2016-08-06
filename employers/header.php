<?php
include_once "../config/header.php";
include_once "../config/db.class.php";
include_once 'login.php';


$orgid = $_GET['id'];
if (!isset($_SESSION['username'])) {

    redirect('signin.php?cat=org');
}


   
    ?>
    <div class="col-md-12">
        <br>
        <?php
    
       
        $id = $_GET['id'];
        $data = mysqli_query("SELECT COUNT(*) AS total ,org_info.* FROM org_info WHERE id='$id'")
        or die(mysqli_error());
while ($info = mysqli_fetch_array($data)) {
    $basic_info = ($info['basic_info']);
    $username = $info['username'];
    $active = $info['active'];
    $_SESSION['id'] = $info['id'];
    $session_user = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
    
    
    $session_job = $_SESSION['username'];
    
    if($session_user!=$session_job){
    
    
    echo '<script> alert("Somthink went wrong")</script>';
   redirect('signin.php?cat=org');
    }
    $basic_info_array = explode('|', $basic_info);
    if (!isset($basic_info)) {//removing the offset error
        $basic_info = null;
    }
    
   
   
       $href_view = 'profile.php?pro&id=' . $orgid;
    $href_vacncy = 'jobsubmit.php?job&id=' . $orgid;
    $href_banner = 'banner.php?ban&id=' . $orgid;
     $href_cvSerch = 'cv_search.php?cvs&id='.$orgid;
      
    //echo ($info['total']);
    //echo mysqli_num_rows($data);
   
    	
    
        $ac = ("SELECT DATEDIFF(end_date,NOW()) as period,end_date,start_date,type FROM account_control WHERE id='$orgid'  and id IN (SELECT id FROM org_info where id='$orgid' and track=1 ) ");
        $d = mysqli_query($ac) or die(mysqli_error());
        while ($info2 =mysqli_fetch_array($d) ){
        $today = date("Y-m-d");
        $sdate = $info2['start_date'];
        $edate =($info2['end_date']);
       
        $type = $info2['type'];
        $period =$info2['period'];
        
        $periodInt = (int)$period;
        if( $periodInt >=0 )
         echo '<span class="col-md-12"  style="position:relative;left:7%;top:30px;font-size:1.5em;">From:'.$sdate.'  To:'.$edate.' Remaining  :  '.$periodInt.'  Days </span>';
      
      	
      
        }
        
        
    
    
}
$cname= ($info['cname']);
 echo $cname;

?>


<div class="">

 <a href="logout.php"  type="button" class="btn btn-default btn-lg btn-danger" style="position:relative;left:90%">logout</a>

   
        <div > <span class="contact_org col-md-offset-9" >&nbsp; Email - <a href="mailto:info@lobjobs.lk" target="_top">info@lobjobs.lk</a></span></div>
         </div>
          <?php
  if($active==0){
    
      echo '<span class="col-md-12"  style="position:relative;left:8%;font-size:1.5em;"><p>Thank you for Register Us we will sent you the Approved Mail within 24 Hour after check your profile details.<br>Please check your profile details are Perfect. If not edit your profile details</p></span>';
    include('profile.php?pro&id='.$orgid);
    
    } 
 ?>
         <?php
          if($active==1) {
          ?>
        
        <div class="container">

            <p>
                <a href="<?php echo $href_view; ?>" type="button" class="btn btn-default btn-lg col-md-3">Profile</a>
                 <a href="<?php echo $href_cvSerch ?>" type="button" class="btn btn-default btn-lg col-md-3">Search CVs</a>
                <a href="<?php echo $href_vacncy; ?>" type="button" class="btn btn-default btn-lg col-md-3">Post a Job</a>
                <a href="<?php echo $href_banner ?>" type="button" class="btn btn-default btn-lg col-md-3">Interest Candidates</a>

        </p>

        <br>
        <br>
        <br>
        <?php 
        }
        ?>