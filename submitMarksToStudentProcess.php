<?php 
$id=$_GET["aid"];

require "connection.php";
$status=Database::search("SELECT * FROM `assignment_status` WHERE `name`='given to student'");
$status_data=$status->fetch_assoc();

Database::iud("UPDATE `submitted assignments` SET `assignment_status_id`='".$status_data["id"]."' WHERE `id`='".$id."'");
echo("success");


?>