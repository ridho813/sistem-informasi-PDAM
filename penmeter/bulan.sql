-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2022 pada 11.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isti1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `id_pelanggan` varchar(31) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `biaya_adm` int(30) NOT NULL,
  `stand_awal` varchar(23) NOT NULL,
  `stand_akhir` varchar(23) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `status` enum('Belum Lunas','Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `id_pelanggan`, `id_tarif`, `biaya_adm`, `stand_awal`, `stand_akhir`, `tgl_bayar`, `tgl_tempo`, `status`) VALUES
(10, '2', 3, 2000, '0', '0', '2022-07-05', '2022-07-30', 'Lunas'),
(11, '1', 2500, 2222, '5000', '', '2022-07-14', '2022-07-30', 'Belum Lunas'),
(12, '2', 2500, 5000, '2', '5000', '2022-07-13', '2022-06-30', 'Belum Lunas'),
(13, '1', 2000, 5000, '1', '5000', '2022-07-13', '2022-06-29', 'Belum Lunas'),
(16, '3', 3000, 5000, '6', '8', '2022-07-06', '2022-07-05', 'Belum Lunas'),
(17, '3', 3000, 5000, '6', '8', '2022-07-20', '2022-06-30', 'Belum Lunas'),
(18, '3', 3000, 5000, '6', '8', '2022-07-12', '2022-06-30', 'Belum Lunas'),
(19, '3', 3000, 5000, '6', '8', '2022-07-12', '2022-07-11', 'Belum Lunas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
