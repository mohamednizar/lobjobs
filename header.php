<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <link rel="shortcut icon" href="http://lobjobs.lk/images/favicon.png?v=2" />

        <title>Lobjobs.lk</title>

        <!-- Bootstrap core CSS -->
       
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <link href="css/bootstrap-social.css" rel="stylesheet">
         <link href="css/style.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Exo+2:400,600' rel='stylesheet' type='text/css'>
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        <!-- jQuery library (served from Google) -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <!-- bxSlider CSS file -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!--multiselect plugin's CSS and JS: -->
        <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="js/jobseeker.js"></script>



        <link href="css/jquery.bxslider.css" rel="stylesheet" />
    </head>
    <!-- NAVBAR
    ================================================== -->
    <body>

        <div class="container_head">

            <div id="inner_head">
                <img class="logo" src="images/logo.png"/>
                <span class="slogan">Your Career Partner</span>
            </div>

        </div>
        <!--end of header-->


        <div class="container_head_nav">

            <div class="row">


            </div>

            <div class="navbar-wrapper">


                <div class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="container">
                         <div class="row">
                             <div class="col-md-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li class="active"><a href="job_seeker.php">Job Seekers</a></li>
                                <li class="active"><a href="organization.php">Employers</a></li>
                                <li class="active"><a href="services.php?cat=All Categories">Vacancies</a></li>
                                <li class="active"><a href="ourservices.php">About Us</a></li>
                                <li class="active"><a href="contactus.php">Contact Us</a></li>



                            </ul>
                        </div>
                             </div>
                             <div class="col-md-offset-2 col-md-2  signin">
                        <?php
                        $html_name = basename($_SERVER['PHP_SELF']);
                        if ($html_name == "organization.php") {
                            ?>

                                 <a type="button" href="employers/signin.php?cat=org" class="col-xs-12 btn btn-success">Sign in</a>
                            
                            <?php
                        }
                        
                            if ($html_name == "job_seeker.php") {
                            ?>

                            <a type="button" href="jobseeker/signin.php?cat=seek" class="col-xs-12 btn btn-success">Sign in</a>
                            
                            <?php
                        }
                        ?>
                             </div>
                         </div>
                    </div>
                </div>

            </div>

        </div><!-- end of inner conainer-->
        
        <br><br><br><br>