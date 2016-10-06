<?php
// Querery database for username entered in and if it has a corresponding email
$nameField = $_POST['Username'];
// Simulating the database in which it finds the email associated to the username
// CODE WILL BE SWAPPED TO SEARCH DB FOR A MATCHING USER and associated email
$foundUsername = "dig3134user";
$foundUserEmail = "Nicolas5150@gmail.com";

// Only send email if a user is found in the database
if($nameField == $foundUsername )
{
// Subject and Email Variables
	$emailSubject = 'Multiple Attempts Logging Into Account';

// Grab items from the contact form html page
	$emailField = $foundUserEmail;
	$messageField = "5 unsuccessful attempts were processed in trying to log
  into your account. This message is to notify you for your account security";

	$body = <<<EOD
<br><hr><br>
Userame: $nameField <br><br>
Message: $messageField <br>
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
