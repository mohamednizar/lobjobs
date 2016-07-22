<?php
include_once "../config/header.php";

?>
  <body>
 

	<link type="text/css" rel="stylesheet" href="style.css" />
		<!--you can use this packed script and jQuery-->
		<!--<script type='text/javascript' src='js/jquery-1.7.min.js'></script>-->
		<!--<script type="text/javascript" src="js/upload.packed.js"></script>-->
		
		<!--or below scripts-->
	
		<script type='text/javascript' src='js/upload.min.js'></script>
		<script type='text/javascript' src='js/swfobject.js'></script>
		<script type='text/javascript' src='js/myupload.js'></script>
		
   <div class="container form_body">
   <div class="row">

	</div>
	<div class="row">
	
			
	
		  <h3 class="Head">Select your Applying Category </h3>
		<div class="col-md-6">
		
		
      

	  
	    <div class="table-responsive">
        <table class="table city table-bordered">
          




          <tbody>
            
			<?php
			$database = new Database();
			$database->query('SELECT * FROM applying_cat LIMIT 0, 7');
			$rows = $database->resultset();
				
				foreach($rows as $info) {
				$cat =$info['cat'];
				$areas =$info['areas'];
				?>
				<tr>
				<th  name="" ><?php echo $cat ?></th>
				</tr>
				<?php
					$areas=$info['areas'];
					$areas_list = explode(',',$areas);
					foreach($areas_list as $area) {
					?>
					<tr>
					<td name="" ><?php echo $area ?></td>
					</tr>
					
					<?php
					}
			
				}
			
			
			
			?>
          </tbody>
        </table>
		</div>
		
		
		
		
		
		</div><!-- end of col-md-6--> 
		
		
			<div class="col-md-6">
		
		<div class="table-responsive">
        <table class="table city table-bordered">
          <thead>
            <tr>
             
            </tr>
          </thead>
<tbody>
            
			<?php
			$database = new Database();
			$database->query('SELECT * FROM applying_cat LIMIT 7,9');
			$rows = $database->resultset();
				
				foreach($rows as $info) {
				$cat =$info['cat'];
				$areas =$info['areas'];
				?>
				<tr>
				<th  name="" ><?php echo $cat ?></th>
				</tr>
				<?php
					$areas=$info['areas'];
					$areas_list = explode(',',$areas);
					foreach($areas_list as $area) {
					?>
					<tr>
					<td name="" ><?php echo $area ?></td>
					</tr>
					
					<?php
					}
			
				}
			
			
			
			?>
          </tbody>
        </table>
		</div>
		
	
	
		</div><!-- end of col-md-6-->  
		
				
		<button class="btn btn-primary btn-lg" id="next3" role="button">Next</button>
		</div><!-- end of row--> 

		
		 
		</div><!-- /.container -->
	
	
		<!-- Initialize multiselect  plugin: -->
		
		<script type="text/javascript">
		$(document).ready(function() {
		$('.multiselect').multiselect();
	
		
		$('td').click(function() {
	
	if(!$(this).hasClass("greenDiv")) {
			$(this).addClass("greenDiv");
		} else {
			$(this).removeClass("greenDiv");
		}
	
		
	});
			
	
		});//end of document ready
		
		
		
		
		</script>
	
	
<?php
include_once "../config/footer.php";

?>
    
