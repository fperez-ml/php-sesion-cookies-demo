<?php
// 1. INICIAR LA SESIÓN
session_start();

// 2. VERIFICAR AUTENTICACIÓN
// Si la clave 'autenticado' NO está seteada o NO es verdadera,
// redirigimos al usuario al login.
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header("Location: login.php");
    exit;
}

// Los datos de la sesión están disponibles para su uso:
$nombre = $_SESSION['nombreUsuario'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Bienvenida</title>
    </head>
    <body>
        <h1>🎉 ¡Bienvenido a la Zona Segura!</h1>

        <p>Hola, **<?php echo htmlspecialchars($nombre); ?>**.</p>
        <p>Tu rol de programador es: **<?php echo htmlspecialchars($rol); ?>**.</p>

        <hr>
        
        <?php
        include 'libreria/configuracion.php';
        ?>

        <h3>Valores almacenados en la sesión</h3>
        <div>
            <?php
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
            ?>
        </div>

        <div>
            <a href="cerrar_sesion.php">Cerrar Sesión</a>
        </div>
    </body>
</html>