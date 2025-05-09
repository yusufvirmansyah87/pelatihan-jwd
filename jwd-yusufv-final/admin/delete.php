<?php
include "../koneksi.php";

if (isset($_GET['id_produk'])) {
    $id = $_GET['id_produk'];

    $query = "DELETE FROM produk WHERE id_produk = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
                alert('Data telah dihapus!');
                window.location.href = 'home.php';
              </script>";
        exit;
    } else {
        echo "Gagal menghapus produk.";
    }
} else {
    echo "ID tidak ditemukan.";
}

?>