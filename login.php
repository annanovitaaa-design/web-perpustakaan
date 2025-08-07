<?php
session_start();
ob_start(); // Mulai output buffering
include_once("koneksi.php");

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    // Gunakan tabel 'user'
    $check_query = "SELECT * FROM user WHERE username = '$username'";
    $check_result = mysqli_query($mysqli, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Username ditemukan
        $user_data = mysqli_fetch_assoc($check_result);
        $stored_password = $user_data['password'];

        if ($password === $stored_password) {
            // Login berhasil
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['level'] = $user_data['level'];

            // Redirect sesuai level
            if ($user_data['level'] === 'admin') {
                header("Location: index.php");
            } else {
                header("Location: index_user.php");
            }
            exit;
        } else {
            $error_message = "Password salah. Silakan coba lagi.";
        }
    } else {
        // User belum terdaftar → auto register sebagai user
        $insert_query = "INSERT INTO user (username, password, level) VALUES ('$username', '$password', 'user')";

        if (mysqli_query($mysqli, $insert_query)) {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = 'user';
            header("Location: index_user.php");
            exit;
        } else {
            $error_message = "Gagal mendaftarkan pengguna baru.";
        }
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - PusDes</title>
    <!-- Tambahkan baris favicon -->
    <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <style>
        body {
            background: url('assets/dist/img/gambar4.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-card {
            width: 350px;
            margin: 10% auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="login-card">
    <div class="card-header text-center">
        <h3>Login PusDes</h3>
    </div>
    <div class="card-body">
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p class="mt-3 text-muted text-center">
            Jika username belum terdaftar, akun akan dibuat otomatis sebagai <strong>user</strong>.
        </p>
    </div>
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
