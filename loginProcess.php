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
    $status=Database::search("SELECT * FROM `status` WHERE `name`='active'");
    $status_data=$status->fetch_assoc();

    $search=Database::search("SELECT * FROM `teacher` WHERE `username`='".$username."' AND `password`='".$password."' AND `status_id`='".$status_data["id"]."' 
    AND `verification_code`='verified'");
    $search_num=$search->num_rows;
    if($search_num==1){
    $search_data=$search->fetch_assoc();
    echo("success");
   
    $_SESSION["t"]=$search_data;

    }else{
        echo("Please check your login details and contact the admin");

    }

}


?>