<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
		require_once 'core/init.php';

		if(Input::exists()){
			if(Token::check(Input::get('token'))){

				$validate = new Validate();
				$validation = $validate->check($_POST, array(
					'username' => array(
						'required' => true,
						'min' => 2,
						'max' => 20,
						'unique' => 'users'
						),
					'password' => array(
						'required' => true,
						'min' => 6,
						),
					'password_again' => array(
						'required' => true,
						'matches' => 'password'
						),
					'name' => array(
						'required' => true,
						'min' => 2,
						'max' => 50
						)
					));

				if($validation->passed()){
					$user = new User();

					$salt = Hash::salt(32);
					
					try{

						$user->create(array(
							'username' => Input::get('username'),
							'password' => Hash::make(Input::get('password'), $salt),
							'salt' => $salt,
							'name' => Input::get('name'),
							'joined' => date('Y-m-d H:i:s'),
							'group' => 1
						));

						Session::flash('home', 'You have been registered and can now log in!');
						Redirect::to('index.php');

					} catch(Exception $e){
						die($e->getMessage());
					}
				} else {
					foreach ($validation->errors() as $error) {
						echo $error, '<br>';
					}
				}
			}
		}
		?>
		
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

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
		
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">Register</h2>
		        <div class="login-social-link centered">		            
		                <button class="btn btn-twitter" type="submit"> Personal Trainer</button>
		                <button class="btn btn-twitter" type="submit"> Standard User</button>
		        </div>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" placeholder="Username" autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
					<div class="field"> <br>
					<input type="password" class="form-control" name="password_again" id="password_again" autocomplete="off" placeholder="Confirm Password">
					<div class="field"> <br>
					<input type="text" class="form-control" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name" autocomplete="off" placeholder="Full Name" autofocus>
		            <br>				
				</div>					
					
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		            <button class="btn btn-theme btn-block" type="submit" value="Register"> Register</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can register via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Already have an account?<br/>
		                <a class="" href="login.php">
		                    Sing in now
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
