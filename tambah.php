<?php
session_start();
require_once("config.php");
$idp=$_POST['idp'];
$tgl=$_POST['tgl'];
$idc=$_SESSION['id'];
$sql_harga="SELECT harga FROM produk WHERE id_produk='$idp'";
$query_harga=mysqli_query($koneksi,$sql_harga);
$harga=mysqli_fetch_assoc($query_harga);
$sql_input="INSERT INTO transaksi VALUES ('','$idp','$tgl','$idc')";
$query_input=mysqli_query($koneksi,$sql_input);
header('location:transaksi.php');
?>