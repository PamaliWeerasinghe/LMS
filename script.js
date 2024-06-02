function login(){
    var u=document.getElementById("username");
    var p=document.getElementById("password");

    var f=new FormData();
    f.append("u",u.value);
    f.append("p",p.value);
    //alert(u.value);
    var r =new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                window.location="teacherPage.php";
            }else{
                document.getElementById("msgAlert").className="alert alert-warning"
                document.getElementById("msgAlert").innerHTML=t;
            }
        }
    }
    

    r.open("POST","loginProcess.php",true);
    r.send(f);
}
function eye(){
    //alert("hi");
    var eye=document.getElementById("eye");
    var p=document.getElementById("password");
    //alert(eye.value);
    if(eye.className=="bi bi-eye-slash"){
        eye.className="bi bi-eye";
        p.type="text";

    }else{
        eye.className="bi bi-eye-slash";
        p.type="password";
    }
    //alert(eye.className);

    

}
function view(id){
    var lid=id;
    var c=document.getElementById("notes"+lid).className;
    if(c=="row notes mt-2"){
        document.getElementById("notes"+lid).className="row d-none notes mt-2";
    }else{
        document.getElementById("notes"+lid).className="row notes mt-2"
    }
    
}
function removeNote(id){
    var ln=id;
    //alert(ln);
    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                alert("The note was removed");
                window.location.reload();
            }else{
                //alert(t);
                alert("Something went wrong.Please try again");
            }
        }
    }
    r.open("GET","removeNote.php?lid="+ln,true);
    r.send();

 }
 function addNote(id){
    var lid=id;
    var rep=document.getElementById("newNote"+lid).value;
    var note=document.getElementById("uploadNote").value;
    // alert(rep);
    //alert(lid);
    var f=new FormData();
    f.append("id",lid);
    f.append("t",rep);
    f.append("n",note);

    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                alert("Lesson note added");
                window.location.reload();
            }else{
                alert(t);
                //alert("Please include the relevant details");
                window.location.reload();
            }
        }
    }
    r.open("POST","addNewNote.php",true);
    r.send(f);
 }

 function viewAssignment(id){
    //alert("hi");
    var aid=id;
    var c=document.getElementById("assignments"+aid).className;
    if(c=="row notes mt-2"){
        document.getElementById("assignments"+aid).className="row d-none notes mt-2";
    }else{
        document.getElementById("assignments"+aid).className="row notes mt-2"
    }
    
}
function removeAssignment(id){
    var aid=id;
    //alert(ln);
    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            //alert(t);
            if(t=="success"){
                alert("The assignment was removed");
                window.location.reload();
            }else{
                //alert(t);
                alert("Something went wrong.Please try again");
            }
        }
    }
    r.open("GET","removeAssignment.php?aid="+aid,true);
    r.send();

 }
 function addAssignment(id){
    var lid=id;
    var rep=document.getElementById("newAssignment"+lid).value;
    var note=document.getElementById("uploadAssignment").value;
    // alert(rep);
    //alert(lid);
    var f=new FormData();
    f.append("id",lid);
    f.append("t",rep);
    f.append("n",note);

    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                alert("Lesson assignment added");
                window.location.reload();
            }else{
                alert(t);
                //alert("Please include the relevant details");
                window.location.reload();
            }
        }
    }
    r.open("POST","addNewAssignment.php",true);
    r.send(f);
 }

 function viewSubmittedAssignment(id){
    //alert("hi");
    var aid=id;
    var c=document.getElementById("submittedAssignments"+aid).className;
    if(c=="row notes mt-2"){
        document.getElementById("submittedAssignments"+aid).className="row d-none notes mt-2";
    }else{
        document.getElementById("submittedAssignments"+aid).className="row notes mt-2"
    }
    
}
function submitToAcademic(id){
    var aid=id;

    var f=document.getElementById("uploadCheckedSheet").value;
    var m=document.getElementById("marks"+aid).value;
    var remarks=document.getElementById("remarks"+aid).value;
    //alert(m);
    //alert(remarks);
    //alert(m);
    var form=new FormData();
    form.append("f",f);
    form.append("m",m);
    form.append("remarks",remarks);
    form.append("id",aid);

    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                alert("Marks submitted");
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("POST","submitToAcademic.php",true);
    r.send(form);

}
function updateTeacher(){
    var f=document.getElementById("fname").value;
    var l=document.getElementById("lname").value;
    var t=document.getElementById("newimage").value;
    var a=document.getElementById("address").value;

    var form=new FormData();
    form.append("f",f);
    form.append("l",l);
    form.append("t",t);
    form.append("a",a);
    var r =new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var text=r.responseText;
            alert(text);
            if(text=="success"){
                alert("successfully updated");
                window.location.reload();
            }
        }
    }
    r.open("POST","updateTeacher.php",true);
    r.send(form);

}
function teacherLogout(){
      //alert("hi");

      var r=new XMLHttpRequest();
      r.onreadystatechange=function(){
          if(r.readyState==4){
              var t=r.responseText;
              if(t=="success"){
                  window.location="teacherLogin.php";
              }
          }
  
      }
      r.open("GET","teacherLogout.php",true);
      r.send();
}

