<?php

include_once "../config/header.php";



include_once "../config/db.class.php";
include 'header2.php';


$back_link ='org_info.php';

			if (isset($_GET['id'])){
			$id=$_GET['id'];
			
			}

			if (isset($_GET['approve'])){
			$approve=$_GET['approve'];
			if ($approve=="yes"){
			
			$query=("UPDATE org_info SET active='1' WHERE id='$id'");
			$data = mysql_query($query) 
			or die(mysql_error()); 
			}
			}
			if (isset($_GET['delete'])){
			$delete=$_GET['delete'];
			if ($delete=="yes"){
			
			$query=("DELETE FROM org_info WHERE id='$id'");
			
			$data = mysql_query($query) 
			or die(mysql_error());
			
			}
			}
			if (isset($_GET['id'])){
			$id=$_GET['id'];
			}
			
			
				
			
			$data = mysql_query("SELECT * FROM org_info WHERE id='$id'") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) {
				$basic_info= ($info['basic_info']);
				
					$basic_info_array= explode('|',$basic_info );
					if ( ! isset($basic_info)) {//removing the offset error
					$basic_info = null;
					}
					?>
					<div class="container ">
					<div class="row">
					<div class="col-md-12">
					<?php
					if (!isset($_GET['org'])){
					?>
					<?php		
					}
					?>
			
					
					<div class='row top_head'><div class='col-md-3 '><h2 class="" >Organization ID <strong>:<?php echo $id ?></strong></h2></div>
					
					<?php
					
					if (!isset($_GET['org'])){
					?>
				
					
					<?php
					if ($info['active']==1){
					?>
					
                                            <div class='col-md-3 h1_head_sub'><a href='org_view.php.php?delete=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-danger">Delete</a></div>
					<?php
					}
					else
					{
					?>
                                            <div class='col-md-3 h1_head_sub'><a href='org_view.php?approve=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-success">Approve</a></div>
                                            <div class='col-md-3 h1_head_sub'><a href='org_view.php?delete=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-danger">Delete</a></div>
					
		
					<?php
					}
					}
					?>
					</div>
					
					<div class="row">
					<div class="col-md-2">
					<?php
					if ($info['logo']==null){
						?>	
							<img src="../employers/logo/logo.png" alt="..." class="img-thumbnail" width="200px" height="200px">
                    					<input class="IMU" type="file" name="upload your logo"path="logo/" multi="false" startOn="auto" afterUpload="image" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" />
                    				<?php
                    				}
                    				else{
                    				?><img src="<?php echo "../employers/logo/".$info['logo']?>" alt="..." class="img-thumbnail" width="100px" height="100px">
                    		
                    				<?php
                    				}
					
					?>
					</div>
                                        
					<div class="row  col-md-9 extra_margin">
					
					
					<?php
					$cname= ($info['cname']);
                                        $phone = ($info['phone']);
                                        $web =($info['website']);
                                        $cperson = ($info['cperson']);
                                        $mobile = ($info['moblie']);
                                        $email = ($info['username']);
                                        $address= ($info['address']);
                                        $designation = ($info['designation']);
                                                }
			
					
					echo "<div class='col-md-3'>";
					echo "<p>Company Name </p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$cname."</p>";
					echo "</div>";
					
					echo "<div class='col-md-3'>";
					echo "<p>Phone</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$phone."</p>";
					echo "</div>";
                                        
                                        echo "<div class='col-md-3'>";
					echo "<p>Address</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<p>:".$address."</p>";
					echo "</div>";
                                        
                                        echo "<div class='col-md-3'>";
					echo "<p>Website</p>";
					echo "</div>";
					echo "<div class='col-md-3'>";
					echo "<a  target='_blank' href='http://$web' >:".$web."</a>";
					echo "</div>";
				
?>
                                        </div>

					
                                        </div>
                                        
                                        <br>
					<?php
					
			
					

					echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Contact Details</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";
					echo "<div class='row'>";
					echo "<div class='col-md-4'>";
					echo "<p>Contact Person</p>";
					echo "</div>";
					echo "<div class='col-md-8'>";
					echo "<p>:".$cperson."</p>";
					echo "</div>";
					echo "</div>";
						
					echo "<div class='row'>";
					echo "<div class='col-md-4'>";
					echo "<p>Designation</p>";
					echo "</div>";
					echo "<div class='col-md-8'>";
					echo "<p>:".$designation."</p>";
					echo "</div>";
					echo "</div>";
					
					echo "<div class='row'>";
					echo "<div class='col-md-4'>";
					echo "<p>Email</p>";
					echo "</div>";
					echo "<div class='col-md-8'>";
					echo "<a href='mailto:$email'>:".$email."</a>";
					echo "</div>";
					echo "</div>";
					
					echo "<div class='row'>";
					echo "<div class='col-md-4'>";
					echo "<p>Mobile</p>";
					echo "</div>";
					echo "<div class='col-md-8'>";
					echo "<p>:".$mobile."</p>";
					echo "</div>";
					echo "</div>";
					
					
					?>




					
					
			<div class="form-group">
				  <label for="comment">Comment:</label>
				  <textarea class="form-control status_text" rows="2" id=""><?php echo $info['cv_status']; ?></textarea>
				</div>


				<button id='approve_status' class=" btn btn-primary btn-lg" role="button">Add Status</button>
			



			
			</div>
					<script>
				$(document).ready(function() {

				$('#approve_status').click(function(){

					var status_cv = $('.status_text').val();
					

				$.ajax({
								type:"post",
								url:"appprove_status.php",
								data: {
									id: <?php echo $_GET['id']; ?> ,
									status:status_cv
									},
								success: function(data) {
								alert('Cv status updated' );
								//console.log(data); // "something"
								//$link="upload_info.php?id="+idofurl;
								//window.location.href = $link;
								}
							});
				});


				$('#approve').click(function(){

				$.ajax({
								type:"post",
								url:"approve.php",
								data: {
									id:$id
									},
								success: function(data) {
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