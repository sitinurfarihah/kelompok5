<?php
include 'config.php';
$id = $_GET['id_buku'];
$query = mysqli_query($config, "DELETE FROM buku WHERE id_buku = '$id'");

if ($query) {
    echo 'data berhasil dihapus <a href="admin_home.php">kembali<a>';
}else {
    echo 'data gagal dihapus';
}
?>