<?php
include_once("koneksi.php");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $result = mysqli_query($mysqli, "INSERT INTO anggota(nama, jk, alamat, no_hp) 
                                     VALUES('$nama', '$jk', '$alamat', '$no_hp')");

    if ($result) {
        header("Location: data_anggota.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <!-- Tambahkan baris favicon -->
    <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-user-plus"></i> Tambah Data Anggota
            </h3>
        </div>

        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="data_anggota.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
