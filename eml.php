<?php
include "mailer/class.phpmailer.php";
include "mailer/class.smtp.php";
//require_once "vendor/autoload.php";

$email = 'ajitgupta9639@gmail.com';
$name = "ajit";

// /ajit mailer strat
$mail = new PHPMailer;
define('EMAIL','in.ajitgupta9639@gmail.com');
define('PASS','Pulsar180');

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'in.ajitgupta9639@gmail.com');
$mail->addAddress($email,$name);     // Add a recipient
$mail->addReplyTo(EMAIL);

$mail->Subject = 'verificatoin code';
$mail->Body    = "<p style='color:DodgerBlue;font-family:arial;font-size:35px'>Hi $name,</p>

 ";
$mail->AltBody = "Hi $name";

if(!$mail->send()) {
    
    return 'Message could  not be sent ' .' Mailer Error: ' . $mail->ErrorInfo;
} else {
    return true;
//    echo 'Message has been sent';    
}    
// ajit mailer end

?>
      
   