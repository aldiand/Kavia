-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 02:00 AM
-- Server version: 5.7.18
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_bahan_penolong`
--

CREATE TABLE `t_bahan_penolong` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bbb`
--

CREATE TABLE `t_bbb` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `nama_bahan_baku` varchar(30) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bb_masuk`
--

CREATE TABLE `t_bb_masuk` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `id_bbb` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bb_terpakai`
--

CREATE TABLE `t_bb_terpakai` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_bbb` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_biaya_bahan_penolong`
--

CREATE TABLE `t_biaya_bahan_penolong` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_bahan_penolong` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bop`
--

CREATE TABLE `t_bop` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_overhead` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bp_masuk`
--

CREATE TABLE `t_bp_masuk` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_bahan_penolong` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_btkl`
--

CREATE TABLE `t_btkl` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` varchar(5) NOT NULL,
  `jam_keluar` varchar(5) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_coa`
--

CREATE TABLE `t_coa` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_coa`
--

INSERT INTO `t_coa` (`id`, `sid`, `kode`, `nama`, `active`, `last_active`) VALUES
(2, NULL, '112', 'Persediaan BB', 1, NULL),
(3, NULL, '511', 'Beban Upah', 1, NULL),
(7, NULL, '111', 'Kas', 1, NULL),
(10, NULL, '514', 'BDP - BBP', 1, NULL),
(11, NULL, '113', 'Persediaan BP', 1, NULL),
(12, NULL, '211', 'Utang Dagang', 1, NULL),
(13, NULL, '212', 'Pendapatan', 1, NULL),
(14, NULL, '213', 'Pendapatan Diterima Dimuka', 1, NULL),
(15, NULL, '214', 'Piutang Dagang', 1, NULL),
(16, NULL, '411', 'Penjualan', 1, NULL),
(17, NULL, '114', 'Persedian Barang Jadi', 1, NULL),
(19, NULL, '513', 'BDP -BTK', 1, NULL),
(20, NULL, '512 ', 'BDP - BBB', 1, NULL),
(21, NULL, '215', 'Pembelian', 1, NULL),
(22, NULL, '515', 'BTKTL', 1, NULL),
(23, NULL, '516', 'BDP - BOP', 1, NULL),
(24, NULL, '216', 'HPP', 1, NULL),
(25, NULL, '311', 'Beban Listrik', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_jurnal`
--

CREATE TABLE `t_jurnal` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `kode_akun` int(11) NOT NULL,
  `reff` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `posisi` varchar(1) NOT NULL,
  `nominal` float NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_overhead`
--

CREATE TABLE `t_overhead` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `harga_per_bulan` int(11) NOT NULL,
  `dibebankan_per_produksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_overhead`
--

INSERT INTO `t_overhead` (`id`, `sid`, `nama`, `harga_per_bulan`, `dibebankan_per_produksi`, `jumlah`, `active`, `last_active`) VALUES
(3, 'BP1', 'listrik', 100000, 2000, 0, 0, NULL),
(4, 'BP2', 'telfon', 300000, 6000, 0, 0, NULL),
(5, 'BOP2', 'telfon', 300000, 6000, 0, 0, NULL),
(6, 'BOP1', 'listrik', 100000, 2000, 0, 0, NULL),
(7, 'BTO', 'telfon', 500000, 10000, 0, 0, NULL),
(8, 'BT2', 'air', 1000000, 0, 0, 0, NULL),
(9, 'BOP1', 'listrik', 100000, 10000, 0, 1, NULL),
(10, 'zzz', 'zzz', 2222222, 444444, 2222222, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tipe_gaji` varchar(15) NOT NULL,
  `gaji` int(11) NOT NULL,
  `beban_gaji` int(11) NOT NULL DEFAULT '0',
  `no_telp` varchar(15) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pengerjaan`
--

CREATE TABLE `t_pengerjaan` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `nama` varchar(11) NOT NULL,
  `status` int(1) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `pesanan` varchar(30) NOT NULL,
  `deskripsi_pesanan` text NOT NULL,
  `sifat_pemesanan` varchar(15) NOT NULL DEFAULT 'perorangan',
  `jumlah` int(11) NOT NULL,
  `kesulitan` varchar(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_produksi`
--

CREATE TABLE `t_produksi` (
  `id` int(11) NOT NULL,
  `sid` varchar(30) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bahan_penolong`
--
ALTER TABLE `t_bahan_penolong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `t_bbb`
--
ALTER TABLE `t_bbb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bbb` (`id_bbb`);

--
-- Indexes for table `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produksi` (`id_produksi`),
  ADD KEY `id_bbb` (`id_bbb`);

--
-- Indexes for table `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bahan_penolong` (`id_bahan_penolong`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indexes for table `t_bop`
--
ALTER TABLE `t_bop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_overhead` (`id_overhead`),
  ADD KEY `id_overhead_2` (`id_overhead`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indexes for table `t_bp_masuk`
--
ALTER TABLE `t_bp_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_btkl`
--
ALTER TABLE `t_btkl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indexes for table `t_coa`
--
ALTER TABLE `t_coa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jurnal`
--
ALTER TABLE `t_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_overhead`
--
ALTER TABLE `t_overhead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_bahan_penolong`
--
ALTER TABLE `t_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_bbb`
--
ALTER TABLE `t_bbb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_bop`
--
ALTER TABLE `t_bop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bp_masuk`
--
ALTER TABLE `t_bp_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_btkl`
--
ALTER TABLE `t_btkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `t_coa`
--
ALTER TABLE `t_coa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `t_jurnal`
--
ALTER TABLE `t_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT for table `t_overhead`
--
ALTER TABLE `t_overhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `t_produksi`
--
ALTER TABLE `t_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  ADD CONSTRAINT `t_bb_masuk_ibfk_1` FOREIGN KEY (`id_bbb`) REFERENCES `t_bbb` (`id`);

--
-- Constraints for table `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  ADD CONSTRAINT `t_bb_terpakai_ibfk_1` FOREIGN KEY (`id_bbb`) REFERENCES `t_bbb` (`id`),
  ADD CONSTRAINT `t_bb_terpakai_ibfk_2` FOREIGN KEY (`id_produksi`) REFERENCES `t_produksi` (`id`);

--
-- Constraints for table `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  ADD CONSTRAINT `t_biaya_bahan_penolong_ibfk_1` FOREIGN KEY (`id_bahan_penolong`) REFERENCES `t_bahan_penolong` (`id`),
  ADD CONSTRAINT `t_biaya_bahan_penolong_ibfk_2` FOREIGN KEY (`id_produksi`) REFERENCES `t_produksi` (`id`);

--
-- Constraints for table `t_bop`
--
ALTER TABLE `t_bop`
  ADD CONSTRAINT `t_bop_ibfk_1` FOREIGN KEY (`id_overhead`) REFERENCES `t_overhead` (`id`);

--
-- Constraints for table `t_btkl`
--
ALTER TABLE `t_btkl`
  ADD CONSTRAINT `t_btkl_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_pegawai` (`id`),
  ADD CONSTRAINT `t_btkl_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `t_pegawai` (`id`);

--
-- Constraints for table `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD CONSTRAINT `t_produksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `t_pesanan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
