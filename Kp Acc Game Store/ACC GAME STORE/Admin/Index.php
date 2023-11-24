<?php
 session_start();
 $koneksi = new mysqli("localhost","root","","accgamestore");

  if (!isset($_SESSION['admin'])) 
  {
   echo "<script>alert('Anda Harus Login);</script>";
   echo "<script>location='login.php';</script>";
   header('location:login.php');
   exit();
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acc Game Store</title>
    <link rel="icon" type="image/x-icon" href="assets/img/replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <li><a href="pelanggan.php" style='font-size:20px;'><i class="bx bx-game"></i> Data Pelanggan</a></li>
                    <li><a href="pembelian.php" style='font-size:20px;'><i class="bx bx-envelope"></i> Data Pembelian</a></li>
                    <li><a href="index.php?halaman=logout" style='font-size:20px;' onclick="return confirm('Anda Yakin ?');" ><i class="bx bx-door-open"></i> Logout</a></li>
              
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
           
                <?php
                    if (isset($_GET['halaman'])) 
                    {
                      if ($_GET['halaman']=="detail") 
                      {
                        include 'detail.php';
                      }
                      else if ($_GET['halaman']=="tambahakun") 
                      {
                        include 'tambahakun.php';
                      }
                       else if ($_GET['halaman']=="hapuskatalog") 
                      {
                        include 'hapuskatalog.php';
                      }
                      else if ($_GET['halaman']=="hapuspelanggan") 
                      {
                        include 'hapuspelanggan.php';
                      }
                        else if ($_GET['halaman']=="rubahkatalog") 
                      {
                        include 'rubahkatalog.php';
                      }
                      else if ($_GET['halaman']=="logout") 
                      {
                        include 'logout.php';
                      }
                    }
                     else 
                    {
                        include 'Home.php';
                    }
                ?>
                </div>     
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
