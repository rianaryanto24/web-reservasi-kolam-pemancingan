-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2026 at 09:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi1`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_kolam`
--

CREATE TABLE `info_kolam` (
  `id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_kolam`
--

INSERT INTO `info_kolam` (`id`, `status`, `keterangan`) VALUES
(1, 'Tutup', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_harian`
--

CREATE TABLE `jadwal_harian` (
  `id` int(11) NOT NULL,
  `senin_kamis` varchar(100) NOT NULL,
  `jumat_sabtu` varchar(100) NOT NULL,
  `minggu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_harian`
--

INSERT INTO `jadwal_harian` (`id`, `senin_kamis`, `jumat_sabtu`, `minggu`) VALUES
(1, '13:00 - 16:00 ', '20:00 - 00:00', '13:00 - 17:00 ');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemancingan`
--

CREATE TABLE `jadwal_pemancingan` (
  `id` int(11) NOT NULL,
  `senin` varchar(100) DEFAULT NULL,
  `selasa` varchar(100) DEFAULT NULL,
  `rabu` varchar(100) DEFAULT NULL,
  `kamis` varchar(100) DEFAULT NULL,
  `jumat` varchar(100) DEFAULT NULL,
  `sabtu` varchar(100) DEFAULT NULL,
  `minggu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pemancingan`
--

INSERT INTO `jadwal_pemancingan` (`id`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`) VALUES
(1, '13:00 - 17:00', '13:00 - 17:00', '13:00 - 17:00', '13:00 - 17:00', '13:00 - 17:00', '20:00 - 00:00', '13:00 - 17:00 ');

-- --------------------------------------------------------

--
-- Table structure for table `kolam`
--

CREATE TABLE `kolam` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis_kolam` varchar(50) NOT NULL,
  `jumlah_lapak` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kolam`
--

INSERT INTO `kolam` (`id`, `gambar`, `jenis_kolam`, `jumlah_lapak`, `stok`, `harga`) VALUES
(1, '41.jpg', 'Ikan Mas', '21', 19, '50000');

-- --------------------------------------------------------

--
-- Table structure for table `laba_rugi`
--

CREATE TABLE `laba_rugi` (
  `id` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `pemasukan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `pengeluaran` decimal(15,2) NOT NULL DEFAULT 0.00,
  `laba` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laba_rugi`
--

INSERT INTO `laba_rugi` (`id`, `bulan`, `tahun`, `pemasukan`, `pengeluaran`, `laba`, `created_at`) VALUES
(1, 6, 2026, '405000.00', '150000.00', '255000.00', '2026-06-23 20:51:25'),
(2, 7, 2026, '100000.00', '10000.00', '90000.00', '2026-07-01 09:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_harian`
--

CREATE TABLE `laporan_harian` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `hari_pemancingan` varchar(50) NOT NULL,
  `jam_pemancingan` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah` varchar(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `lapak` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_harian`
--

INSERT INTO `laporan_harian` (`id`, `tanggal`, `hari_pemancingan`, `jam_pemancingan`, `keterangan`, `jumlah`, `nama`, `lapak`) VALUES
(5, '2026-06-12', '', '', 'mancing 10 kg', '200000', 'Rian Aryanto', 2),
(6, '2026-06-12', '', '', 'mancing 1kg tambah kopi', '55000', 'Rian A', 1),
(7, '2026-07-13', '', '', 'mancing 1kg', '100000', 'Adi', 2),
(8, '2026-06-13', '', '', 'mancing 1kg', '50000', 'Ahmad', 1),
(9, '2026-06-14', '', '', 'mancing 1kg', '50000', 'tes', 1),
(10, '2026-06-21', 'Senin', '13:00 - 17:00', 'A', '50000', 'yanz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no` varchar(50) NOT NULL,
  `akses` enum('Admin','User') NOT NULL DEFAULT 'User',
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `email`, `password`, `no`, `akses`, `gambar`) VALUES
(5, 'Rian A', 'Admin@gmail.com', 'admin123', '085759400256', 'Admin', 'yan.jpg'),
(40, 'Rian Aryanto', 'rianaryanto@gmail.com', '151103', '085759400256', 'User', 'yan1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `keterangan`, `jumlah`) VALUES
(4, '2026-06-23', 'kopi', '50000'),
(5, '2026-06-23', 'gelas', '100000'),
(6, '2026-07-01', 'piring', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no` varchar(20) NOT NULL,
  `tgl_in` varchar(30) NOT NULL,
  `tgl_out` varchar(30) NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `jumlah_lapak` int(11) NOT NULL DEFAULT 1,
  `hari_pemancingan` varchar(50) NOT NULL,
  `jam_pemancingan` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Confirm') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `email`, `no`, `tgl_in`, `tgl_out`, `id_kolam`, `jumlah_lapak`, `hari_pemancingan`, `jam_pemancingan`, `gambar`, `status`) VALUES
(15, 'Rian Aryanto', 'rianaryanto@gmail.com', '085759400256', '26-Jun-2026', '26-Jun-2026', 1, 1, 'Minggu', '13:00 - 17:00', 'yan26.jpg', 'Confirm'),
(16, 'Rian Aryanto', 'rianaryanto@gmail.com', '085759400256', '02-Jul-2026', '02-Jul-2026', 1, 1, 'Minggu', '13:00 - 17:00', 'yan27.jpg', 'Confirm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_kolam`
--
ALTER TABLE `info_kolam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_harian`
--
ALTER TABLE `jadwal_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pemancingan`
--
ALTER TABLE `jadwal_pemancingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kolam`
--
ALTER TABLE `kolam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laba_rugi`
--
ALTER TABLE `laba_rugi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik_bulan_tahun` (`bulan`,`tahun`);

--
-- Indexes for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kolam` (`id_kolam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_kolam`
--
ALTER TABLE `info_kolam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_harian`
--
ALTER TABLE `jadwal_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_pemancingan`
--
ALTER TABLE `jadwal_pemancingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kolam`
--
ALTER TABLE `kolam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laba_rugi`
--
ALTER TABLE `laba_rugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
