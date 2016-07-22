<!DOCTYPE html>
<html>
<?php

include_once "../config/header.php";

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

            
        </style>
  <body>
 

   <div class="container form_body">
   <div class="row">
  <div class="step">Basic Information</div>	<div class="step">Academic Information</div><div class="step">Professional Information</div><div class="step">Upload your CV</div>
	</div>
	<div class="row">
	
	<div class="col-md-12">
	
	<form action="" id="form" class="form-horizontal " role="form" name='add2'>
	
	<h3 class="Head" class="col-md-12"> Select your Job Type </h3>	
	                  <div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Job Type</label>
				<div class="col-sm-8">
				<select id="jobtype" name="jobtype" class="multiselect"  multiple="multiple" required>
				<option value='Trainees'>Trainees</option>
				<option value='Full Time'>Full Time</option>
	                	<option value='Part Time'>Part Time</option>
	                	<option value='Contract'>Contract</option>
	                	<option value='Temporary'>Temporary</option>
	                	<option value='Internship'>Internship</option>
	                	<option value='Foreign'>Foreign</option>
	                	<option value='Others'>Others</option>Trainees
				</select>
				</div>
				</div>
	<h3 class="Head" class="col-md-12"> Add your Personal Details </h3>
	
			
			
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="firstname" id="name" placeholder="Full Name" required>
			</div>
			</div>
			
			
			
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Date Of birth</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="DOB" name="year" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" placeholder="Date Of birth" required/>
				</div>
				</div>
			
			
			
			
			
		
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Sex</label>
				<div class="col-sm-8">
				<select id="sex" name="sex" class="multiselect"  required>
				<option value="">Select</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				</select>
				</div>
			  </div>
			  
			  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Married Status</label>
				<div class="col-sm-8">
				<select id="mstatus" name="mstatus" class="multiselect" required>
				<option value="">Select</option>
				<option value="Single">Single</option>
				<option value="Married">Married</option>
				</select>
				</div>
			  </div>
				
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Nationality</label>
				<div class="col-sm-8">
				<select id="nationality" name="nationality" class="multiselect"    required>
				<option value="">Select</option>
				<option value="Srilankan">Sri lankan</option>
				<option value="other">Others</option>
				</select>
				</div>
			  </div>
			  
			  
				
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Preferred Salary</label>
				<div class="col-sm-8">
			<select id="pliving" name="pliving" class="multiselect" required >
				<option value="">Select</option>
				<option value="10000-15000">10,000 - 15,000</option>
				<option value="15000-20000">15,000 - 20,000</option>
				<option value="20000-25000">20,000 - 25,000</option>
				<option value="25000-30000">25,000 - 30,000</option>
				<option value="30000-35000">30,000 - 35,000</option>
				<option value="35000-40000">35,000 - 40,000</option>
				<option value="40000-45000">40,000 - 45,000</option>
				<option value="45000-50000">45,000 - 50,000</option>
				<option value="50000-55000">50,000 - 55,000</option>
				<option value="55000-60000">55,000 - 60,000</option>
				<option value="60000-70000">60,000 - 70,000</option>
				<option value="70000-80000">70,000 - 80,000</option>
				<option value="80000-90000">80,000 - 90,000</option>
				<option value="90000-100000">90,000 - 100,000</option>
				<option value="100000-Above">100,000 Above</option>
				</select>
				</div>
			  </div>
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Preferred Job Areas</label>
				<div class="col-sm-8">
				<select id="cliving" name="cliving" class="multiselect" multiple="multiple"  >
				<option value="Islandwide">Islandwide</option>
				<option value="Vavuniya">Vavuniya</option>
				<option value="Trincomalee">Trincomalee</option>
				<option value="Ratnapura">Ratnapura</option>
				<option value="Puttalam">Puttalam</option>
				<option value="Polonnaruwa">Polonnaruwa</option>
				<option value="NuwaraEliya">Nuwara Eliya</option>
				<option value="Mullaitivu">Mullaitivu</option>
				<option value="Monaragala">Monaragala</option>
				<option value="Matara">Matara</option>
				<option value="Matale">Matale</option>
				<option value="Mannar">Mannar</option>
				<option value="Kurunegala">Kurunegala</option>
				<option value="Killinochchi">Killinochchi</option>
				<option value="Kegalle">Kegalle</option>
				<option value="Kandy">Kandy</option>
				<option value="Kalutara">Kalutara</option>
				<option value="Jaffna">Jaffna</option>
				<option value="Hambantota">Hambantota</option>
				<option value="Gampaha">Gampaha</option>
				<option value="Galle">Galle</option>
				<option value="Colombo">Colombo</option>
				<option value="Batticaloa">Batticaloa</option>
				<option value="Badulla">Badulla</option>
				<option value="Anuradhapura">Anuradhapura</option>
				<option value="Ampara">Ampara</option>
				</select>
				</div>
			  </div>
			
					
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Contact No</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" required >
				</div>
				</div>
  
				<div class="form-group more_space">
				<label for="inputEmail3" class="col-sm-4 control-label">Address</label>
				<div class="col-sm-8">
				<input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
				</div>
				</div>
				
				
				<?php 
