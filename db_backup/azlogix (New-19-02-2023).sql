-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 10:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azlogix`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_notes`
--

CREATE TABLE `doctor_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_patient_id` bigint(20) UNSIGNED NOT NULL,
  `fk_token_id` bigint(20) UNSIGNED NOT NULL,
  `prescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_notes`
--

INSERT INTO `doctor_notes` (`id`, `fk_patient_id`, `fk_token_id`, `prescription`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1669807731.pdf', '2022-11-02 10:09:31', '2022-11-30 06:28:51'),
(2, 2, 4, '1670734541.pdf', '2022-12-10 23:55:41', '2022-12-10 23:55:41'),
(3, 2, 6, '1673787145.pdf', '2023-01-15 07:52:25', '2023-01-15 07:52:25'),
(4, 2, 7, '1674145993.pdf', '2023-01-19 11:33:13', '2023-01-19 11:33:13');

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
-- Table structure for table `frontusers`
--

CREATE TABLE `frontusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` blob NOT NULL,
  `phc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `title`, `logo`, `phc_no`, `contact`, `email`, `website`, `address`, `remarks`, `created_at`, `updated_at`) VALUES
(3, 'Aziz Retina', 0x32303232313133303132303832392e636f7665722e706e67, '652569655544', '03006323103', 'amhmultan@gmail.com', 'https://www.google.com', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'addasdasddas', '2022-11-30 06:20:19', '2022-11-30 07:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fbr_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` blob DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `description`, `fbr_no`, `address`, `logo`, `contact`, `email`, `website`, `remarks`, `created_at`, `updated_at`) VALUES
(3, 'Kobec Health Sciences', 'Ophthalmic Company', '888', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 0x32303232313132303038333235302e706e67, '03006323103', 'amhmultan@gmail.com', 'https://www.google.com', 'sdadsds', '2022-11-20 03:32:50', '2022-11-20 03:32:50'),
(4, 'Arslan Majid', 'Ophthalmic Company', '888', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 0x32303232313133303131313333362e434e494320284261636b292e6a7067, '03006323103', 'amhmultan@gmail.com', 'https://www.google.com', 'hghghgfh', '2022-11-30 04:47:28', '2022-11-30 06:13:36'),
(5, 'Arslan Majid', 'Ophthalmic Company', '888', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 0x32303232313133303132323335352e5465637a652e706e67, '03006323103', 'amhmultan@gmail.com', 'https://www.google.com', 'sd', '2022-11-30 05:20:04', '2022-11-30 07:23:55'),
(6, 'Origin Pharma', 'Ophthalmic Company', '888', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 0x32303232313133303132323434332e636f7665722e706e67, '03006323103', 'amhmultan@gmail.com', 'https://www.google.com', 'sdaddasdasdasdsadasd', '2022-11-30 06:14:15', '2022-11-30 07:24:43');

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
(5, '2021_10_24_052122_create_frontusers_table', 1),
(6, '2021_10_24_055150_create_permission_tables', 1),
(7, '2021_10_31_101342_create_posts_table', 1),
(8, '2022_04_29_075659_create_patients_table', 1),
(9, '2022_05_31_173223_create_products_table', 1),
(10, '2022_06_12_050104_create_p_lab_table', 1),
(11, '2022_08_22_102835_create_hospitals_table', 1),
(12, '2022_10_01_140110_create_manufacturers_table', 1),
(13, '2022_10_01_142336_create_suppliers_table', 1),
(14, '2022_10_26_094159_create_tokens_table', 1),
(15, '2022_10_26_103925_create_doctor_notes_table', 1),
(16, '2022_11_17_192157_create_pharmacies_table', 2),
(17, '2022_11_20_085935_create_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emr_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emr_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reffered_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `fname`, `dob`, `gender`, `marital_status`, `phone`, `email`, `cnic`, `address`, `emr_name`, `relationship`, `emr_phone`, `history`, `reffered_by`, `created_at`, `updated_at`) VALUES
(2, 'Arslan Majid', 'Majid Hussain', '2022-11-03', 'Others', 'Separated', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'Wife', '03006323103', 'fdgfsddadas', 'Dr Ajmal Ch', '2022-11-02 10:04:23', '2023-02-13 11:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Configuration access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(2, 'Hospital access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(3, 'Pharmacy access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(4, 'PharmacyConfig access', 'web', '2022-10-26 09:25:24', '2022-11-17 14:04:33'),
(5, 'Post access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(6, 'Post edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(7, 'Post create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(8, 'Post delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(9, 'Role access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(10, 'Role edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(11, 'Role create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(12, 'Role delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(13, 'User access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(14, 'User edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(15, 'User create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(16, 'User delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(17, 'Permission access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(18, 'Permission edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(19, 'Permission create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(20, 'Permission delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(21, 'DoctorNotes access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(22, 'DoctorNotes add', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(23, 'DoctorNotes edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(24, 'DoctorNotes delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(25, 'HospitalConfig access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(26, 'HospitalConfig create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(27, 'HospitalConfig edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(28, 'HospitalConfig delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(29, 'Manufacturer access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(30, 'Manufacturer add', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(31, 'Manufacturer edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(32, 'Manufacturer delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(33, 'Patient access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(34, 'Patient create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(35, 'Patient edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(36, 'Patient delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(38, 'PharmacyConfig add', 'web', '2022-10-26 09:25:24', '2022-11-17 14:06:05'),
(39, 'PharmacyConfig edit', 'web', '2022-10-26 09:25:24', '2022-11-17 14:06:35'),
(40, 'PharmacyConfig delete', 'web', '2022-10-26 09:25:24', '2022-11-17 14:06:26'),
(41, 'Product access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(42, 'Product create', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(43, 'Product edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(44, 'Product delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(45, 'Supplier access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(46, 'Supplier add', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(47, 'Supplier edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(48, 'Supplier delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(49, 'Token access', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(50, 'Token add', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(51, 'Token edit', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(52, 'Token delete', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(53, 'UserMenu access', 'web', '2022-11-17 14:15:19', '2022-11-17 14:15:19'),
(54, 'Purchase access', 'web', '2022-12-07 07:54:04', '2022-12-07 07:54:04'),
(55, 'Purchase edit', 'web', '2022-12-07 07:54:11', '2022-12-07 07:54:11'),
(56, 'Purchase add', 'web', '2022-12-07 07:54:21', '2022-12-07 07:54:21'),
(57, 'Purchase delete', 'web', '2022-12-07 07:54:31', '2022-12-07 07:54:31'),
(58, 'Sale access', 'web', '2022-12-07 08:11:15', '2022-12-07 08:11:15'),
(59, 'Sale add', 'web', '2022-12-07 08:11:23', '2022-12-07 08:11:23'),
(60, 'Sale edit', 'web', '2022-12-07 08:11:29', '2022-12-07 08:11:29'),
(61, 'Sale delete', 'web', '2022-12-07 08:12:07', '2022-12-07 08:12:07');

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
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` blob NOT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `name`, `address`, `phone`, `pic`, `reg_no`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Aziz Retina Pharmacy', 'dfdf', '03006323103', 0x313636393831303534332e706e67, '34324324324234', 'sdsdadsd', '2022-11-17 15:13:14', '2022-11-30 07:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `user_id`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Tempore ut non sit deserunt quisquam nam. Explicabo quas quis ut aspernatur et fugit est. Suscipit minus explicabo blanditiis quod ab et aut.', 'Numquam culpa quo sint iure impedit delectus cumque. Necessitatibus quidem et omnis ut sed. Numquam dolores quis quisquam quas assumenda rerum natus.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(2, 'Sequi voluptatem ad exercitationem possimus culpa et. Non sit ut quibusdam distinctio et architecto rerum sunt. Inventore non ea accusantium ut. Est autem perferendis fugit aut.', 'Optio illo culpa nemo sint qui sit voluptatibus. Sint qui voluptatem est ea qui et non. Ipsa non laudantium molestiae. Voluptate officiis architecto nihil reprehenderit et dicta sunt nulla. Sunt cumque magnam ex et.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(3, 'Distinctio qui voluptates doloribus molestiae quos. Eveniet qui voluptate reprehenderit deleniti similique quia qui. Quo et velit libero.', 'In voluptas consequatur esse blanditiis qui ratione. Molestiae non distinctio eligendi non voluptates est. Expedita voluptate necessitatibus voluptate beatae atque repellat rem explicabo.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(4, 'Magnam deleniti sequi et molestiae velit. Ipsa id quod nesciunt aut consequuntur.', 'Nobis qui sit qui ducimus. Sed voluptas qui omnis officiis dolore. Saepe ipsum aut animi non et aut. Est voluptas fugiat aliquid et vel fugit est.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(5, 'Esse enim consequatur tempore excepturi et quis tempore consequatur. Vel dolores laboriosam voluptatem omnis. Ut assumenda reprehenderit ipsum laborum dolor tempora.', 'Iste sed molestiae voluptas magnam dolorum. Distinctio rerum consequatur facere voluptatibus placeat. Accusamus doloremque dolorum magnam voluptatem iusto blanditiis. Cum ut in minus esse blanditiis est cum.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(6, 'Possimus molestias odit repellat. Enim amet a ut saepe expedita quod consequatur eos. Expedita vitae asperiores aut delectus.', 'Optio corrupti sed natus nam deleniti. Rerum ullam accusantium eum odit vel. Quae quod in dolorem omnis molestiae est voluptas.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(7, 'Totam est nobis non natus. Molestiae eum dolores reiciendis optio id ducimus nemo laboriosam.', 'Aut unde explicabo voluptatem blanditiis. A excepturi omnis possimus aspernatur molestias velit omnis. Debitis eaque reprehenderit quia voluptatem sunt quod alias.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(8, 'Sed sed consequatur quis adipisci ut. At id dolorem perferendis voluptate. Dolorum assumenda earum unde eos.', 'Temporibus rem itaque rerum autem doloribus. Quia ut quia cumque doloremque rerum. Et a enim sit iusto impedit. Vitae vel optio ad.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(9, 'Exercitationem deserunt earum dolores nesciunt. Consectetur sunt vel enim rerum. Ratione dolor necessitatibus non ut aut.', 'Sint velit possimus eius facilis accusamus necessitatibus reiciendis. Ad minus dolorem eos repellendus eveniet. Ut possimus quia voluptatem minima reprehenderit quisquam necessitatibus. Error quibusdam beatae saepe vel numquam.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(10, 'Voluptatem ex officiis dolor nihil nisi. Incidunt labore dignissimos et veniam voluptatem voluptatem quidem. Excepturi unde modi suscipit incidunt. Et et iure vitae ut nisi laborum nesciunt.', 'Aspernatur commodi repellat ut est. Nam doloremque eligendi pariatur adipisci nulla magni nam. Consequatur aperiam est perspiciatis quos error at aut libero.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(11, 'Est quaerat vero perferendis. Voluptatum voluptates aut et sed laborum velit eum ad. Ea qui molestiae alias voluptatem tempore.', 'Aut deleniti necessitatibus provident veniam dolor qui et. Porro rerum quo est.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(12, 'Voluptatem sit corporis incidunt. Debitis omnis mollitia nam eveniet. Aliquam modi qui quia eaque voluptatum odio praesentium.', 'Hic iusto dolorem pariatur laudantium consequatur. Quis ut earum in eligendi voluptatibus doloremque sapiente.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(13, 'Veniam laudantium sed sunt sit quaerat sed sint. Aut id atque atque unde neque eum et perferendis.', 'Fugiat quod nisi molestias ullam dolorem. Atque beatae optio doloremque consequatur. Qui perferendis vel et. Eveniet doloribus quisquam recusandae nobis magnam asperiores.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(14, 'Ea nulla impedit aliquid ut non exercitationem. A magni ut voluptatum aut praesentium. Laborum sit hic magni quidem aut possimus omnis. Et vel id in odit quis similique.', 'Quo aspernatur id vitae odit. At laudantium dolores omnis voluptatem sunt. Voluptatem est ut hic maiores repellendus qui nemo facere. Placeat omnis dicta aperiam et. Unde quidem necessitatibus debitis beatae qui aliquam est tenetur.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(15, 'Voluptates quasi repellendus odit ipsam adipisci. Nihil ipsa quis impedit cum. Nostrum ea id et quasi maxime sunt quidem et. Ut sit expedita sunt blanditiis illo iure sit voluptas.', 'Ea inventore est tempora iure et culpa animi facere. Est consectetur facilis qui laudantium eaque ducimus accusamus. Tenetur ut minus quo. Consequatur quisquam rerum dolore recusandae.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(16, 'Alias veritatis laboriosam incidunt est. Fuga illo et fuga facilis autem. Est perferendis modi laudantium perspiciatis exercitationem minus.', 'Et quae consequuntur asperiores perferendis et architecto. Et dignissimos nemo praesentium iste error. Aut magnam consequuntur enim alias asperiores enim molestiae.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(17, 'Et eum dolores consequatur aut. Hic distinctio repudiandae minus sit possimus asperiores. Qui amet eos voluptates.', 'Modi commodi et ut sunt voluptatem perferendis eum. Omnis quibusdam recusandae architecto eligendi. Architecto omnis excepturi recusandae quas facilis quos non repellat. Est qui illum odio consequatur laboriosam quia ipsa.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(18, 'Corrupti eum dolorem maiores sint ducimus mollitia aliquam. Fugiat est labore magnam eaque omnis.', 'Nihil soluta aut consectetur saepe alias quas vitae. Deleniti et voluptatum eveniet dolor dolor repudiandae aspernatur. Ab qui recusandae rerum non eum temporibus veniam.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(19, 'Natus earum asperiores quisquam hic accusamus molestias. Eos eveniet corrupti et non perspiciatis.', 'Id est eius nobis laboriosam magnam explicabo odio. Et praesentium eum ut. Vel qui qui eligendi et consequuntur et iusto. Impedit temporibus qui possimus sed omnis.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(20, 'Dolor ut deserunt dolore. Voluptatem itaque dolores odio repellendus consectetur est. Possimus nostrum quibusdam deleniti id in voluptatum.', 'Et qui voluptatem enim voluptatibus nemo quos dolores. Distinctio dignissimos exercitationem sunt in rerum aut et.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(21, 'Vel quam labore autem dolorum harum. Autem dignissimos aut non occaecati. Hic molestiae molestias nesciunt dolores expedita. Aperiam odit non sed sequi.', 'Unde fugiat rerum aut distinctio expedita. Accusantium vel non numquam et. Vel voluptate voluptatum possimus molestias.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(22, 'Magni suscipit inventore enim aspernatur. Dolores sunt saepe ipsum. At molestiae optio aut distinctio id ut. Tempora rerum cumque debitis nihil ipsa sed fugiat similique. Vel consectetur quis quia.', 'Et qui aut hic ut quis hic cupiditate. Fugit rerum sunt autem odio harum quos. Odio minus quidem unde est in velit fugit. Id doloremque est aut nesciunt.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(23, 'Qui commodi recusandae repellendus sed temporibus. Rerum omnis occaecati et at quia.', 'Dicta nulla voluptatem sed. Illum eos corporis sint eius voluptates. Saepe consequatur culpa ratione sed illo consequuntur rerum.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(24, 'Minus odit et placeat non temporibus. Soluta similique corporis nihil architecto quas.', 'Quas minus debitis neque autem et. Magnam facere iure praesentium ratione laboriosam voluptas. Qui impedit molestiae et est impedit officia eum officiis. Excepturi ea dolor est ea et sunt est. Dignissimos ut iure at ullam exercitationem amet earum.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(25, 'Itaque vero ullam placeat quam fugit non eveniet aliquam. Dolore quo saepe harum. Consectetur id quis tenetur consequatur molestias.', 'Adipisci doloremque non repudiandae sint dicta dolores. Voluptas ratione quia sint nam excepturi quidem. Dolores aut dolorem neque iusto pariatur.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(26, 'Totam est qui quibusdam repellat aliquam. Quam qui voluptates quos et. Et porro natus autem et eum aut ratione.', 'Modi necessitatibus expedita necessitatibus officia voluptatibus quis a praesentium. Hic officia veniam aspernatur id sequi. Voluptas laboriosam eum et nihil et vero.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(27, 'Deleniti deleniti nihil libero laboriosam ut amet ad quaerat. Placeat velit odit alias qui et quam.', 'Atque quis dolores et qui quaerat quis. Aut voluptas eveniet est veritatis. Sunt vel temporibus velit aut dolorum voluptas.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(28, 'Magnam minima voluptatem et provident quia. Illum aut dolore rerum et modi aliquid. In et commodi magnam nostrum ea. Repudiandae sequi iusto mollitia porro.', 'Ea laudantium unde nulla nobis. Quia sint totam ut assumenda minus amet minima. Est esse consequuntur ab cumque itaque vitae ipsa. Molestiae accusantium sequi et ratione ut autem velit.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(29, 'Ducimus accusantium magnam rerum nobis. Rerum et error voluptatibus. Quas repellendus distinctio voluptatibus quaerat architecto. Qui occaecati similique quia quis soluta vel.', 'Tenetur non ab quisquam eaque inventore voluptatem rerum. Dolores laborum reprehenderit sed totam reprehenderit in. Aut ut provident omnis omnis pariatur quidem est.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(30, 'Incidunt doloremque iste qui esse impedit. Itaque ducimus fugiat illum facere aut totam qui. Eum animi sint quasi delectus et qui. Aut a mollitia est aut quia corrupti. Laborum sit iusto ut dolores.', 'Molestiae voluptas laudantium asperiores voluptatem. Necessitatibus vero et repellendus eos quos at ut. Maiores voluptatum nihil temporibus soluta molestiae. Id omnis et doloribus voluptatum vitae.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(31, 'Quaerat autem eius eos autem nihil reprehenderit et. Placeat doloribus nihil et rem. Nihil quo delectus aspernatur sed saepe deleniti neque. Fugit ad quam nihil dolores tempore ea.', 'Perspiciatis unde excepturi quidem voluptas aut ea numquam tempora. Nesciunt ipsum optio excepturi sequi veniam vel. Molestiae qui aperiam incidunt sunt repellat. Aut dolorum rerum corrupti aspernatur recusandae qui ea saepe.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(32, 'Nisi numquam quo animi exercitationem recusandae. Aperiam laboriosam ipsum quia earum.', 'Molestiae a qui officiis assumenda quia deleniti. Iure adipisci sit dolor et quidem ut. Similique eligendi veritatis aut debitis velit.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(33, 'Optio ad consequatur libero sunt aut nemo. Accusantium similique et nihil harum rerum a ut et. Laboriosam porro facere earum numquam delectus sit suscipit.', 'Vitae voluptatem nisi vitae minima et esse a. Unde quia incidunt ea doloremque sed dignissimos. Sed molestiae adipisci qui neque est. Voluptatem voluptatem nam aut tenetur minima enim nobis nemo.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(34, 'Libero cumque modi a quisquam sit voluptate. Aut ut tempora molestiae et nihil assumenda. Et optio non dolorem rerum hic porro est.', 'Accusantium molestiae quod voluptas dignissimos consectetur iusto. Consectetur sunt autem facilis. Excepturi eos delectus fugiat architecto delectus.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(35, 'Eos alias dolorum esse qui dolorem. Ex veritatis excepturi libero est. Quo quisquam odio quaerat porro ut laudantium voluptas. Non porro cum voluptatem sed enim et a.', 'Minima praesentium natus sunt temporibus necessitatibus. Vitae et voluptatem libero magnam aut. Itaque aut sint eius animi eaque porro. Cumque dolor et quis voluptatem.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(36, 'Cumque laboriosam occaecati non omnis ullam. Sint quos tempore ut nesciunt molestias praesentium in. A odio dicta porro enim eius. Hic iste a quia et fugit dicta nesciunt.', 'Exercitationem et ab id qui. Laboriosam aut voluptatem modi accusamus. Nostrum molestiae placeat quis voluptatum impedit nulla. Sapiente eum quia at esse delectus alias perferendis magnam.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(37, 'Assumenda corporis aut placeat iure enim voluptates. Velit molestiae veniam quaerat veritatis commodi qui voluptas. Rerum quidem enim voluptates cum quia porro.', 'Pariatur debitis unde repellat occaecati quisquam ut sit. Magnam consectetur ut qui rerum. Nemo qui et consequatur reiciendis animi sunt vel. Voluptatem assumenda quisquam quo sit autem quibusdam. Et doloremque hic aut debitis repellat.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(38, 'Qui beatae vitae voluptatem doloremque laboriosam. Voluptatem voluptatibus quod autem illum natus quae debitis.', 'Facilis quod et alias non commodi accusantium. Aut nobis excepturi molestiae. Itaque deleniti repellat assumenda nemo.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(39, 'Sed rerum iure alias officia hic. Voluptatem quae assumenda quo vitae voluptas. Incidunt quis dolorem nobis autem nemo amet. Aperiam iure aut a aut quia eius. Quos voluptatibus quia beatae officiis.', 'Numquam accusamus in voluptate tempore fugit quia. Molestiae nemo aut voluptatem ut eos voluptas ducimus. Dignissimos unde aut omnis.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(40, 'Ut voluptatem iure ab. Et a laborum dignissimos quod ex ex magnam sunt. Nesciunt voluptatem consequatur ut sed omnis provident. Ut autem ut qui quisquam eum aut corrupti. Sit accusantium illum rerum.', 'Cum corrupti saepe nihil consequatur incidunt dolorem suscipit. Consequatur quis eos vitae illo rerum. Ipsam aut magnam autem voluptas quidem blanditiis totam.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(41, 'Voluptas animi officiis eum minima aut. Fuga ad doloribus iure aliquid eos nisi voluptates molestias.', 'Est sunt laboriosam cum aliquam quis nobis et. Voluptatum voluptates assumenda facilis nesciunt ea.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(42, 'Velit doloribus est tempora et autem. Quo dolores consectetur ducimus voluptas blanditiis.', 'Et repellendus suscipit vel consequatur sequi laudantium odit. Quia dignissimos nihil architecto. Optio distinctio debitis est atque eligendi aspernatur.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(43, 'Cumque nulla aut tempore illum. Id velit rerum magni et ratione dolorum dolorum. Rerum et aut magnam totam cumque.', 'Repellendus eum repellat deserunt dolores et. Aut dolorem et est consequatur. Minima voluptas voluptatem laudantium sed. Aliquid quia animi non culpa aut eos magnam.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(44, 'Itaque praesentium corporis sed beatae. Fugiat delectus omnis inventore ut qui reiciendis omnis. Veniam laudantium aut totam vero id. Excepturi delectus enim delectus explicabo.', 'Quam vel maxime ullam aut cupiditate. Omnis dolores quia sed saepe sit. Voluptatem eveniet quaerat vel. Sit similique iste exercitationem aut qui vel.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(45, 'Rerum earum quia aut aut. Aspernatur qui sed sint non dolorum dolorem libero. Dolore numquam laboriosam voluptas facere.', 'Nihil beatae dignissimos sed rem odio rerum. Ex magnam dolores repellendus aut. Provident molestiae sapiente et. Distinctio magni illum pariatur libero et.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(46, 'Sit illo reiciendis et iure voluptas assumenda at. Aut exercitationem voluptatem eligendi culpa impedit. Voluptatem magni in tempore rerum voluptatem dolor. Nihil officiis in omnis ex.', 'Quibusdam voluptatem voluptatem assumenda perferendis tenetur perferendis. Voluptas amet possimus dolores placeat id ea. Qui quisquam eos nam est quia quia.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(47, 'Et consequatur nihil aspernatur quaerat iste. Eligendi nesciunt accusamus ut dicta illo. Possimus ea enim velit rerum sunt quidem soluta.', 'Quia qui blanditiis non nobis omnis. Sunt repellat id doloremque iste debitis voluptates optio ipsa. Et natus sunt eveniet quidem ipsa assumenda ut.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(48, 'Ut quis molestiae iure possimus autem odio corrupti. A culpa doloribus ut voluptates magni. Fugit aspernatur quasi qui dolorem consectetur. Vel fuga magni quis.', 'Mollitia placeat quis ab consequatur necessitatibus. Sequi quasi odit dolor ut. Omnis eligendi laudantium qui alias porro beatae rerum.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(49, 'Vel placeat cumque excepturi. Dolores eum iste odio fugiat odio maxime facilis et. Iusto quos a quo perspiciatis minus unde inventore.', 'Labore minima dolorum dignissimos sequi earum voluptas. Quisquam et et error quia nisi quia. Dolorem veniam expedita est esse qui quibusdam.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(50, 'Ad doloribus qui beatae sunt. Officia quam aliquam et. Vel atque nostrum omnis voluptas at. Ipsam nulla fugit et rem laboriosam.', 'Tempora adipisci rerum sit et illo minus voluptas. Non et vitae ut illum temporibus ut rerum. Amet culpa eveniet ut veniam culpa magni voluptate. Autem iste deleniti dolor in et. Est ipsam nemo occaecati dolores voluptas consequatur voluptatem.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(51, 'Autem sit quibusdam sunt. Voluptates dolores saepe ut vero dolore animi. Ut et facilis est accusamus aliquid at pariatur magni.', 'Molestias sint reprehenderit ex ut vitae voluptate deleniti. Praesentium ipsa tempore ullam. Porro est ut ab ipsa voluptatum culpa repellendus blanditiis. Illo aut magni sed et.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(52, 'Enim perferendis labore occaecati. Officia animi itaque cum dolorum velit et consequatur. Beatae tenetur doloribus eos quibusdam enim. Distinctio ea consequatur et omnis earum.', 'Est ea sed et repellendus sed explicabo. Voluptas qui et occaecati ad architecto amet nisi iusto. Et et iste natus maxime voluptas tempora quis quisquam.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(53, 'Animi est voluptatem quia nobis qui quod fugit. Voluptatem repudiandae qui quibusdam magni.', 'Impedit et et voluptate deserunt porro eveniet eligendi. Et ea quae id est. Eum et voluptatem perspiciatis ut velit voluptatibus debitis veniam.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(54, 'Consequatur iste placeat impedit molestiae ut nihil ea. Autem sapiente doloribus dicta quisquam autem suscipit. Porro similique molestiae consequatur tempore optio velit.', 'Sit quam quisquam labore magni. Error distinctio incidunt similique. Unde repellendus non omnis in animi nihil eos.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(55, 'Aut amet eligendi ut occaecati velit. Consequatur fuga iusto nihil explicabo quas laboriosam.', 'Et et officia quia non consequatur rem voluptatem voluptatem. Accusamus libero commodi id modi et dolorem quo. Laborum quis nihil molestias voluptas qui mollitia perferendis.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(56, 'Qui nemo iure et rerum. Dolorem quo aut quas ratione qui laborum sunt. Porro aut similique laborum laborum magnam.', 'Voluptate eum et aut. Saepe voluptas nobis dolores expedita et enim et debitis. Praesentium repudiandae incidunt sit et voluptas. Sapiente laboriosam iste aut.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(57, 'Temporibus dolorum in natus labore. Nisi fugit sit sapiente est. Et magnam modi sed et autem sequi enim repellat.', 'Qui ullam fuga incidunt sint commodi. Non laboriosam qui odit nihil et et. Voluptatem ipsa reprehenderit pariatur laboriosam autem quibusdam nemo.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(58, 'Mollitia asperiores aut doloribus. Dignissimos voluptatum necessitatibus dolorem sed commodi. Saepe molestiae in et nobis enim quis. Voluptates sunt in est corrupti deleniti omnis.', 'Quis earum laudantium enim repellat illo aspernatur. Rem molestiae autem a libero magnam amet. Ut sequi atque eum amet eligendi dolorem.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(59, 'Velit sequi nesciunt aut ea voluptatum inventore tenetur. Et deserunt et mollitia reprehenderit et.', 'Ut quasi velit velit vitae error. Dolor qui quisquam unde est et voluptate. Corporis nihil vitae vitae laboriosam reprehenderit.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(60, 'In non minima tempora corporis suscipit optio. Tenetur et itaque facere eum tempora commodi. Eligendi eum impedit dolores nulla quo voluptas.', 'Qui modi ducimus optio delectus quia et impedit. Et eos veritatis animi fuga eos eaque.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(61, 'Vero ea alias et nisi minima illo ipsam. Vero et numquam molestiae et ut distinctio. Saepe doloribus laudantium tempore voluptatum rerum eveniet.', 'Accusantium rerum voluptas cumque nostrum perferendis qui nihil. Incidunt asperiores ab placeat ducimus. Accusantium rerum ut consequuntur nihil non in.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(62, 'Ducimus hic dolorum autem repellendus quod aut accusamus. Quae sed sit dolores officiis cupiditate et iusto.', 'Occaecati voluptate tempora est voluptatum. Tempore nihil natus sed. Sed in ducimus voluptatibus rerum ut cupiditate. Minima rem accusamus reprehenderit officia tempore.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(63, 'Veniam ut et debitis excepturi eius numquam aperiam. Sit voluptate consectetur quasi qui molestiae ipsum error voluptates. Occaecati aliquid qui hic voluptatum architecto.', 'Nihil laudantium enim maxime debitis ipsa non distinctio minima. Fuga non quam maiores incidunt atque adipisci. Temporibus maxime minus quia saepe provident iusto asperiores.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(64, 'Deserunt quisquam possimus mollitia quia quis. Quo laudantium reiciendis est quis ut qui aut.', 'Ex est quia cupiditate aperiam natus nisi. Sunt maxime sint corrupti expedita assumenda quam. Qui odio laborum sit molestiae ullam totam. Vitae dolorem rem doloremque ut.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(65, 'Aliquid placeat quos animi molestias magni consectetur distinctio. Recusandae laboriosam iure ex natus tempore. Nulla enim amet ut quis.', 'Eius qui a vitae. Qui libero animi error repellat dolores amet. Nostrum cupiditate nobis provident. Dolor voluptate eos ut eligendi expedita.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(66, 'Explicabo laboriosam non ut. Sint nihil impedit occaecati iusto. Corrupti quia modi dignissimos sed consequatur nesciunt. Hic error dolorum mollitia temporibus maxime id.', 'Itaque deserunt autem labore ducimus ut atque animi est. Eius commodi aut atque ut quia a qui. Quasi delectus corporis ad dignissimos hic nostrum ut.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(67, 'Impedit quis error atque perspiciatis eum sed. Nobis iure quia molestiae architecto nulla. Hic commodi dicta inventore sed. Blanditiis voluptas ratione maxime repellat enim provident dicta.', 'Qui velit totam tempore. Possimus velit nemo maxime debitis aliquam dolorem. Voluptatum doloribus voluptatem voluptatum voluptatem excepturi incidunt laboriosam. Inventore ad ea cupiditate ut.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(68, 'Accusamus et iure veritatis provident recusandae. Enim facilis ad sunt sit aut dolorum sit.', 'Eum id autem et labore quisquam laudantium dolor recusandae. Ipsum laborum et temporibus nisi eveniet molestias. Excepturi ea libero optio libero. Voluptatem non deleniti et iure quia sapiente sunt.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(69, 'Aut ut exercitationem quae molestias qui. Fuga minima et aliquid accusamus sit et autem. Ad aspernatur ducimus iste illum qui qui iure.', 'Quo veniam ipsam ea eum eum voluptatem architecto. Facilis et est est inventore rem quaerat. Quas cupiditate laudantium aliquid enim in aut laborum.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(70, 'Officiis doloremque ex nulla cupiditate quis pariatur. Odit omnis facilis quia qui atque nulla. In ullam sit non aut odit.', 'Ea beatae repudiandae molestias deleniti. Velit ut eaque atque non ut voluptas ea. Tenetur maiores est reprehenderit est.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(71, 'Quis sunt sequi consequuntur enim ducimus quod dolores. Magnam rerum qui eos ullam quis ullam omnis. Assumenda enim amet quasi necessitatibus recusandae. Omnis quasi ut voluptatem ducimus.', 'Aut vero aliquam aut ipsam. Alias rerum et libero nobis.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(72, 'Cum sed perspiciatis aliquam autem adipisci eum voluptates distinctio. Quod aperiam vel cupiditate. Animi officia unde doloremque in ullam.', 'Suscipit et ut nemo aliquam alias illum. Rerum earum at qui non. Pariatur quibusdam recusandae aut unde labore.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(73, 'Cumque ad ut voluptate voluptas ipsum dolore consequatur consequatur. Officiis ut et aut inventore eos doloremque mollitia fugit.', 'Et inventore qui laboriosam libero ratione pariatur. Amet aspernatur repudiandae dolorum autem illum. Rerum doloribus dolores rerum. At excepturi aut pariatur velit minus.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(74, 'Architecto illo praesentium illo libero omnis sunt repudiandae. Hic vel rem et ipsa numquam perspiciatis aut. Mollitia rerum quo amet nemo in hic.', 'Ut quia dolore aliquam voluptates dolor autem facilis quia. Est nemo consequatur qui perferendis laborum voluptatum aut. Maxime necessitatibus hic cupiditate voluptatum nihil provident illum. Voluptatem ex delectus commodi quis debitis quaerat.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(75, 'Vitae voluptatem delectus dolores aut quos. Amet aut architecto consequatur explicabo eius. Et voluptatem ut doloribus et eos rem quasi. Eum enim quae deserunt quasi.', 'Molestias nemo non officiis excepturi sit. Quod eligendi libero mollitia quia sint autem. Earum quia fugiat veritatis totam. A inventore praesentium velit qui et.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(76, 'Itaque et laborum dolor. Ut quod voluptates deserunt. In perspiciatis voluptatem commodi quo adipisci odit. Assumenda laborum repudiandae eaque reprehenderit in esse et. Id tenetur omnis nulla natus.', 'Non aliquid reiciendis molestiae tenetur tenetur omnis ipsam iure. Quos quisquam quia quia omnis. Magni dolor soluta eaque aspernatur deleniti nostrum. Qui perspiciatis harum aut nostrum minima ut qui.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(77, 'Necessitatibus doloribus voluptatum sed amet. Eveniet reprehenderit quidem ut et voluptatem expedita. Sed asperiores sint occaecati consequatur omnis.', 'Et corrupti qui impedit explicabo eum laboriosam porro ut. Perspiciatis sunt et fugit. Provident enim beatae quaerat sunt aliquam.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(78, 'Cum doloremque blanditiis sed et. Voluptas architecto minus et odio. Ducimus voluptatem minima excepturi sint nesciunt inventore. Voluptatem sit eaque minima ea iste.', 'Sequi voluptas nobis aut officia qui. Incidunt non alias maxime porro harum impedit. Quae dicta omnis beatae nobis.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(79, 'Ea non quaerat similique dignissimos dolores nihil odit. Nostrum quis fugiat autem aut et distinctio exercitationem consequuntur. Ullam officiis atque cum deleniti.', 'Itaque laborum aut et fugit voluptas vero autem. Maxime nam iure reiciendis. Rem assumenda officiis nam natus reiciendis tempora autem. Enim placeat necessitatibus voluptatem ipsum.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(80, 'Totam laboriosam dicta possimus accusantium. Ut placeat vel voluptates cumque. Soluta dicta ipsum corrupti eum quam et. Quisquam reprehenderit sit accusantium cupiditate qui ea.', 'Quisquam natus pariatur earum ratione quia amet. Excepturi nihil quo omnis laudantium et quia ad. Quae eum autem ex distinctio.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(81, 'Et voluptatem ullam sit aut voluptatem in quae. Quibusdam fugit ut dolorum veritatis et qui rerum. Et quos qui sint velit vel.', 'Odit ea consequuntur quis aut molestiae. Cum aut et asperiores rem magni.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(82, 'Labore et odio quo voluptas vero sed est. Doloremque eum soluta nesciunt quasi. Consequuntur dolor asperiores debitis qui cum.', 'Ut dolores est error suscipit nobis. Qui non accusantium enim excepturi laborum. Aliquam adipisci temporibus numquam pariatur voluptates ex esse. Qui magnam ut dolorem possimus et aspernatur aut.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(83, 'Reprehenderit consequatur rerum dolores mollitia et reiciendis dignissimos. Ut accusamus quia minus sint. A quasi accusantium qui impedit voluptatum.', 'Laudantium sed aspernatur nisi debitis et accusamus quidem. Quibusdam officia ex odit quo ut sed a. Veniam qui et corporis autem voluptatem. Cupiditate dignissimos quia at autem cumque minus. Adipisci est earum cumque vel.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(84, 'Officia aperiam aut iusto. Quis sed quo et eveniet. Quaerat nulla quos blanditiis ea laborum. Qui placeat vel earum excepturi harum.', 'Molestiae tempora natus laudantium officiis optio assumenda unde. Animi id molestiae harum alias quibusdam. Qui ea sequi harum tempora quia enim assumenda ullam. Velit aut explicabo corporis at architecto.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(85, 'Iste in quo expedita veritatis ipsa. Ducimus alias dolorem iusto consequatur. Ipsam ab omnis rem rerum dolorem.', 'Veritatis veniam id eum excepturi ut est. Voluptatum officiis autem inventore illo eligendi. Eum ad voluptatem numquam soluta est.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(86, 'Ut quae nihil soluta maiores aliquam sint. Accusantium possimus sed doloribus occaecati vel dolor sit. Voluptatum aliquid et aut fuga quaerat voluptas.', 'Culpa non temporibus rerum eos molestiae est. Est nisi quaerat ipsum sunt odio velit. Et molestiae id vel accusamus.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(87, 'Aut optio iste fuga fuga saepe. Reiciendis officiis ipsam eos nihil beatae. Sit quasi fugit exercitationem id.', 'Error doloribus consectetur autem et ut hic quae. Numquam ut recusandae sit occaecati asperiores non.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(88, 'Nemo in officia quam voluptatum aut. Nobis amet consequuntur ducimus aliquam.', 'Sit reprehenderit alias tempora itaque quasi blanditiis. Possimus reiciendis laboriosam ad sequi. Hic quae eligendi magni quasi.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(89, 'Quae facere aliquam labore quaerat iure. Et est id rem sequi molestiae et est. Aliquam quia in quisquam.', 'Quia accusantium asperiores dolorem magnam qui. Soluta maxime deserunt minima quidem ipsum aperiam sed consequatur. Id laboriosam doloremque impedit omnis veritatis. Vel libero quasi accusamus explicabo. Temporibus eveniet vitae eum possimus assumenda facilis.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(90, 'Necessitatibus magnam eum quaerat sunt repellendus. Beatae eaque rerum aperiam facere et est.', 'Autem reiciendis laboriosam officiis aut quia corporis ut. Consequatur optio fugiat quia qui magnam ea ex.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(91, 'Dolorem deserunt enim amet vel error libero qui. Optio soluta magni ducimus aperiam molestiae harum saepe. Aut et et id distinctio. Ipsa explicabo aut accusamus magnam corrupti ducimus debitis.', 'Repellendus maxime quaerat velit unde. Et delectus quia laboriosam architecto voluptas doloribus. Possimus et aperiam nihil enim.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(92, 'Vitae sint reiciendis minus recusandae culpa consequuntur. Perspiciatis repellat dolor iste nesciunt quis. Quae eos esse ipsum voluptatibus sequi autem reprehenderit libero.', 'Consequatur repudiandae accusantium quisquam. Facilis pariatur et in qui molestias voluptate suscipit consectetur. Eos eveniet optio eos fuga velit ad.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(93, 'Excepturi delectus id est natus explicabo. Ullam dolorum expedita saepe qui nemo nihil. Quia corrupti sed veritatis id corporis quaerat quia.', 'Dignissimos ipsum dignissimos et qui ea voluptates unde. Voluptas atque deserunt et voluptatem quos tempora doloremque molestiae. Ea dolores iusto totam voluptas quia quisquam non. Rem beatae quisquam quia.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(94, 'Quibusdam modi molestias quisquam eius. Incidunt repellat est eligendi fugiat deleniti quasi. Hic facilis dolor sapiente.', 'Praesentium inventore aliquam culpa corporis. Voluptatibus non at blanditiis quia expedita quaerat. Voluptatem et est laborum rerum perferendis numquam. Corrupti et praesentium voluptas nesciunt quis corrupti dolores. Accusantium iste saepe quo labore.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(95, 'Pariatur sit debitis tempora cumque beatae. Sit at aliquam aut similique consequatur autem laudantium mollitia. Consequatur beatae quia nam dolorem ut dolores exercitationem.', 'Quisquam voluptas vero qui et praesentium voluptas optio excepturi. Voluptatem et distinctio aperiam. Cupiditate architecto voluptas veniam enim doloribus assumenda. Nemo molestiae quo ipsam quia.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(96, 'Et quis eligendi corporis ipsam. Dolorem et perspiciatis ut alias. Veniam eaque qui autem excepturi ullam corporis qui.', 'Maxime inventore dicta voluptas accusamus. Amet voluptas ad nesciunt beatae praesentium dolor rerum. Asperiores ex similique dolores consequatur quia earum.', 2, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(97, 'Sit possimus sunt illum numquam saepe. Aut aut impedit fugit consequuntur in et. Animi vitae nam corrupti consequatur pariatur ratione debitis.', 'Quis beatae velit laborum totam magnam. Est omnis quisquam voluptatem laborum nihil et quisquam. Molestiae et est aspernatur omnis assumenda.', 1, 0, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(98, 'Suscipit culpa numquam aut ut dolores hic. Labore et nisi ut qui officiis repellendus fugit. Velit adipisci voluptatem voluptatem non voluptatibus. Nobis a iusto doloremque.', 'Perspiciatis dicta qui qui qui omnis mollitia est. Iusto enim ut iure aut. Qui molestiae autem at praesentium. Ex eaque aliquam cum non.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(99, 'Sunt dignissimos voluptates occaecati et ut et ea. Porro officia veritatis possimus beatae magni. Fugiat beatae voluptatum voluptatem alias. Aliquid ducimus debitis explicabo aliquid omnis qui.', 'Numquam vitae modi et nemo non. Rerum aut cum accusantium itaque voluptatem facilis libero. Saepe nisi eligendi delectus officia.', 2, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(100, 'Suscipit sed iusto vero omnis tenetur qui a explicabo. Et enim fugiat laudantium nesciunt aut in. Ullam totam mollitia dicta sunt est et tempora.', 'Eum ut aut veniam quo nam. Sit placeat voluptatem qui expedita inventore autem. Omnis ducimus qui dolor qui blanditiis modi. Corrupti ut recusandae enim. Eos in sapiente incidunt odio voluptates est.', 1, 1, '2022-10-26 09:25:24', '2022-10-26 09:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `fk_supplier_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drug_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_price` double(8,2) NOT NULL,
  `retail_price` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `fk_manufacturer_id`, `fk_supplier_id`, `name`, `generic`, `drug_class`, `description`, `pack_size`, `trade_price`, `retail_price`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(9, 3, 2, 'ARSLAN MAJID', 'Moxifloxacin 0.5%', 'Anti-infective', 'Ophthalmic Company', '5ml', 270.00, 320.00, 1, 'sdsdada', '2022-12-07 00:38:50', '2022-12-07 01:37:38'),
(10, 4, 2, 'Crestane', 'Propylene Glycol + Polythylane Glycol', 'Anti-infective', 'dfdsds', '56ml', 200.00, 250.00, 1, 'sdasd', '2022-12-07 01:39:54', '2022-12-07 01:39:54'),
(11, 6, 2, 'Crestane', 'Propylene Glycol + Polythylane Glycol', 'Anti-infective', 'Ophthalmic Company', '5ml', 270.00, 320.00, 1, 'na', '2022-12-10 23:57:24', '2022-12-10 23:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Arslan', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(2, 'admin', 'web', '2022-10-26 09:25:24', '2022-10-26 09:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2),
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
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fbr_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `description`, `fbr_no`, `license_no`, `address`, `contact`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 'Hamza Medicine Company', 'Mehr Akhter', '1989', '2004', 'Shamsabad Multan', '03006323103', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pulvinar, purus convallis bibendum fringilla, est nulla iaculis arcu, nec suscipit diam nisl at enim. Duis rutrum dignissim risus et pretium. Sed eu tristique nulla. sjdksjadjasjdskdjsa ddfsfd df', '2022-11-17 17:08:14', '2022-11-30 05:16:36'),
(3, 'Nmadsasdfad', '2323', '888', '2342323', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', '03006323103', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pulvinar, purus convallis bibendum fringilla, est nulla iaculis arcu, nec suscipit diam nisl at enim. Duis rutrum dignissim risus et pretium. Sed eu tristique nulla. sjdksjadjasjdskdjsa ddfsfd df', '2022-11-21 07:09:14', '2022-11-30 04:52:37'),
(4, 'Arslan Majid', 'Ophthalmic Company', '888', '565656', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', '03006323103', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pulvinar, purus convallis bibendum fringilla, est nulla iaculis arcu, nec suscipit diam nisl at enim. Duis rutrum dignissim risus et pretium. Sed eu tristique nulla. sjdksjadjasjdskdjsa ddfsfd df', '2022-11-30 05:16:50', '2022-11-30 05:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_patients_id` bigint(20) UNSIGNED NOT NULL,
  `fees` int(10) UNSIGNED NOT NULL,
  `denomination` int(10) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `fk_patients_id`, `fees`, `denomination`, `balance`, `created_at`, `updated_at`) VALUES
(1, 2, 1000, 1000, 0, '2022-11-02 10:05:05', '2022-11-02 10:05:05'),
(2, 2, 10000, 10000, 0, '2022-11-29 11:52:54', '2022-11-29 11:52:54'),
(3, 2, 2000, 2000, 0, '2022-11-30 07:35:06', '2022-11-30 07:35:24'),
(4, 2, 5000, 5000, 0, '2022-12-10 23:54:32', '2022-12-10 23:54:32'),
(5, 2, 5000, 5000, 0, '2022-12-11 00:01:10', '2022-12-11 00:02:03'),
(6, 2, 1000, 1000, 0, '2023-01-15 07:50:53', '2023-01-15 07:50:53'),
(7, 2, 1500, 1500, 0, '2023-01-19 11:31:08', '2023-01-19 11:31:50');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arslan Majid', 'amhmultan@gmail.com', NULL, '$2y$10$pWaPi7doJqbKLD68Erxqa.s5F9ETCR/vVYswd3Vy3U.APip78kGru', 'dGykLpDCot2d2pGzUWz0iNv8Wv8zyoGpN88nsE9r1vgPfW0s6DaaxVOedf4M', '2022-10-26 09:25:24', '2022-10-26 09:25:24'),
(2, 'Admin', 'admin@admin.com', NULL, '$2y$10$WpnCt53QNhqjyuLXn6aIGu968W8kDmQwiOYqdfvNkAPtrpwWhzvLy', '0RfK9KZHi9TZ0VkwOBv2UiZp4vxhBcOXILaDMEYG1qFPcY1VJyzzCdW1R7rG', '2022-10-26 09:25:24', '2022-12-10 23:59:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_notes_fk_patient_id_foreign` (`fk_patient_id`),
  ADD KEY `doctor_notes_fk_token_id_foreign` (`fk_token_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frontusers`
--
ALTER TABLE `frontusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `frontusers_email_unique` (`email`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

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
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_fk_manufacturer_id_foreign` (`fk_manufacturer_id`),
  ADD KEY `products_fk_supplier_id_foreign` (`fk_supplier_id`);

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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokens_fk_patients_id_foreign` (`fk_patients_id`);

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
-- AUTO_INCREMENT for table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontusers`
--
ALTER TABLE `frontusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  ADD CONSTRAINT `doctor_notes_fk_patient_id_foreign` FOREIGN KEY (`fk_patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_notes_fk_token_id_foreign` FOREIGN KEY (`fk_token_id`) REFERENCES `tokens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk_manufacturer_id_foreign` FOREIGN KEY (`fk_manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_fk_supplier_id_foreign` FOREIGN KEY (`fk_supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_fk_patients_id_foreign` FOREIGN KEY (`fk_patients_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
