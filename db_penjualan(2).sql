-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jan 2018 pada 15.08
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

DROP TABLE IF EXISTS `t_bahan_penolong`;
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

DROP TABLE IF EXISTS `t_bbb`;
CREATE TABLE `t_bbb` (
  `id` int(11) NOT NULL,
  `nama_bahan_baku` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bb_masuk`
--

DROP TABLE IF EXISTS `t_bb_masuk`;
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

DROP TABLE IF EXISTS `t_bb_terpakai`;
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

DROP TABLE IF EXISTS `t_biaya_bahan_penolong`;
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

DROP TABLE IF EXISTS `t_bop`;
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

DROP TABLE IF EXISTS `t_btkl`;
CREATE TABLE `t_btkl` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` int(2) NOT NULL,
  `jam_keluar` int(2) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_overhead`
--

DROP TABLE IF EXISTS `t_overhead`;
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

DROP TABLE IF EXISTS `t_pegawai`;
CREATE TABLE `t_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tipe_gaji` varchar(15) NOT NULL,
  `gaji` int(11) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengerjaan`
--

DROP TABLE IF EXISTS `t_pengerjaan`;
CREATE TABLE `t_pengerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `status` int(1) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesanan`
--

DROP TABLE IF EXISTS `t_pesanan`;
CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `pesanan` varchar(30) NOT NULL,
  `deskripsi_pesanan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_kisaran` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_pesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produksi`
--

DROP TABLE IF EXISTS `t_produksi`;
CREATE TABLE `t_produksi` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL,
  `id_pesanan` int(11) NOT NULL
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
-- Indexes for table `t_btkl`
--
ALTER TABLE `t_btkl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_produksi` (`id_produksi`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_bbb`
--
ALTER TABLE `t_bbb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_bop`
--
ALTER TABLE `t_bop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_btkl`
--
ALTER TABLE `t_btkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_overhead`
--
ALTER TABLE `t_overhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_produksi`
--
ALTER TABLE `t_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  ADD CONSTRAINT `t_bb_masuk_ibfk_1` FOREIGN KEY (`id_bbb`) REFERENCES `t_bbb` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  ADD CONSTRAINT `t_bb_terpakai_ibfk_1` FOREIGN KEY (`id_bbb`) REFERENCES `t_bbb` (`id`),
  ADD CONSTRAINT `t_bb_terpakai_ibfk_2` FOREIGN KEY (`id_produksi`) REFERENCES `t_produksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  ADD CONSTRAINT `t_biaya_bahan_penolong_ibfk_1` FOREIGN KEY (`id_bahan_penolong`) REFERENCES `t_bahan_penolong` (`id`),
  ADD CONSTRAINT `t_biaya_bahan_penolong_ibfk_2` FOREIGN KEY (`id_produksi`) REFERENCES `t_produksi` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_bop`
--
ALTER TABLE `t_bop`
  ADD CONSTRAINT `t_bop_ibfk_1` FOREIGN KEY (`id_overhead`) REFERENCES `t_overhead` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_btkl`
--
ALTER TABLE `t_btkl`
  ADD CONSTRAINT `t_btkl_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `t_pegawai` (`id`),
  ADD CONSTRAINT `t_btkl_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `t_pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD CONSTRAINT `t_produksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `t_pesanan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
