-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2019 pada 12.12
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
-- Database: `telkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `title`, `isi`) VALUES
(1, 'TELKOM INDONESIA', 'Telkom Indonesia (Persero) Tbk (Telkom) adalah Badan Usaha Milik Negara (BUMN) yang bergerak di bidang jasa layanan teknologi informasi dan komunikasi (TIK) dan jaringan telekomunikasi di Indonesia. Pemegang saham mayoritas Telkom adalah Pemerintah Republik Indonesia sebesar 52.09%, sedangkan 47.91% sisanya dikuasai oleh publik. Saham Telkom diperdagangkan di Bursa Efek Indonesia (BEI) dengan kode “TLKM” dan New York Stock Exchange (NYSE) dengan kode “TLK”.\r\n<br>\r\n\r\nupaya bertransformasi menjadi digital telecommunication company, TelkomGroup mengimplementasikan strategi bisnis dan operasional perusahaan yang berorientasi kepada pelanggan (customer-oriented). Transformasi tersebut akan membuat organisasi TelkomGroup menjadi lebih lean (ramping) dan agile (lincah) dalam beradaptasi dengan perubahan industri telekomunikasi yang berlangsung sangat cepat. Organisasi yang baru juga diharapkan dapat meningkatkan efisiensi dan efektivitas dalam menciptakan customer experience yang berkualitas.\r\n<br>\r\n\r\nusaha TelkomGroup bertumbuh dan berubah seiring dengan perkembangan teknologi, informasi dan digitalisasi, namun masih dalam koridor industri telekomunikasi dan informasi. Hal ini terlihat dari lini bisnis yang terus berkembang melengkapi legacy yang sudah ada sebelumnya.\r\n<br>\r\n\r\nini TelkomGroup mengelola 6 produk portofolio yang melayani empat segmen konsumen, yaitu korporat, perumahan, perorangan dan segmen konsumen lainnya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` varchar(5) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
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
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `h1` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `h1`, `keterangan`) VALUES
(1, 'Internet Cepat Dengan Produk Telkom', 'Nikmati internetan dengan kecepatan super cepat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `finance`
--

CREATE TABLE `finance` (
  `id_pemasukan` int(11) NOT NULL,
  `blanko` varchar(100) NOT NULL,
  `tipe` varchar(4) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `finance`
--

INSERT INTO `finance` (`id_pemasukan`, `blanko`, `tipe`, `keperluan`, `tanggal`, `debit`, `kredit`) VALUES
(2, '2', 'K1', '1', '2019-04-12', 0, 1),
(3, '1', 'M1', '1', '2019-04-26', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `idpegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlahSalary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
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
-- Struktur dari tabel `historyinventoryout`
--

CREATE TABLE `historyinventoryout` (
  `idBarang` varchar(9) NOT NULL,
  `stockBarang` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `idBarang` varchar(9) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `stockBarang` int(11) NOT NULL,
  `idSupplier` varchar(9) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`idBarang`, `namaBarang`, `stockBarang`, `idSupplier`, `keterangan`) VALUES
('1', 'asd', 0, 'asd', ''),
('2', '123', 123123, '123', ''),
('3', 'asdsadsads', 2147483647, 'SB0001', ''),
('4', 'asd12321', 22, 'SB0001', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(5) NOT NULL,
  `nama_karyawan` varchar(10) NOT NULL,
  `umur` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` varchar(9) NOT NULL,
  `namaKategori` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `keterangan`) VALUES
('KT0000001', 'Router', ''),
('KT0000002', 'LAN Cable', '');

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
-- Struktur dari tabel `pegawai`
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
-- Dumping data untuk tabel `pegawai`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdm`
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
-- Dumping data untuk tabel `sdm`
--

INSERT INTO `sdm` (`id_sdm`, `nama_divisi`, `jumlah_karyawan`, `Aktivitas`, `Solidaritas`, `Output`, `Performansi`, `lainnya`) VALUES
('01', 'IT', 15, 80, 60, 90, 70, 20),
('02', 'Finance', 10, 90, 80, 90, 60, 10),
('03', 'Marketing', 5, 90, 90, 60, 80, 9),
('04', 'HRD', 16, 60, 70, 80, 60, 5),
('05', 'CSM', 20, 100, 50, 90, 60, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp`
--

CREATE TABLE `skp` (
  `idSKP` int(5) NOT NULL,
  `NamaKaryawan` varchar(20) NOT NULL,
  `NIP` int(10) NOT NULL,
  `Jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_karyawan`
--

CREATE TABLE `status_karyawan` (
  `id_status` varchar(5) NOT NULL,
  `jumlah_pecat` int(11) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `jumlah_baru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_karyawan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` varchar(10) NOT NULL,
  `namaSupplier` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `idKategori` varchar(9) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namaSupplier`, `deskripsi`, `idKategori`, `status`) VALUES
('SB0001', 'tes', 'tes', 'tes', 0),
('SP0002', 'Redy', 'test', 'KT0000001', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `idTagihan` int(5) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Tagihan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `status_karyawan`
--
ALTER TABLE `status_karyawan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `status_pemasangan`
--
ALTER TABLE `status_pemasangan`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`idTagihan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `finance`
--
ALTER TABLE `finance`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `idTagihan` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
