<?php
include_once "../config/header.php";
include_once "../config/db.class.php";


include 'header2.php';
?>

<style type="text/css" media="screen">

        .uploadifyQueue
{
    width: 450px;
}
.uploadifyQueueItem a
{
    font-size: 12px;
    text-decoration: none;
    color: #2779AA !important;
}
.uploadifyQueueItem a:hover
{
    text-decoration: underline;
}
.uploadifyQueueItem:first-child
{
    margin-top: 0px;
}
.uploadifyQueueItem
{
    margin-top: 5px;
    padding: 5px;
    border: 1px solid #D6D6D6;
    background-color: #ffffff;
}
.uploadedImage
{
    border: none;
    max-width: 438px;
}
.uploadedThumbnail
{
    border: none;
    max-width: 200px;
}
.afterUploadThumbnail
{
    display: block;
}
.cancel
{
    float: right;
    margin-left: 5px;
}
.uploadifyProgress
{
    background-color: #FFFFFF;
    border-color: #808080 #C5C5C5 #C5C5C5 #808080;
    border-style: solid;
    border-width: 1px;
    margin-top: 10px;
    width: 100%;
}
.uploadifyProgressBar
{
    background-color: #869FB7;
    height: 3px;
    width: 1px;
}
.uploadButton
{
    width: 110px;
    margin-top: 10px;
}
.button_cancel
{
    width: 10px;
    height: 10px;
    background: transparent url("close.png") no-repeat scroll 0 0;
    border: none;
    cursor: pointer;
    padding: 0px;
    margin-bottom: 0px !important;
    margin-top: 4px !important;
    line-height: 1 !important;
}
/*--- misc ---*/
.uploadifyQueue:after
{
    font-size: 0px;
    content: ".";
    display: block;
    height: 0px;
    visibility: hidden;
    clear: both;
}
.imu_info
{
    display: none;
    clear: both;
    border: 1px solid #c8c8c8;
    background-color: #e2e2e2;
    -moz-border-radius: 10px;
    -moz-box-shadow: 3px 3px 20px #e2e2e2;
    -webkit-border-radius: 10px;
    -webkit-box-shadow: 3px 3px 20px #e2e2e2;
    border-radius: 10px;
    box-shadow: 3px 3px 20px #e2e2e2;
    padding: 10px;
    margin-bottom: 15px;
    font-size: 12px;
    text-align: center;
    line-height: 150%;
}
.imu_loader
{
    display: none;
    margin-left: 15px;
}
.left {
    position:absolute;
    left:60%; top:110%;
    width: 250px;
}

.leftb {
    position:absolute;
    left:85%;
  
}
.right {
    position:absolute;
    right:75%; top:100%;
    width: 250px;
}          
        </style>
  <table class="table">
        <thead>
            <tr>
		<th>Id</th>
                <th>Name</th>
                <th>Applying Position</th>
                <th>Job Area</th>
                <th>Qualifications</th>
                <th>Info</th>
            </tr>
        </thead>
              <tbody id="search_body">
       
    
		<?php
		include_once "./config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		$id = $_GET['id'];
		$data = mysql_query("SELECT * FROM user_info WHERE 1  ORDER BY updateTime DESC ") //query the databse 
		or die(mysql_error()); 
		
			
			while($info = mysql_fetch_array( $data )) {
			?>
				    <tr class="info">				
			<?php
			
			$Incname = $info['Incname'];
			$cname = explode(',',$Incname );
			
			foreach ($cname as $c){
			
			if ($c===$id){
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
					echo "<td id='cvid".$info['id']."'>".$info['id']."</td>";
		
					echo "<td>".$basic_info[0]."</td>";
					echo "<td>".$apply_cat[0]."</td>";
					echo "<td>".$info['Incname ']."</td>";
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
					$href_delete="cv_gen.php?app=delete&id=" . $id . "&org=1";
					?>
					<td><a target="_blank" class="btn btn-success" href="<?php echo $href ?>">View</a></td>
					
		        </tr>
				<?php
			
			}
			}
			
				}
				?>
          

      </tbody>
	</table>
 