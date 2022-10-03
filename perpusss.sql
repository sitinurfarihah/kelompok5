-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 04:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusss`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `penulis`, `tahun`, `judul`, `kota`, `penerbit`, `cover`, `sinopsis`, `stock`) VALUES
(1, 'Prof. Dr. Sondang P.\r\nSiagan, MP.A', 2009, 'Administrasi Pembangunan', 'Jakarta', 'Bumi Aksara', 'administrasi pembangunan.jpg', 'Ini Buku administrasi pembangunan', 2),
(2, 'Juwono Suroso', 2011, 'Asamurat', 'Jakarta', 'Penebar Plus', 'asamurat.jpg', 'Anda mempunyai masalah asamurat, baca buku ini.', 1),
(3, 'Jhonatan Black', 2015, 'Sejarah Dunia yang Disembunyikan', 'Indonesia', 'Pustaka Alvabet', 'sejarah dunia.jpg', 'Buku yang katanya dapat menggoyahkan iman yang membaca.', 1),
(7, 'weqweqwd', 0000, 'efwefsdf', 'fgsreh', 'rehsdfbhre', 'samsudin.jpg', 'gfdfewfds', 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_peminjaman3` int(11) NOT NULL,
  `kuantitas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_buku`, `id_peminjaman3`, `kuantitas`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 1),
(4, 3, 14, 1),
(6, 3, 15, 2),
(7, 2, 16, 2),
(8, 1, 17, 1),
(9, 1, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `ada` int(2) NOT NULL,
  `hilang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `id_pengembalian`, `ada`, `hilang`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 3, 1, 0),
(4, 7, 1, 0),
(5, 8, 1, 0),
(6, 9, 1, 1),
(7, 14, 1, 0),
(8, 15, 1, 0),
(9, 16, 1, 0),
(10, 17, 1, 1),
(11, 24, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '7b'),
(2, '8b'),
(3, '9b');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_siswa`, `id_petugas`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES
(1, 1, 1, '2022-09-20', '2022-10-20'),
(2, 2, 3, '2022-09-20', '2022-10-20'),
(3, 3, 1, '2022-09-21', '2022-10-21'),
(4, 1, 1, '2022-08-31', '2022-10-26'),
(5, 2, 1, '2022-09-23', '2022-09-30'),
(6, 3, 1, '0000-00-00', '0000-00-00'),
(7, 1, 1, '0000-00-00', '0000-00-00'),
(8, 1, 1, '2022-09-09', '0000-00-00'),
(9, 2, 1, '0000-00-00', '0000-00-00'),
(10, 1, 1, '2022-09-08', '0000-00-00'),
(11, 2, 1, '2022-09-09', '0000-00-00'),
(12, 1, 1, '0000-00-00', '0000-00-00'),
(13, 1, 1, '0000-00-00', '0000-00-00'),
(14, 2, 1, '2022-09-01', '2022-09-01'),
(15, 3, 1, '2022-10-03', '2022-11-03'),
(16, 1, 1, '0000-00-00', '2022-11-03'),
(17, 3, 1, '2022-10-01', '2022-10-04'),
(18, 1, 1, '2022-10-26', '2022-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman2` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman2`, `tanggal_kembali`, `denda`) VALUES
(1, 1, '2022-10-12', 0),
(2, 2, '2022-10-06', 0),
(3, 3, '2022-10-14', 0),
(4, 14, '2022-10-21', 0),
(5, 14, '2022-10-15', 6000),
(6, 2, '2022-10-21', 10110000),
(7, 2, '2022-10-20', 10110000),
(8, 2, '2022-10-20', 2022),
(9, 2, '0000-00-00', 1666216800),
(10, 2, '2022-10-21', 0),
(11, 2, '2022-10-22', 0),
(12, 2, '2022-10-28', 8),
(13, 2, '2022-10-29', 9),
(14, 14, '2022-10-28', 570000),
(15, 2, '2022-10-22', 2),
(16, 14, '2022-10-29', 58),
(17, 15, '2022-11-05', 2),
(24, 17, '2022-10-04', 0),
(25, 16, '2022-10-04', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama_petugas`, `jenis_kelamin`, `alamat`, `password`) VALUES
(1, 'Simon', 'L', 'Surabaya, Jawa Timur', 'simon'),
(2, 'Ferguso', 'L', 'California, USA', 'ferguso'),
(3, 'Retno', 'P', 'Ponorogo, Jawa Timur', 'retno');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `alamat`, `id_kelas`) VALUES
(1, 'Albert', 'L', 'Bali', 1),
(2, 'Pica', 'P', 'Bogor', 2),
(3, 'Doyok', 'L', 'Batam', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_peminjaman` (`id_peminjaman3`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id_detail_pengembalian`),
  ADD KEY `id_pengembalian` (`id_pengembalian`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman2`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_peminjaman3`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `detail_pengembalian_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`nip`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman2`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
