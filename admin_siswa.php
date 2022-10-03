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
    <title>Perpustakaan 5 jaya Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="WOW-master/css/libs/animate.css"/>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg bg-secondary bg-opacity-10 py-2">
        <div class="container">
          <a class="navbar-brand" href="#"><i class="fa fa-coffee"></i>Perpustakaan 5 Jaya</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-success" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Book</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-success text-white rounded-pill" href="login_siswa.php">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- TABEL -->
      
      <div class="container mt-5 mb-5">
        <h1 class="text-center mb-5">Daftar Siswa</h1>
        <a href="create_siswa.php" class="btn btn-success mb-3">Tambah Siswa</a>
        <table class="table table-striped table-hover table-bordered text-center">
            <thead class="text-center">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th colspan="2">Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                    
                    $ambil = mysqli_query($config, 
                    "SELECT s.nis, s.nama, s.jenis_kelamin, s.alamat,k.nama_kelas FROM siswa s JOIN kelas k ON s.id_kelas = k.id_kelas");
                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                <tr>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['nama_kelas'] ?></td>
                    <td><a href="edit_siswa.php?nis=<?php echo $data['nis'];?>"><button class="btn btn-primary">Edit</button></a></td>
                    <td><a href="delete_siswa.php?nis=<?php echo $data['nis'];?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
            <?php
        }
        ?>
            </tbody>
        </table>
      </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="WOW-master/dist/wow.js"></script>
  </body>
</html>