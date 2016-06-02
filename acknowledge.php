<?php
if (isset($_POST['send'])) {
	$to = 'ian@flynncrest.com';
	$subject = 'Feedback from my site';
	$message = 'Name: ' . $_POST['name'] . "\r\n\r\n";
	$message .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
	$message .= 'Message: ' . $_POST['message'];
	$headers = "From: webmaster@flynncrest.com\r\n";
	$headers .= 'Content-Type: text/plain; charset=utf-8';
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	if ($email) {
	   $headers .= "\r\nReply-To: $email";
	}
	$success = mail($to, $subject, $message, $headers);
	echo $headers;
	echo $message;
}
?>

<!DOCTYPE html>
<html>
<head>
<title><?php if (isset($success) && $success) { ?>Thank You<?php } 
else { ?>Oops!<?php } ?></title>
</head>
<body>
<?php if (isset($success) && $success) { ?>
<h1>Thank You</h1>
Your message has been sent.
<?php } else { ?>
<h1>Oops!</h1>
Sorry, there was a problem sending your message.
<?php } ?>
</body>
</html>

