<?php 
$id=$_POST["id"];
$t=$_POST["t"];
$n=$_POST["n"];

session_start();
$grade=$_SESSION["t"]["grade_id"];
$teacher=$_SESSION["t"]["id"];
require "connection.php";

if(isset($n)){
    $file=explode("fakepath",$n);
    //echo($n);
    //echo($file[1]);   
    $file_data="assignments/". $file[1];
    //$file=$n[13];
    //echo($file);
}


if(empty($t)){
    echo("Please enter a title for the assignment");

}else if(empty($n)){
    echo("Please attach the assignment");
}else{
    $search=Database::search("SELECT * FROM `assignments` WHERE `lessons_id`='".$id."' AND `title`='".$t."' AND `path`='".$file_data."' AND `grade_id`='".$grade."' AND `teacher_id`='".$teacher."'");

    $search_num=$search->num_rows;
    if($search_num==1){
        echo("Note already added");

    }else if($search_num==0){
       
        Database::iud("INSERT INTO `assignments`(`lessons_id`,`path`,`title`,`grade_id`,`teacher_id`) VALUES ('".$id."','".$file_data."','".$t."','".$grade."','".$teacher."')");
        
        echo("success");
    }
}



?>