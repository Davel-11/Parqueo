<?php

include '../models/mod_data.php';

$id = $_GET['id'];

$op = new mod_data;
$con = $op->DeleteUser($id);

session_start();
$_SESSION["delete"] = $con;

 header("location:../index02.php");



