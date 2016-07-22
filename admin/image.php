<?php

$url = 'http://lobjobs.lk/jobseeker/files/image.php';
$img = '/image.jpg';
file_put_contents($img, file_get_contents($url));


include_once "../config/db.class.php";
$id = $_GET['id'];
$data = mysql_query("SELECT * FROM user_info WHERE id='$id'")
        or die(mysql_error());
while ($info = mysql_fetch_array($data)) {
    $basic_info = ($info['basic_info']);
    $email = ($info['user_name']);
    $pic= $info['pic_info'];
    
   if($info['pic_info']==''){
			$id=$_GET['id'];
			
			?>
			<img src="../jobseeker/files/profile.png" alt="..." class="img-thumbnail" width="100px" height="100px">

			
			<?php
			
			}else{
			
			?>
			 <img src="<?php echo "../jobseeker/files/".$info['pic_info']?>"  class="img-thumbnail" width="100px" height="100px">
			
			<?php
			}
   
   
   
?>


<?php

}

   

   
	
 
    
