<?php
$conn = new mysqli("localhost", "root", "", "db_ruang2");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
?>
