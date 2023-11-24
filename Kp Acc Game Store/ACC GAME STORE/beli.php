<?php 
session_start();
//ngambil id produk yang di url
$id_produk = $_GET['id'];

//kl dh masuk keranjang dia nambah 1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
   $_SESSION['keranjang'][$id_produk]+=1;
}
else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Katalog Akun Telah Dimasukan Ke Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>