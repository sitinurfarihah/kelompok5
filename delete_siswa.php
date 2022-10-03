<?php
include 'config.php';
$nis = $_GET['nis'];
$query = mysqli_query($config, "DELETE FROM siswa WHERE nis = '$nis'");

if ($query) {
    echo 'data berhasil dihapus <a href="admin_siswa.php">kembali<a>';
}else {
    Echo "error";
}
?>