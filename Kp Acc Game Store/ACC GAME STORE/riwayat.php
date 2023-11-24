<?php  
session_start();
include 'function.php';
error_reporting(0);


if (!isset($_SESSION["pelanggan"])) 
{
 echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
 echo "<script>location='login.php';</script>";
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
    <title>Riwayat Pembelian</title>
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <link href="tabel.css" rel="stylesheet" />

</head>
<body>
    <?php include 'navbarnosearch.php' ?><br>
<div class="container">
      <h2>Halaman Riwayat Pembelian : </h2>
    <div class="glass">
    <form method="post">
                    <div class="col-md-4">
                    <h3>Nama pelanggan : </h3>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-md-4">
                    <h3>Email pelanggan : </h3>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['email_pelanggan'] ?>" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-md-4">
                    <h3>Nomor Telepon Pelanggan : </h3>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telpon_pelanggan'] ?>" class="form-control"> 
                        </div>
                    </div><br>
            
            <table class="table table-bordered" class="table">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Opsi</th>
                      </tr>
                  </thead> 
                  <tbody>
                    <?php
                    $number=1; 
                      $id_pelanggan =$_SESSION["pelanggan"]["id_pelanggan"];
                      $ambil = $koneksi ->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                      while($periwayat = $ambil->fetch_assoc()){
                    ?>
                       <tr>
                          <td><?php echo $number; ?></td>
                          <td><?php echo date('Y-m-d H:i:s',strtotime($periwayat['waktu_pembelian']));  ?></td>
                          <td>Rp.<?php echo number_format($periwayat['total_pembelian']); ?></td>
                          <td>
                            <a href="nota.php?id=<?php echo $periwayat['id_pembelian']; ?>" class="btn btn-info">Nota</a>
                          </td>
                       </tr>
                    <?php $number+=1; ?>
                    <?php } ?>
                  </tbody> 

            </table>

</div>

</body>
</html>