<?php

function send_mail($to, $body, $subject)
{
	require '../PHPMailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	/*
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'your gmail username@gmail.com';
	$mail->Password = 'your gmail password';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	*/
	/* chenge this */
	$mail->From = 'smtp.gmail.com';
	$mail->FromName = 'EatLab';
	$mail->addAddress($to);
	$mail->addReplyTo('smtp.gmail.com', 'Reply');
	
	$mail->isHTML(true);
	
	$mail->Subject = $subject;
	$mail->Body    = $body;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send())
	{
	return false;
	} 
	else 
	{
	return true;
	}
}
 
?>








