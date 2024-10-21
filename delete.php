<?php
require 'koneksi.php';

// Mendapatkan ID peserta yang akan dihapus dari URL
$id = $_GET['id'];

// Query untuk menghapus data peserta berdasarkan ID
$query = "DELETE FROM peserta_seminar WHERE id = '$id'";

if (mysqli_query($con, $query)) {
    header("Location: data_peserta.php"); // Redirect ke halaman daftar peserta setelah menghapus data
    exit();
} else {
    echo "Error saat menghapus data: " . mysqli_error($con);
}

// Menutup koneksi
mysqli_close($con);
?>
