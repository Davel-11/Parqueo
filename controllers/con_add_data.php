<?php

include '../models/mod_data.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    
    $id_user = "";
    $email = "";
    $car_type = "";
    $color = "";
    $placa = "";
    $num_emp = "";
    $nombre_emp = "";
    
    //settiar variables
    $id_user = test_input($_POST['id_user']);
    $email = test_input($_POST['email']);
    $car_type = test_input($_POST['car_type']);
    $color = test_input($_POST['color']);
    $placa = test_input($_POST['placa']);
    $num_emp = test_input($_POST['num_emp']);
    $nombre_emp = test_input($_POST['nombre_emp']);
    
    //llamar modelo data
    $op = new mod_data;
    $x = $op->addData($id_user, $email, $car_type, $color, $placa, $num_emp, $nombre_emp );
    
    //send message it was successfully added
    session_start();   
    $_SESSION["dataAdded"] = "<p class='editado'>Informacion Agregada Exitosamente</p>";
 
    header("location:../index02.php");
    
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}