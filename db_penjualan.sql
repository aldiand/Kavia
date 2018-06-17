-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2018 at 11:45 AM
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

--
-- Dumping data for table `t_bahan_penolong`
--

INSERT INTO `t_bahan_penolong` (`id`, `sid`, `nama`, `satuan`, `jumlah`, `harga`, `active`, `last_active`) VALUES
(7, 'BP1', 'cat', 'kaleng', 3, 150000, 0, '2018-05-15'),
(8, 'BP1', 'cat', 'kaleng', 0, 150000, 0, '2018-05-24'),
(9, 'BP2', 'paku', 'kg', 0, 30000, 0, '2018-05-24'),
(10, 'BP2', 'paku', 'kg', 65, 30000, 1, NULL),
(11, 'BP1', 'cat', 'kaleng', 180, 150000, 1, NULL);

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

--
-- Dumping data for table `t_bbb`
--

INSERT INTO `t_bbb` (`id`, `sid`, `nama_bahan_baku`, `satuan`, `jumlah`, `harga`, `active`, `last_active`) VALUES
(15, 'BB1', 'kayu jati', 'pcs', 2, 400000, 0, '2018-05-09'),
(16, 'BB1', 'kayu jati', 'pcs', 2, 40000, 0, '2018-05-09'),
(17, 'BB1', 'kayu jati', 'pcs', 0, 400000, 0, '2018-05-24'),
(18, 'bb2', 'Japlaywood - 122x244 - 9ml', 'lembar', 20, 185, 0, '2018-05-15'),
(19, 'bb2', 'Japlaywood - 122x244 - 9ml', 'lembar', 1, 183, 0, '2018-05-24'),
(20, 'BBKP', 'kayu pinus', 'pcs', 200, 4000000, 1, NULL),
(21, 'bb2', 'Japlaywood - 122x244 - 9ml', 'lembar', 0, 183000, 1, NULL),
(22, 'BB1', 'kayu jati', 'pcs', 30, 600000, 1, NULL);

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

--
-- Dumping data for table `t_bb_masuk`
--

INSERT INTO `t_bb_masuk` (`id`, `sid`, `tanggal`, `jumlah`, `harga_beli`, `id_bbb`, `last_active`) VALUES
(1, NULL, '2018-05-15', 1, 2000, 19, NULL),
(2, NULL, '2018-06-09', 50, 400000, 22, NULL);

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

--
-- Dumping data for table `t_bb_terpakai`
--

INSERT INTO `t_bb_terpakai` (`id`, `sid`, `tanggal`, `jumlah`, `id_bbb`, `id_produksi`, `last_active`) VALUES
(4, NULL, '2018-05-09', 1, 17, 15, NULL),
(5, NULL, '2018-05-15', 20, 19, 16, NULL),
(6, NULL, '2018-05-15', 1, 17, 16, NULL),
(7, NULL, '2018-05-26', 10, 22, 17, NULL),
(8, NULL, '2018-06-09', 1, 21, 18, NULL),
(9, NULL, '2018-06-09', 10, 22, 19, NULL),
(10, NULL, '2018-06-16', 10, 22, 21, NULL);

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

--
-- Dumping data for table `t_biaya_bahan_penolong`
--

INSERT INTO `t_biaya_bahan_penolong` (`id`, `sid`, `tanggal`, `jumlah`, `id_bahan_penolong`, `id_produksi`, `last_active`) VALUES
(4, NULL, '2018-05-09', 1, 7, 15, NULL),
(5, NULL, '2018-05-15', 2, 9, 16, NULL),
(6, NULL, '2018-05-15', 2, 8, 16, NULL),
(7, NULL, '2018-05-26', 10, 11, 17, NULL),
(8, NULL, '2018-05-26', 30, 10, 17, NULL),
(9, NULL, '2018-06-09', 5, 10, 18, NULL),
(10, NULL, '2018-06-09', 5, 11, 19, NULL),
(11, NULL, '2018-06-16', 5, 11, 21, NULL);

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

--
-- Dumping data for table `t_bp_masuk`
--

INSERT INTO `t_bp_masuk` (`id`, `sid`, `tanggal`, `jumlah`, `id_bahan_penolong`, `harga_beli`, `last_active`) VALUES
(1, NULL, '2018-05-15', 1, 7, 1000, NULL);

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

--
-- Dumping data for table `t_btkl`
--

