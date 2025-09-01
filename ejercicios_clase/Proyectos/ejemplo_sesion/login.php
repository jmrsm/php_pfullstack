<?php
ini_set('session.gc_maxlifetime', 7200); // 2 horas en segundos
session_set_cookie_params(7200);
session_start();

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($user === 'admin' && $pass === '1234') {
        $_SESSION['usuario'] = 'admin';
        header("Location: dashboard.php");
        exit;
    } else {
        $mensaje = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">Iniciar Sesión</h4>

                        <?php if ($mensaje): ?>
                            <div class="alert alert-danger"><?= $mensaje ?></div>
                        <?php endif; ?>

                        <form method="post">
                            <div class="mb-3">
                                <label for="user" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="user" id="user" required>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="pass" id="pass" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                        </form>
                    </div>
                </div>
                <p class="text-muted text-center mt-3">Usuario: <b>admin</b> | Contraseña: <b>1234</b></p>
            </div>
        </div>
    </div>
</body>
</html>
