<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Latihan Get and Post</title>
        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body  class="d-flex flex-column h-100">

    <?php
    include "koneksi.php";

        // Jika form dikirim
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Cari user di database
            $sql = "SELECT * FROM tb_user WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                // Cocokkan password (langsung, tanpa hash – tidak direkomendasikan untuk produksi)
                if ($password === $user['password']) {
                    $_SESSION['username'] = $username;
                    header("Location: home.php");
                    exit();
                } else {
                    $error = "Password salah!";
                }
            } else {
                $error = "Username tidak ditemukan!";
            }
        }
    ?>

    <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group my-3 center">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="cancel" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>