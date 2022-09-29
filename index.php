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
      <nav class="navbar navbar-expand-lg bg-secondary bg-opacity-10 py-2">
        <div class="container">
          <a class="navbar-brand" href="#"><i class="fa fa-coffee"></i>Perpustakaan 5 Jaya</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-success" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Book</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-success text-white rounded-pill" href="#">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- isi 1 -->

      <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-7">
                <h1 class="wow fadeInUp">Selamat datang di</h1>
                <h1 class="text-success wow fadeInUp">Perpustakaan 5 Jaya</h1>
                <p class="wow fadeInUp">"Membaca adalah Pintu dunia, jika tidak mau membaca maka anda Player FF"</p>
            </div>
            <div class="col-md-5 wow fadeInRight">
                <img src="img/samurai cat.png" alt="" width="90%"  style="margin-top: -70px; margin-left: 50px;">
            </div>
        </div>
      </div>

      <!-- TABEL -->
      
      <div class="container mt-2 mb-5">
        <h1 class="text-center mb-5">Daftar Buku</h1>
        <table class="table table-striped table-hover table-bordered">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Judul</th>
                    <th>Kota</th>
                    <th>Penerbit Buku</th>
                    <th>Cover</th>
                    <th>Sinopsis</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    
                    $ambil = mysqli_query($config, "SELECT * FROM buku");
                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                <tr>
                    <td><?= $data['id_buku'] ?></td>
                    <td><?= $data['penulis'] ?></td>
                    <td><?= $data['tahun'] ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['kota'] ?></td>
                    <td><?= $data['penerbit'] ?></td>
                    <td><img src="img/<?= $data['cover'] ?>" alt="" width="100px"  class="img img-thumbnail"></td>
                    <td><?= $data['sinopsis'] ?></td>
                    <td><?= $data['stock'] ?></td>
                    <!-- <td><a href="edit.php?id=<?php echo $data['id'];?>"><button class="btn btn-primary">Edit</button></a></td>
                    <td><a href="delete.php?id=<?php echo $data['id'];?>"><button class="btn btn-danger">Delete</button></a></td> -->
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