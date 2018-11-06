<?php

require 'sendemail/vendor/phpmailer/PHPMailerAutoload.php';

$recv = $_GET['tmp'];
echo "<br>";

if($recv == 1 ) { // Si se recive eso del arduino se envia el correo de que hay gente afuera.



			$mail = new PHPMailer;

//$mail->SMTPDebug = 3;

$mail->isSMTP();
$mail->Host = 'mail.privateemail.com';
$mail->SMTPAuth = true;
$mail->Username = 'admin@blowyourmind.me';
$mail->Password = 'trigonometria';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('admin@blowyourmind.me');
$mail->addAddress('diego94.fc@gmail.com', 'Diego Fernandez');


$mail->addReplyTo('admin@blowyourmind.me', 'Admin');

$mail->isHTML(true);

$mail->Subject = 'Persona fuera de su casa';
$mail->Body    = 'El timbre se ha activado';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 $mail->send();




}
else if($recv != 1) // Si se recibe desde el arduino otro valor diferente a 1.
{															// No es necesario pero bueh, por seguridad (?).
	echo "Invalid input";
}



?>
