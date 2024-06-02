<?php 
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$e=$_POST["e"];


if(empty($e)){
    echo("Please enter your email");
}else{

    $search=Database::search("SELECT * FROM `admin` WHERE `email`='".$e."'");
    $search_num=$search->num_rows;
    if($search_num==1){
        $verification_code=uniqid();
    
    Database::iud("UPDATE `admin` SET `verification_code`='".$verification_code."' WHERE `email`='".$e."'");
    
   

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
    $mail->addAddress($e);
    $mail->isHTML(true);
    $mail->Subject = 'Admin Login | Online Student Management System';
    $bodyContent = '<h4>Your verification code is </h4>'.$verification_code;
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Verification code sending ';
    } else {
        echo "success";
    }







   

    }else{
    echo("Your email is invalid");
    }
   



  
    
    

   
}



?>