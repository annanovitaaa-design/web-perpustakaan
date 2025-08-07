<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");

// Query data anggota
$result = mysqli_query($mysqli, "SELECT * FROM anggota ORDER BY id_anggota DESC");
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Anggota</title>

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
            <h1>Data Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Anggota</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Anggota</h3>
          <div class="card-tools">
            <a href="add_anggota.php" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Anggota
            </a>
          </div>
        </div>

        <div class="card-body">
          <table id="tabelAnggota" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th style="width: 120px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($data['nama']); ?></td>
                  <td><?= htmlspecialchars($data['jk']); ?></td>
                  <td><?= htmlspecialchars($data['alamat']); ?></td>
                  <td><?= htmlspecialchars($data['no_hp']); ?></td>
                  <td>
                    <a href="edit_anggota.php?id=<?= $data['id_anggota']; ?>" class="btn btn-warning btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="delete_anggota.php?id=<?= $data['id_anggota']; ?>" 
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
    $("#tabelAnggota").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabelAnggota_wrapper .col-md-6:eq(0)');
  });
</script>

</body>
</html>
