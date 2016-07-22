
<div class="container form_body">
   
	<div class="row" id="jobseeker">
	
			
		<div class="col-md-6">
		<div class="panel-group" id="accordion"><!--start of the according-->
			<?php
			$database = new Database();
			$database->query('SELECT * FROM applying_cat LIMIT 0, 11');
			$rows = $database->resultset();
				
			foreach($rows as $info) {
			$cat =$info['cat'];
			$areas =$info['areas'];
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
			?>
				
		
		<div class="panel panel-default" >
		<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $selector  ?>" >
		<h4 class="panel-title">
        <a >
		<span  name="" ><?php echo $cat ?></span>
        </a>
		</h4>
		</div>
		<div id="<?php echo $selector ?>" class="panel-collapse collapse.in">
		<div class="panel-body">
		<div class="table-responsive">
        <table class="table lang table-bordered">
      <?php
					$areas=$info['areas'];
					$areas_list = explode(',',$areas);
					
					foreach($areas_list as $area) {
					?>
				  
			  <tr>
              <td name="<?php echo $cat.'-'.$area ?>" ><?php echo $area ?></td>
			  </tr>
					
				
					
				   
					<?php
					}
					?>
			</table><!-- end of the  table-->		
			</div><!-- end of the table-->	
			

			</div><!-- end of the panel-body-->		
			</div><!-- end of the panel-->		
			</div><!-- end of the panel-default-->		
				<?php
				}
			?>
			</div><!-- end of the according-->		

		</div><!-- end of col-md-6--> 
		
		<div class="col-md-6">
		<div class="panel-group" id="accordion1"><!--start of the according-->
			<?php
			$database = new Database();
			$database->query('SELECT * FROM applying_cat LIMIT 11,30');
			$rows = $database->resultset();
				
			foreach($rows as $info) {
			$cat =$info['cat'];
			$areas =$info['areas'];
			$link = str_replace(' ', '_', $cat);
			$selector = str_replace('&', '', $link);
			?>
				
		
		<div class="panel panel-default" >
		<div class="panel-heading" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo $selector  ?>" >
		<h4 class="panel-title">
        <a >
		<span  name="" ><?php echo $cat ?></span>
        </a>
		</h4>
		</div>
		<div id="<?php echo $selector ?>" class="panel-collapse collapse.in">
		<div class="panel-body">
		<div class="table-responsive">
        <table class="table job table-bordered">
      <?php
					$areas=$info['areas'];
					$areas_list = explode(',',$areas);
					
					foreach($areas_list as $area) {
					?>
				  
			  <tr>
                    <td name="<?php echo $cat.'-'.$area ?>" ><?php echo $area ?></td>
			  </tr>
					<?php
					}
					?>
			</table><!-- end of the  table-->		
			</div><!-- end of the table-->	
			

			</div><!-- end of the panel-body-->		
			</div><!-- end of the panel-->		
			</div><!-- end of the panel-default-->		
				<?php
				}
			?>
			</div><!-- end of the according-->		

		</div><!-- end of col-md-6--> 
		
		</div><!-- end of row--> 
		
		
		
		<!-- error msg block-->
		<button class="btn btn-lg" id="next1" role="button">Next</button>
		<div id="error" class="alert alert-warning alert-dismissable">
		<strong>Warning!</strong> &nbsp; Please select at least one Category.
		</div>
		 
		</div><!-- /.container -->