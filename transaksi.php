<?php
require_once("config.php");
session_start();
if($_SESSION['id']==NULL){
	header('location:login.php');
}
// tampil transaksi
$idcab=$_SESSION['id'];
$sql_transaksi="SELECT produk.nama_produk,produk.harga,transaksi.tgl_transaksi,transaksi.id_transaksi FROM transaksi JOIN produk ON produk.id_produk=transaksi.id_produk WHERE transaksi.id_cabang='$idcab'";
$query_transaksi=mysqli_query($koneksi,$sql_transaksi);
$hasil=[];
while($row=mysqli_fetch_assoc($query_transaksi)){
	$hasil[]=$row;
}
// tampil produk
$sql_cproduk="SELECT * FROM produk";
$query_cproduk=mysqli_query($koneksi,$sql_cproduk);
$produk=[];
while($row=mysqli_fetch_assoc($query_cproduk)){
	$produk[]=$row;
}
?>

<!DOCTYPE html>
 <html>
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   
    <title>KAZUMA - <?=$_SESSION['nama_cabang']?></title>
   </head>
  <body id="page-top">
  <div class="container-fluid mt-5">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav mb-3" style="background-color: #2c3e50;">
    <img src="img/logo.jpg" alt="" width="60" height="44" class="d-inline-block align-top">
  <a class="navbar-brand" style="margin-left: 10px;" href="#">KAZUMA <?=$_SESSION['nama_cabang']?> - <?=$_SESSION['alamat']?></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-nav-right ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">LOGOUT</a>
      </li>
    </ul>
  </div>
    </nav>
</div>

<!-- konten -->
 	<div class="container text-center " style="margin-top: 100px;">
    <div class="input mt-5 ">
    	<center>
    <form action="tambah.php" method="POST" class="w-50" >
    	<table>
    	<tr><th colspan="2">INPUT TRANSAKSI</th>
    	</tr>
    	 <tr><td>MODEL/JASA</td>
    	 <td>
				<select class="form-select" name="idp" aria-label="Default select example">
				<?php foreach($produk as $jasa):?>
				<option value="<?=$jasa['id_produk']?>"><?=$jasa['nama_produk']?></option>
				<?php endforeach;?>
		</select>
		 </td>
    	 </tr>
    	<tr>
    	<td>TANGGAL</td>
    	<td><input type="date" name="tgl"></td>
    	</tr>
    	<tr>
    	</tr>
    	<tr>
    		<td colspan="2">
    			<input type="submit" name="submit" value="SUBMIT" class="btn btn-dark"> 
    		</td>
    	</tr>
    	</table>
    </form>
    </center>
</div>	
   <table class="table1 m-3">
    <tr> 
		<th>ID TRANSAKSI</th>
    	<th>SERVICE</th>
    	<th>BIAYA</th>
    	<th>TANGGAL</th>
    	<th>CABANG</th>
    </tr>
	<?php
		foreach($hasil as $transaksi):
	?>
     <tr> 
		<td><?=$transaksi['id_transaksi']?></td>
    	<td><?=$transaksi['nama_produk']?></td>
    	<td><?=rupiah($transaksi['harga']);?></td>
    	<td><?=$transaksi['tgl_transaksi']?></td>
		<td><?=$_SESSION['nama_cabang']?>-<?=$_SESSION['alamat']?></td>
	 </tr>
	 <?php endforeach;?>
    </table>
 </div>

 </body>
 </html>