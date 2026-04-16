<?php
class Competidor {
    private $conn;
    private $table_name = "competidores";

    public $id;
    public $nombre;
    public $apellido;
    public $vi;
    public $fechaNacimiento;
    public $categoria;
    public $arma;
    public $mano;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nombre, apellido, vi, fechaNacimiento, categoria, arma, mano)
                  VALUES (:nombre, :apellido, :vi, :fechaNacimiento, :categoria, :arma, :mano)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":vi", $this->vi);
        $stmt->bindParam(":fechaNacimiento", $this->fechaNacimiento);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":arma", $this->arma);
        $stmt->bindParam(":mano", $this->mano);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nombre=:nombre, apellido=:apellido, vi=:vi, fechaNacimiento=:fechaNacimiento,
                      categoria=:categoria, arma=:arma, mano=:mano
                  WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":vi", $this->vi);
        $stmt->bindParam(":fechaNacimiento", $this->fechaNacimiento);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":arma", $this->arma);
        $stmt->bindParam(":mano", $this->mano);
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
