<?php
 
include_once "../config/header.php";
include_once "../config/db.class.php";


if (!isset($_SESSION['username'])) {
 
   redirect('signin.php?cat=org');
      
}

?>
<?php  $id= $_GET['id']; 

$link = 'submitjob.php?userid='.$id ;
?>
    


<div class="container">         	
<a class='btn jobsubmit' href='<?php echo $link ?>' >Submit your Requirement</a>
       
       
<div class="vacancies">
		
      <?php 
			$data = mysql_query("SELECT * FROM vacancies WHERE Orgid ='$id' ") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$jid =$info['id'];
			$jobCat =$info['jobCat'];
			$jobPos =$info['jobPos'];
			$jobRes =$info['jobRes'];
			$jobQua =$info['jobQua'];
			$jobGen =$info['jobGen'];
			$jobSal =$info['jobSal'];
			$jobLoc =$info['jobLoc'];
			$jobInd =$info['jobInd'];
			$jobAdress =$info['jobAdress'];
			$jobTime =$info['jobTime'];

                        
                        if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM vacancies WHERE id='$jid'");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
      $hreflink = "eachJob.php?id=".$jid;

			?>

<div class="vac_box">

<span class='position'><?php  echo $jobPos; ?></span>
<span class='location'><?php  echo $jobLoc; ?></span>


<a href="<?php echo $hreflink; ?>" title="">View</a>


</div>
<div class="table">
	<thead>
	
	</thead>
</div>
<?php

		}
	?>
    
</div>
</div>