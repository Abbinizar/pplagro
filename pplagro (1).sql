-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Des 2017 pada 22.36
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pplagro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('larasaprs@gmail.com', 'd88b74e052be34f2933c3b157f5ede9145cc239f4496a81dcf729e04ee35ced7', '2017-11-18 23:47:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemantauan`
--

CREATE TABLE `pemantauan` (
  `id_pemantauan` int(3) NOT NULL,
  `id_pembayaran` int(3) NOT NULL,
  `bobot` int(3) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `statusinvestasi` enum('Belum Selesai','Selesai') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemantauan`
--

INSERT INTO `pemantauan` (`id_pemantauan`, `id_pembayaran`, `bobot`, `kondisi`, `statusinvestasi`, `updated_at`, `created_at`) VALUES
(3, 1, 100, 'sfsdfds', 'Belum Selesai', '2017-12-03 13:25:17', '2017-12-03 13:25:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(3) NOT NULL,
  `id_rekening` int(3) NOT NULL,
  `id_pengajuan` int(3) NOT NULL,
  `status_bayar` enum('belum bayar','lunas') NOT NULL,
  `buktitransfer` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_rekening`, `id_pengajuan`, `status_bayar`, `buktitransfer`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 'lunas', '1512330648.jpg', '2017-12-03 13:06:09', '2017-12-03 12:50:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(3) NOT NULL,
  `id_ternak` int(3) NOT NULL,
  `id_investor` int(3) NOT NULL,
  `id_roi` int(1) NOT NULL,
  `total` int(10) NOT NULL,
  `status` enum('Menunggu Persetujuan','Disetujui','Ditolak') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_ternak`, `id_investor`, `id_roi`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 36, 3, 247000, 'Ditolak', '2017-12-03 17:28:03', '2017-12-03 18:10:00'),
(2, 2, 36, 3, 247000, 'Disetujui', '2017-12-03 18:24:18', '2017-12-03 19:50:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(1) NOT NULL,
  `namaBank` enum('BNI','BCA','MANDIRI','BRI') NOT NULL,
  `atasnama` varchar(15) NOT NULL,
  `norekening` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `namaBank`, `atasnama`, `norekening`, `updated_at`, `created_at`) VALUES
(1, 'MANDIRI', 'Laras April', '100091', '2017-12-01 12:32:47', '0000-00-00 00:00:00'),
(2, 'BNI', 'Dwiky Bagas R', '190013131411113', '2017-11-25 12:41:09', '0000-00-00 00:00:00'),
(3, 'MANDIRI', 'Laras', '1454534', '2017-12-01 18:24:18', '2017-12-01 18:24:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roi`
--

CREATE TABLE `roi` (
  `id_roi` int(1) NOT NULL,
  `jangka_waktu` int(3) NOT NULL,
  `asuransi` int(10) NOT NULL,
  `pakan` int(10) NOT NULL,
  `rawat` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roi`
--

INSERT INTO `roi` (`id_roi`, `jangka_waktu`, `asuransi`, `pakan`, `rawat`, `updated_at`, `created_at`) VALUES
(1, 3, 100000, 3000000, 400000, '2017-12-02 12:26:48', '0000-00-00 00:00:00'),
(2, 6, 1000000, 6000000, 800000, '2017-12-02 12:00:20', '0000-00-00 00:00:00'),
(3, 9, 1000, 10000, 30000, '2017-12-02 05:00:43', '2017-12-02 05:00:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak`
--

CREATE TABLE `ternak` (
  `id_ternak` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jenisHewan` enum('sapi perah','sapi bali','Sapi simental') NOT NULL,
  `harga` int(15) NOT NULL,
  `bobot` int(4) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  `status` enum('belum terjual','terjual') NOT NULL DEFAULT 'belum terjual',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ternak`
--

INSERT INTO `ternak` (`id_ternak`, `id_user`, `foto`, `jenisHewan`, `harga`, `bobot`, `umur`, `lokasi`, `deskripsi`, `status`, `updated_at`, `created_at`) VALUES
(2, 35, '1512322019.jpg', 'sapi bali', 90000, 10, '10', 'Jalan Raya, Jember', 'Besar', 'belum terjual', '2017-12-04 00:26:59', '2017-12-04 00:26:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` enum('Peternak','Investor','Admin') NOT NULL DEFAULT 'Peternak',
  `nohp` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `status`, `nohp`, `email`, `created_at`, `updated_at`) VALUES
(31, 'admin kita', '', '$2y$10$h2yhGe3OXe1werZ.MmG7N.9CHaZFz5PmY7V5Wfn/cD35MUuLJiNmm', 'zZITWsUhlhUt6VytXSWY7VQ98QUGbmgktqjNLT7PRm3JwSf4pa3A8QL5ZfLk', 'Admin', NULL, 'admin@gmail.com', '2017-11-27 10:29:02', '2017-12-03 13:44:33'),
(35, 'laras', '', '$2y$10$MDF/ZmkSp3J25HgVMxm6oe8W8TnMSn1wetiTtqDDTmTm7dFbq/9i.', 'J1rTJffMP3BrY1Yw1u8t97MENejmLQCgaRzFQggifU5hjA7YkIQVCA3r3OiX', 'Peternak', 900, 'larasapril@gmail.com', '2017-12-03 07:14:26', '2017-12-03 13:48:42'),
(36, 'regio', '', '$2y$10$PA3E4E7lP0pPLxCH7LZEJetW2USxyAWs7pfgqDkJeCDghsKUeXoSO', 'UizFnZ6dsFOVJfytuVg7ipmCn2eIXVR2TXGCXNam23vngIz2Yr6BVb220uli', 'Investor', 9900, 'regio@gmail.com', '2017-12-03 09:38:23', '2017-12-03 13:47:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pemantauan`
--
ALTER TABLE `pemantauan`
  ADD PRIMARY KEY (`id_pemantauan`),
  ADD KEY `id_bayar` (`id_pembayaran`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_investor`),
  ADD KEY `id_ternak` (`id_ternak`),
  ADD KEY `id_roi` (`id_roi`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `roi`
--
ALTER TABLE `roi`
  ADD PRIMARY KEY (`id_roi`);

--
-- Indexes for table `ternak`
--
ALTER TABLE `ternak`
  ADD PRIMARY KEY (`id_ternak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemantauan`
--
ALTER TABLE `pemantauan`
  MODIFY `id_pemantauan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roi`
--
ALTER TABLE `roi`
  MODIFY `id_roi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ternak`
--
ALTER TABLE `ternak`
  MODIFY `id_ternak` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemantauan`
--
ALTER TABLE `pemantauan`
  ADD CONSTRAINT `pemantauan_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_rekening`) REFERENCES `rekening` (`id_rekening`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_investor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`id_ternak`) REFERENCES `ternak` (`id_ternak`),
  ADD CONSTRAINT `pengajuan_ibfk_4` FOREIGN KEY (`id_roi`) REFERENCES `roi` (`id_roi`);

--
-- Ketidakleluasaan untuk tabel `ternak`
--
ALTER TABLE `ternak`
  ADD CONSTRAINT `ternak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
