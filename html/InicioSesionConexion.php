<?php
session_start();
$nick=$_GET["username"];
$contrasena=$_GET["password"];
$servidor = "localhost";
$usuario = "root";
$password = "";

$conexion = mysqli_connect($servidor, $usuario, $password) or die("Error de conexión");
mysqli_select_db($conexion, "hydragames");

if (empty($nick)){
    header("Location:InicioSesion.php?error=Usuario Necesario");
    exit();
} elseif(empty($contrasena)){
    header("Location:InicioSesion.php?error=Contraseña Requerida");
    exit();
}else{

$consulta = "SELECT * FROM Usuarios WHERE nick = '$nick' && contrasena='$contrasena'";

$verificar = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($verificar) > 0) {
    $_SESSION['nick'] = $nick;
    header("Location: procesar.php");
} else {
     header("Location:InicioSesion.php?error=Usuario o Contraseña incorrecto");
    }
}
?>