<?php
// Querery database for username entered in and if it has a corresponding email
$nameField = $_POST['Username'];
// Simulating the database in which it finds the email associated to the username
// CODE WILL BE SWAPPED TO SEARCH DB FOR A MATCHING USER and associated email


$foundUsername = $user["username"];
$foundUserEmail = $user["email"];

// Only send email if a user is found in the database
if($nameField == $foundUsername )
{
	// Function to get the browser being used
	function get_browser_name($user_agent)
	{
	    if (strpos($user_agent, 'Chrome')){
				return 'Chrome';
			}
			elseif (strpos($user_agent, 'Edge')){
				return 'Edge';
			}
			elseif (strpos($user_agent, 'Firefox')){
				return 'Firefox';
			}
			elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')){
				return 'Internet Explorer';
			}
			elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')){
				return 'Opera';
			}
	    elseif (strpos($user_agent, 'Safari')){
				return 'Safari';
			}
	    return 'Other';
	}

	// Function to get the OS being used
	function get_system_name($user_agent)
	{
		// Include and instantiate the class.
		require_once 'Mobile_Detect.php';
		$detect = new Mobile_Detect;
		// Check for a specific platform with the help of the magic methods:
		if($detect->isiOS()){
 			return 'iOS';
		}
		elseif($detect->isAndroidOS()){
			return 'Android';
		}
		elseif (preg_match('/linux/i', $user_agent)) {
			return 'Linux';
		 }
		elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
			return 'Mac OS';
		 }
		elseif (preg_match('/windows|win32/i', $user_agent)) {
			return 'Windows';
		 }
		else{
			require 'Not Available';
		 }
 	}

	// Call the function to store what browser is being used:
	$browserType = get_browser_name($_SERVER['HTTP_USER_AGENT']);

	// Call the function to store what OS is being used:
	$systemType = get_system_name($_SERVER['HTTP_USER_AGENT']);

	// Subject and Email Variables
	$emailSubject = 'Multiple Attempts Logging Into Account';

	// Grab items from the contact form html page
	$emailField = $foundUserEmail;
	$messageField = "This message is to notify you for your account security </br>
	5 unsuccessful attempts were processed in trying to log into your account. ";

	$body = <<<EOD
<br><hr><br>
Dear: $nameField <br><br>
$messageField <br><br>
Browser: $browserType <br>
System: $systemType <br>
EOD;

	$headers = "From: $emailField\r\n";
	$headers .= "Content-type: text/html\r\n";
	// mail the email to the webMaster described above with following call and
	$successSender = mail($emailField, $emailSubject, $body, $headers);

// Results Rendered as HTML and refresh page to confirmation page
	$theResults = <<<EOD
<html>
<head>
<title></title>
<style type="text/css">
</body>
</html>
EOD;
echo "$theResults";
}
?>
