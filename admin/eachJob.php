<?php
 
include_once "../config/header.php";
include_once "../config/db.class.php";


?>
<?php

?><div class="container">


<link href="../css/bootstrap-social.css" rel="stylesheet">


<div class="vacancies">
		
      <?php
      

			

      $id= $_GET['id'];
      
			$data = mysqli_query("SELECT * FROM vacancies WHERE id ='$id' ") 
			or die(mysqli_error()); 
			while($info = mysqli_fetch_array( $data )) 
			{ 
			$jobid =$info['id'];
			$orgid = $info['Orgid'];
			$jobCat =$info['jobCat'];
			$jobtype = $info['jobtype'];
			$jobPos =$info['jobPos'];
			$jobRes =$info['jobRes'];
			$jobQua =$info['jobQua'];
			$jobGen =$info['jobGen'];
			$update = $info['updateTime'];
                        $salaryDis = $info['salaryDis'];
			$address =$info['jobAdress'];
                        $emlphn = $info['emlphn'];
			$jobInd =$info['jobInd'];
			$intTime =$info['intTime'];
			$cname =$info['cname'];
			
			
			

		

                        
                        if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM vacancies WHERE id='$id'");
			
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				}
    	$org = $_GET['org'];
       $delet = "eachJob.php?app=delete&id=".$id;    
       $user = "jobsubmit.php?id=".$org;                
			if (!isset($_SESSION['username'])) {

    redirect('../vacants.php?id='.$jobid);
}

			?>
<div class="container">
<div class="row">
<br>
<div class="col-lg-12" >
<h1 class="top_head col-md-3" style="height:100%;padding:12px;">Job Id: <?php echo $jobid; ?></h1> <h1 class="top_head col-md-9" style="height:100%;padding: 12px;">Category: <?php echo $jobCat ?></h1><button class='btn btn-success' onClick='toggle()' style='position: relative;left:100%;top:-80px'>Edit</button></div>

<div class="container" id="hidethis_vac" style="Display:none">

    <span class="border"></span>

    <div class="container form_body ">

        <div class="row" id='jobsubmit_page'>
            <div class="col-md-8">	
                <h2>Submit your ads free</h2>	
                <h3>Job seeker Requirement</h3>
                
                  <select class="selectjobtype col-md-4" >
                  
                  	<option value=''>Select</option>
                	<option value='Full Time'>Full Time</option>
                	<option value='Part Time'>Part Time</option>
                	<option value='Contract'>Contract</option>
                	<option value='Temporary'>Temporary</option>
                	<option value='Internship'>Internship</option>
                	<option value='Foreign'>Foreign</option>
                	<option value='Others'>Others</option>
                </select>


<h4>Position</h4>

               <select class="selectpicker" id="hidethis"  size=0  >
                    
                    

<?php
$data = mysqli_query("SELECT * FROM applying_cat")
        or die(mysqli_error());
while ($info = mysqli_fetch_array($data)) {

    $areas = $info['areas'];
    $link = str_replace(' ', '_', $cat);
    $selector = str_replace('&', '', $link);
    ?>

                        <optgroup label="<?php echo $cat ?>">



    <?php
    $areas = $info['cat'];
    $areas_list = explode(',', $areas);

    foreach ($areas_list as $area) {
        ?>
                                <option value='<?php echo $area ?>'><?php echo $area ?></option>

                                <?php
                            }
                            ?>



    <?php
}
?>
                </select>
                <br><br>


                <form class="form" id="org" role="form" >
                    <div class="form-group">
                        <label class="sr-only" for="Position">Position </label>
                        <input type="text" class="form-control" name="Position" id="Position" placeholder="Position" required="true" value="<?php  echo $jobPos ?>">
                    </div>
                    <br>
                     <div class="form-group">
                        
                       
                        <label class="sr-only" for="Responsibilities">Responsibilities </label>
                        <textarea type="text" class="form-control Resp" name="Resp " id="Resp" placeholder="Responsibilities" required="true"></textarea>
                            <a id="add_res" class="btn btn-default">Add</a>
                        
                        
                            
                    </div>
                    <div class="form-group">
                     <table id='resposbility' class='table table-hover'>
                            <thead>
                                 <th>Responsibilities</th>
                            </thead>
                            <tbody id="resposbility">
                            <tr>
                                   
                                    <?php
                                       $array3 = explode('~', $jobRes);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                                  echo  '<tr class="sub_row" ><td class="ol_result">'.$array_each_sub[0].'</td><td><a  class="delete close">X</a></td></tr>';
                               
                                        
                                    }
                                }
                            }

