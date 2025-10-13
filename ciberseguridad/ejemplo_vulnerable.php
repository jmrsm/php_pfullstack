<?php

require_once 'db.php';

// tomo el parametro
$email = $_GET['email'] ?? '';

// consulta vulnerable
$sql = "SELECT id, nombre, email FROM usuarios WHERE email = '$email'";

try {
    $stmt = $pdo->query($sql);
} catch (PDOException $e) {
    echo "Error SQL: " . htmlspecialchars($e->getMessage(), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    exit;
}

echo "<h2>Resultado (vulnerable)</h2>";
if ($stmt->rowCount() === 0) {
    echo "No se encontraron usuarios.";
} else {
    while ($row = $stmt->fetch()) {
        echo "ID: " . htmlspecialchars($row['id']) .
             " - Nombre: " . htmlspecialchars($row['nombre']) .
             " - Email: " . htmlspecialchars($row['email']) . "<br>";
    }
}
