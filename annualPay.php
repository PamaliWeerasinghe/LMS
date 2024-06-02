<?php
session_start();
require "connection.php";


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Payment Method</title>
        <link type="text/css" rel="stylesheet" href="paymentMethod.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
        <link rel="shortcut icon" href="school.png"/>
        <?php
        $uid="";
        ?>
    </head>
    <body>
        <div class="row">
            <?php include "header.php" ?>
        </div>
        <br/>
        <?php
        if(isset($_SESSION["s"]["id"])){$uid=$_SESSION["s"]["id"];}
        if($uid===''){echo "<script> alert('Please check your registration');location='index.php' </script>";die();}

            ?>
            <div class="product-box1">
                <div class="box-product-body">
                    <div class="box-product-body-inner">
                        <form class="product-details" method="get" action="annualPayCheckout.php">
                            <div class="payment-heading-div-outer">
                                <div class="payment-method-logo">
                                    <div class="payment-method-logo-inner"></div>
                                </div>
                                <div class="payment-method-desc">
                                    <br/>
                                    <span class="saying">Your Annual Payment Is</span>
                                    <span class="sell_price">LKR 10,000.00</span>
                                </div>
                            </div>
                            <div class="payment-options-div-outer">
                                <span class="select-pay-sp">Select a payment Method</span>
                                <br/>
                                <br/>
                                <span class="payment-type-one">Credit/Debit Card</span>
                                <div class="payment-methods">
                                    <input class="one" name="one" id="one" type="submit" value="visa"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="two" name="two" type="submit" value="mastercard"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="three" name="three" type="submit" value="americanexpress"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="four" name="four" type="submit" value="discover"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="five" name="five" type="submit" value="dinnersclub"/>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                                <br/>
                                <br/>
                                <span class="payment-type-one">Mobile Wallet</span>
                                <div class="payment-methods">
                                    <input class="six" name="six" type="submit" value="paypal"/>
                                    &nbsp;&nbsp;&nbsp;
                                     <input class="seven" name="seven" type="submit" value="bbb"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="eight" name="eight" type="submit" value="worldpay"/>
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="nine" name="nine" type="submit" value="hsbc"/>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="row">
                        <?php include "footer.php"?>
                    </div>
                </div>
            </div>
        <script type="text/javascript" src="back.js"></script>
    </body>
</html>

