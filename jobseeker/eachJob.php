<?php
 
include_once "../config/header.php";
include_once "../config/db.class.php";


if (!isset($_SESSION['username'])) {
 
   redirect('signin.php?cat=org');
   


}

?>
<?php
?><div class="container">


          	 


<div class="vacancies">
		
      <?php

      $id= $_GET['id'];
      
			$data = mysqli_query("SELECT * FROM vacancies WHERE id ='$id' ") 
			or die(mysqli_error()); 
			while($info = mysqli_fetch_array( $data )) 
			{ 
			$jobid =$info['id'];
			$jobCat =$info['jobCat'];
			$jobPos =$info['jobPos'];
			$jobRes =$info['jobRes'];
			$jobQua =$info['jobQua'];
			$jobGen =$info['jobGen'];
			$jobSal =$info['jobSal'];
                        $salaryDis = $info['salaryDis'];
			$jobLoc =$info['jobLoc'];
                        $weekdays = $info['weekdays'];
			$jobInd =$info['jobInd'];
			$jobTime =$info['jobTime'];
                        
                        if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM vacancies WHERE id='$id'");
			
				$data = mysqli_query($query) 
				or die(mysqli_error()); 
				
				}
    
       $delet = "eachJob.php?app=delete&id=".$id;   
       $user = $_GET['seeker'];   
       $back = "login.php?id=".$user;                  


			?>
<div class="container">
<div class="row">
<br>
<h1 class="top_head col-md-3" style="height:100%;padding:12px;">Job Id: <?php echo $jobid; ?></h1> <h1 class="top_head col-md-9" style="height:100%;padding: 12px;">Category: <?php echo $jobCat ?></h1>
<div class="position_vacant col-md-3"> Position</div><div class="position_vacant col-md-9">: <?php  echo $jobPos; ?></div>
<div class='position_vacant col-md-3'> Location</div><div class="position_vacant col-md-9">: <?php  echo $jobLoc; ?></div>
<div class='position_vacant col-md-3'> Qualifications </div><div class="position_vacant col-md-9">	: <?php  echo $jobQua; ?></div>
<div class='position_vacant col-md-3'> Responsibilities</div><div class="position_vacant col-md-9"> 	: <?php  echo $jobRes; ?></div>
<div class='position_vacant col-md-3'> Gender 		</div><div class="position_vacant col-md-9">		: <?php  echo $jobGen; ?></div>
<div class='position_vacant col-md-3'> Salary 		</div><div class="position_vacant col-md-9">		: <?php  echo $jobSal; ?></div>
<div class='position_vacant col-md-3'> Salary Description 	</div><div class="position_vacant col-md-9">		: <?php  echo $salaryDis; ?></div>
<div class='position_vacant col-md-3'> Industry 	</div><div class="position_vacant col-md-9">		: <?php  echo $jobInd; ?></div>
<div class='position_vacant col-md-3'> Working Days 	</div><div class="position_vacant col-md-9">		: <?php  echo $workingDays; ?></div>
<div class='position_vacant col-md-3'> Suitable time for Interview </div><div class="position_vacant col-md-9">	: <?php  echo $intTime; ?></div>







      
    
<?php

		}
			?>
    
</div>
			 
		

</div>
</div>
<a  style="right:200px;"class='btn jobsubmit' href="<?php echo $back  ?>">Back</a>
    

