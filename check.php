<?php 
session_start();
$login=$_SESSION["s"]["first_login"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$now = $d->format("Y-m-d H:i:s");


$strdate=strval($login);
$dt = strtotime($strdate);
$endDate= date("Y-m-d H:i:s", strtotime("+1 month", $dt));
echo($endDate);

?><br/><?php


// $originalTime = new DateTimeImmutable($now);
// $targedTime = new DateTimeImmutable($endDate);
// $interval = $originalTime->diff($targedTime);
// echo $interval->format("%H:%I:%S (Full days: %a)");




$now = new DateTime($date);
$lastDay= new DateTime($endDate);


// if($now)

// var_dump($date1 == $date2);
// var_dump($date1 < $date2);
// var_dump($date1 > $date2);




?>