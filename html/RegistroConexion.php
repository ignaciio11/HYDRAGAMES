<?php 

//Nos conectamos a la base datos que hemos creado
$servidor="localhost";
$username="root";
$password="";
$conexion=mysqli_connect($servidor, $username, $password) or die ("Error de conexión");

mysqli_select_db($conexion, "hydragames");

//Capturamos los datos del formulario+2
$nombre=$_POST["name"];
$nick=$_POST["username"];
$contrasena=$_POST["password"];
$recontrasena=$_POST["repassword"];
$correo=$_POST["email"];

if (empty($nombre)){
    header("Location:Registro.php?errar=Nombre Necesario");
    exit();
} if(empty($contrasena)){
    header("Location:Registro.php?errar=Contraseña Necesaria");
    exit();
}if(empty($nick)){
    header("Location:Registro.php?errar=Nombre de usuario Necesario");
    exit();
}if(empty($recontrasena)){
    header("Location:Registro.php?errar=Contraseña Requerida");
    exit();
}if(empty($correo)){
    header("Location:Registro.php?errar=Correo Necesario");
exit();
}else{
//Comprobamos que el nombre de usuario introducio al registrarse no está ya creado

$consulta="SELECT nick from usuarios where nick='$nick'";
$registros=mysqli_query($conexion, $consulta);
$encontrado=false;

//Recorremos todas las columnas de la tabla y si encuentra el nombre de usuario repetido cambiamos le booleano a true.
while($registro=mysqli_fetch_row($registros)){
    
    if($registro[0] == $nick) {
        $encontrado = true;
    } else {
         $encontrado = false;
    }
}

//Si el nombre de usuario es nuevo, introducimos todos los datos.
if($encontrado){
    header("Location:Registro.php?errar=Este nick ya existe");
} else{

    if ($contrasena==$recontrasena){
    $insertar="insert into usuarios (nombre, nick, contrasena, correo) values ('$nombre', '$nick', '$contrasena', '$correo')";
    mysqli_query($conexion, $insertar);
    header('location:InicioSesion.php');

}else {
        header("Location:Registro.php?errar=Las contrasenñas no coinciden");
}
}
}
?>