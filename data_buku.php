<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Query data
$result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY id DESC");

// Cek apakah query berhasil
if (!$result) {
    echo "Query error: " . mysqli_error($mysqli);
    exit;
}

$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Buku</title>

  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
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
            <h1>Data Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Buku</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Buku Perpustakaan</h3>
          <div class="card-tools">
            <a href="add_buku.php" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Buku
            </a>
          </div>
        </div>

        <div class="card-body">
          <table id="tabelBuku" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Sampul</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th style="width: 120px;">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php while($data = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td>
                  <?php if (!empty($data['sampul'])) { ?>
                    <img src="cover/<?= htmlspecialchars($data['sampul']); ?>" width="50" alt="Sampul">
                  <?php } else { ?>
                    <span class="text-muted">Tidak ada</span>
                  <?php } ?>
                </td>
                <td><?= htmlspecialchars($data['judul']); ?></td>
                <td><?= htmlspecialchars($data['penulis']); ?></td>
                <td><?= htmlspecialchars($data['penerbit']); ?></td>
                <td><?= htmlspecialchars($data['tahun']); ?></td>
                <td><?= htmlspecialchars($data['kategori']); ?></td>
                <td>
                  <a href="edit_buku.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="delete_buku.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
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

<!-- Scripts -->
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
    $("#tabelBuku").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabelBuku_wrapper .col-md-6:eq(0)');
  });
</script>

</body>
</html>
