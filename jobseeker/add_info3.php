<?php
include_once "../config/header.php";


?>
  <body>
 

   <div class="container form_body">
   
   <div class="row">
<div class="step">Basic Information</div>	<div class="step">Academic Information</div><div class="step">Professional Information</div><div class="step">Upload your CV</div>
	</div>
	<h3 class="Head">Select your Interesting Companies</h3>
	<select id="Incname" name="Incname" class="multiselect text-uppercase" multiple="multiple" >
				
				<?php
				
			$data = mysql_query("SELECT * FROM org_info ORDER BY cname  ") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{
				$cname = $info['cname'];
				$id = $info['id'];
				?>
				<option   class='text-uppercase' value='<?php echo $id; ?>'><?php echo $cname ?></option>
				<?php
				
			
			}
				?>
				</select>
	<h3 class="Head">Select Companies you not Interesting</h3>
	<select id="NIncname" name="NIncname" class="multiselect text-uppercase" multiple="multiple" >
				
				<?php
				
			$data = mysql_query("SELECT * FROM org_info ORDER BY cname") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{
				$cname = $info['cname'];
				$id = $info['id'];
				
				?>
				<option class='text-uppercase' value='<?php echo $id; ?>'><?php echo $cname ?></option>
				<?php
				
			
			}
				?>
				</select>			
		
<div class="row">
<div class="col-md-6">
		
		  <h3 class="Head">Select the city you know about suburbs</h3>
	  
	  
	  
	  
	    <div class="table-responsive">
        <table class="table city table-bordered">
          <thead>
            <tr>
              <th>Cities</th>
            </tr>
          </thead>




          <tbody>
            <tr>
              <td name="Vavuniya" >Vavuniya</td>
			   <td name="Kegalle" >Kegalle</td>
            </tr>
            <tr>
              <td name="Trincomalee" >Trincomalee</td>
			              <td name="Kandy" >Kandy</td>
            </tr>
            <tr>
              <td name="Ratnapura"  >Ratnapura</td>
			          <td name="Kalutara" >Kalutara</td>
            </tr>
			<tr>
              <td name="Puttalam"  >Puttalam</td>
			                <td name="Jaffna" >Jaffna</td>
            </tr>
			<tr>
              <td name="Polonnaruwa"  >Polonnaruwa</td>
			         <td name="Hambantota" >Hambantota</td>
            </tr>
			<tr>
              <td name="NuwaraEliya"  >Nuwara Eliya</td>
			       <td name="Gampaha" >Gampaha</td>
            </tr>
			<tr>
              <td name="Mullaitivu" >Mullaitivu</td>
			             <td name="Galle" >Galle</td>
            </tr>
            <tr>
              <td  name="Monaragala" >Monaragala</td>
			        <td name="Colombo" >Colombo</td>
            </tr>
            <tr>
              <td  name="Matara" >Matara</td>
			    <td name="Batticaloa" >Batticaloa</td>
            </tr>
			<tr>
              <td  name="Matale" >Matale</td>
			             <td name="Badulla">Badulla</td>
            </tr>
			<tr>
              <td  name="Mannar">Mannar</td>
			           <td name="Anuradhapura" >Anuradhapura</td>
            </tr>
			<tr>
              <td name="Kurunegala" >Kurunegala</td>
			         <td name="Ampara" >Ampara</td>
            </tr>
			<tr>
              <td name="Killinochchi" >Killinochchi</td>
            </tr>
			
          </tbody>
        </table>
		</div>
		
		</div>

		<div class="col-md-5">

		 <h3 class="Head">Select Your Driving Licence Type</h3>
		
		<div class="table-responsive">
        <table class="table Driving table-bordered">
          <thead>
            <tr>
              <th>Driving Licence</th>
            </tr>
          </thead>



												

          <tbody>
            <tr>
              <td name="A1" >A1</td>
            </tr>
            <tr>
              <td name="A" >A</td>
            </tr>
            <tr>
              <td name="B1" >B1</td>
            </tr>
			<tr>
              <td name="B" >B</td>
            </tr>
			<tr>
              <td name="C1" >C1</td>
            </tr>
			<tr>
              <td name="C" >C</td>
            </tr>
			<tr>
              <td name="CE" >CE</td>
            </tr>
			<tr>
              <td name="D1" >D1</td>
            </tr>
            <tr>
              <td name="D" >D</td>
            </tr>
            <tr>
              <td name="DE" >DE</td>
            </tr>
			<tr>
              <td name="G1" >G1</td>
            </tr>
			<tr>
              <td name="G" >G</td>
            </tr>
			<tr>
              <td name="J" >J</td>
            </tr>
			
          </tbody>
        </table>
		</div>
		
		</div><!-- end of col-md-6-->  
