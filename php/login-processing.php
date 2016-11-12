<?php
session_start();
if (!empty($_POST['Username']) && !empty($_POST['Password']))
{
	// Grab items from the contact form html page
	$usernameField = test_input($_POST['Username']);
	$passwordField = test_input($_POST['Password']);

	// Database retrieval
	// Secure password using sha1 encryption function
	$securedPassword = sha1($passwordField);

	// 2 Build Connection
	// Build connection in secure way
	$file = parse_ini_file("waiting.ini");

	// Store vars from file
	$host = trim($file["dbHost"]);
	$user = trim($file["dbUser"]);
	$pass = trim($file["dbPass"]);
	$name = trim($file["dbName"]);

	require("Secure/access.php");
	$access = new access($host, $user, $pass, $name);
	$access->connect();

	// Get user from access.php function
	$user = $access->getUser($usernameField);

	// Check to make sure cookie has been set
	if(isset($_COOKIE['badLogin']))
	{
		$badLogin = $_COOKIE["badLogin"];
		// Log user in with passing credientals and enough trys left
	  if($usernameField == $user["username"] && $securedPassword == $user["securedPassword"] && $badLogin > 0)
	  {
			// Reset bad cookie counter
			$badLogin = 5;
			setcookie("badLogin", $badLogin, time() + (3600), '/');
			// Start a new session bassed off the users new account
			$_SESSION['userDetails'] = array();
			$_SESSION['userDetails'][] = $user["username"];
			$_SESSION['userDetails'][] = $user["email"];
			$_SESSION['userDetails'][] = $user["firstName"];
			$_SESSION['userDetails'][] = $user["lastName"];
			// 4 Close connection
			$access->dissconnect();
			header("Location: ../php/success.php");
			exit();
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

				// 4 Close connection
				$access->dissconnect();
				header("Location: http://sulley.cah.ucf.edu/~ni927795/dig3134/NicsEcom/php/login.php");
				exit();
			}
		}
	}
	// 4 Close connection
	$access->dissconnect();
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
