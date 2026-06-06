-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2026 at 02:18 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah` int NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_input` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `user_id`, `nama_barang`, `kode_barang`, `kategori`, `jumlah`, `kondisi`, `lokasi`, `tanggal_input`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laptop ASUS VivoBook', 'LAB-KOM-001', 'Komputer', 5, 'Baik', 'Ruang Lab RPL A', '2026-06-01', '2026-06-06 11:57:54', '2026-06-06 11:57:54'),
(2, 1, 'Router Cisco 2900', 'LAB-JAR-001', 'Jaringan', 2, 'Rusak', 'Rack Server Lab RPL', '2026-06-06', '2026-06-06 11:57:54', '2026-06-06 05:24:55'),
(3, 1, 'Proyektor Epson EB-X05', 'LAB-MUL-001', 'Multimedia', 3, 'Perlu Perbaikan', 'Ruang Lab RPL B', '2026-06-03', '2026-06-06 11:57:54', '2026-06-06 11:57:54'),
(4, 1, 'Switch Hub TP-Link 24 Port', 'LAB-JAR-002', 'Jaringan', 4, 'Baik', 'Rack Server Lab RPL', '2026-06-04', '2026-06-06 11:57:54', '2026-06-06 11:57:54'),
(5, 1, 'Kabel LAN UTP Cat6', 'LAB-JAR-003', 'Jaringan', 50, 'Baik', 'Gudang Lab RPL', '2026-06-05', '2026-06-06 11:57:54', '2026-06-06 11:57:54'),
(6, 2, 'PC Desktop HP ProDesk', 'LAB-KOM-002', 'Komputer', 15, 'Baik', 'Ruang Lab RPL C', '2026-06-06', '2026-06-06 11:57:54', '2026-06-06 05:00:36'),
(7, 2, 'Webcam Logitech C920', 'LAB-MUL-002', 'Multimedia', 5, 'Rusak', 'Ruang Lab RPL C', '2026-06-02', '2026-06-06 11:57:54', '2026-06-06 11:57:54'),
(9, 3, 'Kabel', 'LAB-JAR-004', 'Jaringan', 30, 'Perlu Perbaikan', 'Ruang Lab RPL D', '2026-06-06', '2026-06-06 05:53:50', '2026-06-06 05:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Salsabilla Dz', 'salsabilla@lab.com', '$2y$12$rjTTNoK33X3.j3Lm.G4EzODlQGh/MaaezGtsJ22svYxLiE90nRpuy', '2026-06-06 11:57:53', '2026-06-06 05:21:03'),
(2, 'John Doe', 'john@lab.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-06-06 11:57:53', '2026-06-06 11:57:53'),
(3, 'Lalisa Manoban', 'nolisa@lab.com', '$2y$12$NESK9IuCwqyDjOGXKaqMYeVP7wWveDOS/PiEDpMQcJ42Lalf0W30i', '2026-06-06 05:52:00', '2026-06-06 05:52:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
