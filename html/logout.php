<?php 
    session_start();
    session_destroy();
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
    header("location:login.php");
?>