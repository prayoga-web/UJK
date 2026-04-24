-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2026 at 07:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `nama_barang`, `kategori`, `stok`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Smart Board 65\" Interaktif', 'Fasilitas', 2, '35000000.00', '2026-04-22 02:02:08', '2026-04-22 02:02:08'),
(2, 'Logitech Wireless Combo MK220', 'Aksesoris', 15, '350000.00', '2026-04-22 02:02:43', '2026-04-22 02:02:43'),
(4, 'Router Mikrotik RB450Gx4', 'Networking', 4, '1950000.00', '2026-04-22 02:03:47', '2026-04-23 23:35:43'),
(5, 'Printer Epson L3210 EcoTank', 'Elektronik', 7, '2450000.00', '2026-04-22 02:04:28', '2026-04-22 02:04:28'),
(6, 'Samsung Galaxy A54 5G 8/256GB', 'Unit Smartphone', 5, '5999000.00', '2026-04-22 02:06:27', '2026-04-22 02:06:27'),
(7, 'iPhone 15 Pro 128GB Titanium', 'Unit Smartphone', 10, '19450000.00', '2026-04-22 02:07:12', '2026-04-22 02:07:29'),
(8, 'Oppo Reno 10 Pro+ 5G', 'Unit Smartphone', 8, '10200000.00', '2026-04-22 02:08:04', '2026-04-22 02:08:04'),
(9, 'Powerbank Anker 737 140W', 'Aksesoris', 10, '1850000.00', '2026-04-22 02:08:33', '2026-04-22 02:08:33'),
(10, 'Headset Bluetooth JBL Wave 200', 'Audio', 15, '500000.00', '2026-04-22 02:09:05', '2026-04-22 02:09:05'),
(11, 'Tempered Glass King Kong (Universal)', 'Proteksi', 50, '35000.00', '2026-04-22 02:09:41', '2026-04-22 02:09:41'),
(12, 'Kabel Data Robot Type-C (Toples)', 'Aksesoris', 100, '15000.00', '2026-04-22 02:10:06', '2026-04-22 02:10:06'),
(13, 'iPhone 14 Pro 128GB', 'Unit Smartphone', 5, '11000000.00', '2026-04-22 21:25:03', '2026-04-23 23:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_04_20_020759_create_items_table', 1),
(6, '2026_04_20_031053_add_role_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@123.com', '2026-04-22 02:01:02', '$2y$12$LpI95jS.jjzrYwlw3lMCKOET39f/xKUhJpu2azpezvaVLJOWNVvKy', 'admin', 'kEVaurSBHjiD9Cqj1UioDD9JXiUXbd7HLafdHPfifdgXfSzNNr74ktoVPcUp', '2026-04-22 02:01:02', '2026-04-22 21:22:43'),
(2, 'Staf Operasional', 'user@123.com', '2026-04-22 02:01:02', '$2y$12$uqrDxcVq8d679wCegUMvauP/Rr925wQt6qckGObdkRIrvK/2m3ty.', 'user', 'bTj9B4MkMH', '2026-04-22 02:01:02', '2026-04-22 02:31:10'),
(3, 'Mrs. Gretchen D\'Amore V', 'kenyon.mann@example.net', '2026-04-22 02:01:02', '$2y$12$LFCPBjWbmaofkkCrpIgyeu5JStSiwlAp.xzhSzExBYxC7Z6Di.PpO', 'user', 'ZAcGuBSxO7', '2026-04-22 02:01:02', '2026-04-22 02:01:02'),
(4, 'Brant Bode DVM', 'camille.hauck@example.net', '2026-04-22 02:01:02', '$2y$12$LFCPBjWbmaofkkCrpIgyeu5JStSiwlAp.xzhSzExBYxC7Z6Di.PpO', 'user', 'wgiBTyXbn5', '2026-04-22 02:01:02', '2026-04-22 02:01:02'),
(5, 'Mr. Dorcas Quitzon V', 'gaylord.iva@example.com', '2026-04-22 02:01:02', '$2y$12$LFCPBjWbmaofkkCrpIgyeu5JStSiwlAp.xzhSzExBYxC7Z6Di.PpO', 'user', 'Vm1ZZfy90k', '2026-04-22 02:01:02', '2026-04-22 02:01:02'),
(6, 'Dr. Maximillian Feeney V', 'xhirthe@example.net', '2026-04-22 02:01:02', '$2y$12$LFCPBjWbmaofkkCrpIgyeu5JStSiwlAp.xzhSzExBYxC7Z6Di.PpO', 'user', 'P1MTo4m6d4', '2026-04-22 02:01:02', '2026-04-22 02:01:02'),
(7, 'Shanny Price', 'hauck.phoebe@example.org', '2026-04-22 02:01:02', '$2y$12$LFCPBjWbmaofkkCrpIgyeu5JStSiwlAp.xzhSzExBYxC7Z6Di.PpO', 'user', '4wVD3U7O2Q', '2026-04-22 02:01:02', '2026-04-22 02:01:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
