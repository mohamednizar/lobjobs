<?php include 'header.php'; 
include_once "config/db.class.php";
$timezone = "Asia/Colombo"; // sets the timezone or region
if(function_exists('date_default_timezone_set')){ // the if function checks if setting the timezone is supported on your server first. You don't want an error thrown to the user do you..?
    date_default_timezone_set($timezone); 
}
?>
		<img class="img-responsive profile"  src="images/LOB JOB COVER(1).jpg" style="height:450px;width:1200px"/><!-- main image-->
		
   		<div class="container">
  
   		
   <div class="slider_logo ">
 
    <?php
    
 
                    $data = mysql_query("SELECT * FROM org_info WHERE 1 and logo!='NULL' ORDER BY id DESC")
or die(mysql_error());
while($row = mysql_fetch_assoc($data))
{
	$logo = $row['logo'];
	if(!$logo==""){
	//did don't edit 2015/10/20
       ?><div class="slide"><img  class="img-responsive" style="height:100px" src="<?php echo 'employers/logo/'.$logo?>"></div><?php
       }
        
}
?>

  </div><!-- end of image slider-->

	<div class="row">
	
<div >
<h3 class="cv_h3" >Find the cvs</h3>
<span class="border"></span>


</div>
		<div class=" cvs">
			<table class="table">
      <thead>
        <tr>
   
          <th>Name</th>
          <th>Applying Position</th>
          <th>Job Area</th>
		  <th>Qualifications</th>
		  <th>Info</th>
        </tr>
      </thead>
      <tbody>
       
    
		<?php
		include_once "config/db.class.php";
		$qualified_ol=false;
		$qualified_al=false;
		   $data = mysql_query("SELECT * FROM user_info  WHERE active='1' and NOT find_in_set ('$id', cast(NIncname as char)) ORDER BY updateTime DESC LIMIT 40 ") or die(mysql_error()); 
			
			
			while ($info = mysql_fetch_array($data)) {
                ?>
                <tr class="info">				
                    <?php
                    $string = ($info['cat']);
                    $apply_cat = explode(',', $string);


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
					 $jobareas = explode(',', $basic_info[6]); //get each basic info

                    echo "<td><span class='glyphicon glyphicon-user iconfont'></span>" . $basic_info[0] . "</td>";
                    echo "<td><span class='glyphicon glyphicon-bullhorn iconfont'></span>" . $apply_cat[0] . "</td>";
                    echo "<td style='
					width: 111px;'><span class='glyphicon glyphicon-send iconfont'></span>" . $jobareas[0] . "</td>";


                    if ($qualified_al && $qualified_ol) {
                        echo "<td>" . $new_al . "-" . $new_al_1 . "</td>";
                    } else {
                        echo "<td><span class='glyphicon glyphicon-ok iconfont'></span> O/L Qualified " . "<br/>" . "A/L Qualified" . "<br/>" . $new_al . "-" . $new_al_1 . "</td>";
                    }
                    $id = $info['id'];
                    $href = "organization.php";
                    ?>
                    <td><a href="<?php echo $href ?>">View</a></td>
                </tr>
                <?php
            }
            ?>
          

      </tbody>
	</table>
				
		</div>
		
	</div>

    </div><!-- /.container -->
	    </div><!-- /.container -->
	  
<?php include 'footer.php'; ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72038515-1', 'auto');
  ga('send', 'pageview');

</script>
