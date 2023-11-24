<link href='Admin.css' rel='stylesheet' type='text/css' />
<h1>Halaman Detail</h1>

<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
WHERE pembelian.id_pembelian='$_GET[id]'"); 
$detail = $ambil->fetch_assoc()
?>

<h3><strong>Nama Pelanggan : <?php echo $detail['nama_pelanggan']; ?></strong></h3> 
    <p>
                Nomor telpon pelanggan : <?php echo $detail['telpon_pelanggan']; ?> <br>
                Alamat email pelanggan :  <?php echo $detail['email_pelanggan']; ?>
    </p>
    <p> 
                Nama Metode : <?php echo $detail['nama_metode'] ?><br>
                Total Biaya Admin : Rp.<?php echo number_format($detail['totalbiayametode']) ?><br>        
                Tanggal Transaksi : <?php echo $detail['waktu_pembelian']; ?> <br>
    </p>
    <strong>Total Pembayaran : Rp.<?php echo number_format($detail['total_pembelian']); ?><br></strong><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Akun</th>
                <!-- <th>Kategori Akun</th> -->
                <th>Username Akun</th>
                <th>Password Akun</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah ['nama_akun']; ?></th>
                <!-- <td><php echo $pecah ['nama_kategori']; ?></th> -->
                <td><?php echo $pecah ['user_akun']; ?></td>
                <td><?php echo $pecah['pass_akun']; ?></td>
                <td>Rp.<?php echo number_format($pecah ['harga_akun']); ?></th>
                <td><?php echo $pecah ['jumlah']; ?></td>
                <td>Rp.<?php echo number_format($pecah ['harga_akun']*$pecah['jumlah']); ?></td>
            </tr>
            <?php $nomor++ ?>
            <?php } ?>
        </tbody>
      </table>

