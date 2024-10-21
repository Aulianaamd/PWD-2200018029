<?php
session_start(); // Memulai session

require 'koneksi.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input dari form
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Query untuk memeriksa apakah username ada di database
    $query_sql = "SELECT * FROM admin_login WHERE username = '$username'";

    // Mengeksekusi query
    $result = mysqli_query($con, $query_sql);
    $row = mysqli_fetch_assoc($result);

    // Memeriksa apakah username ada dan password cocok
    if ($row) {
        // Verifikasi password (jika password di-hash, gunakan password_verify)
        if (password_verify($password, $row['password'])) {
            // Login berhasil, set session dan redirect ke dashboard admin
            $_SESSION['admin'] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Jika password salah
            echo "Password salah.";
        }
    } else {
        // Jika username tidak ditemukan
        echo "Username tidak ditemukan.";
    }

    // Menutup koneksi
    mysqli_close($con);
}
?>
