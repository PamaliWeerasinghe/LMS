<?php 
session_start();
if(isset($_SESSION["academic"])){
    if($_SESSION["academic"]["verification_code"]=="verified"){
        $email=$_SESSION["academic"]["email"];
        require "connection.php";
    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Submission</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    
    <?php  include "header.php";?>
    <div class="container-fluid">
    <div class="row">
    <a href="academicPage.php" style="color: black;"><i class="bi bi-arrow-left-short fs-2"></i></a>
    </div>
    <div class="row mb-5 ">
    <div class="col-lg-2" style="background-color:white; height:100vh">
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <?php 
                        $img=Database::search("SELECT * FROM `academic_officer` WHERE `id`='".$_SESSION["academic"]["id"]."'");
                        $img_data=$img->fetch_assoc();
                        if(empty($img_data["profile_img"])){
                            ?>
                             <img src="resources/default.png" class="rounded-circle border" style="width:130px; height:130px" />
                            <?php
                        }else{
                            ?>
                             <img src="<?php echo $img_data["profile_img"]?>" class="rounded-circle border" style="width:130px; height:130px" />
                            <?php
                        }
                        ?>
                       
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid text-center">
                        <label><?php echo $_SESSION["academic"]["username"] ?></label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 d-grid text-center">
                        <label><?php  
                        $fname=$_SESSION["academic"]["fname"];
                        $lname=$_SESSION["academic"]["lname"];

                        echo( $fname." ".$lname);
                        
                        ?></label>
                    </div>

                </div>
            
                <div class="row mt-2">
                    <div class="col-lg-12 d-grid text-center">
                        <label><i><?php echo $_SESSION["academic"]["email"] ?></i></label>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-light" onclick="window.location='academicPage.php'">Dashboard</button>
                    </div>
                </div>
               

                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <?php 
                        $status=Database::search("SELECT * FROM `status` WHERE `name`='active'");
                        $status_data=$status->fetch_assoc();
                        
                        $assignment=Database::search("SELECT * FROM `submitted assignments` WHERE  `assignment_status_id`='".$status_data["id"]."'");
                        $assignment_num=$assignment->num_rows;
                        
                        ?>
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='academicMarksSubmission.php'">
                            Submit Marks
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $assignment_num ;?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='registerStudents.php'">
                            Register Students
                           
                        </button>
                    </div>
                </div>
             
               
              

             
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-danger" onclick="window.location='academicProfileUpdate.php'"><i class="bi bi-gear"></i> Update Profile</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-dark" onclick="studentLogout();"><i class="bi bi-box-arrow-left"></i> &nbsp;&nbsp;Log Out</button>
                    </div>
                </div>
                
            </div>
            <div class="list-group col-lg-10 col-12">
       
        <?php
        //echo $_SESSION["s"]["class_id"];
        $grade=Database::search("SELECT `id`,upper(`name`) FROM `grade` I");
       
        $grade_num=$grade->num_rows;
        for($g=0;$g<$grade_num;$g++){
            $grade_data=$grade->fetch_assoc();
            ?>
            <div class="row mt-3 mb-3">
            <label class="form-label fs-3 fw-bold" style="color:brown"><?php echo $grade_data["upper(`name`)"]?></label>
            </div>
            
            <?php
            
        $gradeSubject=Database::search("SELECT * FROM `subjects` INNER JOIN `grade_has_subjects` ON 
        `subjects`.`id`=`grade_has_subjects`.`subjects_id` WHERE `grade_has_subjects`.`grade_id`='".$grade_data["id"]."'");
        
        $gradeSubject_num=$gradeSubject->num_rows;
        
        if($gradeSubject_num==0){
            ?> <button type="button" class="list-group-item list-group-item-action fs-5 fw-bold" aria-current="true" >
            NO SUBJECTS
             </button><?php 
        }else{
        for($x=0;$x<$gradeSubject_num;$x++){
           
            $gradeSubject_data=$gradeSubject->fetch_assoc();
          
            $lessons=Database::search("SELECT * FROM `lessons` WHERE `grade_id`='".$grade_data["id"]."' AND `subjects_id`='".$gradeSubject_data["id"]."'");
            $lessons_num=$lessons->num_rows;
           
            ?>
            <button type="button" class="list-group-item list-group-item-action fs-5 fw-bold" aria-current="true" >
           <?php echo $gradeSubject_data["name"]?>
            </button>
            <?php 
                for($y=0;$y<$lessons_num;$y++){
                    $lessons_data=$lessons->fetch_assoc();
                    //echo($lessons_data["topic"]);
                    ?>
                 
                     <button type="button" class="list-group-item list-group-item-action">
                     <button type="button" class="list-group-item list-group-item-action"  onclick="currentlesson(<?php echo $lessons_data['id']; ?>);">
                     <?php echo $lessons_data["topic"]; ?>
                        
                    
                    </button>
                        <div class="row d-none" id="insideDetails<?php echo $lessons_data['id']; ?>">
                            <div class="col-12" style="margin-left: 10%;" >
                             <table class="border-bottom" style="width:90%">
                                <tr>
                                    <td style="color:grey" class="border"><label class="form-label">Assignment Name</label></td>
                                    <!-- <td style="color:grey"class="border"><label class="form-label">Description</label></td> -->
                                    <td style="color:grey" class="border"><label class="form-label">Student Name</label></td>
                                    <td style=" color:grey"class="border"><label class="form-label" >Teacher Name</label></td>
                                    <td style=" color:grey"class="border"><label class="form-label" >Checked Sheet</label></td>
                                    <td style=" color:grey"class="border"><label class="form-label" >Marks</label></td>
                                    <td></td>
                                    
                                </tr>
                                <?php 
                                 $assignment=Database::search("SELECT * FROM `assignments` WHERE `grade_id`='".$grade_data["id"]."' AND `lessons_id`='".$lessons_data["id"]."'");
                                 $assignment_num=$assignment->num_rows;
                                 //echo($assignment_num);
                                 for($z=0;$z<$assignment_num;$z++){
                                    $assignment_data=$assignment->fetch_assoc(); 

                                ?>
                                <tr class="border-bottom">
                                    
                                   
                                        <?php 
                                        $check=Database::search("SELECT * FROM `submitted assignments` WHERE `assignments_id`='".$assignment_data["id"]."'  ");
                                        $check_num=$check->num_rows;
                                        $check_data=$check->fetch_assoc();
                                        if($check_num==1){
                                            if($check_data["assignment_status_id"]=='1'){
                                                $student=Database::search("SELECT * FROM `student` WHERE `id`='".$check_data["student_id"]."'");
                                                $student_data=$student->fetch_assoc();

                                                $teacher=Database::search("SELECT * FROM `teacher` WHERE `id`='".$check_data["teacher_id"]."'");
                                                $teacher_data=$teacher->fetch_assoc();
                                                ?>
                                                <td class="mt-2 mb-3"><?php echo $assignment_data["title"]; ?></td>
                                                <td class="mt-2 mb-3"><?php echo $student_data["fname"]?>&nbsp;<?php echo $student_data["lname"]?></td>
                                                <td class="mt-2 mb-3"><?php echo $teacher_data["fname"]?>&nbsp;<?php echo $teacher_data["lname"]?></td>
                                                <td class="mt-2 mb-3"><a href="<?php echo $assignment_data["path"];?>" class="btn btn-warning" style="width:80%">View</a></td>
                                                <td class="mt-2 mb-3"><input type="text" class="form-control" style="width:50%" disabled placeholder="<?php echo $check_data["marks"] ?>"/></td>
                                                <td class="mt-2 mb-3"><button class="btn btn-secondary" onclick="submitMarksToStudent(<?php echo $check_data['id']?>)"><i>Submit to Student</i></button></td>
                                                <?php
                                            }
                                        }
                                   ?>
                                    
                                    
                                </tr>
                                <?php
                                 }
                                ?>

                             </table>
                            </div>
                            
                        </div> 
                    
                    </button>
                    
                    <?php
                }




            ?>
           
            
            <?php
        }
    }


       
       
            
        }
        
        ?>
        
  
    </div>
    

    </div>
    

    </div>
    <script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>
    <?php include "footer.php"?>

    <?php
    }else{
        include "register.php";
    }
    

    }else{
        include "academicSignIn.php";
    }
   