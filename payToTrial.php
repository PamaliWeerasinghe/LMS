<?php
session_start();
require "connection.php";

if(isset($_SESSION["s"])){

    $admission = $_GET["a"];
    $username = $_GET["u"];
    // $umail = $_SESSION["s"]["email"];
    $id=$_SESSION["s"]["id"];
    $array;

    //$order_id = uniqid();

    $student_rs = Database::search("SELECT * FROM `student` WHERE `id`='".$id."'");
    $student_data = $student_rs->fetch_assoc();
    
    $status=Database::search("SELECT * FROM `payment_status` WHERE `status`='paid'");
    $status_data=$status->fetch_assoc();


    Database::iud("UPDATE `student` SET `trial_payment_id`='".$status_data["id"]."' WHERE `id`='".$id."'");
    
        $amount = 3000;

        $fname = $_SESSION["s"]["fname"];
        $lname = $_SESSION["s"]["lname"];
    
       

        $array["id"] = $id;
       
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
       
        // $array["umail"] = $umail;

        // echo json_encode($array);

        echo "success";

    }


?>