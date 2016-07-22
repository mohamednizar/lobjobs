<?php include 'header.php'; 
include_once "./config/header.php";
include_once "./config/db.class.php";
?>
   <div class="container form_body jobseeker_box col-lg-12">
   	<div class="row" id="jobseeker">
			<div class="col-md-3">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 0 ,8") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =mysql_real_escape_string($info['cat']);
			$areas =  mysql_real_escape_string($info['areas']);
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
                        $id = $info['id'];
                        
			?>
				
		
                            <div class="small" ><a class="search text-danger" href="<?php echo "services.php?cat=$cat"?>"><?php echo $cat ?></a></div>
			<?php
				}
			?>
				

		</div><!-- end of col-md-6--> 
                <div class="col-md-3  " style="position:relative;right:5%">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 8 ,8") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =mysql_real_escape_string($info['cat']);
			$areas =  mysql_real_escape_string($info['areas']);
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
                        $id = $info['id'];
                      
			?>
				
		
                            <div class="small" ><a class="search text-danger" href="<?php echo "services.php?cat=$cat"?>"><?php echo $cat ?></a></div>
			<?php
				}
			?>
				

		</div><!-- end of col-md-6--> 
                <div class="col-md-3 " style="position:relative;right:8%">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 16 ,8") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =mysql_real_escape_string($info['cat']);
			$areas =  mysql_real_escape_string($info['areas']);
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
                        $id = $info['id'];
                      
			?>
				
		
                            <div class="small" ><a class="search text-danger" href="<?php echo "services.php?cat=$cat"?>"><?php echo $cat ?></a></div>
			<?php
				}
			?>
				

		</div><!-- end of col-md-6--> 
                <div class="col-md-3 " style="position:relative;right:15%">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 24 ,8") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =mysql_real_escape_string($info['cat']);
			$areas =$info['areas'];
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
                        $id = $info['id'];
			?>
				
		
		  <div class="small" ><a class="search text-danger" href="<?php echo "services.php?cat=$cat"?>"><?php echo $cat ?></a></div>
		

			
			<?php
				}
			?>
				

		</div><!-- end of col-md-6--> 
                <div class="col-md-2 " style="position:absolute;right:2%">
		
			<?php
			$data = mysql_query("SELECT * FROM applying_cat LIMIT 32 ,10") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$cat =mysql_real_escape_string($info['cat']);
			$areas =$info['areas'];
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
                        $id = $info['id'];
			?>
				
		
		  <div class="small" ><a class="search text-danger" href="<?php echo "services.php?cat=$cat"?>"><?php echo $cat ?></a></div>
		

			
			<?php
				}
			?>	
                    <div class="small" ><a class="search text-danger" href="<?php echo "services.php?cat=All Categories"?>">All Categories</a></div>
		</div><!-- end of col-md-6--> 
		
	

    </div>
	<br>
	

		
	
		</div><!-- end of row--> 
<br>
<div class='col-md-12 '>
 <div class="panel-heading h4 col-lg-12" style="background-color:#c12e2a;color:#ffffff"> <?php echo $_GET['cat']?></div>
<table class="table">
      <thead>
        <tr>
   
          <th>Job Id</th>
          <th>Position</th>
          <th>Job Type</th>
          <th>Company</th>
        </tr>
      </thead>
      <tbody>

   

		
      <?php 
      
      if($_GET['cat']){
          $cat = (($_GET['cat']));
			
			 $data = mysql_query("SELECT vacancies.id as jid,vacancies.*, org_info.* FROM org_info INNER JOIN vacancies ON org_info.id=vacancies.Orgid where jobCat LIKE '%$cat%' and  vacancies.active = 1 ORDER BY vacancies.updateTime DESC ") //query the databse 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$jobid =$info['jid'];
			$jobCat =$info['jobCat'];
			$jobtype = $info['jobtype'];
			$jobPos =$info['jobPos'];
			$jobRes =$info['jobRes'];
			$jobQua =$info['jobQua'];
			$jobGen =$info['jobGen'];
			$jobSal =$info['jobSal'];
			$jobLoc =$info['cname'];
			$jobInd =$info['jobInd'];
			$jobTime =$info['jobTime'];

                        
                        if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM org_info WHERE id='$id'");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				
				
                                
                                
                        
      $hreflink = "vacants.php?id=".$jobid;
       
      
			?>
      <td><?php echo $jobid ?></td>
      <td><?php echo $jobPos ?></td>
      <td><?php echo $jobtype ?></td>
      <td><?php echo $jobLoc ?></td>
      <td><a  target="_blank" href="<?php echo $hreflink; ?>">view</a></td>
</tbody>

  

<?php
                        }
                }if($_GET['cat']){
                    if($_GET['cat']=='All Categories')
                    {
                    $data = mysql_query("SELECT vacancies.id as jid,vacancies.*, org_info.* FROM org_info INNER JOIN vacancies ON org_info.id=vacancies.Orgid  where vacancies.active = 1 ORDER BY vacancies.updateTime DESC") //query the databse 
                   or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
			$jobid =$info['jid'];
			$jobCat =$info['jobCat'];
			$jobPos =$info['jobPos'];
			$jobtype = $info['jobtype'];
			$jobRes =$info['jobRes'];
			$jobQua =$info['jobQua'];
			$jobGen =$info['jobGen'];
			$jobSal =$info['jobSal'];
			$jobLoc =$info['cname'];
			$jobInd =$info['jobInd'];
			$jobTime =$info['jobTime'];

                        
                        if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM org_info WHERE id='$id'");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
                                
                                
                        
      $hreflink = "vacants.php?id=".$jobid;
       
      
			?>

        <td><?php echo $jobid ?></td>
      <td><?php echo $jobPos ?></td>
      <td><?php echo $jobtype ?></td>
      <td><?php echo $jobLoc ?></td>
      <td><a target="_blank" href="<?php echo $hreflink; ?>">view</a></td>
</tbody>
</div>

<?php
                        }
                        
                    
                }
                }
	?>
    
</table>
</div>
</div>
</div>
<?php
include 'footer.php';



