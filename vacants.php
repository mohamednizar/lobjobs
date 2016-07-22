<?php
include 'header2.php';
include_once "./config/header.php";
include_once "./config/db.class.php";



?>

<div class="container">





    <div class="vacancies">

<?php
$id = $_GET['id'];

$data = mysql_query("SELECT * FROM vacancies WHERE id ='$id' ")
        or die(mysql_error());
while ($info = mysql_fetch_array($data)) {
			$jobid =$info['id'];
			$jobCat =$info['jobCat'];
			$jobtype = $info['jobtype'];
			$jobPos =$info['jobPos'];
			$jobRes =$info['jobRes'];
			$jobQua =$info['jobQua'];
			$jobGen =$info['jobGen'];
			$jobSal =$info['jobSal'];
                        $salaryDis = $info['salaryDis'];
			$cname =$info['cname'];
                        
                        
			$jobInd =$info['jobInd'];
			$emlphn =$info['emlphn'];
			$address =$info['address'];
                        
    $link = 'services.php';
    ?>
        <meta name="title" content='<?php echo $jobPos."in".$jobLoc?>' />
	<meta name="description" content="<?php echo 'earn up to'.$jobSal.'Sign up with lobjobs'?>" />
<meta property="og:image" content="" />
<meta property="og:url" content="" />
<meta property="og:description" content="" />
        <?php
    
    $link2 = 'jobseeker/new_user2.php?cat=seek&id='.$jobid;
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
            <div class="container" style="top:100px;">
                <div class="row">
                    <br>
<div class="col-lg-12" >
<h1 class="top_head col-md-3" style="height:100%;padding:12px;">Job Id: <?php echo $jobid; ?></h1> <h1 class="top_head col-md-9" style="height:100%;padding: 12px;">Category: <?php echo $jobCat ?></h1></div>


        </div>

    </div>
    
    <br><br><br><br>
<div class="position_vacant col-md-3"> Jobtype</div><div class="position_vacant col-md-9">: <?php  echo $jobtype; ?></div>
<div class="position_vacant col-md-3"> Position</div><div class="position_vacant col-md-9">: <?php  echo $jobPos; ?></div>
<div class='position_vacant col-md-3'> Company Name</div><div class="position_vacant col-md-9">: <?php  echo $cname; ?></div>

<div class='position_vacant col-md-3'> Qualifications </div>
<div class="position_vacant col-md-9">:
    <?php
     $array3 = explode('~', $jobQua);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                               
                           echo " <li class='com_result'>  $array_each_sub[0]</li>";
                                       
                                        
                                    }
                                }
                            }

?>
</div>
<hr>

<div class='position_vacant col-md-3'> Responsibilities </div>
<div class="position_vacant col-md-9">:
    <?php
     $array3 = explode('~', $jobRes);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                               
                           echo " <li class='com_result'>  $array_each_sub[0]</li>";
                                       
                                        
                                    }
                                }
                            }

?>
</div>
<hr>

<div class='position_vacant col-md-3'> Gender 		</div><div class="position_vacant col-md-9">		: <?php  echo $jobGen; ?></div>
<div class='position_vacant col-md-3'> Salary Description 	</div>
<div class="position_vacant col-md-9">:
    <?php
     $array3 = explode('~', $salaryDis);
                            foreach ($array3 as $info3) {
                                if ($info3 == ":") {
                                    
                                } else {
                                    $array_each_sub = explode('~', $info3);

                                    if (!isset($array_each_sub[0])) {
                                        $array_each_sub[0] = null;
                                    }


                                    if (!$info3 == "") {
                               
                           echo " <li class='com_result'>  $array_each_sub[0]</li>";
                                       
                                        
                                    }
                                }
                            }

?>
</div>


<div class='position_vacant col-md-3'> Industry</div><div class="position_vacant col-md-9">		: <?php  echo $jobInd; ?></div>
<div class='position_vacant col-md-3'> Address</div><div class="position_vacant col-md-9">: <?php  echo $info['jobAdress'];; ?></div>
<div class='position_vacant col-md-3'> Email & Phone</div><div class="position_vacant col-md-9">: <?php  echo $emlphn; ?></div>

                    <a class='btn jobsubmit' href='<?php echo $link ?>' >Back</a>
                    <a class="btn btn-lg" id="next2" role="button" href="<?php echo $link2 ?>">Apply</a>








    <?php
}
?>

                    <div style="right:200px">
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $actual_linkt?> "  target="Facebook" />
                    <i class="fa fa-twitter">f</i>
                    </a>

                        <a  class="btn btn-social-icon btn-twitter"href="http://twitter.com/share?url=<?php echo $actual_linkt?> " target="_blank">
                        <i class="fa fa-twitter">t</i>
                        </a>    

                        <a class="btn btn-social-icon btn-google" href="https://plus.google.com/share?url=<?php echo $actual_linkt?> " target="_blank">
                      <i class="fa fa-twitter">g+</i>
                        </a> 

                        <a  class="btn btn-social-icon  btn-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $actual_linkt?>" target="_blank">
                       <i class="fa fa-twitter">ln</i>
                        </a>


                    </div>



        </div>
    </div>
    </div>
</div>
      <script>
 function toggle() {
                if (document.getElementById("hidethis_vac").style.display == 'none') {
                    document.getElementById("hidethis_vac").style.display = '';
                } else {
                    document.getElementById("hidethis_vac").style.display = 'none';
                }
            }
            
             function resetAllValues() {
  $('.Quali').find('input:text').val('');
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
        
   
      

  
        

    });
      $(document).ready(function () {
    $(function () {

            $("#add_qua").click(function (html) {
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



        $(document).ready(function () {
            
            
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
        
        
          
        
        
        


            $('#job_update').click(function () {
            
             	
             	var Category = $('.selectpicker').val();
                var Position = $("#Position").val();
                var Resp = $("#Resp").val();
                var Quali = $("#Quali").val();
                var Gender = $("#Gender").val();
                var Salary = $("#Salary").val();
                var location = $("#location").val();
                var workingDays = $("#workingDays").val();
                var salaryDis = $("#salaryDis").val();
                var Business = $("#Business").val();
                var interOffice = $("#interOffice").val();
                var intTime = $("#intTime").val();
                
                
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

		var org = getUrlParameter('org');
                var Jobid = getUrlParameter('id');
                $.ajax({
                    type: "post",
                    url: "JobsubmitUpdate.php",
                    data: {
                        Category: Category,
                        Position: Position,
                        Resp: Resp,
                        Quali: Quali,
                        Gender: Gender,
                        Salary: Salary,
                        location: location,
                        Business: Business,
                        salaryDis: salaryDis,
                        workingDays: workingDays,
                        intTime: intTime,
                        Jobid: Jobid
                    },
                    success: function (data) {
                    	if (data.status == 'success') {
                                    
                                    alert('updated');
                                     window.location.href="http://lobjobs.lk/employers/eachJob.php?id="+Jobid+"&org="+org;;

                                } else if (data.status == 'error') {
                                    alert('no updaets');
                                    window.location.href="http://lobjobs.lk/employers/eachJob.php?id="+Jobid+"&org="+org;;


                                }

                    }

                });





            });


        });
</script>


        <?php include 'footer.php';
        