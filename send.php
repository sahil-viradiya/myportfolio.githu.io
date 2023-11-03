<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
if(isset($_POST["send"]))
{

try {
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$name=$_POST["Name"];
$email=$_POST["Email"];
$phone=$_POST["Phone"];
$subject=$_POST["subject"];
$message=$_POST["Massage"];
$mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sahilviradiya7190@gmail.com';                     //SMTP username
    $mail->Password   = 'ibsh opcj gjcr rqit';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587; //465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_POST["email"], 'Mailer');
    $mail->addAddress('sahilviradiya7190@gmail.com', 'Admin email address');     //Add a recipient

    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Customer support Email Details';
    $mail->Body    = "<img src='https://miro.medium.com/v2/resize:fit:1358/0*arA2_5vBVR6olfUM.gif' style='width:80%; height:200px; margin:auto'>"."<br>"."Customer Name :".$name."<br>"."Customer email Id :".$email."<br>"."Customer Phone Number :".$phone."<br>"."Customer Subject :".$subject."<br>"."Customer Message :".$message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo "<script>
    alert('Thanks for Contact with Us Our one of Admin will contact with You Soon!')
    window.location='index.html';
    </script>";
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}