<?php
session_start();
require 'connection.php';

$total="LKR 3000.00";//
$uname="";
$hname="";//
$Cnum=""; 
$address="";//
$contact="";
$payid="";
if(isset($_SESSION["payment_method"])){$payid=$_SESSION["payment_method"];}
if(isset($_POST["username"])){$uname=$_POST["username"];}
if(isset($_POST["holder-name"])){$hname=$_POST["holder-name"];}
if(isset($_POST["card-number"])){$Cnum=$_POST["card-number"];}
if(isset($_POST["address"])){$address=$_POST["address"];}
if(isset($_POST["contact-number"])){$contact=$_POST["contact-number"];}

if($total===''){echo "<script> alert('Unknown Error occured in Getting the total');location='trialPay.php' </script>";}
if($uname===''){echo "<script> alert('Unknown Error occured in Getting the Username');location='trialPay.php' </script>";}
if($hname===''){echo "<script> alert('Unknown Error occured in Getting the Holders name');location='trialPay.php' </script>";}
if($Cnum===''){echo "<script> alert('Unknown Error occured in Getting the Card Number');location='trialPay.php' </script>";}
if($address===''){echo "<script> alert('Unknown Error occured in Getting the Admission Number');location='trialPay.php' </script>";}
if($contact===''){echo "<script> alert('Unknown Error occured in Getting the Email Address');location='trialPay.php' </script>";}


$trial=Database::search("SELECT * FROM `payment_status` WHERE `status`='paid'");
$trial_data=$trial->fetch_assoc();

$tpay=Database::search("SELECT * FROM `trial_payment` WHERE `payment_status_id`='".$trial_data["id"]."'");
$tpay_data=$tpay->fetch_assoc();

Database::iud("UPDATE `student` SET `trial_payment_id`='".$tpay_data["id"]."' WHERE `id`='".$_SESSION["s"]["id"]."'");

echo "<script> alert('Payment success');location='index.php' </script>";
?>
