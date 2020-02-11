<?php
/* echo phpinfo();

require_once('./PHPMailer-5.2-stable/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'cpsrv45.misshosting.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'test@boaruf.se';
$mail->Password = 'b9b9cT7x7SVWGPq';
$mail->SetFrom('no-reply@boaruf.se');
$mail->Subject = 'Välkommen upp';
$mail->Body = 'Du den där rapen var inte trevlig!';
$mail->AddAddress('hannes1232010@hotmail.com');

if(!$mail->send()){
    echo "Mailer Error:" . $mail->ErrorInfo;
}else{
    echo "message has been sent successfully";
} */

ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = "emil.linder@boaruf.se";
$to = "hannes1232010@hotmail.com";
$subject = "Testing";
$message = "Hello World!";
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);
echo"mailet är skickat";

?>