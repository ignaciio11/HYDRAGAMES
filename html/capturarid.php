<?php 
// Inicias la sesión si aún no está iniciada
session_start(); 

//Capturamos el id del juego y lo mandamos a juego.php
if(isset($_GET['id'])) {
    $_SESSION['id_juego'] = $_GET['id'];
    header("location:juego.php");
} else {
    echo "No se ha proporcionado un ID de juego.";
}




?>