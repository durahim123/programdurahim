/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 90001
 Source Host           : localhost:3306
 Source Schema         : aplikasi_durahim_booking

 Target Server Type    : MySQL
 Target Server Version : 90001
 File Encoding         : 65001

 Date: 08/01/2025 16:59:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bookings
-- ----------------------------
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pasien_id` int NOT NULL,
  `dokter_id` int NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` double(15,2) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bookings
-- ----------------------------
BEGIN;
INSERT INTO `bookings` VALUES (2, 1, 1, '2025-01-10', '11:00', 1550000.00, 1, 'Cash', '2025-01-08 10:59:56', '2025-01-08 15:55:59');
INSERT INTO `bookings` VALUES (3, 1, 2, '2025-01-11', '11:00', 50000.00, 0, 'Cash', '2025-01-08 16:01:54', '2025-01-08 16:01:54');
COMMIT;

-- ----------------------------
-- Table structure for chat_categories
-- ----------------------------
DROP TABLE IF EXISTS `chat_categories`;
CREATE TABLE `chat_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_categories
-- ----------------------------
BEGIN;
INSERT INTO `chat_categories` VALUES (1, 'Estetika', NULL, NULL);
INSERT INTO `chat_categories` VALUES (2, 'Perawatan', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_role` enum('user','admin','bot') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bot',
  `is_bot` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_messages_category_id_foreign` (`category_id`),
  KEY `chat_messages_user_id_foreign` (`user_id`),
  CONSTRAINT `chat_messages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `chat_categories` (`id`),
  CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_messages
-- ----------------------------
BEGIN;
INSERT INTO `chat_messages` VALUES (1, 2, 1, 'sdfsd', 'user', 0, '2025-01-08 16:55:29', '2025-01-08 16:55:29');
INSERT INTO `chat_messages` VALUES (2, 2, NULL, 'Anda memilih kategori: Perawatan. Apa yang bisa kami bantu?', 'bot', 1, '2025-01-08 16:55:29', '2025-01-08 16:55:29');
INSERT INTO `chat_messages` VALUES (3, 2, 1, 'sdfsdf', 'user', 0, '2025-01-08 16:55:32', '2025-01-08 16:55:32');
INSERT INTO `chat_messages` VALUES (4, 2, NULL, 'Anda memilih kategori: Perawatan. Apa yang bisa kami bantu?', 'bot', 1, '2025-01-08 16:55:32', '2025-01-08 16:55:32');
INSERT INTO `chat_messages` VALUES (5, 2, 1, 'sdflsd', 'user', 0, '2025-01-08 16:55:34', '2025-01-08 16:55:34');
INSERT INTO `chat_messages` VALUES (6, 2, NULL, 'Anda memilih kategori: Perawatan. Apa yang bisa kami bantu?', 'bot', 1, '2025-01-08 16:55:34', '2025-01-08 16:55:34');
INSERT INTO `chat_messages` VALUES (7, NULL, 1, 'sdsfls', 'admin', 0, '2025-01-08 16:57:49', '2025-01-08 16:57:49');
COMMIT;

-- ----------------------------
-- Table structure for detail_bookings
-- ----------------------------
DROP TABLE IF EXISTS `detail_bookings`;
CREATE TABLE `detail_bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `layanan_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga_layanan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of detail_bookings
-- ----------------------------
BEGIN;
INSERT INTO `detail_bookings` VALUES (3, 2, 1, 1, 50000, '2025-01-08 15:59:40', '2025-01-08 15:59:40');
INSERT INTO `detail_bookings` VALUES (4, 2, 3, 1, 1500000, '2025-01-08 15:59:40', '2025-01-08 15:59:40');
INSERT INTO `detail_bookings` VALUES (5, 3, 1, 1, 50000, '2025-01-08 16:01:54', '2025-01-08 16:01:54');
COMMIT;

