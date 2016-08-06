<?php
include_once "../config/header.php";
include_once "../config/db.class.php";


?>

<?php
 $userid = $_GET['userid']; 
 $user = "jobsubmit.php?id=".$userid;

?>

<div class="container">

    <span class="border"></span>

    <div class="container form_body ">

        <div class="row" id='jobsubmit_page'>
            <div class="col-md-8">	
                <h2>Submit your ads free</h2>	
                <h3>Job seeker Requirement</h3>

                <select class="selectpicker ">

                    <?php
                    $data = mysqli_query("SELECT * FROM applying_cat")
                            or die(mysqli_error());
                    while ($info = mysqli_fetch_array($data)) {

                        $areas = $info['areas'];
                        $link = str_replace(' ', '_', $cat);
                        $selector = str_replace('&', '', $link);
                        ?>

                        <optgroup label="<?php echo $cat ?>">



                            <?php
                            $areas = $info['cat'];
                            $areas_list = explode(',', $areas);

                            foreach ($areas_list as $area) {
                                ?>
                                <option value='<?php echo $area ?>'><?php echo $area ?></option>

                                <?php
                            }
                            ?>



                            <?php
                        }
                        ?>
                </select>
                <br><br>


                <form class="form" id="org" role="form" action="jobsubmit.php">
                    <div class="form-group">
                        <label class="sr-only" for="Position">Position </label>
                        <input type="text" class="form-control" name="Position" id="Position" placeholder="Position" required="true">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Responsibilities">Responsibilities </label>
                        <textarea type="text" class="form-control" name="Resp" id="Resp" placeholder="Responsibilities" required="true"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Qualification">Preferred Qualification </label>
                        <textarea type="text" class="form-control" name="Quali" id="Quali" placeholder="Preferred Qualification " required="true"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="gender" class="col-md-2 control-label">Gender</label>
                        <div class="col-md-4">
                            <select id="Gender" name="Gender" class="multiselect" >
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="both">Both</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="SalaryPackage" class="col-md-2 control-label">Salary Package</label>
                        <div class="col-md-4">
                            <select id="Salary" name="Salary" class="multiselect" >
                                <option value="">Select</option>
                                <option value="10,000-20,000">10,000 - 15,000</option>
                                <option value="15,000-20,000">15,000 - 20,000</option>
                                <option value="20,000-25,000">20,000 - 25,000</option>
                                <option value="25,000-30,000">25,000 - 30,000</option>
                                <option value="30,000-35,000">30,000 - 35,000</option>
                                <option value="35,000-40,000">35,000 - 40,000</option>
                                <option value="40,000-45,000">40,000 - 45,000</option>
                                <option value="45,000-50,000">45,000 - 50,000</option>
                                <option value="50,000-55,000">50,000 - 55,000</option>
                                <option value="55,000-60,000">55,000 - 60,000</option>
                                <option value="60,000-70,000">60,000 - 70,000</option>
                                <option value="70,000-80,000">70,000 - 80,000</option>
                                <option value="80,000-90,000">80,000 - 90,000</option>
                                <option value="90,000-10,0000">90,000 - 100,000</option>
                                <option value="100,000-Above">100,000 Above</option>
                            </select>
                        </div>
                    </div>
                   <br>
                   <br><br>
                    <div class="form-group">
                        <div class="form-group">
                        <label class="sr-only" for="Qualification">Salary Description</label>
                        <textarea type="text" class="form-control" name="salaryDis" id="salaryDis" placeholder="Salary Discrition" required="true"></textarea>
                    </div>
 
                    </div>

                    <br>


                    <h3>Company Details</h3>
                    <div class="form-group">
                        <label class="sr-only" for="location">Office location City </label>
                        <textarea type="text" class="form-control" name="location" id="location" placeholder="Office location City "required="true"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Business">Business Industry</label>
                        <input type="Text" class="form-control" name="Business" id="Business" placeholder="Business Industry" >
                    </div>

                    <div class="form-group col-md-12">

                        <h3>Working Days</h3>
                        <div  class="row" id="workingDays" name="workingDays" required="true">

                            <div id="Weekdays" name="weekdays" class="day col-sm-2"></div>
                            <div id="Saturday" name="saturday" class="day col-sm-2"></div>
                            <div id="Sunday" name="sunday" class="day col-sm-2"></div>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="sr-only" for="interOffice">Interview Office Address</label>
                        <input type="text" class="form-control" name="interOffice" id="interOffice" placeholder="Interview Office Address" required="true">
                    </div>
                    <h3>Suitable Interview time in Weekdays</h3>
                    <div class="form-group">
                        <label class="sr-only" for="intTime">Suitable Interview time in Weekdays</label>
                        <input type="Text" class="form-control" name="intTime" id="intTime" placeholder="Suitable Interview time in Weekdays" required="true">
                    </div>
                    <a id="org_btn_submit" class="btn btn-default" href="<?php echo $user;?>">submit</a>
            </div>

            </form>
        </div>


    </div>

</div>
<style>

</style>
<script src="workingdays.js" type="text/javascript"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		

		$('#org_btn_submit').click(function(){

		var Category = $('.selectpicker').val();
                var Position=$("#Position").val();
		var Resp=$("#Resp").val();
		var Quali=$("#Quali").val();
		var Gender=$("#Gender").val();
		var Salary=$("#Salary").val();
		var location=$("#location").val();
                var workingDays = $("#workingDays").val();
                var salaryDis = $("#salaryDis").val();
		var Business=$("#Business").val();
		var interOffice=$("#interOffice").val();
		var intTime=$("#intTime").val();
		
		function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}          


var userid = getUrlParameter('userid');
		$.ajax({
						type: "post",
						url: "JobsubmitDatabase.php",
						data: {
							Category:Category,
							Position:Position,
							Resp:Resp,
							Quali:Quali,
							Gender:Gender,
							Salary:Salary,
							location:location,
							Business:Business,
                                                        salaryDis:salaryDis,
							interOffice:interOffice,
							workingDays:workingDays,
                                                        intTime:intTime,
							id:userid
							},
						success: function(data) {
						alert(data);
					

						 $('#org')[0].reset();

						}
				
				});



	

		});
			
 
		});
		
		</script>