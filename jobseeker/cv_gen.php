 <!DOCTYPE html>
 <html>
 
 <head>
 <meta name="viewport" content="width=device-width">
 </head>
<div class="container">
<a href="logout.php"  type="button" class="btn btn-default btn-lg btn-danger" style="position:relative;left:95%;top:2px">logout</a>
    <style>

        
        .box1 {
            display: block;

        }

        .box2 {
            display: block;


        }
    </style>
    <?php
 
    include_once "../config/header.php";



    include_once "../config/db.class.php";



    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($_GET['approve'])) {
        $approve = $_GET['approve'];
        if ($approve == "yes") {

            $query = ("UPDATE user_info SET active='1' WHERE id='$id'");
            $data = mysql_query($query)
                    or die(mysql_error());
             $query2 = "SELECT * FROM seeker_vacant WHERE seeker_id='$id'";  
             $data2 =  mysql_query($query2)
                    or die(mysql_error());    
                    
             $r = mysql_fetch_array($data2);
               $vacant = $r['vacant_id'];     
            
         $quary = "SELECT org_info.*,vacancies.* FROM org_info INNER JOIN vacancies ON vacancies.Orgid = org_info.id WHERE vacancies.id = $ivacant" ;
                $d = mysql_query($quary);	
                $result = mysql_fetch_array($d);
                $email = $result['username'];
                $org_id = $result['Orgid'];
                $to = $email;
                
            $subject = "New CV";
            $from = 'admin@lobjobs.lk';
            $body = 'Hi, <br/> <br/>You Have updated a new CV on your Vacancy ' . $vacant . ' <br>View your vacancy:http://lobjobs.lk/employers/eachJob.php?org='.$org_id.'&id='.$vacant.'<br>';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        
            if($info['active']=='1'){
            mail($email, $subject, $body, $headers);
            }    
        }
    }
    if (isset($_GET['delete'])) {
        $delete = $_GET['delete'];
        if ($delete == "yes") {

            $query = ("DELETE FROM user_info WHERE id='$id'");

            $data = mysql_query($query)
                    or die(mysql_error());
        }
    } 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }




    $data = mysql_query("SELECT * FROM user_info  WHERE id='$id'  ")
            or die(mysql_error());
    while ($info = mysql_fetch_array($data)) {
        $basic_info = ($info['basic_info']);
        $email = ($info['user_name']);
        $update = $info['updateTime'];
        $job_type= $info['job_type'];
        $inconame = $info['Incname'];
        $Ninconame = $info['NIncname'];
        $active = $info['active'];
        $alInfo = $info['al_info'];
        $olInfo = $info['ol_info'];
        $comInfo=$info['com_info'];
        $proInfo = ($info['pro_info']);
        $driveInfo = ($info['drive_info']);
        $cityInfo = ($info['city_info']);
        $workInfo = ($info['wok_info']);
        $langInfo = ($info['lan_info']);
        

        $basic_info_array = explode('|', $basic_info);
        if (!isset($basic_info)) {//removing the offset error
            $basic_info = null;
        }
        
        if($active == '0'){
        	echo '<h3 style="top:5px;">Submit Your Original CV or Complete the Application for Approve your CV </h3>';
        	}
        ?>

        <br>
        
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (!isset($_GET['org'])) {
                        ?>

                        <?php
                    }
                    ?>


                    <div class='row top_head'><div class='col-md-3 '><h2 class="" >CV ID <strong>:<?php echo $id ?></h2></div>

                        </strong>



                        <?php
                        if (!isset($_GET['org'])) {
                            ?>


                            <?php
                            if ($info['active'] == 1) {
                                ?>

                                <?php
                            } else {
                                ?>



                                <?php
                            }
                        }
                        ?>
                        <br>

                        <div class='col-md-12'><strong><h4>Last Update : <?php echo $update ?></h4></strong></div>

                    </div>
                    <div class="col-md-12">
                    <span>
                    <div class="row">
                    <span >
                        <div class="col-md-2">


                            <?php if ($info['pic_info'] == null) {
                                ?>
                            <img src="files/profile.png" alt="..." class="img-thumbnail" width="100px" height="100px" style="">
                                

                                <?php
                            } else {
                                ?>
                                <img src="<?php echo "files/" . $info['pic_info'] ?>" alt="..." class="img-thumbnail" width="250px" height="250px">
                               
                                <?php
                            }
                            ?>
                        </div>
                        </span>
                        </div>

                       
                        
              
                        <div class="row">
                            
                            <?php
                            if (isset($_GET['jobseek'])) {

                                if (!$info['cv_info'] == "") {

                                    if (isset($_GET['id'])) {
                                        ?>

                                        <div class='col-md-3 h1_head_sub' style="left:90%"><a class="btn btn-success" href="<?php echo "../jobseeker/files/" . $info['cv_info'] ?>" target="_blank">Original Cv</a></div><div class='col-md-9'></div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class='col-md-3 h1_head_sub'><a class="btn btn-success">Cv not found</a></div><div class='col-md-9'></div>
                                    <?php
                                }
                            }

                            if (isset($_GET['org'])) {
                                ?>
                                <div class='col-md-3 h1_head_sub'><a class="btn btn-success" href="<?php echo "../jobseeker/files/" . $info['cv_info'] ?>" target="_blank">Original Cv</a></div><div class='col-md-9'></div>
                                <?php
                            }

                            if (!isset($_GET['org'])) {

                                if (!$info['cv_info'] == "") {

                                    if (!isset($_GET['jobseek'])) {
                                        ?>
                                        <div class='col-md-3 h1_head_sub'><a class="btn btn-success" href="<?php echo "../jobseeker/files/" . $info['cv_info'] ?>" target="_blank">Original Cv</a></div><div class='col-md-9'></div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <div class='col-md-3 h1_head_sub'><a class="btn btn-success">Cv not found</a></div><div class='col-md-9'></div>
                                    <?php
                                }
                            }
                            ?>
                                    
                        </div>
                    </span>
                    </div>
                    <div class="" style="position:absolute;left:60%;top:30%" >
                        <img src="../images/cv_upload1.png" >
                        <br>
                        <div class="col-md-2" style="position:relative;top:40%" >
                         <input class="IMU"  id ='cv' type="file" path="files/" multi="true"  startOn="auto" afterUpload="filename" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" />
                         </div>
                          <div style="position:relative;left:65%;top:40%" >
                         <a  class="btn btn-success" type="submit" href="<?php echo 'cv_gen.php?id='.$_GET['id']?>">update</a>
                         
                         </div>
                        
                </div>
            </div>
        </div>
<br>
                   <br><br>
                   <br><br>
                   <br><br>
                   <br><br>
                   <div class="row">
                        <div class="container">
                        <div class='row cv_head'><div class='col-md-4 h1_head'>Preferred Job Position</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div><button type='button btn-success' onClick='toggle()' style='position: relative;left:60%' >Edit</button></div>
                        <div class="col-md-12 extra_margin">
                            <table id='ol_table' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Positions</th>
                                    


                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $apply_positions = ($info['cat']);
                            echo "<tr><td>" . $apply_positions . "</td></tr>";
                            
                            ?>
                            </tbody>
                            </table>


                            <div class="col-md-6  container" id="hidethis" style="display:none; " >
                                <div class="row" id="jobseeker">

                <div class="col-md-6">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 0 ,20") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =$info['cat'];
			$areas =$info['areas'];
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
			?>
				
		
		 <p class="cato" ><a class="toggle"><?php echo $cat ?></a></p>
		 <div class="details">
		<div class="table-responsive ">
                <table class="table job table-bordered">
      <?php
					$areas=$info['areas'];
					$areas_list = explode(',',$areas);
					
					foreach($areas_list as $area) {
					?>
				  
			  <tr>
                    <td name="<?php echo $area ?>" ><?php echo $area ?></td>
			  </tr>
					<?php
					}
					?>
			</table><!-- end of the  table-->		
			</div><!-- end of the table-->	
			</div><!-- end of the table-->	

			
			<?php
				}
			?>
				

		</div>
                
		
		<div class="col-md-6">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 20 ,43") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =$info['cat'];
			$areas =$info['areas'];
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
			?>
				
		
		 <p class="cato"><a class="toggle"><?php echo $cat ?></a></p>
		 <div class="details">
		<div class="table-responsive ">
        <table class="table job table-bordered">
      <?php
					$areas=$info['areas'];
					$areas_list = explode(',',$areas);
					
					foreach($areas_list as $area) {
					?>
				  
			  <tr>
                    <td name="<?php echo $area ?>" ><?php echo $area ?></td>
			  </tr>
					<?php
					}
					?>
					
			</table><!-- end of the  table-->		
			</div><!-- end of the table-->	
			</div><!-- end of the table-->	

			
			<?php
				}
                                
				
			?>
                        
				
<p class="cato"><a class="toggle">Others</a></p>
<form id="other" class="form-inline " role="form">
  <div  class="form-group col-md-10">
<input type="text" class="form-control " id="other_txt" name="other" placeholder="Enter the position"/>

</div>
<a id="otherbtn" class="btn btn-default">Add</a>
</form>

<p id="other_text_out"></p>


		</div><!-- end of col-md-6--> 
		

    </div>
                                <button class="btn btn-lg col-lg-offset-11" id="save_position" role="button">save</button>
                            </div>
                        </div>
                        
                        
                    </div>
                        <div class="row">
                            <div class="container">
                             <div class='row cv_head'><div class='col-md-4 h1_head'>Preferred Job Area</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>   
                            <div class="col-md-12 extra_margin">
                            <table id='ol_table' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Cities</th>
                                    


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 echo "<td>". $basic_info_array[6] ."</td>";
                                ?>
                            </tbody>
                            
                            </table>
                           
                           
                            
                            </div>
                            </div>
                        </div>
                        
                        
                        
                           <div class="container">
                          <div class='row cv_head'><div class='col-md-4 h1_head'>Preferred Job Type</div>
                          <button type='button btn-success' onClick='toggle_type()' style='position: relative;left:60%' >Edit</button></div></div> 
                          <?php echo $job_type;
                          ?>
                           <div class="col-md-4  container  col-md-offset-10" id="hidethis_type" style="display:none; "  >
                           <select id="jobtype" class="selectjobtype multiselect col-md-4 " >
                  
                  	<option value=''>Select</option>
                      
                        <option value="Full Time"<?=$job_type == 'Full Time' ? ' selected="selected"' : '';?>>Full Time</option>
                	<option value="Part Time"<?=$job_type == 'Part Time' ? ' selected="selected"' : '';?>>Part Time</option>
                	<option value="Contract"<?=$job_type == 'Contract' ? ' selected="selected"' : '';?> >Contract</option>
                	<option value="Temporary"<?=$job_type == 'Temporary' ? ' selected="selected"' : '';?>>Temporary</option>
                	<option value='Internship' <?=$job_type == 'Internship' ? ' selected="selected"' : '';?>>Internship</option>
                	<option value='Foreign' <?=$job_type == 'Foreign' ? ' selected="selected"' : '';?>>Foreign</option>
                	<option value='Others' <?=$job_type == 'Others' ? ' selected="selected"' : '';?>>Others</option>
	                </select><a class="btn btn-default " id="updata_type" role="button">Save</a>
                         </div> 
                          
                          <br>
                     </div>
                           <div class='row'> 
                           <div class="container"> 
                          <div class='row cv_head'>
                          
                       <div class='col-md-4 h1_head'>Intresting Companies</div>
                       <button type='button btn-success' onClick='toggle_icm()' style='position: relative;left:60%' >Edit</button>
                          
                          </div>
                           <div class="col-md-4 col-md-offset-8 container " id="hidethis_icm" style="display:none; "  >
                           <br>
                     	<select id="Incname" name="Incname" class="multiselect text-uppercase" multiple="multiple" >
				
				<?php
				
			$data = mysql_query("SELECT * FROM org_info ORDER BY cname  ") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{
				$cname = $info['cname'];
				$id = $info['id'];
				$c = explode(',',$inconame);
                         	foreach ($c as $cn){
                         	}
				?>
				<option   class='text-uppercase' value='<?php echo $id; ?>' <?=$id == $cn ? ' selected="selected"' : '';?>><?php echo $cname ?></option>
				<?php
				
				
			
			}
				?>
				</select><a class="btn btn-default " id="updata_icm" role="button">Save</a>
				<br>
                     </div>
                          <?php 
                          
                         	$c = explode(',',$inconame);
                         	foreach ($c as $cn){
                         		
                         		
                         	
                         		$oid = (int)($cn);
                         		$q = "SELECT * FROM org_info WHERE id = '$oid' ";
                         		$d  = mysql_query($q) or die();
                         		
                         		while($in = mysql_fetch_array( $d )) 
						{
                         			$cname = $in['cname'];
                         			echo "<tr>". $cname  ."</tr><br>";
                         			
                         			}
                         		
                         	
                         	}	
                         	
                         	
                         	
                         	                          ?>
                    	   
                    	
                    	
                    <br><br><br>
                     <div class='row cv_head'>
                     
                     
                     <div class='col-md-4 h1_head'>Not Intresting Companies</div>
                     <button type='button btn-success' onClick='toggle_nicm()' style='position: relative;left:60%' >Edit</button>
                     </div>
                     <div class="col-md-4 col-md-offset-8 container " id="hidethis_nicm" style="display:none; "  >
                     	<bt>
                     	<select id="NIncname" name="NIncname" class="multiselect text-uppercase" multiple="multiple" >
				
				<?php
				
			$data = mysql_query("SELECT * FROM org_info ORDER BY cname  ") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{
				$cname = $info['cname'];
				$id = $info['id'];
				$Nc = explode(',',$Ninconame);
                         	foreach ($Nc as $cn){
                         	}
				?>
				<option   class='text-uppercase' value='<?php echo $id; ?>'<?=$id == $cn ? ' selected="selected"' : '';?>><?php echo $cname ?></option>
				<?php
				
			
			}
				?>
				</select><a class="btn btn-default " id="updata_nicm" role="button">Save</a>
				<br>
				 
                     </div>
                          <?php 
                          
                         	$Nc = explode(',',$Ninconame);
                         	foreach ($Nc as $cn){
                         		
                         		
                         	
                         		$oid = (int)($cn);
                         		$q = "SELECT * FROM org_info WHERE id = '$oid' ";
                         		$d  = mysql_query($q) or die();
                         		
                         		while($in = mysql_fetch_array( $d )) 
						{
                         			$cname = $in['cname'];
                         			echo "<tr>". $cname  ."</tr><br>";
                         			
                         			}
                         		
                         	
                         	}	
                         	
                         	
                         	}
                         	                          ?>
                        
                         	                       
                         	                          
                     </div>
                     </div>
                     </div>
                     </div>
                     <br>
                        <div>
                             <div class="container">
                                <div class='row cv_head'><div class='col-md-4 h1_head'>Applyed Vacancies</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>   
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Position</th>
                                            <th>Location</th>          
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $data2 = "SELECT vacancies.id , vacancies.jobPos, vacancies.jobLoc
FROM vacancies INNER JOIN seeker_vacant ON vacancies.id = seeker_vacant.vacant_id WHERE seeker_id ='$id'";
                                        $vacncies = mysql_query($data2);
                                        while ($vacan_seeker = mysql_fetch_row($vacncies)) {
                                            $vacan_seeker_array = explode('|', $vacan_seeker);
                                            if (!isset($vacan_seeker)) {//removing the offset error
                                                $vacan_seeker = null;
                                            }
                                            echo "<tr>";
                                            echo "<td>" . $vacan_seeker[1] . "</td>";
                                            echo "<td>" . $vacan_seeker[2] . "</td>";

                                            $href_view = 'eachJob.php?id=' . $vacan_seeker[0];
                                            ?>
                                        <td><a href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a></td>


                                        <?php
                                        echo "<tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>


                            <div class="container">
                                <div class='row cv_head'><div class='col-md-4 h1_head'>Personal Information</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div><button type='button btn-success' onClick='toggle_area()' style='position: relative;left:60%' >Edit</button></div>

                                <div class="col-md-9 container " id="hidethis_area" style="display:none; "  >
                                    <form action="" id="form" class="form-horizontal" role="form">

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="<?php echo $basic_info_array[0] ?>"name="firstname" id="name" placeholder="Full Name">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Date Of birth</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="<?php echo $basic_info_array[1] ?>" id="DOB" name="year" data-date="<?php echo $basic_info_array[1] ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years" placeholder="Date Of birth"/>
                                            </div>
                                        </div>







                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Sex</label>
                                            <div class="col-sm-8">
                                                <select id="sex" name="sex" value="<?php echo $basic_info_array[2] ?>"  class="multiselect"  >
                                                    <option value="">Select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Married Status</label>
                                            <div class="col-sm-8">
                                                <select id="mstatus" name="mstatus" value="<?php echo $basic_info_array[3] ?>" class="multiselect">
                                                    <option value="">Select</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Nationality</label>
                                            <div class="col-sm-8">
                                                <select id="nationality" name="nationality" value="<?php echo $basic_info_array[4] ?>" class="multiselect"  >
                                                    <option value="">Select</option>
                                                    <option value="Srilankan">Sri lankan</option>
                                                    <option value="other">Others</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Preferred Salary</label>
                                            <div class="col-sm-8">
                                                <select id="pliving" name="pliving" value="<?php echo $basic_info_array[5] ?>" class="multiselect" >
                                                    <option value="">Select</option>
                                                    <option value="10000-15000">10,000 - 15,000</option>
                                                    <option value="15000-20000">15,000 - 20,000</option>
                                                    <option value="20000-25000">20,000 - 25,000</option>
                                                    <option value="25000-30000">25,000 - 30,000</option>
                                                    <option value="30000-35000">30,000 - 35,000</option>
                                                    <option value="35000-40000">35,000 - 40,000</option>
                                                    <option value="40000-45000">40,000 - 45,000</option>
                                                    <option value="45000-50000">45,000 - 50,000</option>
                                                    <option value="50000-55000">50,000 - 55,000</option>
                                                    <option value="55000-60000">55,000 - 60,000</option>
                                                    <option value="60000-70000">60,000 - 70,000</option>
                                                    <option value="70000-80000">70,000 - 80,000</option>
                                                    <option value="80000-90000">80,000 - 90,000</option>
                                                    <option value="90000-100000">90,000 - 100,000</option>
                                                    <option value="100000-Above">100,000 Above</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Preferred Job Areas</label>
                                            <div class="col-sm-8">
                                                <select id="cliving" name="cliving" value="<?php echo $basic_info_array[6] ?>" class="multiselect" multiple="multiple"  >
                                                    <option value="Islandwide">Islandwide</option>
                                                    <option value="Vavuniya">Vavuniya</option>
                                                    <option value="Trincomalee">Trincomalee</option>
                                                    <option value="Ratnapura">Ratnapura</option>
                                                    <option value="Puttalam">Puttalam</option>
                                                    <option value="Polonnaruwa">Polonnaruwa</option>
                                                    <option value="NuwaraEliya">Nuwara Eliya</option>
                                                    <option value="Mullaitivu">Mullaitivu</option>
                                                    <option value="Monaragala">Monaragala</option>
                                                    <option value="Matara">Matara</option>
                                                    <option value="Matale">Matale</option>
                                                    <option value="Mannar">Mannar</option>
                                                    <option value="Kurunegala">Kurunegala</option>
                                                    <option value="Killinochchi">Killinochchi</option>
                                                    <option value="Kegalle">Kegalle</option>
                                                    <option value="Kandy">Kandy</option>
                                                    <option value="Kalutara">Kalutara</option>
                                                    <option value="Jaffna">Jaffna</option>
                                                    <option value="Hambantota">Hambantota</option>
                                                    <option value="Gampaha">Gampaha</option>
                                                    <option value="Galle">Galle</option>
                                                    <option value="Colombo">Colombo</option>
                                                    <option value="Batticaloa">Batticaloa</option>
                                                    <option value="Badulla">Badulla</option>
                                                    <option value="Anuradhapura">Anuradhapura</option>
                                                    <option value="Ampara">Ampara</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Contact No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="<?php echo $basic_info_array[7] ?>"  id="contactno" name="contactno" placeholder="Contact Number">
                                            </div>
                                        </div>

                                        <div class="form-group more_space">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="<?php echo $basic_info_array[8] ?>"  name="address" id="address" placeholder="Address">
                                            </div>
                                        </div>







                                        <?php
                                        $dateincluded = "1988/08/11";
                                        ?>
                                        <input type="hidden" name="dateincluded" id="dateincluded" value="<?php echo $dateincluded; ?>">

                                    </form>
                                    <div class="form-group more_space">

                                        <div class="col-sm-8">
                                        </div>
                                        <button class="btn btn-lg col-lg-offset-11" id="update_info" role="button">save</button>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>


                </div>

                <div class="container">
                
                 <?php
                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Name</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[0] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Date Of Birth</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[1] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Sex</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[2] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Married Status</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[3] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Nationality</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[4] . "</p>";
                echo "</div>";
                echo "</div>";


                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Preferred Salary</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[5] . "</p>";
                echo "</div>";
                echo "</div>";





                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Contact No</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[7] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Address</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $basic_info_array[8] . "</p>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>Email Address</p>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<p>:" . $email . "</p>";
                echo "</div>";
                echo "</div>";
                ?>
            </div>
                 <div class="row">
                <div class="container">
                <div class='row cv_head'><div class='col-md-4 h1_head'>O/L Information</div><button type='button btn-success' onClick='toggle_ol()' style='position: relative;left:60%' >Edit</button></div>
                
                    <div class="container">
                        <table id='subject_ol_table' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Grade</th>


                                </tr>
                            </thead>
                            <tbody id='subject_table'>

                                <?php
                             

                                   
                                    $array3 = explode(',', $olInfo);
                                    foreach ($array3 as $info3) {
                                        if ($info3 == ":") {
                                            
                                        } else {
                                            $array_each_sub = explode(':', $info3);

                                            if (!isset($array_each_sub[0])) {
                                                $array_each_sub[0] = null;
                                            }
                                            if (!isset($array_each_sub[1])) {
                                                $array_each_sub[1] = null;
                                            }

                                            if (!$info3 == "") {
                                                
                    
                            echo "<tr class='sub_row' ><td class='ol_result'>  $array_each_sub[0]</td><td class='ol_result'>$array_each_sub[1]</td><td  ><a  class='delete close '  >X</a></td></tr>";
                                            }
                                        }
                                    }
                               
                                ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            
       
        <div class="row" >
            <div class="container">
            <div class="col-md-12  " id="hidethis_ol" style="display:none;">
                <!-- OL class info-->
                <form class="form-inline" role="form">
                    <select id="subject_ol" name="subject_ol" class="multiselect"  >

                        <option value="0">Select Subject</option>
                        <?php
                        $data = mysql_query("SELECT * FROM subjects_ol")
                                or die(mysql_error());
                        while ($info = mysql_fetch_array($data)) {
                            $sub_ol = preg_replace('/\s+/', '_', $info['subject_name']);
                            ?>

                            <option value='<?php echo $info['subject_name']; ?>'><?php echo $info['subject_name']; ?></td></option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="form-group other_sub">

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="other_sub_ol" id="other_sub_ol" placeholder="Subject Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <select id="ol_grade"  class="multiselect"  >
                            <option value="">Select</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="S">S</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                            <option value="W">W</option>
                        </select>
                    </div>

                    <a class="btn btn-default" id="add_ol" role="button">Add</a>
                </form>

                <table id="subject_ol_table1" class="table table-hover">

                </table>
                <a class="btn btn-default col-lg-offset-11" id="updata_ol" role="button">Save</a>
            </div>
            </div>
            </div>

        
        


            <div class="row">
                <div class="container">
        <div class='row cv_head'><div class='col-md-4 h1_head'>A/L Information</div><button type='button btn-success' onClick='toggle_al()' style='position: relative;left:60%' >Edit</button></div>
        
            <div class="container">
                <table id='subject_table_al' class='table table-hover'>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>


                        </tr>
                    </thead>
                     <tbody id='subject_table'>
                    <?php
                  

                        $array3 = explode(',', $alInfo);
                        foreach ($array3 as $info3) {
                            if ($info3 == ":") {
                                
                            } else {
                                $array_each_sub = explode(':', $info3);

                                if (!isset($array_each_sub[0])) {
                                    $array_each_sub[0] = null;
                                }
                                if (!isset($array_each_sub[1])) {
                                    $array_each_sub[1] = null;
                                }

                                if (!$info3 == "") {
                                   
                           echo "<tr class='sub_row' ><td class='al_result'>  $array_each_sub[0]</td><td class='al_result'>$array_each_sub[1]</td><td  ><a  class='delete close' >X</a></td></tr>";
                                }
                            }
                        }
                   
                    ?>
                    </tbody>
                </table>

            </div>
               

        	
        </div>
	  <div class="row" >
            <div class="container">
        <div class="col-md-12 " id="hidethis_al" style="display:none">
            <!-- OL class info-->


            <form class="form-inline" role="form">
                <select id="subjects_al" name="subjects_al" class="multiselect select_other"  >

                    <option value="">Select Subject</option>
                    <?php
                    $data = mysql_query("SELECT * FROM subjects_al")
                            or die(mysql_error());
                    while ($info = mysql_fetch_array($data)) {
                        $sub = preg_replace('/\s+/', '_', $info['subject_name']);
                        ?>

                        <option value='<?php echo $info['subject_name']; ?>'><?php echo $info['subject_name']; ?></td></option>
                        <?php
                    }
                    ?>
                </select>

                <div class="form-group other_sub_al">

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="other_sub_al_input" id="other_sub_al_input" placeholder="Subject Name">
                    </div>
                </div>
                <div class="form-group">
                    <select id="grade_al"  class="multiselect"  >
                        <option value="">Select</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="S">S</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                        <option value="W">W</option>
                    </select>
                </div>
                <a class="btn btn-default" id="add_al" role="button">Add</a>
            </form>

            <table id="subjects_al_table1" class="table table-hover">

                <tbody id="subject_table_al1">

                </tbody>
            </table>
            <a class="btn btn-default col-lg-offset-11" id="updata_al" role="button">Save</a>
        </div>
                
                 </div>
            </div>
            
                 </div>
            </div>
            
       
<div class="row" >
        <div class="container">
        <div class='row cv_head'><div class='col-md-4 h1_head'>Higher Education</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div><button type='button btn-success' onClick='toggle_pro()' style='position: relative;left:60%'>Edit</button></div>
        
        
            <div class="container">
                <table id='course' class='table table-hover'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Stage</th>


                        </tr>
                    </thead>
                    <tbody id='subject_table_course'>

                        <?php
                      
                       
                            $array3 = explode(',', $proInfo);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode(':', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }
                                    if (!isset($array_each_sub[1])) {
                                        $array_each_sub[1] = null;
                                    }if (!isset($array_each_sub[2])) {
                                        $array_each_sub[2] = null;
                                    }if (!isset($array_each_sub[3])) {
                                        $array_each_sub[3] = null;
                                    }if (!isset($array_each_sub[4])) {
                                        $array_each_sub[4] = null;
                                    }

                                    if (!$info3 == "") {
                                        echo "<div class='row'>";
                                        echo "<div class='col-md-4'>
                       
                    
                            <tr class='sub_row' ><td  class=''>  $array_each_sub[0]</td><td class=''>$array_each_sub[1]</td><td class='courseName'>  $array_each_sub[2]</td><td class=''>  $array_each_sub[3]</td><td class=''>  $array_each_sub[4]</td><td  ><a  class='delete close' >X</a></td></tr>";
                                    }
                                }
                            }
                       
                        ?>
                    </tbody>
                </table>

         
        

            <div>
                <div class="row">
                    <div   class="col-md-12" id="hidethis_pro" style="display:none" >
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="Professional Level">Professional Level</label>
                                <select class="pro_level multiselect"  >
                                    <option value="">Select place</option>
                                    <option value="University">University</option>
                                    <option value="Institute">Institute</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="University">University Name </label>
                                <input type="name" class="form-control" id="University" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">courseName</label>
                                <input type="email" class="form-control" id="courseName" placeholder="Enter Course Name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Status</label>
                                <select class="status multiselect"  >
                                    <option value="Completed">Completed</option>
                                    <option value="Following">Following</option>

                                </select>
                            </div>
                            <div  class="stage form-group">
                                <label class="sr-only" for="exampleInputEmail2">Stage</label>
                                <input type="email" class="form-control" id="stage_duration" placeholder="Stage">
                            </div>

                            <a class="btn btn-default" id="add_course_edu" role="button">Add</a>
                        </form>
                        <table id="course" class="table table-hover">



                        </table>
                        <a class="btn btn-default col-lg-offset-11" id="updata_pro" role="button">Save</a>
                    </div>
                </div><!-- end of row-->


            </div>
        </div>
        </div>
        </div>
        <div class="container">
            <div class='row cv_head'><div class='col-md-4 h1_head'>Language Skills</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div><button type='button btn-success' onClick='toggle_lang()' style='position: relative;left:60%' >Edit</button></div>
            <?php
            

                $os = array();
                
                $proinfo = explode(',', $langInfo);
                foreach ($proinfo as $sin_pro) {
                    $os[] = $sin_pro;
                }
                ?>
                <div class="table-responsive">
                    <table class="table lang table-bordered">
                        <thead>
                            <tr>
                                <th>Language</th>
                                <th>Speaking</th>
                                <th>Reading</th>
                                <th>Writing</th>
                                <th>Listening</th>
                                <th>Letter Writing</th>
                                <th>Article Writing</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr>
                                <th>English</th>
                                <td name="ES" <?php
                                if (in_array("ES", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="ER" <?php
                                if (in_array("ER", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="EW" <?php
                                if (in_array("EW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="EL" <?php
                                if (in_array("EL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="ELW" <?php
                                if (in_array("ELW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="EAW" <?php
                                if (in_array("EAW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>


                            </tr>
                            <tr>
                                <th>Sinhala</th>
                                <td name="SS" <?php
                                if (in_array("SS", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="SR" <?php
                                if (in_array("SR", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="SW" <?php
                                if (in_array("SW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="SL" <?php
                                if (in_array("SL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="SLW" <?php
                                if (in_array("SLW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="SAW" <?php
                                if (in_array("SAW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                            </tr>
                            <tr>
                                <th>Tamil</th>
                                <td name="TS" <?php
                                if (in_array("TS", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="TR" <?php
                                if (in_array("TR", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="TW" <?php
                                if (in_array("TW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="TL" <?php
                                if (in_array("TL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="TLW" <?php
                                if (in_array("TLW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="TAW" <?php
                                if (in_array("TAW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                            </tr>
                            <tr>
                                <th>Arabic</th>
                                <td name="AS" <?php
                                if (in_array("AS", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="AR" <?php
                                if (in_array("AR", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="AW" <?php
                                if (in_array("AW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="AL" <?php
                                if (in_array("AL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="ALW" <?php
                                if (in_array("ALW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="AAW" <?php
                                if (in_array("AAW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                            </tr>
                            <tr>
                                <th>Hindi</th>
                                <td name="HS" <?php
                                if (in_array("HS", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="HR" <?php
                                if (in_array("HR", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="HW" <?php
                                if (in_array("HW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="HL" <?php
                                if (in_array("HL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="HLW" <?php
                                if (in_array("HLW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="HAW" <?php
                                if (in_array("HAW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                            </tr>
                            <tr>
                                <th>Urudu</th>
                                <td name="US" <?php
                                if (in_array("US", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UR" <?php
                                if (in_array("UR", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UW" <?php
                                if (in_array("UW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UL" <?php
                                if (in_array("UL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="ULW" <?php
                                if (in_array("ULW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UAW" <?php
                                if (in_array("UAW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                            </tr>
                            <tr>
                                <th>French</th>
                                <td name="US" <?php
                                if (in_array("US", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UR" <?php
                                if (in_array("UR", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UW" <?php
                                if (in_array("UW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UL" <?php
                                if (in_array("UL", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="ULW" <?php
                                if (in_array("ULW", $os)) {
                                    echo "class='greenDiv'";
                                }
                                ?> </td>
                                <td name="UAW" <?php
                                if (in_array("UAW", $os)) {
                                    echo "class='greenDiv'";
                                }
           
                                ?> </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div id="hidethis_lang" style="display:none" >
                    <a class="btn btn-default col-lg-offset-11" id="updata_lang" role="button">Save</a>
                </div>

        </div>
         <div class="row">
                <div class="container">
                <div class='row cv_head'><div class='col-md-4 h1_head'> Computer Skills</div><button type='button btn-success' onClick='toggle_com()' style='position: relative;left:60%' >Edit</button></div>

                <table id="course" class="table table-hover">
                    <thead>
                        <tr>

                            <th>Course</th>
                            <th>Experience</th>
                            <th>Stage</th>

                        </tr>
                    </thead>
                    <tbody id='computer_table1'>
                        <?php
                       

                            
                            $array3 = explode(',', $comInfo);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode(':', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }
                                    if (!isset($array_each_sub[1])) {
                                        $array_each_sub[1] = null;
                                    }if (!isset($array_each_sub[2])) {
                                        $array_each_sub[2] = null;
                                    }

                                    if (!$info3 == "") {
                                        echo "<div class='row'>";
                                        echo "<div class='col-md-4'>
                       
                    
                            <tr class='sub_row' ><td class='com_result'>  $array_each_sub[0]</td><td class='com_result'>$array_each_sub[1]</td><td class='com_result'>$array_each_sub[2]</td><td  ><a  class='delete close divbutton' >X</a></td></tr>";
                                    }
                                }
                            }
                        
                        ?>
                    </tbody>
                </table>


            


            <div class="col-md-12"  id="hidethis_com" style="display:none">
                <form class="form-inline" role="form">

                    <div class="form-group">

                        <select id="courses_list" name="years_ex" class='multiselect multiselect-all'  >
                            <option value=''>Select Area</option>
                            <?php
                            $i = "";


                            $data = mysql_query("SELECT * FROM courses LIMIT 0, 8")
                                    or die(mysql_error());
                            while ($info = mysql_fetch_array($data)) {
                                $link = $info['name'];
                                $no_space_link = preg_replace('/\s+/', '', $link);

                                $link_selector = "#" . $no_space_link;


                                $subjectlist = $info['subjects'];
                                $subjectsarray = explode(',', $subjectlist);
                                ?>
                                <optgroup label="<?php echo $link ?>">
                                    <?php
                                    foreach ($subjectsarray as $subject) {
                                        ?>

                                        <option value='<?php echo $subject ?>'><?php echo $subject ?></option>

                                    </optgroup>




                                    <?php
                                }
                            }
                            ?>		

                        </select>
                    </div>

                    <div class="form-group">

                        <select id="Stage" name="Stage" class="multiselect"  >
                            <option value="">Select Stage</option>
                            <option value='Beginner'>Beginner</option>
                            <option value='Intermediate'>Intermediate</option>
                            <option value='Expert'>Expert</option>
                        </select>
                    </div>

                    <div class="form-group">

                        <select id="Experience" name="Experience" class="multiselect"  >
                            <option value="">Select Experience</option>
                            <option value='1'>1+</option>
                            <option value='2'>2+</option>
                            <option value='3'>3+</option>
                            <option value='4'>4+</option>
                            <option value='5'>5+</option>
                            <option value='6'>6+</option>
                            <option value='7'>7+</option>
                            <option value='10+'>10+</option>
                            <option value='15+'>15+</option>
                            <option value='20+'>20+</option>
                            <option value='25+'>25+</option>
                            <option value='30+'>30+</option>
                        </select>
                    </div>

                    <a class="btn btn-default" id="add_computerS" role="button">Add</a>


                    <table id="computer" class="table table-hover">


                    </table>


                    <a class="btn btn-default col-lg-offset-11" id="updata_com" role="button">Save</a>
                </form>    
            </div>
            </div>
                </div>


            <div class="row">
                <div class="container">
                <div class='row cv_head'><div class='col-md-4 h1_head'>Work  Experience</div><button type='button btn-success' onClick='toggle_work()'style='position: relative;left:60%' >Edit</button></div>

                <table id="work_table" class="table table-hover">
                    <thead>
                        <tr>

                            <th>Organization</th>
                            <th>Designation</th>
                            <th>Period</th>

                        </tr>
                    </thead>
                    <tbody id="work_ex">
                        <?php
                      
                            
                            $array3 = explode(',', $workInfo);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode(':', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }
                                    if (!isset($array_each_sub[1])) {
                                        $array_each_sub[1] = null;
                                    }if (!isset($array_each_sub[2])) {
                                        $array_each_sub[2] = null;
                                    }

                                    if (!$info3 == "") {
                                        echo "<div class='row'>";
                                        echo "<div class='col-md-4'>
                       
                    
                            <tr class='sub_row' ><td class='com_result'>  $array_each_sub[0]</td><td class='com_result'>$array_each_sub[1]</td><td class='com_result'>$array_each_sub[2]</td><td  ><a  class='delete close divbutton' >X</a></td></tr>";
                                    }
                                }
                            }
                      
                        ?>
                    </tbody>
                </table>


                <div id="hidethis_work" style="display:none">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="Organization">Organization</label>
                            <input type="email" class="form-control" id="Organization" placeholder="Enter Organization">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="Designation">Designation</label>
                            <input type="email" class="form-control" id="Designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="Period">Period</label>
                            <select class='period multiselect' >
                                <option value=''>Select experience</option>
                                <option value='Currently Working'>Currently Working</option>
                                <option value='less than year'>less than Year</option>
                                <option value='1'>1+</option>
                                <option value='2'>2+</option>
                                <option value='3'>3+</option>
                                <option value='4'>4+</option>
                                <option value='5'>5+</option>
                                <option value='6'>6+</option>
                                <option value='7'>7+</option>
                                <option value='8'>8+</option>
                                <option value='10+'>10+</option>
                                <option value='15+'>15+</option>
                                <option value='20+'>20+</option>
                                <option value='25+'>25+</option>
                                <option value='30+'>30+</option>

                            </select>
                        </div>


                        <a class="btn btn-default" id="add_work" role="button">Add</a>
                    </form>
                    <a class="btn btn-default col-lg-offset-11" id="updata_work" role="button">Save</a>
                </div>
            </div>
            </div>

            
             <div class="container col-md-12">
                <div class='row cv_head '><div class='col-md-4 h1_head'>Suburbs knowledge</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div><button type='button btn-success' onClick='toggle_sub()' style='position: relative;left:60%'>Edit</button></div>
                <div class="col-md-12 extra_margin">
                    <table id='ol_table' class='table col-md-12  table-hover'>
                    <thead>
                        <tr>

                            <th style="">Cities</th>
                        </tr>
                    </thead>
                    <tbody class="col-md-12 " >
                        <?php
                       
                            
                            $array3 = explode(',', $cityInfo);
                             echo "<tr><td  class ='col-md-4'>". $cityInfo  ."</tr></td>";
                            
                             
                      
                        ?>
                    </tbody>
                </table>
                </div>
                
                <div class="container ">
                    <div class="col-md-12" id="hidethis_sub" style="position: relative;display:none ;">
			<h4>Click on your Suburbs knowledge Cities</h4>
                        <table class="table col-md-6 col-xs-1 city table-bordered" >
                           
                            <tbody class="col-md-12 ">
                                <tr>
                                    <td name="Vavuniya" >Vavuniya</td>
                                    <td name="Kegalle" >Kegalle</td>
                                    <td name="Trincomalee" >Trincomalee</td>

                                    <td name="Ratnapura"  >Ratnapura</td>
                                    <td name="Kalutara" >Kalutara</td>
                                    <td name="Kandy" >Kandy</td>
                                </tr>

                                <tr>
                                    <td name="Puttalam"  >Puttalam</td>
                                    <td name="Jaffna" >Jaffna</td> 
                                    <td name="Polonnaruwa"  >Polonnaruwa</td>

                                    <td name="Hambantota" >Hambantota</td>
                                    <td name="NuwaraEliya"  >Nuwara Eliya</td>
                                    <td name="Gampaha" >Gampaha</td>
                                </tr>
                                <tr>
                                    <td name="Mullaitivu" >Mullaitivu</td>
                                    <td name="Galle" >Galle</td>
                                    <td  name="Monaragala" >Monaragala</td>

                                    <td name="Colombo" >Colombo</td>
                                    <td  name="Matara" >Matara</td>
                                    <td name="Batticaloa" >Batticaloa</td>
                                </tr>

                                <tr>
                                    <td  name="Matale" >Matale</td>
                                    <td name="Badulla">Badulla</td>
                                    <td  name="Mannar">Mannar</td>

                                    <td name="Anuradhapura" >Anuradhapura</td>
                                    <td name="Kurunegala" >Kurunegala</td>
                                    <td name="Ampara" >Ampara</td>
                                </tr>

                                <tr>
                                    <td name="Killinochchi" >Killinochchi</td>
                                </tr>
                                
                                        
                                 

                            </tbody>

                        </table>
                         <a class="btn btn-default col-lg-offset-11" id="updata_sub" role="button">Save</a>

                    </div>
                   
                    
                </div>
             </div>



            </div>
        </div>

        
            <div class="row">
                <div class="container">
                <div class='row cv_head'><div class='col-md-4 h1_head'>Driving Licence</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div><button type='button btn-success' onClick='toggle_drive()' style='position: relative;left:60%'>Edit</button></div>
                <table id="city_table" class="table  table-hover">
                    <thead>
                        <tr>

                            <th style="width:20%;">Licences</th>
                        </tr>
                    </thead>
                    <tbody class="col-md-4" id="city_info"  >
                        <?php
                   
                            
                            $array3 = explode(',', $driveInfo);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode(':', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                                        echo "<div class='row'>";
                                        echo "<div class='col-md-4'>
                            <td class='com_result'>  $array_each_sub[0]</td>";
                                    }
                                }
                            }
                      
                        ?>
                    </tbody>
                </table>

		<div >
                <div class="container "  id="hidethis_drive" style="display: none;">
                <h4>Click on your Driving Licences</h4>
                    <table class="table Driving   table-bordered">
                        <tbody class="col-md-2">
                            <tr>
                                <td name="A1" >A1</td>
                                <td name="A" >A</td>
                                <td name="B1" >B1</td>
                                <td name="B" >B</td>
                                <td name="C1" >C1</td>
                                <td name="C" >C</td>
                                <td name="CE" >CE</td>
                                <td name="D1" >D1</td>
                                <td name="D" >D</td>
                                <td name="DE" >DE</td>
                                <td name="G1" >G1</td>
                                <td name="G" >G</td>
                                <td name="J" >J</td>
                                
                            </tr>

                        </tbody>
                        <tr>

                        </tr>
                    </table>
                    
		<a class="btn btn-default col-lg-offset-11" id="updata_drive" role="button">Save</a>

                </div>
                
                
            </div>
            
            </div>

</div>



<script>

    $(document).ready(function () {
        $("#cv").change(function () {
        var fileExtension = ['docx'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
        }
    });
        
        $('td').click(function () {

            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }


        });
    });



    $(document).ready(function () {

        $('#approve_status').click(function () {

            var status_cv = $('.status_text').val();


            $.ajax({
                type: "post",
                url: "appprove_status.php",
                data: {
                    id: <?php echo $_GET['id']; ?>,
                    status: status_cv
                },
                success: function (data) {
                    alert('Cv status updated');
                    //console.log(data); // "something"
                    //$link="upload_info.php?id="+idofurl;
                    //window.location.href = $link;
                }
            });
        });


        $('#approve').click(function () {

            $.ajax({
                type: "post",
                url: "approve.php",
                data: {
                    id: $id
                },
                success: function (data) {
                    //console.log(data); // "something"
                    //$link="upload_info.php?id="+idofurl;
                    //window.location.href = $link;
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(document).on('mouseenter', '.divbutton', function () {
            $(this).find(":button").show();
        }).on('mouseleave', '.divbutton', function () {
            $(this).find(":button").hide();
        });
    });




</script>
<script>
    function toggle() {
        if (document.getElementById("hidethis").style.display == 'none') {
            document.getElementById("hidethis").style.display = '';
        } else {
            document.getElementById("hidethis").style.display = 'none';
        }
    }
    function toggle_area() {
        if (document.getElementById("hidethis_area").style.display == 'none') {
            document.getElementById("hidethis_area").style.display = '';
        } else {
            document.getElementById("hidethis_area").style.display = 'none';
        }
    }
    function toggle_ol() {
        if (document.getElementById("hidethis_ol").style.display == 'none') {
            document.getElementById("hidethis_ol").style.display = '';
        } else {
            document.getElementById("hidethis_ol").style.display = 'none';
        }
    }
    function toggle_al() {
        if (document.getElementById("hidethis_al").style.display == 'none') {
            document.getElementById("hidethis_al").style.display = '';
        } else {
            document.getElementById("hidethis_al").style.display = 'none';
        }
    }
    function toggle_pro() {
        if (document.getElementById("hidethis_pro").style.display == 'none') {
            document.getElementById("hidethis_pro").style.display = '';
        } else {
            document.getElementById("hidethis_pro").style.display = 'none';
        }
    }
    function toggle_com() {
        if (document.getElementById("hidethis_com").style.display == 'none') {
            document.getElementById("hidethis_com").style.display = '';
        } else {
            document.getElementById("hidethis_com").style.display = 'none';
        }
    }
    function toggle_lang() {
        if (document.getElementById("hidethis_lang").style.display == 'none') {
            document.getElementById("hidethis_lang").style.display = '';
        } else {
            document.getElementById("hidethis_lang").style.display = 'none';
        }
    }
    function toggle_work() {
        if (document.getElementById("hidethis_work").style.display == 'none') {
            document.getElementById("hidethis_work").style.display = '';
        } else {
            document.getElementById("hidethis_work").style.display = 'none';
        }
    }
    function toggle_sub() {
        if (document.getElementById("hidethis_sub").style.display == 'none') {
            document.getElementById("hidethis_sub").style.display = '';
        } else {
            document.getElementById("hidethis_sub").style.display = 'none';
        }
    }
    function toggle_drive() {
        if (document.getElementById("hidethis_drive").style.display == 'none') {
            document.getElementById("hidethis_drive").style.display = '';
        } else {
            document.getElementById("hidethis_drive").style.display = 'none';
        }
    }
    
    function toggle_icm() {
        if (document.getElementById("hidethis_icm").style.display == 'none') {
            document.getElementById("hidethis_icm").style.display = '';
        } else {
            document.getElementById("hidethis_icm").style.display = 'none';
        }
    }
    
    function toggle_nicm() {
        if (document.getElementById("hidethis_nicm").style.display == 'none') {
            document.getElementById("hidethis_nicm").style.display = '';
        } else {
            document.getElementById("hidethis_nicm").style.display = 'none';
        }
    }
    
    
    
    function toggle_type() {
        if (document.getElementById("hidethis_type").style.display == 'none') {
            document.getElementById("hidethis_type").style.display = '';
        } else {
            document.getElementById("hidethis_type").style.display = 'none';
        }
    }

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#otherbtn').click(function () {

            var other_text = $('#other_txt').val();
            if (!other_text == "") {
                $('#other_text_out').html(other_text);
                $("#other_text_out").show();

            }
        });
        $('td').click(function () {
            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }
        });
    });//end of document ready

    $(function () {
        $(".details").hide();
        $("#other").hide();

        $(".toggle").click(function () {
            var that = $(this);
            that.parent().next().toggle("fast", function () {
                //$("#other").show();

            });
        });
    });

</script>
<!-- Initialize multiselect  plugin: -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#DOB').datepicker();
        $('.multiselect').multiselect();
    });

//get subject on click
    $(document).ready(function () {
        $(".other_sub").fadeOut();

        $(".other_sub_al").fadeOut();
        var other_ol = false;
        var other_al = false;
        $(function () {

            $('#subject_ol').on('change', function () {
                var value_ol = this.value;
                if (value_ol == "Others") {
                    $(".other_sub").fadeIn();
                    other_ol = true;
                }
                else {
                    $(".other_sub").fadeOut();
                    other_ol = false;
                }

            });
        });

        $(function () {
            $('#subjects_al').on('change', function () {
                var value = this.value;
                if (value == "Others") {
                    $(".other_sub_al").fadeIn();
                    other_al = true;
                }
                else {
                    $(".other_sub_al").fadeOut();
                    other_al = false;
                }

            });
        });



    });//end of document ready




</script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#subject_table").on('click', '.delete', function () {
            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
        $("#subject_table_al").on('click', '.delete', function () {
            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
    });

</script>
<script type="text/javascript">

    $(document).ready(function () {

        $("#work_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });
    
    

    $(document).ready(function () {

        $("#course").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });

    $(document).ready(function () {

        $("#subjects_al_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });

    $(document).ready(function () {

        $("#subject_ol_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });
    $(document).ready(function () {

        $("#subject_table_course").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });

    $(document).ready(function () {

        $("#computer_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });
    $(document).ready(function () {

        $("#computer_table1").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });

//get subject on click
    $(document).ready(function () {






        $(".other_sub").fadeOut();

        $(".other_sub_al").fadeOut();
        var other_ol = false;
        var other_al = false;
        $(function () {

            $('#subject_ol').on('change', function () {
                var value_ol = this.value;
                if (value_ol == "Others") {
                    $(".other_sub").fadeIn();
                    other_ol = true;
                }
                else {
                    $(".other_sub").fadeOut();
                    other_ol = false;
                }

            });
        });

        $(function () {
            $('#subjects_al').on('change', function () {
                var value = this.value;
                if (value == "Others") {
                    $(".other_sub_al").fadeIn();
                    other_al = true;
                }
                else {
                    $(".other_sub_al").fadeOut();
                    other_al = false;
                }

            });
        });


        $(function () {

            $("#add_ol").click(function () {
                var subjects = $("#subject_ol").val();
                var grade = $("#ol_grade").val();

                if (!grade == "0") {
                    var other_sub_ol = $("#other_sub_ol").val();
                    if (other_ol) {
                        $('#subject_table').append('<tr class="sub_row" ><td class="ol_result">' + other_sub_ol + '</td><td class="ol_result">' + grade + '</td><td><a  class="delete close">X</a></td></tr>');
                    }
                    else {
                        $('#subject_table').append('<tr class="sub_row" ><td class="ol_result">' + subjects + '</td><td class="ol_result">' + grade + '</td><td><a  class="delete close">X</a></td></tr>');
                    }

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

            $("#add_al").click(function () {
                var subjects_al = $("#subjects_al").val();
                var grade_al = $("#grade_al").val();
                if (!grade_al == "0") {
                    var other_sub_al_input = $("#other_sub_al_input").val();
                    if (other_al) {
                        $('#subject_table_al').append('<tr class="sub_row_al" ><td class="al_result">' + other_sub_al_input + '</td><td class="al_result">' + grade_al + '</td><td><a  class="delete close">X</a></td></tr>');
                    }
                    else {
                        $('#subject_table_al').append('<tr class="sub_row_al" ><td class="al_result">' + subjects_al + '</td><td class="al_result">' + grade_al + '</td><td><a  class="delete close">X</a></td></tr>');
                    }

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


        $("#add_course_edu").on('click', function () {
            var courseName = $("#courseName").val();
            var status = $(".status").val();
            var University = $("#University").val();
            var stage = $("#stage_duration").val();
            var pro_level = $(".pro_level").val();

            if (!courseName == "") {
                if (status == "Completed") {
                    $('#subject_table_course').append('<tr class="sub_row" ><td class="">' + pro_level + '</td><td class="">' + University + '</td><td class="">' + courseName + '</td><td class="" >' + status + '</td><td class="">' + stage + '</td><td><a  class="delete close">X</a></td></tr>');
                }
                else {
                    $('#subject_table_course').append('<tr class="sub_row" ><td class="">' + pro_level + '</td><td class="">' + University + '</td><td class="">' + courseName + '</td><td class="" >' + status + '</td><td class="">' + stage + '</td><td><a  class="delete close">X</a></td></tr>');
                }
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


        $("#add_computerS").on('click', function () {
            var computerS = $("#courses_list").val();
            var exp = $("#Experience").val();
            var stage = $("#Stage").val();
            if (!computerS == "" && !stage == "" && !exp == "") {
                $('#computer_table1').append('<tr class="sub_row" ><td class="course">' + computerS + '</td><td class="status" >' + stage + '</td><td class="stage">' + exp + '</td><td><a  class="delete close">X</a></td></tr>');
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

        $("#add_work").on('click', function () {
            var Organization = $("#Organization").val();
            var period = $(".period").val();
            var Designation = $("#Designation").val();
            if (!Organization == "") {
                $('#work_ex').append('<tr class="sub_row" ><td>' + Organization + '</td><td>' + Designation + '</td><td>' + period + '</td><td><a  class="delete close">X</a></td></tr>');
            }
        });


    });//end of document ready

</script>
<script type="text/javascript">

    $(document).ready(function () {







        $(".stage").fadeOut();
        $(".status").on('change', function () {


            var val = $(this).val();

            if (val == "Following")
            {

                $(".stage").fadeIn();

            }
            else {
                $(".stage").fadeOut();

            }

        });

        $("#add_course").on('click', function () {
            var Organization = $("#Organization").val();
            var period = $(".period").val();
            var Designation = $("#Designation").val();
            if (!Organization == "") {
                $('#work_ex').append('<tr class="sub_row" ><td>' + Organization + '</td><td>' + Designation + '</td><td>' + period + '</td><td><a  class="delete close">X</a></td></tr>');
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

</script>




<script type='text/javascript' src='../js/bootstrap.js'></script>
<script type='text/javascript' src='../js/bootstrap.min.js'></script>
<script type='text/javascript' src='../js/bootstrap-multiselect.js'></script>

<script type='text/javascript' src='js/edit.js'></script>
<script type='text/javascript' src='js/upload.min.js'></script>
<script type='text/javascript' src='js/swfobject.js'></script>
<script type='text/javascript' src='js/myupload.js'></script>

</html>
