<?php
require_once __DIR__ . '/../conexion.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::getPDO();
    }

    public function login($nombre_usuario, $contrasena) {
        $stmt = $this->pdo->prepare("SELECT * FROM Usuario WHERE nombre_usuario = ?");
        $stmt->execute([$nombre_usuario]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($contrasena, $usuario['contrasena_hash'])) {
            return ['success' => true, 'usuario_id' => $usuario['id_usuario']];
        }

        return ['success' => false, 'mensaje' => 'Credenciales inválidas' . $contrasena];
    }
}
?>