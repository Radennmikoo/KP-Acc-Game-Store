<nav>
    <header class="header">
        <input type="checkbox" name="" id="chiki" >
        <div class="logo"><h1>ACC GAME STORE</h1></div>
        <div class="search-box">
            <form action="" method="post">
                <input type="text" name="search"id="srch" placeholder="Search" autocomplete="off" >
                <button type="submit" name="cari"><i class='bx bx-search'></i></button>
            </form>
        </div>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#">Kategori Akun</a>
               <ul class="dropdown">
                    <li><a href="openworld.php">Open World</a></li>
                    <li><a href="action.php">Action</a></li>
                    <li><a href="turnbase.php">Turn Base</a></li>
               </ul>
            </li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="riwayat.php">Riwayat</a></li>
            <li><a href="checkout.php">Checkout</a></li>
                <!-- jika sudah login -->
                <?php if(isset($_SESSION["pelanggan"])): ?>
                <li><a href="logout.php" onclick="return confirm('Anda Yakin ?');">Logout</a></li>
            <!-- Kalo belum -->
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </header>
</nav>