?>
                                    
					

                                </tr>
                            
                            </tbody>
                            </table>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Qualification">Preferred Qualification </label>
                        <textarea type="text" class="form-control Quali" name="Quali" id="Quali" placeholder="Preferred Qualification " required="true"></textarea>
                        <a id="add_qua" class="btn btn-default">Add</a>
                    
                    </div>
                    
                    <div class="form-group">
                     <table id='qualifications' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Preferred Qualification</th>
                                    


                                </tr>
                            </thead>
                            <tbody id="qualification">
                            <tr>
                                   
                                    <?php
                                       $array3 = explode('~', $jobQua);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                                  echo  '<tr class="sub_row" ><td class="ol_result">'.$array_each_sub[0].'</td><td><a  class="delete close">X</a></td></tr>';
                               
                                        
                                    }
                                }
                            }

?>
                                    
					

                                </tr>
                            
                            </tbody>
                            
                            </table>
                        
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="gender" class="col-md-2 control-label">Gender</label>
                        <div class="col-md-4">
                            <select id="Gender" name="Gender" class="multiselect" >
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="both">Both</option>

                            </select>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="form-group">
                        
                            <label class="sr-only" for="Qualification">Salary Description</label>
                            <textarea type="text" class="form-control salaryDis" name="salaryDis" id="salaryDis" placeholder="Salary Discrition" required="true"></textarea>
                            <a id="add_dis" class="btn btn-default">Add</a>
                    </div>
                            <div class="form-group">
                            <table id='salarydiscription' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Salary Description</th>
                                    


                                </tr>
                            </thead>
                            <tbody id="salarydiscription">
                            <tr>
                                   
                                    <?php
                                       $array3 = explode('~', $salaryDis);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                                  echo  '<tr class="sub_row" ><td class="ol_result">'.$array_each_sub[0].'</td><td><a  class="delete close">X</a></td></tr>';
                               
                                        
                                    }
                                }
                            }

?>
                                    
					

                                </tr>
                            
                            </tbody>
                            
                            </table>
                        
                        
                        </div>

                    </div>

                    <br>


                    <h3>Company Details</h3>

                    <div class="form-group">
                        <label class="sr-only" for="location">Company Name</label>
                        <input type="text" class="form-control" name="cname" id="cname" placeholder="Company Name" required="true" value="<?php echo $cname ?>">
                        
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label class="sr-only" for="location">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required="true" value="<?php echo $cname ?>">
                        
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Business">Business Industry</label>
                        <input type="Text" class="form-control" name="Business" id="Business" placeholder="Business Industry" value="<?php echo $jobInd ?>">
                    </div>

                    <div class="form-group col-md-12">

                        <h3>Working days & time</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="workingDays" id="workingDays" placeholder="Working days & time" required="true" value="<?php echo $workingDays ?>">
                    </div>


                    
                    <a id="job_update" class="btn btn-primary col-xs-12" style="position:relative" >submit</a>
                    <br>
                    <br>
                    </div>

                </form>
            </div>


        </div>

    </div>

 <div class='col-md-7'>
 <div class="position_vacant col-md-3">Last Update</div><div class="position_vacant col-md-9">: <?php  echo $update; ?></div>
<div class="position_vacant col-md-3"> Jobtype</div><div class="position_vacant col-md-9">: <?php  echo $jobtype; ?></div>
<div class="position_vacant col-md-3"> Position</div><div class="position_vacant col-md-9">: <?php  echo $jobPos; ?></div>
<div class='position_vacant col-md-3'> Qualifications </div>
<div class="position_vacant col-md-9">:
    <?php
     $array3 = explode('~', $jobQua);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                               
                           echo " <li class='com_result'>  $array_each_sub[0]</li>";
                                       
                                        
                                    }
                                }
                            }

?>
</div>
<hr>

<div class='position_vacant col-md-3'> Responsibilities</div>
<div class="position_vacant col-md-9">:
    <?php
     $array3 = explode('~', $jobRes);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                               
                           echo " <li class='com_result'>  $array_each_sub[0]</li>";
                                       
                                        
                                    }
                                }
                            }

?>
</div>
<hr>

