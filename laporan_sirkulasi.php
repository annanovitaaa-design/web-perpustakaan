<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");

$result = mysqli_query($mysqli, "SELECT * FROM sirkulasi ORDER BY id_sirkulasi DESC");
$no = 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Sirkulasi</title>

  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <!-- CSS -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar & Sidebar -->
  <?php include 'partials/navbar.php'; ?>
  <?php include 'partials/sidebar.php'; ?>

  <!-- Content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <h1>Laporan Sirkulasi</h1>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title text-white">
            <i class="fas fa-exchange-alt"></i> Laporan Sirkulasi
          </h3>
          <div class="card-tools">
            <a href="add_sirkulasi.php" class="btn btn-success btn-sm">
              <i class="fas fa-plus"></i> Tambah Sirkulasi
            </a>
          </div>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($data = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['id_anggota']); ?></td>
                <td><?= htmlspecialchars($data['nama_peminjam']); ?></td>
                <td><?= htmlspecialchars($data['judul_buku']); ?></td>
                <td><?= htmlspecialchars($data['tanggal_pinjam']); ?></td>
                <td><?= htmlspecialchars($data['tanggal_kembali']); ?></td>
                <td><?= htmlspecialchars($data['status']); ?></td>
                <td>
                  <a href="edit_sirkulasi.php?id=<?= $data['id_sirkulasi']; ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="delete_sirkulasi.php?id=<?= $data['id_sirkulasi']; ?>" 
                     onclick="return confirm('Yakin ingin menghapus data ini?')" 
                     class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </section>
  </div>

</div>

<!-- JS -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
