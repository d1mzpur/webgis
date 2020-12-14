<?php

require_once 'koneksi.php';

$sql = "SELECT gedung, kecamatan, x, y, alamat FROM sma";
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
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/css/leaflet.css">

    <script src="assets/js/leaflet.min.js"></script>
    <script src="assets/js/bogor.geojson"></script>

    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
    
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
    <center><h2>Informasi Peta Persebaran<br>Sekolah Menengah Atas Kota Bogor</h2></center>
    <center>
    <div id="map" style="height: 550px; width: 50%;">
     <script>
        // var map = L.map('map').setView([-6.590000, 106.801851], 12);
        // var basemap = L.tileLayer.wms("http://localhost:8080/geoserver/gisiot/wms?service=WMS", {
        //   layers: 'gisiot:kecamatan',
        //   format: 'image/png',
        //   transparent: true});
        // basemap.addTo(map);
        var map = L.map('map').setView([-6.590000, 106.801851], 12);
            var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
            basemap.addTo(map);
            var geojson = L.geoJson(baca).addTo(map);

        var bluemarker = L.icon({
          iconUrl: "assets/img/blue-marker.png",
          iconSize: [40, 40],
          iconAnchor: [20, 5],
        });

        <?php while ($data = pg_fetch_assoc($run)) : ?>
          L.marker([<?= $data['x']; ?>, <?= $data['y']; ?>], {
            icon: bluemarker
        }).addTo(map)
         .bindPopup("<b><?= $data['gedung']; ?></b><br><?=$data['alamat']; ?> <br> <?= $data['kecamatan']; ?>");
        <?php endwhile; ?>
        
      </script>
      </div>
      </center>
    </div>
  </body>
</html>
     