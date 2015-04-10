<?php require_once 'core/init.php'; ?>
<!DOCTYPE html>

<html lang="en">
 
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fitserv</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	
	<!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Fitserv</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					 <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#feature">Feature</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#pricing">Pricing</a>
                    </li>  
					 <li>
                        <a class="page-scroll" href="#mobile">Mobile App</a>
                    </li>				 	
                    
					<li>
                        <a class="page-scroll" href="user_register.php">Sign Up</a>
                    </li>
					 <li>
                        <a class="page-scroll" href="user_login.php">Sign In</a>
                    </li>
                    <li>
                         <?php
                         // The bellow checks if the user is in session and verifies their permision whether personal trainer or standard users
                         // then logs them into the correct profile. e.g. trainerprofile.php or userprofile.php
                            
                            if(Session::exists('home')){
                                echo '<p>' . Session::flash('home') . '</p>';
                            }

                            $user = new User();
                            if($user->isLoggedIn()){

                                 if($user->hasPermission('trainer')){
                                    ?>
                                    <p>Hello <a href="trainerprofile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
                            <?php
                                    echo '<p>You are a Personal Trainer!</p>';
                                }
                                else
                                {
                                    ?>
                                    <p>Hello <a href="userprofile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
                                    <?php
                                    echo '<p>You are a Standard User!</p>';
                                }
                            }
                            ?>                            
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                
            </div>
        </div>
    </header>
	
	<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">What is Fitserv?</h3>

                    <p style="color:black;">
                    The personal trainer market is growing in Ireland and people are engaging in fitness industry, but 
                    the problem is, it's difficult to find a personal trainer. More importantly, the right personal trainer to help you achieve your goals.

                    <i><strong>Fitserv</strong></i> is a location based cloud application which connects people to personal trainer services. <br />
                    As part of our final year project, we will deliver a prototype with some of the critical features of FitServ. The prototypes will be in the form of: <br /> 
                    <ul>
                        <li style="color:black;"><i><strong>Web application</strong></i></li>
                        <li style="color:black;"><i><strong>Mobile application</strong></i></li>                      
                    </ul>                    
                    </p>
                </div>
            </div>            
        </div>
    </section>

    <!-- Fitserv Features Section -->
    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Features</h2>
                    <h3 class="section-subheading text-muted">Fitserv application key features</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Find &amp; Book Peronal Trainers</h4>
                    <p class="text-muted">FitServ application solution offers people ways to easily find professional trainers and help

engage with them easily to achieve their health and fitness goals.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Manage Schedule</h4>
                    <p class="text-muted">FitServ helps personal trainers manage and keep track of their clients and schedule more efficiently and effectively</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-th-large fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Manage Diet &amp; Workouts</h4>
                    <p class="text-muted">Fitserv helps personal trainers and standard users manage their exercise and diet plans, as well as their work out plans</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:black;">Pricing</h2>
                    <h3 class="section-subheading text-muted" style="color:black;">Pricing information will go here!</h3>
                </div>
            </div>
            <!-- Some more information can go here also!-->          
        </div>
    </section>
    	
	<!-- Mobile App Section -->
    <section id="mobile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Download Mobile App</h2>
                    <h3 class="section-subheading text-muted">Information about the Mobile App will go here!</h3>
                </div>
            </div>
            <!-- More information about the Mobile App Section -->
        </div>
    </section>
		
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Fitserv.com 2015</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
