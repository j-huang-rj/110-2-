<?php
require("DBconnect.php");

$subject = $_POST["subject"];
$message = $_POST["message"];
$sql = "SELECT * FROM email";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = 2;
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->Charset = 'UTF-8';
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'example@gmail.com';                    //SMTP username
    $mail->Password   = 'password';                             //SMTP password
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable implicit TLS encryption
    $mail->SMTPSecure = "ssl";
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );

    //Recipients
    $mail->setFrom('example@gmail.com', 'senderName');
    if($result = mysqli_query($link, $sql)){     
        while($row = mysqli_fetch_assoc($result)){
            $mail->addAddress($row["email"]);
        }
    }
    // $mail->addReplyTo('info@example.com', 'Information');        //回覆
    // $mail->addCC('cc@example.com');                              //附件
    // $mail->addBCC('bcc@example.com');                            //密件

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');                //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');           //Optional name

    //Content
    $mail->isHTML(true);                                            //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = nl2br($message);
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    echo 'Message has been sent.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>