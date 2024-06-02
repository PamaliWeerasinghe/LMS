<?php 
session_start();
if(isset($_SESSION["admin"])){
    
        $email=$_SESSION["admin"]["email"];
        require "connection.php";
    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Assignments</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    
    <?php  include "header.php";?>
    <div class="container-fluid">
    <div class="row">
    <a href="adminPanel.php" style="color: black;"><i class="bi bi-arrow-left-short fs-2"></i></a>
    </div>
    <div class="row mb-5 ">
    <div class="col-lg-2" style="background-color:white; height:100vh">
                <div class="row mt-2">
                    <div class="col-12 text-center">
                        <?php 
                        $img=Database::search("SELECT * FROM `admin` WHERE `id`='".$_SESSION["admin"]["id"]."'");
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
                
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid text-center">
                        <label><?php  
                        $fname=$_SESSION["admin"]["fname"];
                        $lname=$_SESSION["admin"]["lname"];

                        echo( $fname." ".$lname);
                        
                        ?></label>
                    </div>
                </div>
            
                <div class="row mt-2">
                    <div class="col-lg-12 d-grid text-center">
                        <label><i><?php echo $_SESSION["admin"]["email"] ?></i></label>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-light" >Dashboard</button>
                    </div>
                </div>
               

                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='manageStudents.php'">
                           Manage Students
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              <?php 
                              $student=Database::search("SELECT * FROM `student`");
                              $student_num=$student->num_rows;
                              echo $student_num;
                              ?>

                            <span class="visually-hidden">unread messages</span>
                            </span>
                            
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='manageTeachers.php'">
                           Manage Teachers
                           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              <?php 
                              $teacher=Database::search("SELECT * FROM `teacher`");
                              $teacher_num=$teacher->num_rows;
                              echo $teacher_num;
                              ?>

                            <span class="visually-hidden">unread messages</span>
                            </span>
                            
                            
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='manageOfficers.php'">
                           Manage Officers
                           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              <?php 
                              $officer=Database::search("SELECT * FROM `academic_officer`");
                              $officer_num=$officer->num_rows;
                              echo $officer_num;
                              ?>

                            <span class="visually-hidden">unread messages</span>
                            </span>
                            
                            
                        </button>
                    </div>
                </div>
             
             
               
                

               
               
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-danger" onclick="window.location='academicProfileUpdate.php'"><i class="bi bi-gear"></i> Update Profile</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-dark" onclick="academicLogout();"><i class="bi bi-box-arrow-left"></i> &nbsp;&nbsp;Log Out</button>
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
                                    <td style="color:grey" class="border"><label class="form-label">Assignment title</label></td>
                                    <!-- <td style="color:grey"class="border"><label class="form-label">Description</label></td> -->
                                    
                                    <td style=" color:grey"class="border"><label class="form-label" >Teacher Name</label></td>
                                    <td style=" color:grey"class="border"><label class="form-label" >Assignment</label></td>
                                    
                                    
                                    
                                </tr>
                                <?php 
                                 $a=Database::search("SELECT * FROM `assignments` WHERE `lessons_id`='".$lessons_data["id"]."'");
                                 $a_num=$a->num_rows;
                                 //echo($assignment_num);
                                 for($z=0;$z<$a_num;$z++){
                                    $a_data=$a->fetch_assoc(); 

                                ?>
                                <tr class="border-bottom">
                                    
                                   
                                   
                                                <td class="mt-2 mb-3"><?php echo $a_data["title"]; ?></td>
                                                <?php 
                                                $nt=Database::search("SELECT * FROM `teacher` WHERE `id`='".$a_data["teacher_id"]."'");
                                                $nt_data=$nt->fetch_assoc();
                                                ?>
                                               
                                                <td class="mt-2 mb-3"><?php echo $nt_data["fname"]?>&nbsp;<?php echo $nt_data["lname"]?></td>
                                                <td class="mt-2 mb-3"><a href="<?php echo $a_data["path"];?>" class="btn btn-warning" style="width:80%">View</a></td>
                                                
                                               
                                               
                                    
                                    
                                    
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
        include "academicSignIn.php";
    }
   