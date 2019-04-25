-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 27 Mar 2019 pada 18.47
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `komplain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `nama`, `telepon`, `komplain`) VALUES
('KP0314', 'Jajang Kacau', '0812409743', 'testing asdasd asd asd asda'),
('KP8924', 'Mamat Rencok', '08428520135', 'oaiw jdawidwaduoiwaduoiawdjoiawjd iowajd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(6) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `telepon`, `alamat`, `status`) VALUES
('PL1067', 'awdwadwadaw', '2147483647', 'sdasdasd', 'Non-aktif'),
('PL2376', 'Andrew Johnson', '0812123121', 'awdawdawdawdaw', 'Aktif'),
('PL9149', 'Afrian Hanafi', '08129013580', 'Blok M, Jakarta Selatan', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemasangan`
--

CREATE TABLE `status_pemasangan` (
  `id_sp` varchar(10) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `status_pemasangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_pemasangan`
--

INSERT INTO `status_pemasangan` (`id_sp`, `id_pelanggan`, `status_pemasangan`) VALUES
('SP1938', 'PL2376', 'Tidak Dapat Diproses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `status_pemasangan`
--
ALTER TABLE `status_pemasangan`
  ADD PRIMARY KEY (`id_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
