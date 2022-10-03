<?php
include "config.php";

$nis = $_GET['nis'];
$query = mysqli_query($config, "DELETE FROM siswa WHERE nis = '$nis'");

if ($query) {
    echo "Berhasil Dihapus";
}else {
    Echo "error";
}
?>