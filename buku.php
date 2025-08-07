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
    $result = mysqli_query($mysqli, "SELECT * FROM buku 
        WHERE judul LIKE '%$keyword%' 
        OR penulis LIKE '%$keyword%' 
        ORDER BY id DESC");
} else {
    $result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku</title>
  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #9B7EBD!important; /* ungu */
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
      text-align: center;
    }
    img.cover {
      width: 60px;
      height: 80px;
      object-fit: cover;
      border-radius: 4px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .table-container {
      margin-top: 15px; /* Tambahan jarak antar header dan tabel */
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
            <h3 class="card-title"><i class="fas fa-book mr-2"></i> Data Buku</h3>

            <form method="get" action="buku.php" class="input-group input-group-sm" style="width: 300px;">
              <input type="text" name="cari" class="form-control float-right" placeholder="Cari judul/penulis..." value="<?= htmlspecialchars($keyword); ?>">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                <a href="buku.php" class="btn btn-secondary">Reset</a>
              </div>
            </form>
          </div>

          <div class="card-body table-responsive p-0 table-container px-3">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Sampul</th>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr class='text-center'>
                                <td>{$no}</td>
                                <td><img src='cover/{$data['sampul']}' class='cover' alt='Sampul Buku'></td>
                                <td>{$data['judul']}</td>
                                <td>{$data['penulis']}</td>
                                <td>{$data['penerbit']}</td>
                                <td>{$data['tahun']}</td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Data tidak ditemukan.</td></tr>";
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
