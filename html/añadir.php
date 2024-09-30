<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>

<?php
session_start();

$servidor = "localhost";
$username = "root";
$password = "";
$conexion = mysqli_connect($servidor, $username, $password) or die("Error de conexión");
mysqli_select_db($conexion, "hydragames");

// Iniciar la transacción
mysqli_begin_transaction($conexion);

try {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Verificar si se reciben los datos del formulario
    if (isset($_POST['idusuario'], $_POST['idjuego'])) {
        $idusuario = $_POST['idusuario'];
        $idjuego = $_POST['idjuego'];

        $insert = "INSERT INTO carrito (usuario_id, juego_id, cantidad) VALUES ($idusuario, $idjuego, 2)";
        mysqli_query($conexion, $insert);

        // Confirmar la transacción
        mysqli_commit($conexion);

        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Producto añadido al carrito',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(function() {
                window.location.href = 'juego.php';
            }, 1000);
        </script>";
    }
} catch (Exception $e) {
    // En caso de error, revertir la transacción
    mysqli_rollback($conexion);
    echo 'Error: ' . $e->getMessage();
}

mysqli_close($conexion);
?>
