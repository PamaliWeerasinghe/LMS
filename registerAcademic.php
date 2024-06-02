<?php 
require "connection.php";

$username=$_POST["username"];
$password=$_POST["password"];
$verCode=$_POST["verCode"];

$status=Database::search("SELECT * FROM `status` WHERE `name`='active'");
$status_data=$status->fetch_assoc();

$academic=Database::search("SELECT * FROM `academic_officer` WHERE `username`='".$username."' AND `password`='".$password."' AND `verification_code`='".$verCode."'");
$academic_num=$academic->num_rows;
if($academic_num==1){
    Database::iud("UPDATE `academic_officer` SET `status_id`='".$status_data["id"]."' WHERE `username`='".$username."' AND `password`='".$password."' AND `verification_code`='".$verCode."'");
    Database::iud("UPDATE `academic_officer` SET `verification_code`='verified' WHERE `username`='".$username."' AND `password`='".$password."' AND `verification_code`='".$verCode."'");
    echo("success");

}else{
    echo("Please check your login details");
}

?>