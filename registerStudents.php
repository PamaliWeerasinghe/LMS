<?php 
session_start();
if(isset($_SESSION["academic"])){
    if(($_SESSION["academic"]["verification_code"]=="verified")){

        ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Students</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<?php include "header.php"?>
<body style="margin: 0px; background-color: #FFFFE0;">

    <div class="container-fluid" style="height:103vh;width:100%; ">
    <a href="academicPage.php" style="color: black;"><i class="bi bi-arrow-left-short fs-2"></i></a>
        <div class="row text-center mt-4">
            <div class="alert alert-warning d-none" role="alert" style="width: 60%;margin-left:20%" id="msgAlert" >
            A simple warning alert—check it out!
            </div>
        </div>
        
        <div class="row align-content-center" style="margin-top:6vh;margin-left:7%;width:87%; height:85vh;background-color: white; border-radius:35px;box-shadow: 0px 0px 0px 0px rgb(255, 191, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
       
        
        <div class="col-lg-6 col-12 i1">
            <!-- <img src="Thesis.gif" style="width:550px; "/> -->
        </div>
        <div class="col-lg-6 col-12">
            <div class="row" style="margin-top: -8vh;" >
               
                
            </div>
            <div class="row text-center">
            <label class="form-label fs-2">STUDENT REGISTRATION</label>
            </div>
            <div class="row mt-5">
                <label class="form-label fs-6" >Student Admission</label>
            </div>
            <div class="row">
                <input type="text" class="form-control mt-2" style="width:98%;margin-left:11px;" id="rAdmission"/>
            </div>
            
            <div class="row mt-2">
                <div class="col-lg-6 col-12">
                    <div class="row">
                    <label class="form-label fs-6" >First Name</label>
                    </div>
                    <div class="row">
                    <input type="text" class="form-control mt-2" style="width:96%;margin-left:11px;" id="rfname"/>
                    </div>
                    

                </div> 
                <div class="col-lg-6 col-12">
                    <div class="row">
                    <label class="form-label fs-6" >Last Name</label>
                    </div>
                    <div class="row">
                    <input type="text" class="form-control mt-2" style="width:96%;margin-left:11px;" id="rlname"/>
                    </div>
                    

                </div> 
                
            </div>
            
         
           
            <div class="row mt-2">
                <label class="form-label fs-6" >Email</label>
            </div>
            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Recipient's username" id="remail" aria-describedby="button-addon2" style="width:98%">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="row">
                        
                    <label class="form-label">Class</label>
                    </div>
                    <div class="row">
                    <select class="form-select" id="stuClass"><option value="0">Select the class</option>
                    <?php 
                    require "connection.php";
                    $class=Database::search("SELECT * FROM `class`");
                    $class_num=$class->num_rows;
                    
                    for($x=0;$x<$class_num;$x++){
                        $class_data=$class->fetch_assoc();
                        ?>
                        <option value="<?php echo $class_data["id"]?>" ><?php echo $class_data["name"]?></option>
                        
                        <?php
                    }
                    ?>
                    </select>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-12">
                <div class="row">
                    <label class="form-label">Status</label>
                </div>
                <div class="row">
                    <select class="form-select" id="status"><option value="0">Select the Status</option>
                    <?php 
                    
                    $status=Database::search("SELECT * FROM `status`");
                    $status_num=$status->num_rows;
                    
                    for($x=0;$x<$status_num;$x++){
                        $status_data=$status->fetch_assoc();
                        ?>
                        <option value="<?php echo $status_data["id"]?>" ><?php echo $status_data["name"]?></option>
                        
                        <?php
                    }
                    ?>
                    </select>
                </div>
                </div>
            </div>
            <div class="row" >
 
            <input type="checkbox" class="mt-3" style="margin-left: 2%; width:22px" id="trial"/>
                <div class="col-5 mt-3">
                    Trial Payment
                </div>
                <input type="checkbox" class="mt-3" style="margin-left: 2%; width:22px" id="yearly"/>
                <div class="col-5 mt-3">
                    Yearly Payment
                </div>
            </div>
            
            <div class="row mt-4 ">
                <div class="col-lg-12 d-grid"><button class="btn btn-danger" onclick="registerNewStudent();">Register</button></div>
            </div>
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
    include "academicSignIn.php";
}

?>

