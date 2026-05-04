<?php
session_start(); // inicia la sesion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre_usuario'];
    
    // guardamos datos en la sesion
    $_SESSION['usuario'] = $nombre;
    
    // rederigimos 
    header("Location: index.php");
    exit();
}
?>