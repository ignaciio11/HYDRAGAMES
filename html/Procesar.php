<?php
session_start(); 

if (isset($_SESSION['nick'])) {
    header("Location:animacion/loader.php");}
    else{
    header("Location: InicioSesion.php");}
    exit(); 
?>
