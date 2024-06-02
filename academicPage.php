<?php 
session_start();
require "connection.php";
if(isset($_SESSION["academic"])){
    if($_SESSION["academic"]["verification_code"]=='verified'){
        $id=$_SESSION["academic"]["id"];
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Portal</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <?php include "header.php";?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-2" style="background-color:white; height:100vh">
                <div class="row mt-5">
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
                        <button class="btn btn-light" >Dashboard</button>
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
                        <button class="btn btn-light" onclick="window.location='registerStudents.php'">Register Student</button>
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
            
            <div class="col-lg-10" style="background-color: #FFFFE0;">
                <!-- classroom -->
                    <div class="row" style="background-color:white ;" id="classroom">
                        <div class="col-12">
                      
                        </div>
                    </div>
                    <div class="row " style="margin:10px; background-color:white; height:88vh; margin-top:20px" id="dashboard">
                        <div class="row mt-2">
                            <div class="col-lg-5" style="height:88vh">
                                <div class="row" style=" height:42vh">
                                    <div class="row mt-2">
                                        <div class="col-12 d-grid">
                                           <button class="btn btn-danger fs-5" onclick="academicViewNotes();"><img src="resources/book.png" style="width:100px"/><br/>Lesson notes</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style=" height:42vh">
                                    <div class="row mt-2">
                                        <div class="col-12 d-grid">
                                           <button class="btn btn-warning fs-5" onclick="academicViewAssignments();"><img src="resources/assignment.png" style="width: 100px;"/><br/><span class="mt-2">View Assignments</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 s1 mb-1 col-12" style="height:87vh;">
                            <div class="row">
                                <div class="col-12">
                                <div class="row mt-2" style="height: 85vh; overflow-y:scroll" >
                                    <div class="mb-3">
                           
                                        <div class="row text-center"><label class="form-label fs-5">NON VERIFIED STUDENTS</label></div>
                                        <?php 
                                        $student2=Database::search("SELECT * FROM `student` 
                                        WHERE   
                                        `verification_code`!='verified' OR `verification_code` IS  NULL ");

                                        $student2_num=$student2->num_rows;
                                        //echo($teacher_num);
                                        for($x=0;$x<$student2_num;$x++){
                                            $student2_data=$student2->fetch_assoc();
                                          ?>
                                            <div class="row alert alert-secondary" role="alert">
                                                <div class="col-8">
                                                <input type="text"class="form-control" placeholder=" <?php echo $student2_data["fname"]?> <?php echo $student2_data["lname"]?>"/>
                                                </div>
                                                <div class="col-4 d-grid">
                                                <button class="btn btn-secondary" onclick="inviteStudentToJoin(<?php echo $student2_data['id']?>);" id="studentInvite">Invite</button>
                                                </div>
                                                
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>

                                </div>
                              


                                </div>
                            </div>
                           
                        
                        
                            </div>
                        </div>

                    </div>
                <!-- classroom -->
                    

            </div>
            
          
        </div>
    </div>
    <?php include "footer.php"?>
<script src="script.js"></script>
<script src="bootstrap.bundle.js"></script>    


</body>
</html>
        
        
        
        
        
        <?php


    }else{
        include "register.php";
    }
   
}else{
    require "index.php";
}
?>

