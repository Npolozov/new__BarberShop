<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';

$admin_email = array();
foreach ( $_POST["admin_email"] as $key => $value ) {
	array_push($admin_email, $value);
}

$mail = new PHPMailer;
$mail->CharSet = 'utf-8'; 
$mail->IsHTML(true);

$name = $_POST['name'];
$phone = $_POST['tel'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'npolozov0@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'polozov251190'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; 


$mail->setFrom('npolozov0@gmail.com'); // от кого будет уходить письмо?

foreach ( $admin_email as $key => $value ) {
	$mail->addAddress($value);
}


$mail->Subject = 'Заявка';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email;
$mail->AltBody = '';

$mail->send();
?>