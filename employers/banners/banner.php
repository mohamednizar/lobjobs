<?php
include_once "../config/header.php";
include_once "../config/db.class.php";


include 'header.php';
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
.left {
    position:absolute;
    left:60%; top:110%;
    width: 250px;
}

.leftb {
    position:absolute;
    left:85%;
  
}
.right {
    position:absolute;
    right:75%; top:100%;
    width: 250px;
}          
        </style>
        
 <div class="row">

		<div class="col-md-6 leftb">
		<h3 class="">Upload your Banner</h3>
                    <input  style="width:50%" class="IMU" type="file" path="../employers/banners/" multi="true" startOn="auto" afterUpload="image" maxSize="2000800" allowRemove="true" sessionId="<?php echo $_GET['id']; ?>" /><br><a style="left:20%" class="btn btn-success" type="submit" href="<?php echo 'banner.php?id='.$_GET['id']?>">update</a>

		</div><!-- end of col-md-6-->  
			
		</div>    
		<br><br><br><br>
<div class="left">		    
        <h4 class="col-md-12">Your Banners</h4>
       
 <?php     
 
 			if (($_GET['app'])=="delete"){
				
				$bid = $_GET['bid'];
				$query=("DELETE FROM banner_info WHERE id='$bid'");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				  
 $id = $_GET['id'];
 $data = mysql_query("SELECT * FROM banner_info WHERE org_id=$id ORDER BY id DESC")
or die(mysql_error());
if (isset($_GET['ban'])){
 $id = $_GET['id'];
 $today = date("Y-m-d");
$count = mysql_query("INSERT INTO logincount(org_id,date, bannercount) VALUES ('$id','$today',1) ON DUPLICATE KEY UPDATE bannercount=bannercount+1")
                            or die(mysql_error());
}
while($row = mysql_fetch_assoc($data))
{

	
	$bd = $row['id'];
	$href_del='banner.php?id='.$id.'&app=delete&bid='.$bd;
	$banner = $row['banner_info'];
	$date = $row['update'];
       ?><img src="<?php echo '../employers/banners/'.$banner?>" alt="..." class="img-thumbnail" width="250px" max-height="150px" ><a href="<?php echo $href_del?>" clas="delet" type="submit" style="position:absolute;left:93%" ><img src="close.png"></a>
       <a href="<?php echo $href_del?>" clas="delet" type="submit" style="position:absolute;left:93%" ><img src="close.png"></a>
        <?php
}
?>
</div>
<div class="right">
 <h4 class="col-md-12" > All Banners</h4>
 
 <?php       
 $data = mysql_query("SELECT * FROM banner_info WHERE 1 ORDER BY id DESC")
or die(mysql_error());
while($row = mysql_fetch_assoc($data))
{
	$banner = $row['banner_info'];
	$date = $row['update'];
       ?><img src="<?php echo '../employers/banners/'.$banner?>"  alt="..." class="img-thumbnail" width="250px" max-height="150px"><br><?php
      
        
}
?>
 </div>      

        
<div class="col-md-12">

</div>
<script>



<script type='text/javascript' src='js/jquery-1.7.min.js'></script>
<script type='text/javascript' src='js/upload.min.js'></script>
<script type='text/javascript' src='js/swfobject.js'></script>
<script type='text/javascript' src='js/myupload.js'></script>


