<?php
require_once 'koneksi.php';

if (isset($_GET['gid'])) {
    $gid = $_GET['gid'];
    $query = "DELETE FROM sma WHERE gid = '$gid'";
    $insert = pg_query($conn, $query);
    if ($insert == TRUE) {
        echo "<script> alert(\"Hapus data berhasil\");document.location=\"datasma.php\"; </script>";
    } else {
        echo "<script> alert(\"Hapus data gagal\"); </script>";
    }
}
