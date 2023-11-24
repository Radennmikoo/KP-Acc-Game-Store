<?php 
session_start();
include 'function.php';

?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<link rel="stylesheet" href="navbar.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembayaran</title>
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <link href="tabel.css" rel="stylesheet" />

</head>
<body>
    <?php include 'navbarnosearch.php' ?><br>


    <!-- isi nya -->
<div class="container">   
    <h1>Nota Pembayaran</h1>
    <div class="glass">    
        <link href='Admin.css' rel='stylesheet' type='text/css' />


    <?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
            WHERE pembelian.id_pembelian='$_GET[id]'"); 
            $detail = $ambil->fetch_assoc()
    ?>
<!-- mendapat id pelanggan -->
 <?php 
    $id_pelanggan = $detail["id_pelanggan"];
    $pelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
    if ($id_pelanggan!==$pelangganyanglogin) 
    {
        echo "<script>alert('Privasi');</script>";
        echo "<script>location='riwayat.php';</script>";
    }
  ?> 

    <strong>Nama Pelanggan : <?php echo $detail['nama_pelanggan']; ?></strong> <br>
    <p>
                Nomor telpon pelanggan : <?php echo $detail['telpon_pelanggan']; ?> <br>
                Alamat email pelanggan :  <?php echo $detail['email_pelanggan']; ?>
    </p>
    <p> 
                Nama Metode : <?php echo $detail['nama_metode'] ?><br>
                Total Biaya Admin : Rp.<?php echo number_format($detail['totalbiayametode']) ?><br>        
                Tanggal Transaksi : <?php echo $detail['waktu_pembelian']; ?> <br>
    </p>
    <strong>Total Pembayaran : Rp.<?php echo number_format($detail['total_pembelian']); ?><br></strong>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Akun</th>
                <!-- <th>Kategori Akun</th> -->
                <th>Username Akun</th>
                <th>Password Akun</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah ['nama_akun']; ?></th>
                <!-- <td><php echo $pecah ['nama_kategori']; ?></th> -->
                <td><?php echo $pecah ['user_akun']; ?></td>
                <td><?php echo $pecah['pass_akun']; ?></td>
                <td>Rp.<?php echo number_format($pecah ['harga_akun']); ?></th>
                <td><?php echo $pecah ['jumlah']; ?></td>
                <td>Rp.<?php echo number_format($pecah ['harga_akun']*$pecah['jumlah']); ?></td>
            </tr>
            <?php $nomor++ ?>
            <?php } ?>
        </tbody>
      </table>
      <div class="row">
         <div class="col-md-7">
            <div class="alert alert-info">
                <p>
                    Saldo <?php echo $detail['nama_metode']; ?> Senilai Rp.<?php echo number_format($detail['total_pembelian']) ?> Telah Terpotong<br>
                    <strong>Terima Kasih Sudah Berbelanja DI Web ACC GAME STORE</strong>
                </p>
         </div>
      </div>
    </div>
</div>

</body>
</html>