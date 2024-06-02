<?php 
session_start();
require "connection.php";
if(isset($_SESSION["t"])){
    if($_SESSION["t"]["verification_code"]=='verified'){
        $id=$_SESSION["t"]["id"];
        $email=$_SESSION["t"]["email"];
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
    <?php include "header.php";?>
        <div class="row">
        <div class="col-lg-2" style="background-color:white; height:100vh">
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <?php 
                        $img=Database::search("SELECT * FROM `teacher` WHERE `email`='".$email."'");
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
                        <label><?php  
                        $fname=$_SESSION["t"]["fname"];
                        $lname=$_SESSION["t"]["lname"];

                        echo( $fname." ".$lname);
                        
                        ?></label>
                    </div>
                </div>
            
                <div class="row mt-2">
                    <div class="col-lg-12 d-grid text-center">
                        <label><i><?php echo $_SESSION["t"]["email"] ?></i></label>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-light" onclick="window.location='teacherPage.php'">Lesson Notes</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-light" onclick="window.location='addAssignments.php'"> Assignments</button>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='viewAssignments.php'">
                            Mark Assignments
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php 
                             $notMarkedStatus=Database::search("SELECT * FROM `assignment_status` WHERE `name`='not marked'");
                             $notMarkedStatus_data=$notMarkedStatus->fetch_assoc();
                             $notMarked=Database::search("SELECT * FROM `submitted assignments` WHERE `assignment_status_id`='".$notMarkedStatus_data["id"]."'");
                             $notMarked_num=$notMarked->num_rows;
                            echo($notMarked_num);
                             ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                    </div>
                </div>
             
               

           
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-danger"  onclick="window.location='teacherProfileUpdate.php'"><i class="bi bi-gear"></i> Update Profile</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-dark" onclick="teacherLogout();"><i class="bi bi-box-arrow-left"></i> &nbsp;&nbsp;Log Out</button>
                    </div>
                </div>
                
            </div>
            
            <div class="col-lg-10" style="background-color: #FFFFE0;">
                <!-- classroom -->
                    <div class="row" style="background-color:white ;" >
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg ">
    
                                
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                
                                    <li class="nav-item" style="margin-left:50px ;">
                                    <a class="nav-link active" aria-current="page" href="#">
                                        no. of students(
                                         ) 
                                    
                                    </a>
                                    </li>
                                    <?php 
                                    $subject=Database::search("SELECT * FROM `subjects` WHERE `id`='".$_SESSION["t"]["subjects_id"]."'");
                                    $subject_data=$subject->fetch_assoc();
                                    
                                    ?>
                                    <li class="nav-item" style="margin-left:10px ;">
                                    <a class="nav-link" href="#">Subject : <?php  echo $subject_data["name"]?>
                                        
                                    </a>
                                    </li>
                                    <li class="nav-item dropdown"  style="margin-left:15px ;">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       Class
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                        $class=Database::search("SELECT * FROM `class` WHERE `grade_id` ='".$_SESSION["t"]["grade_id"]."'");

                                        $class_num=$class->num_rows;

                                        for($x=0;$x<$class_num;$x++){
                                            $class_data=$class->fetch_assoc();
                                            ?>
                                            <li><a class="dropdown-item" href="#"><?php echo $class_data["name"] ?></a></li>
                                            
                                            <?php

                                        }


                                        ?>
                                        
                                       
                                        
                                    </ul>
                              
                                </div>
                            
                            </nav>
                        </div>
                    </div>
                    <div class="row " id="teacherdiv">
                        <?php 
                        
                            $lesson=Database::search("SELECT * FROM `lessons` WHERE `subjects_id`='".$_SESSION["t"]["subjects_id"]."' AND `grade_id`='".$_SESSION["t"]["grade_id"]."'");
                            $lesson_num=$lesson->num_rows;
                            for($x=0;$x<$lesson_num;$x++){
                                $lesson_data=$lesson->fetch_assoc();
                                ?>
                                
                                 <div class="col-12 mt-2 mb-4 d-grid" style="margin-left:1% ;"> 
                                
                                    <button class="btn fs-5" aria-current="true" style="background-color:#FDE992; height:6vh" onclick="viewAssignment(<?php echo $lesson_data['id']?>);" id="lesson">
                                    <?php  echo $lesson_data["topic"]?>
                                    </button>
                                        <div class="row text-center">
                                            <div class="alert alert-warning mt-2 d-none" role="alert" style="width: 60%;margin-left:20%" id="noteAlert" >
                                               
                                            </div>
                                        </div>
                                    <div class="row d-none mt-2 notes" id="assignments<?php echo $lesson_data['id'] ?>" style="margin-left:10%; width:80%">
                                    <?php 
                                        $assignments=Database::search("SELECT * FROM `assignments` WHERE `lessons_id`='".$lesson_data["id"]."'");
                                        $assignments_num=$assignments->num_rows;
                                        for($y=0;$y<$assignments_num;$y++){
                                            $assignments_data=$assignments->fetch_assoc();
                                            ?>
                                              
                                                <div class="col-5 mt-2 mb-3">
                                                    <?php echo $assignments_data["title"]?>
                                                </div>
                                                <div class="col-3 mt-2 mb-3 d-grid">
                                                    <a href="<?php echo $assignments_data["path"]?>" class="btn btn-warning">View Assignment</a>
                                                </div>
                                                <div class="col-3 mt-2 mb-3 d-grid">
                                                    <button class="btn btn-danger" onclick="removeAssignment(<?php echo $assignments_data['id'] ?>);"><i>Remove Assignment</i></button>
                                                </div>
                                       
                                       
                                            <?php
                                        }
                                       
                                        ?>
                                        <div class="col-5 mt-3 mb-3">
                                            <input type="text" class="form-control" placeholder="Enter a title" id="newAssignment<?php echo $lesson_data['id'];?>" />
                                        </div>
                                        <div class="col-3 mt-2 mb-3 d-grid">
                                            <button class="btn btn-light">
                                                <input type="file" class="d-none" id="uploadAssignment" multiple />
                                                <label for="uploadAssignment" class="col-12 btn btn-light" onclick=""><i class="bi bi-upload"></i> Assignment</label>
                                            </button>
                                        </div>
                                        <div class="col-3 mt-2 mb-3 d-grid">
                                            <button class="btn btn-danger" onclick="addAssignment(<?php echo $lesson_data['id'];?>)">Add Assignment</button>
                                        </div>

                                       

                                
                                </div> 
                                </div>
                               
                                        
                                <?php
                            }    
                        ?>
                       

                    
                <!-- classroom -->
               

            </div>
            
          
        </div>
        <?php include "footer.php"?>    
    </div>
    
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

