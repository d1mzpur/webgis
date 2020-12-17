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
    <?php if (isset($_SESSION['status'])) {
      if ($_SESSION['status'] == "login") { ?>
        <a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="datasma.php"><i class="fas fa-cogs"></i><span>Data SMA</span></a>
        <a href="datasuhu.php"><i class="fas fa-table"></i><span>Data Suhu Kelembapan</span></a>
        <a href="peta.php"><i class="fas fa-info-circle"></i><span>Peta Persebaran</span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
      <?php } elseif ($_SESSION['status'] == "") { ?>
        <a href="index.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="login.php"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
    <?php }
    } ?>

  </div>
  <!--sidebar end-->

  <div class="content"><br><br><br><br><br>
    <center>
      <h2>Login</h2><br><br>

      <?php


      if (isset($_POST['submit'])) {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        $query = "SELECT * FROM login WHERE username='$npm' and password='$password'";
        $insert = pg_query($conn, $query);
        if ($insert == TRUE) {
          $_SESSION['status'] = "login";
          header("location:index.php");
        } else {
          echo "<script> alert(\"Tambah data gagal\"); </script>";
        }
      }


      ?>
      <form action="" method="post">
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br>

        <button type="submit" class="btn tambah" name="submit">Login</button>


      </form>
    </center>
  </div>
</body>

</html>