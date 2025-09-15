-- Δημιουργία βάσης και πίνακα USER (MySQL)
CREATE DATABASE IF NOT EXISTS sports_shop CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sports_shop;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  flname VARCHAR(120) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  username VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  interest VARCHAR(40) NULL,
  newsletter ENUM('yes','no') DEFAULT 'no',
  comments TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
