<?php 
session_start();
require 'function.php';
$ambil = query("SELECT * FROM produk WHERE stok_akun > 0 AND idkategori_akun = '2'");

if (isset($_POST["cari"])) 
{
    $ambil = cari($_POST["search"]);
}
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="navbar.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <title>Kategori Action</title>
</head>
<body>
<!-- navbar -->
<?php include 'navbarnosearch.php' ?>
<!-- isi -->
<section class="konten">
	<div class="container">
		<h1>Kategori Akun : Action </h1><br> 
		<div class="row">
			<?php foreach ($ambil as $perproduk ) : ?>
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="FotoAkun/<?php echo $perproduk['foto_akun'];?>" alt="">
					<div class="caption">
						<h3><?php echo $perproduk['nama_akun']; ?></h3>
						<h5>Stok Akun : <?php echo $perproduk['stok_akun']; ?></h5>
						<h5>Rp. <?php echo number_format($perproduk['harga_akun']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" onclick="return confirm('Anda Yakin ?');" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-info">Detail</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>	
		
		</div>
	</div>
</section>
</section>
</div>
</body>
</html>