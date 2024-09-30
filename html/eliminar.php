<?php
session_start();

$servidor = "localhost";
$username = "root";
$password = "";
$conexion = mysqli_connect($servidor, $username, $password) or die("Error de conexión");

mysqli_select_db($conexion, "hydragames");

$insert="DELETE FROM carrito WHERE juego_id =". $_GET['id']."";
mysqli_query($conexion, $insert);



    
header('location:carrito.php');

?>
