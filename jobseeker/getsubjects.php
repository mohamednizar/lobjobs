
<?php
if (isset($_GET['stream']))	{

	$stream=$_GET['stream'];


if(!empty($stream)){
if(@mysqli_connect('localhost:3036','root','nizar0756')){
if(@mysqli_select_db('lobjobs')){

$combine=$stream+"_maths";



$qurey="SELECT * FROM `subjects_al` WHERE stream='$stream'";
$results=mysqli_query($qurey);

while($row = mysqli_fetch_assoc($results)){

echo "<option>".$row['subject_name']."</option>";



}


}
}


}
}

?>