-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2022 pada 00.04
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
-- Database: `isti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `stand_awal` int(30) NOT NULL,
  `stand_akhir` int(30) NOT NULL,
  `biaya_adm` int(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `status` enum('Belum Lunas','Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `id_pelanggan`, `id_tarif`, `stand_awal`, `stand_akhir`, `biaya_adm`, `tgl_bayar`, `tgl_tempo`, `status`) VALUES
(2, 2, 1, 4000, 5000, 2000, '2022-07-08', '2022-07-30', 'Lunas'),
(3, 2, 2, 3000, 4000, 2000, '2022-07-09', '2022-06-30', 'Lunas'),
(4, 1, 1, 5000, 2000, 2000, '2022-07-30', '2022-06-30', 'Lunas'),
(5, 1, 1, 4000, 300, 3000, '2022-07-10', '2022-07-30', 'Lunas'),
(6, 1, 1, 2000, 3000, 2000, '2022-07-10', '2022-07-30', 'Lunas'),
(0, 1, 1, 334534, 434, 43434, '3333-04-02', '2022-07-30', 'Lunas'),
(0, 1, 2000, 334534, 434, 5000, '2022-07-14', '2022-07-27', 'Lunas'),
(0, 2, 2500, 334534, 434, 5000, '2022-08-05', '2022-07-21', 'Lunas'),
(0, 2, 2500, 334534, 434, 5000, '2022-08-04', '2022-07-27', 'Lunas'),
(0, 2, 2500, 334534, 434, 5000, '2022-07-15', '2022-08-04', 'Lunas'),
(0, 2, 2500, 0, 0, 5000, '2022-07-12', '2022-06-29', 'Lunas'),
(0, 2, 2500, 0, 0, 5000, '2022-07-06', '2022-06-29', 'Lunas'),
(0, 1, 3000, 9, 7, 5000, '2022-07-13', '2022-06-30', 'Lunas'),
(0, 1, 3000, 9, 8, 5000, '2022-07-20', '2022-06-30', 'Lunas'),
(0, 2, 2500, 8, 2, 5000, '2022-07-13', '2022-07-21', 'Lunas'),
(0, 2, 2500, 3, 3, 5000, '2022-07-14', '2022-07-14', 'Lunas'),
(0, 2, 2500, 8, 2, 5000, '2022-07-13', '2022-06-29', 'Lunas'),
(0, 1, 2000, 4, 2, 5000, '2022-07-14', '2022-06-30', 'Belum Lunas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
