<?php
include_once("koneksi.php");

if (isset($_POST['submit'])) {
    $judul    = mysqli_real_escape_string($mysqli, $_POST['judul']);
    $penulis  = mysqli_real_escape_string($mysqli, $_POST['penulis']);
    $penerbit = mysqli_real_escape_string($mysqli, $_POST['penerbit']);
    $tahun    = mysqli_real_escape_string($mysqli, $_POST['tahun']);
    $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);

    // Upload file sampul
    $sampul = '';
    if (isset($_FILES['sampul']) && $_FILES['sampul']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['sampul']['name'], PATHINFO_EXTENSION);
        $sampul = uniqid('cover_') . '.' . $ext;
        move_uploaded_file($_FILES['sampul']['tmp_name'], 'cover/' . $sampul);
    }

    // Simpan ke database
    $result = mysqli_query($mysqli, "
        INSERT INTO buku (judul, penulis, penerbit, tahun, kategori, sampul)
        VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$kategori', '$sampul')
    ");

    if ($result) {
        header("Location: data_buku.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tambah Data Buku</title>
  <!-- Tambahkan baris favicon -->
  <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <style>
    body {
      background-color: #f4f6f9;
    }
    .card-primary:not(.card-outline)>.card-header {
      background-color: #6c63ff;
    }
    .btn-primary {
      background-color: #6c63ff;
      border-color: #6c63ff;
    }
    .btn-primary:hover {
      background-color: #554ee6;
      border-color: #554ee6;
    }
    .form-control {
      background-color: #fdfdfe;
      border: 1px solid #ced4da;
      color: #333;
    }
    .form-control:focus {
      border-color: #6c63ff;
      box-shadow: 0 0 0 0.1rem rgba(108, 99, 255, 0.25);
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid pt-4">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-book"></i> Tambah Data Buku</h3>
              </div>
              <div class="card-body">
                <form action="add_buku.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun" class="form-control" placeholder="Contoh: 2025" maxlength="4" pattern="[0-9]{4}" required>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Sampul Buku</label>
                    <input type="file" name="sampul" class="form-control-file" accept="image/*">
                  </div>
                  <div class="d-flex justify-content-end">
                    <a href="data_buku.php" class="btn btn-secondary mr-2">
                      <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" name="submit" class="btn btn-primary">
                      <i class="fas fa-save"></i> Simpan
                    </button>
                  </div>
                </form>
              </div>
            </div>
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