INSERT INTO `t_btkl` (`id`, `sid`, `tanggal`, `jam_masuk`, `jam_keluar`, `id_pegawai`, `id_produksi`, `last_active`) VALUES
(30, NULL, '2018-05-09', '04:07', '04:09', 8, 15, NULL),
(31, NULL, '2018-05-09', '04:07', '04:09', 8, 15, NULL),
(32, NULL, '2018-05-09', '04:07', '04:09', 8, 15, NULL),
(33, NULL, '2018-05-15', '05:23', '05:26', 8, 16, NULL),
(34, NULL, '2018-05-15', '05:23', '05:26', 9, 16, NULL),
(35, NULL, '2018-05-26', '05:25', '', 9, 17, NULL),
(36, NULL, '2018-06-09', '02:22', '', 8, 18, NULL),
(37, NULL, '2018-06-09', '02:25', '', 9, 19, NULL),
(38, NULL, '2018-06-09', '02:27', '', 9, 20, NULL),
(39, NULL, '2018-06-09', '02:27', '', 8, 20, NULL),
(40, NULL, '2018-06-16', '06:10', '', 8, 21, NULL),
(41, NULL, '2018-06-16', '06:10', '', 9, 21, NULL);

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
(3, NULL, '511', 'Gaji dan Upah', 1, NULL),
(7, NULL, '111', 'Kas', 1, NULL),
(10, NULL, '514', 'BDP - BBP', 1, NULL),
(11, NULL, '113', 'Persediaan BP', 1, NULL),
(12, NULL, '211', 'Utang Dagang', 1, NULL),
(13, NULL, '212', 'Pendapatan', 1, NULL),
(14, NULL, '213', 'Pendapatan Diterima Dimuka', 1, NULL),
(15, NULL, '214', 'Piutang Dagang', 1, NULL),
(16, NULL, '411', 'Penjualan', 1, NULL),
(17, NULL, '114', 'Persedian Barang Jadi', 1, NULL),
(19, NULL, '513', 'BDP = BTKL', 1, NULL),
(20, NULL, '512 ', 'BDP = BBB', 1, NULL);

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

--
-- Dumping data for table `t_jurnal`
--

