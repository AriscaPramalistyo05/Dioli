-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2026 at 05:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(5, 'Program Hadiah', 'Program yang diberikan kepada Adit karena sudah berbelanja dengan setia', '2024-07-08 17:00:00', '2024-07-10 22:58:41', '2024-07-30 10:22:58'),
(6, 'Program Berbagi', 'Program berbagi untuk anak yatim dalam rangka bukber berkah', '2022-01-19 17:00:00', '2024-07-10 23:03:38', '2024-07-10 23:03:38'),
(7, 'Program Bermanfaat', 'Program ini memberikan manfaat kepada masyarakat sekitar', '2021-02-17 17:00:00', '2024-07-10 23:05:22', '2024-07-10 23:05:45');

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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kokis`
--

CREATE TABLE `kokis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kokis`
--

INSERT INTO `kokis` (`id`, `nama`, `jabatan`, `foto`, `instagram`, `facebook`, `x`, `created_at`, `updated_at`) VALUES
(3, 'Muhammad Muhaimin', 'Helper', '/storage/images/koki/1720623970.png', 'jhj', 'jhv', 'jh', '2024-07-10 08:06:10', '2024-07-10 08:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(8,2) NOT NULL,
  `kategori` enum('Murah','Ekonomi','Premium','Snack','Minuman') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `gambar`, `title`, `deskripsi`, `harga`, `kategori`, `created_at`, `updated_at`) VALUES
(4, 'public/images/menu/kAH6GsViWcY4HakFXa3sfwQ5a6qcLaOo7R2uyCpZ.png', 'Ayam Srundeng', 'Ayam + nasi + tempe goreng + lalapan', '15000.00', 'Murah', '2024-07-21 08:32:58', '2024-07-21 08:32:58'),
(5, 'public/images/menu/jxvE3JyHGnXJL5Ew56qr9EVO7oqkpGVlcFPNpidz.png', 'Nasi Pecel', 'Nasi + Pecel + Saos kacang + Telur + Perkedel', '15000.00', 'Murah', '2024-07-21 08:36:54', '2024-07-21 08:36:54'),
(6, 'public/images/menu/wOFSZNQwfeGisS3qWcRskzsv0IuqMlN3uZ0fn2WW.png', 'Nasi Goreng Kampung', 'Nasi goreng udang + Ayam suwiran + Telur + Kerupuk', '15000.00', 'Murah', '2024-07-21 08:37:58', '2024-07-21 08:37:58'),
(7, 'public/images/menu/lFStCvlM6I96dxyx3dwyQ5c9ov69xI48VRnvyf3N.png', 'Nasi Uduk Betawi', 'Nasi uduk + Kerupuk + Telur + Bihun', '15000.00', 'Murah', '2024-07-21 08:39:21', '2024-07-21 08:39:21'),
(8, 'public/images/menu/T8Bk4QMnUVBRk6hv4yc3pwNvRdvKYxKuRoCDmml2.png', 'Nasi Padang', 'Nasi + Opor ayam + Kerupuk + Telur + Daun singkong', '20000.00', 'Ekonomi', '2024-07-21 08:40:30', '2024-07-21 08:43:24'),
(9, 'public/images/menu/xG2UQaMFWnFrYYDIvz8pJoVg5wE5qUKKuidyGkjk.png', 'Sate Ayam', 'Sate + Lontong + Bumbu kacang + Kerupuk', '20000.00', 'Ekonomi', '2024-07-21 08:42:22', '2024-07-21 08:42:22'),
(10, 'public/images/menu/EkNFJA0wg5tyht57JZhaVeSF7d0vtV5TFi239NJJ.png', 'Ayam Rica-Rica', 'Ayam + Nasi + Lalapan', '20000.00', 'Ekonomi', '2024-07-21 08:43:01', '2024-07-21 08:43:01'),
(11, 'public/images/menu/ZFHSrbNv4LKJwXll96yJ6ncomOvm5817bhIoqre5.png', 'Chicken Teriyaki Don', 'Ayam teriyaki + Nasi + Kari', '30000.00', 'Premium', '2024-07-21 08:44:29', '2024-07-21 08:44:29'),
(12, 'public/images/menu/OhIHy2K5SlUovEmxNS85oGIwrWOqR8QPNUl4w644.png', 'Hot Chocolate Marsmallow', 'Minuman Chocolate dengan topping marsmallow', '12000.00', 'Minuman', '2024-07-21 08:45:24', '2024-07-21 08:45:24'),
(13, 'public/images/menu/habHu8qzYgUyURyQV5u3hzUI2wbNU4gKT92rnr1I.png', 'Ice Tea Original', 'Minuman es teh', '4000.00', 'Minuman', '2024-07-21 08:46:24', '2024-07-21 08:46:24'),
(14, 'public/images/menu/zu71YIhQvZTH5kKEZXsIoWz694GrRZLrL5ZdXTWG.png', 'Lemon Tea', 'Minuman teh dengan campuran lemon', '5000.00', 'Minuman', '2024-07-21 08:46:59', '2024-07-21 08:46:59'),
(15, 'public/images/menu/W9OWym2mlEdNOvjq0tdEODtQC5JIqYxi3cIDtKjZ.png', 'Choco Coffe Custard', 'Coming Soon', '0.00', 'Snack', '2024-07-21 08:52:44', '2024-07-21 08:52:44'),
(16, 'public/images/menu/EWnlMDEV2Lm8PbREW6YrXJJoXGoZJDUMugETt78e.png', 'Red Velvet Cheese Cake', 'Coming Soon', '0.00', 'Snack', '2024-07-21 08:54:43', '2024-07-21 08:54:43'),
(17, 'public/images/menu/rYHX6KA4FIBApZbQaaEyWqQNO8EAqRskMr9VSfkL.png', 'Pudding Sedot Creamy', 'Coming Soon', '0.00', 'Snack', '2024-07-21 08:55:46', '2024-07-21 08:59:21'),
(18, 'public/images/menu/q81Du0Uz5YUiTno9B4tbvNyAPHfOzZ6T23nHlEBH.png', 'Dessert Box', 'Coming Soon', '0.00', 'Snack', '2024-07-21 08:57:18', '2024-07-21 08:57:18'),
(19, 'public/images/menu/ZyuETxOksKPMNfOD0QBMy7oXWCgg9nG1CwjNY05N.png', 'Donat Mini', 'Coming Soon', '0.00', 'Snack', '2024-07-21 08:58:02', '2024-07-21 08:58:02'),
(20, 'public/images/menu/ExkvTgSKby218aZCz6oPcCh7d4imFgaEh4IPYdu9.png', 'Cheese Cuit', 'Coming Soon', '0.00', 'Snack', '2024-07-21 08:58:47', '2024-07-21 08:58:47');

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
(7, '2024_07_04_045648_create_blogs_table', 1),
(8, '2024_07_04_045739_create_feedbacks_table', 1),
(15, '2014_10_12_000000_create_users_table', 2),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(17, '2019_08_19_000000_create_failed_jobs_table', 2),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(20, '2024_06_27_181704_create_kokis_table', 2),
(21, '2024_07_04_064652_create_blogs_table', 3),
(22, '2024_07_04_064653_create_feedbacks_table', 3),
(24, '2024_07_18_140512_update_kategori_in_menus_table', 4),
(27, '2024_07_19_140732_create_menus_table', 5),
(28, '2024_07_19_141321_create_menus_table', 6),
(32, '2024_07_20_171228_create_pesan_table', 7),
(33, '2024_07_21_152535_create_menus_table', 8),
(34, '2024_07_21_173627_create_pesan_table', 9),
(35, '2024_07_23_094317_create_pesans_table', 10),
(36, '2016_06_01_000001_create_oauth_auth_codes_table', 11),
(37, '2016_06_01_000002_create_oauth_access_tokens_table', 11),
(38, '2016_06_01_000003_create_oauth_refresh_tokens_table', 11),
(39, '2016_06_01_000004_create_oauth_clients_table', 11),
(40, '2016_06_01_000005_create_oauth_personal_access_clients_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '6UuOoVNqh8g7lYdw3r7YcPmKqlTd8CVPEDy2ACiv', NULL, 'http://localhost', 1, 0, 0, '2024-07-23 03:15:28', '2024-07-23 03:15:28'),
(2, NULL, 'Laravel Password Grant Client', 'qoOaxZ7qNP7KspZVUhHQ0OrCCJT1xkPbnYi6bOT7', 'users', 'http://localhost', 0, 1, 0, '2024-07-23 03:15:29', '2024-07-23 03:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-23 03:15:29', '2024-07-23 03:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `user_id`, `name`, `email`, `phone`, `date`, `time`, `note`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, NULL, '0879857465', '2024-07-26', '12:21:00', 'Pesan 12', '2024-07-26 02:46:26', '2024-07-26 02:46:26'),
(4, 2, NULL, NULL, '0897157393', '2024-07-31', '19:00:00', 'Pesan paket murah ayam srundeng 12', '2024-07-29 02:19:51', '2024-07-29 02:19:51');

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
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$6e4l3sAmMl8ZbONKcNLlG.cDqbjKSF/hT2ktGYtZjKA.WQHERqVrW', '1', 'xdloGkl4hCGOMUyzr0xpP0cfWjos7928seQJF3itq6iqyHGcHzK7kcMSOsW0', '2024-07-08 20:06:55', '2024-07-08 20:06:55'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$R7xered/1vU312rYQeJPTeF6V04bpW8lbDJwpgLQ64kUTOhKf0416', '0', NULL, '2024-07-08 20:07:32', '2024-07-08 20:07:32'),
(3, 'Aris', 'aris@gmail.com', NULL, '$2y$10$KDNFHXGJZ1eLeSOp4xbyre82bK.hkZtWeQeCdXVkl/6isprxNf6Ha', '0', NULL, '2024-07-10 23:20:37', '2024-07-10 23:20:37'),
(6, 'Admin Dioli', 'admin@dioli.com', NULL, '$2y$10$6lir63bM347UnqsHGEtcJunICEyeDOPL9Zjre5lOvBs1zkvzEambm', '1', NULL, '2026-01-03 22:49:54', '2026-01-03 22:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kokis`
--
ALTER TABLE `kokis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesans_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kokis`
--
ALTER TABLE `kokis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesans`
--
ALTER TABLE `pesans`
  ADD CONSTRAINT `pesans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