-- ----------------------------
-- Table structure for dokters
-- ----------------------------
DROP TABLE IF EXISTS `dokters`;
CREATE TABLE `dokters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari_praktek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_praktek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_dokter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of dokters
-- ----------------------------
BEGIN;
INSERT INTO `dokters` VALUES (1, '892342344294', 'Firman', 'Dokter Umum dan Kecantikan', '[\"Senin\",\"Rabu\",\"Jumat\"]', '[\"11:00 - 12:00\",\"11:00 - 12:00\",\"11:00 - 12:00\"]', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', '1736304795.png', '2024-12-24 09:40:03', '2025-01-08 09:59:04', NULL);
INSERT INTO `dokters` VALUES (2, '8527342342394', 'Fathur Rahman', 'Dokter Umum dan Kecantikan', '[\"Selasa\",\"Kamis\",\"Sabtu\"]', '[\"11:00 - 12:00\",\"11:00 - 12:00\",\"11:00 - 12:00\"]', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', '1736303436.png', '2024-12-24 09:41:01', '2025-01-08 09:59:18', NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for layanans
-- ----------------------------
DROP TABLE IF EXISTS `layanans`;
CREATE TABLE `layanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_layanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of layanans
-- ----------------------------
BEGIN;
INSERT INTO `layanans` VALUES (1, 'Perawatan', 'ACNE INJECTION', '50000', '1735008365.png', '<p>Injeksi acne adalah penyuntikan obat anti-inflamasi langsung ke jerawat atau cystic acne untuk mengurangi peradangan dan mempercepat penyembuhan. Suntik jerawat dilakukan untuk mengatasi jerawat yang meradang, seperti jerawat papula, jerawat nodul, dan jerawat kista.</p>', '2024-12-24 09:46:05', '2024-12-24 09:46:33', NULL);
INSERT INTO `layanans` VALUES (2, 'Estetika', 'Akupuntur', '100000', '1735008452.png', 'All Akupuntur 100k', '2024-12-24 09:47:32', '2024-12-24 09:47:32', NULL);
INSERT INTO `layanans` VALUES (3, 'Perawatan', 'BOTOX', '1500000', '1735009468.png', 'Injeksi Botox Full 1,5 jt • Injeksi Botox per-Unit 100k • Micro Botox 1 jt • Botox Premium 100k', '2024-12-24 10:04:28', '2024-12-24 10:04:28', NULL);
INSERT INTO `layanans` VALUES (4, 'Perawatan', 'EKSTRAKSI KOMEDO', '30000', '1735009519.png', 'Teknik prosedur ekstraksi komedo dimulai dengan cleaning, scrubbing, steaming, pengeluaran atau pengangkatan komedo, pemakaian masker, dan pemberian serum di akhir sesi. Teknik pengeluaran komedo dapat menggunakan ekstraktor komedo', '2024-12-24 10:05:19', '2024-12-24 10:05:19', NULL);
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_10_16_150050_create_dokters_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_10_16_150112_create_pasiens_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_10_16_150132_create_layanans_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_12_23_142809_create_bookings_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_12_23_142842_create_konsultasis_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_12_23_142849_create_ulasans_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_12_23_144257_create_detail_konsultasis_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_12_24_093825_add_profil_dokter_to_dokters_table', 2);
INSERT INTO `migrations` VALUES (13, '2024_12_24_094502_add_kategori_layanan_to_layanans_table', 3);
INSERT INTO `migrations` VALUES (14, '2024_12_24_094937_create_products_table', 4);
INSERT INTO `migrations` VALUES (15, '2024_12_24_143807_create_chat_categories_table', 5);
INSERT INTO `migrations` VALUES (16, '2024_12_24_143847_create_chat_messages_table', 5);
INSERT INTO `migrations` VALUES (17, '2025_01_08_095530_add_spesialis_to_dokters_table', 6);
INSERT INTO `migrations` VALUES (18, '2025_01_08_104802_create_detail_bookings_table', 7);
INSERT INTO `migrations` VALUES (19, '2025_01_08_132540_add_kategori_products_to_products_table', 8);
INSERT INTO `migrations` VALUES (20, '2025_01_08_164630_add_sender_role_to_chat_messages_table', 9);
COMMIT;

-- ----------------------------
-- Table structure for pasiens
-- ----------------------------
DROP TABLE IF EXISTS `pasiens`;
CREATE TABLE `pasiens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` int NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasiens_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pasiens
-- ----------------------------
BEGIN;
INSERT INTO `pasiens` VALUES (1, 'Putri', 'P', 2147483647, '2003-10-07', 'putri@gmail.com', 'Jl Pelajar Timur GG Sederhana No 19B Kel: Binjai Kec: Medan denai', 'PASIEN0001', '2024-12-24 13:34:18', '2024-12-24 13:34:18', NULL);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
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

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1, 'Apotek', 'ADVANCE GLOWING SERUM ( SERUM ADVANCE AND GLOW)', '160000', '1735009165.jpeg', '<p>Diformulasikan untuk mencerahkan, melembabkan, dan membuat kulit tampak lebih berkilau.</p>', '2024-12-24 09:59:25', '2025-01-08 13:52:25');
INSERT INTO `products` VALUES (2, 'Apotek', 'Advenace Moisturizer Day &Night Cream (Moisturizer)', '70000', '1735009245.jpeg', '<p>Diformulasikan dengan moisturizer active complex yaitu neef root extract dan kombinasi lima extract natural yang membantu melembabkan kulit , serta mengandung niacinamide yang membantu mencerahkan kulit wajah</p>', '2024-12-24 10:00:45', '2025-01-08 13:52:32');
INSERT INTO `products` VALUES (3, 'Akupuntur', 'FACIAL WASH BIOFUR| FACIAL WASH OILY', '65000', '1735009307.jpeg', '<p>FACIAL WASH BERJERAWAT DAN BERMINYAK</p>', '2024-12-24 10:01:47', '2025-01-08 13:52:38');
INSERT INTO `products` VALUES (4, 'Apotek', 'FACIAL WASH CERADERM LIQUID', '65000', '1735009387.jpeg', '<p>Memelihara kelembaban kulit Untuk kulit kering dan sensitif</p>', '2024-12-24 10:03:07', '2025-01-08 13:52:44');
COMMIT;

-- ----------------------------
-- Table structure for ulasans
-- ----------------------------
DROP TABLE IF EXISTS `ulasans`;
CREATE TABLE `ulasans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pasien_id` int NOT NULL,
  `layanan_id` int NOT NULL,
  `rating` int NOT NULL,
  `komen` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ulasans
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$4Psz8c8QxcmT43nG7WOU7OIQ.hdJiBeBCztGA2z6vJc1Af5NXH0Vi', 'admin', '', NULL, '2024-12-23 14:44:30', '2024-12-23 14:44:30', NULL);
INSERT INTO `users` VALUES (2, 'Putri', 'putri@gmail.com', 'Putri', NULL, '$2y$10$LKqgNI6wiDwb2xyIKtzg..VspfK4dNywPfstot.BwkBqA5uxnpn/O', 'pasien', '1', NULL, '2024-12-24 13:34:19', '2024-12-24 13:34:19', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
