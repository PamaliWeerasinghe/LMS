<?php
require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$code=$_POST["vc"];
$adm=$_POST["ad"];

$search=Database::search("SELECT * FROM `student` WHERE `verification_code`='".$code."' AND `admission_no`='".$adm."'");
$search_num=$search->num_rows;
$search_data=$search->fetch_assoc();




    if($search_num>1){
        echo("Please request another verification code");
     }else if($search_data["verification_code"]=='verified'){
        echo("already");
     }else if($search_num==1){
        
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

      
        //$strdate=strval($date);
        //$dt = strtotime($strdate);
        //$endDate= date("Y-m-d H:i:s", strtotime("+1 month", $dt));
        //echo($endDate);

        Database::iud("UPDATE `student` SET `first_login`='".$date."' WHERE `verification_code`='".$code."' AND `id`='".$search_data["id"]."' AND `admission_no`='".$adm."'");
        
        //Database::iud("UPDATE `student` SET `end_date`='".$enddate."' WHERE `verification_code`='".$code."' AND `id`='".$search_data["id"]."'");
    
        $student=Database::iud("UPDATE `student` SET `verification_code`='verified' WHERE `id`='".$search_data["id"]."'");
        
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
        $mail->addAddress($search_data["email"]);
        $mail->isHTML(true);
        $mail->Subject = 'Student Login | Online Student Management System';
        $bodyContent = '<h4>'.$search_data["fname"].' your username is </h4> '.$search_data["email"];
    
        $mail->Body    = $bodyContent;
    
        if (!$mail->send()) {
            echo 'Verification code sending failed to '.$search_data["email"];
        } else {
            echo 'success';
        }
        
      
        echo("success");
        
     }
    



 
?>