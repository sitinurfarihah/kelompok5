<?php
session_start();
include "config.php";

// if(!$_SESSION['level']){
//     header('location:index.php');
// }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan 5 jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="WOW-master/css/libs/animate.css"/>
  </head>
  <body>
    <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-secondary bg-opacity-10 py-2">
        <div class="container">
          <a class="navbar-brand" href="#"><i class="fa fa-coffee"></i>Perpustakaan 5 Jaya</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-success" aria-current="page" href="#">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pengembalian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-success text-white rounded-pill ms-4 ps-4 pe-4" href="#">LOGOUT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      


      <!-- FORM UPDATE -->
      
      <div class="container mt-2 mb-5">
        <h1 class="text-center mb-5">Edit Siswa</h1>
        <a href="admin_siswa.php" class="btn btn-success mb-3"> Kembali</a>
        <form method="POST" enctype="" >
            <?php
                $nis=$_GET['nis'];

                $ambil = mysqli_query($config,"SELECT * FROM siswa WHERE nis = '$nis'");
                while ($data = mysqli_fetch_array($ambil)){
            ?>
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" name="nis" value="<?= $_GET['nis'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
            </div>
            <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select class="form-select" name="kelas">
                <?php
                  $ambil = mysqli_query($config,"SELECT * FROM kelas");
                  while ($datakelas = mysqli_fetch_array($ambil)){
                    if ($datakelas['id_kelas'] == $data['id_kelas']) { ?>
                    <option selected value="<?=$datakelas['id_kelas']?>"><?=$datakelas['nama_kelas']?></option>
                <?php
                    }
                ?>
                <option value="<?=$data_kelas['id_kelas']?>"><?=$datakelas['nama_kelas']; }?></option>
            </select>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary" name="edit">Edit</button>

            </div>
            <?php
                  }
            ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="WOW-master/dist/wow.js"></script>
  <script>
    $('.multiple-items').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });
  </script>
  <script>
    wow = new WOW(
                      {
                      boxClass:     'wow',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       true,       // default
                      live:         true        // default
                    }
                    )
                    wow.init();
  </script>
  </body>
</html>

<?php

if (isset($_POST['edit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($config, "UPDATE siswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', id_kelas='$kelas' WHERE nis='$nis'");
    

    if ($query) {
      echo '<script>window.location.href="index_siswa.php";</script>';
  } else {
      echo 'data gagal diupdate';
  }
}


?>