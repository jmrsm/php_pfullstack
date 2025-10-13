<?php
// db.php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mi_bd');
define('DB_CHAR', 'utf8mb4');
define('DB_USER', 'usuario'); // cambiar user y pass
define('DB_PASS', 'pass');

try {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHAR;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    
    die("Conexión fallida: " . $e->getMessage());
}
