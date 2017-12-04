-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Des 2017 pada 11.55
-- Versi Server: 10.1.13-MariaDB
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
-- Struktur dari tabel `t_bahan_penolong`
--

CREATE TABLE `t_bahan_penolong` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bbb`
--

CREATE TABLE `t_bbb` (
  `id` int(11) NOT NULL,
  `nama_bahan_baku` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bb_masuk`
--

CREATE TABLE `t_bb_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `id_bbb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bb_terpakai`
--

CREATE TABLE `t_bb_terpakai` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_bbb` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_biaya_bahan_penolong`
--

CREATE TABLE `t_biaya_bahan_penolong` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_bahan_penolong` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bop`
--

CREATE TABLE `t_bop` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_overhead` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_btkl`
--

CREATE TABLE `t_btkl` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` int(2) NOT NULL,
  `jam_keluar` int(2) NOT NULL,
  `total_jam` int(2) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_overhead`
--

CREATE TABLE `t_overhead` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tipe_gaji` varchar(15) NOT NULL,
  `gaji` int(11) NOT NULL,
  `no_telp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengerjaan`
--

CREATE TABLE `t_pengerjaan` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` int(11) NOT NULL,
  `alamat` int(11) NOT NULL,
  `pesanan` varchar(30) NOT NULL,
  `deskripsi_pesanan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_kisaran` int(11) NOT NULL,
  `tanggal_estimasi` date NOT NULL,
  `dp` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_pesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produksi`
--

CREATE TABLE `t_produksi` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi` text NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bahan_penolong`
--
ALTER TABLE `t_bahan_penolong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bbb`
--
ALTER TABLE `t_bbb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_bop`
--
ALTER TABLE `t_bop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_btkl`
--
ALTER TABLE `t_btkl`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_bahan_penolong`
--
ALTER TABLE `t_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bbb`
--
ALTER TABLE `t_bbb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_bop`
--
ALTER TABLE `t_bop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_btkl`
--
ALTER TABLE `t_btkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_overhead`
--
ALTER TABLE `t_overhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_produksi`
--
ALTER TABLE `t_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
