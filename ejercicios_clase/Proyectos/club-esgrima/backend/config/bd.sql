USE club_esgrima;

-- Tabla de competidores
CREATE TABLE IF NOT EXISTS competidores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    ci VARCHAR(20) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    arma VARCHAR(50) NOT NULL,
    mano ENUM('derecho','izquierdo') NOT NULL
);

-- Tabla de competencias
CREATE TABLE IF NOT EXISTS competencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    competidor_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    gano BOOLEAN NOT NULL,
    tipo ENUM('local','internacional') NOT NULL,
    FOREIGN KEY (competidor_id) REFERENCES competidores(id) ON DELETE CASCADE
);

-- Datos iniciales
INSERT INTO competidores (nombre, apellido, vi, fechaNacimiento, categoria, arma, mano) VALUES
('Juan', 'Pérez', 'V12345', '2000-05-10', 'Senior', 'Espada', 'derecho'),
('Ana', 'López', 'V67890', '2002-08-15', 'Junior', 'Florete', 'izquierdo');

INSERT INTO competencias (competidor_id, nombre, fecha, gano, tipo) VALUES
(1, 'Copa Nacional', '2025-06-10', TRUE, 'local'),
(1, 'Open Internacional de Madrid', '2025-07-02', FALSE, 'internacional'),
(2, 'Torneo Juvenil', '2025-06-15', TRUE, 'local');
