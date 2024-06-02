<?php
session_start(); 
require "connection.php";
$pid=$_GET["pid"];
$email=$_SESSION["u"]["email"];



$cart=Database::search("SELECT * FROM `cart` WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
$product=Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");

$cart_data=$cart->fetch_assoc();
$product_data=$product->fetch_assoc();
$qty=$product_data["qty"];
$cartqty=$cart_data["qty"];
if($qty>0){
    $qty=$qty-1;
    $cartqty=$cartqty+1;
    Database::iud("UPDATE `product` SET `qty`='".$qty."' WHERE `id`='".$pid."'");
    Database::iud("UPDATE `cart` SET `qty`='".$cartqty."' WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
    echo($cartqty);
    
}else if($qty==0){
    
    Database::iud("UPDATE `product` SET `qty`='0' WHERE `id`='".$pid."'");
    Database::iud("UPDATE `cart` SET `qty`='".$cartqty."' WHERE `product_id`='".$pid."' AND `user_email`='".$email."'");
    echo("Products are over");

}











?>