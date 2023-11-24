<?php 
session_start();

unset($_SESSION["pelanggan"]);

 echo "<script>alert('Anda Telah Logout Sampai Jumpa');</script>";
 echo "<script>location='index.php';</script>";
 ?>