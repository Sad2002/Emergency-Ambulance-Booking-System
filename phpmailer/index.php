<?php

	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

@$name = $_POST['name'];
@$email = $_POST['email'];
@$message = $_POST['message'];



	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer();

	$mail->isSMTP();

	$mail->Host = "smtp.gmail.com";

	$mail->SMTPAuth = true;

	$mail->SMTPSecure = "tls";

	$mail->Port = "587";

	$mail->Username = "sadhanagonge@gmail.com";

	$mail->Password = "owjrdntbigbtwskh";

	$mail->Subject = "message received from contact:".$name;

	$mail->setFrom("sadhanagonge@gmail.com");

	$mail->isHTML(true);

	$mail->addAttachment('');

	$mail->Body = "Name:$name<br>Email:$email<br>Message:$message";

	$mail->addAddress($email,$name);


	if ( $mail->send() ) {
		echo "<h2><center>Message Sent..!</center></h2>";
	}else{
		echo "Message could not be sent. Mailer Error:"{$mail->ErrorInfo};
	}

	$mail->smtpClose();
