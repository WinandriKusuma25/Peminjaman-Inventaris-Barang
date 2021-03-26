-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 12:27 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_kominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `stok`, `image`) VALUES
(1, 'LCD', 2, 'lcd.png'),
(2, 'Layar Proyektor', 2, 'layar_proyektor1.jpg'),
(3, 'Kabel UTP', 9, 'utp.png'),
(4, 'Router', 3, 'router.jpg'),
(7, 'Speaker', 2, 'speker1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`id_dinas`, `nama_dinas`) VALUES
(3, 'Dinas Komunikasi dan Informatika'),
(4, 'Dinas Pariwisata'),
(5, 'Dinas Lingkungan Hidup'),
(6, 'Satpol PP'),
(7, 'Dinas Pertanian'),
(8, 'Dinas Kesehatan'),
(9, 'Dinas Perhubungan'),
(10, 'Dinas Pemadam Kebakaran'),
(11, 'Dinas PUPR Bina Marga'),
(14, 'Dinas Ketahanan Pangan'),
(17, 'Dinas Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_peminjaman` enum('diajukan','disetujui','ditolak') NOT NULL,
  `status_pengembalian` enum('sudah','belum','tidak ada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_barang`, `tgl_peminjaman`, `tgl_kembali`, `jumlah`, `keterangan`, `status_peminjaman`, `status_pengembalian`) VALUES
(69, 8, 1, '2021-03-23', '2021-03-24', 1, 'Untuk rapat bulanan', 'diajukan', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(1) NOT NULL,
  `is_active` enum('aktif','pasif') NOT NULL,
  `date_created` int(11) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `id_dinas`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`, `no_telp`) VALUES
(4, 'Admin Kominfo', 3, 'winandrikusuma27@gmail.com', 'default1.png', '$2y$10$Q0/qYfgvQ6F1uhXPBR.MHuh.aTei5D92fq46IuwCZED5Zai.mfhla', 1, 'aktif', 1604837683, '083832356747'),
(8, 'fandi zahiradana', 6, 'fandi.zahiradana@gmail.com', 'avatar2.png', '$2y$10$/NST2DhalV4YLkMXPum24uvg3LupxHBfQy4qLl/N/WclToZmbmvq.', 2, 'aktif', 1610359986, '087654321121'),
(11, 'ade chandra', 4, 'ade.cand.jr@gmail.com', 'default.png', '$2y$10$VhrHNjmsgH57ulVZSR2gpueizWYf8X7m5FGlGL.d3gKVA3l42ae82', 2, 'aktif', 1610634268, '085761234123'),
(21, 'naufal', 17, 'naufalyudhistira12@gmail.com', 'default.png', '$2y$10$F0Rm4ax9r0Ohl0TMx.esXOkchLFX0pc.u/sw05cmKyK7x65G4Y3Te', 2, 'pasif', 1615265944, '0'),
(23, 'Iqbal Arifudin', 4, 'mochiqbalarifudin@gmail.com', 'default.png', '$2y$10$vI8Fs/myTiP9iV/6z4WLaO/FQS6EycX364EsP3.k3.HRAmG1/Dgqm', 2, 'aktif', 1615377811, '083832298748');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(1, 'narutomimimi@gmail.com', 'nXJmNztJXQyZVSFTEE3i/uFS4R3fBPw5b9gGg9bOvQc=', 1610359846),
(2, 'fandi.zahiradana@gmail.com', 'qhT4LJ+7ypY1fWAKzxzJqUkGEGGUxVC9FyUemTMywLM=', 1610359986),
(3, 'coba2@gmail.com', 'Ptj9+kT8V5IoMshLqIU0zayihCpiIQP3jdnYl4ia+wE=', 1610386221),
(4, 'robert@gmail.com', 'sdFrSUIwStuMInys9qP9XLTsVJP5Z4uH1KyuPU1XYxk=', 1610552184),
(5, 'ade.cand.jr@gmail.com', 'VYO+P+ydVmRCqd8ZF9kuZaHUpd5g78txX19smcjp8X8=', 1610634268),
(6, 'winandrikusuma27@gmail.com', 'Q1TV7ZP9nWyfiNTZA8E9EVPY3eQeYb+o6tsNTHoS3jc=', 1610873986),
(7, 'winandrikusuma27@gmail.com', 'J/lECwMwIJw5SJ9hBMCXO3ddaDYVkxs37kOLnBddmfw=', 1610874232),
(8, 'winandrikusuma27@gmail.com', 'yK7iYglV2Zuh1s/PHt5DzhxVkf2Nfg7yOiBC45NHcZo=', 1610874251),
(9, 'winandrikusuma27@gmail.com', 'O55rIzIrzLcKeHHaYW40/lSm9sU5Bh5F+5p713BCNtc=', 1610874295),
(10, 'albabaihaki12@gmail.com', 'hT3X7ytC4A5DY27qo0Bg9DH70wDLUmweuJlzYOHBrWY=', 1611557711),
(20, 'naufalyudhistira12@gmail.com', 'Dt366jdJpwtkFwhYjue9MAffPTtOR9DsBPaYa91pAsg=', 1615265944),
(21, 'winandrikusuma27@gmail.com', 'i/ieXfkGuuX+/Wlp2GeW6QpL/icofK3L1vWOyzP+oO4=', 1615289449),
(22, 'winandrikusuma27@gmail.com', 'qKJuLPnb1u9Z35noNFayX2Jdkgmj/Yf6BJ2RHCZXC1M=', 1615289502),
(23, 'winandrikusuma27@gmail.com', 'VzbCu5toNr66ekwtKKLYvVICiq0LWwirY0kPeTLqrCM=', 1615289613),
(25, 'winandrikusuma27@gmail.com', 'IEPHm6UHvqNlSKkHpkIEgx0BEiIXNMIRTfNV/M5xilc=', 1615290623),
(26, 'mochiqbalarifudin@gmail.com', 'KpG2N74xqBThgJLQCiEpxJrunEYZPKCv6uuA41pkwc0=', 1615377811),
(27, 'winandrikusuma27@gmail.com', 'q20qIqWuowignK1EETmR5IF1GEPqZdUIsYn7GjR+ZX0=', 1615461774),
(28, 'winandrikusuma27@gmail.com', 'eJaZuOZZ9HqehiraUyNKorDrGBqNPiBEUN8hEOA6UC8=', 1616403099),
(29, 'winandrikusuma27@gmail.com', 'AkiYpgyCjbfuUwpSlezpjn7Uf/FPuYxEIqBiMmiM3lQ=', 1616403247);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_dinas` (`id_dinas`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_dinas`) REFERENCES `dinas` (`id_dinas`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
