-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2019 at 05:31 PM
-- Server version: 10.1.28-MariaDB
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
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` varchar(5) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `jabatan`, `tanggal`, `bulan`, `persentase`) VALUES
('01', 'Karyawan', 1, 'Maret', 80),
('02', 'Manager', 1, 'Maret', 90),
('03', 'Vice', 1, 'Maret', 80),
('04', 'Karyawan', 2, 'Maret', 100),
('05', 'Manager', 2, 'Maret', 70),
('06', 'Vice', 2, 'Maret', 90),
('07', 'Karyawan', 3, 'Maret', 90),
('08', 'Manager', 3, 'Maret', 100),
('09', 'Vice', 3, 'Maret', 80),
('10', 'Karyawan', 4, 'Maret', 60),
('11', 'Manager', 4, 'Maret', 60),
('12', 'Vice', 4, 'Maret', 100),
('13', 'Karyawan', 5, 'Maret', 100),
('14', 'Manager', 5, 'Maret', 70),
('15', 'Vice', 5, 'Maret', 90);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `idpegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahSalary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`idpegawai`, `tanggal`, `jumlahSalary`) VALUES
(13212, '2019-01-01', 5000000),
(13212, '2019-02-01', 10000000),
(13212, '2019-03-01', 10000000),
(13212, '2019-04-01', 10000000),
(13231, '2019-01-01', 10000000),
(13231, '2019-02-01', 15000000),
(13231, '2019-03-01', 20000000),
(13231, '2019-04-01', 20000000),
(13215, '2019-01-01', 10000000),
(13215, '2019-02-01', 10000000),
(13264, '2019-01-01', 5000000),
(13264, '2019-02-01', 10000000),
(13264, '2019-03-01', 15000000),
(13264, '2019-04-01', 15000000),
(13245, '2019-01-01', 10000000),
(13245, '2019-02-01', 15000000),
(13245, '2019-03-01', 15000000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(5) NOT NULL,
  `nama_karyawan` varchar(10) NOT NULL,
  `umur` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `umur`) VALUES
('01', 'Fauzan', '20'),
('02', 'Septa', '21'),
('03', 'Rafi', '20'),
('04', 'Irani', '21'),
('05', 'Bambank', '30'),
('06', 'Inem', '45'),
('07', 'Ferguso', '36'),
('08', 'Ling Ling', '30'),
('09', 'Marimar', '37'),
('10', 'Budi', '28'),
('11', 'Aan', '40'),
('12', 'Iin', '46'),
('13', 'Putri', '37'),
('14', 'Maimai', '25'),
('15', 'Pawpaw', '30');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `namapegawai` varchar(50) NOT NULL,
  `genderpegawai` varchar(6) NOT NULL,
  `emailpegawai` varchar(50) NOT NULL,
  `statuspegawai` varchar(50) NOT NULL,
  `gajipegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `namapegawai`, `genderpegawai`, `emailpegawai`, `statuspegawai`, `gajipegawai`) VALUES
(13212, 'Resty Della Septa', 'Female', 'rdsepta@gmail.com', 'Active', 10000000),
(13231, 'Fauzan Firdaus', 'Male', 'fzznfd@gmail.com', 'Active', 20000000),
(13215, 'Irani Kurnia Dewi', 'Female', 'iranikurniadewi3@gmail.com', 'Unactive', 0),
(13264, 'Haifa Salsabila', 'Female', 'haifasalsaaifa@gmail.com', 'Active', 15000000),
(13245, 'Monica Dessy Amanda', 'Female', 'monicadessy@gmail.com', 'Unactive', 0),
(13290, 'Rafi Ali Rachmadi', 'Male', 'rafi@gmail.com', 'On enrollment', NULL),
(13678, 'M Ferianda Satya', 'Male', 'mferianda@gmail.com', 'On enrollment', NULL),
(13875, 'Karina Aulia Dini', 'Female', 'karinaaulia@gmail.com', 'On enrollment', NULL),
(13424, 'Tengku M Risky', 'Male', 'tengkumrisky@gmail.com', 'On enrollment', NULL),
(13119, 'Raisa Siti Mardiani', 'Female', 'raisasm@gmail.com', 'On enrollment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sdm`
--

CREATE TABLE `sdm` (
  `id_sdm` varchar(5) NOT NULL,
  `nama_divisi` varchar(10) NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL,
  `Aktivitas` int(11) NOT NULL,
  `Solidaritas` int(11) NOT NULL,
  `Output` int(11) NOT NULL,
  `Performansi` int(11) NOT NULL,
  `lainnya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdm`
--

INSERT INTO `sdm` (`id_sdm`, `nama_divisi`, `jumlah_karyawan`, `Aktivitas`, `Solidaritas`, `Output`, `Performansi`, `lainnya`) VALUES
('01', 'IT', 15, 80, 60, 90, 70, 20),
('02', 'Finance', 10, 90, 80, 90, 60, 10),
('03', 'Marketing', 5, 90, 90, 60, 80, 9),
('04', 'HRD', 16, 60, 70, 80, 60, 5),
('05', 'CSM', 20, 100, 50, 90, 60, 10);

-- --------------------------------------------------------

--
-- Table structure for table `status_karyawan`
--

CREATE TABLE `status_karyawan` (
  `id_status` varchar(5) NOT NULL,
  `jumlah_pecat` int(11) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `jumlah_baru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_karyawan`
--

INSERT INTO `status_karyawan` (`id_status`, `jumlah_pecat`, `bulan`, `jumlah_baru`) VALUES
('01', 3, 'January', 5),
('02', 0, 'February', 3),
('03', 0, 'March', 1),
('04', 1, 'April', 3),
('05', 1, 'May', 0),
('06', 0, 'June', 6),
('07', 1, 'July', 3),
('08', 3, 'August', 2),
('09', 1, 'September', 0),
('10', 0, 'October', 1),
('11', 1, 'November', 1),
('12', 0, 'December', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `status_karyawan`
--
ALTER TABLE `status_karyawan`
  ADD PRIMARY KEY (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
