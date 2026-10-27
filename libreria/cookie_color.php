<?php
// ==========================================================
// 1. Lógica para establecer y leer la cookie
// ==========================================================

$nombre_cookie = "fondo_preferido";
$color_actual = "white";

// A. Lógica para ESTABLECER la Cookie (Recibe el color del formulario)
if (isset($_POST['color_elegido'])) {

    $color_elegido = htmlspecialchars($_POST['color_elegido']);

    // Configura la cookie para que dure 30 días (86400 segundos * 30 días)
    $expiracion = time() + (86400 * 30);

    // ** setcookie() debe ir antes de cualquier salida HTML **
    setcookie($nombre_cookie, $color_elegido, $expiracion, "/");

    // Actualiza la variable de color para el renderizado inmediato
    $color_actual = $color_elegido;
}
// B. Lógica para LEER la Cookie (Si no se ha enviado el formulario, busca la cookie)
else if (isset($_COOKIE[$nombre_cookie])) {

    // Si la cookie existe, usamos el valor guardado
    $color_actual = htmlspecialchars($_COOKIE[$nombre_cookie]);
}

// ==========================================================
// 2. Salida HTML
// ==========================================================
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Selector de Color con Cookie</title>
    </head>
    <body style="background-color: <?= $color_actual; ?>;">

        <h1>Selector de Color de Fondo</h1>

<?php if (isset($_COOKIE[$nombre_cookie])): ?>
            <p>Tu color guardado es: <strong>**<?= $color_actual; ?>**<strong></p>
        <?php else: ?>
                        <p>No tienes una preferencia de color guardada. Elige uno.</p>
                    <?php endif; ?>

                    <hr>

                    <h3>Elige un nuevo color:</h3>

                    <form method="POST">
                        <label>
                            <input type="radio" name="color_elegido" value="lightblue" required> Azul Claro
                        </label><br>
                        <label>
                            <input type="radio" name="color_elegido" value="lightgreen"> Verde Claro
                        </label><br>
                        <label>
                            <input type="radio" name="color_elegido" value="lightcoral"> Coral Claro
                        </label><br><br>
                        <button type="submit">Guardar Preferencia</button>
                    </form>

                    <hr>

                    <p>💡 <strong>**Instrucción:**</strong> Después de seleccionar un color, cierra y vuelve a abrir el navegador (o borra la cookie) para verificar si tu preferencia persiste.</p>

                    </body>
                    </html>