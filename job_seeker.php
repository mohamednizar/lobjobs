<?php include 'header.php'; ?>
		
		

   
  



	
		<div class="container">
          	<h3 class="org_h3">Choose your positions</h3>
	<span class="border"></span>

	<?php
include_once "config/db.class.php";

?>
  
		
   <div class="container form_body jobseeker_box">
   	<p class="job_subhead">Register with us and keep your CV up to date. as you may have a Best Opportunity to headhunt by top companies.<p>
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
				

		</div><!-- end of col-md-6--> 
		
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
				
			?>
				
<p class="cato"><a class="toggle">Others</a></p>
<form id="other" class="form-inline " role="form">
  <div  class="form-group col-md-10">
<input type="text" class="form-control " id="other_txt" name="" placeholder="Enter the position"/>

</div>
<a id="otherbtn" class="btn btn-default">Add</a>
</form>

<p id="other_text_out"></p>


		</div><!-- end of col-md-6--> 
		

    </div>
	
	<div id="error" class="alert alert-warning alert-dismissable">
		<strong>Warning!</strong> &nbsp; Please select at least one Category.
		</div>
	<!-- error msg block-->
       <button class="btn btn-lg" id="next1" role="button">Next</button>
		
	
		</div><!-- end of row--> 
		
		
		
		
		
		
		 
		</div><!-- /.container -->
	
	
		<!-- Initialize multiselect  plugin: -->
		
		<script type="text/javascript">
		$(document).ready(function() {
		$('#otherbtn').click(function() {
		
		var other_text=$('#other_txt').val();
		if (!other_text==""){
		$('#other_text_out').html(other_text);
		$("#other_text_out").show();
		
		}
		});
		$('td').click(function() {
		if(!$(this).hasClass("greenDiv")) {
			$(this).addClass("greenDiv");
		} else {
			$(this).removeClass("greenDiv");
		}
		});
		});//end of document ready

		$(function() {
			$(".details").hide();
			$("#other").hide();
			
			$(".toggle").click(function() {
			var that = $(this);
			that.parent().next().toggle("fast", function() {
        	//$("#other").show();
			
				});
			});
		});
			
 
		
		</script>

    </div><!-- /.container -->

	
<?php include 'footer.php'; ?>