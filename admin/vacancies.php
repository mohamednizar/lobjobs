<?php include 'header.php';?>
    <table class="table">
        <thead>
            <tr>
		<th>Job Id</th>
		<th class='col-md-2'>Job Type</th>
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
				
				$query=("DELETE FROM vacancies WHERE id='$id'");
			
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				}
				
				if (($_GET['app'])=="approve"){
				
				$query=("UPDATE vacancies SET active='1' WHERE id='$id'");
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				}
				
				if (($_GET['app'])=="refresh"){
				
				$query=("UPDATE vacancies SET updateTime=now() WHERE id='$id'");
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				}
				
				if (($_GET['app'])=="dis"){
				$query=("UPDATE vacancies SET active='0' WHERE id='$id'");
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				}
				
				if (($_GET['app'])=="send"){
				
				$query_get_all="SELECT * FROM user_info";	//get catagory and id of the row
				$get_all_cat = mysqli_query($query_get_all) 
				or die(mysqli_error()); 
						
				$query=("UPDATE vacancies SET email_status='1' WHERE id='$id'");
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				$query2  = ("SELECT * FROM vacancies WHERE id = '$id'");
				$data2 = mysqli_query($query2) 
				or die(mysqli_error()); 
				  while($info2 = mysqli_fetch_array( $data2 )) 
					{
			        $cat = $info2['jobCat'];
			        $user_areas = explode('/',$cat);
			        //echo $c;
				$result_select = count($user_areas);			//count the array 
				$result_select= $result_select -1;	
				
		
			        for ($y=0; $y<=$result_select; $y++)			// strat the user selected catagories
	{
	//echo $user_areas;
		$user_areas[$y] = preg_replace('/\s+/', '', $user_areas[$y]); // remove the spaces of the user selected to make the string easier to search  
		while($row = mysqli_fetch_array($get_all_cat))				  		
		$rows[] = $row;
		
		foreach($rows as $row){ 
				
				$all_areas= explode(',',$row['cat'] );				//get the job areas 
				$result = count($all_areas);
				$result= $result -2;
				for ($x=0; $x<=$result; $x++)
				{
					$all_areas[$x] = preg_replace('/\s+/', '', $all_areas[$x]); //remove the spaces 
					if ($user_areas[$y]==$all_areas[$x]){						//match the job arreas with the user seletcted areas
					$array_id[]=$row['id'];						//save the id to the array
					
					}
				}
		}

	}
	//## remove duplicate array elemnets 
	$array_id = array_flip(array_flip($array_id));
	
	//$user_area_empty=$info2['jobCat'];	
	
	$user_areas_b=true;
	
	
	function viewresults($array)
	{
    foreach ($array as $row) {
		$qualified_ol=false;
		$qualified_al=false;
		$data = mysqli_query("SELECT * FROM user_info WHERE  id='$row' ORDER BY id DESC ") //query the databse 
		or die(mysqli_error()); 
			while ($info = mysqli_fetch_array($data)) {
				//echo $info['user_name'];
                                    $email = $info['user_name'];
                      		    $emails = "";
                      	            $id = $_GET['id'];
                                    //$emails = $emails.','.$email;
                                    //echo $email;
			            $subject = "New Vacancy";
			            $from = 'vacancies@lobjobs.lk';
			            $body = 'Hi, <br/> <br/>We Have a Vacancy which is match with your job catogery ' . $vacant . ' <br>View your vacancy:http://lobjobs.lk/vacants.php?id='.$id.'<br>';
			            $headers = "From: " . strip_tags($from) . "\r\n";
			            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
			            $headers .= "MIME-Version: 1.0\r\n";
			            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			             mail($email, $subject, $body, $headers);
			            // mail('izzath.sh@gmail.com', $subject, $body.'send to :'.$email, $headers);
				   //  mail('jobs@lobjobs.lk', $subject, $body.'send to :'.$email, $headers);
			
                ?>
                <tr class="info">				
                    <?php
                    $string = ($info['cat']);
                    $emails = array();
                    $apply_cat = explode(',', $string);
                    $pro_qualification = ($info['pro_info']);
                    $pro_qualification1 = explode(',', $pro_qualification);
                    $pro_qual = explode(':', $pro_qualification1[0]);

                    if (!isset($pro_qual[2])) {
                        $pro_qual[2] = null;
                    }
                    if (!isset($pro_qual[3])) {
                        $pro_qual[3] = null;
                    }
                    $new_al = $pro_qual[2];
                    $new_al_1 = $pro_qual[3]; //remving the offset error


                    $ol_info = ($info['ol_info']);
                    $al_info = ($info['al_info']);
                    $empty_ol = strlen($ol_info);
                    $empty_al = strlen($al_info);

                    if ($empty_ol < 10) {
                        $qualified_ol = true;
                    } else {
                        $qualified_ol = false;
                    }
                    if ($empty_al < 10) {
                        $qualified_al = true;
                    } else {
                        $qualified_al = false;
                    }
                    
			           //  mail('nizarucsc@gmail.com', $subject.'sent to:'.$email, $body, $headers);
			            
			           // echo $emails;
                    $basic_info = $info['basic_info'];
                    $basic_info = explode('|', $basic_info); //get each basic info

                    if (!isset($basic_info[0])) {//removing the offset error
                        $basic_info[0] = null;
                    }
                    if (!isset($basic_info[6])) {
                        $basic_info[6] = null;
                    }
		    $area = explode(',', $basic_info[6]); //get each basic info
		   // $uemail= $userinfo['user_name'];
				//echo $uemail;
				
			           
            }
            
            
            ?>
        
		
	<?php
	}
	
	}
	
	switch(true)
    {
		case ($user_areas_b and $user_location_b and $user_pro_b):
		$merge = array_intersect($array_locations,$array_id);
		$result= array_intersect($merge,$array_pro);
		viewresults($result);
        break;
		
		case ($user_areas_b and $user_location_b):
    	
		$result= array_intersect($array_locations,$array_id);
		viewresults($result);
        break;
		
		case ($user_areas_b and $user_pro_b):
		$result= array_intersect($array_pro,$array_id);
		viewresults($result);
		
        break;
		case ($user_location_b and $user_pro_b):
   
		$result= array_intersect($array_locations,$array_pro);
		viewresults($result);
		
        break;
		case ($user_areas_b):
   
		viewresults($array_id);
        break;
		case ($user_location_b):
    	
		viewresults($array_locations);
        break;
		case ($user_pro_b):
	
		viewresults($array_pro);
        break;
		default:
        echo 'Sorry Please Select some options to do the Search';
        break;
    }
	
	
	
			      
			        $user = mysqli_query("SELECT user_info.*  FROM  user_info  WHERE user_info.cat like '%$cat%' ")
      or die(mysqli_error()); 
   
      while($userinfo = mysqli_fetch_array( $user )) 
			{
				$uemail= $userinfo['user_name'];
				//echo $uemail;
			            $subject = "New Vacancy";
			            $from = 'jobs@lobjobs.lk';
			            $body = 'Hi, <br/> <br/>We Have a Vacancy which is match with your job catogery ' . $vacant . ' <br>View your vacancy:http://lobjobs.lk/vacants.php?id='.$id.'<br>';
			            $headers = "From: " . strip_tags($from) . "\r\n";
			            $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
			            $headers .= "MIME-Version: 1.0\r\n";
			            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			         
			
			 	echo $uemail;
				}
				//mail($uemail, $subject, $body, $headers);
				
				}
				
			}
				 }
				
				
			
			
			 	   
				 
							
							
			
            $data = mysqli_query("SELECT vacancies.*, org_info.* FROM org_info INNER JOIN vacancies ON org_info.id=vacancies.Orgid ORDER BY vacancies.updateTime DESC") //query the databse 
                    or die(mysqli_error());

            while ($info = mysqli_fetch_array($data)) {
                 echo "<tr>";
                 echo "<td>".$info[0]."</td>";
                  echo "<td>".$info['jobtype']."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[2]."</td>";
		echo "<td>".$info['cname']."(ID:".$info['Orgid'].")</td>";

   			 
                
                $id=$_GET['id'];
				$href='vacancies.php?app=approve&id='.$info[0];
				$href_del='vacancies.php?app=delete&id='.$info[0];
				$href_dis='vacancies.php?app=dis&id='.$info[0];
				$href_refresh='vacancies.php?app=refresh&id='.$info[0];
                                $href_view = 'eachJob.php?id='.$info[0];
                                $sendemail = 'vacancies.php?app=send&id='.$info[0];
                                
				
				if ($info[13]== 1)
				{
				
				?>
				<td> <a  type="submit" id="approve" class="btn btn-success">Approved</a></td>
				<td><a  href="<?php echo $href_refresh ?>" type="submit" id="refresh" class="btn btn-primary">Refesh</a>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-danger">Stop</a></td>
					<td> <a href='<?php echo $href_del ?>' type="submit" id="disapprove" class="btn btn-danger">delete</a></td>
                                        <td><a target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a>
                                      	
                                      	<?php
                                      	if($info['email_status']==0){
                                      	?>
                                      	<td><a href="<?php echo $sendemail ?>" type="submit" id="disapprove" class="btn btn-primary">Send</a></td>
                                      	
                                      	<?php
                                      	}else{
                                      	?>
                                      	<td><a href="" type="submit" id="disapprove" class="btn btn-success">Sent</a></td>
<?php
                                      	}
                                      	?>
                                        </td>
				<?php
				
				}
				else{
			?>
				<td> <a href='<?php echo $href ?>' type="submit" id="approve" class="btn btn-success">Approve</a></td>
				<td> <a href='<?php echo $href_del ?>' type="submit" id="disapprove" class="btn btn-danger">delete</a></td>
                <?php
                 echo "</tr>";
				}
				
				
				}
            ?>
            
        </tbody>
    </table>

</div>