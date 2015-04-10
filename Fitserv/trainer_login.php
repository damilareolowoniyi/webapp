<?php require_once 'core/init.php'; 
if(Input::exists()){

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
            'email' => array(
                'required' => true,
                'email' => true,
                ),
            'password' => array('required' => true)
        ));

        if($validation->passed()){
            $trainer = new Trainer();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $trainer->login(Input::get('email'), Input::get('password'), $remember);
            
            if($login) {
                Redirect::to('index.php');
            } else {
                echo '<p>Sorry, logging in failed. </p>';
            }
        
        } else {
            foreach ($validation->errors() as $error) {
            echo $error, '<br>';
            }
        }
    }

?>

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
                        <a href="index.php#page-top"></a>
                    </li>
					 <li>
                        <a class="page-scroll" href="index.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#feature">Feature</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#pricing">Pricing</a>
                    </li>  
					 <li>
                        <a class="page-scroll" href="index.php#mobile">Mobile App</a>
                    </li>					 	
                   
					<li>
                        <a class="page-scroll" href="user_register.php">Sign Up</a>
                    </li>
					 <li>
                        <a class="page-scroll" href="user_login.php">Sign In</a>
                    </li>
                    <li>
                         <?php

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
            
                 <div id="login-page">
        <div class="container">
               
        
              <form class="form-login" action="" method="post">
                <h2 class="form-login-heading">Trainer Login</h2>
                
                <div class="login-wrap">
                    <input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email" autofocus>
                    <br>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
                    <div class="field"> <br>
                    
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                    </div>
                                       
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <button class="btn btn-theme btn-block" type="submit" value="Log in"><i class="fa fa-lock"></i> SIGN IN</button><div class="login-social-link centered">       

                        <a href="user_login.php">Not a Trainer? Login as Standard User here!</a>
                    </div>                               
        
                </div>        
                         
              </form>     
        
       
            </div> <br><br><br><br><br>
        </div>
        </div>
    </header>
	
	
	
	
	    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
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