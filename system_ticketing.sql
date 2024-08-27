-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2024 at 06:19 AM
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
-- Database: `system_ticketing`
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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `idKomentar` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `idKomentar` bigint UNSIGNED NOT NULL,
  `idTiket` bigint UNSIGNED NOT NULL,
  `userId` bigint UNSIGNED NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lampirans`
--

CREATE TABLE `lampirans` (
  `id` bigint UNSIGNED NOT NULL,
  `idTiket` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lampirans`
--

INSERT INTO `lampirans` (`id`, `idTiket`, `name`, `path`, `created_at`, `updated_at`) VALUES
(2, 12024002, 'Lacak Dokumen.pdf', 'image-66c451464ee8c1.18168305/Lacak Dokumen.pdf', '2024-08-20 01:18:25', '2024-08-20 01:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `mandays`
--

CREATE TABLE `mandays` (
  `idMandays` bigint UNSIGNED NOT NULL,
  `idProyek` bigint UNSIGNED NOT NULL,
  `mandays` int NOT NULL,
  `tahun` date NOT NULL,
  `terpakai` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mandays`
--

INSERT INTO `mandays` (`idMandays`, `idProyek`, `mandays`, `tahun`, `terpakai`, `created_at`, `updated_at`) VALUES
(1, 1, 24, '2024-08-09', 0, '2024-08-08 20:51:30', '2024-08-23 00:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `idMenu` bigint UNSIGNED NOT NULL,
  `namaMenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baseUrl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`idMenu`, `namaMenu`, `baseUrl`, `label`, `status`, `created_at`, `updated_at`) VALUES
(1, 'master_user_index', 'masterUser.index', NULL, 1, NULL, NULL),
(2, 'master_user_show', 'masterUser.show', NULL, 1, NULL, NULL),
(3, 'master_user_store', 'masterUser.store', NULL, 1, NULL, NULL),
(4, 'master_user_update', 'masterUser.update', NULL, 1, NULL, NULL),
(5, 'master_user_destroy', 'masterUser.destroy', NULL, 1, NULL, NULL),
(6, 'profile_edit', 'profile.edit', NULL, 1, NULL, NULL),
(7, 'profile_update', 'profile.update', NULL, 1, NULL, NULL),
(8, 'profile_destroy', 'profile.destroy', NULL, 1, NULL, NULL),
(9, 'grup_user_index', 'grup-user.index', NULL, 1, NULL, '2024-08-21 02:45:33'),
(10, 'grup_user_store', 'grup-user.store', NULL, 1, NULL, '2024-08-22 19:39:05'),
(11, 'grup_user_update', 'grup-user.update', 'buat update grup user', 1, NULL, '2024-08-23 02:42:01'),
(13, 'menu_index', 'menu.index', NULL, 1, NULL, NULL),
(14, 'menu_store', 'menu.store', NULL, 1, NULL, NULL),
(15, 'menu_update', 'menu.update', NULL, 1, NULL, NULL),
(16, 'menu_destroy', 'menu.destroy', NULL, 1, NULL, NULL),
(17, 'permission_index', 'permission.index', NULL, 1, NULL, NULL),
(18, 'permission_store', 'permission.store', NULL, 1, NULL, NULL),
(19, 'permission_update', 'permission.update', NULL, 1, NULL, NULL),
(20, 'permission_destroy', 'permission.destroy', NULL, 1, NULL, NULL),
(21, 'proyek_index', 'proyek.index', NULL, 1, NULL, NULL),
(22, 'proyek_store', 'proyek.store', NULL, 1, NULL, NULL),
(23, 'proyek_update', 'proyek.update', NULL, 1, NULL, NULL),
(24, 'proyek_destroy', 'proyek.destroy', NULL, 1, NULL, NULL),
(25, 'mandays_index', 'mandays.index', NULL, 1, NULL, NULL),
(26, 'mandays_store', 'mandays.store', NULL, 1, NULL, NULL),
(27, 'mandays_update', 'mandays.update', NULL, 1, NULL, NULL),
(28, 'mandays_destroy', 'mandays.destroy', NULL, 1, NULL, NULL),
(29, 'tiket_index', 'tiket.index', NULL, 1, NULL, NULL),
(30, 'tiket_create', 'tiket.create', NULL, 1, NULL, NULL),
(31, 'tiket_user_create', 'userTiket.create', NULL, 1, NULL, NULL),
(32, 'tiket_store', 'tiket.store', NULL, 1, NULL, NULL),
(33, 'tiket_show', 'tiket.show', NULL, 1, NULL, NULL),
(34, 'tiket_update', 'tiket.update', NULL, 1, NULL, NULL),
(35, 'tiket_destroy', 'tiket.destroy', NULL, 1, NULL, NULL),
(36, 'komentar_index', 'komentar.index', NULL, 1, NULL, NULL),
(37, 'komentar_store', 'komentar.store', NULL, 1, NULL, NULL),
(38, 'komentar_update', 'komentar.update', NULL, 1, NULL, NULL),
(39, 'komentar_destroy', 'komentar.destroy', NULL, 1, NULL, NULL),
(41, 'grup_user_destroy', 'grup-user.destroy', 'untuk menghapus role grup user', 1, '2024-08-21 02:32:34', '2024-08-22 23:37:42'),
(43, 'store_tiket_create', 'create-tiket', NULL, 1, '2024-08-25 19:27:17', '2024-08-25 19:27:17'),
(44, 'create_tiket_user', 'userTiket.create', NULL, 1, '2024-08-25 20:15:17', '2024-08-25 20:15:17');

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
(30, '2014_07_12_030334_create_proyeks_table', 1),
(31, '2014_10_09_035324_create_menus_table', 1),
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(34, '2019_08_19_000000_create_failed_jobs_table', 1),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2024_07_16_082917_create_permission_tables', 1),
(37, '2024_07_22_072050_create_mandays_table', 1),
(38, '2024_07_23_082231_add_nullable_to_nama_group_in_proyeks', 1),
(39, '2024_07_26_035141_create_tikets_table', 1),
(40, '2024_07_30_024336_add_columns_to_tikets', 1),
(41, '2024_07_31_082755_create_komentars_table', 1),
(42, '2024_08_09_033213_create_images_table', 2),
(43, '2024_08_09_033225_create_temporary_images_table', 2),
(44, '2024_08_14_024102_create_lampirans_table', 3),
(45, '2024_08_26_070039_add_status_user_to_users', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(8, 'App\\Models\\User', 21),
(1, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 25);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `deskripsi`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'master_user_index', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(2, 'master_user_show', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(3, 'master_user_store', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(4, 'master_user_update', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(5, 'master_user_destroy', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(6, 'profile_edit', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(7, 'profile_update', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(8, 'profile_destroy', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(9, 'grup_user_index', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(10, 'grup_user_store', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(11, 'grup_user_update', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(12, 'grup_user_destroy', 'buat hapus grup user', 'web', '2024-08-20 21:07:48', '2024-08-21 02:02:29'),
(13, 'menu_index', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(14, 'menu_store', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(15, 'menu_update', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(16, 'menu_destroy', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(17, 'permission_index', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(18, 'permission_store', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(19, 'permission_update', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(20, 'permission_destroy', NULL, 'web', '2024-08-20 21:07:48', '2024-08-20 21:07:48'),
(21, 'proyek_index', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(22, 'proyek_store', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(23, 'proyek_update', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(24, 'proyek_destroy', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(25, 'mandays_index', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(26, 'mandays_store', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(27, 'mandays_update', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(28, 'mandays_destroy', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(29, 'tiket_index', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(30, 'tiket_create', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(31, 'tiket_user_create', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(32, 'tiket_store', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(33, 'tiket_show', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(34, 'tiket_update', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(35, 'tiket_destroy', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(36, 'komentar_index', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(37, 'komentar_store', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(38, 'komentar_update', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(39, 'komentar_destroy', NULL, 'web', '2024-08-20 21:07:49', '2024-08-20 21:07:49'),
(44, 'create_tiket_user', 'untuk membuat tiket dari client', 'web', '2024-08-25 19:25:25', '2024-08-25 19:25:25'),
(45, 'store_tiket_create', 'store tiket untuk user', 'web', '2024-08-25 19:26:50', '2024-08-25 19:26:50');

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
-- Table structure for table `proyeks`
--

CREATE TABLE `proyeks` (
  `idProyek` bigint UNSIGNED NOT NULL,
  `namaProyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipeRs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` tinyint(1) NOT NULL,
  `namaGroup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglMulai` date NOT NULL,
  `tglAkhir` date NOT NULL,
  `konsepKerjasama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proyeks`
--

INSERT INTO `proyeks` (`idProyek`, `namaProyek`, `tipeRs`, `group`, `namaGroup`, `tglMulai`, `tglAkhir`, `konsepKerjasama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Proyek ABC', 'D', 0, NULL, '2024-08-09', '2024-08-29', 'D', 'Jalan Damar', '2024-08-09 03:40:59', '2024-08-23 00:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', NULL, '2024-08-21 01:59:27', '2024-08-21 01:59:27'),
(3, 'User', 'web', NULL, '2024-08-22 00:03:05', '2024-08-22 00:03:05'),
(4, 'Profile', 'web', NULL, '2024-08-22 00:55:07', '2024-08-22 00:55:07'),
(6, 'Admin Super', 'web', NULL, '2024-08-22 23:38:39', '2024-08-22 23:38:39'),
(8, 'Admin', 'web', NULL, '2024-08-25 19:30:25', '2024-08-25 19:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(6, 4),
(7, 4),
(8, 4),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 8),
(16, 8),
(17, 8),
(18, 8),
(19, 8),
(20, 8),
(21, 8),
(22, 8),
(23, 8),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 8),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(35, 8),
(36, 8),
(37, 8),
(38, 8),
(39, 8);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_images`
--

CREATE TABLE `temporary_images` (
  `id` bigint UNSIGNED NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tikets`
--

CREATE TABLE `tikets` (
  `idTiket` bigint UNSIGNED NOT NULL,
  `idProyek` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` enum('Bugs','General','Question','Request Change') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prioritas` enum('Low','Normal','High','Urgent','Immediete') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `severity` enum('Minor','Mayor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picRs` bigint UNSIGNED NOT NULL,
  `alasanPermintaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dampak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignTo` bigint UNSIGNED DEFAULT NULL,
  `plAviat` bigint UNSIGNED DEFAULT NULL,
  `persetujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglPersetujuan` date DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mandays` int DEFAULT NULL,
  `tglDikerjakan` date DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `tglSelesai` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tikets`
--

INSERT INTO `tikets` (`idTiket`, `idProyek`, `judul`, `deskripsi`, `kategori`, `prioritas`, `severity`, `picRs`, `alasanPermintaan`, `dampak`, `deleted_at`, `created_at`, `updated_at`, `label`, `assignTo`, `plAviat`, `persetujuan`, `tglPersetujuan`, `tag`, `mandays`, `tglDikerjakan`, `dueDate`, `tglSelesai`, `status`, `image`) VALUES
(12024001, 1, 'Bug', 'interface', 'Bugs', 'Low', 'Minor', 2, 'interface', 'interface', NULL, '2024-08-08 23:30:49', '2024-08-23 00:53:52', NULL, 2, 2, '1', NULL, NULL, NULL, '2024-08-14', '2024-08-14', '2024-08-14', 'Request', NULL),
(12024002, 1, 'bug', 'bug', NULL, NULL, NULL, 2, 'bug', 'bug', NULL, '2024-08-20 01:18:25', '2024-08-20 01:18:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProyek` bigint UNSIGNED DEFAULT NULL,
  `idKaryawan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idDepartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `statusUser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `nama`, `email`, `username`, `password`, `idProyek`, `idKaryawan`, `idDepartment`, `image`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `statusUser`) VALUES
(2, 'Direksi', 'direksi@gmail.com', 'direksi', '$2y$10$7.H8e6T6t6f7EKu1dVWEReZAkhDDzI3Hu3RjpKzlBG/VEFhQQIcs6', 1, NULL, NULL, NULL, 1, NULL, '2024-08-09 03:46:49', NULL, NULL, 0),
(21, 'Super Admin', 'superadmin@gmail.com', 'superadmin', '$2y$10$3WGk97cCKMj1eveM96AHOuap.Uj.NK68EVhbzqVsxbNM5yfej7zCy', 1, 'KRY28', 'DPT37', NULL, 1, 'uASG4RZLcjnICmY3WDCG2EXsjViEfxj7q8mV9o5Tz5zVkoehnVlG83Ciaq2S', '2024-08-21 01:59:28', '2024-08-21 01:59:28', NULL, 0),
(22, 'Ghadiza', 'ghadizanauraaliya@gmail.com', 'PL', '$2y$10$khJyPrHtvtyvQl8pxvwafOz3H9tZBS487w4zJZqtvh14dZssbZafG', 1, 'KRY387', 'DPT3823', '1724310608.jpg', 1, NULL, '2024-08-22 00:10:08', '2024-08-22 00:10:08', NULL, 0),
(23, 'Ghadiza', 'user@gmail.com', 'dizauruss', '$2y$10$mhaEwk1yPknkTn..LB.1ruWgaIqltmrGTTVKrAiueKfZ2ORHWwcqe', 1, 'KRY20', 'DEP79', '1724310665.png', 1, NULL, '2024-08-22 00:11:05', '2024-08-22 00:11:05', NULL, 0),
(25, 'CS', 'cs@gmail.com', 'csaviat', '$2y$10$BggNX7yS3qMYepe9zciXneLUdEd5/s4Sg6GbsAseD64wcvKq5N7/C', 1, 'KRY19', 'DPT30', '1724379859.jpg', 1, NULL, '2024-08-22 19:24:19', '2024-08-22 19:24:19', NULL, 0);

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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_idkomentar_foreign` (`idKomentar`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`idKomentar`),
  ADD KEY `komentars_idtiket_foreign` (`idTiket`),
  ADD KEY `komentars_userid_foreign` (`userId`);

--
-- Indexes for table `lampirans`
--
ALTER TABLE `lampirans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampirans_idtiket_foreign` (`idTiket`);

--
-- Indexes for table `mandays`
--
ALTER TABLE `mandays`
  ADD PRIMARY KEY (`idMandays`),
  ADD KEY `mandays_idproyek_foreign` (`idProyek`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proyeks`
--
ALTER TABLE `proyeks`
  ADD PRIMARY KEY (`idProyek`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `temporary_images`
--
ALTER TABLE `temporary_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`idTiket`),
  ADD KEY `tikets_idproyek_foreign` (`idProyek`),
  ADD KEY `tikets_picrs_foreign` (`picRs`),
  ADD KEY `tikets_assignto_foreign` (`assignTo`),
  ADD KEY `tikets_plaviat_foreign` (`plAviat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_idproyek_foreign` (`idProyek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `idKomentar` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lampirans`
--
ALTER TABLE `lampirans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mandays`
--
ALTER TABLE `mandays`
  MODIFY `idMandays` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `idMenu` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proyeks`
--
ALTER TABLE `proyeks`
  MODIFY `idProyek` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temporary_images`
--
ALTER TABLE `temporary_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tikets`
--
ALTER TABLE `tikets`
  MODIFY `idTiket` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12024005;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_idkomentar_foreign` FOREIGN KEY (`idKomentar`) REFERENCES `komentars` (`idKomentar`);

--
-- Constraints for table `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_idtiket_foreign` FOREIGN KEY (`idTiket`) REFERENCES `tikets` (`idTiket`),
  ADD CONSTRAINT `komentars_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `lampirans`
--
ALTER TABLE `lampirans`
  ADD CONSTRAINT `lampirans_idtiket_foreign` FOREIGN KEY (`idTiket`) REFERENCES `tikets` (`idTiket`);

--
-- Constraints for table `mandays`
--
ALTER TABLE `mandays`
  ADD CONSTRAINT `mandays_idproyek_foreign` FOREIGN KEY (`idProyek`) REFERENCES `proyeks` (`idProyek`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tikets`
--
ALTER TABLE `tikets`
  ADD CONSTRAINT `tikets_assignto_foreign` FOREIGN KEY (`assignTo`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `tikets_idproyek_foreign` FOREIGN KEY (`idProyek`) REFERENCES `proyeks` (`idProyek`),
  ADD CONSTRAINT `tikets_picrs_foreign` FOREIGN KEY (`picRs`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `tikets_plaviat_foreign` FOREIGN KEY (`plAviat`) REFERENCES `users` (`userId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_idproyek_foreign` FOREIGN KEY (`idProyek`) REFERENCES `proyeks` (`idProyek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
