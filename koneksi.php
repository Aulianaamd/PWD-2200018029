<?php
$host = "localhost"; // Alamat host
$username = "root"; // Username database
$password = ""; // Password database
$databasename = "db_pwd"; // Nama database yang akan digunakan

// Membuat koneksi ke MySQL
$con = mysqli_connect($host, $username, $password, $databasename);

// Mengecek apakah koneksi berhasil
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
