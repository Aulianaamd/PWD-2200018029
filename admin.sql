-- Membuat database baru (jika belum ada)
CREATE DATABASE IF NOT EXISTS db_pwd;

-- Menggunakan database yang baru dibuat
USE db_pwd;

-- Membuat tabel untuk login admin
CREATE TABLE IF NOT EXISTS admin_login (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary key dengan auto-increment
    username VARCHAR(50) NOT NULL,     -- Kolom untuk username admin
    password VARCHAR(255) NOT NULL     -- Kolom untuk password admin (gunakan hashing untuk keamanan)
);
