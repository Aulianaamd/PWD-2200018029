<?php
require 'koneksi.php';

// Query untuk mengambil semua data dari tabel peserta_seminar
$query = "SELECT * FROM peserta_seminar";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta Seminar</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h2>Data Peserta Seminar</h2>
    <a href="index.html">Kembali ke halaman utama</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Institusi</th>
            <th>Aksi</th>
        </tr>

        <?php 
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['kota'] . "</td>";
                echo "<td>" . $row['institusi'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data peserta.</td></tr>";
        }
        ?>

    </table>

    <?php
    // Menutup koneksi database
    mysqli_close($con);
    ?>
</body>
</html>
