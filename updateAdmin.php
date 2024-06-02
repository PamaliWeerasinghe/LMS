<?php 
$f=$_POST["f"];
$l=$_POST["l"];
$t=$_POST["t"];


session_start();
$id=$_SESSION["admin"]["id"];
$image=explode("fakepath",$t);
    
$profile_img="resources/".$image[1];
require "connection.php";

$search=Database::search("SELECT * FROM `admin` WHERE `id`='".$id."' AND `profile_img`='".$profile_img."' AND `fname`='".$f."' AND `lname`='".$l."'");
$search_num=$search->num_rows;

if($search_num==1){
    echo("Already updated");
}else{
    if(empty($f)&&empty($l)&&empty($a)){
        Database::iud("UPDATE `admin` SET `profile_img`='".$profile_img."' WHERE `id`='".$id."'");

    }
   
}


echo("success");

?>