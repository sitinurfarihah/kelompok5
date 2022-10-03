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
                <a class="nav-link" href="admin_peminjaman.php">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-success active" href="admin_pengembalian.php">Pengembalian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-success text-white rounded-pill ms-4 ps-4 pe-4" href="logout.php">LOGOUT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      


      <!-- FORM -->
      
      <div class="container mt-2 mb-5">
        <h1 class="text-center mb-5">Pengembalian</h1>
        <!-- <a href="create_peminjaman.php" class="btn btn-success mb-3"> Pinjam Baru</a> -->
        <form method="POST" enctype="multipart/form-data" >
        <?php
                $id_peminjaman = $_GET['id_peminjaman'];

                $ambil = mysqli_query($config,"SELECT * FROM peminjaman WHERE id_peminjaman = $id_peminjaman");
                while ($data = mysqli_fetch_array($ambil)){
                  //  $data['tanggal_pengembalian'];
            ?>
            <div class="mb-3">
                <label class="form-label">ID Peminjaman</label>
                <input readonly type="text" class="form-control" name="id_peminjaman" value="<?= $_GET['id_peminjaman'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pengembalian</label>
                <input readonly type="date" class="form-control" name="tanggal_pengembalian" value="<?= $data['tanggal_pengembalian'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tanggal_kembali">
            </div>
            <?php } ?>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
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
    $id_peminjaman = $_POST['id_peminjaman'];
    $tgl_kembali = $_POST['tanggal_kembali'] ;
    $tgl_pengembalian = $_POST['tanggal_pengembalian'];
    $tanggal_kembali = date_create( $tgl_kembali) ;
    $tanggal_pengembalian = date_create($tgl_pengembalian);
    // $denda = $_POST['denda'];
    $selisih = date_diff($tanggal_kembali, $tanggal_pengembalian);
    // var_dump($selisih->days);
    // die;
    if ($selisih->days >=  0) {
      $denda = $selisih->days * 10000;
    }


    $query = mysqli_query($config, "INSERT INTO pengembalian(id_peminjaman2, tanggal_kembali, denda) VALUES('$id_peminjaman', '$tgl_kembali', '$denda')");

    if ($query) {
        $maxid = mysqli_query($config,"SELECT MAX(id_pengembalian)as id_peng FROM pengembalian");
        $max = mysqli_fetch_array($maxid);

      echo '<script>window.location.href="detail_pengembalian.php?id_pengembalian='.$max['id_peng'].'";</script>';
    } else {
        echo 'data gagal ditambah';
    }
    
} 


?>