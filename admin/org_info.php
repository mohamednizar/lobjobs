<?php
include_once "../config/header.php";

?>
<?php include 'header.php';?>
    <table class="table">
        <thead>
            <tr>
		<th>ID</th>
                <th>Name</th>
                <th>Address</th>          
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
				
				$location = "org_info.php?app=nactive";
                    		header("Location:" . $location);
				
				}
				
				
				if (($_GET['app'])=="send"){
				
				$query=("UPDATE org_info SET track='1' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error()); 
				$location = "org_info.php?app=nactive";
                    		header("Location:" . $location);
				
				}
				if (($_GET['app'])=="back")
				{
				$query=("UPDATE org_info SET track='0' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error());
				 $location = "org_info.php?app=active";
                    		header("Location:" . $location);
				
				}
				if (($_GET['app'])=="approve")
				{
				$query=("UPDATE org_info SET active='1' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error());
				
				 $quary2 = ("SELECT * FROM org_info WHERE id ='$id'" );
				 $d = mysql_query($quary2);	
		                $result = mysql_fetch_array($d);
		                $email = $result['username'];
		                
		                //$to = 'nizarucsc@gmail.com';
			        $subject = "Accont Activated";
			        $from = 'accounts@lobjobs.lk';
			        $body = 'Hi, <br/> <br/>Approved your Account.login  and continue our services<br>http://lobjobs.lk/employers/signin.php?cat=org';
			        $headers = "From: " . strip_tags($from) . "\r\n";
			        $headers .= "Reply-To: " . strip_tags($from) . "\r\n";
			        $headers .= "MIME-Version: 1.0\r\n";
			        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			        mail($email, $subject, $body, $headers);
			                       
			        
			       
				$location = "org_info.php?app=active";
                    		header("Location:" . $location);
                    		
                    		
				
				}
				if (($_GET['app'])=="dis")
				{
				$query=("UPDATE org_info SET active='0' WHERE id='$id'");
				$data = mysql_query($query) 
				or die(mysql_error());
				 $location = "org_info.php?app=nactive";
                    		header("Location:" . $location);
				
				}
				
				if (($_GET['app'])=="nactive"){
				 $today = date("Y-m-d");
            $data = mysql_query("SELECT * FROM org_info  INNER JOIN logincount ON org_info.id=logincount.org_id  WHERE logincount.date = '$today' and org_info.track=0  GROUP BY org_info.id ORDER BY logincount.logcount DESC   ") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
            
                 echo "<tr id='".$info[0]."' style='color:red'>";
                 echo "<td>".$info[0]."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[3]."</td>";

                $id=$_GET['id'];
				$href_send='org_info.php?app=send&nactive&id='.$info[0];
				$href_del='org_info.php?app=delete&nactive&id='.$info[0];
				$href_back='org_info.php?app=back&nactive&id='.$info[0];
				$href_dis='org_info.php?app=dis&nactive&id='.$info[0];
				$href_approve='org_info.php?app=approve&nactive&id='.$info[0];
                                $href_view = 'org_view.php?id='.$info[0];
				
				if ($info[11]== 1)
				{
				?>
				
				<td> <a href='<?php echo $href_send ?>' type="submit" id="approve" class="btn btn-success">Send</a></td>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-success">Stop</a></td>
				<td id="delete"> <a   href='<?php echo $href_del ?>' id="delete" class="btn btn-danger" >delete</a></td>
                                <td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a></td>
				<?php
				}
				else{
			?>
				<td> <a href='<?php echo $href_approve ?>' type="submit" id="disapprove" class="btn btn-primary">Approve</a></td>
				<td id="delete"> <a  href='<?php echo $href_del ?>' id="delete" class="btn btn-danger">delete</a></td>
				<td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a>
                <?php
                 echo "</tr>";
                
				}
				
				}
				
		$today = date("Y-m-d");
            $data = mysql_query("SELECT * FROM org_info  WHERE id NOT IN (SELECT org_id FROM  logincount WHERE date='$today' ) and org_info.track=0  ORDER BY  id DESC  ") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
            
                 echo "<tr id='".$info[0]."' >";
                 echo "<td>".$info[0]."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[3]."</td>";

                $id=$_GET['id'];
				$href_send='org_info.php?app=send&nactive&id='.$info[0];
				$href_del='org_info.php?app=delete&nactive&id='.$info[0];
				$href_back='org_info.php?app=back&nactive&id='.$info[0];
				$href_dis='org_info.php?app=dis&nactive&id='.$info[0];
				$href_approve='org_info.php?app=approve&nactive&id='.$info[0];
                                $href_view = 'org_view.php?id='.$info[0];
				
				if ($info[11]== 1)
				{
				?>
				
				<td> <a href='<?php echo $href_send ?>' type="submit" id="disapprove" class="btn btn-success">Send</a></td>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-danger">Stop</a></td>
					<td id="delete"> <a  href='<?php echo $href_del ?>' id="delete" class="btn btn-danger">delete</a></td>
                                        <td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a></td>
				<?php
				}
				else{
			?>
				<td> <a href='<?php echo $href_approve ?>' type="submit" id="disapprove" class="btn btn-primary">Approve</a></td>
				<td id="delete"> <a  id="delete" class="btn btn-danger">delete</a></td>
				<td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a>
                <?php
                 echo "</tr>";
				}
				
				}		
            ?>
            
        </tbody>
    </table>

</div>
				<?php
				
				}
				
				if (($_GET['app'])=="active"){
				 $today = date("Y-m-d");
            $data = mysql_query("SELECT * FROM org_info  INNER JOIN logincount ON org_info.id=logincount.org_id  WHERE logincount.date = '$today'  and org_info.track=1  GROUP BY org_info.id ORDER BY logincount.logcount DESC   ") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
            
                 echo "<tr id='".$info[0]."' style='color:red'>";
                 echo "<td>".$info[0]."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[3]."</td>";

                $id=$_GET['id'];
				$href_send='org_info.php?app=send&nactive&id='.$info[0];
				$href_del='org_info.php?app=delete&nactive&id='.$info[0];
				$href_back='org_info.php?app=back&nactive&id='.$info[0];
				$href_dis='org_info.php?app=dis&nactive&id='.$info[0];
				$href_approve='org_info.php?app=approve&nactive&id='.$info[0];
                                $href_view = 'org_view.php?id='.$info[0];
				
				if ($info[11]== 1)
				{
				?>
				
				
					<td> <a href='<?php echo $href_back ?>' type="submit" id="disapprove" class="btn btn-success">Back</a></td>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-danger">Stop</a></td>
					<td id="delete"> <a  href='<?php echo $href_del ?>'  id="delete" class="btn btn-danger">delete</a></td>
                                        <td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a></td>
				<?php
				
				}
				else{
			?>
				<td> <a href='<?php echo $href_back ?>' type="submit" id="disapprove" class="btn btn-success">Back</a></td>
				<td> <a href='<?php echo $href_approve ?>' type="submit" id="disapprove" class="btn btn-primary">Approve</a></td>
				<td id="delete"> <a  href='<?php echo $href_del ?>' id="delete" class="btn btn-danger">delete</a></td>
				<td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a>
                <?php
                 echo "</tr>";
                
				}
				
				}
				
		$today = date("Y-m-d");
            $data = mysql_query("SELECT * FROM org_info  WHERE id NOT IN (SELECT org_id FROM  logincount WHERE date='$today' ) and org_info.track=1   ORDER BY  id DESC  ") //query the databse 
                    or die(mysql_error());

            while ($info = mysql_fetch_array($data)) {
            
                 echo "<tr id='".$info[0]."' >";
                 echo "<td>".$info[0]."</td>";
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[3]."</td>";

                $id=$_GET['id'];
				$href_send='org_info.php?app=send&nactive&id='.$info[0];
				$href_del='org_info.php?app=delete&nactive&id='.$info[0];
				$href_back='org_info.php?app=back&nactive&id='.$info[0];
				$href_dis='org_info.php?app=dis&nactive&id='.$info[0];
				$href_approve='org_info.php?app=approve&nactive&id='.$info[0];
                                $href_view = 'org_view.php?id='.$info[0];
				
				if ($info[11]== 1)
				{
				?>
				
				<td> <a href='<?php echo $href_back ?>' type="submit" id="disapprove" class="btn btn-success">Back</a></td>
				<td> <a href='<?php echo $href_dis ?>' type="submit" id="disapprove" class="btn btn-danger">Stop</a></td>
					<td id="delete"> <a  href='<?php echo $href_del ?>' id="delete" class="btn btn-danger">delete</a></td>
                                        <td><a  target="_blank" href="<?php echo $href_view ?>" type="submit" id="disapprove" class="btn btn-success">View</a></td>
				<?php
				}
				else{
			?>
				<td> <a href='<?php echo $href ?>' type="submit" id="approve" class="btn btn-success">Send</a></td>
				<td id="delete"> <a  href='<?php echo $href_del ?>'  class="btn btn-danger">delete</a></td>
                <?php
                 echo "</tr>";
				}
				
				}		
            ?>
            
        </tbody>
    </table>

</div>
				<?php
				
				}
				}
				?>
				
<script type="text/javascript" href='js/jquery-1.7.min.js'></script>
<script type="text/javascript"  >

$(document).ready(function () {


            $('#td a').click(function(){
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


	        var pathname = document.URL;
	        var idofurl = getParameterByName("id", pathname);//get the id
                var jobid=($(this).closest('tr').attr('id'));
                
                $.ajax({
                type: "post",
                url: "head_hunt1.php",
                data: {
                    cvid: idofurl,
                    jobid: jobid,
                    status:'h'
                    
                },
                success: function (data)  {
                     if (data.status == 'success') {
                            alert("Cv sent to headhunting job id:"+jobid);
                            
                        } else if (data.status == 'error') {
                            alert("Cv aleady there");
                          
                        }



                    }
            });
                
            		
		  
		  
		});

 $('#delete').on('click', function () {
 
 	alert('working')
       // var vacant = $('#vacant').val();
        //$.ajax({
          //  type: 'post',
            //url: 'jobseeker/vacant.php',
            //data: {
           //     OrgId: org
            //},
            //success: function (data) {
               
           // }

       // });
    });
	
})
</script>				
			
	   