function stuLogin(){
        //alert("hi");
        var username=document.getElementById("studentUsername").value;
        var stuAdmission=document.getElementById("studentAdmission").value;
        //alert(username);
        //alert(stuAdmission);
        var f=new FormData();
        f.append("u",username);
        f.append("p",stuAdmission);
    
        var r =new XMLHttpRequest();
        r.onreadystatechange=function(){
            if(r.readyState==4){
                
                var t=r.responseText;
                //alert(t);
                if(t=="success1"){
                    window.location="studentPage.php";
                    
                }else{
                    document.getElementById("msgAlert").className="alert alert-warning"
                    document.getElementById("msgAlert").innerHTML=t;
                }
                
            }
        }
        r.open("POST","stuLoginProcess.php",true);
        r.send(f);
}
var tr;
function teacherRegister(){
        //alert("hi");
        var trm=document.getElementById("teacherRegisterationModal");
        
        tr=new bootstrap.Modal(trm);
        //alert("hi");
        tr.show();
        //alert("hi");
    
}

var sr;
function studentRegister(){
    var srm=document.getElementById("studentVerificationModal");
    sr=new bootstrap.Modal(srm);
    sr.show();
    
}
var sv;
function studentVerification(){
    var svm=document.getElementById("studentVerificationModal");
    sv=new bootstrap.Modal(svm);
    sv.show();
    
}
var ar;
function academicRegister(){
    //alert("hi");
    var arm=document.getElementById("academicRegisterationModal");
    ar=new bootstrap.Modal(arm);
    ar.show();
}
function sendDetails(){
    tr.hide();
    var u=document.getElementById("username");
    var p=document.getElementById("password");
    var v=document.getElementById("verificationCode");

    var f=new FormData();
    f.append("username",u.value);
    f.append("password",p.value);
    f.append("verCode",v.value);
    //alert(f);
    var r= new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                window.location="teacherLogin.php";
            }
        }
    
    }
  
    r.open("POST","registerTeacher.php",true);
    r.send(f);
}
function submitAdmission(){
    sr.hide();
    var admission=document.getElementById("admission").value;
    //alert(admission);
    var f=new FormData();
    f.append("a",admission);
    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                studentVerification();
            }else if(t=="already"){
                
                window.location="index.php";
                
            }else{
            
                alert(t);
            }
            
        }
    }
    r.open("POST","checkStuAdmission.php",true);
    r.send(f);
}
function verifyStudent(){
    sr.hide();
    var vc=document.getElementById("verifyCode").value;
    var ad=document.getElementById("studadmission").value;
    
    var f=new FormData();
    f.append("vc",vc);
    f.append("ad",ad);

    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            //alert(t);
         
                window.location="index.php";
           
        
            
        }
    }
    r.open("POST","verifyStudent.php",true);
    r.send(f);
}
function sendAcDetails(){
    ar.hide();

    var u=document.getElementById("acusername");
    var p=document.getElementById("acpassword");
    var v=document.getElementById("acverificationCode");

    var f=new FormData();
    f.append("username",u.value);
    f.append("password",p.value);
    f.append("verCode",v.value);
    var r= new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            //alert(t);
            var t=r.responseText;
            if(t=="success"){
                window.location="academicSignIn.php";
            }else{
                alert(t);
            }
        }
    
    }
  
    r.open("POST","registerAcademic.php",true);
    r.send(f);

}
function currentlesson(id){
    var lid=id;
    //alert("hi");
    var lesson=document.getElementById("insideDetails"+lid).className;
   
    if(lesson=="row d-block"){
          document.getElementById("insideDetails"+lid).className="row d-none";
    }else{
        
        document.getElementById("insideDetails"+lid).className="row d-block";
    }

    
}


