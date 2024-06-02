<?php 
require "connection.php";

$id=$_POST["id"];
$f=$_POST["f"];
$m=$_POST["m"];
$r=$_POST["remarks"];

$status=Database::search("SELECT * FROM `assignment_status` WHERE `name`='marked'");

if(empty($m)){
    echo("Please enter marks");
}else if(empty($r)){
    echo("Please enter remarks");
}else if(empty($f)){
    echo("Please upload the checked sheet");
}else{
    $file=explode("fakepath",$f);
    //echo($n);
    //echo($file[1]);   
    $file_data="assignments/". $file[1];
    $status_data=$status->fetch_assoc();
    Database::iud("UPDATE `submitted assignments` SET `marks`='".$m."',`checked_sheet`='".$file_data."',`remarks`='".$r."',`assignment_status_id`='".$status_data["id"]."'
    WHERE `assignments_id`='".$id."'");
    echo("success");
}
?>