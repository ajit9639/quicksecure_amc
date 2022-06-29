<?php
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='kamlesh0657@gmail.com';
$mail->Password='Kis@1601';

$mail->setFrom('kamlesh0657@gmail.com','kamlesh');
$mail->addAddress('kamlesh1601@gmail.com');
$mail->addReplyTo('kamlesh1601@gmail.com');

$mail->isHTML(true);
$mail->Subject='php mailer subject';
$mail->Body='<h1>this mail is from php mailer</h1>';

if(!$mail->send()){
    echo "messsage cannot send";
}
else{
    echo "messsage send";

}
?>