</div>


		<div class="row">
		<div class="col-md-12">

		 <h3 class="Head">Add your Computer Skills</h3>
	<form class="form-inline" role="form">

   <div class="form-group">
 
    <select id="courses_list" name="years_ex" class='multiselect multiselect-all'  >
				<option value=''>Select Area</option>
		<?php
		$i ="";
		
				
					$data = mysql_query("SELECT * FROM courses LIMIT 0, 8") 
			or die(mysql_error()); 
			while($info = mysql_fetch_array( $data )) 
			{ 
				$link =$info['name'];
				$no_space_link = preg_replace('/\s+/', '', $link);
				
				$link_selector="#".$no_space_link;
			
				
					$subjectlist=$info['subjects'];
					$subjectsarray = explode(',',$subjectlist);
					?>
	<optgroup label="<?php echo $link ?>">
	<?php
					foreach($subjectsarray as $subject) {
					
					?>
	
				<option value='<?php echo $subject ?>'><?php echo $subject ?></option>
			
				</optgroup>
				
			
			
					
			<?php		
				
		}			
		}	
		?>		

			</select>
  </div>
  
    <div class="form-group">

    <select id="Stage" name="Stage" class="multiselect"  >
				<option value="">Select Stage</option>
				<option value='Beginner'>Beginner</option>
				<option value='Intermediate'>Intermediate</option>
				<option value='Expert'>Expert</option>
				</select>
  </div>
  
    <div class="form-group">

    <select id="Experience" name="Experience" class="multiselect"  >
				<option value="">Select Experience</option>
				<option value='1'>1+</option>
				<option value='2'>2+</option>
				<option value='3'>3+</option>
				<option value='4'>4+</option>
				<option value='5'>5+</option>
				<option value='6'>6+</option>
				<option value='7'>7+</option>
				<option value='10+'>10+</option>
				<option value='15+'>15+</option>
				<option value='20+'>20+</option>
				<option value='25+'>25+</option>
				<option value='30+'>30+</option>
				</select>
  </div>
 
  <a class="btn btn-default" id="add_computerS" role="button">Add</a>
</form>
				
		<table id="computer" class="table table-hover">
        <thead>
          <tr>
            
            <th>Computer Skill</th>
            <th>Stage</th>
			<th>Experience</th>
           
          </tr>
        </thead>
        <tbody id="computer_table">

        </tbody>
      </table>
		
		
		</div><!-- end of col-md-6-->  
		</div><!-- end of row-->  
		
	<div class="row">
	
	
		<div class="col-md-12">
		
		
      
	  <h3 class="Head">Add your Language Skills</h3>
	  
	    <div class="table-responsive">
        <table class="table lang table-bordered">
          <thead>
            <tr>
              <th>Language</th>
              <th>Speaking</th>
              <th>Reading</th>
              <th>Writing</th>
              <th>Listening</th>
              <th>Letter Writing</th>
              <th>Article Writing</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>English</th>
              <td name="ES"></td>
              <td name="ER"></td>
              <td name="EW"></td>
              <td name="EL" ></td>
              <td name="ELW"></td>
              <td name="EAW"></td>
            </tr>
            <tr>
              <th>Sinhala</th>
              <td name="SS" ></td>
              <td name="SR"></td>
              <td name="SW"></td>
              <td name="SL" ></td>
              <td name="SLW" ></td>
              <td name="SAW" ></td>
            </tr>
            <tr>
              <th>Tamil</th>
             <td name="TS" ></td>
              <td name="TR"></td>
              <td name="TW"></td>
              <td name="TL" ></td>
              <td name="TLW" ></td>
              <td name="TAW" ></td>
            </tr>
			<tr>
              <th>Arabic</th>
              <td name="AS" ></td>
              <td name="AR"></td>
              <td name="AW"></td>
              <td name="AL" ></td>
              <td name="ALW" ></td>
              <td name="AAW" ></td>
            </tr>
			<tr>
              <th>Hindi</th>
              <td name="HS" ></td>
              <td name="HR"></td>
              <td name="HW"></td>
              <td name="HL" ></td>
              <td name="HLW" ></td>
              <td name="HAW" ></td>
            </tr>
			<tr>
              <th>Urudu</th>
              <td name="US" ></td>
              <td name="UR"></td>
              <td name="UW"></td>
              <td name="UL" ></td>
              <td name="ULW" ></td>
              <td name="UW" ></td>
            </tr>
			<tr>
              <th>French</th>
              <td name="FS" ></td>
              <td name="FR"></td>
              <td name="FW"></td>
              <td name="FL" ></td>
              <td name="FLW" ></td>
              <td name="FAW" ></td>
            </tr>
          </tbody>
        </table>
		</div>
		
		
		
		
		
		</div><!-- end of col-md-6--> 
			<div id="error" class="alert alert-warning alert-dismissable">
 
  <strong>Warning!</strong>You must Select at least one language to proceed to the next Step.
