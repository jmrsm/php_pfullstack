<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once "../config/Database.php";
require_once "../models/Competencia.php";

$database = new Database();
$db = $database->getConnection();
$competencia = new Competencia($db);

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        $stmt = $competencia->read();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as &$row) {
            $row['resultado'] = $row['gano'] ? 'Ganó' : 'Perdió';
        }
        echo json_encode($data);
        break;

    case "POST":
        $input = json_decode(file_get_contents("php://input"));
        $competencia->competidor_id = $input->competidor_id;
        $competencia->nombre = $input->nombre;
        $competencia->fecha = $input->fecha;
        $competencia->gano = $input->gano;
        $competencia->tipo = $input->tipo;
        echo json_encode(["success" => $competencia->create()]);
        break;

    case "PUT":
        $input = json_decode(file_get_contents("php://input"));
        $competencia->id = $input->id;
        $competencia->competidor_id = $input->competidor_id;
        $competencia->nombre = $input->nombre;
        $competencia->fecha = $input->fecha;
        $competencia->gano = $input->gano;
        $competencia->tipo = $input->tipo;
        echo json_encode(["success" => $competencia->update()]);
        break;

    case "DELETE":
        $input = json_decode(file_get_contents("php://input"));
        $competencia->id = $input->id;
        echo json_encode(["success" => $competencia->delete()]);
        break;
}
