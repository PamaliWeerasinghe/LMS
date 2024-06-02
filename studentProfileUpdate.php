<?php 
session_start();
require "connection.php";
if(isset($_SESSION["s"])){
    if($_SESSION["s"]["verification_code"]=='verified'){
        $id=$_SESSION["s"]["id"];
        
        ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body style="background-color: #FFFFE0; overflow-x:hidden">
<?php include "header.php"?>
<div class="container-fluid">
    
    <div class="row">
    <a href="studentPage.php" style="color: black;"><i class="bi bi-arrow-left-short fs-2"></i></a>
    </div>
   
    <div class="row mb-5" style="margin-left:22%; height:88vh; margin-top:40px; background-color:white; width:60%" >
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <?php 
                $image=Database::search("SELECT * FROM `student` WHERE `id`='".$_SESSION["s"]["id"]."'");
                $image_data=$image->fetch_assoc();
                $image_num=$image->num_rows;
                if(isset($image_data["profile_img"])){
                    ?>
                     <img src="<?php echo $image_data["profile_img"] ?>" class="rounded-circle" style="height:200px;width:200px; margin-left:30%"/>
                    <?php
                }else{
                    ?>
                     <img src="resources/default.png" class="rounded-circle" style="height:200px;width:200px; margin-left:30%"/>
                    <?php
                }
                
                
                ?>
               
            </div>
            <div class="row">
                <button class="btn">
                    <input type="file" class="d-none" id="newstuimage" multiple />
                    <label for="newstuimage" class="col-12 btn btn-dark">Change Picture</label>
                </button>
            </div>
        
        </div>
        <div class="col-lg-6">
            <div class="row mt-5">
                <?php 
                $student=Database::search("SELECT * FROM `student` WHERE `id`='".$id."'");
                $student_data=$student->fetch_assoc();
                ?>
            <label class="form-label fs-4"><?php echo $student_data["admission_no"] ?></label>
            </div>
            <div class="row">
            <label class="form-label fs-5"><i><?php  echo $student_data["email"]?></i></label>
            </div>
            
            
        </div>
        
    </div>
    <div class="row mt-4" >
        <div class="col-6">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="<?php echo $student_data["fname"];?>" id="sfname"/>
        </div>
        <div class="col-6">
        <label class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="<?php echo $student_data["lname"];?>" id="slname"/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <label class="form-label">Address</label>
        </div>
        <div class="col-12">
            <input type="text" class="form-control" placeholder="<?php echo $student_data["address"]; ?>" id="stuaddress"/>
        </div>
    </div>
    <div class="row mt-4" style="margin-top: -10vh;">
        <div class="col-6">
            <label class="form-label">Trial Payment</label>
            <?php 
            $tpay=Database::search("SELECT * FROM `payment_status` INNER JOIN `trial_payment` ON
            `trial_payment`.`payment_status_id`=`payment_status`.`id` INNER JOIN `student` ON
            `student`.`trial_payment_id`=`trial_payment`.`id` WHERE `student`.`id`='".$student_data["id"]."'");
            $tpay_data=$tpay->fetch_assoc();
            ?>
            <input type="text" class="form-control" id="subject" placeholder="<?php echo $tpay_data["status"] ;?>" disabled/>
        </div>
        <?php 
        $apay=Database::search("SELECT * FROM `payment_status` INNER JOIN `yearly_payment` ON `payment_status`.`id`=`yearly_payment`.`payment_status_id` WHERE `student_id`='".$_SESSION["s"]["id"]."'");
        $apay_data=$apay->fetch_assoc();
        ?>
        <div class="col-6">
            <label class="form-label">Annual Payment</label>
            <input type="text" class="form-control" id="grade" placeholder="<?php echo $apay_data["status"]?>" disabled/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-8 offset-lg-2 d-grid" style="height: 4vh;">
            <button class="btn btn-warning "onclick="updateStudent();">Update Profile</button>
        </div>
    </div>

    </div>
</div>
<?php include "footer.php"?>
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
