<?php

require_once 'koneksi.php';

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
    <center><h2>Informasi Suhu dan Kelembapan<br>Sekolah Menengah Atas Kota Bogor</h2><br><br>
       <table border="0" cellpadding="32">
        <tbody>
        <tr bgcolor="#808080">
            <th><font color="#FFFFFF">Tanggal</font></th>
            <th><font color="#FFFFFF">Waktu</font></th>
            <th><font color="#FFFFFF">Nama Wilayah</font></th>
            <th><font color="#FFFFFF">Latitude</font></th>
            <th><font color="#FFFFFF">Longtitude</font></th>
            <th><font color="#FFFFFF">Suhu</font></th>
            <th><font color="#FFFFFF">Kelembapan</font></th>
            
            <tr>
            <td>10-05-2000</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            </tr>
        </tbody>
      </table>
    </center>
      <br><br><br>
      <a href="export.php" class="btn tambah right">Export Data</a>
    </div>
  </body>
</html>
     