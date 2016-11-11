<?php
// Secure password using sha1 encryption function
$securedPassword = sha1($password);

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

// Check if user is in database before entering the registraion
$user = $access->getUser($username);
if ($username == $user["username"]){
  $usernameErr == "Username Taken";
}

else
{
  // 3 Insert user info into database
  $result = $access->registerUser($username, $firstName, $lastName, $email ,$securedPassword, $phoneNumber, $streetAddress, $cityName, $zipNumber, $stateLetters, $numberAndStreet);

  if($result)
  {
      // Get user from access.php function
      $user = $access->getUser($username);

      // Start a new session bassed off the users new account
      $_SESSION['userDetails'] = array();
      $_SESSION['userDetails'][] = $user["username"];
      $_SESSION['userDetails'][] = $user["email"];
      $_SESSION['userDetails'][] = $user["firstName"];
      $_SESSION['userDetails'][] = $user["lastName"];

      // Set bad cookie count to 0 and send to success page
      $badLogin = 5;
      setcookie("badLogin", $badLogin, time() + (3600), '/');
      header("Location: ../php/success.php");
  }

  else{
      $returnArray["status"] = "400";
      $returnArray["message"] = "Data not passing register user function";
  }
}
  // 4 Close connection
  $access->dissconnect();
return;
?>
