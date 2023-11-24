<?php
session_start();
$koneksi = new mysqli("localhost","root","","accgamestore");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/img/replicate-prediction-rqrgctjbspg4hapusokktikpiu.png"/>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="wrapper">
        <form role="form" method="post">
            <h1>Login Admin</h1>
            <div class="input-box">
                <input type="text" placeholder="Masukan Username" name="user" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Masukan Password" name="pass" required>
                <i class='bx bxs-lock'></i>
            </div>
            <button type="submit" class="btn" name="login" >Login</button>
             
        </form>
          <?php 
          if (isset($_POST['login'])) 
          {
            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]'
            AND password='$_POST[pass]'");
            $yangcocok =$ambil->num_rows;
            if ($yangcocok==1) 
            {
               $_SESSION['admin'] = $ambil->fetch_assoc();
               echo "<script>alert('Login Berhasil Selamat Datang Admin')</script>";
               echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            }
            else {
                echo "<script>alert('Username Atau Password Salah Coba Lagi')</script>";
                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
          }
          ?>
    </div>
</body>
</html>