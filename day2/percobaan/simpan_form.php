<?php
$nama =$_POST['nama'];
$ttl =$_POST['ttl'];
$alamat =$_POST['alamat'];

echo "
<p>Nama Anda : $nama<br>
Tempat/Tanggal Lahir Anda: $ttl<br>
Alamat Anda : $alamat <br><hr/>";

echo "<a href='form.php' target='self'>Kembali</a>"
?>