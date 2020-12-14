<?php

require_once 'koneksi.php';

$sql = "SELECT gid, kecamatan, x, y, gedung, alamat FROM sma ORDER BY gid ASC";
$run = pg_query($conn, $sql);

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>K-SIG CLASS B</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <div class="left_area">
        <h3>K-SIG <span>CLASS B</span></h3>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
    <?php if (isset($_SESSION['status'])){
    if ($_SESSION['status'] == "login"){?>
    <a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="datasma.php"><i class="fas fa-cogs"></i><span>Data SMA</span></a>
      <a href="datasuhu.php"><i class="fas fa-table"></i><span>Data Suhu Kelembapan</span></a>
      <a href="peta.php"><i class="fas fa-info-circle"></i><span>Peta Persebaran</span></a>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    <?php }elseif ($_SESSION['status'] == ""){ ?>
        <a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="login.php"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
    <?php } }?>
      
    </div>
    <!--sidebar end-->

    <div class="content"><br><br><br><br><br>
    <center><h2>Tambah Informasi Data<br>Sekolah Menengah Atas Kota Bogor</h2><br><br>

    <?php


if (isset($_POST['submit'])) {
    $gedung = addslashes($_POST['gedung']);
    $kecamatan = addslashes($_POST['kecamatan']);
    $alamat = addslashes($_POST['alamat']);
    $latitude = addslashes($_POST['latitude']);
    $longitude = addslashes($_POST['longitude']);
    $query = "INSERT INTO sma (gedung, kecamatan, alamat, x, y) VALUES ('$gedung', '$kecamatan', '$alamat', '$latitude', '$longitude')";
    $insert = pg_query($conn, $query);
    if ($insert == TRUE) {
        echo "<script> alert(\"Tambah data berhasil\");document.location=\"datasma.php\"; </script>";
    } else {
        echo "<script> alert(\"Tambah data gagal\"); </script>";
    }
}


?>
<form action="" method="post">
                            <label for="gedung">Gedung</label><br>
                            <input type="text"  id="gedung" name="gedung" ><br>
                       
                        
                            <label for="kecamatan">Kecamatan</label><br>
                            <input type="text"  id="kecamatan" name="kecamatan" ><br>
                       

                            <label for="alamat"> Alamat </label><br>
                            <input type="text"  id="alamat" name="alamat" ?>"><br>
                      
                            <label for="latitude"> Latitude </label><br>
                            <input type="text"  id="latitude" name="latitude"><br>
                        
                            <label for="longitude"> Longitude </label><br>
                            <input type="text" id="longitude" name="longitude"><br>
                        
                            <button type="submit" class="btn tambah" name="submit">Tambah data</button>
                      

                    </form> 
    </center>
    </div>
  </body>
</html>
     