// function trialPay(id){
//     // alert(id);
//     var admission = document.getElementById("payAdmission").value;
//     var username=document.getElementById("payUsername").value;
    
//     var request = new XMLHttpRequest();
    
//     request.onreadystatechange = function(){
//             if(request.readyState==4){
//                 var t = request.responseText;
//                 alert(t);
//                 // var obj = JSON.parse(t);
//                 // var mail = obj["umail"];
//                 //  var amount = obj["amount"];
                
//                 if(t == "success"){
                  
//                     // Payment completed. It can be a successful failure.
//         payhere.onCompleted = function onCompleted(orderID) {
//             alert("Payment completed. OrderID:" + orderID);
    
//             //saveInvoice(orderID,id,mail,amount);
    
//             // Note: validate the payment and show success or failure page to the customer
//         };
    
//         // Payment window closed
//         payhere.onDismissed = function onDismissed() {
//             // Note: Prompt user to pay again or show an error page
//             alert("Payment dismissed");
//         };
    
//         // Error occurred
//         payhere.onError = function onError(error) {
//             // Note: show an error page
//             alert("Error:"  + error);
//         };
    
//         // Put the payment variables here
//         var payment = {
//             "sandbox": true,
//             "merchant_id": "1221058",    // Replace your Merchant ID
//             "return_url": "http://localhost/finalLMS/trialPay.php"+id,     // Important
//             "cancel_url": "http://localhost/finalLMS/trialPay.php"+id,     // Important
//             "notify_url": "http://sample.com/notify",
//             "student_id": obj["id"],
            
//             "amount": amount,
//             "currency": "LKR",
//             "first_name": obj["fname"],
//             "last_name": obj["lname"],
            
            
            
            
//             "country": "Sri Lanka",
           
//             "custom_1": "",
//             "custom_2": ""
//         };
    
//         // Show the payhere.js popup, when "PayHere Pay" is clicked
//         // document.getElementById('payhere-payment').onclick = function (e) {
//             payhere.startPayment(payment);
//         // };
//                 }else{
//                     alert("PAYMENT WAS FAILED UNFORTUNATELY");
//                     window.Location="trialPay.php"
                    
//                 }
//             }
//         }
    
//         request.open("GET","payToTrial.php?a="+admission+"&u="+username,true);
//         request.send();
//     }

    function aceye(){
        //alert("hi");
        var eye=document.getElementById("eye");
        var p=document.getElementById("Academicpassword");
        //alert(eye.value);
        if(eye.className=="bi bi-eye-slash"){
            eye.className="bi bi-eye";
            p.type="text";
    
        }else{
            eye.className="bi bi-eye-slash";
            p.type="password";
        }
        //alert(eye.className);
    
        
    
    }
    function loginAcademic(){
        var u=document.getElementById("Academicusername");
        var p=document.getElementById("Academicpassword");
    
        var f=new FormData();
        f.append("u",u.value);
        f.append("p",p.value);
        //alert(u.value);
        var r =new XMLHttpRequest();
        r.onreadystatechange=function(){
            if(r.readyState==4){
                var t=r.responseText;
                if(t=="success"){
                    window.location="academicPage.php";
                }else{
                    document.getElementById("msgAlert").className="alert alert-warning"
                    document.getElementById("msgAlert").innerHTML=t;
                }
            }
        }
        
    
        r.open("POST","academicloginProcess.php",true);
        r.send(f);
    
    }
