<?php
if (isset($_POST['Username']))
{
	// Grab items from the contact form html page
	$usernameField = $_POST['Username'];
	$passwordField = $_POST['Password'];

	// Simulated database retrieval
	$databaseUsername = "dig3134user";
	$databasePassword = "dig3134pass";

	// Log user in with passing credientals
  if($usernameField == $databaseUsername && $passwordField == $databasePassword)
  {
		// Creating cookies for valid login
		setcookie('loggedIn');
		setcookie("databaseUsername", $databaseUsername);
		//$_SESSION['loggedIn'] = 'YES';
		//$_SESSION['username'] = 'dig3134user';

		header("Location: ../php/success.php");
	}
	// Begin subtracting trys from user login attempts
	else
	{
		if(isset($_COOKIE['badLogin']))
	  {
	    $badLogin = $_COOKIE["badLogin"];
	    $badLogin --;
			// Update cookie to keep track of bad logins and push hour back to start
	    setcookie("badLogin", $badLogin, time() + (3600), '/');
	  }
		if ($badLogin == 0){
			include '../php/badLogin.php';
			header("Location: http://sulley.cah.ucf.edu/~ni927795/dig3134/NicsEcom/php/login.php");
		}
		else{
			header("Location: http://sulley.cah.ucf.edu/~ni927795/dig3134/NicsEcom/php/login.php#errorLoginModal");
		}
	}
}
?>
