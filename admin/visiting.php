<?php
include_once "../config/header.php";
include_once "./config/db.class.php";
include 'header2.php';
$id = $_GET['id'];
$today = date("Y-m-d");
$timezone = "Asia/Colombo"; // sets the timezone or region
if(function_exists('date_default_timezone_set')){ // the if function checks if setting the timezone is supported on your server first. You don't want an error thrown to the user do you..?
    date_default_timezone_set($timezone); 
}
if((isset($_GET['from'])) && (isset($_GET['to']))){

$from = $_GET['from'];
$to = $_GET['to'];
echo ' Total visiting From '.$from.' to ' .$to;
$data = mysqli_query("SELECT  SUM(logcount) AS sumlogin ,SUM(procount) AS sumprofil ,SUM(cvsearchcount) AS sumcvsearch,SUM(jobsubmitcount) AS sumjobsubmitcount , SUM(bannercount) AS sumbannercount ,SUM(cvview) AS sumcvview,SUM(vacancyview) AS sumvacancyview,SUM(orgincvdwld) AS sumorgincvdwld,SUM(cvdwld) AS sumcvdwld , SUM(cvsearchcount) sumcvsearchcount FROM logincount WHERE org_id = '$id'  and (date BETWEEN '$from' AND '$to') ") or die(mysqli_error());
	

        while($info = mysqli_fetch_array( $data )){
            $logcount = $info['sumlogin'];
            $procont = $info['sumprofil'];
            $cvsearch = $info['sumcvsearch'];
            $jobsubmitcount = $info['sumjobsubmitcount'];
            $bannertcount = $info['sumbannercount'];
            $cvview = $info['sumcvview'];
            $cvsearching = $info['sumcvsearchcount'];
            $vacancyview = $info['sumvacancyview'];
            $orgincvdwld = $info['sumorgincvdwld'];
            $cvdwld = $info['sumcvdwld'];
            
        }
        
        ?>
       <p>Active from 23/01/2016 </p>
       <div class='col-md-12'>
        <table class="table col-lg-10">
        
    <tbody>
        <tr>
            <th>Login Time</th>
        <tr>
            <td>Howmany time login</td><td><?php echo $logcount?></td>
        </tr>
        
        <tr>
            <th>Howmany time press this buttons</th>
            <tr>
            <td>Profile Clicks</td><td><?php echo $procont?></td>
            </tr>
            <tr>
        <td>Cv Search</td><td><?php echo $cvsearching?></td>
            </tr>
            <tr>
        <td>Job Submittion</td><td><?php echo $jobsubmitcount?></td>
        </tr>
        <tr>
        <td>banner Adds</td><td><?php echo $bannertcount?></td>
            </tr>
        
                <th>View Time</th>
        <tr>
            <tr>
            <td>Howmany time view the Cvs</td><td><?php echo $cvview?></td>
            </tr>
            <tr>
            <td>Howmany time Search Cvs</td><td><?php echo $cvsearch?></td>
            </tr>
            <tr>
            <td>Howmany time view the Vacancies</td><td><?php echo $vacancyview?></td>
            </tr>
            <tr>
            <td>Howmany time Download original CVs</td><td><?php echo $orgincvdwld?></td>
            </tr>
            <tr>
            <td>Howmany time Download filled CVs</td><td><?php echo $cvdwld?></td>
            </tr>
        </tr>
        
        </tr>
        
    </tbody>
</table>

        <?php
        }else{
        $id = $_GET['id'];

?>
<script src="https://code.jquery.com/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
 <link rel="stylesheet" href="../css/datepicker.css" type="text/css"/>
<div class='col-md-12'>
<p>Active from 23/01/2016 </p>
				<div class="col-sm-2">
				
				<form method="get" action="" target="_blank"> 
				<input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>" />
				<input type="date" class="form-control" id="DOB" name="from" value="2016-01-23" data-date-format="dd-mm-yyyy" data-date-viewmode="years" placeholder="From"/>
				</div>
				
				<div class="col-sm-2">
				<input type="date" class="form-control" id="DOB" name="to" value="<?php echo $today?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years" placeholder="To"/>
				</div>
				<button  target='_blank' type='submit'   class='btn btn-primary'>Search</button>
				</div>
				</form>
				<br>
<?php

$dt = new DateTime();
echo $dt->format('Y-m-d H:i:s');

$data = mysqli_query("SELECT * FROM logincount WHERE org_id = '$id'  and date = '$today'") or die(mysqli_error());


        while($info = mysqli_fetch_array( $data )){
            $logcount = $info['logcount'];
            $procont = $info['procount'];
            $cvsearch = $info['cvsearchcount'];
            $jobsubmitcount = $info['jobsubmitcount'];
            $bannertcount = $info['bannercount'];
            $cvview = $info['cvview'];
            $cvsearching = $info['cvsearch'];
            $vacancyview = $info['vacancyview'];
            $orgincvdwld = $info['orgincvdwld'];
            $cvdwld = $info['cvdwld'];
            
        }
       

?>
<table class="table-responsive col-lg-10">
    <tbody>
        <tr>
            <th>Login Time</th>
        <tr>
            <td>Howmany time login</td><td><?php echo $logcount?></td>
        </tr>
        
        <tr>
            <th>Howmany time press this buttons</th>
            <tr>
            <td>Profile Clicks</td><td><?php echo $procont?></td>
            </tr>
            <tr>
        <td>Cv Search</td><td><?php echo $cvsearch?></td>
            </tr>
            <tr>
            
        <td>Job Submittion</td><td><?php echo $jobsubmitcount?></td>
        </tr>
        <tr>
        <td>banner Adds</td><td><?php echo $bannertcount?></td>
            </tr>
        
                <th>View Time</th>
        <tr>
            <tr>
            <td>Howmany time view the Cvs</td><td><?php echo $cvview?></td>
            </tr>
            <tr>
            <td>Howmany time Search Cvs</td><td><?php echo $cvsearching?></td>
            </tr>
            <tr>
            <td>Howmany time view the Vacancies</td><td><?php echo $vacancyview?></td>
            </tr>
            <tr>
            <td>Howmany time Download original CVs</td><td><?php echo $orgincvdwld?></td>
            </tr>
            <tr>
            <td>Howmany time Download filled CVs</td><td><?php echo $cvdwld?></td>
            </tr>
        </tr>
        
        </tr>
        
    </tbody>
</table>
</div>
<div class='col-md-10 '>
<table class="table">
<thead>
<tr>
<th>Date Daily</th>
<th>Period</th>
<th>Type</th>
</tr>
</thead>
<tr>
<td ><?php echo $today; ?><input type='hidden' id='sdate' value='<?php echo $today; ?>'  /></td>
<td ><input type='date' id='edate'   /></td>
<td>
<a type="button" id='activate' class="btn btn-default btn-lg" >Activate</a></td>
</tr>

<tbody>

</tbody>
</table>
<?php
$ac = ("SELECT DATEDIFF(end_date,NOW()) as period,end_date,start_date,type FROM account_control WHERE id='$orgid'  ");
        $d = mysqli_query($ac) or die(mysqli_error());
        while ($info2 =mysqli_fetch_array($d) ){
        $sdate = $info2['start_date'];
        $edate = $info2['end_date'];
        $type = $info2['type'];
        $period =$info2['period'];
        $today = date("Y-m-d");
        
        $periodInt = (int)$period;
         echo '<span  style="position:relative;font-size:1.5em;">From:'.$sdate.'  To:'.$edate.' Remaining  :  '.$periodInt.'  Days </span>';
      
      if($periodInt<=0){
      echo '<br><h3 class="text-danger">the account was deactivated</h3>';
      }
        }
        ?>
<script href='js/jquery-1.7.min.js'></script>
<script>
	 $(document).ready(function () {
	 
        
        $('#type').change(function(){
        var type = $('#type').val();
        if (type==="R"){
        if (document.getElementById("hidethis").style.display == 'none') {
            document.getElementById("hidethis").style.display = '';
        } 
        }else{
        document.getElementById("hidethis").style.display = 'none';
        
        }
        
        })
        $('#activate').click(function(){
        
         

 function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        
        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id
        var sdate = $('#sdate').val();
        var edate = $('#edate').val();
        var type = $('#type').val();
        var referrence =$('#hidethis').val();
               
               $.ajax({
                type: "post",
                url: "activate_org.php",
                data: {
                    id: idofurl,
                    sdate:sdate,
                    edate:edate,
                    type:type,
                    referrence:referrence
                    
                    
                },
                success: function (data)  {
                     alert('account activated');
                     location.reload();
                    }
            });
               
             
            
            });
            });
          

</script>
</div>


<?php
}
?>

