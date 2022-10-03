<?php
session_start();
include "config.php";

if(!$_SESSION['nip']){
    header('location:index.php');
}
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
                <a class="nav-link text-success" aria-current="page" href="admin_home.php">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_siswa.php">Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_peminjaman.php">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_pengembalian.php">Pengembalian</a>
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
        <h1 class="text-center mb-5">Update Buku</h1>
        <a href="admin_home.php" class="btn btn-success mb-3"> Kembali</a>
        <form method="POST" enctype="multipart/form-data" >
            <?php
                $id_buku = $_GET['id_buku'];

                $ambil = mysqli_query($config,"SELECT * FROM buku WHERE id_buku = $id_buku");
                while ($data = mysqli_fetch_array($ambil)){

            ?>
            <div class="mb-3">
                <label class="form-label">ID Buku</label>
                <input type="text" class="form-control" name="id_buku" value="<?= $_GET['id_buku'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $data['penulis'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" class="form-control" name="tahun" value="<?= $data['tahun'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control" name="kota" value="<?= $data['kota'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $data['penerbit'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" class="form-control" name="cover" value="<?= $data['cover'] ?>">
            </div>
            <div class="mb-3">
                <img src="img/<?= $data['cover']?>" alt="" width="300px" class="img img-thumbnail">
            </div>
            <div class="mb-3">
                <label class="form-label">Sinopsis</label>
                <input type="textarea" class="form-control" name="sinopsis" value="<?= $data['sinopsis'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="<?= $data['stock']; }?>">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Update data"/>
        </form>
      </div>




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

if (isset($_POST['submit'])) {
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $judul = $_POST['judul'];
    $kota = $_POST['kota'];
    $penerbit = $_POST['penerbit'];
    $cover = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    $sinopsis = $_POST['sinopsis'];
    $stock = $_POST['stock'];

    if (!empty($cover)) {
      if ($tmp_name = $_FILES['cover']['tmp_name']) {
        $upload = move_uploaded_file($tmp_name, "img/".$cover);
      } 
      $query = mysqli_query($config, "UPDATE buku SET penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', cover='$cover', sinopsis='$sinopsis', stock='$stock' WHERE id_buku='$id_buku'");
    } else {
      $query = mysqli_query($config, "UPDATE buku SET penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', sinopsis='$sinopsis', stock='$stock' WHERE id_buku='$id_buku'");
    }
    


    if ($query) {
      echo '<script>window.location.href="admin_home.php";</script>';
  } else {
      echo 'data gagal diupdate';
  }


} 


?>