<div class='position_vacant col-md-3'> Gender 		</div><div class="position_vacant col-md-9">		: <?php  echo $jobGen; ?></div>
<div class='position_vacant col-md-3'> Salary Description 	</div>
<div class="position_vacant col-md-9">:
    <?php
     $array3 = explode('~', $salaryDis);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                               
                           echo " <li class='com_result'>  $array_each_sub[0]</li>";
                                       
                                        
                                    }
                                }
                            }

?>

</div>
<div class='position_vacant col-md-3'> Company Name</div><div class="position_vacant col-md-9">: <?php  echo $cname; ?></div>
<div class='position_vacant col-md-3'> Industry 	</div><div class="position_vacant col-md-9">		: <?php  echo $jobInd; ?></div>
<div class='position_vacant col-md-3'> Address</div><div class="position_vacant col-md-9">: <?php  echo $address; ?></div>
<div class='position_vacant col-md-3'> Email & Phone 	</div><div class="position_vacant col-md-9">		: <?php  echo $emlphn; ?></div>






</div>   
<?php

		
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	
			?>
			 <div>
<?php
					$data = mysqli_query("SELECT * FROM org_info WHERE id='$orgid'") 
					or die(mysqli_error()); 
					while($info = mysqli_fetch_array( $data )) {
					$basic_info= ($info['basic_info']);
					$cname= ($info['cname']);
                                        $phone = ($info['phone']);
                                        $web =($info['website']);
                                        $cperson = ($info['cperson']);
                                        $mobile = ($info['moblie']);
                                        $email = ($info['username']);
                                        $address= ($info['address']);
                                        $designation = ($info['designation']);
			
			}
			
					echo "<div class='col-md-2'>";
					echo "<p>Company Id </p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$orgid."</p>";
					echo "</div>";
					
					echo "<div class='col-md-2'>";
					echo "<p>Company Name </p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$cname."</p>";
					echo "</div>";
					
					echo "<div class='col-md-2'>";
					echo "<p>Phone</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$phone."</p>";
					echo "</div>";
                                        
                                        echo "<div class='col-md-2'>";
					echo "<p>Address</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$address."</p>";
					echo "</div>";
                                        
					
					 echo "<div class='col-md-2'>";
					echo "<p>Contact Person</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$cperson."</p>";
					echo "</div>";
						
					echo "<div class='col-md-2'>";
					echo "<p>Designation</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$designation."</p>";
					echo "</div>";
					
					
					echo "<div class='col-md-2'>";
					echo "<p>Mobile</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$mobile."</p>";
					echo "</div>";
					
					echo "<div class='row'>";
					echo "<div class='col-md-2'>";
					echo "<p>Email</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<a href='mailto:$email'>:".$email."</a>";
					echo "</div>";
					echo "</div>";
					
					

					}
					

?>

</div> 

      
			
    
</div>
<br>
                    <div style="right:200px">
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_linkt?> "  target="Facebook" />
                    <i class="fa fa-twitter">f</i>
                    </a>

                        <a  class="btn btn-social-icon btn-twitter"href="http://twitter.com/share?url=<?php echo $actual_linkt?> " target="_blank">
                        <i class="fa fa-twitter">t</i>
                        </a>    

                        <a class="btn btn-social-icon btn-google" href="https://plus.google.com/share?url=<?php echo $actual_linkt?> " target="_blank">
                      <i class="fa fa-twitter">g+</i>
                        </a> 

                        <a  class="btn btn-social-icon  btn-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $actual_linkt?>" target="_blank">
                       <i class="fa fa-twitter">ln</i>
                        </a>


                    </div>

			
		

