
<?php
include "../koneksi.php";

if (!isset($_GET['id_produk'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id_produk'];
$query = "SELECT * FROM produk WHERE id_produk = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Cek jika data tidak ditemukan
if (!$data) {
    echo "Produk tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Edit Produk</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="d-flex flex-column h-100">
    <div class="container">
        <h1 class="text-center bg-secondary text-white" >Edit Produk</h1>
        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk"  value="<?php echo $data['nama_produk']; ?>">
            </div>
            <div class="form-group">
                <label for="kategori">State</label>
                <select name="kategori" class="form-control" required>
                <option value="Elektronik" <?php echo ($data['kategori_produk'] == 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                <option value="Pakaian" <?php echo ($data['kategori_produk'] == 'Pakaian') ? 'selected' : ''; ?>>Pakaian</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gambar Saat Ini:</label><br>
                <img src="foto_produk/<?php echo $data['gambar']; ?>" alt="Gambar Produk" width="100"><br><br>

                <label class="custom-file-label" for="gambar">Gambar Produk Baru:</label>
                <input type="file" class="form-control" name="gambar" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"><?php echo $data['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Stok</label>
                <input type="number" class="form-control" name="stok"  value="<?php echo $data['stok']; ?>">
            </div><br>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" name="UPDATE" value="Update">
            </div>
        </from>
        
        
    </div> <!-- End Container -->
    
    
    <!-- Js Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
