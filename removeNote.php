<?php 
$id=$_GET["lid"];

require "connection.php";

$notes=Database::search("SELECT * FROM `lesson_notes` WHERE `id`='".$id."' ");

$notes_num=$notes->num_rows;


if($notes_num==1){
    Database::iud("DELETE FROM `lesson_notes` WHERE `id`='".$id."'");
    echo("success");

}else{
    echo("fail");
}



?>