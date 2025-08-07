<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM sirkulasi WHERE id_sirkulasi='$id'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    $update = mysqli_query($mysqli, "UPDATE sirkulasi SET 
        id_anggota='$id_anggota', 
        nama_peminjam='$nama_peminjam', 
        judul_buku='$judul_buku', 
        tanggal_pinjam='$tanggal_pinjam', 
        tanggal_kembali='$tanggal_kembali', 
        status='$status' 
        WHERE id_sirkulasi='$id'");

    if($update){
        header("Location: data_sirkulasi.php");
    } else {
        echo "Gagal update data: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Sirkulasi</title>
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <?php include 'partials/navbar.php'; ?>
  <?php include 'partials/sidebar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <h1>Edit Data Sirkulasi</h1>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid d-flex justify-content-center">
        <div class="card card-primary col-md-6">
          <div class="card-header" style="background-color: #8a2be2;">
            <h3 class="card-title text-white">
              <i class="fas fa-edit"></i> Edit Data Sirkulasi
            </h3>
          </div>

          <form method="post">
            <div class="card-body">
              <div class="form-group">
                <label>ID Anggota</label>
                <input type="text" name="id_anggota" class="form-control" value="<?= htmlspecialchars($data['id_anggota']); ?>" required>
              </div>

              <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control" value="<?= htmlspecialchars($data['nama_peminjam']); ?>" required>
              </div>

              <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" value="<?= htmlspecialchars($data['judul_buku']); ?>" required>
              </div>

              <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="<?= htmlspecialchars($data['tanggal_pinjam']); ?>" required>
              </div>

              <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" value="<?= htmlspecialchars($data['tanggal_kembali']); ?>" required>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                  <option value="Pinjam" <?= $data['status'] == 'Pinjam' ? 'selected' : ''; ?>>Pinjam</option>
                  <option value="Kembali" <?= $data['status'] == 'Kembali' ? 'selected' : ''; ?>>Kembali</option>
                </select>
              </div>
            </div>

            <div class="card-footer">
              <a href="data_sirkulasi.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
              </a>
              <button type="submit" name="submit" class="btn" style="background-color: #8a2be2; color:white;">
                <i class="fas fa-save"></i> Simpan Perubahan
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
