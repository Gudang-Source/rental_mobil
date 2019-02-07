-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jan 2019 pada 13.32
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pembayaran`
--

CREATE TABLE `riwayat_pembayaran` (
  `id_riwayat_pembayaran` int(225) NOT NULL,
  `id_minimarket` int(225) NOT NULL,
  `nama` text NOT NULL,
  `ttl_harga` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_pembayaran`
--

INSERT INTO `riwayat_pembayaran` (`id_riwayat_pembayaran`, `id_minimarket`, `nama`, `ttl_harga`) VALUES
(3, 2, 'Aduy I', 52500),
(7, 1, 'Aduy I', 102500),
(8, 1, 'Aduy I', 102500),
(9, 2, 'Aduy I', 1002000),
(10, 3, 'Aduy I', 501000),
(11, 2, 'Aduy I', 702000),
(12, 2, 'Aduy I', 3502000),
(13, 1, 'Aduy I', 102500),
(14, 3, 'Aduy I', 501000),
(15, 2, 'Aduy I', 302000),
(16, 1, 'Aduy I', 102500),
(17, 1, 'Aduy I', 202500),
(18, 1, 'Aduy I', 102500),
(19, 1, 'Aduy I', 402500),
(20, 1, 'Aduy I', 402500),
(21, 1, 'Aduy I', 1002500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_rental`
--

CREATE TABLE `riwayat_rental` (
  `id_riwayat` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `ttl_harga` int(11) NOT NULL,
  `denda` bigint(100) NOT NULL,
  `id_minimarket` int(11) NOT NULL,
  `kode_pembayaran` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_rental`
--

INSERT INTO `riwayat_rental` (`id_riwayat`, `id_rental`, `id_user`, `no_polisi`, `tgl_rental`, `tgl_kembali`, `ttl_harga`, `denda`, `id_minimarket`, `kode_pembayaran`, `status`) VALUES
(41, 49, 3, '123', '2019-01-25', '2019-01-26', 102500, 0, 1, 'YM0814578965221', '1'),
(42, 50, 3, '123', '2019-01-25', '2019-01-26', 102500, 0, 1, 'YM0814578965222', '0'),
(43, 51, 3, '1', '2019-01-25', '2019-01-26', 502500, 0, 1, 'YM0814578965221', '0'),
(44, 1, 3, '1', '2019-01-25', '2019-01-27', 1000000, 0, 1, 'YM0814578965221', '0'),
(45, 3, 3, '1', '2019-01-25', '2019-01-26', 500000, 0, 0, '', '1'),
(46, 3, 3, '1', '2019-01-25', '2019-01-26', 500000, 0, 0, '', '1'),
(47, 5, 3, '12', '2019-01-25', '2019-01-26', 100000, 0, 0, '', '1'),
(48, 5, 3, '12', '2019-01-25', '2019-01-26', 100000, 0, 0, '', '1'),
(49, 4, 3, '123', '2019-01-25', '2019-01-26', 102500, 0, 1, 'YM0814578965221', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_minimarket`
--

CREATE TABLE `tbl_minimarket` (
  `id_minimarket` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `minimarket` varchar(20) NOT NULL,
  `kode_minimarket` varchar(2) NOT NULL,
  `harga` int(11) NOT NULL,
  `saldo` bigint(255) NOT NULL,
  `hak_akses` enum('3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_minimarket`
--

INSERT INTO `tbl_minimarket` (`id_minimarket`, `username`, `password`, `minimarket`, `kode_minimarket`, `harga`, `saldo`, `hak_akses`) VALUES
(1, 'yudamart', 'yudamart', 'YudaMart', 'YM', 2500, 50000, '3'),
(2, 'purwamart', 'purwamart', 'PurwaMart', 'PM', 2000, 10000, '3'),
(3, 'indomart', 'indomart', 'IndoMart', 'IM', 1000, 2000, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `no_polisi` varchar(15) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `foto_mobil` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `hrg_sewa` int(11) NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`no_polisi`, `merk`, `jenis`, `foto_mobil`, `keterangan`, `hrg_sewa`, `status`) VALUES
('1', 'Honda', 'Yahama', '21012019094513_mobil1.jpg', 'WARNA: PUTIH,\r\nKAPASITAS: 4 ORANG', 500000, '0'),
('12', 'Yamaha', 'honda', '24012019020357_3y9ov.jpg', 'ini bomil', 100000, '0'),
('123', 'Honda', 'Mobilio', '21012019094519_mobil2.jpg', 'WARNA: MERAH,\r\nKAPASITAS: 2 ORANG', 100000, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_notifikasi`
--

CREATE TABLE `tbl_notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_notifikasi`
--

INSERT INTO `tbl_notifikasi` (`id_notifikasi`, `id_user`, `id_rental`, `judul`, `isi`, `status`) VALUES
(114, 3, 51, 'MOBIL Yahama Honda ini hampir menjadi pinjamanmu', 'lanjutkan pembayaran peminjaman dari keranjang pada tanggal 2019-01-24 01:02:54', '1'),
(115, 3, 51, 'Ayo Selesaikan Pembayaranmu!', 'Selesaikan Pembayaran Untuk Transaksi YM0814578965221 sebelum 2019-01-24 07:33:06', '1'),
(120, 3, 51, 'Pembayaran sudah expired :(', 'Pembayaran di gagalkan dikarenakan kamu kehabisan waktu :( ', '0'),
(121, 3, 1, 'MOBIL Yahama Honda ini hampir menjadi pinjamanmu', 'lanjutkan pembayaran peminjaman dari keranjang pada tanggal 2019-01-24 02:06:16', '0'),
(122, 3, 2, 'MOBIL Yahama Honda ini hampir menjadi pinjamanmu', 'lanjutkan pembayaran peminjaman dari keranjang pada tanggal 2019-01-24 02:08:12', '0'),
(123, 3, 1, 'Ayo Selesaikan Pembayaranmu!', 'Selesaikan Pembayaran Untuk Transaksi YM0814578965221 sebelum 2019-01-24 08:41:21', '0'),
(124, 3, 1, 'Peminjaman mobil telah di tolak oleh admin', 'kami mohon maaf kepada user di karenakan ada problem pada mobil yang anda pinjam', '0'),
(125, 3, 3, 'Peminjaman mobil telah di setujui oleh admin', 'peminjaman mobil di mulai dari tanggal 2019-01-25 dan selesai pada tanggal 2019-01-26', '1'),
(126, 3, 3, 'Pengembalian mobil telah berhasil', 'terima kasih telah melakukan peminjaman mobil di rental mobil kami', '1'),
(127, 3, 4, 'MOBIL Mobilio Honda ini hampir menjadi pinjamanmu', 'lanjutkan pembayaran peminjaman dari keranjang pada tanggal 2019-01-24 02:29:14', '0'),
(128, 3, 4, 'Ayo Selesaikan Pembayaranmu!', 'Selesaikan Pembayaran Untuk Transaksi YM0814578965221 sebelum 2019-01-24 08:59:23', '0'),
(129, 3, 3, 'Peminjaman mobil telah di setujui oleh admin', 'peminjaman mobil di mulai dari tanggal 2019-01-25 dan selesai pada tanggal 2019-01-26', '0'),
(130, 3, 3, 'Pengembalian mobil telah berhasil', 'terima kasih telah melakukan peminjaman mobil di rental mobil kami', '0'),
(131, 3, 5, 'Pengembalian mobil telah berhasil', 'terima kasih telah melakukan peminjaman mobil di rental mobil kami', '0'),
(132, 3, 4, 'Pembayaran sudah expired :(', 'Pembayaran di gagalkan dikarenakan kamu kehabisan waktu :( ', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `id_rental` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `tgl_rental` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `waktu_pembayaran` varchar(100) NOT NULL,
  `ttl_harga` int(11) NOT NULL,
  `input_saldo_user` bigint(100) NOT NULL,
  `id_minimarket` int(11) NOT NULL,
  `kode_pembayaran` text NOT NULL,
  `status` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rental`
--

INSERT INTO `tbl_rental` (`id_rental`, `id_user`, `no_polisi`, `tgl_rental`, `tgl_kembali`, `waktu_pembayaran`, `ttl_harga`, `input_saldo_user`, `id_minimarket`, `kode_pembayaran`, `status`) VALUES
(2, 3, '1', '2019-01-26', '2019-01-27', '', 500000, 0, 0, '', '1'),
(6, 3, '123', '2019-01-25', '2019-01-26', '', 100000, 100000, 0, '', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_kk` varchar(100) NOT NULL,
  `saldo` bigint(255) NOT NULL,
  `hak_akses` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `alamat`, `no_hp`, `foto_ktp`, `foto_kk`, `saldo`, `hak_akses`) VALUES
(1, 'superadmin', 'c3VwZXJhZG1pbg==', 'Purwa Sabrang', 'Citayam', '081283854955', '15112018154526_images (1).jpg', '15112018154526_tgb_2010__813_.png', 11800000, '0'),
(2, 'admin', 'YWRtaW4=', 'Fitra Aduy', 'Bogor', '081382811207', '18112018173237_maxresdefault.jpg', '18112018173249_windows_10_wallpaper_red_grey_by_spectalfrag-d9661v6.jpg', 0, '1'),
(3, 'member', 'bWVtYmVy', 'Aduy I', 'Deket Rumah I', '081457896522', '18112018174335_maxresdefault.jpg', '18112018174355_windows_10_wallpaper_red_grey_by_spectalfrag-d9661v6.jpg', 800000, '2'),
(4, 'b', 'YmI=', 'bbb', 'bbbb', '2', '18112018151412_mobil1.jpg', '15112018153829_ktp_1.jpg', 0, '0'),
(5, 'test', 'dGVzdA==', 'tester', 'cibinong', '081319792059', '08012019055644_1.jpg', '08012019055644_4VWSF7l.jpg', 0, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  ADD PRIMARY KEY (`id_riwayat_pembayaran`);

--
-- Indexes for table `riwayat_rental`
--
ALTER TABLE `riwayat_rental`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tbl_minimarket`
--
ALTER TABLE `tbl_minimarket`
  ADD PRIMARY KEY (`id_minimarket`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`no_polisi`);

--
-- Indexes for table `tbl_notifikasi`
--
ALTER TABLE `tbl_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  MODIFY `id_riwayat_pembayaran` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `riwayat_rental`
--
ALTER TABLE `riwayat_rental`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_minimarket`
--
ALTER TABLE `tbl_minimarket`
  MODIFY `id_minimarket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notifikasi`
--
ALTER TABLE `tbl_notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
