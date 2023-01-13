-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 08:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marbaystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(30) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `total_produk` int(20) NOT NULL,
  `total_harga` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `nama_produk`, `total_produk`, `total_harga`, `id_produk`, `username`) VALUES
(21, 'barongsai', 3, 20000, 4, 'bayu'),
(28, 'pp', 10, 100000, 1, 'bayu'),
(29, 'Topi', 1, 40, 2, 'bayu');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(30) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `total_produk` int(30) NOT NULL,
  `total_harga` int(30) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gambar` text NOT NULL,
  `harga` varchar(30) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `gambar`, `harga`, `stok`, `deskripsi`, `jenis`) VALUES
(1, 'topi legend', 'topi1.jpg', '10000', 10, 'topi peninggalan majapahit', 'topi'),
(2, 'topi keren', 'topi2.jpg', '40000', 10, 'topi untuk bergaya', 'topi'),
(3, 'Jaket Running Wanita', 'jaket1.jpg', '1700000', 10, 'Jaket untuk olahraga', 'jaket'),
(4, 'Jaket Hiking Pria', 'jaket2.jpg', '2000000', 10, 'Jaket untuk mendaki', 'jaket'),
(5, 'Baju Ahha Barong', 'baju1.jpg', '150000', 10, 'Baju untuk Fashionweek', 'baju'),
(6, 'Baju Errigo', 'baju2.jpg', '175000', 10, 'Baju untuk Fashionweek', 'baju'),
(7, 'Celana hiking TNF', 'celana1.jpg', '1300000', 10, 'Celana untuk mendaki', 'celana'),
(8, 'Celana Cutbray Wanita', 'celana2.jpg', '80000', 10, 'Celana untuk bergaya', 'celana'),
(9, 'Kaus Kaki Simpsons', 'kaoskaki1.jpg', '35000', 10, 'Kaus Kaki untuk bergaya', 'kauskaki'),
(10, 'Kaus Kaki Hiking', 'kaoskaki2.jpg', '75000', 10, 'Kaus Kaki untuk mendaki', 'kauskaki'),
(11, 'Sepatu Hiking TNF', 'sepatu1.jpg', '8000000', 10, 'Sepatu Untuk Mendaki', 'sepatu'),
(12, 'Sepatu Vans', 'sepatu2.jpg', '2000000', 10, 'Sepatu Untuk Bergaya', 'sepatu'),
(13, 'topi', 'img-upload/163.XxEoq/g4Y.jpg', '10000', 2, 'Harga murah', ''),
(14, 'topi', 'img-upload/163.XxEoq/g4Y.jpg', '10000', 2, 'Harga murah', 'topi'),
(15, 'topi', 'assets/163.XxEoq/g4Y.jpg', '10000', 2, 'Harga murah', 'topi'),
(16, 'topi', '../assets/163.XxEoq/g4Y.jpg', '10000', 2, 'Harga murah', 'topi'),
(17, 'topi', '../assets/16Et0ampohcok.png', '10000', 2, 'Harga murah', 'topi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'bayu', 'bayu@gmail.com', '123'),
(2, 'arfan', 'arfan@gmail.com', '123'),
(3, 'kafah', 'kafah@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
