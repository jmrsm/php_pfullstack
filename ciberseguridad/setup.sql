--esto es un laboratorio sql
CREATE DATABASE IF NOT EXISTS mi_bd CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE mi_bd;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(254) NOT NULL UNIQUE,
  creado DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO usuarios (nombre, email) VALUES
  ('Juan Pérez', 'juan@ejemplo.com'),
  ('María López', 'maria@ejemplo.com'),
  ('Alumno Demo', 'alumno@ejemplo.local');
