<?php
include 'config.php';
$id = $_GET['id_buku'];
mysqli_query($kon, "DELETE FROM perpuss WHERE id_buku = '$id'");
header("location: admin_home.php");
?>