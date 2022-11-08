-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2022 at 12:50 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkbpmyi_spk_moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_criteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_criteria` double(8,2) DEFAULT NULL,
  `tipe` enum('benefit','cost') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `kode`, `nama_criteria`, `bobot_criteria`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'PEKERJAAN AYAH', 0.20, 'cost', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(2, 'C2', 'PEKERJAAN IBU', 0.15, 'cost', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(3, 'C3', 'PENGHASILAN', 0.15, 'cost', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(4, 'C4', 'JUMLAH TANGGUNGAN', 0.15, 'benefit', '2022-10-14 02:17:24', '2022-10-15 05:36:50'),
(5, 'C5', 'NILAI RAPOT', 0.05, 'benefit', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(6, 'C6', 'PERINGKAT', 0.05, 'benefit', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(7, 'C7', 'WAKTU TEMPUH', 0.10, 'benefit', '2022-10-14 02:17:24', '2022-10-15 05:39:54'),
(8, 'C8', 'STATUS ORANGTUA', 0.15, 'cost', '2022-10-14 02:17:24', '2022-10-15 05:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_12_165349_create_criterias_table', 1),
(6, '2022_04_12_165430_create_subcriterias_table', 1),
(7, '2022_05_13_081612_create_siswas_table', 1),
(8, '2022_05_30_063125_create_perhitungans_table', 1);

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
-- Table structure for table `perhitungans`
--

CREATE TABLE `perhitungans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcriteria_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungans`
--

INSERT INTO `perhitungans` (`id`, `siswa_id`, `criteria_id`, `subcriteria_id`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 6),
(3, 1, 3, 13),
(4, 1, 4, 16),
(5, 1, 5, 18),
(6, 1, 6, 21),
(7, 1, 7, 24),
(8, 1, 8, 28),
(9, 2, 1, 3),
(10, 2, 2, 6),
(11, 2, 3, 12),
(12, 2, 4, 16),
(13, 2, 5, 18),
(14, 2, 6, 21),
(15, 2, 7, 24),
(16, 2, 8, 28),
(17, 3, 1, 3),
(18, 3, 2, 6),
(19, 3, 3, 12),
(20, 3, 4, 15),
(21, 3, 5, 19),
(22, 3, 6, 22),
(23, 3, 7, 24),
(24, 3, 8, 28),
(25, 4, 1, 3),
(26, 4, 2, 6),
(27, 4, 3, 11),
(28, 4, 4, 14),
(29, 4, 5, 18),
(30, 4, 6, 21),
(31, 4, 7, 24),
(32, 4, 8, 28),
(33, 5, 1, 1),
(34, 5, 2, 8),
(35, 5, 3, 11),
(36, 5, 4, 15),
(37, 5, 5, 18),
(38, 5, 6, 21),
(39, 5, 7, 23),
(40, 5, 8, 27),
(41, 6, 1, 3),
(42, 6, 2, 6),
(43, 6, 3, 12),
(44, 6, 4, 15),
(45, 6, 5, 19),
(46, 6, 6, 22),
(47, 6, 7, 24),
(48, 6, 8, 28),
(49, 7, 1, 4),
(50, 7, 2, 6),
(51, 7, 3, 13),
(52, 7, 4, 15),
(53, 7, 5, 19),
(54, 7, 6, 22),
(55, 7, 7, 25),
(56, 7, 8, 28),
(57, 8, 1, 2),
(58, 8, 2, 6),
(59, 8, 3, 11),
(60, 8, 4, 15),
(61, 8, 5, 17),
(62, 8, 6, 20),
(63, 8, 7, 23),
(64, 8, 8, 27),
(65, 9, 1, 3),
(66, 9, 2, 6),
(67, 9, 3, 12),
(68, 9, 4, 15),
(69, 9, 5, 19),
(70, 9, 6, 22),
(71, 9, 7, 24),
(72, 9, 8, 28),
(73, 10, 1, 3),
(74, 10, 2, 6),
(75, 10, 3, 12),
(76, 10, 4, 14),
(77, 10, 5, 18),
(78, 10, 6, 21),
(79, 10, 7, 24),
(80, 10, 8, 28);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nama_siswa`, `nis`, `nisn`, `nama_ayah`, `nama_ibu`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Kenji Denista Saputra', 4277, 317270, 'Zul Asmi', 'Sri Kurnia', 'Desa Istana', '2022-10-14 02:17:24', '2022-11-08 10:35:16'),
(2, 'Purnama Zhelfi Alfika', 4285, 318076, 'Gugun', 'Krisdayanti', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(3, 'Daniel Alpiansah', 4272, 314272, 'M. Ahmadi', 'Juliana', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(4, 'Reski Saputra', 4286, 314286, 'Samsudin', 'Suwardah', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(5, 'Fita Al-Zahra', 4273, 314273, 'Amran', 'Septiana', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(6, 'Fatta Arrazaq', 4272, 314272, 'Suharni', 'Ayu Haniah', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(7, 'Vero Alfatih', 4289, 314289, 'Hasimun', 'Normala', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(8, 'Jahrah', 4275, 314275, 'Aidia', 'Suriana', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(9, 'Aprilia', 4269, 314269, 'Sahbana', 'Kiki', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(10, 'Abjil Qodir', 4267, 314267, 'Yudianto', 'Dewi', 'Desa Istana', '2022-10-14 02:17:24', '2022-10-14 02:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `subcriterias`
--

CREATE TABLE `subcriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama_subcriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subcriteria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcriterias`
--

INSERT INTO `subcriterias` (`id`, `criteria_id`, `nama_subcriteria`, `nilai_subcriteria`, `created_at`, `updated_at`) VALUES
(1, 1, 'TIDAK BEKERJA', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(2, 1, 'PETANI', 4, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(3, 1, 'WIRASWASTA', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(4, 1, 'SWASTA', 2, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(5, 1, 'PNS', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(6, 2, 'IRT (IBU RUMAH TANGGA)', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(7, 2, 'PETANI', 4, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(8, 2, 'WIRASWASTA', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(9, 2, 'SWASTA', 2, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(10, 2, 'PNS', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(11, 3, 'KURANG DARI 1.000.000', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(12, 3, '1.000.000-2.000.000', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(13, 3, 'LEBIH DARI 2.000.000', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(14, 4, 'LEBIH DARI 5', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(15, 4, '3-4', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(16, 4, 'KURANG DARI 2', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(17, 5, '90-100', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(18, 5, '80-89', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(19, 5, '70-79', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(20, 6, '1-3', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(21, 6, '4-10', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(22, 6, '11-15', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(23, 7, 'LEBIH DARI 21 MENIT', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(24, 7, '11-20 MENIT', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(25, 7, '1-10 MENIT', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(26, 8, 'YATIM PIATU', 5, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(27, 8, 'YATIM/PIATU', 3, '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(28, 8, 'LENGKAP', 1, '2022-10-14 02:17:24', '2022-10-14 02:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin1dfd', 'admin@gmail.com', '$2y$10$ZQfjjUA/FWbGynq1LXe6jOokvcfjNyPj1PXkltZYyX4Zcemp5zhem', 'ADMIN', '2022-10-14 02:17:23', '2022-10-14 02:49:10'),
(2, 'Admin2', 'Admin2', 'admin2@gmail.com', '$2y$10$2RlWtWu9vTk0nwXoAdW3Oe3VZZVS4fDahazCYA.wp8VxyJtSQ4YVu', 'ADMIN', '2022-10-14 02:17:24', '2022-10-14 02:17:24'),
(3, 'DM', 'dm2', 'dm@gmail.com', '$2y$10$z/uqHD2156iVFszgahe63OlgZHBQ71VGGrTotIaIcJlZ9sSsdLOIe', 'DM', '2022-10-14 02:17:24', '2022-10-14 02:17:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perhitungans_siswa_id_foreign` (`siswa_id`),
  ADD KEY `perhitungans_subcriteria_id_foreign` (`subcriteria_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcriterias`
--
ALTER TABLE `subcriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcriterias_criteria_id_foreign` (`criteria_id`);

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
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perhitungans`
--
ALTER TABLE `perhitungans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcriterias`
--
ALTER TABLE `subcriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perhitungans`
--
ALTER TABLE `perhitungans`
  ADD CONSTRAINT `perhitungans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perhitungans_subcriteria_id_foreign` FOREIGN KEY (`subcriteria_id`) REFERENCES `subcriterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcriterias`
--
ALTER TABLE `subcriterias`
  ADD CONSTRAINT `subcriterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
