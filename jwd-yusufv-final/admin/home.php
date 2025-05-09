
<?php
session_start();

// Memeriksa apakah user sudah login dan level aksesnya sesuai dengan yang diizinkan
if (!isset($_SESSION['id_user']) || ($_SESSION['level_akses'] !== 'Admin')) {
    header("Location:index.php"); 
    exit();
}

include "../koneksi.php";

// Menangani data POST
if (isset($_POST['SIMPAN'])) {
    $nama_produk =$_POST['nama_produk'];
    $kategori =$_POST['kategori'];
    $harga =$_POST['harga'];
    $deskripsi =$_POST['deskripsi'];
    $stok =$_POST['stok'];

    //upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $upload_dir = "foto_produk/";

    if(!file_exists($upload_dir)){
        mkdir($upload_dir, 0777, true);
    }

    $gambar_path = $upload_dir . basename($gambar);

        if(move_uploaded_file($tmp_name, $gambar_path)) {
            $query = "INSERT INTO produk (nama_produk,kategori_produk,gambar,harga,deskripsi,stok) values ('$nama_produk','$kategori','$gambar','$harga','$deskripsi','$stok')";
            if(mysqli_query($conn, $query)) {
                echo "Produk Baru Berhasil Disimpan";
                header("location:" .$_SERVER['PHP_SELF']);
                exit();
            }else{
                echo "Error:" .mysqli_error($conn);
            }
        }else{
        echo "Gagal Upload Gambar";
        }

    }

    $dataproduk="SELECT * FROM produk ORDER BY id_produk DESC";
    $resultproduk = $conn->query($dataproduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Input Produk</title>

    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="d-flex flex-column h-100">
    <div class="container">
        <h1 class="text-center bg-secondary text-white" >Tambah Produk Baru</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" placeholder="Input Nama Produk" required>
            </div>
            <div class="form-group">
                <label for="kategori">State</label>
                <select name="kategori" class="form-control" required>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Pakaian">Pakaian</option>
                </select>
            </div>
            <div class="form-group">
                <label class="custom-file-label" for="gambar">Pilih Gambar Produk...</label>
                <input type="file" class="form-control" name="gambar" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" name="harga" placeholder="contoh : 5000" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Harga</label>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Produk" required></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Stok</label>
                <input type="number" class="form-control" name="stok" placeholder="contoh : 10" required>
            </div><br>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" name="SIMPAN" value="Simpan">
            </div>
        </from>
        
        <br><hr><br>

        <h1 class="text-center bg-secondary text-white" >Data Produk</h1>

        <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Foto Produk</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($produk = $resultproduk->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $no++ . '</td>';
                                echo '<td>' . $produk['nama_produk'] . '</td>';
                                echo '<td>' . $produk['kategori_produk'] . '</td>';
                                echo '<td><img src="foto_produk/'. $produk['gambar'] . '" width="50%"/></td>';
                                echo '<td>' . $produk['harga'] . '</td>';
                                echo '<td>' . $produk['deskripsi'] . '</td>';
                                echo '<td>' . $produk['stok'] . '</td>';
                                echo '<td>';
                                         echo '<a href="edit-produk.php?id_produk=' . $produk['id_produk'] . '" class="btn btn-primary">Edit</a> &nbsp';
                                         echo '<a href="delete.php?id_produk=' . $produk['id_produk'] . '" class="btn btn-warning" onclick="return confirm("Yakin ingin hapus produk ini?")>Hapus</a> &nbsp';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>


        
    </div> <!-- End Container -->
    
    
    <!-- Js Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
