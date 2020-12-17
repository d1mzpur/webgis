<?php 
$host = 'localhost';
$port = '5432';
$user = 'postgres';
$pass = 'root';
$dbname = 'gisiot';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) {
    echo "koneksi gagal";
    exit;
}

?>
