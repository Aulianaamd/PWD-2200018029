-- Membuat database baru
CREATE DATABASE IF NOT EXISTS db_pwd;

-- Menggunakan database yang baru dibuat
USE db_pwd;

-- Membuat tabel untuk menyimpan data pendaftaran
CREATE TABLE IF NOT EXISTS peserta_seminar (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Primary key dengan auto-increment
    nama VARCHAR(100) NOT NULL,        -- Nama peserta
    email VARCHAR(100) NOT NULL,       -- Email peserta
    alamat VARCHAR(255) NOT NULL,      -- Alamat peserta
    kota VARCHAR(50) NOT NULL,         -- Kota asal peserta
    institusi VARCHAR(100) NOT NULL    -- Institusi peserta
);
