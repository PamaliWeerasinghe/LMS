<?php 
session_start();
require "connection.php";
if(isset($_SESSION["s"])){
    if($_SESSION["s"]["verification_code"]=='verified'){
        $id=$_SESSION["s"]["id"];
        $admission=$_SESSION["s"]["admission_no"];
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
                        $img=Database::search("SELECT * FROM `student` WHERE `admission_no`='".$admission."'");
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
                        <label><?php echo $_SESSION["s"]["admission_no"] ?></label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12 d-grid text-center">
                        <label><?php  
                        $fname=$_SESSION["s"]["fname"];
                        $lname=$_SESSION["s"]["lname"];

                        echo( $fname." ".$lname);
                        
                        ?></label>
                    </div>

                </div>
            
                <div class="row mt-2">
                    <div class="col-lg-12 d-grid text-center">
                        <label><i><?php echo $_SESSION["s"]["email"] ?></i></label>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-light" onclick="window.location='studentPage.php'">Dashboard</button>
                    </div>
                </div>
               

                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='viewNotes.php'">
                           View Notes
                           
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                       
                        <button type="button" class="btn btn-light position-relative" onclick="window.location='payments.php'">
                            Annual Payment
                           
                        </button>
                    </div>
                </div>
             
               
              

             
                <div class="row mt-3">
                    <div class="col-lg-12 d-grid">
                        <button class="btn btn-danger" onclick="window.location='studentProfileUpdate.php'"><i class="bi bi-gear"></i> Update Profile</button>
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
       $student_rs = Database::search("SELECT * FROM `student` WHERE `id`='".$id."'");
       $student_data = $student_rs->fetch_assoc();
       
       $status=Database::search("SELECT * FROM `payment_status` WHERE `status`='not paid'");
       $status_data=$status->fetch_assoc();
   
   
       if($student_data["trial_payment_id"]==$status_data["id"]){
        include "time.php";
       }
   
        
        ?>
        <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">LESSON NOTES</li>
            </ol>
        </nav>
        </div>
        <?php
        //echo $_SESSION["s"]["class_id"];
        $grade=Database::search("SELECT * FROM `student` INNER JOIN `class` ON `class`.`id`=`student`.class_id 
        INNER JOIN `grade` ON `grade`.`id`=`class`.`grade_id`
        WHERE `student`.`class_id`='".$_SESSION["s"]["class_id"]."'");
        $grade_data=$grade->fetch_assoc();
        //echo($grade_data["id"]);
        
        $gradeSubject=Database::search("SELECT * FROM `subjects` INNER JOIN `grade_has_subjects` ON 
        `subjects`.`id`=`grade_has_subjects`.`subjects_id` WHERE `grade_has_subjects`.`grade_id`='".$grade_data["id"]."'");
        
        $gradeSubject_num=$gradeSubject->num_rows;
        //$teacher=Database::search("SELECT * FROM `student_has_teacher` WHERE `student_admission_no`='".$admission."'");
        //$teacher_num=$teacher->num_rows;
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
                                    <td style="color:grey" class="border"><label class="form-label">Note</label></td>
                                    
                                    <td style="color:grey"class="border"><label class="form-label">View Note</label></td>
                                    <td style="color:grey"class="border"><label class="form-label">Download</label></td>
                                    
                                    
                                </tr>
                                <?php 
                                 $note=Database::search("SELECT * FROM `lesson_notes` WHERE  `lessons_id`='".$lessons_data["id"]."'");
                                 $note_num=$note->num_rows;
                                 //echo($note_num);
                                 for($z=0;$z<$note_num;$z++){
                                    $note_data=$note->fetch_assoc(); 

                                ?>
                                <tr class="border-bottom">
                                    <td class="mt-2 mb-3"><?php echo $note_data["title"]; ?></td>
                                    <td class="mt-2 mb-3"><a href="<?php echo $note_data["path"];?>" class="btn btn-warning" style="width:90%">View</a></td>

                                    <td class="mt-2 mb-3"><a href="<?php echo $note_data["path"];?>" class="btn btn-secondary"><i class="bi bi-download"></i> Download</a></td>
                                 
                                            
                                           
                                  
                              
                                   
                                    
                                    
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
        include "register.php";
    }
   
}else{
    require "index.php";
}
?>





