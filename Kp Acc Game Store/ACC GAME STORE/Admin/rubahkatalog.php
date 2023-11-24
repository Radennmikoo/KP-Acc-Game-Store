<link href='Admin.css' rel='stylesheet' type='text/css' />
<h1>Rubah Katalog</h1>
<?php 
error_reporting(0);
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoakun = $pecah['foto_akun'];
?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
	   <label>Nama Akun</label>
	   <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_akun']?>">
	</div>
    <div class="form-group">
       <label>Harga (Rp)</label>
       <input type="number" class="form-control" name="harga" value="<?php echo$pecah['harga_akun'] ?>">
    </div>
    <div class="form-group">
      <label>Username Akun Game</label>
      <input type="text" class="form-control" name="user" value="<?php echo$pecah['user_akun'] ?>" >
   </div>
   <div class="form-group">
      <label>Password Akun Game</label>
      <input type="text" class="form-control" name="pass" value="<?php echo$pecah['pass_akun'] ?>">
   </div>
    <div class="from-group">
       <select class="form-control" name="id_kategori" required>
       <option value="">Pilih Kategori Akun</option>  
       <?php 
         $ambil = $koneksi->query("SELECT * FROM kategori_akun");
         while ($perkategori = $ambil->fetch_assoc()){ ?>                  
            <option value="<?php echo $perkategori["id_kategori"] ?>">
            <?php echo $perkategori['nama_kategori']?>
            </option> 
     <?php } ?>
    </select>
    </div>
    <div class="form-group">
       <label>Deskripsi Akun</label>
       <textarea class="form-control" name="deskripsi" rows="10"><?php echo$pecah['deskripsi_akun']; ?></textarea>
    </div>
      <div class="form-group">
    	<img src="../FotoAkun/<?php echo$pecah['foto_akun'] ?>" width="200">
    </div>
    <div class="form-group">
       <label>Ganti Foto Akun</label>
       <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="rubah">Rubah Katalog</button>
</form>

<?php 
if (isset($_POST['rubah'])) 
{  
   $id_kategori = $_POST['id_kategori'];

   $ambil =  $koneksi->query("SELECT * FROM kategori_akun WHERE id_kategori='$id_kategori'");
   $pika = $ambil->fetch_assoc();
   $namakategori = $pika["nama_kategori"];

	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	//kalo foto nya dirubah
	if (!empty($lokasifoto))
    {
		move_uploaded_file($lokasifoto,"../FotoAkun/$namafoto");

		$koneksi->query("UPDATE produk SET nama_akun='$_POST[nama]',harga_akun='$_POST[harga]',idkategori_akun='$_POST[id_kategori]',deskripsi_akun='$_POST[deskripsi]',
			foto_akun='$namafoto',nama_kategori='$namakateogri',user_akun='$_POST[user]',pass_akun='$_POST[pass]' WHERE id_produk='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_akun='$_POST[nama]',harga_akun='$_POST[harga]',idkategori_akun='$_POST[id_kategori]',deskripsi_akun='$_POST[deskripsi]',nama_kategori='$namakategori',user_akun='$_POST[user]',pass_akun='$_POST[pass]' 
			WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert(Katalog Telah Berubah) ;</script>";
	echo "<script>location='katalog.php'</script>";
}
?>