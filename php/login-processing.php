<?php
if (isset($_POST['Username']))
{
	// Grab items from the contact form html page
	$usernameField = $_POST['Username'];
	$passwordField = $_POST['Password'];

	// Simulated database retrieval
	$databaseUsername = "dig3134user";
	$databasePassword = "dig3134pass";

  if($usernameField == $databaseUsername && $passwordField == $databasePassword)
  {
		// Creating cookies for valid login
		setcookie('loggedIn');
		setcookie("databaseUsername", $databaseUsername);
		//$_SESSION['loggedIn'] = 'YES';
		//$_SESSION['username'] = 'dig3134user';

		echo ("correct!");
		header("Location: ../php/success.php");
	}
	else
	{
		header("Location: http://sulley.cah.ucf.edu/~ni927795/dig3134/NicsEcom/php/login.php#openLoginModal");
		echo ("Something went wrong");
	}
}
?>
