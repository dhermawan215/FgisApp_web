-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2021 pada 09.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fgis_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'ECU'),
(2, 'REGULATOR'),
(3, 'ADP'),
(4, 'TW'),
(5, 'IGNITER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cu44`
--

CREATE TABLE `cu44` (
  `id_44` int(15) UNSIGNED NOT NULL,
  `date_transaction` date NOT NULL,
  `quantity` int(8) NOT NULL,
  `input` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `fill_by` varchar(50) NOT NULL,
  `checked_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cu44`
--

INSERT INTO `cu44` (`id_44`, `date_transaction`, `quantity`, `input`, `remark`, `fill_by`, `checked_by`) VALUES
(1, '2021-03-29', 800, 'IN', 'Prod', '', ''),
(2, '2021-03-29', 600, 'IN', 'Prod', '', ''),
(5, '2021-03-31', 200, 'OUT', 'P3P1', '', ''),
(6, '2021-03-31', 250, 'IN', 'Prod', 'rendi', 'dedi'),
(7, '2021-03-31', 800, 'OUT', 'P7P1', 'fakhri', 'abdul rohman'),
(8, '2021-03-31', 250, 'IN', 'Prod', 'Tomy', 'nurul'),
(9, '2021-03-31', 600, 'OUT', 'P7P1', 'tomi', 'dedi'),
(10, '2021-04-01', 789, 'IN', 'Prod', 'dicky', 'nurul'),
(11, '2021-04-02', 200, 'OUT', 'P3P1', 'Tomy', 'Agus'),
(12, '2021-04-06', 678, 'IN', 'Prod', 'Tomy', 'Agus'),
(13, '2021-04-12', 1200, 'OUT', 'P8P1', 'dicky', 'Abdul'),
(14, '2021-04-06', 250, 'IN', 'Prod', 'dicky', 'abdul'),
(15, '2021-04-13', 600, 'IN', 'Prod', 'dicky hermawan', 'nurul'),
(16, '2021-04-13', 200, 'OUT', 'P3P1', 'dicky hermawan', 'Agus'),
(17, '2021-06-17', 800, 'IN', 'Prod', 'dicky hermawan', 'Agus santoso');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cu44a`
--

CREATE TABLE `cu44a` (
  `id_44a` int(15) UNSIGNED NOT NULL,
  `date_transaction` date NOT NULL,
  `quantity` int(8) NOT NULL,
  `input` varchar(10) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `fill_by` varchar(50) NOT NULL,
  `checked_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cu44a`
--

INSERT INTO `cu44a` (`id_44a`, `date_transaction`, `quantity`, `input`, `remark`, `fill_by`, `checked_by`) VALUES
(2, '2021-04-22', 400, 'OUT', 'P3P1', 'dicky hermawan', 'Agus Santoso'),
(3, '2021-04-23', 800, 'IN', 'Prod', 'Muhammad Zaki', 'Abdul Rohman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id_customers` int(11) UNSIGNED NOT NULL,
  `customers_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id_customers`, `customers_name`) VALUES
(1, 'PT AHM'),
(2, 'PT SIM'),
(3, 'PT KMI'),
(4, 'PT HTI'),
(5, 'PT YIMM'),
(6, 'EXPORT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kmi_stock`
--

CREATE TABLE `kmi_stock` (
  `id_stock` int(15) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `date_transaction` date NOT NULL,
  `quantity` int(8) NOT NULL,
  `input` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `fill_by` varchar(50) NOT NULL,
  `checked_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kmi_stock`
--

INSERT INTO `kmi_stock` (`id_stock`, `product_id`, `date_transaction`, `quantity`, `input`, `remark`, `fill_by`, `checked_by`) VALUES
(1, 15, '2021-06-01', 100, 'IN', 'Prod', 'Dicky Hermawan', 'Abdul Rohman'),
(2, 15, '2021-06-02', 70, 'OUT', 'KMI SPO', 'Lia', 'Siti'),
(3, 16, '2021-06-01', 300, 'IN', 'Prod', 'Dicky Hermawan', 'Abdul Rohman'),
(4, 16, '2021-06-03', 150, 'OUT', 'KMI SPO', 'Sheila', 'Agus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-03-25-135627', 'App\\Database\\Migrations\\Product', 'default', 'App', 1616680834, 1),
(2, '2021-03-25-140620', 'App\\Database\\Migrations\\Product', 'default', 'App', 1616681471, 2),
(3, '2021-03-30-133201', 'App\\Database\\Migrations\\Cu44', 'default', 'App', 1617112494, 3),
(4, '2021-04-12-070601', 'App\\Database\\Migrations\\Category', 'default', 'App', 1618211552, 4),
(5, '2021-04-12-070619', 'App\\Database\\Migrations\\Customers', 'default', 'App', 1618211552, 4),
(6, '2021-04-17-165251', 'App\\Database\\Migrations\\Users', 'default', 'App', 1618678782, 5),
(7, '2021-04-29-140948', 'App\\Database\\Migrations\\Cu44a', 'default', 'App', 1619705820, 6),
(8, '2021-06-06-085126', 'App\\Database\\Migrations\\KawasakiProduk', 'default', 'App', 1622970344, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `part_name` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `customers_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `part_number`, `part_name`, `jenis`, `category_id`, `customers_id`) VALUES
(1, 'CU-44', '30400-K1A-N031-M1', 'ENGINE CONTROL UNIT', 'IDF   ', 1, 1),
(2, 'CU-44A', '30400-K1A-N131-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 1),
(3, 'CU-33', '30400-K59-A711-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 1),
(4, 'CU-33C', '30400-K60-B611-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 1),
(5, 'CU-33D', '30400-K60-B711-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 1),
(6, 'CU-44A(SPO)', '30400K1AN131', 'ENGINE CONTROL UNIT', 'SPO', 1, 1),
(7, 'CU-37S', '30400-K1Z-N311-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 1),
(8, 'CU-21R', '30400-K81-N521-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 4),
(9, 'CU-21Q', '30400-K81-N621-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 4),
(10, 'CU-26P1', '30400-K0W-N011-M1', 'ENGINE CONTROL UNIT', 'IDF ', 1, 1),
(11, 'CU-26P1(SPO)', '30400K0WN01', 'ENGINE CONTROL UNIT', 'SPO ', 1, 1),
(12, 'CU-21Q(SPO)', '30400K81N62', 'ENGINE CONTROL UNIT', 'SPO ', 1, 1),
(13, 'CU-44B', '30400-K1A-M021-M1', 'ENGINE CONTROL UNIT', 'IDF', 1, 4),
(14, 'CU-21R(SPO)', '30400K81N521', 'ENGINE CONTROL UNIT', 'IDF', 1, 1),
(15, 'CI621A(SPO)', '21119-1405', 'IGNITER', 'SPO', 5, 3),
(16, 'CI787(SPO)', '21119-0042', 'IGNITER', 'SPO', 5, 3),
(17, 'CI808(064)(SPO)', '21119-0064', 'IGNITER', 'SPO', 5, 3),
(18, 'CI808(085)(SPO)', '21119-0085', 'IGNITER', 'SPO', 5, 3),
(19, 'CI808(100)(SPO)', '21119-0100', 'IGNITER', 'SPO', 5, 3),
(20, 'CI836(SPO)', '21119-0098', 'IGNITER', 'SPO', 5, 3),
(21, 'CI858(SPO)', '21119-0591', 'IGNITER', 'SPO', 5, 3),
(22, 'CI858', '21119-0591', 'IGNITER', 'IDF', 5, 3),
(23, 'CI859', '21119-0592', 'IGNITER', 'IDF', 5, 3),
(24, 'CI859A', '21119-0593', 'IGNITER', 'IDF', 5, 3),
(25, 'CI859(SPO)', '21119-0592', 'IGNITER', 'SPO', 5, 3),
(26, 'CI859A(SPO)', '21119-0593', 'IGNITER', 'SPO', 5, 3),
(27, 'SH657-12(SPO)', '21066-1097', 'REGULATOR VOLTAGE', 'SPO', 2, 3),
(28, 'SH812AA', '21066-0777', 'REGULATOR VOLTAGE', 'IDF', 2, 3),
(29, 'SH812AA(SPO)', '21066-0777', 'REGULATOR VOLTAGE', 'SPO', 2, 3),
(30, 'SH812CA', '21066-0776', 'REGULATOR VOLTAGE', 'IDF', 2, 3),
(31, 'SH812CA(SPO)', '21066-0776', 'REGULATOR VOLTAGE', 'SPO', 2, 3),
(32, 'SH812GA(SPO)', '21066-0780', 'REGULATOR VOLTAGE', 'SPO', 2, 3),
(33, 'SH829BA', '21066-0773', 'REGULATOR VOLTAGE', 'IDF', 2, 3),
(34, 'SH829BA(SPO)', '21066-0773', 'REGULATOR VOLTAGE', 'SPO', 2, 3),
(35, 'SH829CA', '21066-0762', 'REGULATOR VOLTAGE', 'IDF', 2, 3),
(36, 'SH829CA(SPO)', '21066-0762', 'REGULATOR VOLTAGE', 'SPO', 2, 3),
(37, 'CU-32 IS', '5E100-K97-T120-M1', 'POWER DRIVE UNIT', 'EXPORT', 1, 6),
(38, 'CU-32A IS', '5E100-K96-J120-M1', 'POWER DRIVE UNIT', 'EXPORT', 1, 6),
(39, 'CU-32C IS', '5E100-K97-V221-M1', 'POWER DRIVE UNIT', 'EXPORT', 1, 6),
(40, 'CU-39B IS', '5E100-K1ZF-T612-M1', 'POWER DRIVE UNIT', 'EXPORT', 1, 6),
(41, 'ADP-89 IS', '5E200-K97-T111-M1', 'CONDENSER ASSY', 'EXPORT', 3, 6),
(42, 'TW96 IS', '5A800-K97-T121-M1', 'RECTIFIER UNIT AC DC 12V', 'EXPORT', 4, 6),
(43, 'SH877AA IS', 'B97-H1960-00', 'RECTIFIER REGULATOR ASSY', 'EXPORT', 2, 6),
(44, 'SH877AB IS', 'BK8-H1960-00', 'RECTIFIER REGULATOR ASSY', 'EXPORT', 2, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `password`, `level`) VALUES
(1, 'siti usmalia', 'admin_fgwh@shindengen.co.id', '$2y$10$5DYdZPEnbhRC2/vurv7mLOH.CHTG1emdbUd3AkrpyY8fozkhnnega', 'admin'),
(2, 'dicky hermawan', 'dicky@shindengen.co.id', '$2y$10$W4uPpQ2Zbjrgh3Y2.FqB9uYNvuDNQZ2t7LSl6dt.zWhrP65a4Tjcm', 'user'),
(3, 'Tomi Aditya F', 'tomiadityaf@shindengen.co.id', '$2y$10$f7RrjZQstV1dup7claNTO.G/XUrT2Dax8LuK9IBrkz6MyyenA6kly', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `cu44`
--
ALTER TABLE `cu44`
  ADD PRIMARY KEY (`id_44`);

--
-- Indeks untuk tabel `cu44a`
--
ALTER TABLE `cu44a`
  ADD PRIMARY KEY (`id_44a`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Indeks untuk tabel `kmi_stock`
--
ALTER TABLE `kmi_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `kmiStok_Produk` (`product_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_customers` (`customers_id`),
  ADD KEY `product_category` (`category_id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `cu44`
--
ALTER TABLE `cu44`
  MODIFY `id_44` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `cu44a`
--
ALTER TABLE `cu44a`
  MODIFY `id_44a` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kmi_stock`
--
ALTER TABLE `kmi_stock`
  MODIFY `id_stock` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kmi_stock`
--
ALTER TABLE `kmi_stock`
  ADD CONSTRAINT `kmiStok_Produk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_categry` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_customers` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id_customers`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
