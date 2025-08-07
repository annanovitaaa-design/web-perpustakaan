<?php
session_start();
include_once("koneksi.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($mysqli, "DELETE FROM buku WHERE id=$id");

    if ($result) {
        header("Location: data_buku.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($mysqli);
    }
} else {
    echo "ID tidak valid.";
}
?>
