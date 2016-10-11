<?php
if (!empty($_POST['Username']) && !empty($_POST['Password']))
{
	// Grab items from the contact form html page
	$usernameField = test_input($_POST['Username']);
	$passwordField = test_input($_POST['Password']);

	// Simulated database retrieval
	$databaseUsername = "dig3134user";
	$databasePassword = "dig3134pass";

	// Check to make sure cookie has been set
	if(isset($_COOKIE['badLogin']))
	{
		$badLogin = $_COOKIE["badLogin"];
		// Log user in with passing credientals and enough trys left
	  if($usernameField == $databaseUsername && $passwordField == $databasePassword && $badLogin > 0)
	  {
			// Creating cookies for valid login and reset bad cookie counter
			setcookie('loggedIn');
			setcookie("databaseUsername", $databaseUsername);
			$badLogin = 5;
			setcookie("badLogin", $badLogin, time() + (3600), '/');
			header("Location: ../php/success.php");
		}
		// Begin subtracting trys from user login attempts
		else
		{
		    $badLogin --;
		    setcookie("badLogin", $badLogin, time() + (3600), '/');
			// Send a security email to the email on file for the username when 0 or below.
			if ($badLogin <= 0)
			{
				include '../php/badLogin.php';
				header("Location: http://sulley.cah.ucf.edu/~ni927795/dig3134/NicsEcom/php/login.php");
				exit();
			}
		}
	}
}
// Gets here if one of the boxes are unfilled or if less than 5 attempts are made
header("Location: http://sulley.cah.ucf.edu/~ni927795/dig3134/NicsEcom/php/login.php#openLoginModal");


// Clean entered data from login
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace('(','',$data);
  $data = str_replace(')','',$data);
  return $data;
}
?>
