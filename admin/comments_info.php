
<?php
include_once "../config/header.php";

?>
<?php include 'header.php';?>
<?php
include_once "../config/db.class.php";
/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */


		$data = mysql_query("SELECT * FROM comments where comments!='' ORDER BY id DESC") //query the databse 
		or die(mysql_error()); 
               ?>
<div class="table-responsive">
        <table class="table  ">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>
          <tr>
                   
                   <?php
                
		while($info = mysql_fetch_array( $data )) {
                   $string1 = ($info['comments']);
                   $proinfo = explode(',', $string1);   
                    
                    foreach ($proinfo as $sin_pro) {
                        $array_each_sub = explode('-', $sin_pro);
                        if (!isset($array_each_sub[1])) {
                            $array_each_sub[1] = null;
                        }
                        if(filter_var($array_each_sub[1], FILTER_VALIDATE_EMAIL)) {
        // valid address
        		 echo "<td class='seeker_email'><a href='mailto:$array_each_sub[1]'>" .$array_each_sub[1]. "</a></div></td>";
    			}else{
                       
                        echo '<td class="col-lg-4">'.$array_each_sub[1].'</td>';
                    }
                    }
                    
                    echo '</tr>';
		}
               
?>
          </tbody>
        </table>
</div>