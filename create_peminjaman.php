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
                <a class="nav-link" aria-current="page" href="admin_home.php">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_siswa.php">Siswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-success" href="admin_peminjaman.php">Peminjaman</a>
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
      


      <!-- TABEL -->
      
      <div class="container mt-2 mb-5">
        <h1 class="text-center mb-5">Peminjaman Baru</h1>
        <a href="admin_peminjaman.php" class="btn btn-success mb-3"> Kembali</a>
        <form method="POST" enctype="multipart/form-data" >
            <div class="mb-3">
                <label class="form-label">Siswa</label>
                <!-- <input type="number" class="form-control" name="siswa"> -->
                <select class="form-select" aria-label="Default select example" name="nis" >
                    <?php
                    $ambil = mysqli_query($config,"SELECT * FROM siswa");
                    while ($data = mysqli_fetch_array($ambil)){
                    ?>
                    <option value="<?= $data['nis'] ?>" ><?= $data['nama']; }?></option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Petugas</label>
                <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="tanggal_peminjaman">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal_pengembalian">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Next"/>
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
    $nis = $_POST['nis'];
    $nip = $_POST['nip'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];


    $query = mysqli_query($config, "INSERT INTO peminjaman(id_siswa, id_petugas, tanggal_peminjaman, tanggal_pengembalian) VALUES('$nis', '$nip', '$tanggal_peminjaman', '$tanggal_pengembalian')");

    if ($query) {
        $maxid = mysqli_query($config,"SELECT MAX(id_peminjaman)as id_p FROM peminjaman");
        $max = mysqli_fetch_array($maxid);

      echo '<script>window.location.href="detail_peminjaman.php?id_peminjaman='.$max['id_p'].'";</script>';
    } else {
        echo 'data gagal ditambah';
    }
    
} 


?>