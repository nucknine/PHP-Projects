<?php
	ini_set("SMTP", "localhost");
	ini_set("smtp_port", "25");
	ini_set("sendmail_from", "");
	$to = "oleg@kodeks.karelia.ru";
	$subject = "Проба пера";

	$headers = "Content-Type: text/html;charset=utf-8\r\n";
	$headers .= "To: Петя <oleg@kodeks.karelia.ru>\r\n";
	$headers .= "Cc: lena@mail.ru\r\n";
	$headers .= "Bcc: sveta@mail.ru\r\n";
	$headers .= "From: Федя <fedya@mail.ru>\r\n";
	$body = "<h1>Отправляю письмо Васе и Пете</h1>";

	if( mail($to, $subject, $body, $headers))
		echo "Письмо отправлено";
	else
		echo "Письмо отправить не удалось";
?>