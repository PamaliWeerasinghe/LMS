<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
        
        
        
        <div class="col-lg-12 ">
                <label class="form-label fs-3"><i>The school name</i></label>
                
                <a href="register.php"class="btn btn-light mt-2 offset-lg-6 col-lg-1 col-4"><i class="bi bi-person-add"></i>Register</a>
                <a href="teacherLogin.php"class="btn btn-danger mt-2 col-lg-1 col-3"><i class="bi bi-box-arrow-in-right"></i>Teacher</a>
                <a href="adminSignIn.php" class="btn btn-secondary mt-2 col-lg-1 col-3"><i class="bi bi-box-arrow-in-right"></i>Admin</a>
                <a href="academicSignIn.php" class="btn btn-warning mt-2 col-lg-1 col-3"><i class="bi bi-box-arrow-in-right"></i>Academic</a>
           </div>
        </div>
        <div class="row mb-2">
        <?php include "studentLogin.php"?>
        </div>
      
    </div>
</body>
</html>