$dateincluded = "1988/08/11";
?>
				<input type="hidden" name="dateincluded" id="dateincluded" value="<?php echo $dateincluded; ?>">
				
	</form>
			<p id="test"></p>
				<p id="test2"></p>
				<p id="test3"></p>
	
  
			  
			  
			<div class="row">
	
	
		
		
	
		<div class="col-md-6">
		<h3 class="Head">Upload your Picture and CV</h3>
                    <input class="IMU" type="file" path="files/" multi="true" startOn="auto" afterUpload="link" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" />

		</div><!-- end of col-md-6-->  
		<div class="col-md-5 how_to ">
		<img src="../images/cv_upload1.png"  class="img-responsive how_to_image"/>
		</div>
			
		</div><!-- end of col-md-6-->  
			
		
			

		</div><!-- end of col-md-12-->  
</div> <!-- end of row-->


		
		

		
		<button class="btn btn-primary btn-lg" id="next" role="button">Submit</button>
		</div><!-- end of row-->  
		</div><!-- /.container -->
	
	
		<!-- Initialize multiselect  plugin: -->
		
		<script type="text/javascript">
		$(document).ready(function() {
		
		
		
		$('#DOB').datepicker();
		$('.multiselect').multiselect();
		});
		
		//get subject on click
		$(document).ready(function() {
		$(".other_sub").fadeOut();
		
		$(".other_sub_al").fadeOut();
		var other_ol = false;	
		var other_al = false;	
		$(function() {
			
			$('#subject_ol').on('change', function() {
			var value_ol= this.value;
			if (value_ol=="Others"){
			$(".other_sub").fadeIn();
			other_ol=true;
			}
			else{
			$(".other_sub").fadeOut();
			other_ol=false;
			}
	
		});
	});
			
	$(function() {
			$('#subjects_al').on('change', function() {
			var value= this.value;
			if (value=="Others"){
			$(".other_sub_al").fadeIn();
			other_al=true;
			}
			else{
			$(".other_sub_al").fadeOut();
			other_al=false;
			}
	
		});
	});
		
		
		$(function() {
	
			$("#add_ol").click(function() {
			var subjects=$("#subject_ol").val();
			var grade=$("#ol_grade").val();
			
			if (!grade=="0"){
			var other_sub_ol=$("#other_sub_ol").val();
			if (other_ol){
			$('#subject_table').append('<tr class="sub_row" ><td class="ol_result">'+other_sub_ol+'</td><td class="ol_result">'+grade+'</td><td><a  class="delete close">�</a></td></tr>');
			}
			else{
			$('#subject_table').append('<tr class="sub_row" ><td class="ol_result">'+subjects+'</td><td class="ol_result">'+grade+'</td><td><a  class="delete close">�</a></td></tr>');
			}
			
			}
			});
			
			});
	
		$(function() {
	
			$("#add_al").click(function() {
			var subjects_al=$("#subjects_al").val();
			var grade_al=$("#grade_al").val();
				if (!grade_al=="0"){
			var other_sub_al_input=$("#other_sub_al_input").val();
			if (other_al){
			$('#subject_table_al').append('<tr class="sub_row_al" ><td class="al_result">'+other_sub_al_input+'</td><td class="al_result">'+grade_al+'</td><td><a  class="delete close">�</a></td></tr>');
			}
			else{
			$('#subject_table_al').append('<tr class="sub_row_al" ><td class="al_result">'+subjects_al+'</td><td class="al_result">'+grade_al+'</td><td><a  class="delete close">�</a></td></tr>');
			}
			
			}

			
			});
			
			});
	
		});//end of document ready
		
		
		
		
		</script>
		<script type="text/javascript">
	
	$(document).ready(function() {
	$("#subject_table").on('click', '.delete', function() {
    $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
	});
		$("#subject_table_al").on('click', '.delete', function() {
    $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
	});	
	});
	
		</script>
		 <script >
    		jQuery('#form').validate({
            rules : {
               
                jobtype :{
                	required:true
                }
            }
            });
    
    
    </script>
	
		<script type='text/javascript' src='js/upload.min.js'></script>
		<script type='text/javascript' src='js/swfobject.js'></script>
		<script type='text/javascript' src='js/myupload.js'></script>
<?php
include_once "../config/footer.php";

?>
    
