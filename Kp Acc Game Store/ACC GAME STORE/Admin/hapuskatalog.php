<?php 
error_reporting(0);
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoakun = $pecah['foto_akun'];
if (file_exists("../FotoAkun/".$fotoakun)) 
{
    unlink("../FotoAkun/".$fotoakun);
}
$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Katalog Terhapus')</script>";
echo "<script>location='katalog.php';</script>";
?>