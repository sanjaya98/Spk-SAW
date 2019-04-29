-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2019 at 04:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawspk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `kAlternatif` varchar(11) NOT NULL,
  `nmAlternatif` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`kAlternatif`, `nmAlternatif`) VALUES
('A1', 'Membeli mobil box untuk distribusi barang'),
('A2', 'Membeli natah untuk membangun gudang baru'),
('A3', 'Maintenance saran teknologi informasi'),
('A4', 'Pengembangan produk baru');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `bc1` double NOT NULL,
  `bc2` double NOT NULL,
  `bc3` double NOT NULL,
  `bc4` double NOT NULL,
  `bc5` double NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`bc1`, `bc2`, `bc3`, `bc4`, `bc5`, `id`) VALUES
(0.25, 0.15, 0.3, 0.25, 0.05, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kreteria`
--

CREATE TABLE `kreteria` (
  `kAlternatif` varchar(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kreteria`
--

INSERT INTO `kreteria` (`kAlternatif`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
('A1', 150, 15, 2, 2, 3),
('A2', 500, 200, 2, 3, 2),
('A3', 200, 10, 3, 1, 3),
('A4', 350, 100, 3, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kAlternatif`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kreteria`
--
ALTER TABLE `kreteria`
  ADD PRIMARY KEY (`kAlternatif`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kreteria`
--
ALTER TABLE `kreteria`
  ADD CONSTRAINT `kreteria` FOREIGN KEY (`kAlternatif`) REFERENCES `alternatif` (`kAlternatif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
