<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "accgamestore";
$koneksi = mysqli_connect($host,$user,$pass,$db);

if ($koneksi) {
    die("koneksi gagal: ".mysqli_connect_error());
   } else {
    echo "berhasil";
   }
?>