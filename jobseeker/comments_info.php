

<?php
include_once "../config/header.php";
?>

<div class="container">
<?php
include_once "../config/db.class.php";
/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */


		$data = mysql_query("SELECT * FROM comments") //query the databse 
		or die(mysql_error()); 
		
		while($info = mysql_fetch_array( $data )) {
		
	
			echo $info[1] ;
			
				echo $info[2] ;
		
					echo $info[3] ;
				
						echo $info[4] ;
						echo "<br/>";
		}
?>

</div>