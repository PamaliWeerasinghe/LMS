<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body style="margin: 0px; background-color: #FFFFE0;">
    <div class="container-fluid" style="height:90vh;width:100%; ">
        <div class="row align-content-center " style="margin-top:6vh;margin-left:6%;width:87%; height:80vh;background-color: white; border-radius:35px;box-shadow: 0px 0px 0px 0px rgb(255, 191, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="row text-center">
            <div class="alert alert-warning d-none" role="alert" style="width: 60%;margin-left:20%" id="msgAlert" >
            A simple warning alert—check it out!
            </div>
        </div>
        
        
        <div class="col-lg-6 col-12 i1" >
            <!-- <img src="Thesis.gif" style="width:550px; "/> -->
        </div>
        <div class="col-lg-6 col-12">
            <div class="row text-center" >
                <div class="col-12 i2">
                   
                </div>
                
            </div>
            <div class="row text-center">
            <label class="form-label fs-1">LOG IN</label>
            </div>
            <div class="row mt-3">
                <label class="form-label fs-6" >Student Admission</label>
            </div>
            <div class="row">
                <input type="text" class="form-control" style="width:96%;margin-left:11px;" id="studentAdmission"/>
            </div>
            <div class="row mt-3">
                <label class="form-label fs-6" >Username</label>
            </div>
            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Recipient's username" id="studentUsername" aria-describedby="button-addon2" style="width:96%">
                    
                </div>
            </div>
           
            <div class="row mt-4 ">
                <div class="col-lg-12 d-grid"><button class="btn btn-danger" onclick="stuLogin();">Log In</button></div>
            </div>
           
            
        </div>
        </div>
     <!-- footer -->
     <div class="col-12 fixed-bottom d-none d-lg-block ">
                <p class="text-center">&copy; 2022 schoolName.lk || Powered by Gimmick</p>
            </div>
    <!-- footer -->
    </div>
<script src="script.js"></script>    
</body>
</html>
