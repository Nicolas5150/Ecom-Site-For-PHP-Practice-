<?php
// Subject and Email Variables
	$emailSubject = 'Contact Form For Ecom Site';
	$webMaster = 'Nicolas5150@gmail.com';

// Grab items from the contact form html page
	$nameField = $_POST['Name'];
	$emailField = $_POST['Email'];
	$messageField = $_POST['Message'];

	$body = <<<EOD
<br><hr><br>
Name: $nameField <br>
Email: $emailField <br>
Message: $messageField <br>
EOD;

	$headers = "From: $emailField\r\n";
	$headers .= "Content-type: text/html\r\n";
	// mail the email to the webMaster described above with following call and
	// mail the sender a copy of the message as well.
	$successRecipient = mail($webMaster, $emailSubject, $body, $headers);
	$successSender = mail($emailField, $emailSubject, $body, $headers);

// Results Rendered as HTML and refresh page to confirmation page
	$theResults = <<<EOD
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html;"><br />
<meta HTTP-EQUIV="REFRESH" content="0; url=../php/contacted.php">
<style type="text/css">
</body>
</html>
EOD;
echo "$theResults";

?>
