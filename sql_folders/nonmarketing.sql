-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2019 pada 16.10
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nonmarketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain_nonmarket`
--

CREATE TABLE `komplain_nonmarket` (
  `nama` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `komplain` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain_nonmarket`
--

INSERT INTO `komplain_nonmarket` (`nama`, `no_telp`, `alamat`, `paket`, `komplain`) VALUES
('Nero Chaniago', '088899912', 'dsnksdskdn', 'qqww', 'wqmmqwmwmwmwm'),
('Hanam', '222', 'eerer', '1222', 'enkrrerer'),
('zidan', '1222', 'weeewewe', '1222', 'wee'),
('Marcus Rashford', '298239298', 'wfjefebffb', 'ejfjefbee', 'bfefejfej');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_identitas` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama`, `no_identitas`, `email`, `no_telp`, `paket`, `alamat`) VALUES
(1, 'Nero Chaniago', '19061998', 'nerochaniago19@gmail.com', '087743603697', 'unlimited', 'bandung'),
(2, 'David De Gea', '12221', 'daviddegea@manchesterunited.com', '12222222', 'unlimited', 'pondok rajawali futsal lama kamar no 12 ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
