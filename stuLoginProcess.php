<?php
$username=$_POST["u"];
$admission=$_POST["p"];

session_start();

require "connection.php";

if(empty($admission)){
    echo("Please enter the student admission number");
}else if(empty($username)){
    echo("Please enter the username");
}else{
    $status=Database::search("SELECT * FROM `status` WHERE `name`='active'");
    $status_data=$status->fetch_assoc();

    $search=Database::search("SELECT * FROM `student` WHERE `email`='".$username."' AND `admission_no`='".$admission."' AND `status_id`='".$status_data["id"]."' 
    AND `verification_code`='verified'");
    $search_num=$search->num_rows;
    if($search_num==1){
    $search_data=$search->fetch_assoc();
    echo("success1");
   
    $_SESSION["s"]=$search_data;

    }else{
        echo("Please check your login details and contact the admin");

    }

}


?>