<?php
require_once 'db.php';

$email = $_GET['email'] ?? '';

/* conjunto de validaciones validad*/
if (strlen($email) > 254) {
    http_response_code(400);
    exit('Email demasiado largo.');
}
if (preg_match('/[\r\n]/', $email)) {
    http_response_code(400);
    exit('Email inválido (caracteres prohibidos).');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Email con formato inválido.');
}

/* Consulta parametrizada */
$sql = 'SELECT id, nombre, email FROM usuarios WHERE email = :email';
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);

echo "<h2>Resultado (seguro)</h2>";
if ($stmt->rowCount() === 0) {
    echo "No se encontraron usuarios.";
} else {
    while ($row = $stmt->fetch()) {
        echo "ID: " . htmlspecialchars($row['id']) .
             " - Nombre: " . htmlspecialchars($row['nombre']) .
             " - Email: " . htmlspecialchars($row['email']) . "<br>";
    }
}
