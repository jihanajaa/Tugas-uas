<?php
require_once("config.php");
$sql_cproduk="SELECT * FROM produk";
$query_cproduk=mysqli_query($koneksi,$sql_cproduk);
$hasil=[];
while($row=mysqli_fetch_assoc($query_cproduk)){
  $hasil[]=$row;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>HOME</title>
  </head>
  <body style="background-color:#e67e22;">
  <div class="container-fluid mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav mb-3" style="background-color: #2c3e50;">
    <img src="img/logo.jpg" alt="" width="60" height="44" class="d-inline-block align-top">
  <a class="navbar-brand" style="margin-left: 10px;" href="#">KAZUMA</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-nav-right ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">ADMIN</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="https://api.whatsapp.com/send?phone=6281234566">HUBUNGI KAMI</a>
      </li>
    </ul>
  </div>
    </nav>
</div>
<!-- end navbar -->
<!-- carousel -->
<div class="container-fluid mb-3">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide1.jpg" class="d-block w-100" style="height: 500px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slide2.jpg" class="d-block w-100" style="height: 500px;" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</div>
<!-- end car -->
<!-- desk -->
<div class="container rounded text-center shadow-lg text-white mb-3 p-3">
<img src="img/logo.jpg" alt="">
<h1>KAZUMA BARBERSHOP</h1><hr>
<h4>Barbershop dengan pelayanan premium dan lengkap</h4>
<strong><h1>Harga Mulai <br> Rp 25000 </h1></strong>
<h3><strong>Jam Buka <br>  SENIN-JUM'AT : 09.00 - 22.00 WIB<br>SABTU-MINGGU : 09.00 - 18.00 WIB</strong></h3>
</div>
<!-- gambar rambut -->
<div class="container mb-3">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="img/md1.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img/md2.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img/md3.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img/md4.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img/md5.jpg" class="card-img-top" alt="...">
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img/md6.jpg" class="card-img-top" alt="...">
    </div>
  </div>
</div>
</div>
<!-- end rambut -->
<!-- daftar harga -->
<div class="container text-center text-white rounded shadow-lg">
  <h1> <strong>Daftar Harga Services</strong> </h1>
<table class="table caption-top text-white">
  <tbody>
    <?php 
    $n=1;
    foreach($hasil as $produk):
    ?>
    <tr>
      <th scope="row"><?=$n?></th>
      <td><?=$produk['nama_produk']?></td>
      <td><?=rupiah($produk['harga']);?></td>
    </tr>
    <?php
    $n++; endforeach; 
    ?>
  </tbody>
</table>
</div>
  </body>
</html>