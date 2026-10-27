<?php

// 1. INICIAR LA SESIÓN
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioIngresado = $_POST['usuario'] ?? '';
    $passwordIngresada = $_POST['password'] ?? '';

    // --- SIMULACIÓN DE VALIDACIÓN EXITOSA ---
    if ($usuarioIngresado === 'programador' && $passwordIngresada === 'pass123') {

        // 2. REGISTRAR DATOS EN LA SUPERGLOBAL $_SESSION
        $_SESSION['autenticado'] = true;
        $_SESSION['nombreUsuario'] = $usuarioIngresado;
        $_SESSION['rol'] = 'Intermedio';
        
        // Redirigir al usuario a la página de bienvenida
        header("Location: bienvenida.php");
        exit;


    } else {
        $mensajeError = "Credenciales incorrectas. Intente de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h3>Login de Usuario</h3>
    <?php if (isset($mensajeError)): ?>
        <p style="color: red;"><?php echo $mensajeError; ?></p>
    <?php endif; ?>
    
    <form method="POST" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>