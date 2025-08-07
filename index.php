<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
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

    <!-- Content Header -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Dashboard Administrator</h1>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

          <!-- Box Buku -->
          <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  $buku = mysqli_query($mysqli, "SELECT * FROM buku");
                  echo mysqli_num_rows($buku);
                  ?>
                </h3>
                <p>Data Buku</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="data_buku.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- Box Anggota -->
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $anggota = mysqli_query($mysqli, "SELECT * FROM anggota");
                  echo mysqli_num_rows($anggota);
                  ?>
                </h3>
                <p>Data Anggota</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="data_anggota.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- Box Sirkulasi -->
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  $sirkulasi = mysqli_query($mysqli, "SELECT * FROM sirkulasi");
                  echo mysqli_num_rows($sirkulasi);
                  ?>
                </h3>
                <p>Data Sirkulasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-exchange-alt"></i>
              </div>
              <a href="data_sirkulasi.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>

        <!-- Welcome Text -->
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-center align-items-center" style="height: 60vh; flex-direction: column;">
              <h1 class="display-4">Selamat Datang, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>!</h1>
              <p class="lead">Semoga harimu menyenangkan.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
