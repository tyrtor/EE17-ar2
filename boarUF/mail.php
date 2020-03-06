<!-- /* echo phpinfo();

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

/* ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = 'emil.linder@boaruf.se';
$to = "tyrtor2@gmail.com";
$subject = "Hoppas att det funkar!";
$message = "Hello World!";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo"The mail has been sent!"; */ -->
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="post">
        <label for="namn">namn</label>
        <input type="text" name="namn" id="namn">
        <label for="email">email</label>
        <input type="email" name="email" id="eamil">
        <label for="amne">ämne</label>
        <input type="text" name="amne" id="amne">
        <label for="mess">Meddelande</label>
        <textarea name="mess" id="mess" cols="30" rows="10"></textarea>
        <button>Skicka</button>
    </form>
    <?php
$namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$amne = filter_input(INPUT_POST, 'amne', FILTER_SANITIZE_STRING);
$mess = filter_input(INPUT_POST, 'mess', FILTER_SANITIZE_STRING);

    if ($namn && $email && $amne && $mess) {
        $to = $email;
        $subject = $amne;
    
        $message = $mess;
    
    // It is mandatory to set the content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers. From is required, rest other headers are optional
        $headers .= 'From: <emil.linder@boaruf.se>' . "\r\n";
    
        mail($to, $subject, $message, $headers);
    
        echo "mailet är skickat";
    } else {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    }
    ?>
</body>
</html>

