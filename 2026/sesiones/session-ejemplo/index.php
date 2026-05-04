<?php
session_start(); // Siempre al inicio
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de Sesion PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['usuario'])): ?>
            <!-- pregunto si existe-->
            <h1>Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
            <p>Tu sesión está activa.</p>
            <a href="logout.php"><button>Cerrar Sesión</button></a>
        <?php else: ?>
            <!-- si no existe, mostramos el formulario-->
            <h1>Iniciar Sesión</h1>
            <form action="procesar.php" method="POST">
                <input type="text" name="nombre_usuario" placeholder="Tu nombre" required>
                <br>
                <button type="submit">Entrar</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>