function uploadStuAssignment(sid){
        var id=sid;
        var a=document.getElementById("uploadAssignmentbyStu").value;
        //alert(a);
        //alert(id);
    
        var f=new FormData();
        f.append("id",id);
        f.append("a",a);
    
        var r= new XMLHttpRequest();
        r.onreadystatechange=function(){
            if(r.readyState==4){
                var t=r.responseText;
                alert(t);
                
            }
        }
        r.open("POST","assignmentSubmission.php",true);
        r.send(f);
    
}
function updateStudent(){
    var f=document.getElementById("sfname").value;
    var l=document.getElementById("slname").value;
    var t=document.getElementById("newstuimage").value;
    var a=document.getElementById("stuaddress").value;


    var form=new FormData();
    form.append("f",f);
    form.append("l",l);
    form.append("t",t);
    form.append("a",a);

    var r =new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var text=r.responseText;
            //alert(text);
            if(text=="success"){
                alert("successfully updated");
                window.location.reload();
            }
        }
    }
    r.open("POST","updateStudent.php",true);
    r.send(form);


}
function studentLogout(){
    
    var r=new XMLHttpRequest();
    
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                window.location="index.php";
            }
        }
    }
    r.open("GET","studentLogout.php",true);
    r.send();
}
function inviteStudentToJoin(id){
    var sid=id;
    //alert(sid);
    var r =new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var text=r.responseText;
            //alert(text);
            if(text=="success"){
              alert("Email sent");
            }
        }
    }
    r.open("GET","checkStuAdmission.php?sid="+sid,true);
    r.send();
}
function teacherData(id){
    var lid=id;
    //alert("hi");
    var lesson=document.getElementById("insideDetails2"+lid).className;
   
    if(lesson=="row d-block"){
          document.getElementById("insideDetails2"+lid).className="row d-none";
    }else{
        
        document.getElementById("insideDetails2"+lid).className="row d-block";
    }

    
}
function submitMarksToStudent(id){
    var aid=id;
    //alert(aid);
    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if (r.readyState==4){
            var t=r.responseText;
            //alert(t);
            if(t=="success"){
                alert("Marks submitted to the student");
                window.location.reload();
            }
        }
    }

    r.open("GET","submitMarksToStudentProcess.php?aid="+aid,true);
    r.send();
}
function updateAcademic(){
    var f=document.getElementById("afname").value;
    var l=document.getElementById("alname").value;
    var t=document.getElementById("newacimage").value;
    var a=document.getElementById("acaddress").value;

    var form=new FormData();
    form.append("f",f);
    form.append("l",l);
    form.append("t",t);
    form.append("a",a);

    var r =new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var text=r.responseText;
            //alert(text);
            if(text=="success"){
                alert("successfully updated");
                window.location.reload();
            }
        }
    }
    r.open("POST","updateAcademic.php",true);
    r.send(form);

}
function registerNewStudent(){
    //alert("hi");
    var f=document.getElementById("rfname").value;
    
    var l=document.getElementById("rlname").value;
    var e=document.getElementById("remail").value;
   

    var a=document.getElementById("rAdmission").value;
    
    var c=document.getElementById("stuClass").value;
   
    var s=document.getElementById("status").value;
   
    var trial=document.getElementById("trial").checked;
   
    if(trial==true){
        trial=1;
    }else{
        trial=2;
    }
   
    var yearly=document.getElementById("yearly").checked;
    if(yearly==true){
        yearly=1;
    }else{
        yearly=2;
    }
    //alert(yearly);
    var form=new FormData();
    form.append("f",f);
    form.append("l",l);
    form.append("e",e);
    form.append("a",a);
    form.append("c",c);
    form.append("s",s);
    form.append("trial",trial);
    form.append("yearly",yearly);
   
    var r =new XMLHttpRequest();
    r.onreadystatechange=function(){
        
        if(r.readyState==4){
            var t=r.responseText;
            
            if(t=="success"){
                document.getElementById("msgAlert").className="alert alert-warning"
                document.getElementById("msgAlert").innerHTML="Student successfully added to the database";
            }else{
                document.getElementById("msgAlert").className="alert alert-warning"
                document.getElementById("msgAlert").innerHTML="Something went wrong!";
            }
        }
    }
    r.open("POST","registerNewStudent.php",true);
    r.send(form);
    
   

}
function academicLogout(){
        var r=new XMLHttpRequest();
        
        r.onreadystatechange=function(){
            if(r.readyState==4){
                var t=r.responseText;
                if(t=="success"){
                    window.location="academicSignIn.php";
                }
            }
        }
        r.open("GET","academicLogout.php",true);
        r.send();
    
}
function adminVerify(){
    //alert("hi");
    var e=document.getElementById("adminEmail").value;
    
    var f=new FormData();
    f.append("e",e);

    var r=new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                document.getElementById("msgAlert").className="alert alert-warning";
                document.getElementById("msgAlert").innerHTML="Verification sent to your email";
            }else{
                document.getElementById("msgAlert").className="alert alert-warning"
                document.getElementById("msgAlert").innerHTML=t;
            }
           
        }
    }

    r.open("POST","adminVerification.php",true);
    r.send(f);
}
function adminLogin(){
    //alert("hi");
    var e=document.getElementById("adminEmail").value;
    var v=document.getElementById("admnVerification").value;
    //alert(e);
    //alert(v);
    var f=new FormData();
    f.append("e",e);
    f.append("v",v);

    var r =new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t =r.responseText;
            //alert(t);
            if(t=="success"){
                window.location="adminPanel.php";
            }else{
                document.getElementById("msgAlert").className="alert alert-warning"
                document.getElementById("msgAlert").innerHTML="Check your verification Code";
            }
        }
    }
    r.open("POST","adminVerificationProcess.php",true);
    r.send(f);

}
function adminViewNotes(){
    window.location="adminViewNotes.php";
}
function academicViewNotes(){
    window.location="academicViewNotes.php";
}
function adminViewAssignments(){
    //alert("hi");
    window.location="adminViewAssignments.php"
}
function academicViewAssignments(){
    window.location="academicViewAssignments.php"

}
function changeClass(id){
   
    var sid=id;
    
    alert(sid);
    var change=document.getElementById("newStuClass"+sid).value;
    //alert("change");

    var f=new FormData();
    f.append("sid",sid);
    f.append("new",change);
    //alert("hi");
    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="Class updated"){
                window.location.reload();
            }else{
                alert("Something went wrong");
            }
            
        }
    }

    r.open("POST","changeClass.php",true);
    r.send(f);
}

