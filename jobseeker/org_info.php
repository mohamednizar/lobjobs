<?php
include_once "../config/header.php";
?>
<div class="container">

    <p>
        <a href="admin.php?id=nactive" type="button" class="btn btn-primary btn-lg">New Cvs</a>
        <a href="admin.php?id=active" type="button" class="btn btn-default btn-lg">Approved Cvs</a>
        <a href="org_info.php" type="button" class="btn btn-default btn-lg">Organization Info</a>
        <a href="organization.php" type="button" class="btn btn-default btn-lg">Cv search</a>
        <a href="comments_info.php" type="button" class="btn btn-default btn-lg">Comments</a>
    </p>
    <table class="table">
        <thead>
            <tr>

                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Website</th>
                <th>Logo</th>
                <th>Contact person </th>
                <th>designation </th>
                <th>mobile </th>
                <th>email </th>
                <th>status </th>
                
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
				
				$query=("DELETE FROM org_info WHERE id='$id'");
			
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				if (($_GET['app'])=="approve"){
				
				$query=("UPDATE org_info SET active='1' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				else
				{
				$query=("UPDATE org_info SET active='0' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error()); 
				
				}
				
				}
			
            $data = mysql_query("SELECT * FROM org_info") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
                 echo "<tr>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[2]."</td>";
                echo "<td>".$info[3]."</td>";
                echo "<td>".$info[4]."</td>";
                echo "<td>".$info[5]."</td>";
                echo "<td>".$info[6]."</td>";
                echo "<td>".$info[7]."</td>";
                echo "<td>".$info[8]."</td>";
                echo "<td>".$info[9]."</td>";
                
                $id=$_GET['id'];
				$href='org_info.php?app=approve&id='.$info[0];
				$href_del='org_info.php?app=delete&id='.$info[0];
				$href_dis='org_info.php?app=dis&id='.$info[0];
                                $href_view = 'org_view.php?id='.$info[0];
				
				if ($info[11]== 1)
				{
				?>
				<td> <a  type="submit" id="approve" class="btn btn-success">Approved</a></td>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-danger">Stop</a></td>
					<td> <a href='<?php echo $href_del ?>' type="submit" id="disapprove" class="btn btn-danger">delete</a></td>
                                        <td><a href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a></td>
				<?php
				}
				else{
			?>
				<td> <a href='<?php echo $href ?>' type="submit" id="approve" class="btn btn-success">Approve</a></td>
				<td> <a href='<?php echo $href_del ?>' type="submit" id="disapprove" class="btn btn-danger">delete</a></td>
                <?php
                 echo "</tr>";
				}
				
				}
            ?>
            
        </tbody>
    </table>

</div>