<?php
session_start();
require_once("config.php");
if(isset($_POST['submit'])){
  $us=$_POST['us'];
  $pw=$_POST['pw'];
  $sql_cek="SELECT*FROM cabang WHERE username='$us' AND password='$pw'";
  $query_cek=mysqli_query($koneksi,$sql_cek);
  $hasil=mysqli_fetch_assoc($query_cek);
  if($us!=$hasil['username'] && $pw!=$hasil['password']){
    echo "Username atau password salah";
  }else{
    $_SESSION['id']=$hasil['id_cabang'];
    $_SESSION['nama_cabang']=$hasil['nama_cabang'];
    $_SESSION['alamat']=$hasil['alamat'];
    header('location:transaksi.php');
  }
}else if(isset($_POST['reset'])){
  header('location:index.php');

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="log.css">
    <title>KAZUMA-Login</title>
   </head>
  <body style="background-color:#e67e22;">
<div class="container bg-white w-50 p-3 rounded shadow-lg" style="margin-top: 200px;">
  <h4 class="text-center">LOGIN</h4>
    <hr>
  <form action="login.php" method="POST">
    <div class="form-group">
    <label>Username</label>
    <input type="text" id="us" name="us" class="form-control" placeholder="Masukkan Username"></div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" id="pw" name="pw" class="form-control" placeholder="Masukkan Password">
    </div>

    <button type="submit" name="submit" class="btn btn-primary" >LOGIN</button>
    <button type="reset" name="reset" class="btn btn-danger">BATAL</button>
  </form>
  
</div>
  

  
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>