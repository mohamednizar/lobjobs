<?php
include_once "../config/header.php";

?>
<body>


    <div class="container form_body">
        <div class="row">
            <div class="step">Basic Information</div>	<div class="step">Academic Information</div><div class="step">Professional Information</div><div class="step">Upload your CV</div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <!-- OL class info-->
                <h3 class="Head"> Add your O/L results</h3>
                <form class="form-inline" role="form">
                    <select id="subject_ol" name="subject_ol" class="multiselect"  >

                        <option value="0">Select Subject</option>
                        <?php
                        $data = mysql_query("SELECT * FROM subjects_ol")
                                or die(mysql_error());
                        while ($info = mysql_fetch_array($data)) {
                            $sub_ol = preg_replace('/\s+/', '_', $info['subject_name']);
                            ?>

                            <option value='<?php echo $info['subject_name']; ?>'><?php echo $info['subject_name']; ?></td></option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="form-group other_sub">

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="other_sub_ol" id="other_sub_ol" placeholder="Subject Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <select id="ol_grade"  class="multiselect"  >
                            <option value="">Select</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="S">S</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                            <option value="W">W</option>
                        </select>
                    </div>

                    <a class="btn btn-default" id="add_ol" role="button">Add</a>
                </form>

                <table id="subject_ol_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>


                        </tr>
                    </thead>
                    <tbody id="subject_table">

                    </tbody>
                </table>

            </div>

        </div><!-- end of row -->



        <div class="row">
            <div class="col-md-12">
                <!-- OL class info-->
                <h3 class="Head">Add your A/L results</h3>
                <form class="form-inline" role="form">
                    <select id="subjects_al" name="subjects_al" class="multiselect select_other"  >

                        <option value="">Select Subject</option>
                        <?php
                        $data = mysql_query("SELECT * FROM subjects_al")
                                or die(mysql_error());
                        while ($info = mysql_fetch_array($data)) {
                            $sub = preg_replace('/\s+/', '_', $info['subject_name']);
                            ?>

                            <option value='<?php echo $info['subject_name']; ?>'><?php echo $info['subject_name']; ?></td></option>
                            <?php
                        }
                        ?>
                    </select>

                    <div class="form-group other_sub_al">

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="other_sub_al_input" id="other_sub_al_input" placeholder="Subject Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <select id="grade_al"  class="multiselect"  >
                            <option value="">Select</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="S">S</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                            <option value="W">W</option>
                        </select>
                    </div>
                    <a class="btn btn-default" id="add_al" role="button">Add</a>
                </form>

                <table id="subjects_al_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>


                        </tr>
                    </thead>
                    <tbody id="subject_table_al">

                    </tbody>
                </table>

            </div>
        </div><!-- end of row -->



        <div class="row">
            <div class="col-md-12">
                <h3 class="Head"> Add your Higher Education Skills</h3>
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="Professional Level">Professional Level</label>
                        <select class="pro_level multiselect"  >
                            <option value="">Select place</option>
                            <option value="University">University</option>
                            <option value="Institute">Institute</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="University">University Name </label>
                        <input type="name" class="form-control" id="University" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">courseName</label>
                        <input type="email" class="form-control" id="courseName" placeholder="Enter Course Name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Status</label>
                        <select class="status multiselect"  >
                            <option value="Completed">Completed</option>
                            <option value="Following">Following</option>

                        </select>
                    </div>
                    <div  class="stage form-group">
                        <label class="sr-only" for="exampleInputEmail2">Stage</label>
                        <input type="email" class="form-control" id="stage_duration" placeholder="Stage">
                    </div>

                    <a class="btn btn-default" id="add_course_edu" role="button">Add</a>
                </form>
                <table id="course" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Stage</th>

                        </tr>
                    </thead>
                    <tbody id="subject_table_course">

                    </tbody>
                </table>
            </div>
        </div><!-- end of row-->


        <div class="row">


            <div class="col-md-12">
                <h3 class="Head">Add your working Experience</h3>
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="Organization">Organization</label>
                        <input type="email" class="form-control" id="Organization" placeholder="Enter Organization">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="Designation">Designation</label>
                        <input type="email" class="form-control" id="Designation" placeholder="Designation">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="Period">Period</label>
                        <select class='period multiselect' >
                            <option value=''>Select experience</option>
                            <option value='Currently Working'>Currently Working</option>
                            <option value='less than year'>less than Year</option>
                            <option value='1'>1+</option>
                            <option value='2'>2+</option>
                            <option value='3'>3+</option>
                            <option value='4'>4+</option>
                            <option value='5'>5+</option>
                            <option value='6'>6+</option>
                            <option value='7'>7+</option>
                            <option value='8'>8+</option>
                            <option value='10+'>10+</option>
                            <option value='15+'>15+</option>
                            <option value='20+'>20+</option>
                            <option value='25+'>25+</option>
                            <option value='30+'>30+</option>

                        </select>
                    </div>


                    <a class="btn btn-default" id="add_course" role="button">Add</a>
                </form>
                <table id="work_table" class="table table-hover">
                    <thead>
                        <tr>

                            <th>Organization</th>
                            <th>Designation</th>
                            <th>Period</th>

                        </tr>
                    </thead>
                    <tbody id="work_ex">

                    </tbody>
                </table>







            </div><!-- end of col-md-6--> 
        </div>		


        <button class="btn btn-primary btn-lg" id="next3" role="button">Submit</button>

    </div><!-- end of col-md-6-->  



</div><!-- end of row--> 


</div><!-- /.container -->


<!-- Initialize multiselect  plugin: -->

<script type="text/javascript">
    $(document).ready(function () {
        $('.multiselect').multiselect();





    });//end of document ready




</script>
<script type="text/javascript">

    $(document).ready(function () {

        $("#work_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });
    
    $(document).ready(function () {

        $("#course").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });
    
    $(document).ready(function () {

        $("#subjects_al_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });
    
    $(document).ready(function () {

        $("#subject_ol_table").on('click', '.delete', function () {

            $(this).closest('tr').remove();//remove the closest tr when you click the x mark 
        });

    });

//get subject on click
    $(document).ready(function () {
    
    
    	



        $(".other_sub").fadeOut();

        $(".other_sub_al").fadeOut();
        var other_ol = false;
        var other_al = false;
        $(function () {

            $('#subject_ol').on('change', function () {
                var value_ol = this.value;
                if (value_ol == "Others") {
                    $(".other_sub").fadeIn();
                    other_ol = true;
                }
                else {
                    $(".other_sub").fadeOut();
                    other_ol = false;
                }

            });
        });

        $(function () {
            $('#subjects_al').on('change', function () {
                var value = this.value;
                if (value == "Others") {
                    $(".other_sub_al").fadeIn();
                    other_al = true;
                }
                else {
                    $(".other_sub_al").fadeOut();
                    other_al = false;
                }

            });
        });


        $(function () {

            $("#add_ol").click(function () {
                var subjects = $("#subject_ol").val();
                var grade = $("#ol_grade").val();

                if (!grade == "0") {
                    var other_sub_ol = $("#other_sub_ol").val();
                    if (other_ol) {
                        $('#subject_table').append('<tr class="sub_row" ><td class="ol_result">' + other_sub_ol + '</td><td class="ol_result">' + grade + '</td><td><a  class="delete close">X</a></td></tr>');
                    }
                    else {
                        $('#subject_table').append('<tr class="sub_row" ><td class="ol_result">' + subjects + '</td><td class="ol_result">' + grade + '</td><td><a  class="delete close">X</a></td></tr>');
                    }

                }
            });
            
            $('td').click(function () {

            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }


        });

        $(".body_location").hide();

//$(".body_other_industry").hide();

        $('.location').click(function () {

            $(".body_location").toggle();
        });

        });

        $(function () {

            $("#add_al").click(function () {
                var subjects_al = $("#subjects_al").val();
                var grade_al = $("#grade_al").val();
                if (!grade_al == "0") {
                    var other_sub_al_input = $("#other_sub_al_input").val();
                    if (other_al) {
                        $('#subject_table_al').append('<tr class="sub_row_al" ><td class="al_result">' + other_sub_al_input + '</td><td class="al_result">' + grade_al + '</td><td><a  class="delete close">X</a></td></tr>');
                    }
                    else {
                        $('#subject_table_al').append('<tr class="sub_row_al" ><td class="al_result">' + subjects_al + '</td><td class="al_result">' + grade_al + '</td><td><a  class="delete close">X</a></td></tr>');
                    }

                }


            });
            $('td').click(function () {

            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }


        });

        $(".body_location").hide();

//$(".body_other_industry").hide();

        $('.location').click(function () {

            $(".body_location").toggle();
        });

        });


        $("#add_course_edu").on('click', function () {
            var courseName = $("#courseName").val();
            var status = $(".status").val();
            var University = $("#University").val();
            var stage = $("#stage_duration").val();
            var pro_level = $(".pro_level").val();

            if (!courseName == "") {
                if (status == "Completed") {
                    $('#subject_table_course').append('<tr class="sub_row" ><td class="university">' + pro_level + ':' + University + '</td><td class="course">' + courseName + '</td><td class="status" >' + status + '</td><td class="stage"></td><td><a  class="delete close">X</a></td></tr>');
                }
                else {
                    $('#subject_table_course').append('<tr class="sub_row" ><td class="university">' + pro_level + ":" + University + '</td><td class="course">' + courseName + '</td><td class="status" >' + status + '</td><td class="stage">' + stage + '</td><td><a  class="delete close">X</a></td></tr>');
                }
            }
        });
        $('td').click(function () {

            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }


        });

        $(".body_location").hide();

//$(".body_other_industry").hide();

        $('.location').click(function () {

            $(".body_location").toggle();
        });

    });//end of document ready

</script>
<script type="text/javascript">

    $(document).ready(function () {







        $(".stage").fadeOut();
        $(".status").on('change', function () {


            var val = $(this).val();

            if (val == "Following")
            {

                $(".stage").fadeIn();

            }
            else {
                $(".stage").fadeOut();

            }

        });

        $("#add_course").on('click', function () {
            var Organization = $("#Organization").val();
            var period = $(".period").val();
            var Designation = $("#Designation").val();
            if (!Organization == "") {
                $('#work_ex').append('<tr class="sub_row" ><td>' + Organization + '</td><td>' + Designation + '</td><td>' + period + '</td><td><a  class="delete close">X</a></td></tr>');
            }
        });

        $('td').click(function () {

            if (!$(this).hasClass("greenDiv")) {
                $(this).addClass("greenDiv");
            } else {
                $(this).removeClass("greenDiv");
            }


        });

        $(".body_location").hide();

//$(".body_other_industry").hide();

        $('.location').click(function () {

            $(".body_location").toggle();
        });

    });

</script>

<?php
include_once "../config/footer.php";
?>
    
