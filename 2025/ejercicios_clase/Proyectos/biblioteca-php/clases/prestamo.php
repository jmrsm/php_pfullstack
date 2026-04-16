<?php
require_once __DIR__ . '/../conexion.php';

class Prestamo {
    private $pdo;

    public function __construct(){
        $this->pdo = Conexion::getPDO();
    }
    public function registrar($id_usuario, $id_libro){
        $stmt = $this->pdo->prepare("INSERT INTO Prestamo (id_usuario, id_libro, fecha_prestamo) VALUES(?,?,CURDATE())");
        return $stmt->execute([$id_usuario, $id_libro]);
    }
    public function devolver($id_prestamo){
        $stmt = $this->pdo->prepare("UPDATE SET fecha_devolucion = CURADTE() where id_prestamo = ?");
        return $stmt->execute([$id_prestamo]);
    }
    public function listar(){  
        return $this->pdo->query("SELECT * FROM Prestamo")->fetchALL();
    }
}
?>