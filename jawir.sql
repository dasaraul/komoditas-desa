-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kompre-jawir
CREATE DATABASE IF NOT EXISTS `kompre-jawir` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `kompre-jawir`;

-- Dumping structure for table kompre-jawir.desas
CREATE TABLE IF NOT EXISTS `desas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.desas: ~2 rows (approximately)
INSERT INTO `desas` (`id`, `kode`, `nama_desa`, `created_at`, `updated_at`) VALUES
	(3, 'D01', 'Hutanjulu', '2023-09-07 09:35:16', '2023-09-07 09:35:16'),
	(4, 'D02', 'Ria-Ria', '2023-09-07 09:35:40', '2023-09-07 09:35:40');

-- Dumping structure for table kompre-jawir.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table kompre-jawir.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.kategoris: ~2 rows (approximately)
INSERT INTO `kategoris` (`id`, `kode`, `kategori`, `created_at`, `updated_at`) VALUES
	(8, 'SP', 'Sudah Panen', '2023-09-07 09:54:36', '2023-09-07 09:54:36'),
	(9, 'MT', 'Masih Tanam', '2023-09-07 09:54:49', '2023-09-07 09:54:49');

-- Dumping structure for table kompre-jawir.komoditas_desas
CREATE TABLE IF NOT EXISTS `komoditas_desas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `desa_id` bigint(20) unsigned NOT NULL,
  `kategori_id` bigint(20) unsigned NOT NULL,
  `komoditi_id` bigint(20) unsigned NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `komoditas_desas_desa_id_foreign` (`desa_id`),
  KEY `komoditas_desas_kategori_id_foreign` (`kategori_id`),
  KEY `komoditas_desas_komoditi_id_foreign` (`komoditi_id`),
  CONSTRAINT `komoditas_desas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `komoditas_desas_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  CONSTRAINT `komoditas_desas_komoditi_id_foreign` FOREIGN KEY (`komoditi_id`) REFERENCES `komoditis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.komoditas_desas: ~3 rows (approximately)
INSERT INTO `komoditas_desas` (`id`, `desa_id`, `kategori_id`, `komoditi_id`, `jumlah`, `created_at`, `updated_at`) VALUES
	(15, 3, 8, 6, 333333.00, '2023-09-17 04:35:13', '2023-09-17 04:35:13'),
	(16, 4, 9, 6, 43434.00, '2023-09-17 04:35:33', '2023-09-17 04:35:33'),
	(17, 4, 9, 6, 43434.00, '2023-09-17 04:35:33', '2023-09-17 04:35:33');

-- Dumping structure for table kompre-jawir.komoditis
CREATE TABLE IF NOT EXISTS `komoditis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) NOT NULL,
  `nama_komoditi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.komoditis: ~2 rows (approximately)
INSERT INTO `komoditis` (`id`, `kode`, `nama_komoditi`, `created_at`, `updated_at`) VALUES
	(6, 'KM01', 'Bawang Merah', '2023-09-07 09:39:46', '2023-09-07 09:39:46'),
	(7, 'KM02', 'Buncis', '2023-09-07 09:50:48', '2023-09-07 09:50:48');

-- Dumping structure for table kompre-jawir.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_09_07_013323_create_kategoris_table', 2),
	(6, '2023_09_07_033215_create_desas_table', 3),
	(7, '2023_09_07_040339_create_komoditis_table', 4),
	(8, '2023_09_07_043832_create_komoditas_desas_table', 5);

-- Dumping structure for table kompre-jawir.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table kompre-jawir.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table kompre-jawir.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kompre-jawir.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$11o6HqeNCgeDv/O9i/1gc.6IgicJdkpD0FRhv2TLpBwnk4n6uedce', NULL, '2023-09-06 18:07:41', '2023-09-06 18:07:41'),
	(3, 'Jawir', 'tama@jawir.co', NULL, '$2y$10$SO5G.MTbHLrZMmiY5x5gqeo0loXEJbFOSTnKBx/QE8Zyoy1LJQPqS', 'E6w2GQBIGI7910ZYPQhEY7IGBE1PXuT9p86tdgnUliBLnKSDlGNZ1fgCdktT', '2023-09-07 09:30:51', '2023-09-07 09:30:51'),
	(5, 'jawir', 'jawir@co.co', NULL, '$2y$10$IHO.0Ky/OkAGtujcWjFaiOXXFYmexnmuTDaaQp9/hSdVFxXEXcu8G', NULL, '2023-09-17 01:35:36', '2023-09-17 01:35:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
