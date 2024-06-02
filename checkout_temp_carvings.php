<?php
session_start();
require "connection.php";
$uid="";
$payid="";
//$cart="";
        if(isset($_SESSION["s"]["id"])){$uid=$_SESSION["s"]["id"];}
         if(isset($_GET["one"])){$payid=$_GET["one"];}
        if(isset($_GET["two"])){$payid=$_GET["two"];}
        if(isset($_GET["three"])){$payid=$_GET["three"];}
        if(isset($_GET["four"])){$payid=$_GET["four"];}
        if(isset($_GET["five"])){$payid=$_GET["five"];}
        if(isset($_GET["six"])){$payid=$_GET["six"];}
        if(isset($_GET["seven"])){$payid=$_GET["seven"];}
        if(isset($_GET["eight"])){$payid=$_GET["eight"];}
        if(isset($_GET["nine"])){$payid=$_GET["nine"];}

if($uid===''){echo "<script> alert('Please check your registration');location='index.php' </script>";die();}
if($payid===''){echo "<script> alert('Unknown Error Occured on selecting payment method');location='trialPay.php' </script>";die();}
$_SESSION["payment_method"]=$payid;
$selectConta=Database:: search("SELECT * FROM `student` WHERE `id`='".$uid."'");
$rowconta=$selectConta->fetch_assoc();
//$rowconta=$resultconta->fetch_assoc();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>C H E C K O U T</title>
        <link type="text/css" rel="stylesheet" href="checkout_temp.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link rel="shortcut icon" href="school.png"/>
    </head>
    <body>
        <?php
        // if (isset($_SESSION["is_login"]) && ($_SESSION["is_login"] == true)) {
            ?>
            <div class="product-nav">
                <table class="tb1-carving">
                <tbody>
                    <tr>
                        <th class="col2_1">
                            <div class="div-logo-outer">
                                <div class="left"></div>
                            </div>
                            <a class="backButton-anchor">
                                <button  onclick="window.location='payment_method.php'"class="backButton">Back</button>
                            </a>
                        </th>
                    </tr>
                </tbody>
            </table>      
            </div>
            <div class="product-box1">
                <div class="box-product-body">
                  
                        <div class="box-product-body-inner">
                            <div class="product-details">
                                <form class="data-input-form" method="post" action="checkoutAction.php">
                                                                        <br/>
                                                                        <br/>
                                     <span class="name">Hello<input class="name-session"  name="username" value="<?php echo $_SESSION["s"]["fname"]; ?>"/></span> 
                                    <br/>
                                    <br/>
                                    <input type="text"  class="user-input-field"  placeholder="Card Holders Name" id="user-input-field2"name="holder-name"   onfocus="this.placeholder = 'Enter your Holder Name'"  onfocusout="this.placeholder ='Card Holders Name'" autocomplete="off"   onclick="passwordLoginClick();"  required/> <!-- Password  entering input-->
                                    <br/>    
                                    <input type="text"  class="user-input-field"  placeholder="Card Number" id="user-input-field3" name="card-number"  onfocus="this.placeholder = 'Enter your Card Number'" onfocusout="this.placeholder ='Card Number'"  autocomplete="off"   onclick="firstLoginClick();"  required/> <!-- Password  entering input-->
                                    <br/>
                                    <input type="text"  class="user-input-field"  placeholder="Email Address" id="user-input-field5" name="contact-number"  value="<?php echo "pamaliweerasinghe@gmail.com";?>" onfocus="this.placeholder = 'Enter your Email Address'" onfocusout="this.placeholder ='Email Address'"  autocomplete="off"   onclick="firsttwoLoginClick();"  required/> <!-- Password  entering input-->
                                    <br/>  
                                    <input type="text" class="user-input-field"  placeholder="Admission Number" id="user-input-field4"  name="address"  onfocus="this.placeholder = 'Enter the Admission Number'"  onfocusout="this.placeholder ='Admission Number'"  onclick="lastLoginClick();" autocomplete="off" required/>
                                    <br/>
                                    <div class="btns">
                                    <button  type="submit" class="btn-purchase">Pay&nbsp;LKR&nbsp;<?php echo "3000" ?>.00</button>&nbsp;&nbsp;
                                    <button class="btn-purchase" onclick="window.location='payment_method.php'">BACK</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                       
                    <br/>
                    <br/>
                    <div>
                        <?php  include "footer.php"?>
                    </div>
                </div>
            </div>
            <?php
        // } else {
        //     echo "<script> alert('Please Sign in to continue purchase');location='login_register.php' </script>";
        // }
        ?>
        <script type="text/javascript" src="back.js"></script>
        <script type="text/javascript" src="checkout_temp.js"></script>
    </body>
</html>