</div>
</div>
<br>
<div class='row top_head' ><h4>&nbsp;&nbsp Jobseekers Applied<h4></div>
<table class="table">
      <thead>
        <tr>
   		  <th>ID</th>
          <th>Name</th>
          <th>Preferred Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
		

		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$data = mysqli_query("SELECT user_info.pro_info,user_info.al_info,user_info.ol_info,user_info.basic_info,user_info.id,seeker_vacant.* from user_info  INNER JOIN seeker_vacant ON user_info.id = seeker_vacant.seeker_id WHERE vacant_id =  $id AND status='a' and user_info.active=1 ORDER BY seeker_vacant.updatetime DESC" ) //query the databse 
		or die(mysqli_error());
		
			while($info = mysqli_fetch_array( $data )) {
			?>
				    <tr class="info">				
			<?php
			
			
			$string= ($info['cat']);
			$apply_cat= explode(',',$string );
					
					
			$pro_qualification= ($info['pro_info']);
			$pro_qualification1= explode(',',$pro_qualification );
			$pro_qual=explode(':',$pro_qualification1[0] );
			
					if ( ! isset($pro_qual[2])) {
					$pro_qual[2] = null;
					}	
					if ( ! isset($pro_qual[3])) {
					$pro_qual[3] = null;
					}
					$new_al = $pro_qual[2];
					$new_al_1 = $pro_qual[3];//remving the offset error
					
			
			$ol_info= ($info['ol_info']);
			$al_info= ($info['al_info']);
			$empty_ol = strlen ($ol_info);
			$empty_al = strlen ($al_info);
			
					if ($empty_ol <10){
					$qualified_ol=true;
					}
					else
					{
					$qualified_ol=false;
					}
					if ($empty_al <10){
					$qualified_al=true;
					}
					else
					{
					$qualified_al=false;
					}
	
	
					$basic_info=$info['basic_info'];
					$basic_info= explode('|',$basic_info );//get each basic info
					
					if ( ! isset($basic_info[0])) {//removing the offset error
					$basic_info[0] = null;
					}
					if ( ! isset($basic_info[6])) {
					$basic_info[6] = null;
					}
					$area = explode(',', $basic_info[6]); //get each basic info
					echo "<tr class='info' id='".$info['id']."'><td >".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					
					echo "<td><span class='glyphicon glyphicon-send iconfont'></span>" ;
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";
					
					
					if ($qualified_al && $qualified_ol){
					echo "<td>".$new_al."-".$new_al_1."</td>";
					}
					else
					{
					echo "<td> O/L Qualified "."<br/>"."A/L Qualified"."<br/>".$new_al."-".$new_al_1."</td>";
					}
					$id= $info['id'];
					$href="cv_gen.php?id=" . $id . "&org=1";
					?>
					<td><a class='btn btn-primary' id='back'>Back</a><a class='btn btn-success sendToH' id='sendToH'>Next</a><a class='btn btn-info ' href="<?php echo $href ?>" target="_blank">View</a></td>
		        </tr>
				<?php
				}
				?>
          

      </tbody>
	</table>



<div class='row top_head' ><h4>&nbsp;&nbsp Headhunting CVs<h4></div>
<table class="table">
      <thead>
        <tr>
   		  <th>ID</th>
          <th>Name</th>
          <th>Preferred Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
		

		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$h = 'h';
		$jid = $_GET['id'];
		$data2 = mysqli_query("SELECT user_info.pro_info,user_info.al_info,user_info.ol_info,user_info.basic_info,user_info.id,haedhunting.* from user_info  INNER JOIN haedhunting ON user_info.id = haedhunting.seeker_id WHERE vacant_id =  $jid  AND haedhunting.status='h' and user_info.active=1 ORDER BY haedhunting.updatetime DESC" ) //query the databse 
		or die(mysqli_error());
		
			
			
			while($info = mysqli_fetch_array( $data2 )) {
			?>
				    			
			<?php
			
			
			$string= ($info['cat']);
			$apply_cat= explode(',',$string );
					
					
			$pro_qualification= ($info['pro_info']);
			$pro_qualification1= explode(',',$pro_qualification );
			$pro_qual=explode(':',$pro_qualification1[0] );
			
					if ( ! isset($pro_qual[2])) {
					$pro_qual[2] = null;
					}	
					if ( ! isset($pro_qual[3])) {
					$pro_qual[3] = null;
					}
					$new_al = $pro_qual[2];
					$new_al_1 = $pro_qual[3];//remving the offset error
					
			
			$ol_info= ($info['ol_info']);
			$al_info= ($info['al_info']);
			$empty_ol = strlen ($ol_info);
			$empty_al = strlen ($al_info);
			
					if ($empty_ol <10){
					$qualified_ol=true;
					}
					else
					{
					$qualified_ol=false;
					}
					if ($empty_al <10){
					$qualified_al=true;
					}
					else
					{
					$qualified_al=false;
					}
	
	
					$basic_info=$info['basic_info'];
					$basic_info= explode('|',$basic_info );//get each basic info
					
					if ( ! isset($basic_info[0])) {//removing the offset error
					$basic_info[0] = null;
					}
					if ( ! isset($basic_info[6])) {
					$basic_info[6] = null;
					}
					$area = explode(',', $basic_info[6]); //get each basic info
					echo "<tr class='info' id='".$info['id']."'><td>".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					
					echo "<td><span class='glyphicon glyphicon-send iconfont'></span>" ;
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";
					
					
					if ($qualified_al && $qualified_ol){
					echo "<td>".$new_al."-".$new_al_1."</td>";
					}
					else
					{
					echo "<td> O/L Qualified "."<br/>"."A/L Qualified"."<br/>".$new_al."-".$new_al_1."</td>";
					}
					$id= $info['id'];
					$href="cv_gen.php?id=" . $id . "&org=1";
					?>
					<td><a class='btn btn-primary backToH' >Back</a><a class='btn btn-success sendToF' id='sendToF'>Next</a><a class='btn btn-info ' href="<?php echo $href ?>" target="_blank">View</a></td>
					
		        </tr>
				<?php
				}
				?>
          

      </tbody>
	</table>



