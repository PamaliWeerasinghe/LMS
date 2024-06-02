
<?php 
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$sid=$_GET["sid"];


$email1=Database::search("SELECT * FROM `student` WHERE `id`='".$sid."'");
$email_num=$email1->num_rows;
for($x=0;$x<$email_num;$x++){
    $email=$email1->fetch_assoc();
  
    //echo($email2[0]);
    $verification_code=uniqid();
    
    Database::iud("UPDATE `student` SET `verification_code`='".$verification_code."' WHERE `id`='".$sid."'");
    
   

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pamalidevanga2002@gmail.com';
    $mail->Password = 'cxdgyjfbgesdtxma';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('pamalidevanga2002@gmail.com', 'GIMMICK');
    $mail->addReplyTo('pamalidevanga2002@gmail.com', 'GIMMICK');
    $mail->addAddress($email["email"]);
    $mail->isHTML(true);
    $mail->Subject = 'Student Registeration | Online Student Management System';
    $bodyContent = '<h4>Your student admission is </h4>'.$email["admission_no"].'<h4>Your Verification Code is </h4>'.$verification_code.'<br/>';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Verification code sending ';
    } else {
        echo "success";
    }


}



?>