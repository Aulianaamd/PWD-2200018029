<?php
session_start();
session_destroy(); // Mengakhiri semua session
header("Location: login.php"); // Redirect ke halaman login
exit();
?>
