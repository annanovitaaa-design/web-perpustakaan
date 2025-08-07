<?php
include_once("koneksi.php");

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM anggota WHERE id_anggota=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $update = mysqli_query($mysqli, "UPDATE anggota SET 
        nama='$nama', 
        jk='$jk', 
        alamat='$alamat', 
        no_hp='$no_hp' 
        WHERE id_anggota=$id");

    if ($update) {
        header("Location: data_anggota.php");
    } else {
        echo "Gagal update data: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <!-- Tambahkan baris favicon -->
    <link rel="icon" type="image/png" href="assets/dist/img/PUSDES SULOMATTAPPA.png">

    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title">
                <i class="fas fa-user-edit"></i> Edit Data Anggota
            </h3>
        </div>

        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option <?= $data['jk'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option <?= $data['jk'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required><?= $data['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update
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
