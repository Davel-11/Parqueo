<?php

include '../models/mod_users.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {        
 
 $email = ""; 
 $pass = "";
 
 $email = $_POST['email'];
 $pass = $_POST['pass'];

 
 $op = new mod_users;
 $x = $op->Login($email, $pass); 
 
 if ($x == TRUE){
     session_start();                         
     $_SESSION["login"] = 'valid';     
     header("location:../index02.php");   
 } else {
    session_start();   
    $_SESSION["login"] = "Usuario/Contreña Invalida"; 
    header("location:../index.php");
 }
} else {
    session_start();   
    $_SESSION["login"] = "Please sign in first"; 
    header("location:../index.php");
}