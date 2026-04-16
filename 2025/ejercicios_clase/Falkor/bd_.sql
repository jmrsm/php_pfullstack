CREATE DATABASE IF NOT EXISTS rov_samples CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rov_samples;

CREATE TABLE samples (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sample_id VARCHAR(50) NOT NULL UNIQUE,
  collected_at DATETIME NOT NULL,
  latitude DECIMAL(9,6) NOT NULL,
  longitude DECIMAL(9,6) NOT NULL,
  depth_m DECIMAL(7,2) NOT NULL,
  temperature_c DECIMAL(5,2) DEFAULT NULL,
  salinity_psu DECIMAL(5,2) DEFAULT NULL,
  sample_type ENUM('Sedimento','Agua','Biota','Otro') NOT NULL,
  preservation VARCHAR(100) DEFAULT NULL,
  notes TEXT DEFAULT NULL,
  file_path VARCHAR(255) DEFAULT NULL,
  vessel VARCHAR(100) NOT NULL DEFAULT 'B/I Falkor (Too) - Fkt250812',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
