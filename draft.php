<?php 
session_start();
require "connection.php";
if(isset($_SESSION["admin"])){
    if($_SESSION["admin"]["verification_code"]=='verified'){
        $id=$_SESSION["admin"]["id"];


    }else{
        include "register.php";
    }
   
}else{
    require "index.php";
}
?>
