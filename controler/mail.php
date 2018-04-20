<?php

function ft_send_email($mail_to, $mail_subject, $mail_message)
{
	$subject_preferences = array(
		"input-charset" => $encoding,
		"output-charset" => $encoding,
		"line-length" => 76,
		"line-break-chars" => "\r\n"
	);
	$from_name = "Commorragh";
	$from_mail = "commorragh-noreply@student.unit.ua";


	$header = "Content-type: text/html; charset=".$encoding." \r\n";
	$header .= "From: ".$from_name." <".$from_mail."> \r\n";
	$header .= "MIME-Version: 1.0 \r\n";
	$header .= "Content-Transfer-Encoding: 8bit \r\n";
	$header .= "Date: ".date("r (T)")." \r\n";
	$header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

	if(mail($mail_to, $mail_subject, $mail_message, $header))
		return true;
	else
		return false;
}

// ft_send_email('khilenkoroman@gmail.com', 'subject', 'Message');





	// Set mail header
	// $header = "Content-type: text/html; charset=".$encoding." \r\n";
	// $header .= "From: ".$from_name." <".$from_mail."> \r\n";
	// $header .= "MIME-Version: 1.0 \r\n";
	// $header .= "Content-Transfer-Encoding: 8bit \r\n";
	// $header .= "Date: ".date("r (T)")." \r\n";
	// $header .= iconv_mime_encode("Subject", $mail_subject, $subject_preferences);

?>