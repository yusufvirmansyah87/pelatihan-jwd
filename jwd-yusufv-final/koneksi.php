<?php
$conn = new mysqli("localhost", "root", "", "foodie");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    //echo "Koneksi berhasil!";
}
?>
