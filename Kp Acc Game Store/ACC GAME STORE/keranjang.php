<?php 
session_start();
include 'function.php';

if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong. Silahkan Belanja Terlebih Dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<link rel="stylesheet" href="navbar.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <link href="tabel.css" rel="stylesheet" />

</head>
<body>
    <?php include 'navbarnosearch.php' ?>



    <!-- isi nya -->
    <div class="container">
        <h1>Halaman Keranjang</h1> <br>
        <div class="glass"> <br>    
            <table class="table table table-bordered" class="table">
               <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Akun</td>
                    <td>Harga Akun</td>
                    <td>Jumlah</td>
                    <td>Subharga</td>
                    <td>Hapus</td>
                </tr>
               </thead>
               <tbody>
               <?php $nomor=1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                    <?php 
                         $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                         $pecah = $ambil->fetch_assoc();
                         $jumlah = 1; 
                         // Ambil nilai stok dari database
                         $stok = $pecah['stok_akun'];
                         // Tambahkan nilai stok dengan $jumlah
                         $stok2 = $stok - $jumlah;
                         // Lakukan UPDATE ke database
                          if ($stok > 0) {
                              $koneksi->query("UPDATE produk SET stok_akun = '$stok2' WHERE id_produk = '$id_produk'");
                          }
                         
                     ?>     
                   <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                   $pecah = $ambil->fetch_assoc(); 
                   ?> 
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_akun']; ?></td>
                        <td>Rp.<?php echo number_format($pecah['harga_akun']); ?></td>
                        <td><?php echo $jumlah  ?></td>
                        <td>Rp.<?php echo number_format($pecah['harga_akun']*$jumlah); ?></td>
                        <td align="center">
                           <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" onclick="return confirm('Anda Yakin Menghapus Dari Keranjang');" class="btn btn-danger" name="hapus"><i class='bx bx-trash bx-sm'></i></a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach ?>
               </tbody>
            </table>
            <a href="index.php" class="btn btn-primary" name="checkout">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-success" name="checkout">Checkout</a> <br>
        </div>
    </div>
    
</body>
</html>