<?php

include '../models/mod_users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {        
 
 $nombre = "";
 $email = ""; 
 $pass = "";
 
 //settiar variables
 $nombre = test_input($_POST['nombre']);
 $email = test_input($_POST['email']);
 $pass = test_input($_POST['pass']); 
 
 //llamar modelo usuarios
 $op = new mod_users; 
 $x = $op->addUser($nombre, $email, $pass);  
 
 session_start();   
 $_SESSION["userCreated"] = $x;
 
 header("location:../index.php");
 //echo '<script>window.location.replace("../index.php");</script>';
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}