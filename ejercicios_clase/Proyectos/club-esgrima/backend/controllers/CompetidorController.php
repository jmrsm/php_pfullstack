<?php
require_once __DIR__ . '/../models/Competidor.php';

class CompetidorController {
    private $competidor;

    public function __construct($db) {
        $this->competidor = new Competidor($db);
    }

    public function getAll() {
        $stmt = $this->competidor->read();
        $competidores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($competidores);
    }

    public function getById($id) {
        $this->competidor->id = $id;
        $stmt = $this->competidor->readOne();
        echo json_encode($stmt);
    }

    public function create($data) {
        $this->competidor->nombre = $data['nombre'];
        $this->competidor->apellido = $data['apellido'];
        $this->competidor->vi = $data['vi'];
        $this->competidor->fecha_nacimiento = $data['fecha_nacimiento'];
        $this->competidor->categoria = $data['categoria'];
        $this->competidor->arma = $data['arma'];
        $this->competidor->lateralidad = $data['lateralidad'];

        if($this->competidor->create()) {
            echo json_encode(["message" => "Competidor creado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al crear competidor."]);
        }
    }

    public function update($id, $data) {
        $this->competidor->id = $id;
        $this->competidor->nombre = $data['nombre'];
        $this->competidor->apellido = $data['apellido'];
        $this->competidor->vi = $data['vi'];
        $this->competidor->fecha_nacimiento = $data['fecha_nacimiento'];
        $this->competidor->categoria = $data['categoria'];
        $this->competidor->arma = $data['arma'];
        $this->competidor->lateralidad = $data['lateralidad'];

        if($this->competidor->update()) {
            echo json_encode(["message" => "Competidor actualizado correctamente."]);
        } else {
            echo json_encode(["message" => "Error al actualizar competidor."]);
        }
    }

    public function delete($id) {
        $this->competidor->id = $id;

        if($this->competidor->delete()) {
            echo json_encode(["message" => "Competidor eliminado."]);
        } else {
            echo json_encode(["message" => "Error al eliminar competidor."]);
        }
    }
}
?>
