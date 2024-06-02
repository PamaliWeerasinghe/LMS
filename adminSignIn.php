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
    <div class="row">
           
           <div class="col-lg-12 ">
                   <label class="form-label fs-3"><i>The school name</i></label>
                   
                   <a href="register.php"class="btn btn-light mt-2 offset-lg-6 col-lg-1 col-4"><i class="bi bi-person-add"></i>Register</a>
                   <a href="teacherLogin.php"class="btn btn-danger mt-2 col-lg-1 col-3"><i class="bi bi-box-arrow-in-right"></i>Teacher</a>
                   <a href="adminSignIn.php" class="btn btn-secondary mt-2 col-lg-1 col-3"><i class="bi bi-box-arrow-in-right"></i>Admin</a>
                   <a href="academicSignIn.php" class="btn btn-warning mt-2 col-lg-1 col-3"><i class="bi bi-box-arrow-in-right"></i>Academic</a>
              </div>
           </div>
           <div class="row">
       <a href="index.php" style="color: black;"><i class="bi bi-arrow-left-short fs-2"></i></a>
   </div>
        <div class="row align-content-center " style="margin-top:1vh;margin-left:10%;width:87%; height:80vh;background-color: white; border-radius:35px;box-shadow: 0px 0px 0px 0px rgb(255, 191, 0), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="row text-center">
            <div class="alert alert-warning d-none" role="alert" style="width: 60%;margin-left:20%" id="msgAlert" >
            A simple warning alert—check it out!
            </div>
        </div>
        
        
        <div class="col-lg-6 col-12 i1" >
            
        </div>
        <div class="col-lg-6 col-12">
            <div class="row text-center" >
                <div class="col-12 i2">
                   
                </div>
                
            </div>
            <div class="row text-center">
            <label class="form-label fs-1">Admin Verification</label>
            </div>
            <div class="row mt-3">
                <label class="form-label fs-6" >Email</label>
            </div>
            <div class="row">
                <div class="col-8">
                <input type="text" class="form-control" id="adminEmail"/>
                </div>
                <div class="col-4 d-grid">
                <button class="btn btn-warning" onclick="adminVerify();">Verify</button>
                </div>
                
                
            </div>
            <div class="row mt-3">
                <label class="form-label fs-6" >Verification Code</label>
            </div>
            <div class="row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Recipient's username" id="admnVerification" aria-describedby="button-addon2" style="width:100%">
                    
                </div>
            </div>
           
            <div class="row mt-4 ">
                <div class="col-lg-12 d-grid"><button class="btn btn-danger" onclick="adminLogin();">Log In</button></div>
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
