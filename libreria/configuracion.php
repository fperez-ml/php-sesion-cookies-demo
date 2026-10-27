<?php
// Este script se incluye dentro de index.html
/*
// 1. Intentar leer la cookie en la superglobal $_COOKIE
if (isset($_COOKIE["usuario_web"])) {
    $nombre = htmlspecialchars($_COOKIE["usuario_web"]);
    echo "<p style='color: green;'>✅ **Cookie encontrada:** ¡Hola, **$nombre**! (expira en 30 días)</p>";
} else {
    echo "<p style='color: red;'>❌ **Cookie no encontrada.** Por favor, introduce tu nombre arriba para establecerla.</p>";
}*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Uso de Cookies</title>
</head>
<body>

    <h1>Gestión de Cookies con PHP</h1>

    <form action="libreria/set_cookie.php" method="POST">
        <label for="nombre">Introduce tu nombre:</label>
        <input type="text" id="nombre" name="nombre_usuario" required>
        <button type="submit">Establecer Cookie</button>
    </form>

    <hr>

    <h2>Resultado de la Cookie:</h2>
    <?php include 'cookie_color.php'; ?>

</body>
</html>