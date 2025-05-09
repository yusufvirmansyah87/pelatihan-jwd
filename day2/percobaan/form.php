<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Get and Post</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Anda">
        </div>
        <div class="mb-3">
            <label for="ttl" class="form-label">TTL</label>
            <input type="text" class="form-control" name="ttl" placeholder="Tempat dan Tanggal Lahir">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
        </div>
        <input type="submit" name="Kirim" value="Kirim">
    </form>
    
    <?php
// Menangani data POST
if (isset($_POST['Kirim'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $alamat = htmlspecialchars($_POST['alamat']);
    
    echo "<p style='color: green;'>Data berhasil dikirim via POST.</p>";
    echo "
        <p>Nama Anda : $nama<br>
        Tempat/Tanggal Lahir Anda: $ttl<br>
        Alamat Anda : $alamat <br><hr/>";
    }
?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>