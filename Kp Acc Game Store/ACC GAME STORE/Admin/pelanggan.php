<link href='Admin.css' rel='stylesheet' type='text/css' />
<?php
 session_start();
 $koneksi = new mysqli("localhost","root","","accgamestore");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acc Game Store</title>
    <link rel="icon" type="image/x-icon" href="assets/img/replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link href='Admin.css' rel='stylesheet' type='text/css' />
</head>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Acc Game Store</a> 
               
            </div>
  
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/replicate-prediction-rqrgctjbspg4hapusokktikpiu.png" class="user-image img-responsive"/>
					</li>
				
					      
                    <li><a href="index.php" style='font-size:20px;'><i class='bx bx-home' ></i>Home</a></li>
                    <li><a href="katalog.php" style='font-size:20px;'><i class="bx bx-purchase-tag" ></i> Data Katalog Produk</a></li>
                    <li><a href="pelanggan.php"  style='font-size:20px;'><i class="bx bx-game"></i> Data Pelanggan</a></li>
                    <li><a href="Pembelian.php" style='font-size:20px;'><i class="bx bx-envelope"></i> Data Pembelian</a></li>
                    <li><a href="index.php?halaman=logout" style='font-size:20px;' onclick="return confirm('Anda Yakin ?');"><i class="bx bx-door-open"></i> Logout</a></li>
              
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <h1>Menu Pelanggan</h1>
<table class="table table-bordered" >
    <thead>
        <tr>
            <th>id pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Email Pelanggan</th>
            <th>No Telpon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
          //koneksi ke database melalui koneksi.php
          // include "koneksi.php";

          //menentukan banyak nya data yang akan ditampilkan dalam 1 halaman
         $koneksi = new mysqli("localhost","root","","accgamestore");

         $batas = 5;
         $halaman = (int) @$_GET['halaman'];
         if(empty($halaman)){
         $posisi     = 0;
         $halaman    = 1;
         }
         else{
         $posisi = ($halaman-1) * $batas;
         }
                    
         $no = $posisi+1;

         //mengambil data dari tabel buku
         $ambildata = mysqli_query($koneksi, "select * from pelanggan order by id_pelanggan limit $posisi,$batas");
         ?>
    <?php while($pecah = mysqli_fetch_array($ambildata)){ ?>
        <tr>
            <td><?php echo $pecah['id_pelanggan']; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            <td><?php echo $pecah['telpon_pelanggan']; ?></td>
            <td>
            <a href="Index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" onclick="return confirm('Anda Yakin ?');" class="btn-danger btn">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
                $query2 = mysqli_query($koneksi, "select * from pelanggan");
                $jumlahdata = mysqli_num_rows($query2);
                $jumlahhalaman = ceil($jumlahdata/$batas);
            ?>
 <nav>
                <ul class="pagination justify-content-center">
                    <?php
                        for($i=1;$i<=$jumlahhalaman;$i++) {
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' href='pelanggan.php?halaman=$i'>$i</a></li>";
                            } 
                            else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                            }
                        }
                    ?>
                </ul>
            </nav>      
            </div>     
                     
            </div>
            
        </div>
       
        </div>
 
    <script src="assets/js/jquery-1.10.2.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
