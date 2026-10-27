<?php
// 1. INICIAR LA SESIÓN para tener acceso al ID de sesión actual
session_start();

// 2. ELIMINAR TODAS LAS VARIABLES DE SESIÓN (Vaciar el array $_SESSION)
$_SESSION = array();

// 3. Opcional: Destruir la COOKIE de sesión del navegador
// Esto asegura que el navegador olvide el PHPSESSID.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
    );
}

// 4. DESTRUIR EL ARCHIVO DE SESIÓN en el servidor
session_destroy();

// Redirigir al usuario al inicio de sesión u otra página pública
//header("Location: login.php");
//exit;
?>


<html>
    <body>
        <div>
            <h3>Valores de sesion despues de destruirla</h3>
            <?php
            echo '<pre>';
            print_r($_SESSION);
            echo '</pre>';
            ?>
        </div>
        <div>
            <a href="login.php">Volver a login.php</a>
        </div>
    </body>
</html>