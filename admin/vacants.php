<?php
include 'header2.php';
include_once "./config/header.php";
include_once "./config/db.class.php";



?>

<div class="container">





    <div class="vacancies">

<?php
$id = $_GET['id'];

$data = mysqli_query("SELECT * FROM vacancies WHERE id ='$id' ")
        or die(mysqli_error());
while ($info = mysqli_fetch_array($data)) {
    $jobid = $info['id'];
    $jobCat = $info['jobCat'];
    $jobPos = $info['jobPos'];
    $jobRes = $info['jobRes'];
    $jobQua = $info['jobQua'];
    $jobGen = $info['jobGen'];
    $jobSal = $info['jobSal'];
    $salaryDis = $info['salaryDis'];
    $jobLoc = $info['jobLoc'];
    $weekdays = $info['weekdays'];
    $jobInd = $info['jobInd'];

    $link = 'services.php';
    
    $link2 = 'jobseeker/new_user2.php?cat=seek&id='.$jobid;
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
            <div class="container" style="top:100px;">
                <div class="row">
                    <br>
                    <h1 class="top_head  col-md-3" style="height:100%;padding:12px;" id ="vacant">Job Id: <?php echo $jobid; ?></h1> <br><br><br><br><br><h1 class="top_head col-md-9" style="height:100%;padding: 12px;right:25%">Category: <?php echo $jobCat ?></h1><br><br>
                    <div class="position_vacant col-md-3"> Position</div><div class="position_vacant col-md-9">: <?php echo $jobPos; ?></div>
                  
                    <div class='position_vacant col-md-3'> Location</div><div class="position_vacant col-md-9">: <?php echo $jobLoc; ?></div>
<br>
                    <div class='position_vacant col-md-3'> Qualifications </div><div class="position_vacant col-md-9">	: <?php echo $jobQua; ?></div>
                    <div class='position_vacant col-md-3'> Responsibilities</div><div class="position_vacant col-md-9"> 	: <?php echo $jobRes; ?></div>
                    <div class='position_vacant col-md-3'> Gender 		</div><div class="position_vacant col-md-9">		: <?php echo $jobGen; ?></div>
                    <div class='position_vacant col-md-3'> Salary 		</div><div class="position_vacant col-md-9">		: <?php echo $jobSal; ?></div>
                    <div class='position_vacant col-md-3'> Salary Description 	</div><div class="position_vacant col-md-9">		: <?php echo $salaryDis; ?></div>
                    <div class='position_vacant col-md-3'> Industry 	</div><div class="position col-md-9">		: <?php echo $jobInd; ?></div>
                    <div class='position_vacant col-md-3'> Working Days 	</div><div class="position_vacant col-md-9">		: <?php echo $weekdays; ?></div>
                  
                    <a class='btn jobsubmit' href='<?php echo $link ?>' >Back</a>
                    <a class="btn btn-lg" id="next2" role="button" href="<?php echo $link2 ?>">Apply</a>








    <?php
}
?>

                    <div style="right:200px">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $actual_linkt?> "  target="Facebook" />
                         <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                        </a>

                        <a href="http://twitter.com/share?url=<?php echo $actual_linkt?> " target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                        </a>    

                        <a href="https://plus.google.com/share?url=<?php echo $actual_linkt?> " target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                        </a> 

                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $actual_linkt?>" target="_blank">
                            <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
                        </a>


                    </div>



        </div>
    </div>
    </div>
</div>
        <script src="js/jobseeker.js">
        <?phpinclude 'footer.php';
        