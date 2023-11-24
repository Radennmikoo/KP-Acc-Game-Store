<?php 
session_start();
$id_produk=$_GET["id"];
unset($_SESSION['keranjang'][$id_produk]);
$koneksi = new mysqli("localhost", "root", "", "accgamestore");

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$pecah = $ambil->fetch_assoc();
$jumlah = 1; 
// Ambil nilai stok dari database
$stok = $pecah['stok_akun'];
// Tambahkan nilai stok dengan $jumlah
$stok2 = $stok + $jumlah;
// Lakukan UPDATE ke database
$koneksi->query("UPDATE produk SET stok_akun = '$stok2' WHERE id_produk = '$id_produk'");

echo "<script>alert('Katalog telah dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>