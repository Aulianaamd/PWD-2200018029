<?php
require 'koneksi.php';

// Mendapatkan ID peserta yang akan diedit dari URL
$id = $_GET['id'];

// Query untuk mengambil data peserta berdasarkan ID
$query = "SELECT * FROM peserta_seminar WHERE id = '$id'";
$result = mysqli_query($con, $query);

// Mengecek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Peserta</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h2>Edit Data Peserta</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>

        <label for="kota">Kota:</label>
        <input type="text" name="kota" value="<?php echo $row['kota']; ?>" required><br>

        <label for="institusi">Institusi:</label>
        <input type="text" name="institusi" value="<?php echo $row['institusi']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
    <a href="index.php">Kembali ke halaman utama</a>
</body>
</html>
