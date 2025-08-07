<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM anggota WHERE id_anggota=$id");

if ($result) {
    header("Location: data_anggota.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($mysqli);
}
?>
