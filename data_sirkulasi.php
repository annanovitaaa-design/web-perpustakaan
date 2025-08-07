<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");

// Query data sirkulasi
$result = mysqli_query($mysqli, "SELECT * FROM sirkulasi ORDER BY id_sirkulasi DESC");
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Sirkulasi</title>

  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- AdminLTE -->
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Sirkulasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Sirkulasi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Sirkulasi</h3>
          <div class="card-tools">
            <a href="add_sirkulasi.php" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Sirkulasi
            </a>
          </div>
        </div>

        <div class="card-body">
          <table id="tabelSirkulasi" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th style="width: 120px;">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php while ($data = mysqli_fetch_assoc($result)) { ?>
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
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="delete_sirkulasi.php?id=<?= $data['id_sirkulasi']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus data ini?')" 
                       class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
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

<!-- Script -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    $("#tabelSirkulasi").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabelSirkulasi_wrapper .col-md-6:eq(0)');
  });
</script>

</body>
</html>
