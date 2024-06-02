<?php 

require "connection.php";

$s=$_POST["sid"];
$n=$_POST["new"];
if($n==0){
    echo("Please select a class");
}else{
    $search=Database::search("SELECT * FROM `student` WHERE `class_id`='".$n."' AND `id`='".$s."'");
    $search_num=$search->num_rows;
    if($search_num==0){
        Database::iud("UPDATE `student` SET `class_id`='".$n."' WHERE `id`='".$s."'");
        $status=Database::search("SELECT * FROM `payment_status` WHERE `status`='not paid'");
        $status_data=$status->fetch_assoc();

        $grade=Database::search("SELECT * FROM `class` WHERE `id`='".$n."'");
        $grade_data=$grade->fetch_assoc();

        Database::iud("INSERT INTO `yearly_payment`(`payment_status_id`,`student_id`,`grade_id`) VALUES('".$status_data["id"]."','".$s."','".$grade_data["grade_id"]."') ");

        
        echo("Class updated");

    }else if($search_num==1){
        echo("Class already updated");
    }




}




?>