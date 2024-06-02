<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="school.png"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    <?php include "header.php"?>
    <div class="container-fluid" style="overflow-x: hidden;">
    <div class="alert alert-warning d-none" role="alert" style="width: 60%;margin-left:20%" id="msgAlert" >
            A simple warning alert—check it out!
            </div>
        <div class="row">
            <div class="col-lg-6 i3">

            </div>
            <div class="col-lg-6 mb-5" >
                <div class="row mt-5 text-center">
                <span class="">SCHOOL NAME</span>
                </div>
                
                
                <div class="row" style="margin-top: 19vh;">
                    <button class="btn btn-danger col-4 offset-4" style="height: 6vh; border-radius: 50px;" onclick="teacherRegister();" ><i class="bi bi-person-check"></i> Teacher</button>
                </div>
                <div class="row mt-4">
                    <button class="btn btn-warning col-4 offset-4 " style="height: 6vh; border-radius: 50px;" onclick="studentRegister();"><i class="bi bi-person-vcard"></i> Student</button>
                </div>
                <div class="row mt-4" >
                    <button class="btn btn-secondary col-4 offset-4 " style="height: 6vh; border-radius: 50px;" onclick="academicRegister();"><i class="bi bi-person-workspace"></i> Academic Officer</button>
                </div>
               
            </div>
        </div>

        <!-- teacher's modal -->
        <div class="modal" tabindex="-1" id="teacherRegisterationModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h5 class="modal-title">Teacher Registration</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <label class="form-label">Username</label>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="text" id="username"/>
                </div>
                
              </div>
              <div class="row">
                <label class="form-label">Password</label>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="password" id="password"/>
                </div>
                
              </div>
              <div class="row mt-3 mb-3">
                <hr/>
              </div>
              <div class="row">
                <label class="form-label">Verification Code</label>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="text" id="verificationCode"/>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" onclick="sendDetails();">Submit</button>
            </div>
          </div>
        </div>
      </div>

        <!-- teacher's modal -->
        <!-- student's modal -->
        <!-- <div class="modal" tabindex="-1" id="studentRegisterationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Admission Number </p>
       
        <div class="row">
          <div class="col-12">
          <input type="text" class="form-control" id="admission" aria-describedby="button-addon2">
          </div>
          
       
        
        </div>
       
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" onclick="submitAdmission();">Submit</button>
      </div>
    </div>
  </div>
</div> -->
        <!-- student's modal -->
        <!-- student verification modal -->
        <div class="modal" tabindex="-1" id="studentVerificationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Verification | Verification code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
         <p>Admission Number </p>
       
        <div class="row">
          <div class="col-12">
          <input type="text" class="form-control" id="studadmission" aria-describedby="button-addon2">
          </div>
          <p>Verification Code </p>
       

          <div class="col-12 mb-3">
          <input type="text" class="form-control" id="verifyCode" aria-describedby="button-addon2">
          </div>
          
       
        
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" onclick="verifyStudent();">Verify</button>
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- student verification modal -->
              <!-- Academic officer's modal -->
              <div class="modal" tabindex="-1" id="academicRegisterationModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
              <h5 class="modal-title">Academic Officer Registration</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <label class="form-label">Username</label>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="text" id="acusername"/>
                </div>
                
              </div>
              <div class="row">
                <label class="form-label">Password</label>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="password" id="acpassword"/>
                </div>
                
              </div>
              <div class="row mt-3 mb-3">
                <hr/>
              </div>
              <div class="row">
                <label class="form-label">Verification Code</label>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-control" type="text" id="acverificationCode"/>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" onclick="sendAcDetails();">Submit</button>
            </div>
          </div>
        </div>
      </div>

        <!-- Academic officer's modal -->

    </div>
    <?php include "footer.php"?>
<script src="bootstrap.bundle.js"></script>   
<script src="script.js"></script>   
</body>
</html>