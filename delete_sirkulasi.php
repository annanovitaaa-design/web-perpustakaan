<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM sirkulasi WHERE id_sirkulasi=$id");

if ($result) {
    header("Location: laporan_sirkulasi.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($mysqli);
}
?>
