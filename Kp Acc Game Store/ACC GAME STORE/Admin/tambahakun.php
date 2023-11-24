<link href='Admin.css' rel='stylesheet' type='text/css' />
<?php 
error_reporting(0);
?>
<h1>Halaman Tambah Akun</h1>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
     <label>Id Akun</label>
     <input type="number" class="form-control" name="id">
  </div>
   <div class="form-group">
     <label>Nama</label>
     <input type="text" class="form-control" name="nama">
   </div>
   <div class="form-group">
     <label>Harga (Rp)</label>
     <input type="number" class="form-control" name="harga">
   </div>
   <div class="form-group">
      <label>Username Akun Game</label>
      <input type="text" class="form-control" name="user">
   </div>
   <div class="form-group">
      <label>Password Akun Game</label>
      <input type="text" class="form-control" name="pass">
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
      <textarea class="form-control" name="deskripsi" rows="10"></textarea>
   </div>
   <div class="form-group">
       <label>Foto Akun</label>
       <input type="file" class="form-control" name="foto">
   </div>
   <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
   $id_kategori = $_POST['id_kategori'];

   $ambil =  $koneksi->query("SELECT * FROM kategori_akun WHERE id_kategori='$id_kategori'");
   $pika = $ambil->fetch_assoc();
   $namakategori = $pika["nama_kategori"];

  $nama =$_FILES['foto']['name'];
  $lokasi =$_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "../FotoAkun/".$nama);
  $koneksi->query("INSERT INTO produk
     (id_produk,nama_akun,harga_akun,foto_akun,deskripsi_akun,idkategori_akun,nama_kategori,user_akun,pass_akun)
     VALUES('$_POST[id]','$_POST[nama]','$_POST[harga]','$nama','$_POST[deskripsi]','$id_kategori','$namakategori','$_POST[user]','$_POST[pass]')");
  
  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=katalog.php'>";
}
 ?>