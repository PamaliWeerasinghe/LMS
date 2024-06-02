<?php


$f=$_POST["f"];
$l=$_POST["l"];
$e=$_POST["e"];
$a=$_POST["a"];
$c=$_POST["c"];
$s=$_POST["s"];
$trial=$_POST["trial"];
$yearly=$_POST["yearly"];

require "connection.php";

if(empty($a)){
    echo("Please enter the student admission");
}else if(empty($f)){
    echo("Please enter the first name");
}else if(empty($l)){
    echo("Please enter the last name");
}else if(empty($e)){
    echo("Please enter the email");
}else if($c==0){
    echo("Please set a class");
}else if($s==0){
    echo("Please set a status");
}else{
    $payment=Database::search("SELECT * FROM `payment_status` WHERE `id`='".$yearly."'");
    $payment_data=$payment->fetch_assoc();
    $add=Database::search("SELECT * FROM `student` WHERE `admission_no`='".$a."'");
    $add_num=$add->num_rows;
    if($add_num==0){
        $student=Database::search("SELECT * FROM `student` WHERE `fname`='".$f."' AND `lname`='".$l."' AND `email`='".$e."' AND `admission_no`='".$a."' AND `class_id`='".$c."'
        AND `status_id`='".$s."' AND `trial_payment_id`='".$trial."'");
        $student_data=$student->fetch_assoc();
        
        $grade=Database::search("SELECT * FROM `grade` INNER JOIN `class` ON `class`.`grade_id`=`grade`.`id` WHERE `class`.`id`='".$c."'");
        $grade_data=$grade->fetch_assoc();
        $student_num=$student->num_rows;
        if($student_num==0){
            Database::iud("INSERT INTO `student`(`fname`,`lname`,`email`,`class_id`,`status_id`,`trial_payment_id`,`admission_no`) VALUES
            ('".$f."','".$l."','".$e."','".$c."','".$s."','".$trial."','".$a."')");

            $student1=Database::search("SELECT * FROM `student` WHERE `fname`='".$f."' AND `lname`='".$l."' AND `email`='".$e."' AND `admission_no`='".$a."' AND `class_id`='".$c."'
            AND `status_id`='".$s."' AND `trial_payment_id`='".$trial."'");
            $student1_data=$student1->fetch_assoc();


        
            $year=Database::search("SELECT * FROM `yearly_payment` WHERE `grade_id`='".$grade_data["id"]."' AND `student_id`='".$student1_data["id"]."'
            AND `payment_status_id`='".$payment_data["id"]."' ");
            $year_num=$year->num_rows;
            //echo($year_num);
            if($year_num==0){
                Database::iud("INSERT INTO `yearly_payment`(`payment_status_id`,`student_id`,`grade_id`) VALUES('".$payment_data["id"]."','".$student1_data["id"]."','".$grade_data["grade_id"]."')");
            }
        
        }else if($student_num==1){
            $student2=Database::search("SELECT * FROM `student` WHERE `fname`='".$f."' AND `lname`='".$l."' AND `email`='".$e."' AND `admission_no`='".$a."' AND `class_id`='".$c."'
            AND `status_id`='".$s."' AND `trial_payment_id`='".$trial."'");
            $student2_data=$student2->fetch_assoc();

            $yearpay=Database::search("SELECT * FROM `yearly_payment` WHERE `grade_id`='".$grade_data["grade_id"]."' AND `student_id`='".$student2_data["id"]."'
            AND `payment_status_id`='".$yearly."' ");
            $yearpay_num=$yearpay->num_rows;
            if($yearpay_num==0){
                Database::iud("INSERT INTO `yearly_payment`(`payment_status_id`,`student_id`,`grade_id`) VALUES('".$payment_data["id"]."','".$student2_data["id"]."','".$grade_data["grade_id"]."') ");
            }
        
        }
        echo("success");

        

    }else{
        echo("Student admission already inserted");
    }



}




?>