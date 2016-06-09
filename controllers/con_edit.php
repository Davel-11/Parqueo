<?php

include '../models/mod_data.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    
    session_start();
    
    $id = $_SESSION["id"];
    $car_type = "";
    $color = "";
    $placa = "";
    $num_emp = "";
    $nombre_emp = "";
    
    //settiar variables    
    $car_type = test_input($_POST['car_type']);
    $color = test_input($_POST['color']);
    $placa = test_input($_POST['placa']);
    $num_emp = test_input($_POST['num_emp']);
    $nombre_emp = test_input($_POST['nombre_emp']);
    
    //llamar modelo data
    $op = new mod_data;
    $x = $op->editData($id, $car_type, $color, $placa, $num_emp, $nombre_emp);
    
    //send message it was successfully added     
    $_SESSION["dataEdited"] = $x;
    
 
    header("location:../index02.php");
    
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}