<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once "../config/Database.php";
require_once "../models/Competidor.php";

$database = new Database();
$db = $database->getConnection();
$competidor = new Competidor($db);

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "GET":
        $stmt = $competidor->read();
        $competidores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($competidores);
        break;

    case "POST":
        $data = json_decode(file_get_contents("php://input"));
        $competidor->nombre = $data->nombre;
        $competidor->apellido = $data->apellido;
        $competidor->vi = $data->vi;
        $competidor->fechaNacimiento = $data->fechaNacimiento;
        $competidor->categoria = $data->categoria;
        $competidor->arma = $data->arma;
        $competidor->mano = $data->mano;
        echo json_encode(["success" => $competidor->create()]);
        break;

    case "PUT":
        $data = json_decode(file_get_contents("php://input"));
        $competidor->id = $data->id;
        $competidor->nombre = $data->nombre;
        $competidor->apellido = $data->apellido;
        $competidor->vi = $data->vi;
        $competidor->fechaNacimiento = $data->fechaNacimiento;
        $competidor->categoria = $data->categoria;
        $competidor->arma = $data->arma;
        $competidor->mano = $data->mano;
        echo json_encode(["success" => $competidor->update()]);
        break;

    case "DELETE":
        $data = json_decode(file_get_contents("php://input"));
        $competidor->id = $data->id;
        echo json_encode(["success" => $competidor->delete()]);
        break;
}
