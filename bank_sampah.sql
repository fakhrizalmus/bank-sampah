-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 02:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `sampahs`
--

CREATE TABLE `sampahs` (
  `id_sampah` int(11) NOT NULL,
  `jenis_sampah` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sampahs`
--

INSERT INTO `sampahs` (`id_sampah`, `jenis_sampah`, `deskripsi`, `foto`, `harga`, `updated_at`, `created_at`) VALUES
(1, 'plastik', 'ini sampah plastik yaa', 'plastik.jpg', 500, NULL, NULL),
(2, 'kertas', 'ini sampah kertas', 'kertas.jpg', 1000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` int(11) NOT NULL,
  `sampah_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id_transaksi`, `sampah_id`, `user_id`, `berat`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 1000, '2023-09-15 11:06:15', '2023-09-15 11:06:15'),
(2, 2, 2, 3, 3000, '2023-09-15 11:07:27', '2023-09-15 11:07:27'),
(3, 1, 2, 6, 3000, '2023-09-15 11:18:44', '2023-09-15 11:18:44'),
(4, 2, 2, 5, 5000, '2023-09-15 12:02:57', '2023-09-15 12:02:57'),
(5, 1, 2, 5, 2500, '2023-09-15 12:17:23', '2023-09-15 12:17:23'),
(6, 1, 2, 9, 4500, '2023-09-15 12:21:46', '2023-09-15 12:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'undraw_profile_2.svg',
  `jenis` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `email`, `foto`, `jenis`) VALUES
(1, 'Admin', '$2y$10$.9G4.R.6ubrcb0bOT9.RmejGl4tF8g/xuPzG53zL2Op2BcvRr24Xe', 'admin@gmail.com', 'undraw_profile_2.svg', 'admin'),
(2, 'User', '$2y$10$mdGpPDIEbPmQi/.ReARTouUxokVTsl/RVuwkxZpWzD34dNaQkrlSO', 'user@gmail.com', 'undraw_profile_2.svg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sampahs`
--
ALTER TABLE `sampahs`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `sampah_id` (`sampah_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampahs`
--
ALTER TABLE `sampahs`
  MODIFY `id_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_ibfk_1` FOREIGN KEY (`sampah_id`) REFERENCES `sampahs` (`id_sampah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksis_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
