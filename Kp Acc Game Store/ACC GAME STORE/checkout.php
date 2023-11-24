<?php  
session_start();
include 'function.php';
error_reporting(0);


if (!isset($_SESSION["pelanggan"])) 
{
 echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
 echo "<script>location='login.php';</script>";
}
if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong. Silahkan Belanja Terlebih Dahulu');</script>";
    echo "<script>location='index.php';</script>";
}
?>
 <link href="tabel.css" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="navbar.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="na.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <title>Halaman Checkout</title>
</head>
<body>
<!-- navbar -->
<?php include 'navbarnosearch.php'; ?>

<div class="container">
        <h1>Halaman Checkout</h1> 
        <div class="glass">    
            <table class="table table table-bordered" class="table">
               <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Akun</td>
                    <td>Harga Akun</td>
                    <td>Jumlah</td>
                    <td>Subharga</td>
                </tr>
               </thead>
               <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
                   <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>   
                   <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                   $pecah = $ambil->fetch_assoc(); 
                    $subharga = $pecah['harga_akun']*$jumlah;

                   ?> 
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_akun']; ?></td>
                        <td>Rp.<?php echo number_format($pecah['harga_akun']); ?></td>
                        <td><?php echo $jumlah  ?></td>
                        <td>Rp.<?php echo number_format($subharga); ?></td>
                    </tr> <br>
                    <?php $nomor++; ?>
                    <?php $totalbayar = $totalbelanja+=$subharga; ?>
                    <?php endforeach ?>
               </tbody>
               <tfoot>
                  <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp.<?php echo number_format($totalbayar) ?></th>
                  </tr>
               </tfoot>
            </table>
            <form method="post">
                <div class="row">
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
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="id_metode" required>
                      <option value="" >Pilih Metode Pembayaran</option>  
                       <?php 
                       $ambil = $koneksi->query("SELECT * FROM metode_pembayaran");
                       while ($pertransaksi = $ambil->fetch_assoc()){
                       ?>          
                        <option value="<?php echo $pertransaksi["id_metode"] ?>" required>
                            <?php echo $pertransaksi['nama_metode']?>-
                            <?php echo $pertransaksi['biaya_admin']?>% Dari Total Pembelian
                        </option> 
                        <?php } ?>
                      </select>
                    </div>
                </div><br>
                <button class="btn btn-success" name="checkout" onclick="return confirm('Anda Yakin Ingin Checkout');">Checkout</button>
            </form>
             <?php  
             if (isset($_POST["checkout"])) 
             {  
                

                $idpelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $idmetode = $_POST["id_metode"];
                date_default_timezone_set('Asia/Jakarta');
                $waktu = date('Y-m-d H:i:s');
                
                $ambil = $koneksi->query("SELECT * FROM metode_pembayaran WHERE id_metode='$idmetode'");
                $arraymetode = $ambil->fetch_assoc();
                $biayaadmin = $arraymetode["biaya_admin"];
                $namametode = $arraymetode["nama_metode"];
                $totalbiayaadmin = $biayaadmin * $totalbayar;
                $totalkeseluruhan = $totalbiayaadmin + $totalbayar;
                
                // menyimpan data ke tabel pembelian
                $koneksi->query("INSERT INTO pembelian(id_pelanggan, waktu_pembelian, total_pembelian, id_metode, nama_metode, totalbiayametode)
                                VALUES ('$idpelanggan','$waktu','$totalkeseluruhan','$idmetode','$namametode','$totalbiayaadmin')");
                
            
                //id pembelian tadi
                $id_pembelian_tadi = $koneksi->insert_id;

                foreach($_SESSION["keranjang"] as $id_produk => $jumlah)
                {
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $perakun = $ambil->fetch_assoc();
                    $namaakun = $perakun["nama_akun"];
                    $hargaakun = $perakun["harga_akun"];
                    $kategori = $perakun["kategori_akun"];
                    $userakun = $perakun["user_akun"];
                    $passakun = $perakun["pass_akun"];

                    $koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,nama_akun,harga_akun,user_akun,pass_akun,kategori_akun,jumlah)
                    VALUES('$id_pembelian_tadi','$id_produk','$namaakun','$hargaakun','$userakun','$passakun','$kategori','$jumlah')");
                    
                                   
                 }

                 //keranjang kosong
                   unset($_SESSION["keranjang"]);

                //balik ke nota
                echo "<script>alert('Pembelian Sukses');</script>";
                echo "<script>location='nota.php?id=$id_pembelian_tadi';</script>";

             }
             
             ?>
        </div>
    </div>
</body>
</html>