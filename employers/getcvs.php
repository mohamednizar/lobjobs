<?php

include_once "../config/db.class.php"; 
       //get the databse config file
			$id = $_POST['id'];
			$today = date("Y-m-d");
			
			$count = mysqli_query("INSERT INTO logincount(org_id,date, cvsearch) VALUES ('$id','$today ',1) ON DUPLICATE KEY UPDATE cvsearch=cvsearch+1")
			                            or die(mysqli_error());


		
		
		$query_get_all="SELECT * FROM user_info WHERE active='1' and NOT find_in_set ('$id', cast(NIncname as char)) ORDER BY updateTime DESC";	//get catagory and id of the row
		$get_all_cat = mysqli_query($query_get_all) 
		or die(mysqli_error()); 
		
		$user_areas=$_POST['areas'];					//get the user selected data from the form
		$user_areas= explode(',',$user_areas);			//seperate the ctagories from the comma
		$result_select = count($user_areas);			//count the array 
		$result_select= $result_select -1;				//minus one to get the proper size
		
	
		$array_id[]="";									// define a array to use it later
		$array_locations[]="";			
		$array_pro[]="";	
		
		
		for ($y=0; $y<=$result_select; $y++)			// strat the user selected catagories
	{
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



	//############ retrieving user locations################// 
	$user_location=$_POST['location'];					//get the user selected data from the form
	$user_location= explode(',',$user_location);			//seperate the ctagories from the comma
	$result_location = count($user_location);			//count the array 
	$result_location= $result_location-1;				//minus one to get the proper size
		
	for ($c=0; $c<$result_location; $c++)			// strat the user selected catagories
	{
	while($row = mysqli_fetch_array($get_all_cat))				  		
		$rows[] = $row;
		foreach($rows as $row){ 
		$locations= explode('|',$row['basic_info']);	
		//echo $locations[6];
		$all_locations= explode(',',$locations[6] );				//get the job areas 
				$result_loc = count($all_locations);
				$result_loc= $result_loc -1;
				
				for ($l=0; $l<=$result_loc; $l++)
				{
					$all_locations[$l] = preg_replace('/\s+/', '', $all_locations[$l]); //remove the spaces 
					if ($user_location[$c]==$all_locations[$l]){						//match the job arreas with the user seletcted areas
		    $array_locations[]=$row['id'];	
				}
				}
				
								//save the id to the array
	  }	
	}//end of for loop

	//############ retrieving user professional quolifications################// 
	
	$user_pro=$_POST['pro'];
	$user_pro= explode(',',$user_pro);
	$user_pro_count = count($user_pro);			
	$user_pro_count= $user_pro_count-1;				

	for ($t=0; $t<$user_pro_count; $t++)			
	{	
	while($row = mysqli_fetch_array($get_all_cat))				  		
		$rows[] = $row;
		foreach($rows as $row){ 
		$quolifications= explode(',',$row['quolifications']);	
		$quolifications_count = (count($quolifications))-1;	
		for ($f=0;$f<$quolifications_count;$f++)
		{
		if ($user_pro[$t]==$quolifications[$f]){						
			$array_pro[]=$row['id'];	
			
		}	
		}			
	  }	
	}//end of for loop
	  
	  
	//## remove duplicate array elemnets 
	$array_pro = array_flip(array_flip($array_pro));
	$array_id = array_flip(array_flip($array_id));
	$array_locations = array_flip(array_flip($array_locations));

	
	$user_location_empty=$_POST['location'];
	$user_area_empty=$_POST['areas'];	
	$user_pro_empty=$_POST['pro'];
	
	$user_areas_b=false;
	$user_location_b=false;
	$user_pro_b=false;
	
	if (!$user_area_empty==""){
	$user_areas_b=true;
	}
	if (!$user_location_empty==""){
	$user_location_b=true;
	}
	if (!$user_pro_empty==""){
	$user_pro_b=true;
	}

	function viewresults($array)
	{
	
		
       
    foreach ($array as $row) {

		
		$qualified_ol=false;
		$qualified_al=false;
		$data = mysqli_query("SELECT * FROM user_info WHERE active='1' AND  id='$row' ORDER BY id DESC LIMIT 20") //query the databse 
		or die(mysqli_error()); 
			
			
			while ($info = mysqli_fetch_array($data)) {
                ?>
                <tr class="info">				
                    <?php
                    $string = ($info['cat']);
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


                    $basic_info = $info['basic_info'];
                    $basic_info = explode('|', $basic_info); //get each basic info

                    if (!isset($basic_info[0])) {//removing the offset error
                        $basic_info[0] = null;
                    }
                    if (!isset($basic_info[6])) {
                        $basic_info[6] = null;
                    }
					$area = explode(',', $basic_info[6]); //get each basic info
                    echo "<td><span class='glyphicon glyphicon-user iconfont'></span>" . $basic_info[0] . "</td>";
                    echo "<td><span class='glyphicon glyphicon-bullhorn iconfont'></span>" . $apply_cat[0] . "</td>";
                     	echo "<td style='
    width: 111px;'><span class='glyphicon glyphicon-send iconfont'></span>";
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";


                    if ($qualified_al && $qualified_ol) {
                        echo "<td>" . $new_al . "-" . $new_al_1 . "</td>";
                    } else {
                        echo "<td><span class='glyphicon glyphicon-ok iconfont'></span> O/L Qualified " . "<br/>" . "A/L Qualified" . "<br/>" . $new_al . "-" . $new_al_1 . "</td>";
                    }
                   $id = $info['id'];
                  
                   $orgid = $_POST['id'];
                    $href = "cv_gen.php?id=" . $id."&org=".$orgid."&cvview";
                    ?>
                    <td><a target="_blank" href="<?php echo $href ?>">View</a></td>
                </tr>
                <?php
            }
            
		
	
	}
	
	}
	//## selecttingwhich options have seledted
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
?>
   