<div class='row top_head' ><h4>&nbsp;&nbsp; Holding Interview <h4></div>
<table class="table">
      <thead>
        <tr>
   		  <th>ID</th>
          <th>Name</th>
          <th>Preferred Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
	

		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$h = 'h';
		$jid = $_GET['id'];
		$data2 = mysqli_query("SELECT user_info.pro_info,user_info.al_info,user_info.ol_info,user_info.basic_info,user_info.id,haedhunting.* from user_info  INNER JOIN haedhunting ON user_info.id = haedhunting.seeker_id WHERE vacant_id =  $jid  AND haedhunting.status='f' and user_info.active=1  ORDER BY haedhunting.updatetime DESC " ) //query the databse 
		or die(mysqli_error());
		
			
			
			while($info = mysqli_fetch_array( $data2 )) {
			?>
				    			
			<?php
			
			
			$string= ($info['cat']);
			$apply_cat= explode(',',$string );
					
					
			$pro_qualification= ($info['pro_info']);
			$pro_qualification1= explode(',',$pro_qualification );
			$pro_qual=explode(':',$pro_qualification1[0] );
			
					if ( ! isset($pro_qual[2])) {
					$pro_qual[2] = null;
					}	
					if ( ! isset($pro_qual[3])) {
					$pro_qual[3] = null;
					}
					$new_al = $pro_qual[2];
					$new_al_1 = $pro_qual[3];//remving the offset error
					
			
			$ol_info= ($info['ol_info']);
			$al_info= ($info['al_info']);
			$empty_ol = strlen ($ol_info);
			$empty_al = strlen ($al_info);
			
					if ($empty_ol <10){
					$qualified_ol=true;
					}
					else
					{
					$qualified_ol=false;
					}
					if ($empty_al <10){
					$qualified_al=true;
					}
					else
					{
					$qualified_al=false;
					}
	
	
					$basic_info=$info['basic_info'];
					$basic_info= explode('|',$basic_info );//get each basic info
					
					if ( ! isset($basic_info[0])) {//removing the offset error
					$basic_info[0] = null;
					}
					if ( ! isset($basic_info[6])) {
					$basic_info[6] = null;
					}
					$area = explode(',', $basic_info[6]); //get each basic info
					echo "<tr class='info' id='".$info['id']."'><td>".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					
					echo "<td><span class='glyphicon glyphicon-send iconfont'></span>" ;
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";
					
					
					if ($qualified_al && $qualified_ol){
					echo "<td>".$new_al."-".$new_al_1."</td>";
					}
					else
					{
					echo "<td> O/L Qualified "."<br/>"."A/L Qualified"."<br/>".$new_al."-".$new_al_1."</td>";
					}
					$id= $info['id'];
					$href="cv_gen.php?id=" . $id . "&org=1";
					?>
					<td><a class='btn btn-primary sendToH' id='backToH'>Back</a><a class='btn btn-success sendToI' id='sendToI'>Next</a><a class='btn btn-info ' href="<?php echo $href ?>" target="_blank">View</a></td>
					
		        </tr>
				<?php
				}
				?>
          

      </tbody>
	</table>
	

