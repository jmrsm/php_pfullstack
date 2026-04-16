<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../clases/libro.php';
header('Content-Type: application/json');

try {
    $libro = new Libro();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            echo json_encode($libro->listar());
            break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            $ok = $libro->agregar($data['titulo'], $data['autor'], $data['anio_publicacion'], $data['isbn']);
            echo json_encode(['success' => $ok]);
            break;
        case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            $ok = $libro->actualizar($data['id_libro'], $data['titulo'], $data['autor'], $data['anio_publicacion'], $data['isbn']);
            echo json_encode(['success' => $ok]);
            break;
        case 'DELETE':
            parse_str(file_get_contents("php://input"), $data);
            $ok = $libro->eliminar($data['id_libro']);
            echo json_encode(['success' => $ok]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>