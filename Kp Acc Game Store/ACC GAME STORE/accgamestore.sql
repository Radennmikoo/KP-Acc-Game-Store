-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2023 pada 10.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accgamestore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_admin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'Kamisato', '180427', 'ALIF FAKIH ARRASYID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_akun`
--

CREATE TABLE `kategori_akun` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_akun`
--

INSERT INTO `kategori_akun` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Open World'),
(2, 'Action\r\n'),
(3, 'Turn Base');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(225) NOT NULL,
  `nama_metode` varchar(225) NOT NULL,
  `biaya_admin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `nama_metode`, `biaya_admin`) VALUES
(1, 'Dana', 0.5),
(2, 'Gojek', 0.17),
(3, 'Ovo', 0.4),
(4, 'pulsa', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(225) NOT NULL,
  `password_pelanggan` varchar(225) NOT NULL,
  `nama_pelanggan` varchar(225) NOT NULL,
  `telpon_pelanggan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telpon_pelanggan`) VALUES
(1, 'montod64@gmail.com', '180427', 'ALIF FAKIH ARRASYIID', '087878921441'),
(2, 'Alisha@gmail.com', '180427', 'Alisha Mikhailovna Kujou', '087878921441'),
(3, 'KianaKaslana@gmail.com', '180427', 'Kiana Kaslana', '087878921441');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(225) NOT NULL,
  `waktu_pembelian` timestamp NULL DEFAULT NULL,
  `total_pembelian` int(225) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `nama_metode` varchar(225) NOT NULL,
  `totalbiayametode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `waktu_pembelian`, `total_pembelian`, `id_metode`, `nama_metode`, `totalbiayametode`) VALUES
(1, 2, '2023-11-24 09:29:42', 180000, 1, 'Dana', 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(225) NOT NULL,
  `id_produk` int(225) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `harga_akun` int(225) NOT NULL,
  `user_akun` varchar(225) NOT NULL,
  `pass_akun` varchar(225) NOT NULL,
  `kategori_akun` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `nama_akun`, `harga_akun`, `user_akun`, `pass_akun`, `kategori_akun`, `jumlah`) VALUES
(1, 1, 2, 'Akun Genshin Impact Server Asia Ar 56', 120000, 'Focari2', 'sama1010', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_akun` varchar(225) NOT NULL,
  `harga_akun` int(225) NOT NULL,
  `foto_akun` varchar(225) NOT NULL,
  `deskripsi_akun` varchar(225) NOT NULL,
  `idkategori_akun` varchar(225) NOT NULL,
  `user_akun` varchar(225) NOT NULL,
  `pass_akun` varchar(225) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL,
  `stok_akun` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_akun`, `harga_akun`, `foto_akun`, `deskripsi_akun`, `idkategori_akun`, `user_akun`, `pass_akun`, `nama_kategori`, `stok_akun`) VALUES
(1, 'Akun Genshin Impact Server Asia Ar 35', 70000, 'Gambar WhatsApp 2023-11-17 pukul 21.06.49_da10b0ba.jpg', 'Hutao X Zhongli Perfect Team', '1', 'FocariSweet1', 'sama1010', 'Open World', 1),
(2, 'Akun Genshin Impact Server Asia Ar 56', 120000, 'Cuplikan layar 2023-11-19 123523.png', 'Cakep Nih Akun ', '1', 'Focari2', 'sama1010', 'Open World', 1),
(3, 'Akun Honkai Impact Level 75 Server Asia', 70000, 'Gambar WhatsApp 2023-11-18 pukul 15.16.04_6a9af3a4.jpg', 'Char b5: Asuka signet Full (4/4)Log Via User F2p', '2', 'Miaw34', 'sama100', 'Action\r\n', 1),
(4, 'Akun One Piece Bounty Rush Level 69', 20000, 'Cuplikan layar 2023-11-24 135456.png', 'HERO :Hb 60 Can up\r\nGood med,Good Support\r\nGf utuh\r\nStrong bf\r\n209 Total Hero\r\nNo Hack Exp\r\nHero Extreme : 6\r\n1.Zoro Oni :MAX\r\n2.Luffy Nika:MAX\r\n3.Gol D Roger:MAX\r\n4.Sakazuki Akainu:MAX\r\n5.Kaido Deff:MAX\r\n6.Monkey D Luffy ex ', '2', 'Zkjhilhka', 'sama1010', 'Action\r\n', 1),
(5, 'Akun Honkai Star Rail Server Asia Tl 70', 1200000, 'Cuplikan layar 2023-11-19 153818.png', 'All Unset\r\nPity 70 rate off, jade 5k+\r\nEvent baru belum kesentuh\r\nDPS udah well build\r\nEsp on 100+ days', '3', 'Sepuh', 'sama1010', 'Turn Base', 1),
(6, 'Akun Genshin Impact Ar 56 Server Asia', 160000, 'Cuplikan layar 2023-11-20 190147.png', '2 archon (zhongli furina) \r\nPRICE? 170RIBH (NEPIS) \r\n6limit 1sign\r\n4standar (DILUC, TIGNARI, DEHYA, QIQI C1) \r\nTotal b5 ada 10\r\n', '1', 'Kiana2007', 'Sama1010', 'Open World', 1),
(7, 'Akun Honkai Impact Level 80 Server Asia', 400000, 'Cuplikan layar 2023-11-20 190819.png', 'HoFi (1/4) \r\nHoO (2/4) \r\nHoF (4/4) ber cosu\r\nHoR SS (4/4) equipment baru\r\nCrono Nova (4/4) \r\nPardo Fel (3/4 ) bercosu\r\nPE (1/4) weapon\r\nHoS (3/4) weap lama\r\nstarry impression (4/4) \r\nBansos anniv belum diambil\r\nRetunee on (bi', '2', 'AkunOld', 'Sama3030', 'Action\r\n', 1),
(8, 'Akun Genshin Impact Server Asia Ar 59', 700000, 'Cuplikan layar 2023-11-24 140024.png', 'Heroes: Venti, childe, albedo, ganyu, hutao, eula, ayaka, shenhe, ayato, qiqi [c2], mona, jean, diluc, keqing [c1]\r\nSenjata : Skyward Blade (r2),skyward harp, skyward pride, amos bow, mitsplitter, elegy for the end,\r\nTambahan', '1', 'saetwe53', 'Niudijoef', 'Open World', 1),
(9, 'Akun Honkai Star Rail Server Asia Tl 68', 300000, 'Cuplikan layar 2023-11-24 140546.png', '14 SSR ( 9 limit)\r\nHarga 9R / 900k ex mm siap reff\r\nRate off Pity, Jade 8k++ tiket emas 45\r\nEsp on\r\nDps dah pada well build\r\nEvent baru kelar\r\ndetail char : \r\nkafka + sign (sudah build new relic) \r\nsilverwolf + sign\r\nhimeko e', '3', 'erwr3q', 'Ewing123', 'Turn Base', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori_akun`
--
ALTER TABLE `kategori_akun`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_akun`
--
ALTER TABLE `kategori_akun`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
