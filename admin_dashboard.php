<?php
session_start(); // Memulai sesi

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.html"); // Redirect ke halaman login jika belum login
    exit();
}

require 'koneksi.php'; // Koneksi ke database

// Query untuk mengambil data peserta
$query_sql = "SELECT * FROM peserta_seminar";
$result = mysqli_query($con, $query_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
</head>
<body>
    <h1>Dashboard Admin - Data Peserta</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Institusi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; // Nomor urut
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['kota'] . "</td>";
                echo "<td>" . $row['institusi'] . "</td>";
                echo "<td>
                        <a href='edit_peserta.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_peserta.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\");'>Delete</a>
                      </td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="logout.php">Logout</a> <!-- Link untuk logout -->
</body>
</html>

<?php
// Menutup koneksi
mysqli_close($con);
?>
