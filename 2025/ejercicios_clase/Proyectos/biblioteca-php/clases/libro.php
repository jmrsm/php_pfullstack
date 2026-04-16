<?php
require_once __DIR__ . '/../conexion.php';

class Libro {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getPDO();
    }

    public function listar() {
        return $this->pdo->query("SELECT * FROM libro")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($titulo, $autor, $anio, $isbn) {
        $stmt = $this->pdo->prepare("INSERT INTO libro (titulo, autor, anio_publicacion, isbn) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$titulo, $autor, $anio, $isbn]);
    }

    public function actualizar($id, $titulo, $autor, $anio, $isbn) {
        $stmt = $this->pdo->prepare("UPDATE libro SET titulo = ?, autor = ?, anio_publicacion = ?, isbn = ? WHERE id_libro = ?");
        return $stmt->execute([$titulo, $autor, $anio, $isbn, $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM libro WHERE id_libro = ?");
        return $stmt->execute([$id]);
    }
}
?>
