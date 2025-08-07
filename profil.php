<?php
session_start();
include_once("koneksi.php");

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// Ambil data user dari database
$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id_user = '$id_user'");
if (!$query) {
    die("Query error: " . mysqli_error($mysqli));
}

$user = mysqli_fetch_assoc($query);
if (!$user) {
    echo "Data pengguna tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 700px;
      margin-top: 50px;
    }
    .card-header {
      background-color: #6c63ff;
      color: white;
    }
    .btn-link {
      color: #6c63ff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card shadow">
      <div class="card-header">
        <h4 class="mb-0"><i class="fas fa-user"></i> Informasi Profil</h4>
      </div>
      <div class="card-body">
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
        <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($user['nama']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($user['alamat']) ?></p>
        <p><strong>No. HP:</strong> <?= htmlspecialchars($user['no_hp']) ?></p>
        <a href="index_user.php" class="btn btn-link float-right">Kembali ke Beranda</a>
      </div>
    </div>
  </div>

  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
