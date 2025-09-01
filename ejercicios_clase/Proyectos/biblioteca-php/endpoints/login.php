<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once '../clases/Usuario.php';

$data = json_decode(file_get_contents("php://input"), true);
$usuario = new Usuario();

$resultado = $usuario->login($data['nombre_usuario'], $data['contrasena']);
echo json_encode($resultado);
?>