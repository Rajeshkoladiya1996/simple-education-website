-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 01:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_02_18_044818_entrust_setup_tables', 1),
(10, '2020_02_19_041449_movers', 2),
(11, '2020_02_19_052220_parkers', 3),
(12, '2020_02_19_053033_storagedata', 4),
(13, '2020_02_19_065046_truck-rental', 5);

-- --------------------------------------------------------

--
-- Table structure for table `movers`
--

CREATE TABLE `movers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `1price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `5price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movers`
--

INSERT INTO `movers` (`id`, `name`, `image`, `1price`, `2price`, `3price`, `4price`, `5price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Durward Ryan', 'movers-5e4cc35f1f616.jpg', '20', '30', '40', '50', '65', 'inactive', '2020-02-18 23:40:55', '2020-02-19 00:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `parkers`
--

CREATE TABLE `parkers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `1price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `5price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parkers`
--

INSERT INTO `parkers` (`id`, `name`, `image`, `1price`, `2price`, `3price`, `4price`, `5price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'parkers-5e4cca3cc4ee8.jpg', '20', '30', '40', '50', '60', 'inactive', '2020-02-19 00:10:12', '2020-02-19 00:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create New Users', '2020-02-18 00:51:09', '2020-02-18 00:51:09'),
(2, 'edit-users', 'Edit Users', 'Edit Users', '2020-02-18 00:51:09', '2020-02-18 00:51:09'),
(3, 'delete-users', 'Delete Users', 'Delete Users', '2020-02-18 00:51:09', '2020-02-18 00:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'User is Admin ', '2020-02-18 00:51:09', '2020-02-18 00:51:09'),
(2, 'user', 'User', 'User ', '2020-02-18 00:51:09', '2020-02-18 00:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `storagedata`
--

CREATE TABLE `storagedata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `1price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `5price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `6price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `7price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storagedata`
--

INSERT INTO `storagedata` (`id`, `name`, `image`, `1price`, `2price`, `3price`, `4price`, `5price`, `6price`, `7price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Storage', 'storages-5e4cca8982740.jpg', '20', '30', '40', '50', '60', '70', '80', 'active', '2020-02-19 00:11:29', '2020-02-19 00:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `truck-rental`
--

CREATE TABLE `truck-rental` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `1price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `2price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `3price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `4price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `5price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `6price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `7price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_rental` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_1day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_2day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_3day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_4day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_5day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_6day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetrip_7day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truck-rental`
--

INSERT INTO `truck-rental` (`id`, `name`, `image`, `1price`, `2price`, `3price`, `4price`, `5price`, `6price`, `7price`, `local_rental`, `onetrip_1day`, `onetrip_2day`, `onetrip_3day`, `onetrip_4day`, `onetrip_5day`, `onetrip_6day`, `onetrip_7day`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'truckrental-5e4cfcc9b7f85.jpg', '10', '20', '30', '40', '50', '60', '70', '50', '50', '60', '70', '80', '90', '100', '120', 'inactive', '2020-02-19 03:45:53', '2020-02-19 03:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_no`, `status`, `profile_pic`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, '$2y$10$loXD4.o99k3aah1d3bZ7e./tn7Ld9WGz2Bk6WItNB8k4DRK7uiFqi', '9714007748', 'active', 'mixie-user-5e4bcd22243f5.png', NULL, '2020-02-18 00:51:10', '2020-02-18 22:37:02'),
(2, 'Punit Kathiriya', 'punitkathiriya@gmail.com', NULL, '12345678', '9714007748', 'active', 'mixie-user-5e4bcc0822a56.png', NULL, '2020-02-18 04:36:39', '2020-02-18 23:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movers`
--
ALTER TABLE `movers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkers`
--
ALTER TABLE `parkers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `storagedata`
--
ALTER TABLE `storagedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck-rental`
--
ALTER TABLE `truck-rental`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `movers`
--
ALTER TABLE `movers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parkers`
--
ALTER TABLE `parkers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storagedata`
--
ALTER TABLE `storagedata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `truck-rental`
--
ALTER TABLE `truck-rental`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
