<?php include 'header.php';?>
    <div class="col-md-12">
	<div class="row">
	<div class="col-md-12">
	<div class='col-md-3'>
	  <h3 class="Head">Filter your search</h3>
	  </div>
	 <!-- <div class='col-md-6' style="top:20px;left:28.77774%">
	   <input type="number" id="searchid" class="input-lg" placeholder="Serch by ID"><button value="searchby" id="searchby" class="btn btn-success btn-lg ">Search</button>
	   </div> -->
	  </div>
	</div>

        <button class="btn btn-primary btn-lg custom-large" id="designation" role="button">Designation</button>
        <button class="btn btn-primary btn-lg custom-large" id="Area" role="button">Area</button>
        <button class="btn btn-primary btn-lg custom-large" id="level" role="button">level</button>
        <button class="btn btn-primary btn-lg" id="search" role="button">Search</button>



        <div id="" class="toogle_box">

            <div class="row" id="jobseeker_org_page">


                <div class="col-md-12">

                    <?php
                    if (isset($_GET['cvs'])){
                    	$id = $_GET['id'];
			$today = date("Y-m-d");
			
			$count = mysql_query("INSERT INTO logincount(org_id,date, cvsearchcount) VALUES ('$id','$today ',1) ON DUPLICATE KEY UPDATE cvsearchcount=cvsearchcount+1")
			                            or die(mysql_error());
			}  
                    $data = mysql_query("SELECT * FROM applying_cat")
                            or die(mysql_error());
							
                    while ($info = mysql_fetch_array($data)) {
                        $cat = $info['cat'];
                        $areas = $info['areas'];
                        
                        $link = str_replace(' ', '_', $cat);
                        $selector = str_replace('&', '', $link);
                        ?>


                        <p class="cato_org" ><a class="toggle"><?php echo $cat ?></a></p>
                        <div class="details">
                            <div class="table-responsive ">
                                <table class="table job table-bordered select">
                                    <?php
                                    $areas = $info['areas'];
                                    $areas_list = explode(',', $areas);

                                    foreach ($areas_list as $area) {
                                        ?>

                                        <tr>
                                            <td name="<?php echo  $area ?>" ><?php echo $area ?></td>
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




            </div>





        </div><!-- end of toogle_box--> 


    </div>

    <div class="table-responsive area_box area_box_live ">
        <table class="table table-bordered area_box"> 
			<tr>
                <td name="Islandwide">Islandwide</td>
            </tr>
            <tr>
                <td name="Vavuniya">Vavuniya</td>
            </tr>	
            <tr>
                <td name="Trincomalee">Trincomalee</td>
            </tr>
            <tr>
                <td name="Ratnapura">Ratnapura</td>
            </tr>
            <tr>
                <td name="Puttalam">Puttalam</td>
            </tr>
            <tr>
                <td name="Polonnaruwa">Polonnaruwa</td>
            </tr>
            <tr>
                <td name="NuwaraEliya">Nuwara Eliya</td>
            </tr>
            <tr>
                <td name="Mullaitivu">Mullaitivu</td>
            </tr>
            <tr>
                <td name="Monaragala">Monaragala</td>
            </tr>
            <tr>
                <td name="Matara">Matara</td>
            </tr>
            <tr>
                <td name="Matale">Matale</td>
            </tr>
            <tr>
                <td name="Mannar">Mannar</td>
            </tr>
            <tr>
                <td name="Kurunegala">Kurunegala</td>
            </tr>
            <tr>
                <td name="Killinochchi">Killinochchi</td>
            </tr>
            <tr>
                <td name="Kegalle">Kegalle</td>
            </tr>
            <tr>
                <td name="Kandy">Kandy</td>
            </tr>
            <tr>
                <td name="Kalutara">Kalutara</td>
            </tr>
            <tr>
                <td name="Jaffna">Jaffna</td>
            </tr>
            <tr>
                <td name="Hambanthota">Hambanthota</td>
            </tr>
            <tr>
                <td name="Gampaha">Gampaha</td>
            </tr>
            <tr>
                <td name="Galle">Galle</td>
            </tr>
            <tr>
                <td name="Colombo">Colombo</td>
            </tr>
            <tr>
                <td name="Batticaloa">Batticaloa</td>
            </tr>
            <tr>
                <td name="Badulla">Badulla</td>
            </tr>
            <tr>
                <td name="Anuradhapura">Anuradhapura</td>
            </tr>
            <tr>
                <td name="Ampara">Ampara</td>
            </tr>


        </table><!-- end of the  table-->		
    </div><!-- end of the table-->


    <div id="toogle_level" class="table-responsive pro_quol level_box ">
        <table  class=" table table-bordered level_box "> 
            <tr>
                <td name="OL">O/L  Completed</td>
            </tr>	
            <tr>
                <td name="AL">A/L  Completed</td>
            </tr>
            <tr>
                <td name="UF">University  level Following</td>
            </tr>
            <tr>
                <td name="UC">University level Completed</td>
            </tr>
            <tr>
                <td name="IF">Institute level Following</td>
            </tr>
            <tr>
                <td name="IC">Institute level Completed</td>
            </tr>



        </table><!-- end of the  table-->		
    </div><!-- end of the table-->

    <table class="table">
        <thead>
            <tr>
		<th>Id</th>
                <th>Name</th>
                <th>Applying Position</th>
                <th>Job Area</th>
                <th>Qualifications</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody id="results">
            <?php
            $qualified_ol = false;
            $qualified_al = false;
            $data = mysql_query("SELECT * FROM user_info  WHERE active='1' and NOT find_in_set ('$id', cast(NIncname as char)) ORDER BY updateTime DESC LIMIT 200 ") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
                ?>
                <tr class="info" >				
                    <?php
                    $NIncname = $info['NIncname'];
		    $cname = explode(',',$NIncname );
			
                    $string = ($info['cat']);
                    $apply_cat = explode(',', $string);
                    $seekerId = $info['id'];


                    $pro_qualification = ($info['pro_info']);
                    $pro_qualification1 = explode(',', $pro_qualification);
                    $pro_qual = explode(':', $pro_qualification1[0]);

                    if (!isset($pro_qual[2])) {
                        $pro_qual[2] = null;
                    }
                    if (!isset($pro_qual[3])) {
                        $pro_qual[3] = null;
                    }
                    $new_al = $pro_qual[2];
                    $new_al_1 = $pro_qual[3]; //remving the offset error


                    $ol_info = ($info['ol_info']);
                    $al_info = ($info['al_info']);
                    $empty_ol = strlen($ol_info);
                    $empty_al = strlen($al_info);

                    if ($empty_ol < 10) {
                        $qualified_ol = true;
                    } else {
                        $qualified_ol = false;
                    }
                    if ($empty_al < 10) {
                        $qualified_al = true;
                    } else {
                        $qualified_al = false;
                    }


                    $basic_info = $info['basic_info'];
                    $basic_info = explode('|', $basic_info); //get each basic info

                    if (!isset($basic_info[0])) {//removing the offset error
                        $basic_info[0] = null;
                    }
                    if (!isset($basic_info[6])) {
                        $basic_info[6] = null;
                    }
					$area = explode(',', $basic_info[6]); //get each basic info
			
		    echo "<td  id='cvid".$seekerId."'>" . $seekerId . "</td>";			
                    echo "<td>" . $basic_info[0] . "</td>";
                    echo "<td><span class='glyphicon glyphicon-bullhorn iconfont'></span>" . $apply_cat[0] . "</td>";
                 
					
					echo "<td style='
    width: 111px;'><span class='glyphicon glyphicon-send iconfont'></span>";
					
					foreach($area as $areas){
					echo $areas.'<br/>';
					}

					  echo "</td>";


                    if ($qualified_al && $qualified_ol) {
                        echo "<td>" . $new_al . "-" . $new_al_1 . "</td>";
                    } else {
                        echo "<td><span class='glyphicon glyphicon-ok iconfont'></span> O/L Qualified " . "<br/>" . "A/L Qualified" . "<br/>" . $new_al . "-" . $new_al_1 . "</td>";
                    }
                    $id = $info['id'];
                    $orgid=$_GET['id'];
                    $_SESSION['id'] = $orgid;
                    $href = "cv_gen.php?id=" . $id."&org=".$orgid."&cvview";
                    ?>
                    <td><a target="_blank" href="<?php echo $href ?>">View</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
       
    </table>
    <div class="row">
        <footer class="footer col-md-12" style="color:#ffffff">
    <div class="row middle">
        <div class="col-md-12">
            <div id="link" class="h1_head_sub  col-md-offset-5"> Filter Your Search
                <button class="link col-md-offset-5" value="Click">Click</button>
                                        </div>


        </div>		
    </div>	
</footer>
    </div>





<script type="text/javascript">
    $(document).ready(function() {
         $('#link').click(function(){
                                    $("html, body").animate({ scrollTop: 0 }, 600);
                                    return false;
                                 });
 $(".toogle_box").hide();
  $(".area_box_live").hide();
   $("#toogle_level").hide();
        $('.multiselect').multiselect();

        $('#designation').click(function() {

            $(".toogle_box").slideToggle(500);

        });
        $('#Area').click(function() {

            $(".area_box_live").slideToggle(500);

        });
        $('#level').click(function() {

            $("#toogle_level").slideToggle(500);

        });



        $('td').click(function() {
            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }
        });
        $('#search').click(function() {
            var all_areas = "";
            $(".select").find('td').each(function(i) {//collect the language skills
                if ($(this).hasClass('greenDiv')) {
                    var areas = $(this).attr("name");
                    all_areas = all_areas + areas + ",";

                }

           
    });

            var locations = "";
            $(".area_box").find('td').each(function(i) {//collect the language skills
                if ($(this).hasClass('greenDiv')) {
                    var location = $(this).attr("name");
                    locations = locations + location + ",";

                }

            });

            var pro_quol = "";
            $(".pro_quol").find('td').each(function(i) {//collect the language skills
                if ($(this).hasClass('greenDiv')) {
                    var pro_quol_item = $(this).attr("name");
                    pro_quol = pro_quol + pro_quol_item + ",";

                }

            });

		 function getParameterByName(name, href)
        {
            name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
            var regexS = "[\\?&]" + name + "=([^&#]*)";
            var regex = new RegExp(regexS);
            var results = regex.exec(href);
            if (results == null)
                return "";
            else
                return decodeURIComponent(results[1].replace(/\+/g, " "));
        }


        var pathname = document.URL;
        var idofurl = getParameterByName("id", pathname);//get the id


            $.ajax({
                type: "post",
                url: "getcvs.php",
                data: {
                    areas: all_areas,
                    location: locations,
                    pro: pro_quol,
                    id:idofurl
                },
                success: function(data) {
                    $('#results').html('');
                    $('#results').html(data);
                }
            });
        });


    });//end of document ready

    $(function() {
        $(".details").hide();
        $("#other").hide();

        $(".toggle").click(function() {
            var that = $(this);
            that.parent().next().slideToggle("fast", function() {
                //$("#other").show();

            });
        });
    });

                
                 $(function () {
                 $("#searchby").on('click',function() {
                     var searchid=$("#searchid").val();
                     var cvid = '#cvid'+searchid;
                     if($(cvid).length==0){
                         alert('No Cv found');
                     }
                     console.log(cvid);
                     var offset = $(cvid).offset();
                      $("html, body").animate({ scrollTop:offset.top-$(window).height() /2,backgroundColor:'#4E1402'
                    }, 300);
                    
                    
                        return false;    
                         
              });      
                
            });
                
            
      
            
     




</script>