<?php 
require "connection.php";
session_start();
$e=$_POST["e"];
$v=$_POST["v"];

if(empty($e)){
    echo("Please enter your email");
}else if(empty($v)){
    echo("Please enter the Verification code");
}else{
    $search=Database::search("SELECT * FROM `admin` WHERE `verification_code`='".$v."' AND `email`='".$e."'");
    $search_num=$search->num_rows;
    if($search_num==1){
       
        $search_data=$search->fetch_assoc();
        $_SESSION["admin"]=$search_data;
        Database::iud("UPDATE `admin` SET `verification_code`='0' WHERE `email`='".$e."'");
        echo("success");
    }else{
        echo("Check your Details");
    }
}



?>