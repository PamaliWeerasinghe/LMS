<?php 
require "connection.php";

$username=$_POST["username"];
$password=$_POST["password"];
$verCode=$_POST["verCode"];

$teacher=Database::search("SELECT * FROM `teacher` WHERE `username`='".$username."' AND `password`='".$password."' AND `verification_code`='".$verCode."'");
$teacher_num=$teacher->num_rows;
if($teacher_num==1){
    $status=Database::search("SELECT * FROM `status` WHERE `name`='active'");
    $status_data=$status->fetch_assoc();
    Database::iud("UPDATE `teacher` SET `status_id`='".$status_data["id"]."' WHERE `username`='".$username."' AND `password`='".$password."' AND `verification_code`='".$verCode."'");
    Database::iud("UPDATE `teacher` SET `verification_code`='verified' WHERE `username`='".$username."' AND `password`='".$password."' AND `verification_code`='".$verCode."'");
    echo("success");

}else{
    echo("Please check your login details");
}

?>