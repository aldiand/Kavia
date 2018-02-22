-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Feb 2018 pada 10.43
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bbb`
--

CREATE TABLE `t_bbb` (
  `id` int(11) NOT NULL,
  `nama_bahan_baku` varchar(30) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
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
  `id_overhead` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bp_masuk`
--

CREATE TABLE `t_bp_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_bahan_penolong` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_btkl`
--

CREATE TABLE `t_btkl` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` varchar(5) NOT NULL,
  `jam_keluar` varchar(5) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_coa`
--

CREATE TABLE `t_coa` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_coa`
--

INSERT INTO `t_coa` (`id`, `kode`, `nama`, `active`) VALUES
(2, '112', 'Persediaan BB', 1),
(3, '511', 'Gaji dan Upah', 1),
(7, '111', 'Kas', 1),
(8, '512', 'BDP - BBB', 1),
(9, '513', 'BDP - BTKL', 1),
(10, '514', 'BDP - BBP', 1),
(11, '113', 'Persediaan BP', 1),
(12, '211', 'Utang Dagang', 1),
(13, '212', 'Pendapatan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurnal`
--

CREATE TABLE `t_jurnal` (
  `id` int(11) NOT NULL,
  `kode_akun` int(11) NOT NULL,
  `reff` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `posisi` varchar(1) NOT NULL,
  `nominal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_overhead`
--

CREATE TABLE `t_overhead` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga_per_bulan` int(11) NOT NULL,
  `dibebankan_per_produksi` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
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
  `no_telp` varchar(15) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengerjaan`
--

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

CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `pesanan` varchar(30) NOT NULL,
  `deskripsi_pesanan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kesulitan` varchar(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produksi`
--

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
-- Indeks untuk tabel `t_bahan_penolong`
--
ALTER TABLE `t_bahan_penolong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `t_bbb`
--
ALTER TABLE `t_bbb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bbb` (`id_bbb`);

--
-- Indeks untuk tabel `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produksi` (`id_produksi`),
  ADD KEY `id_bbb` (`id_bbb`);

--
-- Indeks untuk tabel `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bahan_penolong` (`id_bahan_penolong`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `t_bop`
--
ALTER TABLE `t_bop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_overhead` (`id_overhead`),
  ADD KEY `id_overhead_2` (`id_overhead`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `t_bp_masuk`
--
ALTER TABLE `t_bp_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_btkl`
--
ALTER TABLE `t_btkl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_produksi` (`id_produksi`);

--
-- Indeks untuk tabel `t_coa`
--
ALTER TABLE `t_coa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_jurnal`
--
ALTER TABLE `t_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_overhead`
--
ALTER TABLE `t_overhead`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `t_produksi`
--
ALTER TABLE `t_produksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_bahan_penolong`
--
ALTER TABLE `t_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_bbb`
--
ALTER TABLE `t_bbb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_bb_masuk`
--
ALTER TABLE `t_bb_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_bb_terpakai`
--
ALTER TABLE `t_bb_terpakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_biaya_bahan_penolong`
--
ALTER TABLE `t_biaya_bahan_penolong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_bop`
--
ALTER TABLE `t_bop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_bp_masuk`
--
ALTER TABLE `t_bp_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_btkl`
--
ALTER TABLE `t_btkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `t_coa`
--
ALTER TABLE `t_coa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_jurnal`
--
ALTER TABLE `t_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `t_overhead`
--
ALTER TABLE `t_overhead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_pengerjaan`
--
ALTER TABLE `t_pengerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_produksi`
--
ALTER TABLE `t_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
