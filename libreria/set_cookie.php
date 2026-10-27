<?php

// 1. Verificar que el formulario se haya enviado y que el valor exista
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nombre_usuario'])) {

    $nombreUsuario = htmlspecialchars($_POST['nombre_usuario']);

    // 2. Definir la expiración: 30 días
    // día = 24 * 60 * 60
    $expiracion = time() + (24*60*60 * 30);

    // 3. ESTABLECER LA COOKIE
    // setcookie(nombre, valor, expiracion, ruta)
    setcookie("usuario_web", $nombreUsuario, $expiracion, "/");

    // 4. Redirigir al index para que el navegador envíe la nueva cookie
    header("Location: ../bienvenida.php");
    exit;
} else {
    // Manejo de error si se accede directamente a este script sin enviar formulario
    header("Location: ../index.php");
    exit;
}
?>