<?php
include_once "../config/header.php";
include_once "../config/db.class.php";
?>
<div class="container">
    <p class="signin_p ">Reset your Password</p>
    <form class="form-signin" role="form" action="change.php" method="post">

<?php
if (isset($_GET['cat'])) {

    if ($_GET['cat'] == "org") {
        ?>
                <div class="pro_box_login"><span class="icon org"></span><span class="title">ORGANIZATIONS </span></div> 
                <?php
            }
            if ($_GET['cat'] == "seek") {
                ?>
                <div class="pro_box_login"><span class="icon seek"></span><span class="title">JOB SEEKERS </span></div> 
                <?php
            }
        }
        ?>


        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <button class="form-control btn-primary"  type="submit" name="ForgotPassword">Send Email</button>
    </form>

</div> <!-- /container -->
