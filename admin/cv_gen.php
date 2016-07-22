<?php
if ($_GET['download']) {

    header("Location:" . $url2);
    $id = $_GET['id'];
    $url = 'cv.php?id=' . $id;
    header("Location:" . $url);
}




include_once "../config/header.php";



include_once "../config/db.class.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['app'])) {
    $approve = $_GET['app'];
    if ($approve == "approve") {

        $query = ("UPDATE user_info SET active='1' WHERE id='$id'");
        $data = mysql_query($query)
                or die(mysql_error());
         $select_vacant = "SELECT  * FROM seeker_vacant WHERE seeker_id = '$id'";
         $q = mysql_query($select_vacant) or  die(mysql_error());
         
         $r = mysql_fetch_array($q);
         $vacant = $r['vacant_id'];
                
         $quary = "SELECT org_info.*,vacancies.* FROM org_info INNER JOIN vacancies ON vacancies.Orgid = org_info.id WHERE vacancies.id = $vacant" ;
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
                        
      
            mail($email, $subject, $body, $headers);
                  
            header("Location:cv_gen.php?id=".$id."&org");
                
    }
}
if (isset($_GET['app'])) {
    $approve = $_GET['app'];
    if ($approve == "back") {

        $query = ("UPDATE user_info SET active='0' WHERE id='$id'");
        $data = mysql_query($query)
                or die(mysql_error());
         header("Location:cv_gen.php?id=".$id."&org");
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}




$data = mysql_query("SELECT * FROM user_info WHERE id='$id'")
        or die(mysql_error());
while ($info = mysql_fetch_array($data)) {
    $basic_info = ($info['basic_info']);
    $email = ($info['user_name']);
    $apply_positions = ($info['cat']);
    $cv = ($info['cv_info']);
    $pic = ($info['pic_info']);
    $ol = ($info['ol_info']);
    $al = ($info['al_info']);
    $pro = ($info['pro_info']);
    $lan = $info['lan_info'];
    $work = $info['wok_info'];
    $drv = $info['drive_info'];
    $city = $info['city_info'];
    $computer = $info['com_info'];
    $comment = ($info['cv_status']);
    $active = $info['active'];
    $time = $info['updateTime'];
    $job_type = $info['job_type'];

    $basic_info_array = explode('|', $basic_info);
    if (!isset($basic_info)) {//removing the offset error
        $basic_info = null;
    }
    ?>





    <br>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
    <?php
    if (!isset($_GET['org'])) {
        ?>
                
                    <a href="index.php?id=nactive   " type="button" class="btn btn-primary btn-lg">New Cvs</a>
                    <a href="index.php?id=active" type="button" class="btn btn-default btn-lg">Approved Cvs</a>
                        <?php
    }
    ?>

                <div class='row top_head'><div class='col-md-6 '><h4 class="" >CV ID <strong>:<?php echo $id."&nbsp&nbsp&nbspLast Update&nbsp&nbsp&nbsp:".$time ?></strong></h4></div>
                    <div class='col-md-3 h1_head_sub' style="left:40%">
                    </div>
                    
                    

    <?php
    if (isset($_GET['org'])) {
        ?>


                        <?php
                        if ($active == 1) {
                            ?>
			
                            <div class='col-md-3 h1_head_sub'><a href='cv_gen.php?app=back&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-success">Back</a><a href='' type="submit" id="approve" class="btn btn-danger" onclick="getConfirmation();" >Delete</a><a href='cv_gen.php?download=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-success">Download</a><a type="button" class="btn btn-info" onclick="head_toggle()">Head Hunter</a>
                    </div>
                            
                            <?php
                        } else {
                            ?>
                            <div class='col-md-3 h1_head_sub'><a href='cv_gen.php?app=approve&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-success">Approve</a><a href='' type="submit" id="approve" class="btn btn-danger" onclick="getConfirmation();" >Delete</a><a href='cv_gen.php?download=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-success">Download</a><a type="button" class="btn btn-default btn-lg" onclick="head_toggle()">Head Hunter</a>
                    </div>
                            


                            <?php
                        }
                    }
                    
                    
                    ?>
                </div>
                    
                    <div class="container" id="headhunter" style="display:none; " >
                   
                        <table class="table">
        <thead>
            <tr>
		<th>Job Id</th>
                <th>Job Category</th>
                <th>Position</th>
                <th>Company</th>

                
            </tr>
        </thead>
        <tbody>


            <?php
            include_once "../config/db.class.php";
			
			
			
			if (isset($_GET['id'])){
			$id=$_GET['id'];
			}
			
				if (isset($_GET['app'])){
				
				if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM vacancies WHERE id='$id' AND status='a' ");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				
				
				
				
				}
			
            $data = mysql_query("SELECT vacancies.*, org_info.* FROM org_info INNER JOIN vacancies ON org_info.id=vacancies.Orgid ORDER BY vacancies.updateTime DESC") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
                 echo "<tr id='".$info[0]."'>";
                 echo "<td>".$info[0]."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[2]."</td>";
		echo "<td>".$info['cname']."(ID:".$info['Orgid'].")</td>";
                
                
                            $id=$_GET['id'];
				
				
				if ($info[13]== 1)
				{
				?>
				<td> <a  type="submit" id="sendTo" class="btn btn-success">Send</a></td>
					<?php
				}
				else{
			?>
				<td> <a href='<?php echo $href ?>' type="submit"  id="sendTo" class="btn  btn-success">Send</a></td>
				 <?php
                 echo "</tr>";
				}
				
				}
            ?>
            
            
                        </tbody>
                        
                         </table>
                    </div>  


                <div class="row">
                    <div class="col-md-2" >
                    <?php
                    if (!$pic==""){
                    ?>
                    <div class="">
                        <img src="<?php echo "../jobseeker/files/" . $pic ?>" alt="..." class="img-thumbnail" width="100px" height="100px" max-height="100px">
                    </div>
                    
    <?php
    
                    }else{
                        ?>
                      <div class="">
                        <img src="<?php echo "../jobseeker/files/profile.png" ?>" alt="..." class="img-thumbnail" width="100px" height="100px" max-height="100px">
                    </div>
                   
                      <?php  
                    }
                    ?>
                    </div>
                    <br>
                    
                                        
                     <div class="col-md-9 extra_margin">
                         <?php
    

    echo "<div class='col-md-3'>";
    echo "<p>Positions</p>";
    echo "</div>";
    echo "<div class='col-md-9'>";
    echo "<p>:" . $apply_positions . "<button type='button btn-success' onClick='toggle()' style='position: relative;left:20%'>Edit</button></p>";
    echo "</div>";
      echo "<div class='col-md-3'>";
    echo "<p>Preferd Job Type</p>";
    echo "</div>";
    echo "<div class='col-md-9'>";
    echo "<p>:" .$job_type. "</p>";
    echo "</div>";
?>
                        
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
                                <button class="btn btn-lg" id="save_position" role="button">save</button>
                            </div>
    <?php

    echo "<div class='col-md-3'>";
    echo "<p>Preferred Job Area</p>";
    echo "</div>";
    echo "<div class='col-md-9'>";
    echo "<p>:" . $basic_info_array[6] . "</p>";
    echo "</div>";
    
    ?>
                         
                         <div  >
                         <div class="row">
                            
                             <div class="col-md-2" style="left:-20%;position:relative">
                         <?php

    if (isset($_GET['jobseek'])) {

        if (!$cv  == "") {

            if (!isset($_GET['jobseek'])) {
                ?>
                                    <div class='col-md-3 h1_head_sub'><a class="btn btn-success" href="<?php echo "../jobseeker/files/" . $cv  ?>" target="_blank">Original Cv</a></div><div class='col-md-9'></div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class='col-md-3 h1_head_sub'><a class="btn btn-success">Cv not found</a></div><div class='col-md-9'></div>
                                <?php
                            }
                        }

                        

                        if (isset($_GET['org'])) {

                            if (!$cv  == "") {

                                    ?>
                                    <div class='col-md-3 h1_head_sub'><a class="btn btn-success" href="<?php echo "../jobseeker/files/" . $cv  ?>" target="_blank">Original Cv</a></div><div class='col-md-9'></div>
                                    <?php
                              
                            } else {
                                ?>
                                <div class='col-md-3 h1_head_sub'><a class="btn btn-success">Cv not found</a></div><div class='col-md-9'></div>
                                <?php
                            }
                        }
                        ?>
                         </div>    
                         </div>   
                    </div>
                </div>
            </div>
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
                    <br>


                        <?php
                        echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Personal Information</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";
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
                        echo "<td class='seeker_email'><a href='mailto:$email'>" .$email. "</a></div></td>";
                        echo "</div>";
                        echo "</div>";
                        ?>

            <div class='row cv_head'><div class='col-md-4 h1_head'>O/L Information</div><div class='col-md-8 h1_head_sub'>Grade</div></div>

            <?php
            $string_ol = $ol;
            $array3_ol = explode(',', $string_ol);
            foreach ($array3_ol as $info3) {
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
                        echo "<div class='row'>";
                        echo "<div class='col-md-4'>";
                        echo "<p>" . $array_each_sub[0] . "</p>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                        echo "<p>:" . $array_each_sub[1] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            }
            ?>

            <div class='row cv_head'><div class='col-md-4 h1_head'>A/L Information</div><div class='col-md-8 h1_head_sub'>Grade</div></div>
            <?php
            $string_al = $al;
            $array3_al = explode(',', $string_al);
            foreach ($array3_al as $info3) {
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
                        echo "<div class='row'>";
                        echo "<div class='col-md-4'>";
                        echo "<p>" . $array_each_sub[0] . "</p>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                        echo "<p>:" . $array_each_sub[1] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            }


            echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Higher Education</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";
            $string_pro = $pro;
            $proinfo = explode(',', $string_pro);

            foreach ($proinfo as $sin_pro) {


                $array_each_sub = explode(':', $sin_pro);

                if (!isset($array_each_sub[0])) {
                    $array_each_sub[0] = null;
                }
                if (!isset($array_each_sub[1])) {
                    $array_each_sub[1] = null;
                }
                if (!isset($array_each_sub[2])) {
                    $array_each_sub[2] = null;
                }
                if (!isset($array_each_sub[3])) {
                    $array_each_sub[3] = null;
                }

                echo "<div class='row'>";
                echo "<div class='col-md-2'>";
                echo "<p>" . $array_each_sub[0] . "</p>";
                echo "</div>";
                echo "<div class='col-md-4'>";
                echo "<p>" . $array_each_sub[1] . "</p>";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<p>" . $array_each_sub[2] . "</p>";
                echo "</div>";

                echo "<div class='col-md-1'>";
                echo "<p>" . $array_each_sub[3] . "</p>";
                echo "</div>";


                if (isset($array_each_sub[4])) {
                    echo "<div class='col-md-1'>";

                    echo "<p>" . $array_each_sub[4] . "</p>";
                    echo "</div>";
                }

                echo "</div>";
            }


            echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Language Skills</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";
            $os = array();
            $string_lan = $lan;
            $laninfo = explode(',',  $string_lan);
            foreach ($laninfo as $sin_pro) {
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
                    <tbody>
                        <tr>
                            <th>English</th>
                            <td name="ES" <?php if (in_array("ES", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="ER" <?php if (in_array("ER", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="EW" <?php if (in_array("EW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="EL" <?php if (in_array("EL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="ELW" <?php if (in_array("ELW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="EAW" <?php if (in_array("EAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>


                        </tr>
                        <tr>
                            <th>Sinhala</th>
                            <td name="SS" <?php if (in_array("SS", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="SR" <?php if (in_array("SR", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="SW" <?php if (in_array("SW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="SL" <?php if (in_array("SL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="SLW" <?php if (in_array("SLW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="SAW" <?php if (in_array("SAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                        </tr>
                        <tr>
                            <th>Tamil</th>
                            <td name="TS" <?php if (in_array("TS", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="TR" <?php if (in_array("TR", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="TW" <?php if (in_array("TW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="TL" <?php if (in_array("TL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="TLW" <?php if (in_array("TLW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="TAW" <?php if (in_array("TAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                        </tr>
                        <tr>
                            <th>Arabic</th>
                            <td name="AS" <?php if (in_array("AS", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="AR" <?php if (in_array("AR", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="AW" <?php if (in_array("AW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="AL" <?php if (in_array("AL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="ALW" <?php if (in_array("ALW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="AAW" <?php if (in_array("AAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                        </tr>
                        <tr>
                            <th>Hindi</th>
                            <td name="HS" <?php if (in_array("HS", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="HR" <?php if (in_array("HR", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="HW" <?php if (in_array("HW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="HL" <?php if (in_array("HL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="HLW" <?php if (in_array("HLW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="HAW" <?php if (in_array("HAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                        </tr>
                        <tr>
                            <th>Urudu</th>
                            <td name="US" <?php if (in_array("US", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UR" <?php if (in_array("UR", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UW" <?php if (in_array("UW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UL" <?php if (in_array("UL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="ULW" <?php if (in_array("ULW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UAW" <?php if (in_array("UAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                        </tr>
                        <tr>
                            <th>French</th>
                            <td name="US" <?php if (in_array("US", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UR" <?php if (in_array("UR", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UW" <?php if (in_array("UW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UL" <?php if (in_array("UL", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="ULW" <?php if (in_array("ULW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                            <td name="UAW" <?php if (in_array("UAW", $os)) {
            echo "class='greenDiv'";
        } ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
            echo "<div class='row cv_head'><div class='col-md-4 h1_head'> Computer Skills</div><div class='col-md-4 h1_head_sub'>Grade</div><div class='col-md-4 h1_head_sub' >Years</div></div>";

            $string_com = $computer;
            $cominfo = explode(',', $string_com);
            //echo ($info['pro_info']);
            //print_r ($al_subs);
            foreach ( $cominfo as $sin_pro) {

                $skills = explode(':', $sin_pro);
                if (!isset($skills[0])) {
                    $skills[0] = null;
                }
                if (!isset($skills[1])) {
                    $skills[1] = null;
                }
                if (!isset($skills[2])) {
                    $skills[2] = null;
                }

                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>" . $skills[0] . "</p>";
                echo "</div>";
                echo "<div class='col-md-4'>";
                echo "<p>" . $skills[1] . "</p>";
                echo "</div>";
                echo "<div class='col-md-4'>";
                echo "<p>" . $skills[2] . "</p>";
                echo "</div>";
                echo "</div>";
            }

            echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Work  Experience</div><div class='col-md-4 h1_head_sub'>Position</div><div class='col-md-4 h1_head_sub' >Years</div></div>";
            $str_work = $work;
            $work_info = explode(',', $str_work);

            foreach ($work_info as $sin_pro) {
                $skills = explode(':', $sin_pro);
                if (!isset($skills[0])) {
                    $skills[0] = null;
                }
                if (!isset($skills[1])) {
                    $skills[1] = null;
                }
                if (!isset($skills[2])) {
                    $skills[2] = null;
                }
                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<p>" . $skills[0] . "</p>";
                echo "</div>";
                echo "<div class='col-md-4'>";
                echo "<p>" . $skills[1] . "</p>";
                echo "</div>";

                echo "<div class='col-md-4'>";
                echo "<p>" . $skills[2] . "</p>";
                echo "</div>";
                echo "</div>";
            }
            echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Driving Skills</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";

            $str_drv = $drv;
            $drv_info = explode(',', $str_drv);
            //echo ($info['pro_info']);
            //print_r ($al_subs);
            foreach ($drv_info as $sin_pro) {
                echo $sin_pro . "<br />";
            }

            echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Suburbs knowledge</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";
            $str_city = $city;
            $city_info = explode(',', $str_city);
            //echo ($info['pro_info']);
            //print_r ($al_subs);
            foreach ($city_info as $sin_pro) {
                echo $sin_pro . "<br />";
            }
            ?>
            
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control status_text" rows="40" id="status_text"><?php echo $comment?></textarea>
            </div>

            
                <button id='approve_status' class=" btn btn-primary btn-lg" role="button">Add Status</button>
    <?php

?>




    </div>
    <script type="text/javascript" >
         <!--
         
          $('td').click(function () {
            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }
        });
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
        
            function getConfirmation(){
               var retVal = confirm("Do you want to Delet this CV ?");
               if( retVal == true ){
               $.ajax({
                type: "post",
                url: "delete_cv.php",
                data: {
                    cvid: idofurl,
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv   id:"+idofurl+"deleted");
                            $link2 = "jobseeker_cv.php?id=nactive";
                            window.location.href = $link2;
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }
                    }
            });
            		    alert("Cv   id :"+idofurl+"    deleted");
                            $link2 = "jobseeker_cv.php?id=nactive";
                            window.location.href = $link2;
               
               return true;
               }
               else{
                  alert("User does not want to continue!");
                  $link2 = "cv_gen.php?id=" + idofurl+"&org=1";
                  window.location.href = $link2;
                  return false;
               }
            }
         //-->
     
         function head_toggle() {
            if (document.getElementById("headhunter").style.display == 'none') {
                document.getElementById("headhunter").style.display = '';
            } else {
                document.getElementById("headhunter").style.display = 'none';
            }
        }
    
        function toggle() {
            if (document.getElementById("hidethis").style.display == 'none') {
                document.getElementById("hidethis").style.display = '';
            } else {
                document.getElementById("hidethis").style.display = 'none';
            }
        }
        
        
        
        
        
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

        $(document).ready(function () {
            
          
        
      
            $('td a').click(function(){
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
                var jobid=($(this).closest('tr').attr('id'));
                
                $.ajax({
                type: "post",
                url: "head_hunt.php",
                data: {
                    cvid: idofurl,
                    jobid: jobid,
                    status:'h'
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv sent to headhunting job id:"+jobid);
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});
        
 
               
           
            
            $('#save_position').on("click", function () {
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



        var cat_total = "";
        var empty = "yes"; //This is where to check 

        var other_text = $('#other_txt').val();
        other_text_new = "Other-" + other_text;


        $("#jobseeker").find('td').each(function (i) {
            if ($(this).hasClass('greenDiv')) {
                var catgory = $(this).attr("name");
                cat_total = cat_total + catgory + ",";//add all the drive experience
                empty = "no";//user has selected the some catergory
            }
        });

        if (!other_text == "") {
            cat_total = cat_total + other_text_new;
            empty = "no";//user has selected the other catergory
        }


        if (empty == "no") {
            $("#error").hide();// hide the error msg
            $.ajax({
                type: "post",
                url: "update_cat.php",
                data: {
                    id: idofurl,
                    cat_info: cat_total
                },
                success: function (data) {
                    //console.log(data); // "something"
                    alert('your positions details updated ')
                    //console.log(data); // "something"
                    $link = "cv_gen.php?id=" + idofurl+"&org=1";
                    window.location.href = $link;
                }
            });
        }
        else {
            $("#error").show();// show the error msg

        }
    });//end of click


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
                        //$link="upload_info.php?id="+idofurl+"org=1";
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

</div>
</div>


<?php
include_once "../config/footer.php";
?>