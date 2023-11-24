<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<?php
$koneksi = new mysqli("localhost", "root", "", "accgamestore");
error_reporting(0);
function query($query) {
    global $koneksi;
    $ambil = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($ambil)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($search){
    $query = "SELECT * FROM produk
              WHERE 
              (nama_akun LIKE '%$search%' OR
               harga_akun LIKE '%$search%')
              AND stok_akun > 0
              ";

    $result = query($query);

    if(empty($result)){
        echo "<script>alert('Akun Yang Dicari Tidak Tersedia');</script>";
        echo "<script>location='index.php';</script>";
    }

    return $result;
}



?>