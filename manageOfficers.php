<?php 
session_start();
if(isset($_SESSION["admin"])){
   
require "connection.php";

$id=$_SESSION["admin"]["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Officers</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2"/>
</head>
<body>
    <?php  include "header.php";?>
    <div class="container-fluid">
    <div class="row mb-5 ">
    <div class="col-lg-2" style="background-color:white; height:100vh">
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <?php 
                        $img=Database::search("SELECT * FROM `admin` WHERE `id`='".$id."'");
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
                        <button class="btn btn-light" onclick="window.location='adminPanel.php'">Dashboard</button>
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
                        <button class="btn btn-danger" onclick="window.location='adminProfileUpdate.php'"><i class="bi bi-gear"></i> Update Profile</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-dark" onclick="adminLogout();"><i class="bi bi-box-arrow-left"></i> &nbsp;&nbsp;Log Out</button>
                    </div>
                </div>
                
            </div>
    <div class="list-group col-lg-10 col-12 mt-5">
      
        <?php
        
      
            
            $ac=Database::search("SELECT * FROM `academic_officer`");
            $ac_num=$ac->num_rows;
            
            ?>
         
            <?php 
                for($y=0;$y<$ac_num;$y++){
                    $ac_data=$ac->fetch_assoc();
                    //echo($lessons_data["topic"]);
                    ?>
                 
                     <button type="button" class="list-group-item list-group-item-action">
                     <button type="button" class="list-group-item list-group-item-action"  onclick="currentlesson(<?php echo $ac_data['id']; ?>);">
                     <?php echo $ac_data["fname"]; ?>&nbsp; <?php echo $ac_data["lname"]; ?>
                        
                    
                    </button>
                        <div class="row d-none" id="insideDetails<?php echo $ac_data['id']; ?>">
                            <div class="col-12" style="margin-left: 10%;" >
                             <table class="border-bottom" style="width:90%">
                                <tr>
                                    <td style="color:grey" class="border"><label class="form-label">Officer Name</label></td>
                                    <td style="color:grey"class="border"><label class="form-label">Email</label></td>
                                    
                                    
                                    <td style="color:grey"class="border"><label class="form-label">Verification</label></td>
                                    
                                    
                                </tr>
                                <?php 
                               
                                
                                ?>
                                <tr class="border-bottom">
                                    <td class="mt-2 mb-3"> <?php echo $ac_data["fname"]; ?>&nbsp; <?php echo $ac_data["lname"]; ?> </td>
                              
                                   

                                    <td class="mt-2 mb-3"><label class="form-label"><?php echo $ac_data["email"];?></label></td>
                                    <?php 
                                 $academictm=Database::search("SELECT * FROM `academic_officer` 
                                 WHERE   
                                 (`verification_code`!='verified' OR `verification_code` IS  NULL) AND `id`='".$ac_data["id"]."' ");

                                 $academicm_num=$academictm->num_rows;

                                 if($academicm_num==0){
                                    ?>
                                    <td class="mt-2 mb-3"><button class="btn btn-success" style="width: 90%;" disabled><i>Verified</i></button></td>
                                    <?php
                                 }else{
                                    ?>
                                    <td class="mt-2 mb-3"><button class="btn btn-warning" style="width: 90%;" onclick="inviteOfficers(<?php echo $ac_data['id']; ?>);">Invite</button></td>
                                    <?php
                                 }
                                ?>
                                            
                                           
                                  
                              
                                   
                                    
                                    
                                </tr>
                              

                             </table>
                            </div>
                            
                        </div> 
                    
                    </button>
                    
                    <?php
                }
            ?>
           
          
       
  


       
    </div>


    </div>
    

    </div>

    <?php include "footer.php"?>

<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>
<?php

}else{
    include "studentlogin.php";
}




























