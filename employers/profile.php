<?php
include_once "../config/header.php";



include_once "../config/db.class.php";
include 'header.php';


$back_link = 'org_info.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['approve'])) {
    $approve = $_GET['approve'];
    if ($approve == "yes") {

        $query = ("UPDATE org_info SET active='1' WHERE id='$id'");
        $data = mysqli_query($query)
                or die(mysqli_error());
    }
}
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    if ($delete == "yes") {

        $query = ("DELETE FROM org_info WHERE id='$id'");

        $data = mysqli_query($query)
                or die(mysqli_error());
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
}
			if (isset($_GET['pro'])){
			$today = date("Y-m-d");
                        $count = mysqli_query("INSERT INTO logincount(org_id, date,procount) VALUES ('$id','$today',1) ON DUPLICATE KEY UPDATE procount=procount+1")
                            or die(mysqli_error());
			
			}



$data = mysqli_query("SELECT * FROM org_info WHERE id='$id'")
        or die(mysqli_error());
while ($info = mysqli_fetch_array($data)) {
    $basic_info = ($info['basic_info']);

    $basic_info_array = explode('|', $basic_info);
    if (!isset($basic_info)) {//removing the offset error
        $basic_info = null;
    }
    ?>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
    <?php
    if (!isset($_GET['org'])) {
        ?>
                    <?php
                }
                ?>


                <div class='row top_head'><div class='col-md-6 '><h2 class="" >Organization ID <strong>:<?php echo $id ?></strong></h2></div>

    <?php
    if (!isset($_GET['org'])) {
        ?>


                        <?php
                        if ($info['active'] == 1) {
                            ?>

                           
                            <?php
                        } else {
                            ?>
                            <div class='col-md-3 h1_head_sub'><a href='org_view.php?approve=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-success">Approve</a></div>
                            <div class='col-md-3 h1_head_sub'><a href='org_view.php?delete=yes&id=<?php echo $id ?>' type="submit" id="approve" class="btn btn-danger">Delete</a></div>


                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col-md-2">
                    <?php
                    if ($info['logo'] == NULL) {
                        ?>	
                            <img src="logo/logo.png" alt="..." class="img-thumbnail" >
                             <input  style="width:50%" class="IMU" type="file" path="../employers/logo/" multi="true" startOn="auto" afterUpload="image" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" /><br><a style="left:20%" class="btn btn-success" type="submit" href="<?php echo 'profile.php?id='.$_GET['id']?>">update</a>
                            <?php
                        } else {
                            ?><img src="<?php echo "../employers/logo/" . $info['logo'] ?>" alt="..." class="img-thumbnail" min-width="200px" min-height="200px" max-height="200px">
                             <input  style="width:50%" class="IMU" type="file" path="../employers/logo/" multi="true" startOn="auto" afterUpload="image" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" /><br><a style="left:20%" class="btn btn-success" type="submit" href="<?php echo 'profile.php?id='.$_GET['id']?>">update</a>
        <?php
    }
    ?>
                    </div>

                    <div class="row  col-md-9 extra_margin">


                        <?php
                        $cname = ($info['cname']);
                        $phone = ($info['phone']);
                        $web = ($info['website']);
                        $cperson = ($info['cperson']);
                        $mobile = ($info['moblie']);
                        $email = ($info['username']);
                        $address = ($info['address']);
                        $designation = ($info['designation']);



                        echo "<div class='col-md-3'>";
                        echo "<p>Company Name </p>";
                        echo "</div>";
                        echo "<div class='col-md-9'>";
                        echo "<p>:" . $cname . "<button type='button btn-success' onClick='toggle()' style='position: relative;left:100%'>Edit</button></p>";
                        echo "</div>";

                        echo "<div class='col-md-3'>";
                        echo "<p>Phone</p>";
                        echo "</div>";
                        echo "<div class='col-md-9'>";
                        echo "<p>:" . $phone . "</p>";
                        echo "</div>";

                        echo "<div class='col-md-3'>";
                        echo "<p>Address</p>";
                        echo "</div>";
                        echo "<div class='col-md-9'>";
                        echo "<p>:" . $address . "</p>";
                        echo "</div>";

                        echo "<div class='col-md-3'>";
                        echo "<p>Website</p>";
                        echo "</div>";
                        echo "<div class='col-md-9'>";
                        echo "<p>:" . $web . "</p>";
                        echo "</div>";
                        ?>
                    </div>

                   

                </div>
                <div>

                </div>

                <br>
    <?php
    echo "<div class='row cv_head'><div class='col-md-4 h1_head'>Contact Details</div><div class='col-md-4 h1_head_sub'></div><div class='col-md-4 h1_head_sub' ></div></div>";
    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    echo "<p>Contact Person</p>";
    echo "</div>";
    echo "<div class='col-md-8'>";
    echo "<p>:" . $cperson . "</p>";
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    echo "<p>Designation</p>";
    echo "</div>";
    echo "<div class='col-md-8'>";
    echo "<p>:" . $designation . "</p>";
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    echo "<p>Email</p>";
    echo "</div>";
    echo "<div class='col-md-8'>";
    echo "<p>:" . $email . "</p>";
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    echo "<p>Mobile</p>";
    echo "</div>";
    echo "<div class='col-md-8'>";
    echo "<p>:" . $mobile . "</p>";
    echo "</div>";
    echo "</div>";
    ?>





                <?php
            }
            ?>

 		<div class="col-md-6 container " id="hidethis" style="display:none;left:5%;position:absolute;top:20% "  >
                        <div class="row col-md-4 col-md-offset-7">
                            <form class="form form-controle" action="" id="org" role="form">
                                <div class="form-group">
                                    <label class="form-group"  for="Phone">Company Name</label>
                                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Company Name" value="<?php echo $cname ?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-group"  for="Phone">Phone</label>
                                    <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Phone" value="<?php echo $phone ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-group" for="Address">Address</label>
                                    <input type="text" class="form-control" name="Address" id="Address" placeholder="Address" value="<?php echo $address ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-group" for="Email">Website</label>
                                    <input type="text" class="form-control" name="Website" id="Website" placeholder="Website" value="<?php echo $web ?>">
                                </div>

                                <p>Contact Details</p>
                                <div class="form-group">
                                    <label class="form-group" for="Contact">Contact Person</label>
                                    <input type="text" class="form-control" name="Contact" id="Contact" placeholder="Contact Person" value="<?php echo $cperson ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-group" for="Designation">Designation</label>
                                    <input type="text" class="form-control" name="Designation" id="Designation" placeholder="Designation" value="<?php echo $designation ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-group" for="Mobile">Mobile</label>
                                    <input type="text" class="form-control" name="Mobile" id="Mobile" placeholder="Mobile" value="<?php echo $mobile ?>">
                                </div>

                                <div class="form-group">
                                    <a onClick='update()'  class="btn btn-default col-md-offset-10" >Save</a>
                                </div>

                            </form>
                        </div>
                    </div>


        </div>
        <script  type="text/javascript">
            function toggle() {
                if (document.getElementById("hidethis").style.display == 'none') {
                    document.getElementById("hidethis").style.display = '';
                } else {
                    document.getElementById("hidethis").style.display = 'none';
                }
            }
            
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
            
          function update() {  

                   
        
	        var pathname = document.URL;
	        var orgid = getParameterByName("id", pathname);//get the id
                    
                    var cname = $("#Name").val();
                    var phone = $("#Phone").val();
                    var web = $("#Website").val();
                    var address = $("#Address").val();
                    var cperson = $("#Contact").val();
                    var designation = $("#Designation").val();
                    var mobile = $("#Mobile").val();
                        $.ajax({
                            type: "post",
                            url: "org_update.php",
                            data: {
                                cname: cname,
                                phone: phone,
                                web: web,
                                address: address,
                                cperson: cperson,
                                designation: designation,
                                mobile: mobile,
                                orgid:orgid
                            },
                            success: function (data) {
                                if (data.status == 'success') {
                                    
                                    alert('Your profile successfuly updated');
                                   $link = "http://lobjobs.lk/employers/loggedin.php?id="+orgid;
                            	window.location.href = $link;
                                    

                                } else if (data.status == 'error') {
                                    alert('No Changes Made ');
                                    $link = "http://lobjobs.lk/employers/loggedin.php?id="+orgid;
                            	window.location.href = $link;

                                }



                            }
                            });
                            };
                  


                $('#approve').click(function () {

                    $.ajax({
                        type: "post",
                        url: "approve.php",
                        data: {
                            id: $id
                        },
                        success: function (data) {
                            //console.log(data); // "something"
                            //$link="upload_info.php?id="+idofurl;
                            //window.location.href = $link;
                        }
                    });
                });
            
        </script>



    </div>
</div>  
<script type='text/javascript' src='js/jquery-1.7.min.js'></script>
<script type='text/javascript' src='js/upload.min.js'></script>
<script type='text/javascript' src='js/swfobject.js'></script>
<script type='text/javascript' src='js/logo_upload.js'></script>


<?php
include_once "../config/footer.php";
