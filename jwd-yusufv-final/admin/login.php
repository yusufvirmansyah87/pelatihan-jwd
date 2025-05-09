<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];  // Untuk keamanan lebih baik gunakan password hashing

    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        // Menangani kesalahan dalam query prepare
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        // Anda bisa menyimpan data user ke dalam session sebagai identifikasi login
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['level_akses'] = $row['level_akses'];

        // Array yang memetakan level akses ke lokasi
        $levelToLocation = array(
            "Admin" => "home.php"
        );

        // Cek apakah level akses pengguna terdapat dalam array
        if (isset($levelToLocation[$_SESSION['level_akses']])) {
            header("Location: " . $levelToLocation[$_SESSION['level_akses']]);
        } else {
            // Jika level akses tidak ditemukan, arahkan ke halaman default
            header("Location: index.html");
        }
        exit();
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
        header("Location: index.html");
        exit();  
    }
}
?>
