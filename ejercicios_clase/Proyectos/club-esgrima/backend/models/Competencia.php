<?php
class Competencia {
    private $conn;
    private $table_name = "competencias";

    public $id;
    public $competidor_id;
    public $nombre;
    public $fecha;
    public $gano;
    public $tipo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT c.*, 
                         CONCAT(co.nombre, ' ', co.apellido) AS competidor
                  FROM " . $this->table_name . " c
                  INNER JOIN competidores co ON co.id = c.competidor_id
                  ORDER BY fecha DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (competidor_id, nombre, fecha, gano, tipo)
                  VALUES (:competidor_id, :nombre, :fecha, :gano, :tipo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":competidor_id", $this->competidor_id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":gano", $this->gano, PDO::PARAM_BOOL);
        $stmt->bindParam(":tipo", $this->tipo);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET competidor_id=:competidor_id, nombre=:nombre, fecha=:fecha, 
                      gano=:gano, tipo=:tipo
                  WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":competidor_id", $this->competidor_id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":gano", $this->gano, PDO::PARAM_BOOL);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
