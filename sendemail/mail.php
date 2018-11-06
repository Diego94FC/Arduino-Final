<?php
require 'vendor/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.privateemail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin@blowyourmind.me';                 // SMTP username
$mail->Password = 'trigonometria';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('admin@blowyourmind.me');
$mail->addAddress('diego94.fc@gmail.com', 'Diego Fernandez');


$mail->addReplyTo('admin@blowyourmind.me', 'Admin');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Probando';
$mail->Body    = 'Mensaje enviado desde <b>PHP</b> <br> Probando para Arduino';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
 ?>
