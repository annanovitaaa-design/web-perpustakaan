<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");

if (isset($_POST['submit'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    $result = mysqli_query($mysqli, "INSERT INTO sirkulasi(id_anggota, nama_peminjam, judul_buku, tanggal_pinjam, tanggal_kembali, status) 
    VALUES('$id_anggota', '$nama_peminjam', '$judul_buku', '$tanggal_pinjam', '$tanggal_kembali', '$status')");

    if ($result) {
        header("Location: laporan_sirkulasi.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Data Sirkulasi</title>
  
  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <!-- CSS AdminLTE -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  <?php include 'partials/navbar.php'; ?>

  <!-- Sidebar -->
  <?php include 'partials/sidebar.php'; ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Tambah Data Sirkulasi</h1>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid d-flex justify-content-center">

        <div class="card card-primary col-md-6">
          <div class="card-header" style="background-color: #8a2be2;">
            <h3 class="card-title text-white">
              <i class="fas fa-book-reader"></i> Tambah Data Sirkulasi
            </h3>
          </div>

          <form action="" method="post">
            <div class="card-body">

              <div class="form-group">
                <label for="id_anggota">ID Anggota</label>
                <input type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Masukkan ID Anggota" required>
              </div>

              <div class="form-group">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_peminjam" placeholder="Masukkan Nama Peminjam" required>
              </div>

              <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" required>
              </div>

              <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
              </div>

              <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                  <option value="">-- Pilih Status --</option>
                  <option value="Pinjam">Pinjam</option>
                  <option value="Kembali">Kembali</option>
                </select>
              </div>

            </div>

            <div class="card-footer">
              <a href="laporan_sirkulasi.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
              <button type="submit" name="submit" class="btn" style="background-color: #8a2be2; color:white;">
                <i class="fas fa-save"></i> Simpan
              </button>
            </div>
          </form>
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