<div class='row top_head' ><h4>&nbsp;&nbsp; Selected<h4></div>
<table class="table">
      <thead>
        <tr>
   		  <th>ID</th>
          <th>Name</th>
          <th>Preferred Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
		

		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$h = 'h';
		$jid = $_GET['id'];
		$data2 = mysqli_query("SELECT user_info.pro_info,user_info.al_info,user_info.ol_info,user_info.basic_info,user_info.id,haedhunting.* from user_info  INNER JOIN haedhunting ON user_info.id = haedhunting.seeker_id WHERE vacant_id =  $jid  AND haedhunting.status='i'  and user_info.active=1 ORDER BY haedhunting.updatetime DESC"  ) //query the databse 
		or die(mysqli_error());
		
			
			
			while($info = mysqli_fetch_array( $data2 )) {
			?>
				    			
			<?php
			
			
			$string= ($info['cat']);
			$apply_cat= explode(',',$string );
					
					
			$pro_qualification= ($info['pro_info']);
			$pro_qualification1= explode(',',$pro_qualification );
			$pro_qual=explode(':',$pro_qualification1[0] );
			
					if ( ! isset($pro_qual[2])) {
					$pro_qual[2] = null;
					}	
					if ( ! isset($pro_qual[3])) {
					$pro_qual[3] = null;
					}
					$new_al = $pro_qual[2];
					$new_al_1 = $pro_qual[3];//remving the offset error
					
			
			$ol_info= ($info['ol_info']);
			$al_info= ($info['al_info']);
			$empty_ol = strlen ($ol_info);
			$empty_al = strlen ($al_info);
			
					if ($empty_ol <10){
					$qualified_ol=true;
					}
					else
					{
					$qualified_ol=false;
					}
					if ($empty_al <10){
					$qualified_al=true;
					}
					else
					{
					$qualified_al=false;
					}
	
	
					$basic_info=$info['basic_info'];
					$basic_info= explode('|',$basic_info );//get each basic info
					
					if ( ! isset($basic_info[0])) {//removing the offset error
					$basic_info[0] = null;
					}
					if ( ! isset($basic_info[6])) {
					$basic_info[6] = null;
					}
					$area = explode(',', $basic_info[6]); //get each basic info
					echo "<tr class='info' id='".$info['id']."'><td>".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					
					echo "<td><span class='glyphicon glyphicon-send iconfont'></span>" ;
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";
					
					
					if ($qualified_al && $qualified_ol){
					echo "<td>".$new_al."-".$new_al_1."</td>";
					}
					else
					{
					echo "<td> O/L Qualified "."<br/>"."A/L Qualified"."<br/>".$new_al."-".$new_al_1."</td>";
					}
					$id= $info['id'];
					$href="cv_gen.php?id=" . $id . "&org=1";
					?>
					<td><a class='btn btn-primary sendToF'>Back</a><a class='btn btn-success sendToS' id='sendToS'>Next</a><a class='btn btn-info ' href="<?php echo $href ?>" target="_blank">View</a></td>
					
		        </tr>
				<?php
				}
				?>
          

      </tbody>
	</table>


 </tbody>
	</table>
	

