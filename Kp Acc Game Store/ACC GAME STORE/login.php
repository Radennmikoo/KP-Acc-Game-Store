<?php 
session_start();
include 'function.php';
error_reporting(0);
?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="navbar.css" rel="stylesheet" />
<link href="login.css" rel="stylesheet" />
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACC GAME STORE</title>
    <link rel="icon" type="image/x-icon" href="replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <?php include 'navbarnosearch.php' ?>

  <div class="container">
   <div class="glass">
  <div class="wrapper">
        <form role="form" method="post">
            <h1>Login User</h1>
            <div class="input-box">
                <input type="text" placeholder="Masukan Email" name="email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Masukan Password" name="pass" required>
                <i class='bx bxs-lock'></i>
            </div>

            <button type="submit" class="btn" name="login" >Login</button>
             
            <div class="register-link">
                <p>Tidak punya Akun?<a href="register.php">Register Sekarang</a></p>
            </div>
        </form>
          <?php 
          if (isset($_POST['login'])) 
          {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
        
            //lakukan pemvalidan
            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'
            AND password_pelanggan='$pass'");
            
            $yangcocok =$ambil->num_rows;

            if ($yangcocok==1) 
            {  
               $akun = $ambil->fetch_assoc();
               $_SESSION["pelanggan"] = $akun;
               echo "<script>alert('Login Berhasil Selamat Datang User')</script>";

               //kl keranjang kosong
               if (isset($_SESSION["keranjang"]) && !empty($_SESSION["keranjang"])) {
                echo "<script>location='checkout.php';</script>";
            } else {
                echo "<script>location='riwayat.php';</script>";
            }
            }
            else {
                echo "<script>alert('email Atau Password Salah Coba Lagi')</script>";
                echo "<script>location='login.php';</script>";
            }
          }
          ?>
    </div>
  </div>
  </div>
</body>
</html>