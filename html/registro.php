<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../cssweb/registro.css">
    
</head>

<body>
<div class="container-center">
<img src="imgsesion/red3.png" alt="Fondo" class="background-image">
    <div class="container">
        <div class="row">
            <div class="columna col-9">
                
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <h2>Página de Registro</h2>
                        <?php
                        if(isset($_GET["errar"])){
                    ?>
                    <p class="errar ">
                        <?php
                        echo"*". $_GET["errar"];
                        ?>
                    </p>
                <?php
                }
                ?>
                    </div>
                </div>
                <form action="RegistroConexion.php" method="post" onsubmit="return validacion()">
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-lg-2 col-md-4 col-xs-12">
                        <input type="username" id="username" name="username" style="WIDTH: 426px; HEIGHT: 35px"
                        placeholder="Nombre de usuario"></div>
           
                </div>
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-lg-2 col-md-4 col-xs-12">
                        <input type="password" id="password" name="password" style="WIDTH: 426px; HEIGHT: 35px"
                        placeholder="Contraseña"></div>
                </div>
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <input type="password" id="repassword" name="repassword" style="WIDTH: 426px; HEIGHT: 35px"
                            placeholder="Repita la contraseña">
                    </div>
                </div><br><br>
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <input type="text" id="name" name="name" style="WIDTH: 426px; HEIGHT: 35px"
                            placeholder="Nombre y apellidos">
                    </div>
                </div>
                <br><br>
                
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <input type="email" id="email" name="email" style="WIDTH: 426px; HEIGHT: 35px"
                            placeholder="Correo electrónico">
                    </div>
                </div>
                <br><br>
                
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <input type="submit" value="Confirmar" style="WIDTH: 426px; HEIGHT: 40px">
                    </div>
                </div>
                </form>
                <br>
                <div class="row" id="ISSS">
                    <div class="columna col-lg-6 col-md-6 col-xs-12" id="ISSSS">
                        <a href="InicioSesion.php"><label>¿Ya tienes una cuenta?</label></a>
                    </div>
                    <div class="columna col-lg-6 col-md-6 col-xs-12">
                        <a href=""><label>¿Has olvidado tu contraseña?</label></a>
                    </div>
                </div>
            </div>
            <div class="columna col-3" style="padding-right:0; padding-bottom:0;">
                <div id="foto-container">
                <img id="foto" src="imgsesion/wp5326067.webp">
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>