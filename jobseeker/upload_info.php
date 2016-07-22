
<!DOCTYPE html>
<html>
    <head>
        <title>Lobjobs.lk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->


        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../js/html5shiv.js"></script>
          <script src="../js/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
        <!--multiselect plugin's CSS and JS: -->
        <script type="text/javascript" src="../js/bootstrap-multiselect.js"></script>

        <link rel="stylesheet" href="../css/bootstrap-multiselect.css" type="text/css"/>

        <script type="text/javascript" src="../js/submit.js"></script>
        <script type="text/javascript" src="../js/submit2.js"></script>
        <script type="text/javascript" src="../js/submit3.js"></script>
        <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
        <!--google fonts-->
        <link href='http://fonts.googleapis.com/css?family=Rufina' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic' rel='stylesheet' type='text/css'>

        <!-- plugin for date picker-->
        <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" href="../css/datepicker.css" type="text/css"/>
    </head>
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
<div class="step">Basic Information</div>	<div class="step">Academic Information</div><div class="step">Professional Information</div><div class="step">Upload your CV</div>
	</div>
	<div class="row">
	
	
		
		
	
		<div class="col-md-6">
		<h3 class="Head">Upload your Picture and CV</h3>
		<input class="IMU" type="file" path="files/" multi="true" startOn="auto" afterUpload="link" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" />

		</div><!-- end of col-md-6-->  
		<div class="col-md-5 how_to ">
		<img src="../images/cv_upload.png"  class="img-responsive how_to_image"/>
		</div>
			
		</div><!-- end of col-md-6-->  
		
		<br/>
		<br/>
		<br/>
	
		<button class="btn btn-primary btn-lg" id="finish" role="button">Submit Your Details</button>
	
		</div><!-- /.container -->
	
	
		<!-- Initialize multiselect  plugin: -->
		
		<script type="text/javascript">
		$(document).ready(function() {
		$('.multiselect').multiselect();
	
		
		
			
	
		});//end of document ready
		
		
		
		
		</script>
	<script type="text/javascript">
	
	$('#finish').on("click",function(){
	alert("your cv has been sent");
	$link="http://lobjobs.lk/job_seeker.php";
	window.location.href = $link;
	});
		

	
	</script>

	
	
<?php
include_once "../config/footer.php";

?>
    