</div>
		
				</div><!-- end of row--> 
		
		<button class="btn btn-primary btn-lg" id="next2" role="button">Next</button>
		
	
		
			
		

		
	 
		</div><!-- /.container -->
	
	
		<!-- Initialize multiselect  plugin: -->
		
		<script type="text/javascript">
		$(document).ready(function() {
		$('.multiselect').multiselect();
	
	
 
		
			
	
		});//end of document ready
		
		
		
		
		</script>
	<script type="text/javascript">
	
	$(document).ready(function() {
	
	$("#subject_table").on('click', '.delete', function() {
	
    $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
	});
	
	$("#computer_table").on('click', '.delete', function() {
	
    $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
	});
		
	});
	
	</script>
	<script type="text/javascript">
	
	$(document).ready(function() {
	$(".stage_input").fadeOut();
	$(".status").on('change',function() {
	
		var val = $(this).val();
		
		if (val=="Following")
		{
		
		$(".stage_input").fadeIn();
		
		}
		else{
		$(".stage_input").fadeOut();
		
		}
	
	});
	
	$("#add_course").on('click',function() {
		var courseName=$("#courseName").val();
		var status=$(".status").val();
		var University=$("#University").val();
		var stage=$("#stage_duration").val();
		var pro_level=$(".pro_level").val();
		
		if (!courseName==""){
			if (status=="Completed"){
			$('#subject_table').append('<tr class="sub_row" ><td class="university">'+pro_level+':'+University+'</td><td class="course">'+courseName+'</td><td class="status" >'+status+'</td><td class="stage"></td><td><a  class="delete close">�</a></td></tr>');
			}
			else{
		$('#subject_table').append('<tr class="sub_row" ><td class="university">'+pro_level+":"+University+'</td><td class="course">'+courseName+'</td><td class="status" >'+status+'</td><td class="stage">'+stage+'</td><td><a  class="delete close">�</a></td></tr>');
		}
		}
	});
	$("#add_computerS").on('click',function() {
		var computerS=$("#courses_list").val();
		var exp=$("#Experience").val();
		var stage=$("#Stage").val();
		if (!computerS=="" && !stage=="" && !exp==""){
		$('#computer_table').append('<tr class="sub_row" ><td class="course">'+computerS+'</td><td class="status" >'+stage+'</td><td class="stage">'+exp+'</td><td><a  class="delete close">�</a></td></tr>');
		}
	});
	
	
	$('td').click(function() {
	
	if(!$(this).hasClass("greenDiv")) {
			$(this).addClass("greenDiv");
		} else {
			$(this).removeClass("greenDiv");
		}
	
		
	});
	
	$(".body_location").hide();
	
	//$(".body_other_industry").hide();
	
	$('.location').click(function() {
	
	$(".body_location").toggle();
	
	
		
	});
	
	});
	
	</script>
	
<?php
include_once "../config/footer.php";

?>
    
