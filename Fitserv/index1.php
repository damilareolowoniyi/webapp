<?php
require_once 'core/init.php';

if(Session::exists('home')){
	echo '<p>' . Session::flash('home') . '</p>';
}

/* login according to profil rights
$_SESSION['admin'] = $row["admin"];
if ($_SESSION['admin'] == 1){
    header("location:dashboard.php");
    }
else {
    header("location:index.php");
    }
$dbh = null;
}
else {
echo "Wrong Username or Password";
}
?>
*/

$user = new User();
if($user->isLoggedIn()){
?>
	<p>Hello <a href="userprofile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>

	<ul>
		<li><a href="logout.php">Log out</a></li>	
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change password</a></li>

	</ul>

<?php

	if($user->hasPermission('trainer')){
		echo '<p>You are a Personal Trainer!</p>';
	}
} else {
	echo '<p> You need to <a href="login.php">log in</a> or <a href="register.php">register</a></p>';
}
