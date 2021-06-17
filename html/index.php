<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
    if(!isset($_SESSION['UserData'])) {
        header("location:login.php");
        exit;
    } 
    
 ?>

You are logged in!