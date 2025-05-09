<?php
include "koneksi.php";

$dataproduk="SELECT * FROM produk ORDER BY id_produk DESC";
$resultproduk = $conn->query($dataproduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>

    <!-- Link Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="d-flex flex-column h-100">
    <div class="container">
    <h1>Katalok Produk</h1>
        <?php
        while ($produk = $resultproduk->fetch_assoc()) {
            echo "<div style='display: flex !important; align-items: center; justify-content: center; gap: 10px;' >
                    <div class='card' >
                        <div class='card-wrapper'>
                            <div class='card-produk' >
                            <h4>$produk[nama_produk]</h4>
                            <img src='admin/foto_produk/$produk[gambar]' width='30%' alt='$produk[nama_produk]'
                            <p>Harga :$produk[harga]<br>
                            Stok : $produk[stok]</p>
                            <a href='detail-produk.php?id_produk=$produk[id_produk]' class='btn btn-primary'>Detail</a>
                            </div>
                        </div>
                    </div>";
        }
        ?>

        

    </div> <!-- End Container-->
    
    <!-- Js Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>