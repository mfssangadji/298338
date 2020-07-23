-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 05:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s11_leven`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `status`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_surat`
--

CREATE TABLE `tbl_jenis_surat` (
  `id_jenis_surat` int(5) NOT NULL,
  `jenis_surat` varchar(220) NOT NULL,
  `kode_jenis_surat` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_surat`
--

INSERT INTO `tbl_jenis_surat` (`id_jenis_surat`, `jenis_surat`, `kode_jenis_surat`, `keterangan`) VALUES
(1, 'Surat Izin Penilitian', '414.22', 'Ketaranganx'),
(2, 'Surat Keputusan', '313.32', 'xKeteranganx'),
(3, 'Surat Perintah Tugas', '23.112', 'xxxketeranganxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `id_surat_keluar` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_jenis_surat` int(5) NOT NULL,
  `no_surat` varchar(220) NOT NULL,
  `perihal` text NOT NULL,
  `judul_surat` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `tembusan` text NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_keluar`
--

INSERT INTO `tbl_surat_keluar` (`id_surat_keluar`, `id_admin`, `id_jenis_surat`, `no_surat`, `perihal`, `judul_surat`, `isi`, `tanggal`, `tembusan`, `status`) VALUES
(2, 1, 1, '414.22/1/2019', 'Perihal', 'Judul Surat', '<p>asd</p>\r\n', '2019-07-22', 'najdsb,asndajsd,asdasd', 1),
(3, 6, 3, '23.112/2/2019', 'perihatalsdmaskd', 'judul suratandjnaj', '<p>asmdkamskd</p>\r\n', '2019-07-25', 'asd,asd,asd,asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id_surat_masuk` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_jenis_surat` int(5) NOT NULL,
  `no_surat` varchar(220) NOT NULL,
  `perihal` text NOT NULL,
  `judul_surat` text NOT NULL,
  `file` text NOT NULL,
  `tanggal` date NOT NULL,
  `tembusan` text NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id_surat_masuk`, `id_admin`, `id_jenis_surat`, `no_surat`, `perihal`, `judul_surat`, `file`, `tanggal`, `tembusan`, `status`) VALUES
(7, 1, 1, '414.22/2/2019', 'asd', 'Telenoveli', '<p>asd</p>\r\n', '2019-07-23', '', 0),
(8, 1, 2, '313.32/3/2019', 'Perihal', 'Matematika', 'LearningJava.java', '2019-07-23', 'xx', 1),
(9, 6, 1, '414.22/4/2019', 'perihasdajksnd', 'njnsjanjsd', 'Danau Tolire Besar74.jpg', '2019-07-25', 'asdkasda,sasdasd,asdasd,asd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  MODIFY `id_jenis_surat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `id_surat_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id_surat_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
