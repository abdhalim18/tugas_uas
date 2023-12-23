-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 06:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal` varchar(25) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `kode`, `nama`, `asal`, `jumlah`, `satuan`, `tanggal_diterima`, `tanggal_simpan`) VALUES
(1, 'INV-2023-001', 'Meja', 'Pembelian', 10, 'Unit', '2023-12-01', '2023-12-22 18:01:42'),
(2, 'INV-2023-002', 'Kursi', 'Hibah', 20, 'Unit', '2023-12-05', '2023-12-22 07:44:19'),
(5, 'INV-2022-004', 'Monitor', 'Pembelian', 25, 'Unit', '2024-01-01', '2023-12-22 16:47:17'),
(6, 'INV-2022-003', 'Laptop Asus', 'Sumbangan', 2, 'Unit', '2023-12-15', '2023-12-23 05:07:15'),
(7, 'INV-2023-003', 'Meja lipat', 'Hibah', 5, 'Unit', '2023-12-07', '2023-12-23 05:51:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
