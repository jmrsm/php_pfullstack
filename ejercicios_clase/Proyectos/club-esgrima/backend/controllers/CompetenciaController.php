<?php
require_once __DIR__ . '/../models/Competencia.php';

class CompetenciaController {
    private $competencia;

    public function __construct($db) {
        $this->competencia = new Competencia($db);
    }

    public function getAll() {
        $stmt = $this->competencia->read();
        $competencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($competencias);
    }

    public function getById($id) {
        $this->competencia->id = $id;
        $stmt = $this->competencia->readOne();
        echo json_encode($stmt);
    }

    public function create($data) {
        $this->competencia->id_competidor = $data['id_competidor'];
        $this->competencia->nombre_competencia = $data['nombre_competencia'];
        $this->competencia->fecha_competencia = $data['fecha_competencia'];
        $this->competencia->gano = $data['gano'];
        $this->competencia->tipo = $data['tipo'];

        if($this->competencia->create()) {
            echo json_encode(["message" => "Competencia registrada correctamente."]);
        } else {
            echo json_encode(["message" => "Error al registrar competencia."]);
        }
    }

    public function update($id, $data) {
        $this->competencia->id = $id;
        $this->competencia->id_competidor = $data['id_competidor'];
        $this->competencia->nombre_competencia = $data['nombre_competencia'];
        $this->competencia->fecha_competencia = $data['fecha_competencia'];
        $this->competencia->gano = $data['gano'];
        $this->competencia->tipo = $data['tipo'];

        if($this->competencia->update()) {
            echo json_encode(["message" => "Competencia actualizada correctamente."]);
        } else {
            echo json_encode(["message" => "Error al actualizar competencia."]);
        }
    }

    public function delete($id) {
        $this->competencia->id = $id;

        if($this->competencia->delete()) {
            echo json_encode(["message" => "Competencia eliminada."]);
        } else {
            echo json_encode(["message" => "Error al eliminar competencia."]);
        }
    }
}
?>