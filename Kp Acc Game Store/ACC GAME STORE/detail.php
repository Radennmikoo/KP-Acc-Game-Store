<?php 
session_start();
require 'function.php';
$id_produk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$pecah = $ambil->fetch_assoc();
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="navbar.css" rel="stylesheet" />
<link href="detail.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACC GAME STORE</title>
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
</head>
<body>
<!-- navbar -->
<?php include 'navbarnosearch.php' ?>
<!-- isi -->

<div class="container">
    <div class="glass">
      <div class="row">
         <div class="col-md-6"><br>
            <img src="FotoAkun/<?php echo $pecah['foto_akun'];?>" class="img-responsive"><br>
         </div> 
       
            <div class="col-md-6"><br>
                <div class="judul">
                <h3><?php echo $pecah['nama_akun'];?></h3>
                </div><br>
                <div class="isi">
                <h4><?php echo $pecah['deskripsi_akun'];?></h4>
                </div><br>
            </div>
            </div>
         </div>
      </div>
    </div>
</div>
</body>
</html>