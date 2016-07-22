<?php
include_once "../config/header.php";
include_once "../config/db.class.php";
include 'header2.php';
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
                
                <form class="form" id="org" role="form" >
                <h4>JSelect your Job Type</h4>
                <select class="selectjobtype" >
                	<option value='Full Time'>Full Time</option>
                	<option value='Part Time'>Part Time</option>
                	<option value='Contract'>ract</option>
                	<option value='Internship'>Internship</option>
                	<option value='Foreign'>Foreign</option>
                	<option value='Others'>Others</option>
                </select>
<h4>Position</h4>
               <select class="selectpicker" id="hidethis" onclick="show()" size=0  >
                    
                    

<?php
$data = mysql_query("SELECT * FROM applying_cat")
        or die(mysql_error());
while ($info = mysql_fetch_array($data)) {

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


                    <div class="form-group">
                        <label class="sr-only" for="Position">Position </label>
                        <input type="text" class="form-control" name="Position" id="Position" placeholder="Position" required="true">
                    </div>
                    <br>
                     <div class="form-group">
                        
                       
                        <label class="sr-only" for="Responsibilities">Responsibilities </label>
                        <textarea type="text" class="form-control Resp" name="Resp " id="Resp" placeholder="Responsibilities" required="true"></textarea>
                            <a id="add_res" class="btn btn-default">Add</a>
                        
                        
                            
                    </div>
                    <div class="form-group">
                     <table id='resposbility' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Responsibilities</th>
                                    


                                </tr>
                            </thead>
                            <tbody id="resposbility">
                            
                            </tbody>
                            </table>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Qualification">Preferred Qualification </label>
                        <textarea type="text" class="form-control Quali" name="Quali" id="Quali" placeholder="Preferred Qualification " required="true"></textarea>
                        <a id="add_qua" class="btn btn-default">Add</a>
                    
                    </div>
                    
                    <div class="form-group">
                     <table id='qualifications' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Preferred Qualification</th>
                                    


                                </tr>
                            </thead>
                            <tbody id="qualification">
                            
                            </tbody>
                            
                            </table>
                        
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
<br><br><br>
                    
                    <div class="form-group">
                        <div class="form-group">
                        
                            <label class="sr-only" for="Qualification">Salary Description</label>
                            <textarea type="text" class="form-control salaryDis" name="salaryDis" id="salaryDis" placeholder="Salary Discrition" required="true"></textarea>
                            <a id="add_dis" class="btn btn-default">Add</a>
                    </div>
                            <div class="form-group">
                            <table id='salarydiscription' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Salary Description</th>
                                    


                                </tr>
                            </thead>
                            <tbody id="salarydiscription">
                            
                            </tbody>
                            
                            </table>
                        
                        
                        </div>

                    </div>

                    <br>


                    <h3>Company Details</h3>
                    <div class="form-group">
                        <label class="sr-only" for="location">Company Name</label>
                        <input type="text" class="form-control" name="cname" id="cname" placeholder="Company Name" required="true" value="<?php echo $cname ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="sr-only" for="Business">Business Industry</label>
                        <input type="Text" class="form-control" name="Business" id="Business" placeholder="Business Industry" >
                    </div>

                    <div class="form-group col-md-12">

                        <h3>Working days & time</h3>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="workingDays" id="workingDays" placeholder="Working days & time" required="true"><a id="job_create" class="btn btn-primary " style="position:relative" >submit</a>
                    </div>


                    
                    <br>
                    <br>
                    </div>

                </form>
            </div>


        </div>

    </div>
    <style>

    </style>
    <script src="workingdays.js" type="text/javascript"></script>

    <script type="text/javascript">
    
           function show() {
        if (document.getElementById("hidethis").size == 0) {
            document.getElementById("hidethis").size = 38;
        } else {
            document.getElementById("hidethis").size = 0;
        }
    }
     $(document).ready(function () {
               
     

        $("#resposbility").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
        
        $("#qualification").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
        
        $("#salarydiscription").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });
      

  $(function () {

            $("#add_qua").click(function () {
                var qualification = $("#Quali").val();
                    
                    if (qualification) {
                        $('#qualification').append('<tr class="sub_row" ><td class="ol_result">'+ qualification + '</td><td><a  class="delete close">X</a></td></tr>');
                       
                        $('.Quali:input').each(function() {
                    $(this).val('');
                    });    
                        
                    }
                    

            });
            
            

            $('td').click(function () {

                if (!$(this).hasClass("greenDiv")) {
                    $(this).addClass("greenDiv");
                } else {
                    $(this).removeClass("greenDiv");
                }


            });

            $(".body_location").hide();

//$(".body_other_industry").hide();

            $('.location').click(function () {

                $(".body_location").toggle();
            });

        });

        

    });
    
    
    
    	
             $(function () {

            $("#add_res").click(function () {
                var responsbility = $("#Resp").val();
                    if (responsbility) {
                        $('#resposbility').append('<tr class="sub_row" ><td class="ol_result">' + responsbility + '</td><td><a  class="delete close">X</a></td></tr>');
                            
                        $('.Resp:input').each(function() {
                    $(this).val('');
                    });    
                           
                    }
                    

            });
            
            

            $('td').click(function () {

                if (!$(this).hasClass("greenDiv")) {
                    $(this).addClass("greenDiv");
                } else {
                    $(this).removeClass("greenDiv");
                }


            });

            $(".body_location").hide();

//$(".body_other_industry").hide();

            $('.location').click(function () {

                $(".body_location").toggle();
            });

        });
          $(function () {

            $("#add_dis").click(function () {
                var salarydis = $("#salaryDis").val();
                    if (salarydis) {
                        $('#salarydiscription').append('<tr class="sub_row" ><td class="ol_result">' + salarydis + '</td><td><a  class="delete close">X</a></td></tr>');
                             $('.salaryDis:input').each(function() {
                    $(this).val('');
                    });   
                        
                           
                    }
                    

            });
            
            

            $('td').click(function () {

                if (!$(this).hasClass("greenDiv")) {
                    $(this).addClass("greenDiv");
                } else {
                    $(this).removeClass("greenDiv");
                }


            });

            $(".body_location").hide();

//$(".body_other_industry").hide();

            $('.location').click(function () {

                $(".body_location").toggle();
            });

        });
        
    
        $(document).ready(function () {


            $('#job_create').click(function () {
		var Jobtype = $('.selectjobtype').val();
                var Category = $('.selectpicker').val();
                var Position = $("#Position").val();
                var Resp = $("#Resp").val();
                var Quali = $("#Quali").val();
                var Gender = $("#Gender").val();
                var emlphn = $("#emlphn").val();
                var salaryDis = $("#salaryDis").val();
                var Business = $("#Business").val(); //remark
                var address = $("#address").val();
                var cname = $("#cname").val();
                
                $("#resposbility").find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                    responsbility = $tds.eq(0).text();
                 if(!responsbility==""){
                Resp  = Resp + responsbility + "~";
                 }
            });
            
                $("#salarydiscription").find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                    disciption = $tds.eq(0).text();
                 if(!disciption ==""){
                salaryDis  = salaryDis + disciption  + "~";
                 }
            });
            
                $("#qualification").find('tr').each(function (i) {
                    var $tds = $(this).find('td'),
                    qualyfication= $tds.eq(0).text();
                 if(!qualyfication==""){
                Quali  = Quali + qualyfication + "~";
                 }
            });

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
                    	Jobtype:Jobtype,
                        Category: Category,
                        Position: Position,
                        Resp: Resp,
                        Quali: Quali,
                        Gender: Gender,
                        Business: Business,
                        salaryDis: salaryDis,
                        interOffice: interOffice,
                        emlphn: emlphn,
                        address:address,
                        cname:cname,
                        intTime: intTime,
                        id: userid
                    },
                    success: function (data) {
                                    alert('Job Created')
                                    window.location.href="http://lobjobs.lk/admin/jobsubmit.php?id="+userid;;

                    }

                });





            });


        });

    </script>