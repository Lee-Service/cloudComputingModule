<?php 
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require "vendor/autoload.php";

// Create an instance of PHPMailer class: passing 'true' enables exceptions 
$mail = new PHPMailer();

try{ 
// SMTP configuration
$mail->isSMTP();
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'leeservicecloudcomputing@gmail.com';
$mail->Password = 'Alpha123456Beta';
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption - $mail->SMTPSecure = 'tls';
$mail->Port     = 587;

// Sender info 
$mail->setFrom('leeservicecloudcomputing@gmail.com', 'LeeServiceCloudWebApp'); 
$mail->addReplyTo('leeservicecloudcomputing@gmail.com', 'Lee Service'); 

// Add a recipient 
$mail->addAddress('lservice01@qub.ac.uk'); 

// Email subject 
$mail->Subject = 'Warning - your web services may be down.'; 

// Set email format to HTML 
$mail->isHTML(true); 
// Email body content 
$mailContent = '
<h2>Notice regarding your existing web app services:</h2> 
<p>Please investigate your web app as services may have collapsed. We have detected a problem with '.$urlresult.' this occurred at: '.$formattedstarttime.' </p>
<p>Ps. This is an email by Lee Service and CodexWorld, sent via SMTP server with PHPMailer using PHP.</p> ';

$mail->Body = $mailContent; 
// Send email 
$mail->Send();
echo " EMAIL SENT TO RECIPIENT! \n";
} catch (Exception $e) {
echo " Message could not be sent. Mailer Error: {$mail->ErrorInfo} \n";
}