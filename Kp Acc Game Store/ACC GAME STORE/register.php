<?php 
include 'function.php';
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="navbar.css" rel="stylesheet" />
<link href="register.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
<?php include 'navbarnosearch.php' ?>
<section class="konten">
   <div class="container">
         <div class="glass">
  <div class="wrapper">
        <form role="form" method="post">
            <h1>Menu Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Masukan Nama Lengkap" name="nama" required><i class='bx bxs-user-circle'></i>
             
            </div>
            <div class="input-box">
                <input type="text" placeholder="Masukan Email" name="email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Masukan Password" name="pass" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="input-box">
                <input type="number" placeholder="Masukan No Telpon" name="notlp" required>
                <i class='bx bxs-phone' ></i>
            </div>
            <button type="submit" class="btn" name="Daftar" >Register</button>
        </form>
        <?php
        if (isset($_POST["Daftar"])) {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $nama = $_POST["nama"];
            $notlp = $_POST["notlp"];

            //akun sudah ada ?  
            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
            $akunSudahAda = $ambil->num_rows;
            if($akunSudahAda==1) {
                echo "<script>alert('Register Gagal Email Sudah Digunakan');</script>";
                echo "<script>location='register.php';</script>";
            }
            else //kalo belom ada yang cocok
            {
                    $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telpon_pelanggan)
                            VALUES ('$email', '$pass', '$nama', '$notlp')");
                      echo "<script>alert('Register Berhasil Silahkan Login');</script>";
                      echo "<script>location='login.php';</script>";
            }
            }
        ?>

          
    </div>
  </div>
    </div>
</section>
</body>
</html>