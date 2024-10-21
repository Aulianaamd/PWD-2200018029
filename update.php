<?php
require 'koneksi.php';

// Mengecek apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $kota = mysqli_real_escape_string($con, $_POST['kota']);
    $institusi = mysqli_real_escape_string($con, $_POST['institusi']);

    // Query untuk memperbarui data peserta berdasarkan ID
    $query = "UPDATE peserta_seminar SET nama='$nama', email='$email', alamat='$alamat', kota='$kota', institusi='$institusi' WHERE id='$id'";

    if (mysqli_query($con, $query)) {
        header("Location: data.php"); // Redirect ke halaman daftar peserta setelah update
        exit();
    } else {
        echo "Error saat mengupdate data: " . mysqli_error($con);
    }

    // Menutup koneksi
    mysqli_close($con);
} else {
    echo "Metode request tidak valid.";
}
?>
