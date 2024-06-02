<?php 
session_start();
$admission=$_SESSION["s"]["admission_no"];
require "connection.php";

$id=$_POST["id"];
$a=$_POST["a"];

if(empty($a)){
    echo("Please attach your assignment");
}else{
    $status=Database::search("SELECT * FROM `status` WHERE `name`='not marked'");
    $status_data=$status->fetch_assoc();
    //$status_num=$status->num_rows;

    $teacher=Database::search("SELECT * FROM `assignments` WHERE `id`='".$id."'");
    $teacher_data=$teacher->fetch_assoc();

    $tid=$teacher_data["teacher_id"];
    $status_data=$status->fetch_assoc();

    $search=Database::search("SELECT * FROM `submitted assignments` WHERE `teacher_id`='".$tid."' AND `assignments_id`='".$id."' AND `student_id`='".$_SESSION["s"]["id"]."' ");
    $search_num=$search->num_rows;
   //echo($search_num);

    $file=explode("fakepath",$a);
    $file_data="assignments/".$file[1];
    //echo($file[1]);

    if($search_num==0){
        Database::iud("INSERT INTO `submitted assignments`(`student_id`,`assignments_id`,`teacher_id`,`assignment_status_id`,`submitted_sheet`) VALUES('".$_SESSION["s"]["id"]."','".$id."','".$tid."','2','".$file_data."')");
        echo("Assignment submitted");
    }else if($search_num==1){
        //echo($file[1]);
        $search_data=$search->fetch_assoc();
        //echo($search_data["id"]);
        if($search_data["assignment_status_id"]==1){
            echo("Your assignment has been already marked");
            
        }else if($search_data["assignment_status_id"]==2){
            Database::iud("UPDATE `submitted assignments` SET `submitted_sheet`='".$file_data."' WHERE `teacher_id`='".$tid."' AND `assignments_id`='".$id."' AND `assignment_status_id`='2'");
            echo("Assignment updated");
        }
    }


}





?>