<?php 
$id=$_GET["aid"];

require "connection.php";

$assignment=Database::search("SELECT * FROM `assignments` WHERE `id`='".$id."' ");

$assignment_num=$assignment->num_rows;


if($assignment_num==1){
    Database::iud("DELETE FROM `assignments` WHERE `id`='".$id."'");
    echo("success");

}else{
    echo("fail");
}



?>