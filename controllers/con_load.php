<?php

include '../models/database_con.php';

session_start();
$x = $_GET['id'];
$_SESSION["id"] = $x;
        
//1. get conect var
$op = new database_con;
$con = $op->connect();

//2. sql Statement
$query = "SELECT * FROM data WHERE id='$x' ";
$res = $con->query($query);

//3. Check if exist and display data
if ($res -> num_rows > 0 ) {
    
    while  ($row = $res->fetch_assoc()){
        
        $_SESSION["x1"] = $row['car_type'] ;
        $_SESSION["x2"] = $row['color'] ;
        $_SESSION["x3"] = $row['placa'];
        $_SESSION["x4"] = $row['num_emp'];
        $_SESSION["x5"] = $row['nombre_emp']; 
        header("location:../edit.php");
    }
    
} else {
    echo '0 resutls';
}

