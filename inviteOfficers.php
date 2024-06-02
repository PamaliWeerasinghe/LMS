
<?php 
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
$t=$_POST["tid"];
$email=Database::search("SELECT * FROM `academic_officer` WHERE `id`='".$t."'");


    $email_data=$email->fetch_assoc();
    $email3=strval($email_data["email"]);
    $email2=explode("@",$email3);
    //echo($email2[0]);
    $verification_code=uniqid();
    $password=uniqid();
    Database::iud("UPDATE `academic_officer` SET `verification_code`='".$verification_code."' WHERE `id`='".$t."'");
    Database::iud("UPDATE `academic_officer` SET `password`='".$password."' WHERE `id`='".$t."'");
    Database::iud("UPDATE `academic_officer` SET `username`='".$email2[0]."' WHERE `id`='".$t."'");

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pamalidevanga2002@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('pamalidevanga2002@gmail.com', 'GIMMICK');
    $mail->addReplyTo('pamalidevanga2002@gmail.com', 'GIMMICK');
    $mail->addAddress($email_data["email"]);
    $mail->isHTML(true);
    $mail->Subject = 'Academic Officer Registeration | Online Student Management System';
    $bodyContent = '<h4>Your username is </h4> '.$email2[0].'<br/>'.'<h4>Your Verification Code is </h4>'.$verification_code.'<br/>'.'<h4>Your Password is </h4>'.$password;
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Verification code sending failed to '.$email2[0];
    } else {
        echo 'INVITED '.$email2[0];
    }





?>