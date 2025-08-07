<?php
session_start();
include_once("koneksi.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($mysqli, $_GET['cari']);
    $result = mysqli_query($mysqli, "SELECT * FROM sirkulasi 
        WHERE nama_peminjam LIKE '%$keyword%' 
        OR judul_buku LIKE '%$keyword%'
        ORDER BY tanggal_pinjam DESC");
} else {
    $result = mysqli_query($mysqli, "SELECT * FROM sirkulasi ORDER BY tanggal_pinjam DESC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Peminjaman</title>
  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
    body {
      background-color: #e0f0ff;
    }
    .card-header {
      background-color: #9B7EBD !important; /* Ungu */
      color: white;
    }
    .btn-primary {
      background-color: #332D56;
      border-color: #332D56;
    }
    .btn-primary:hover {
      background-color: #4F1C51;
      border-color: #4F1C51;
    }
    .btn-secondary {
      background-color: #adb5bd;
      border-color: #adb5bd;
    }
    .table th {
      background-color: #ebe4fb;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">

<div class="wrapper">
  <div class="content-wrapper" style="margin:0; padding:20px;">
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-book-reader mr-2"></i> Riwayat Peminjaman Buku</h3>

            <form method="get" action="riwayat.php" class="input-group input-group-sm" style="width: 300px;">
              <input type="text" name="cari" class="form-control float-right" placeholder="Cari nama/judul..." value="<?= htmlspecialchars($keyword); ?>">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                <a href="riwayat.php" class="btn btn-secondary">Reset</a>
              </div>
            </form>

          </div>

          <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>ID Anggota</th>
                  <th>Nama Peminjam</th>
                  <th>Judul Buku</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr class='text-center'>
                                <td>{$no}</td>
                                <td>{$data['id_anggota']}</td>
                                <td>{$data['nama_peminjam']}</td>
                                <td>{$data['judul_buku']}</td>
                                <td>{$data['tanggal_pinjam']}</td>
                                <td>{$data['tanggal_kembali']}</td>
                                <td>{$data['status']}</td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Data tidak ditemukan.</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

          <div class="card-footer text-right">
            <a href="index_user.php" class="btn btn-sm btn-primary">
              <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
            </a>
          </div>

        </div>
      </div>
    </section>
  </div>
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
