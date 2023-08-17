-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 17, 2023 at 11:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base_shopify`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `shop`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'test-samin-2.myshopify.com', 'shpua_100869d44f799b1aaf0b634bbd633245', NULL, '2023-06-16 03:50:03', '2023-06-16 03:50:03'),
(3, 'test-samin-2.myshopify.com', 'shpua_cf55795b00513e0bc80d348be7460626', NULL, '2023-06-20 00:28:46', '2023-06-20 00:28:46'),
(4, 'test-samin-2.myshopify.com', 'shpua_f91abebc6ef20cfa58cbadc8f6a871b5', NULL, '2023-06-20 00:32:51', '2023-06-20 00:32:51'),
(5, 'test-samin-2.myshopify.com', 'shpua_b7e52f6e5ad21b4d478ad35c22f1422e', NULL, '2023-07-05 06:52:04', '2023-07-05 06:52:04'),
(6, 'test-samin-2.myshopify.com', 'shpua_6cc03a771a5abd18a2520ff9b1ac4b9f', NULL, '2023-07-07 03:21:10', '2023-07-07 03:21:10'),
(7, 'test-samin-2.myshopify.com', 'shpua_265c21975b5ba3b5bb807d63823727b8', NULL, '2023-07-07 03:33:10', '2023-07-07 03:33:10'),
(8, 'test-samin-2.myshopify.com', 'shpua_c8da37a60d814efa99064be1b5c44a9b', NULL, '2023-07-07 03:35:21', '2023-07-07 03:35:21'),
(9, 'test-samin-2.myshopify.com', 'shpua_6a16e6adfaa5aadb137cceb6fc9afba7', NULL, '2023-07-11 04:59:39', '2023-07-11 04:59:39'),
(10, 'test-samin-2.myshopify.com', 'shpua_6a16e6adfaa5aadb137cceb6fc9afba7', NULL, '2023-07-11 05:05:04', '2023-07-11 05:05:04'),
(11, 'test-samin-2.myshopify.com', 'shpua_16ee88d9093fa636e23d6b117114b651', NULL, '2023-07-18 03:37:34', '2023-07-18 03:37:34'),
(12, 'test-samin-2.myshopify.com', 'shpua_aa7c1fbf2ac2577c0b7cc6c6a00ebd2d', NULL, '2023-07-18 03:40:12', '2023-07-18 03:40:12'),
(13, 'test-samin-2.myshopify.com', 'shpua_24492bbc08e37a2332a35a2de973f4ff', NULL, '2023-08-14 05:57:04', '2023-08-14 05:57:04'),
(14, 'test-samin-2.myshopify.com', 'shpua_ad95c34ce91d3a0aa8f22ae3af3a43d0', NULL, '2023-08-14 05:59:33', '2023-08-14 05:59:33');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