function inviteTeachers(id){
    //alert("hi");
    var tid=id;
    //alert(tid);
    var form=new FormData();
    form.append("tid",tid);

    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            alert(t);
        }
    }
    r.open("POST","inviteTeachers.php",true);
    r.send(form);
}
function inviteOfficers(id){
    //alert("hi");
    var tid=id;
    //alert(tid);
    var form=new FormData();
    form.append("tid",tid);

    var r=new XMLHttpRequest();
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            alert(t);
        }
    }
    r.open("POST","inviteOfficers.php",true);
    r.send(form);
}
function updateAdmin(){
    var f=document.getElementById("adfname").value;
    var l=document.getElementById("adlname").value;
    var t=document.getElementById("newadimage").value;
    
    var form=new FormData();
    form.append("f",f);
    form.append("l",l);
    form.append("t",t);
  

    var r =new XMLHttpRequest();

    r.onreadystatechange=function(){
        if(r.readyState==4){
            var text=r.responseText;
            //alert(text);
            if(text=="success"){
                alert("successfully updated");
                window.location.reload();
            }
        }
    }
    r.open("POST","updateAdmin.php",true);
    r.send(form);

}

function adminLogout(){
    var r=new XMLHttpRequest();
    
    r.onreadystatechange=function(){
        if(r.readyState==4){
            var t=r.responseText;
            if(t=="success"){
                window.location="adminSignIn.php";
            }
        }
    }
    r.open("GET","adminLogout.php",true);
    r.send();

}
