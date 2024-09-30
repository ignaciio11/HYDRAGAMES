  
<?php
session_start();


$servidor="localhost";
$username="root";
$password="";
$conexion=mysqli_connect($servidor, $username, $password) or die ("Error de conexión");

mysqli_select_db($conexion, "hydragames");


$id_juego =$_SESSION["id_juego"];

$consulta="SELECT nombre, precio, foto_preview, descripcion, género, trailer, id FROM juegos WHERE id = '$id_juego'";
$registros=mysqli_query($conexion, $consulta);

$i=0;

while($registro=mysqli_fetch_array($registros)){
    $guardado[$i]['nombre'] = $registro['nombre'];
    $guardado[$i]['precio'] = $registro['precio'];
    $guardado[$i]['foto_preview'] = $registro['foto_preview'];
    $guardado[$i]['descripcion'] = $registro['descripcion'];
    $guardado[$i]['género'] = $registro['género'];
    $guardado[$i]['trailer'] = $registro['trailer'];
    $guardado[$i]['id'] = $registro['id'];


    $i++;
}

if (isset($_SESSION['nick'])){

    $us=$_SESSION['nick'];
    
    $consultau='SELECT id FROM usuarios WHERE nick = "'.$us.'"';
    $registrosu=mysqli_query($conexion, $consultau);
    
    while($registrou=mysqli_fetch_array($registrosu)){
        $u[0]['id'] = $registrou['id'];
        
    }
    
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../cssweb/juego.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="ayax.js"></script>
     <script src="apiyoutube.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>

    <style>
    

    </style>
</head>
<header>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6 col-xs-12">
                <a class="ayax" href="Principal.php">
                    <img id="log0" alt="Logo" class="logo" src="..\HydraGamesBlanco_preview_rev_1.png" height="32" />
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <ul class="nav">
                    <li class="nav-item"><a class="ayax" id="nav" class="nav-link" class="enlace"
                            href="Principal.php">Inicio</a></li>
                    <li class="nav">
                        <button id="dropdown-btn" class="enlace">Categorías</button>
                        <ul id="dropdown-menu" class="dropdown-menu"
                            style="background-color: rgba(8, 49, 86, 1);; border: none; cursor: pointer;">
                            <li><a id="despl" href="Aventura.php">Aventura</a></li>
                            <li><a id="despl" href="Deporte.php">Deporte</a></li>
                            <li><a id="despl" href="Terror.php">Terror</a></li>
                            <li><a id="despl" href="Estrategia.php">Estrategia</a></li>
                            <li><a id="despl" href="Shooter.php">Shooter</a></li>
                            <li><a id="despl" href="mundoabierto.php">Mundo abierto</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="ayax" id="nav" class="nav-link" class="enlace" href="contacto.html">Contacto</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-xs-12">
                <form class="search-box" action="buscar.php" method="post">
                    <i class="fas fa-search"></i>
                    <input id="bus" name="busqueda" aria-label="Search" class="form-control" placeholder="Buscar..."
                        type="text" />
                </form>
            </div>
            <div class="col-lg-2 col-md-6 col-xs-12">
    <ul class="nav">
        <li class="nav-item"><a id="navcarro" class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i></a></li>
        <div class="dropdown">
        <a><i id="iconousuario" class="fas fa-user"></i><?Php 
                if (isset($_SESSION['nick'])){
                echo '&nbsp&nbsp'.$_SESSION['nick'].'
                <div class="dropdown-content">
                <a class="ayax" href="cerrarsesion.php">Cerrar Sesión</a>
            </div>';
                }else{
                    echo '<a class="ayax" id="enlaceS" href="InicioSesion.php">Iniciar sesion</a>';
                }
                
                ?></a>
        
    </div>
            </ul>
        </div>
    </ul>
</div>



        </div>
    </div>
</header>




<body>
    <!--Cuerpo de la Web-->
    <div class="container">
<?php
$id=$guardado[0]["trailer"];
?>
        
        
    <div id="miDiv" data-id="<?php echo $id; ?>"></div>
        
    <?php
    if (isset($us)){

    }else {
        $u[0]['id']="a";
    }

echo '
    <div id="caja" class="row">
        <div class="columna col-lg-6 col-xs-12 col-xs-12" align="center">
            <img src="' . $guardado[0]['foto_preview'] . '" width="550px">
        </div>

        <div class="columna col-lg-6 col-xs-6 col-xs-12">
            <h2 id="linea" align="center">' . $guardado[0]['nombre'] . '</h2>
            <hr>
            <div id="precio" class="row">
                <h3 id="linea" align="center">' . $guardado[0]['género'] . '</h3>
                <div class="columna col-12" align="center">
                    <h3>' . $guardado[0]['precio'] . ' €  <i id="tick" class="fas fa-check-circle" style="color: green;"></i> En stock</h3>
                </div>
            </div>

            <div class="row">
                <div id="anadir" class="columna col-12" align="center">
                <form action="' . ($u[0]['id'] == 'a' ? "javascript:void(0)" : "añadir.php") . '" method="post" onsubmit="' . ($u[0]['id'] == 'a' ? "error(); return false;" : "") . '">
                        <input type="hidden" name="idusuario" value="' . htmlspecialchars($u[0]['id']) . '">
                        <input type="hidden" name="idjuego" value="' . htmlspecialchars($guardado[0]['id']) . '">
                        <button type="submit" class="add-to-cart-btn">Añadir a la cestas <i class="fas fa-cart-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="columna col-lg-6 col-xs-12 col-xs-12">
            <h1 id="descripcion" align="center"><strong>Descripción</strong></h1>
        </div>

        
    </div>

    <div class="row">
        <div class="columna col-lg-6 col-xs-12 col-xs-12">
            <p id="des">' . $guardado[0]['descripcion'] . '</p>
        </div>

        <div id="youtube" class="columna col-lg-6 col-xs-12 col-xs-12"></div>
    </div>';
?>


       

            

<script>

    function error(){
        alert("Debes inciar sesión para agregar el juego a la cesta");
    }

</script>

        </div>

    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#dropdown-btn").click(function () {
                $("#dropdown-menu").toggle();
            });

            $(document).click(function (event) {
                var $target = $(event.target);
                if (!$target.closest('#dropdown-btn').length &&
                    !$target.closest('.dropdown-menu').length) {
                    $("#dropdown-menu").hide();
                }
            });
        });


    </script>

</body>

</html>