<div class='row top_head' ><h4>&nbsp;&nbsp; Appointed<h4></div>
<table class="table">
      <thead>
        <tr>
   		  <th>ID</th>
          <th>Name</th>
          <th>Preferred Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
		

		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$h = 'h';
		$jid = $_GET['id'];
		$data2 = mysqli_query("SELECT user_info.pro_info,user_info.al_info,user_info.ol_info,user_info.basic_info,user_info.id,haedhunting.* from user_info  INNER JOIN haedhunting ON user_info.id = haedhunting.seeker_id WHERE vacant_id =  $jid  AND haedhunting.status='s' and user_info.active=1  ORDER BY haedhunting.updatetime DESC " ) //query the databse 
		or die(mysqli_error());
		
			
			
			while($info = mysqli_fetch_array( $data2 )) {
			?>
				    			
			<?php
			
			
			$string= ($info['cat']);
			$apply_cat= explode(',',$string );
					
					
			$pro_qualification= ($info['pro_info']);
			$pro_qualification1= explode(',',$pro_qualification );
			$pro_qual=explode(':',$pro_qualification1[0] );
			
					if ( ! isset($pro_qual[2])) {
					$pro_qual[2] = null;
					}	
					if ( ! isset($pro_qual[3])) {
					$pro_qual[3] = null;
					}
					$new_al = $pro_qual[2];
					$new_al_1 = $pro_qual[3];//remving the offset error
					
			
			$ol_info= ($info['ol_info']);
			$al_info= ($info['al_info']);
			$empty_ol = strlen ($ol_info);
			$empty_al = strlen ($al_info);
			
					if ($empty_ol <10){
					$qualified_ol=true;
					}
					else
					{
					$qualified_ol=false;
					}
					if ($empty_al <10){
					$qualified_al=true;
					}
					else
					{
					$qualified_al=false;
					}
	
	
					$basic_info=$info['basic_info'];
					$basic_info= explode('|',$basic_info );//get each basic info
					
					if ( ! isset($basic_info[0])) {//removing the offset error
					$basic_info[0] = null;
					}
					if ( ! isset($basic_info[6])) {
					$basic_info[6] = null;
					}
					$area = explode(',', $basic_info[6]); //get each basic info
					echo "<tr class='info' id='".$info['id']."'><td>".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					
					echo "<td><span class='glyphicon glyphicon-send iconfont'></span>" ;
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";
					
					
					if ($qualified_al && $qualified_ol){
					echo "<td>".$new_al."-".$new_al_1."</td>";
					}
					else
					{
					echo "<td> O/L Qualified "."<br/>"."A/L Qualified"."<br/>".$new_al."-".$new_al_1."</td>";
					}
					$id= $info['id'];
					$href="cv_gen.php?id=" . $id . "&org=1";
					?>
					<td><a class='btn btn-primary sendToI'>Back</a><a class='btn btn-success sendToH' id='sendToS'>Next</a><a class='btn btn-info ' href="<?php echo $href ?>" target="_blank">View</a></td>
					
		        </tr>
				<?php
				}
				?>
          

      </tbody>
	</table>
	
	<script>
	
	$(document).ready(function () {
	 $('td a.sendToH').click(function(){
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
                var cvid=($(this).closest('tr').attr('id'));
                
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    jobid: idofurl,
                    cvid: cvid,
                    status:'h'
                    
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv sent to headhunting");
                            window.location.reload();
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});
		
		
		$('td a.backToH').click(function(){
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
                var cvid=($(this).closest('tr').attr('id'));
                
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    jobid: idofurl,
                    cvid: cvid,
                    status:'b'
                    
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv Removed");
                            window.location.reload();
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});
		
		$('td a.sendToP').click(function(){
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
                var cvid=($(this).closest('tr').attr('id'));
               
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    jobid: idofurl,
                    cvid: cvid,
                    status:'p'
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv Forwaded");
                            window.location.reload();
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});

		$('td a.sendToF').click(function(){
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
                var cvid=($(this).closest('tr').attr('id'));
               
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    jobid: idofurl,
                    cvid: cvid,
                    status:'f'
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv Forwaded");
                            window.location.reload();
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});
		
		
		
		$('td a.sendToS').click(function(){
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
                var cvid=($(this).closest('tr').attr('id'));
               
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    jobid: idofurl,
                    cvid: cvid,
                    status:'s'
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv Selected");
                            window.location.reload();
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});
		
		$('td a.sendToI').click(function(){
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
                var cvid=($(this).closest('tr').attr('id'));
               
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    jobid: idofurl,
                    cvid: cvid,
                    status:'i'
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv Sent to interview");
                            window.location.reload();
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});
		
		

		
		});
		 function toggle() {
                if (document.getElementById("hidethis_vac").style.display == 'none') {
                    document.getElementById("hidethis_vac").style.display = '';
                } else {
                    document.getElementById("hidethis_vac").style.display = 'none';
                }
            }
            
             function resetAllValues() {
  $('.Quali').find('input:text').val('');
}
        
           $(document).ready(function () {
               
     

        $("#resposbility").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
        
        $("#qualification").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
        
        $("#salarydiscription").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
        
   
      

  
        

    });
      $(document).ready(function () {
    $(function () {

            $("#add_qua").click(function (html) {
                var qualification = $("#Quali").val();
                    
                    if (qualification) {
                        
                        $('#qualification').append('<tr class="sub_row" ><td class="ol_result">'+ qualification + '</td><td><a  class="delete close">X</a></td></tr>');
                        $('.Quali:input').each(function() {
                    $(this).val('');
                    });
                     
                    }
                    

            });
            
            

            $('td').click(function () {

                if (!$(this).hasClass("greenDiv")) {
                    $(this).addClass("greenDiv");
                } else {
                    $(this).removeClass("greenDiv");
                }


            });

            $(".body_location").hide();

//$(".body_other_industry").hide();

            $('.location').click(function () {

                $(".body_location").toggle();
            });

        });

});



        $(document).ready(function () {
            
            
             $(function () {

            $("#add_res").click(function () {
                var responsbility = $("#Resp").val();
                    if (responsbility) {
                        $('#resposbility').append('<tr class="sub_row" ><td class="ol_result">' + responsbility + '</td><td><a  class="delete close">X</a></td></tr>');
                          $('.Resp:input').each(function() {
                    $(this).val('');
                    });   
                        
                           
                    }
                    

            });
            
            

            $('td').click(function () {

                if (!$(this).hasClass("greenDiv")) {
                    $(this).addClass("greenDiv");
                } else {
                    $(this).removeClass("greenDiv");
                }


            });

            $(".body_location").hide();

//$(".body_other_industry").hide();

            $('.location').click(function () {

                $(".body_location").toggle();
            });

        });
          $(function () {

            $("#add_dis").click(function () {
                var salarydis = $("#salaryDis").val();
                    if (salarydis) {
                        $('#salarydiscription').append('<tr class="sub_row" ><td class="ol_result">' + salarydis + '</td><td><a  class="delete close">X</a></td></tr>');
                            $('.salaryDis:input').each(function() {
                    $(this).val('');
                    });   
                         
                      
                           
                    }
                    

            });
            
            

            $('td').click(function () {

                if (!$(this).hasClass("greenDiv")) {
                    $(this).addClass("greenDiv");
                } else {
                    $(this).removeClass("greenDiv");
                }


            });

            $(".body_location").hide();

//$(".body_other_industry").hide();

            $('.location').click(function () {

                $(".body_location").toggle();
            });

        });
        
        
          
        
        
        


            $('#job_update').click(function () {
            
             	var Jobtype = $('.selectjobtype').val();
             	var Category = $('.selectpicker').val();
                var Position = $("#Position").val();
                var Resp = $("#Resp").val();
                var Quali = $("#Quali").val();
                var Gender = $("#Gender").val();
                var Salary = $("#Salary").val();
                var location = $("#location").val();
                var workingDays = $("#workingDays").val();
                var salaryDis = $("#salaryDis").val();
                var Business = $("#Business").val();
                var interOffice = $("#interOffice").val();
                var intTime = $("#intTime").val();
                
                
                $("#resposbility").find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                    responsbility = $tds.eq(0).text();
                 if(!responsbility==""){
                Resp  = Resp + responsbility + "~";
                 }
            });
            
                $("#salarydiscription").find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                    disciption = $tds.eq(0).text();
                 if(!disciption ==""){
                salaryDis  = salaryDis + disciption  + "~";
                 }
            });
            
                $("#qualification").find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                    qualyfication= $tds.eq(0).text();
                 if(!qualyfication==""){
                Quali  = Quali + qualyfication + "~";
                 }
            });
            

                function getUrlParameter(sParam)
                {
                    var sPageURL = window.location.search.substring(1);
                    var sURLVariables = sPageURL.split('&');
                    for (var i = 0; i < sURLVariables.length; i++)
                    {
                        var sParameterName = sURLVariables[i].split('=');
                        if (sParameterName[0] == sParam)
                        {
                            return sParameterName[1];
                        }
                    }
                }

		var org = getUrlParameter('org');
                var Jobid = getUrlParameter('id');
                $.ajax({
                    type: "post",
                    url: "JobsubmitUpdate.php",
                    data: {
                    	Jobtype:Jobtype,
                        Category: Category,
                        Position: Position,
                        Resp: Resp,
                        Quali: Quali,
                        Gender: Gender,
                        Salary: Salary,
                        location: location,
                        Business: Business,
                        salaryDis: salaryDis,
                        workingDays: workingDays,
                        intTime: intTime,
                        Jobid: Jobid
                    },
                    success: function (data) {
                    	if (data.status == 'success') {
                                    
                                    alert('updated');
                                     window.location.href="http://lobjobs.lk/employers/eachJob.php?id="+Jobid+"&org="+org;;

                                } else if (data.status == 'error') {
                                    alert('no updaets');
                                    window.location.href="http://lobjobs.lk/employers/eachJob.php?id="+Jobid+"&org="+org;;


                                }

                    }

                });





            });


        });
	
	</script>


    
                    <a  style="right:200px;"class='btn jobsubmit' href="vacancies.php">Back</a>
