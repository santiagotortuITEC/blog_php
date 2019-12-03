<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
include ('../includes/newpassword_includes.php');
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
$mail->isSMTP(); // Send using SMTP
$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'technologyblog0@gmail.com'; // SMTP username
$mail->Password = 'technology.Blog0'; // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
$mail->Port = 587; // TCP port to connect to

//Recipients
$mail->setFrom('technologyblog0@gmail.com');
$mail->addAddress($email, $email); // Add a recipient
/* $mail->addAddress('ellen@example.com'); // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com'); */ 

// Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
//$mail->addAttachment('Screenshot_2019-09-30-22-30-24-730_com.facebook.katana.jpg', 'new.jpg'); // Optional name 

// Content
$mail->isHTML(true); 
$mail->Subject = 'Blog Technologies - Nueva contraseña';
$mail->Body = "Su nueva contraseña es: {$new_password}" ;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}