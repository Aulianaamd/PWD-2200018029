<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Melakukan validasi dan escaping input untuk mencegah SQL Injection
    $nama = mysqli_real_escape_string($con, $_POST["nama"]); // Mengambil "nama" dari form
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $alamat = mysqli_real_escape_string($con, $_POST["alamat"]);
    $kota = mysqli_real_escape_string($con, $_POST["kota"]);
    $institusi = mysqli_real_escape_string($con, $_POST["institusi"]);

    // Membuat query untuk menyimpan data
    $query_sql = "INSERT INTO peserta_seminar (nama, email, alamat, kota, institusi) 
                  VALUES ('$nama', '$email', '$alamat', '$kota', '$institusi')";

    // Mengeksekusi query dan mengalihkan ke halaman utama jika berhasil
    if (mysqli_query($con, $query_sql)) {
        header("Location: index.html");
        exit(); // Menghentikan eksekusi script setelah redirect
    } else {
        // Menampilkan pesan error jika query gagal
        echo "Pendaftaran gagal: " . mysqli_error($con);
    }

    // Menutup koneksi
    mysqli_close($con);
} else {
    echo "Metode request tidak valid.";
}
?>
