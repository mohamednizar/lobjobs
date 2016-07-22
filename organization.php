<?php
include "header.php";
include_once "config/header.php";
include_once "jobseeker/upload.php";
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





<div class="container">
    <h3 class="org_h3">Choose your candidates</h3>



    <span class="border"></span>
    <div class="row intro">
        <p class="org_sub">The organization may register with us and can easily select Cv's from our data base, to fill your vacant as per your requirement. Keep your contact with us to provide better service.</p>
        <div class="col-md-6">


            <p>Company Details</p>
            <form class="form" action="" id="org" role="form">
                <div class="form-group">
                    <label class="sr-only" for="Contact">Company Name</label>
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="Company Name">
                </div>

                <div class="form-group">
                    <label class="sr-only" for="Phone">General line</label>
                    <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Phone (General line)">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="Address">Address</label>
                    <input type="text" class="form-control" name="Address" id="Address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="Email">Website</label>
                    <input type="text" class="form-control" name="Website" id="Website" placeholder="Website">
                </div>

                <p>Contact Details</p>
                <div class="form-group">
                    <label class="sr-only" for="Contact">Contact Person</label>
                    <input type="text" class="form-control" name="Contact" id="Contact" placeholder="Contact Person">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="Designation">Designation</label>
                    <input type="text" class="form-control" name="Designation" id="Designation" placeholder="Designation">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="Mobile">Mobile</label>
                    <input type="text" class="form-control" name="Mobile" id="Mobile" placeholder="Mobile">
                </div>
                </br>
                </br>
                <div class="form-group">
                    <label class="sr-only" for="Email">Email</label>
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="Password">Password</label>
                    <input type="Password" class="form-control" name="Password" id="Password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="Password">Password</label>
                    <input type="Password" class="form-control" name="Password2" id="Password" placeholder="Conform Password">
                </div>
                <div class="form-group">
                    <a id="org_btn" class="btn btn-default">Submit</a>
                </div>
        </div>

        </form>
    </div>


</div><!-- end of intro-->



<script type='text/javascript' src='jobseeker/js/jquery-1.7.min.js'></script>




<?php
include 'footer.php';



