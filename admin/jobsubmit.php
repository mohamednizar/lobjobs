<?php
 
include_once "../config/header.php";
include_once "../config/db.class.php";
include 'header2.php';



if (!isset($_SESSION['username'])) {
 
   redirect('signin.php?cat=org');
      
}

?>
<?php  $id= $_GET['id']; 

$link = 'submitjob.php?userid='.$id ;

?>
    

       	
<a class='btn jobsubmit' href='<?php echo $link ?>' >Submit your Requirement</a>
<table class="table">
        <thead>
            <tr>
		<th>Job Id</th>
                <th>Job Category</th>
                <th>Position</th>
                
            </tr>
        </thead>
        <tbody>


            <?php
            include_once "../config/db.class.php";
			
			
			
			if (isset($_GET['id'])){
			$id=$_GET['id'];
			}
			
				if (isset($_GET['app'])){
				
				if (($_GET['app'])=="delete"){
				
				$query=("DELETE FROM vacancies WHERE id='$id'");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				if (($_GET['app'])=="approve"){
				
				$query=("UPDATE vacancies SET active='1' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				if (($_GET['app'])=="refresh"){
				
				$query=("UPDATE vacancies SET updateTime=now() WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				if (($_GET['app'])=="dis"){
				$query=("UPDATE vacancies SET active='0' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				}
	    $orgid=$_GET['id'];
            $data = mysql_query("SELECT vacancies.*, org_info.* FROM org_info INNER JOIN vacancies ON org_info.id=vacancies.Orgid  WHERE vacancies.Orgid='$orgid' ORDER BY vacancies.updateTime DESC") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
                 echo "<tr>";
                 echo "<td>".$info[0]."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[2]."</td>";
                
                
                $id=$_GET['id'];
				$href='vacancies.php?app=approve&id='.$info[0];
				$href_del='vacancies.php?app=delete&id='.$info[0];
				$href_dis='vacancies.php?app=dis&id='.$info[0];
				$href_refresh='vacancies.php?app=refresh&id='.$info[0];
                                $href_view = 'eachJob.php?id='.$info[0];
                                
				
				if ($info[13]== 1)
				{
				?>
				<td> <a  type="submit" id="approve" class="btn btn-success">Approved</a></td>
				<td><a  href="<?php echo $href_refresh ?>" type="submit" id="refresh" class="btn btn-primary">Refesh</a>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-danger">Stop</a></td>
					<td> <a href='<?php echo $href_del ?>' type="submit" id="disapprove" class="btn btn-danger">delete</a></td>
                                        <td><a target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a>
                                        </td>
				<?php
				}
				else{
			?>
				<td> <a href='<?php echo $href ?>' type="submit" id="approve" class="btn btn-success">Approve</a></td>
				<td> <a href='<?php echo $href_del ?>' type="submit" id="disapprove" class="btn btn-danger">delete</a></td>
				<td><a target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a>
                <?php
                 echo "</tr>";
				}
				
				}
            ?>
            
        </tbody>
    </table>

</div>