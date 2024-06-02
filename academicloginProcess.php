<?php
$username=$_POST["u"];
$password=$_POST["p"];

session_start();

require "connection.php";

if(empty($username)){
    echo("Please enter the username");
}else if(empty($password)){
    echo("Please enter the password");
}else{
    $search=Database::search("SELECT * FROM `academic_officer` WHERE `username`='".$username."' AND `password`='".$password."'");
$search_num=$search->num_rows;
if($search_num==1){
    $search_data=$search->fetch_assoc();
    echo("success");
   
    $_SESSION["academic"]=$search_data;

}else{
    echo("Please check your username and the password");

}
}


?>