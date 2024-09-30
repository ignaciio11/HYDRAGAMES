<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Establecer el tipo de contenido como HTML
header('Content-Type: text/html');

// Calcular la fecha de expiración (1 hora desde ahora)
$expiration_date = gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT';

// Establecer las cabeceras Cache-Control y Expires
header('Cache-Control: max-age=3600, must-revalidate');
header('Expires: ' . $expiration_date);


$servidor = "localhost";
$username = "root";
$password = "";
$conexion = mysqli_connect($servidor, $username, $password) or die("Error de conexión");

mysqli_select_db($conexion, "hydragames");


$juego = "Aventura";


$consulta = "SELECT nombre, precio, foto_preview, descripcion, id, género  from juegos where género like '%$juego%';";
$registros = mysqli_query($conexion, $consulta);

$i = 0;

while ($registro = mysqli_fetch_array($registros)) {
    $guardado[$i]['nombre'] = $registro['nombre'];
    $guardado[$i]['precio'] = $registro['precio'];
    $guardado[$i]['foto_preview'] = $registro['foto_preview'];
    $guardado[$i]['descripcion'] = $registro['descripcion'];
    $guardado[$i]['id'] = $registro['id'];
    $guardado[$i]['genero'] = $registro['género'];

    $i++;
}



?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aventura</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../cssweb/Categorias.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    
    
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


    <div class="row">

        <div class="columna col-12" align="center">
            <h1>Aventura</h1>
        </div>

    </div>



    <?PHP

if (empty($guardado[0]['nombre'])){
    echo '<div id="fila" class="row justify-content-center">
    <div class="columna col-12" align="center" style="font-size:40px">
    No hemos encontrado ninguna coincidencia con su búsqueda
    </div>
    </div>';
}else {

echo '<div id="fila" class="row justify-content-center">';
for ($i = 0; $i < sizeof($guardado); $i++) {
    $texto_limitado = substr($guardado[$i]["descripcion"], 0, 400);

    echo '<a id="enlace" href="capturarid.php?id=' . $guardado[$i]["id"] . '">
                <div id="c" class="columna col-lg-4 col-md-6 col-xs-12" style="padding-left: 0;">
                    <img id="i0" src="' . $guardado[$i]["foto_preview"] . '" width="410" height="210"> 
                    <h4 id="h4">' . $guardado[$i]["nombre"] . '</h4>
                    <h5 id="h4">' . $guardado[$i]["precio"] . ' €</h5>  
                </div>
            </a>';

    // Incrementa el contador de columnas en la fila actual
    $columnas_en_fila = ($i % 3) + 1;

    // Si se alcanza el límite de tres columnas, cierra la fila actual y comienza una nueva
    if ($columnas_en_fila == 3) {
        echo '</div><div id="fila" class="row justify-content-center">';
    }
}
// Cierra la última fila si no se cerró dentro del bucle
if (sizeof($guardado) % 3 != 0) {
    echo '</div>';
}
}
    ?>





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

<script>
$(document).ready(function() {
    // Función para cargar el contenido de la página a través de AJAX
    function cargarContenidoEnlace(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                // Actualizar el contenido del cuerpo con la respuesta del servidor
                $('body').html(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error("Error al cargar el contenido del enlace:", error);
            }
        });
    }

    // Manejar clics en los enlaces del cuerpo
    $('body').on('click', '.ayax', function(e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        var url = $(this).attr('href'); // Obtener la URL del enlace
        cargarContenidoEnlace(url); // Cargar el contenido del enlace a través de AJAX
    });
});
</script>




</body>

</html>