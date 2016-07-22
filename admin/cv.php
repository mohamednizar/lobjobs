<?php
$id = $_GET['id'];
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=cv_".$id.".doc");





echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">';
?>
<style>
.greenDiv{
  
    background-color: green ;
    
}
h4{
    background-color: #428bca;
    color:#ffffff;
    border-radius: 6px;
    margin-top: 12px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    padding-top: 12px;
    
}
.h4{
    background-color: #428bca;
    color:#ffffff;
    border-radius: 6px;
    margin-top: 12px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    padding-top: 12px;
    
}
tr{
    line-height: 10px;
}

</style>
</head>
<body>
<?php


include_once "../config/db.class.php";


$url2 = 'http://lobjobs.lk/admin/image.php?id='.$id;
$data = mysql_query("SELECT * FROM user_info WHERE id='$id'")
        or die(mysql_error());
while ($info = mysql_fetch_array($data)) {
    $basic_info = ($info['basic_info']);
    $email = ($info['user_name']);
    
    $image = $info['pic_info'];
    

    $basic_info_array = explode('|', $basic_info);
    if (!isset($basic_info)) {//removing the offset error
        $basic_info = null;
    }
    
   			

    $apply_positions = ($info['cat']);
    echo '<h4>Personal Information </h4>';
    echo "<div>Positions       "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $apply_positions . "</div>";
    echo "<div>Name            "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[0] . "</div>";
    echo "<div>Date of Birth   "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[1] . "</div>";
    echo "<div>Sex             "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[2] . "</div>";
    echo "<div>Marrid Status   "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[3] . "</div>";
    echo "<div>Nationality     "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[4] . "</div>";
    echo "<div>Preferred Salary"."&nbsp&nbsp&nbsp:" . $basic_info_array[5] . "</div>";
    echo "<div>Contact No      "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[7] . "</div>";
    echo "<div>Address         "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $basic_info_array[8] . "</div>";
    echo "<div>Email           "."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:" . $email . "</div>";
    

    echo '<h4>O/L Information</h4> ';
    echo '<table>';
    echo '<th>';
    echo '<tr><td>Subject</td><td>Grade</td></tr>';
    echo '</th>';
    echo '<tbody>';
    $string = ($info['ol_info']);
    $array3 = explode(',', $string);
    foreach ($array3 as $info3) {
        if ($info3 == ":") {
            
        } else {


            $array_each_sub = explode(':', $info3);

            if (!isset($array_each_sub[0])) {
                $array_each_sub[0] = null;
            }
            if (!isset($array_each_sub[1])) {
                $array_each_sub[1] = null;
            }

            if (!$info3 == "") {

                echo "<tr><td>" . $array_each_sub[0] . "</td><td>:" . $array_each_sub[1] . "</td></tr>";
            }
        }
    }

    echo '</tbody>';
    echo '</table>';
    echo '<h4>A/L Information </h4>';
    echo '<table>';
    echo '<th>';
    echo '<tr><td>Subject</td><td>Grade</td></tr>';
    echo '</th>';
    echo '<tbody>';
    $string = ($info['al_info']);
    $array3 = explode(',', $string);
    foreach ($array3 as $info3) {
        if ($info3 == ":") {
            
        } else {
            $array_each_sub = explode(':', $info3);

            if (!isset($array_each_sub[0])) {
                $array_each_sub[0] = null;
            }
            if (!isset($array_each_sub[1])) {
                $array_each_sub[1] = null;
            }

            if (!$info3 == "") {

                echo "<tr><td>" . $array_each_sub[0] . "</td><td>:" . $array_each_sub[1] . "</td></tr>";
            }
        }
    }

    echo '</tbody>';
    echo '</table>';


    echo '<h4>Higher Education <h4> ';
    echo '<table>';
    echo '<tbody>';
    echo '<th>';
    echo '<tr ><td>University</td><td>Institute</td><td>Qualification</td><td>Status</td></tr>';
    echo '</th>';
    $string1 = ($info['pro_info']);
    $proinfo = explode(',', $string1);

    foreach ($proinfo as $sin_pro) {

        $array_each_sub = explode(':', $sin_pro);
        if (!isset($array_each_sub[0])) {
            $array_each_sub[0] = null;
        }
        if (!isset($array_each_sub[1])) {
            $array_each_sub[1] = null;
        }
        if (!isset($array_each_sub[2])) {
            $array_each_sub[2] = null;
        }
        if (!isset($array_each_sub[3])) {
            $array_each_sub[3] = null;
        }

        echo "<tr><td>" . $array_each_sub[0] . "</td><td>" . $array_each_sub[1] . "</td><td>" . $array_each_sub[2] . "</td><td>" . $array_each_sub[3] . "</td>";

        if (isset($array_each_sub[4])) {

            echo"<td>" . $array_each_sub[4] . "</td></tr>";
        }
    }
    echo '</tbody>';
    echo '</table>';

    echo '<h4>Language Skills</h4>';
    $os = array();
    $string1 = ($info['lan_info']);
    $proinfo = explode(',', $string1);
    foreach ($proinfo as $sin_pro) {
        $os[] = $sin_pro;
    }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Language</th>
                <th>Speaking</th>
                <th>Reading</th>
                <th>Writing</th>
                <th>Listening</th>
                <th>Letter Writing</th>
                <th>Article Writing</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>English</th>
                <td name="ES" <?php
                if (in_array("ES", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="ER" <?php
                if (in_array("ER", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="EW" <?php
                    if (in_array("EW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
                <td name="EL" <?php
                if (in_array("EL", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="ELW" <?php
                if (in_array("ELW", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="EAW" <?php
                if (in_array("EAW", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>


            </tr>
            <tr>
                <th>Sinhala</th>
                <td name="SS" <?php
                if (in_array("SS", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="SR" <?php
                if (in_array("SR", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="SW" <?php
                    if (in_array("SW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
                <td name="SL" <?php
                if (in_array("SL", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="SLW" <?php
                if (in_array("SLW", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="SAW" <?php
                    if (in_array("SAW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
            </tr>
            <tr>
                <th>Tamil</th>
                <td name="TS" <?php
                if (in_array("TS", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="TR" <?php
                if (in_array("TR", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="TW" <?php
                    if (in_array("TW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
                <td name="TL" <?php
            if (in_array("TL", $os)) {
                echo "class='greenDiv'";
            }
            ?> </td>
                <td name="TLW" <?php
            if (in_array("TLW", $os)) {
                echo "class='greenDiv'";
            }
                    ?> </td>
                <td name="TAW" <?php
                    if (in_array("TAW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
            </tr>
            <tr>
                <th>Arabic</th>
                <td name="AS" <?php
                if (in_array("AS", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="AR" <?php
                if (in_array("AR", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="AW" <?php
                    if (in_array("AW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
                <td name="AL" <?php
                if (in_array("AL", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="ALW" <?php
                if (in_array("ALW", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="AAW" <?php
                if (in_array("AAW", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
            </tr>
            <tr>
                <th>Hindi</th>
                <td name="HS" <?php
                if (in_array("HS", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="HR" <?php
                if (in_array("HR", $os)) {
                    echo "class='greenDiv'";
                }
                ?> </td>
                <td name="HW" <?php
                    if (in_array("HW", $os)) {
                        echo "class='greenDiv'";
                    }
                    ?> </td>
                <td name="HL" <?php
    if (in_array("HL", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="HLW" <?php
    if (in_array("HLW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="HAW" <?php
    if (in_array("HAW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
            </tr>
            <tr>
                <th>Urudu</th>
                <td name="US" <?php
    if (in_array("US", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UR" <?php
    if (in_array("UR", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UW" <?php
    if (in_array("UW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UL" <?php
    if (in_array("UL", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="ULW" <?php
    if (in_array("ULW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UAW" <?php
    if (in_array("UAW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
            </tr>
            <tr>
                <th>French</th>
                <td name="US" <?php
    if (in_array("US", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UR" <?php
    if (in_array("UR", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UW" <?php
    if (in_array("UW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UL" <?php
    if (in_array("UL", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="ULW" <?php
    if (in_array("ULW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
                <td name="UAW" <?php
    if (in_array("UAW", $os)) {
        echo "class='greenDiv'";
    }
    ?> </td>
            </tr>
        </tbody>
    </table>

    <?php
    echo'<h4>Computer Skills</h4>';
    echo '<table>';
    echo '<tbody>';
    echo '<th>';
    echo '<tr><td>Skill</td><td>Experience Level</td><td>Years</td></tr>';
    echo '</th>';
    $string1 = ($info['com_info']);
    $proinfo = explode(',', $string1);

    foreach ($proinfo as $sin_pro) {

        $array_each_sub = explode(':', $sin_pro);
        if (!isset($array_each_sub[0])) {
            $array_each_sub[0] = null;
        }
        if (!isset($array_each_sub[1])) {
            $array_each_sub[1] = null;
        }
        if (!isset($array_each_sub[2])) {
            $array_each_sub[2] = null;
        }


        echo "<tr><td>" . $array_each_sub[0] . "</td><td>" . $array_each_sub[1] . "</td><td>" . $array_each_sub[2] . "</td></tr>";
    }
    echo '</tbody>';
    echo '</table>';

	echo'<h4>Work Experience</h4>';
    echo '<table>';
    
    echo '<tbody>';
    echo '<th>';
    echo '<tr><td>Company</td><td>Position</td><td>Years</td></tr>';
    echo '</th>';
    $string1 = ($info['wok_info']);
    $proinfo = explode(',', $string1);

    foreach ($proinfo as $sin_pro) {

        $array_each_sub = explode(':', $sin_pro);
        if (!isset($array_each_sub[0])) {
            $array_each_sub[0] = null;
        }
        if (!isset($array_each_sub[1])) {
            $array_each_sub[1] = null;
        }
        if (!isset($array_each_sub[2])) {
            $array_each_sub[2] = null;
        }


    echo "<tr><td>" . $array_each_sub[0] . "</td><td>" . $array_each_sub[1] . "</td><td>" . $array_each_sub[2] . "</td></tr>";
    
     
        }
  
    echo '</tbody>';
    echo '</table>';

?>

    <div>
    <?php
    echo'<h4>Driving Skills</h4>';
     echo '<table>';
    
    echo '<tbody>';

   
    $string1 = ($info['drive_info']);
    $proinfo = explode(',', $string1);
    //echo ($info['pro_info']);
    //print_r ($al_subs);
    foreach ($proinfo as $sin_pro) {
        
        if (!isset($sin_pro)) {
            $sin_pro = null;
        }
        echo "<tr><td>" . $sin_pro ."</td></tr>";
        
    }

    echo '</tbody>';
    echo '</table>';

  
    echo  '<h4>Suburbs knowledge</h4>';
         echo '<table>';
   
    echo '<tbody>';
    $string1 = ($info['city_info']);
    $proinfo = explode(',', $string1);
    //echo ($info['pro_info']);
    //print_r ($al_subs);
    foreach ($proinfo as $sin_pro) {
       if (!isset($sin_pro)) {
            $sin_pro = null;
        }
        echo "<tr><td>" . $sin_pro ."</td></tr>";
}
    echo '</tbody>';
    echo '</table>';

}

?>
    
    </div>
</body>
</html>
