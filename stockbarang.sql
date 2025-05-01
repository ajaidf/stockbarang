-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 01:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `barang` varchar(50) NOT NULL,
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `codebarang` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` text NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`barang`, `idkeluar`, `idbarang`, `tipe`, `codebarang`, `deskripsi`, `tanggal`, `penerima`, `departemen`, `qty`) VALUES
('', 47, 0, '', 'CF211A', '', '2023-03-06 05:45:34', 'HR', '', 1),
('', 48, 0, '', 'CC9720A', '', '2023-03-06 05:45:46', 'HR', '', 1),
('', 53, 0, '', 'PG-60', '', '2023-03-09 00:42:44', 'amin', 'HR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
('admin', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `barang` varchar(50) NOT NULL,
  `idmasuk` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `codebarang` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`barang`, `idmasuk`, `tipe`, `codebarang`, `deskripsi`, `tanggal`, `qty`) VALUES
('', 34, '', 'CC9720A', '', '2023-03-03 02:59:31', 5),
('', 35, '', 'CF211A', '', '2023-03-03 02:59:40', 2),
('', 87, '', 'CC9720A', '', '2023-03-06 05:43:12', 4),
('', 93, '', 'PG-60', '', '2023-03-09 00:29:10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `barang` varchar(50) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `codebarang` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`barang`, `idbarang`, `tipe`, `codebarang`, `deskripsi`, `stock`) VALUES
('Cartridge Pixma', 1, '40', 'PG-60', 'Black', 17),
('Cartridge Pixma', 2, '41', 'CL-41', 'Color', 2),
('Cartridge Pixma', 3, '810', 'PG-810', 'Black', 4),
('Cartridge Pixma', 4, '811', 'CL-811', 'Color', 9),
('Cartridge HP Laserjet CP1215, CP1515', 5, '125A', 'CB540A', 'Black', 5),
('Cartridge HP Laserjet CP1215, CP1515', 6, '125A', 'CB541A', 'Cyan', 0),
('Cartridge HP Laserjet CP1215, CP1515', 7, '125A', 'CB542A', 'Yellow', 5),
('Cartridge HP Laserjet CP1215, CP1515', 8, '125A', 'CB543A', 'Magenta', 4),
('Cartridge HP Laserjet Pro 200', 9, '131A', 'CF210A', 'Black', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
