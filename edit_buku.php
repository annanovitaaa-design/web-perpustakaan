<?php
include_once("koneksi.php");

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($mysqli, "SELECT * FROM buku WHERE id=$id");
    $data = mysqli_fetch_array($result);

    if (!$data) {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID tidak valid.";
    exit;
}

if (isset($_POST['submit'])) {
    $judul    = mysqli_real_escape_string($mysqli, $_POST['judul']);
    $penulis  = mysqli_real_escape_string($mysqli, $_POST['penulis']);
    $penerbit = mysqli_real_escape_string($mysqli, $_POST['penerbit']);
    $tahun    = mysqli_real_escape_string($mysqli, $_POST['tahun']);
    $kategori = mysqli_real_escape_string($mysqli, $_POST['kategori']);

    $query = "
        UPDATE buku SET 
            judul='$judul',
            penulis='$penulis',
            penerbit='$penerbit',
            tahun='$tahun',
            kategori='$kategori'
    ";

    // Cek apakah ada file sampul yang diupload
    if (!empty($_FILES['sampul']['name'])) {
        $namaFile = basename($_FILES['sampul']['name']);
        $lokasiTmp = $_FILES['sampul']['tmp_name'];
        $tujuan = "cover/" . $namaFile;

        // Upload file ke folder cover/
        if (move_uploaded_file($lokasiTmp, $tujuan)) {
            $query .= ", sampul='$namaFile'";
        }
    }

    $query .= " WHERE id=$id";
    $update = mysqli_query($mysqli, $query);

    if ($update) {
        header("Location: data_buku.php");
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($mysqli);
    }
}
?>

<!-- HTML di bawah ini tetap seperti sebelumnya -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Data Buku</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

  <style>
    body {
      background-color: #f4f6f9;
    }
    .container {
      max-width: 600px;
      margin-top: 50px;
    }
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
  </style>
</head>
<body class="hold-transition">

<div class="container">
  <div class="card">
    <div class="card-header bg-warning">
      <h3 class="card-title"><i class="fas fa-edit"></i> Edit Data Buku</h3>
    </div>
    <div class="card-body">
      <!-- Form dengan enctype untuk upload file -->
      <form action="edit_buku.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Judul Buku</label>
          <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
        </div>
        <div class="form-group">
          <label>Penulis</label>
          <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($data['penulis']); ?>" required>
        </div>
        <div class="form-group">
          <label>Penerbit</label>
          <input type="text" name="penerbit" class="form-control" value="<?= htmlspecialchars($data['penerbit']); ?>" required>
        </div>
        <div class="form-group">
          <label>Tahun Terbit</label>
          <input type="number" name="tahun" class="form-control" value="<?= htmlspecialchars($data['tahun']); ?>" required>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']); ?>" required>
        </div>

        <!-- Tampilkan gambar sampul jika ada -->
        <div class="form-group">
          <label>Sampul Sekarang</label><br>
          <?php if (!empty($data['sampul'])) { ?>
            <img src="cover/<?= htmlspecialchars($data['sampul']); ?>" alt="Sampul" width="120">
          <?php } else { ?>
            <p><i>Tidak ada sampul</i></p>
          <?php } ?>
        </div>

        <!-- Input untuk mengganti sampul -->
        <div class="form-group">
          <label>Ganti Sampul</label>
          <input type="file" name="sampul" class="form-control">
        </div>

        <div class="form-group text-right">
          <button type="submit" name="submit" class="btn btn-warning">
            <i class="fas fa-save"></i> Simpan
          </button>
          <a href="data_buku.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
