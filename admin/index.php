<?php include 'header.php';



?>
	<table class="table">
      <thead>
        <tr>
   		  <th>ID</th>
          <th>Name</th>
          <th>Applying Position</th>
          <th>Preferred Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
		
		if (($_GET["id"])=="active"){
		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$data = mysqli_query("SELECT * FROM user_info WHERE active='1' ORDER BY id DESC ") //query the databse 
		or die(mysqli_error()); 
		}
		if (($_GET["id"])=="nactive"){

		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$data = mysqli_query("SELECT * FROM user_info WHERE active='0' ORDER BY id DESC ") //query the databse 
		or die(mysqli_error()); 
			
			}
			
			
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
					echo "<td>".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					echo "<td>".$apply_cat[0]."</td>";
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
					$href="index.php?id=".$id
					?>
					<td><a href="<?php echo $href ?>">View</a></td>
		        </tr>
				<?php
				}
				?>
          

      </tbody>
	</table>
	</div>