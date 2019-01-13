-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 09:48 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd` varchar(10) NOT NULL,
  `nm` varchar(50) NOT NULL,
  `jml` int(11) UNSIGNED NOT NULL,
  `stn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd`, `nm`, `jml`, `stn`) VALUES
('ers', 'Penghapus', 0, 'pcs'),
('pcl', 'Pensil', 30, 'pcs'),
('pen', 'Pulpen', 31, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `no` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `admin` varchar(20) NOT NULL,
  `setuju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`no`, `tgl`, `admin`, `setuju`) VALUES
(1, '2018-05-26', 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluar_detail`
--

CREATE TABLE `keluar_detail` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `kd` varchar(50) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keluar_detail`
--

INSERT INTO `keluar_detail` (`id`, `no`, `kd`, `jml`) VALUES
(1, 1, 'pcl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `no` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`no`, `tgl`, `admin`) VALUES
(1, '2018-05-21', 'Administrator'),
(2, '2018-05-22', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `masuk_detail`
--

CREATE TABLE `masuk_detail` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `kd` varchar(50) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masuk_detail`
--

INSERT INTO `masuk_detail` (`id`, `no`, `kd`, `jml`) VALUES
(1, 1, 'pcl', 29),
(2, 1, 'pen', 30),
(3, 2, 'pcl', 1),
(4, 2, 'pen', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `keluar_detail`
--
ALTER TABLE `keluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `masuk_detail`
--
ALTER TABLE `masuk_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keluar_detail`
--
ALTER TABLE `keluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masuk_detail`
--
ALTER TABLE `masuk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
