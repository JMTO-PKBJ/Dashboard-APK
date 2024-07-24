-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

-- Dumping structure for table laravel.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache: ~0 rows (approximately)

-- Dumping structure for table laravel.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravel.cctv
CREATE TABLE IF NOT EXISTS `cctv` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cctv_ruas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_id` bigint unsigned NOT NULL,
  `cctv_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cctv_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cctv_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cctv_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cctv_roles_id_foreign` (`roles_id`),
  CONSTRAINT `cctv_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cctv: ~20 rows (approximately)
INSERT INTO `cctv` (`id`, `cctv_ruas`, `roles_id`, `cctv_lokasi`, `cctv_waktu`, `cctv_video`, `cctv_status`, `created_at`, `updated_at`) VALUES
	(1, 'Jalan Raya 1', 1, 'Cawang Uki', '2024-07-16 06:21:53', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:21:53', '2024-07-15 23:21:53'),
	(2, 'Jalan Raya 2', 1, 'Pluit', '2024-07-16 06:23:05', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:23:05', '2024-07-15 23:23:05'),
	(3, 'Jalan Raya 3', 1, 'Jatiasih', '2024-07-16 06:29:21', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:29:21', '2024-07-15 23:29:21'),
	(4, 'Jalan Raya 4', 1, 'Jatiwaringin', '2024-07-16 06:29:32', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:29:32', '2024-07-15 23:29:32'),
	(5, 'Jalan Raya 5', 1, 'BSD City', '2024-07-16 06:29:40', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:29:40', '2024-07-15 23:29:40'),
	(6, 'Jalan Raya 6', 1, 'Gatot Subroto', '2024-07-16 06:29:56', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:29:56', '2024-07-15 23:29:56'),
	(7, 'Jalan Raya 7', 1, 'Pancoran', '2024-07-16 06:30:10', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:30:10', '2024-07-15 23:30:10'),
	(8, 'Jalan Raya 8', 1, 'Bekasi', '2024-07-16 06:30:26', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-15 23:30:26', '2024-07-15 23:30:26'),
	(9, 'Jalan Raya 6', 1, 'Pancoran', '2024-07-19 08:18:43', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-19 01:18:43', '2024-07-19 01:18:43'),
	(10, 'Jalan Raya 6', 1, 'Pancoran', '2024-07-19 08:19:00', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-19 01:19:00', '2024-07-19 01:19:00'),
	(11, 'Jalan Raya 1', 1, 'Jatiasih', '2024-07-19 08:44:06', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-19 01:44:06', '2024-07-19 01:44:06'),
	(12, 'Jalan Raya 6', 1, 'Pancoran', '2024-07-19 15:02:50', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-19 08:02:50', '2024-07-19 08:02:50'),
	(13, 'Jalan Raya 7', 1, 'Gatot Subroto', '2024-07-19 16:22:22', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-19 09:22:22', '2024-07-19 09:22:22'),
	(14, 'Jalan Raya 8', 1, 'BSD City', '2024-07-19 16:29:42', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-19 09:29:42', '2024-07-19 09:29:42'),
	(15, 'Jalan Raya 7', 1, 'BSD City', '2024-07-21 10:54:22', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-21 03:54:22', '2024-07-21 03:54:22'),
	(16, 'Jalan Raya 1', 1, 'Pluit', '2024-07-22 04:40:43', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-21 21:40:43', '2024-07-21 21:40:43'),
	(17, 'Jalan Raya 6', 1, 'Jatiwaringin', '2024-07-22 15:56:48', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-22 08:56:48', '2024-07-22 08:56:48'),
	(18, 'Jalan Raya 9', 1, 'Cimahi', '2024-07-22 15:57:36', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-22 08:57:36', '2024-07-22 08:57:36'),
	(19, 'Jalan Raya 9', 1, 'Pancoran', '2024-07-24 02:06:54', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-23 19:06:54', '2024-07-23 19:06:54'),
	(20, 'Bogor', 1, 'Ciawi', '2024-07-24 07:36:40', 'https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8', 'on', '2024-07-24 00:36:40', '2024-07-24 00:36:40');

-- Dumping structure for table laravel.event
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cctv_id` bigint unsigned NOT NULL,
  `event_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_cctv_id_foreign` (`cctv_id`),
  CONSTRAINT `event_cctv_id_foreign` FOREIGN KEY (`cctv_id`) REFERENCES `cctv` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.event: ~12 rows (approximately)
INSERT INTO `event` (`event_id`, `cctv_id`, `event_waktu`, `event_lokasi`, `event_class`, `event_gambar`, `created_at`, `updated_at`) VALUES
	(5, 3, '2024-07-10 02:00:00', 'Jatiasih', 'Bus', 'https://asset.kompas.com/crops/y0icLiBt8zkne_OIhbImu9ALgec=/0x0:0x0/1200x800/data/photo/2022/05/06/62750d12b98da.jpg', '2024-07-16 10:21:27', '2024-07-16 10:21:27'),
	(7, 4, '2024-06-11 01:45:00', 'Jatiwaringin', 'Truck', 'https://www.humas.polri.go.id/wp-content/uploads/2023/12/arus-mudik-natal-2022-di-tol-japek-3_169-768x433-1.jpeg', '2024-07-16 10:24:53', '2024-07-16 10:24:53'),
	(12, 20, '2024-07-10 01:53:00', 'Ciawi', 'Truck', 'https://disk.mediaindonesia.com/thumbs/800x467/news/2024/03/983fe51d536a772ee4be503269266286.jpg', '2024-07-17 01:08:37', '2024-07-17 01:08:37'),
	(13, 20, '2024-07-10 01:53:00', 'Ciawi', 'Truck', 'https://cdn.idntimes.com/content-images/post/20220224/antarafoto-kenaikan-tarif-tol-dalkot-090222-ak-3-5eea2e3b5c6cf3f029bac87b8cff8b5b_600x400.jpg', '2024-07-17 01:27:38', '2024-07-17 01:27:38'),
	(14, 20, '2024-07-17 02:53:00', 'Ciawi', 'Truck', 'https://cdn.idntimes.com/content-images/post/20220224/antarafoto-kenaikan-tarif-tol-dalkot-090222-ak-3-5eea2e3b5c6cf3f029bac87b8cff8b5b_600x400.jpg', '2024-07-17 01:28:33', '2024-07-17 01:28:33'),
	(15, 20, '2024-07-17 03:53:00', 'Ciawi', 'Mobil Keluarga', 'https://ugm.ac.id/wp-content/uploads/2022/09/12092216629581951894932914.jpeg', '2024-07-17 02:51:10', '2024-07-17 02:51:10'),
	(16, 20, '2024-07-17 03:52:00', 'Ciawi', 'Bus', 'https://www.inilah.com/_next/image?url=https%3A%2F%2Fc.inilah.com%2Freborn%2F2023%2F08%2F1%2F0415_120624_2d10_inilah_com_75e51d30e1.jpg&w=1920&q=75', '2024-07-17 02:52:33', '2024-07-17 02:52:33'),
	(17, 20, '2024-07-17 04:57:00', 'Ciawi', 'Bus', 'https://asset-2.tstatic.net/jateng/foto/bank/images/jalan-tol-ungaran-bawen-diresmikan-4-april-2014.jpg', '2024-07-17 02:54:37', '2024-07-17 02:54:37'),
	(18, 20, '2024-07-17 04:57:07', 'Ciawi', 'Bus', 'https://cdn.idntimes.com/content-images/post/20220224/antarafoto-kenaikan-tarif-tol-dalkot-090222-ak-3-5eea2e3b5c6cf3f029bac87b8cff8b5b_600x400.jpg', '2024-07-17 02:55:45', '2024-07-17 02:55:45'),
	(19, 20, '2024-07-17 04:57:26', 'Ciawi', 'Truck', 'https://cdn.idntimes.com/content-images/post/20220224/antarafoto-kenaikan-tarif-tol-dalkot-090222-ak-3-5eea2e3b5c6cf3f029bac87b8cff8b5b_600x400.jpg', '2024-07-17 02:57:28', '2024-07-17 02:57:28'),
	(20, 20, '2024-07-19 02:57:26', 'Ciawi', 'Bus', 'https://cdn.idntimes.com/content-images/post/20220224/antarafoto-kenaikan-tarif-tol-dalkot-090222-ak-3-5eea2e3b5c6cf3f029bac87b8cff8b5b_600x400.jpg', '2024-07-18 20:19:02', '2024-07-18 20:19:02'),
	(21, 20, '2024-04-12 02:57:26', 'Ciawi', 'Bus', 'https://cdn.idntimes.com/content-images/post/20220224/antarafoto-kenaikan-tarif-tol-dalkot-090222-ak-3-5eea2e3b5c6cf3f029bac87b8cff8b5b_600x400.jpg', '2024-07-18 20:40:00', '2024-07-18 20:40:00');

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~6 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '2024_06_27_072527_create_posts_table', 1),
	(4, '2024_06_27_075133_create_personal_access_tokens_table', 1),
	(5, '2024_07_09_104306_create_cctv_table', 1),
	(6, '2024_07_09_134738_create_event_table', 1);

-- Dumping structure for table laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.posts: ~0 rows (approximately)

-- Dumping structure for table laravel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', NULL, NULL),
	(2, 'Supervisor', NULL, NULL),
	(3, 'Operator', NULL, NULL);

-- Dumping structure for table laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('mjPewBnlkqBDxL9E9dD3HSIwvjUIuVVWfIBp7WV8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiS09sQlJ3WlRhblNha05Ra0lvTUYxQnN1d2xSb1RIZ3FXeXJieWxJaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1721806338),
	('yl8K8u8demDho23IRplhTGa1pR2mknviHoEMvHLD', 58, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXcxZHFhQTVRNjBuVEJLTW95RmdXSmJZczNyaWJtcElMMU9ndnF2SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXBlcnZpc29yL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU4O30=', 1721807484);

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~9 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'noel', '$2y$12$q9MjWks8cn6aazermePAgux33wZHULmVqh6GpHqVfVCF6.JixhvZq', 1, NULL, '2024-07-15 23:21:46', '2024-07-19 08:55:38'),
	(3, 'admin', '$2y$12$zedSlE3ojXyN09lYQ1/E4.xSilOUMisDkYzD2mgQc3gXkTT8Mzd/G', 1, NULL, '2024-07-19 08:56:27', '2024-07-22 07:05:51'),
	(45, 'obetgigornio', '$2y$12$13.zYtY3cSqFacy3uyi2o.cCurCler4EmJ56ZGrq0IxYs1QJs/YZG', 3, NULL, '2024-07-19 23:51:16', '2024-07-21 21:09:28'),
	(49, 'admin1', '$2y$12$w5skbMc8.Xe2vmCpibze/.aUVkH1ZzwpL8xS6P6YJw9mTuKcNkdzO', 1, NULL, '2024-07-21 06:04:49', '2024-07-21 06:04:49'),
	(52, 'iniakunbaru56', '$2y$12$7ZQgokMGTJXPg5lHIlZW7OnPm8B6HbGiLy2Lk0VAwEx.HmZB.fTfe', 1, NULL, '2024-07-21 21:12:33', '2024-07-22 23:36:13'),
	(54, 'supervisor', '$2y$12$QH8/0DsAsrNIaxvhj3EAs.ZUm4tRW/8JWTCZpnDI9cV1w91Yvl63S', 2, NULL, '2024-07-22 06:41:33', '2024-07-22 06:41:33'),
	(55, 'operator', '$2y$12$FLo4AacejKZHKVjwIlNI6..pbUoVQ8bJ8N1C/ZG6HbetDxX6fnXfC', 3, NULL, '2024-07-22 07:06:19', '2024-07-22 07:06:19'),
	(57, 'operator1', '$2y$12$Fu8WzhcvSbfexfymPfadDOMDfIdOMsgCXwEg9fDQMt2Ob4XQIc1gC', 3, NULL, '2024-07-24 00:49:52', '2024-07-24 00:49:52'),
	(58, 'supervisor1', '$2y$12$75/xk1/V0MEtXT5wyWPGbO31ay6Y7HpNrbLHQ19kbJV2uCgSRhkw6', 2, NULL, '2024-07-24 00:50:36', '2024-07-24 00:50:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