INSERT INTO `t_jurnal` (`id`, `sid`, `kode_akun`, `reff`, `tanggal`, `posisi`, `nominal`, `last_active`) VALUES
(95, NULL, 211, '11', '2018-05-09', 'd', 200000, NULL),
(96, NULL, 213, '11', '2018-05-09', 'c', 200000, NULL),
(97, NULL, 512, '4', '2018-05-09', 'd', 400000, NULL),
(98, NULL, 112, '4', '2018-05-09', 'c', 400000, NULL),
(99, NULL, 514, '4', '2018-05-09', 'd', 150000, NULL),
(100, NULL, 113, '4', '2018-05-09', 'c', 150000, NULL),
(101, NULL, 513, '30', '2018-05-09', 'd', 50000, NULL),
(102, NULL, 511, '30', '2018-05-09', 'c', 50000, NULL),
(103, NULL, 513, '31', '2018-05-09', 'd', 50000, NULL),
(104, NULL, 511, '31', '2018-05-09', 'c', 50000, NULL),
(105, NULL, 513, '32', '2018-05-09', 'd', 50000, NULL),
(106, NULL, 511, '32', '2018-05-09', 'c', 50000, NULL),
(107, NULL, 111, '11', '2018-05-09', 'd', 642400, NULL),
(108, NULL, 214, '11', '2018-05-09', 'c', 642400, NULL),
(109, NULL, 113, '1', '2018-05-15', 'd', 1000, NULL),
(110, NULL, 111, '1', '2018-05-15', 'c', 1000, NULL),
(111, NULL, 111, '12', '2018-05-15', 'd', 1000000, NULL),
(112, NULL, 213, '12', '2018-05-15', 'c', 1000000, NULL),
(113, NULL, 512, '5', '2018-05-15', 'd', 3660, NULL),
(114, NULL, 112, '5', '2018-05-15', 'c', 3660, NULL),
(115, NULL, 512, '6', '2018-05-15', 'd', 400000, NULL),
(116, NULL, 112, '6', '2018-05-15', 'c', 400000, NULL),
(117, NULL, 514, '5', '2018-05-15', 'd', 60000, NULL),
(118, NULL, 113, '5', '2018-05-15', 'c', 60000, NULL),
(119, NULL, 514, '6', '2018-05-15', 'd', 300000, NULL),
(120, NULL, 113, '6', '2018-05-15', 'c', 300000, NULL),
(121, NULL, 513, '33', '2018-05-15', 'd', 75000, NULL),
(122, NULL, 511, '33', '2018-05-15', 'c', 75000, NULL),
(123, NULL, 513, '34', '2018-05-15', 'd', 112500, NULL),
(124, NULL, 511, '34', '2018-05-15', 'c', 112500, NULL),
(125, NULL, 111, '12', '2018-05-15', 'd', 150992, NULL),
(126, NULL, 214, '12', '2018-05-15', 'c', 150992, NULL),
(127, NULL, 112, '1', '2018-05-15', 'd', 2000, NULL),
(128, NULL, 111, '1', '2018-05-15', 'c', 2000, NULL),
(129, NULL, 111, '13', '2018-05-24', 'd', 1000000, NULL),
(130, NULL, 213, '13', '2018-05-24', 'c', 1000000, NULL),
(131, NULL, 512, '7', '2018-05-26', 'd', 6000000, NULL),
(132, NULL, 112, '7', '2018-05-26', 'c', 6000000, NULL),
(133, NULL, 514, '7', '2018-05-26', 'd', 1500000, NULL),
(134, NULL, 113, '7', '2018-05-26', 'c', 1500000, NULL),
(135, NULL, 514, '8', '2018-05-26', 'd', 900000, NULL),
(136, NULL, 113, '8', '2018-05-26', 'c', 900000, NULL),
(137, NULL, 214, '13', '2018-05-26', 'd', 10243800, NULL),
(138, NULL, 111, '13', '2018-05-26', 'c', 10243800, NULL),
(139, NULL, 213, '13', '2018-05-26', 'c', 1000000, NULL),
(140, NULL, 111, '13', '2018-05-26', 'd', 9243800, NULL),
(141, NULL, 411, '13', '2018-05-26', 'c', 9243800, NULL),
(142, NULL, 214, '13', '2018-05-26', 'd', 10243800, NULL),
(143, NULL, 111, '13', '2018-05-26', 'c', 10243800, NULL),
(144, NULL, 213, '13', '2018-05-26', 'c', 1000000, NULL),
(145, NULL, 111, '13', '2018-05-26', 'd', 9243800, NULL),
(146, NULL, 411, '13', '2018-05-26', 'c', 9243800, NULL),
(147, NULL, 214, '13', '2018-05-26', 'd', 10243800, NULL),
(148, NULL, 111, '13', '2018-05-26', 'c', 10243800, NULL),
(149, NULL, 213, '13', '2018-05-26', 'c', 1000000, NULL),
(150, NULL, 111, '13', '2018-05-26', 'd', 9243800, NULL),
(151, NULL, 411, '13', '2018-05-26', 'c', 9243800, NULL),
(152, NULL, 214, '13', '2018-05-26', 'd', 10243800, NULL),
(153, NULL, 111, '13', '2018-05-26', 'c', 10243800, NULL),
(154, NULL, 213, '13', '2018-05-26', 'c', 1000000, NULL),
(155, NULL, 111, '13', '2018-05-26', 'd', 9243800, NULL),
(156, NULL, 411, '13', '2018-05-26', 'c', 9243800, NULL),
(157, NULL, 111, '14', '2018-05-26', 'd', 0, NULL),
(158, NULL, 213, '14', '2018-05-26', 'c', 0, NULL),
(159, NULL, 111, '15', '2018-06-09', 'd', 500000, NULL),
(160, NULL, 213, '15', '2018-06-09', 'c', 500000, NULL),
(161, NULL, 512, '8', '2018-06-09', 'd', 183000, NULL),
(162, NULL, 112, '8', '2018-06-09', 'c', 183000, NULL),
(163, NULL, 514, '9', '2018-06-09', 'd', 150000, NULL),
(164, NULL, 113, '9', '2018-06-09', 'c', 150000, NULL),
(165, NULL, 112, '2', '2018-06-09', 'd', 20000000, NULL),
(166, NULL, 111, '2', '2018-06-09', 'c', 20000000, NULL),
(167, NULL, 512, '9', '2018-06-09', 'd', 6000000, NULL),
(168, NULL, 112, '9', '2018-06-09', 'c', 6000000, NULL),
(169, NULL, 514, '10', '2018-06-09', 'd', 750000, NULL),
(170, NULL, 113, '10', '2018-06-09', 'c', 750000, NULL),
(171, NULL, 214, '15', '2018-06-09', 'd', 9014400, NULL),
(172, NULL, 111, '15', '2018-06-09', 'c', 9014400, NULL),
(173, NULL, 213, '15', '2018-06-09', 'c', 500000, NULL),
(174, NULL, 111, '15', '2018-06-09', 'd', 8514400, NULL),
(175, NULL, 411, '15', '2018-06-09', 'c', 8514400, NULL),
(176, NULL, 111, '16', '2018-06-16', 'd', 500000, NULL),
(177, NULL, 213, '16', '2018-06-16', 'c', 500000, NULL),
(178, NULL, 512, '10', '2018-06-16', 'd', 6000000, NULL),
(179, NULL, 112, '10', '2018-06-16', 'c', 6000000, NULL),
(180, NULL, 514, '11', '2018-06-16', 'd', 750000, NULL),
(181, NULL, 113, '11', '2018-06-16', 'c', 750000, NULL),
(182, NULL, 214, '16', '2018-06-16', 'd', 9042150, NULL),
(183, NULL, 111, '16', '2018-06-16', 'c', 9042150, NULL),
(184, NULL, 213, '16', '2018-06-16', 'c', 500000, NULL),
(185, NULL, 111, '16', '2018-06-16', 'd', 8542150, NULL),
(186, NULL, 411, '16', '2018-06-16', 'c', 8542150, NULL),
(187, NULL, 111, '17', '2018-06-17', 'd', 1000000, NULL),
(188, NULL, 213, '17', '2018-06-17', 'c', 1000000, NULL);

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
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_overhead`
--

INSERT INTO `t_overhead` (`id`, `sid`, `nama`, `harga_per_bulan`, `dibebankan_per_produksi`, `active`, `last_active`) VALUES
(3, 'BP1', 'listrik', 100000, 2000, 0, NULL),
(4, 'BP2', 'telfon', 300000, 6000, 0, NULL),
(5, 'BOP2', 'telfon', 300000, 6000, 1, NULL),
(6, 'BOP1', 'listrik', 100000, 2000, 1, NULL),
(7, 'BTO', 'telfon', 500000, 10000, 1, NULL),
(8, 'BT2', 'air', 1000000, 0, 0, NULL);

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
  `no_telp` varchar(15) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `last_active` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`id`, `sid`, `nama_pegawai`, `alamat`, `tipe_gaji`, `gaji`, `no_telp`, `active`, `last_active`) VALUES
(8, 'BT1', 'aceng', 'jdsuarhfuwebfjkl', 'btkl', 50000, '08328493849', 1, NULL),
(9, 'BT2', 'cecep', 'jisufiehiurf', 'btkl', 75000, '0898342858', 1, NULL),
(10, 'P23', 'anang', 'sukabirus no.1', 'tetap', 3000000, '082116787374', 1, NULL);

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

--
-- Dumping data for table `t_pesanan`
--

INSERT INTO `t_pesanan` (`id`, `sid`, `nama_pemesan`, `alamat`, `no_telp`, `pesanan`, `deskripsi_pesanan`, `sifat_pemesanan`, `jumlah`, `kesulitan`, `dp`, `status`, `tanggal_pesanan`, `tanggal_selesai`, `last_active`) VALUES
(11, NULL, 'sarah', 'sukabirus no 28', 812674839, 'meja', 'meja warna coklat', 'perorangan', 1, 'mudah', 200000, 2, '2018-05-09', '2018-05-09', NULL),
(12, NULL, 'lila', 'jln gatot subroto', 84623726, 'mudah', 'dekorasi kamar', 'perorangan', 1, 'sedang', 1000000, 2, '2018-05-15', '2018-05-15', NULL),
(13, NULL, 'irfan', 'pesbal b6 no.2', 2147483647, 'mudah', 'kitchen set', 'perorangan', 1, 'sedang', 1000000, 2, '2018-05-24', '2018-05-26', NULL),
(15, NULL, 'fini', 'perum baros', 2147483647, 'meja', 'meja makan kayu jati', 'perorangan', 1, 'sedang', 500000, 2, '2018-06-09', '2018-06-09', NULL),
(16, NULL, 'sarah', 'kecubung 6', 2147483647, 'lemari', 'lemari warna putih dengan kaca', 'perorangan', 1, 'sedang', 500000, 2, '2018-06-16', '2018-06-16', NULL),
(17, NULL, 'All corp', 'sukapura', 81324325, 'Meja', 'meja untuk project', 'project', 500, 'sedang', 1000000, 0, '2018-06-17', '0000-00-00', NULL);

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
-- Dumping data for table `t_produksi`
--

INSERT INTO `t_produksi` (`id`, `sid`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `status`, `id_pesanan`, `last_active`) VALUES
(15, NULL, '2018-05-09', '2018-05-09', 'membuat meja', 2, 11, NULL),
(16, NULL, '2018-05-15', '2018-05-15', 'membuat project', 2, 12, NULL),
(17, NULL, '2018-05-24', '2018-05-26', 'membuat interior', 2, 13, NULL),
(18, NULL, '2018-06-09', '2018-06-09', 'membuat meja', 2, 15, NULL),
(19, NULL, '2018-06-09', '2018-06-09', 'membuat meja', 2, 15, NULL),
(20, NULL, '2018-06-09', '2018-06-09', 'finishing', 2, 15, NULL),
(21, NULL, '2018-06-16', '2018-06-16', 'membuat lemari', 2, 16, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_btkl`
--
ALTER TABLE `t_btkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `t_coa`
--
ALTER TABLE `t_coa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `t_jurnal`
--
ALTER TABLE `t_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `t_overhead`
--
ALTER TABLE `t_overhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
