<?php
include_once "../config/header.php";
?>
<div class="container">

    <p>
        <a href="http://lobjobs.lk/user/admin.php?id=nactive" type="button" class="btn btn-primary btn-lg">New Cvs</a>
        <a href="http://lobjobs.lk/user/admin.php?id=active" type="button" class="btn btn-default btn-lg">Approved Cvs</a>
        <a href="http://lobjobs.lk/user/org_info.php" type="button" class="btn btn-default btn-lg">Organization Info</a>
        <a href="http://lobjobs.lk/user/comments_info.php" type="button" class="btn btn-default btn-lg">Comments</a>
    </p>
    <table class="table">
        <thead>
            <tr>

                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Website</th>
                <th>Contact person </th>
                <th>designation </th>
              
                <th>email </th>
            </tr>
        </thead>
        <tbody>


            <?php
            include_once "../config/db.class.php";

            $data = mysqli_query("SELECT * FROM org_info") //query the databse 
                    or die(mysqli_error());

            while ($info = mysqli_fetch_array($data)) {
          
                echo "<td>".$info[1]."</td>";
                echo "<td>".$info[2]."</td>";
                echo "<td>".$info[3]."</td>";
                echo "<td>".$info[4]."</td>";
                echo "<td>".$info[5]."</td>";
                echo "<td>".$info[6]."</td>";
                echo "<td>".$info[7]."</td>";
            }
            ?>
            
        </tbody>
    </table>

</div>