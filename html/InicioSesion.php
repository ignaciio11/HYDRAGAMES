<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../cssweb/InicioSesion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="container-center">
    <div class="container">
        <div class="row">
            <div class="columna col-9">
                
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <h2>Inicia sesión</h2>
                    </div>
                </div>
                <br><br>
                <div class="row" id="ISS">
                    <div class="columna col-lg-2 col-md-4 col-xs-12">
                        <a href=""><img src="imgsesion/5847f9cbcef1014c0b5e48c8.png" width="100"></a>
                    </div>
                    <div class="columna col-lg-2 col-md-4 col-xs-12">
                        <a href=""><img src="imgsesion/Facebook_Logo_(2019).png.webp" width="100"></a>
                    </div>

                    <div class="columna col-lg-2 col-md-4 col-xs-12">
                        <a href=""><img src="imgsesion/580b57fcd9996e24bc43c516.png" width="100"></a>
                    </div>
                </div>
                <br><br>
                <br><br>
                <?php
                if(isset($_GET["error"])){
                    ?>
                    <p class="error ">
                        <?php
                        echo "*". $_GET["error"];
                        ?>
                    </p>
                <?php
                }
                ?>
                <form action="InicioSesionConexion.php" method="get">
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <i class="fa-solid fa-user"></i>
                        <input type="username" id="username" name="username" style="WIDTH: 426px; HEIGHT: 35px"
                            placeholder="Nombre de usuario">
                    </div>
                </div>
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <i class="fa-solid fa-unlock"></i>
                        <input type="password" id="password" name="password" style="WIDTH: 426px; HEIGHT: 34px"
                            placeholder="Contraseña">
                    </div>
                </div>
                <br><br>
                <div class="row" id="IS">
                    <div class="columna col-12">
                        <input id="b" type="submit" value="Iniciar sesión" style="WIDTH: 426px; HEIGHT: 40px">
                    </div>
                </div>
                </form>
                <br>
                <div class="row" id="ISSS">
                    <div class="columna col-lg-6 col-md-6 col-xs-12" id="ISSSS">
                        <a href="registro.php"><label>¿No tienes una cuenta?</label></a>
                    </div>
                    <div class="columna col-lg-6 col-md-6 col-xs-12">
                        <a href=""><label>¿Has olvidado tu contraseña?</label></a>
                    </div>
                </div>
            </div>
            <div class="columna col-3">
            <div id="foto-container">
                <img id="foto" src="imgsesion/wp5326067.webp" width="470">
            </div>
            </div>
        </div>
    </div>
</div>
</body>



</html>
