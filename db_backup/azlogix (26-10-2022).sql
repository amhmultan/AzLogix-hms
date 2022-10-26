-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 11:13 AM
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
  `fk_patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_token_created_at` timestamp NULL DEFAULT NULL,
  `prescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_notes`
--

INSERT INTO `doctor_notes` (`id`, `fk_patient_id`, `fk_token_id`, `fk_patient_name`, `fk_token_created_at`, `prescription`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Arslan Majid', '2022-09-29 01:34:54', '1665404465.pdf', '2022-10-10 07:21:05', '2022-10-10 07:21:05'),
(2, 1, 7, 'Arslan Majid', '2022-09-29 01:34:54', '1665461126.pdf', '2022-10-10 23:05:26', '2022-10-10 23:05:26'),
(3, 15, 9, 'Arslan Majid', '2022-10-01 09:51:33', '1665461399.pdf', '2022-10-10 23:09:59', '2022-10-10 23:09:59'),
(4, 16, 15, 'Aroosh', '2022-10-10 23:15:56', '1665461824.pdf', '2022-10-10 23:17:04', '2022-10-10 23:17:04');

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

--
-- Dumping data for table `frontusers`
--

INSERT INTO `frontusers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arslan Majid', 'amhmultan@gmail.com', NULL, '$2y$10$0J.OULzsga3p3bLP8sp2i.9lnUG/TDYXY/ehGkT4BK77raMalwLje', NULL, '2022-08-22 01:04:26', '2022-08-22 01:04:26'),
(2, 'Namra Shehzadi', 'nammultan@gmail.com', NULL, '$2y$10$.3l99mPMoQynCqGKsYq2POcKWq3AFgyX4kMoAVs4Lq2DQIf4Fz0Eu', NULL, '2022-08-22 01:07:25', '2022-08-22 01:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 'Aziz Retina Eye Clinic', 'C:\\xampp\\tmp\\php4FEA.tmp', '23423', '03006323103', 'amhmultan@gmail.com', 'https://www.google.com', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'sddsdsd', '2022-08-22 06:14:08', '2022-10-13 10:29:56');

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
(1, 'Kobec Health Sciences', 'Ophthalmic Company in pakitasn', '18226556565', 'Gulberg-V, Lahore', NULL, '04232548799', 'kobec@onlince.com', 'http://www.kobeconline.com/', 'sdsd', '2022-10-01 11:06:16', '2022-10-01 11:34:01'),
(2, 'Arslan Majid', NULL, NULL, 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', NULL, '03006323103', 'amhmultan@gmail.com', NULL, NULL, '2022-10-01 11:08:29', '2022-10-01 11:08:29');

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
(9, '2022_05_31_173223_create_products_table', 2),
(10, '2022_06_12_050104_create_p_labs_table', 3),
(11, '2022_06_12_050104_create_p_lab_table', 4),
(12, '2022_08_20_192043_create_hospitalconfig_table', 4),
(13, '2022_08_20_194445_create_hospitalconfig_table', 5),
(14, '2022_08_22_102835_create_hospitals_table', 6),
(15, '2022_10_01_140110_create_manufacturers_table', 7),
(16, '2022_10_01_142336_create_suppliers_table', 7);

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
(2, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 3);

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
(1, 'Arslan Majid', 'Majid Hussain', '1989-07-17', 'Others', 'Separated', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'Wife', '03356323103', 'Digestion Problem', 'Dr Ajmal Ch', '2022-08-17 12:17:14', '2022-08-17 12:17:30'),
(2, 'Namra Shehzadi', 'Chudhri Muneer Ahmad Budar', '1995-10-08', 'Others', 'Separated', '03356323103', 'nammultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Arslan Majid', 'Husband', '03006323103', 'Haemenjioma', 'Self', '2022-08-17 15:42:57', '2022-08-17 15:43:13'),
(3, 'Arslan Majid', 'Majid Hussain', '5550-05-05', 'Male', 'Single', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'sd', '03006323103', 'sdsd', 'sds', '2022-08-17 16:20:12', '2022-08-17 16:20:12'),
(4, 'Arslan Majid', 'Majid Hussain', '5555-05-02', 'Male', 'Single', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'Wife', '03006323103', 'sdsd', 'sdsdsdsdsdsd', '2022-08-17 16:30:35', '2022-08-17 16:30:35'),
(5, 'Arslan Majid', 'sddssd', '2199-05-06', 'Male', 'Single', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'Wifesdsds', '03006323103', 'sdd', 'weewewe', '2022-08-17 16:31:21', '2022-08-17 16:31:21'),
(6, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '[asdsdsa]', '[sddsdsd]', '[1989-07-17]', '[Male]', '[Single]', '[03006323103]', '[amhmultan@gmail.com]', '[36302-7979826-5]', '[Multan]', '[sdsd]', '[dssdsd]', '[03006323103]', '[sdsdsd]', '[sdsd]', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Tooba Ghori', 'Sohaib', '2022-09-13', 'Female', 'Married', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'gf', '03006323103', 'dewpression', 'dr Arslan', '2022-09-29 10:45:53', '2022-09-29 10:45:53'),
(15, 'Arslan Majid', 'Majid Hussain', '2022-10-01', 'Male', 'Married', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'Wife', '03006323103', 'sdsds', 'sdsd', '2022-10-01 09:50:53', '2022-10-01 09:50:53'),
(16, 'Aroosh', 'Arslan', '2022-10-11', 'Female', 'Single', '03356323103', 'arhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Namra', 'Mother', '03006323103', 'dsfrgtrg', 'wedwrf', '2022-10-10 23:15:09', '2022-10-10 23:15:09'),
(17, 'Arslan Majid', 'Majid Hussain', '6566-04-01', 'Male', 'Single', '03006323103', 'amhmultan@gmail.com', '36302-9246530-2', 'Al-Rehman Street, Near Al-Ghafoor Masjid, Garden Town, Multan Cantt', 'Arslan Majid', 'Wife', '03456323103', 'SAS', 'ASDA', '2022-10-11 01:22:35', '2022-10-11 01:22:35');

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
(1, 'Post access', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(2, 'Post edit', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(3, 'Post create', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(4, 'Post delete', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(5, 'Role access', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(6, 'Role edit', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(7, 'Role create', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(8, 'Role delete', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(9, 'User access', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(10, 'User edit', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(11, 'User create', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(12, 'User delete', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(13, 'Permission access', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(14, 'Permission edit', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(15, 'Permission create', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(16, 'Permission delete', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(17, 'Patient access', 'web', '2022-05-07 18:01:14', '2022-05-07 18:01:38'),
(19, 'Patient edit', 'web', '2022-05-07 18:01:49', '2022-05-07 18:01:49'),
(20, 'Patient create', 'web', '2022-05-07 18:01:59', '2022-05-07 18:01:59'),
(21, 'Patient delete', 'web', '2022-05-07 18:02:12', '2022-05-07 18:02:12'),
(22, 'Product access', 'web', '2022-05-31 12:26:53', '2022-05-31 12:26:53'),
(23, 'Product create', 'web', '2022-05-31 12:27:03', '2022-05-31 12:27:15'),
(24, 'Product edit', 'web', '2022-05-31 12:27:28', '2022-05-31 12:27:28'),
(25, 'Product delete', 'web', '2022-05-31 12:27:36', '2022-05-31 12:27:36'),
(26, 'Pathology lab access', 'web', '2022-06-12 00:28:41', '2022-06-12 00:28:41'),
(34, 'Hospital access', 'web', '2022-08-20 14:16:40', '2022-08-22 05:43:31'),
(35, 'HospitalConfig create', 'web', '2022-08-20 14:16:58', '2022-10-05 12:38:09'),
(36, 'HospitalConfig edit', 'web', '2022-08-20 14:17:55', '2022-10-05 12:38:23'),
(37, 'HospitalConfig delete', 'web', '2022-08-20 14:18:03', '2022-10-05 12:38:31'),
(38, 'Token access', 'web', '2022-09-03 22:32:04', '2022-09-03 22:32:04'),
(39, 'Token add', 'web', '2022-09-03 22:32:16', '2022-09-03 22:32:16'),
(40, 'Token edit', 'web', '2022-09-03 22:32:28', '2022-09-03 22:32:28'),
(41, 'Token delete', 'web', '2022-09-03 22:32:38', '2022-09-03 22:32:38'),
(42, 'Pharmacy access', 'web', '2022-10-01 09:53:56', '2022-10-01 09:53:56'),
(43, 'Manufacturer access', 'web', '2022-10-01 09:54:03', '2022-10-01 09:54:03'),
(44, 'Manufacturer add', 'web', '2022-10-01 09:54:11', '2022-10-01 09:54:11'),
(45, 'Manufacturer edit', 'web', '2022-10-01 09:54:19', '2022-10-01 09:54:19'),
(46, 'Manufacturer delete', 'web', '2022-10-01 09:54:26', '2022-10-01 09:54:26'),
(47, 'Supplier access', 'web', '2022-10-01 09:54:34', '2022-10-01 09:54:34'),
(48, 'Supplier add', 'web', '2022-10-01 09:54:40', '2022-10-01 09:54:40'),
(49, 'Supplier edit', 'web', '2022-10-01 09:54:51', '2022-10-01 09:54:51'),
(50, 'Supplier delete', 'web', '2022-10-01 09:54:58', '2022-10-01 09:54:58'),
(51, 'Configuration access', 'web', '2022-10-05 12:12:05', '2022-10-05 12:12:05'),
(52, 'HospitalConfig access', 'web', '2022-10-05 12:38:44', '2022-10-05 12:38:44'),
(53, 'PathologyLabConfig access', 'web', '2022-10-05 13:20:19', '2022-10-05 13:21:37'),
(54, 'PathologyLabConfig new', 'web', '2022-10-05 13:20:35', '2022-10-05 13:20:35'),
(55, 'PathologyLabConfig edit', 'web', '2022-10-05 13:20:42', '2022-10-05 13:20:42'),
(56, 'PathologyLabConfig delete', 'web', '2022-10-05 13:20:49', '2022-10-05 13:20:49'),
(57, 'DoctorNotes access', 'web', '2022-10-05 13:30:00', '2022-10-05 13:31:17'),
(58, 'DoctorNotes add', 'web', '2022-10-05 13:30:11', '2022-10-05 13:31:33'),
(59, 'DoctorNotes edit', 'web', '2022-10-05 13:30:35', '2022-10-05 13:31:25'),
(60, 'DoctorNotes delete', 'web', '2022-10-05 13:30:40', '2022-10-06 07:40:15');

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
(1, 'Non occaecati quis nam distinctio consequatur illo. Fuga quaerat aut corporis molestiae. Eius autem corporis minus aliquid.', 'Nostrum itaque dolor sit fugit enim. Tenetur porro dolorem necessitatibus. Repellat enim consequatur aut explicabo. Sit qui libero beatae aliquid quibusdam sit incidunt. Aut quos ducimus maiores qui.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(3, 'Dicta repellendus laborum est eius ut. Aliquam illum necessitatibus veniam dolore distinctio non perspiciatis. Quos unde voluptas dolor excepturi et magnam quo.', 'Vel labore quam est id atque et quia nam. Ut sint aliquam harum ut aut harum eos. Cupiditate enim non deleniti corrupti in ducimus facilis.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(4, 'Et fuga saepe cumque nisi. Aut est dolor cupiditate eaque atque magnam. Ut labore sit maiores.', 'Est est voluptatem commodi exercitationem et. Odit et ut explicabo qui aliquid. Adipisci itaque error quia consectetur magnam ut non.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(5, 'Animi vel non est ipsa reiciendis veritatis. Earum quibusdam aliquam qui eum doloribus qui. In officiis voluptatum et animi autem.', 'Sit nam et rerum facilis. Sed sint et reprehenderit ipsa harum ut. Fugit libero tempora laboriosam minus rem tempore aspernatur.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(7, 'Eum odio nihil deserunt dolor. Similique nulla ut neque accusantium. Magni reiciendis magni aut pariatur quia molestiae quae nesciunt. Itaque voluptas cumque porro enim minus eos.', 'Voluptas quo fuga at unde esse est omnis. Velit perspiciatis aut commodi cupiditate ipsa voluptatibus ipsum consequuntur. Voluptatem velit aut est occaecati. Soluta debitis magnam impedit qui illum et.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(9, 'Incidunt soluta fuga est velit. Omnis sequi qui esse ipsa vel quia sit quidem. Est doloribus rerum hic ab. Magnam sed et amet quam exercitationem tempora. Ea sit reprehenderit est earum eos.', 'Quae est aperiam hic et nesciunt veritatis laborum. Sequi et facilis sequi velit. Adipisci vel nihil aut quod quas architecto. Nam veniam modi a sit nisi non cum.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(10, 'Asperiores sed perspiciatis cupiditate. Facere fugit sed consequatur et dolorem aut aut quos. Est est qui voluptas ad sint odit. Delectus consequatur voluptatem qui quibusdam alias aperiam.', 'Ab vel facere veritatis. Suscipit assumenda consectetur sit sit quis debitis praesentium saepe. Non atque quasi culpa eos atque aperiam voluptas.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(12, 'In consequatur odio voluptas voluptates at ut. Vero doloribus maxime modi eius. Ex dignissimos ipsa illo commodi. Quibusdam alias qui voluptatibus minima voluptatem eligendi.', 'Nisi consectetur dolorum culpa voluptas eum dolor aut. Eum voluptatem aut natus maiores accusamus enim. Et repudiandae voluptates atque.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(13, 'Et ducimus similique temporibus magni molestiae officia. Dolorem et alias officiis a consequatur. Quibusdam dicta velit iste harum.', 'Porro et qui aut omnis voluptatem vitae veniam. Deserunt quis consequatur omnis autem nihil facere animi. Quo eaque id voluptatibus quia quas debitis necessitatibus. Voluptas ipsa aliquam aut facere facilis. Rerum nesciunt sint earum modi nesciunt dolor.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(15, 'Iusto illo ab ratione odit dolorem aut consequatur odit. Voluptatem aut sit in a. Quia facilis dignissimos hic quasi quasi culpa quos distinctio.', 'Natus odit quae ut dolores enim non. Itaque cupiditate et vitae dolor blanditiis est et et. Ipsum qui laborum aliquam dicta aliquam optio.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(16, 'Et veritatis odit rerum et laborum nihil qui earum. Sapiente autem natus quo cum architecto incidunt. Et quae ab ipsam sed occaecati nam perspiciatis. Deserunt sunt enim odio ad tempora minus.', 'Doloremque nulla quis aut voluptas non tempore. Nostrum non et aperiam repellat consequatur aut. Soluta consequatur non vel mollitia. Delectus amet molestiae cupiditate mollitia omnis.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(17, 'In beatae sunt eum adipisci aut. Possimus ipsa corrupti qui. Sit pariatur at doloremque ut.', 'Reprehenderit veritatis dolorem odio dolor. Facilis et laborum modi aut expedita ad. Sit omnis facere laborum ducimus odit nobis. Dignissimos ea occaecati ducimus ipsum ducimus.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(18, 'Nam rem nihil sed voluptas voluptatibus nesciunt. Perferendis magni aspernatur ipsam quo. Suscipit dolores rerum porro odit ut adipisci vero eveniet.', 'Ut ut voluptatum laudantium eum. Dolorem excepturi omnis quis qui. Quasi fuga deleniti in tempora. Aspernatur accusamus et dicta est quam iure autem.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(21, 'Quos facilis atque ut ut et magnam nihil quidem. Delectus pariatur quam dolores aut accusantium. Impedit et ullam in rerum. Voluptatem cumque quia et in laboriosam et.', 'Blanditiis alias omnis quia saepe. Rerum sit quia quo omnis. Dignissimos sunt quia deleniti pariatur sed voluptate minima. Est dolorum aliquid reiciendis culpa.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(23, 'Dicta necessitatibus doloribus velit placeat et ea delectus. Est qui rerum delectus consequatur. Fuga odio porro dolor officia.', 'Nostrum ipsa incidunt eaque dolor incidunt. Voluptate quibusdam enim facilis consequuntur. Occaecati sequi excepturi harum laboriosam ipsam.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(24, 'Consequatur placeat placeat qui et quia natus fugiat. Laborum sit sit eaque aut consequatur. Voluptas rerum voluptatem ut dolor qui ipsam in.', 'Ad ipsum et vero veritatis. Consequatur accusantium sint et adipisci repellendus quod. Voluptatem delectus voluptas eveniet autem iste harum eaque facilis. Maxime enim vitae sequi labore.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(27, 'Delectus magnam possimus molestias aut animi id. Et nisi eos ut voluptatibus aut. Molestias officiis molestiae beatae et praesentium saepe.', 'Quasi veritatis expedita qui optio vel aut. Sit autem consequatur blanditiis quam culpa impedit ipsam. Voluptatem quis repudiandae nisi illo. Nisi magnam quasi non quaerat.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(30, 'Nulla qui excepturi in sint quia recusandae laborum. Distinctio iure qui animi voluptates exercitationem nulla odit. Velit eum in a laudantium. Aut esse eum autem voluptatem est cupiditate.', 'Ut sit expedita inventore quisquam ut cum quia. Qui ut dolor ut vero. Sint provident quaerat eligendi id eos.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(31, 'Numquam tenetur sunt doloribus temporibus cupiditate qui. Voluptatem iure nihil nam inventore. Laborum sed in sequi. Quod temporibus totam adipisci veritatis. Velit quia et laborum quas.', 'Itaque doloribus quisquam in. Qui ad doloremque natus quia. Ut sed dolores quasi molestiae ut quo occaecati. Nemo tempora numquam non ipsam in magni.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(33, 'Molestiae soluta rerum laudantium cumque unde officia error. Inventore rerum nulla fuga dicta. Sapiente qui quaerat ducimus eveniet molestias.', 'Natus et cumque minus molestiae iure. Sit explicabo animi asperiores maiores et quisquam pariatur qui. Laudantium inventore excepturi aperiam. Veniam labore ipsa magnam at aut nihil totam.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(34, 'Asperiores aut aut autem quibusdam sunt. Labore vel officia quia ab ut repellendus neque vel. Perspiciatis magni reprehenderit sapiente. Molestiae suscipit fugit ex odit aut quos.', 'Suscipit doloribus soluta est dignissimos id libero nulla. Autem eos impedit sint saepe repellat dolorem. Voluptas exercitationem molestiae veritatis iure non. Qui beatae excepturi repellat omnis accusamus.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(35, 'Non ratione veniam quidem minima et laudantium. Corrupti error velit quia. Natus ipsam ullam eaque sequi libero.', 'Accusamus eveniet assumenda perferendis sunt aut rem ut. Minus et iste deleniti. Qui repellendus nemo sed aut officia corrupti enim.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(36, 'Id neque a ullam laborum a in odit. Dolorum omnis expedita dolorum expedita molestiae nihil. Assumenda consequuntur accusantium non dolore.', 'Quia itaque voluptatum et eveniet. Ab quidem vel minus veritatis. Non accusamus perspiciatis reiciendis iusto. Debitis a molestias quia maiores ut ea.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(37, 'Amet repellat quos sed culpa harum reprehenderit et. Molestias dolorem a dolor saepe. Sunt quas quaerat labore. Vel et dicta aut qui qui est.', 'Ut autem sunt officia rerum. Minus itaque delectus dolor sit. Numquam natus est doloribus voluptatem quas sed quis. Rerum laboriosam repudiandae sapiente corrupti consectetur.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(39, 'Voluptatem omnis asperiores nobis alias autem sunt est. Quo est occaecati optio velit ea.', 'Est sed omnis voluptatem accusantium velit facere. Saepe odit et molestiae libero dolor repudiandae placeat. Recusandae iure eveniet autem.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(41, 'Praesentium nobis ratione hic qui et. Odit quia molestiae voluptates. Laudantium tempore reprehenderit tempore et culpa. Fugit atque laborum voluptate.', 'Commodi sunt quisquam quos labore explicabo. Ipsum aut voluptates deleniti eos sunt deserunt architecto vero. Et facere occaecati commodi facere adipisci aut expedita. Est blanditiis quo fugiat et.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(42, 'Ratione aut voluptate eos et. Velit commodi atque cum asperiores consequatur dolorem. Accusamus repellendus doloribus itaque sunt.', 'Hic et aut ut molestiae. Ipsum laborum omnis amet facilis. Quos voluptate error neque sit explicabo natus voluptatem repudiandae. Dignissimos reprehenderit alias fugit.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(45, 'Nostrum ducimus quo voluptatem. Odit voluptatem eaque ut quisquam. Laudantium atque vitae sed repellendus.', 'Repellat unde necessitatibus sit facere omnis assumenda. Saepe assumenda qui perspiciatis voluptatem. Et ut earum sit nemo quo blanditiis omnis. Aliquam dolorum deleniti quaerat odit amet amet.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(50, 'Nihil eveniet officia commodi sed. Alias veritatis sed voluptatem maiores et veritatis ex. Tenetur autem dolores omnis tempora tenetur.', 'Est sed laudantium saepe odio et commodi ut. Et aut repellendus sit dolor ullam est corrupti facere. Exercitationem quo vel laboriosam consequatur.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(53, 'Praesentium tempore fuga dolores facere explicabo dolor quos omnis. Alias excepturi laborum mollitia omnis. Accusantium neque nemo voluptatem fuga corrupti tempore.', 'Laborum reiciendis quo natus error. Id voluptatum est culpa itaque in et eius. Tempora molestiae quis et fuga accusantium incidunt quibusdam dolor. Maxime tempora est repudiandae repellendus.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(55, 'Velit et perspiciatis recusandae itaque totam libero modi. Velit placeat dolor enim voluptatibus debitis. Ex et expedita enim labore qui quis labore sed.', 'Quae neque beatae et rerum cum dolor placeat. Odit cum vel necessitatibus ut molestias eos hic. Laborum fugiat pariatur fugiat cum dolores hic.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(56, 'Qui corporis sit vel tenetur sunt delectus. Pariatur possimus ipsum hic quibusdam natus necessitatibus.', 'Vero non voluptatum soluta iusto. Dolorem praesentium voluptatem sunt. Consequuntur expedita similique voluptatem ut.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(59, 'Itaque eligendi magni architecto occaecati est cum. Veniam est ab ullam numquam in rerum voluptatibus. Fugiat aut non quod nulla assumenda deserunt. Maxime qui laboriosam fuga et aut ab.', 'Autem omnis quisquam natus quos quis et voluptatem. Ipsa cumque cupiditate tenetur sit.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(61, 'Ea molestiae repudiandae eos ipsam exercitationem. Vero voluptatem commodi error sit eum ut velit. Voluptatem natus sunt est ab.', 'Unde quo enim aliquid dolor consequatur. Amet et aut est sed cum dolorum. Quo perspiciatis beatae ab optio. Optio praesentium non est est unde sed deleniti.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(62, 'Blanditiis recusandae doloribus commodi aut exercitationem et. Id sed consequuntur sunt fugit non sit nostrum. Vel unde nam voluptatibus tempore aut. Animi ad autem sunt vel.', 'Quibusdam error unde vel ab. At nemo at praesentium et culpa libero. Eveniet est corrupti id facere.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(64, 'Dolorum temporibus cum harum nulla. Recusandae nobis sapiente esse non velit eos porro. Qui adipisci molestiae ea odio quia odit id accusamus.', 'Tempora accusamus labore ut est sunt aliquam eum. Necessitatibus dolor sequi culpa ut. Cumque saepe voluptates qui tempora a numquam qui. Totam eveniet vero sunt a.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(65, 'Sint ut modi nobis eos tempore ea perspiciatis. Molestiae est qui aperiam facere est voluptate. Cumque recusandae molestiae culpa dolorem consequatur. Hic nihil officia a repudiandae aut quia.', 'Nisi enim quas commodi impedit ducimus quas eum. Et ipsa voluptas dicta voluptas. Non officiis ut itaque ipsam doloremque totam. Iure incidunt quos officia unde.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(69, 'Sunt aliquid necessitatibus eos voluptas. Qui et non qui excepturi unde animi vel. Ullam vel rerum dolores in et officiis.', 'Molestiae voluptas maiores iusto. Ducimus ut vel ut voluptas.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(70, 'Autem et cum eos consequatur. Sed autem cupiditate id voluptatem facilis eveniet sed similique. Deserunt sequi id vel quaerat modi. Quia labore magni nulla voluptatem vel dolorem.', 'Fuga nulla aut repellat quibusdam aut minima id. Rerum quia impedit optio eos.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(72, 'Incidunt provident excepturi at qui. Similique est non id qui alias vel corporis. Dicta hic occaecati in. Voluptatem cum deserunt est consequuntur omnis dolore est. Cupiditate quae debitis animi.', 'Nam dolorem qui eum cum. Non reiciendis aliquid dolor sed ab qui et. Corrupti vel autem repudiandae eos doloribus neque sed. Sunt omnis veniam veniam sint ea vel dolorem.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(75, 'Tempore doloribus occaecati eveniet aut est et error minima. Illum est ut placeat quas est fugit. Natus reiciendis ut vel aliquam. Non sunt corrupti sit quis sed.', 'Est eum quam dolorem quia eveniet id inventore. Est magnam beatae fugiat nobis ut illum assumenda. Quaerat saepe et ipsam officia nihil a. Doloribus voluptatem voluptatem nihil soluta nemo ut velit.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(77, 'Officiis omnis adipisci accusantium suscipit. Vel aut itaque reprehenderit. Magnam voluptatem culpa neque. Qui amet earum sunt tenetur itaque eos. Rem aut nemo aperiam.', 'Neque cum maiores nesciunt aspernatur eveniet quo. Sequi sit omnis eos iure quis. Omnis rem inventore dolores qui voluptatem aspernatur ea. Corporis in porro et soluta sequi dolorem accusamus nesciunt.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(78, 'Mollitia vel nostrum omnis minima. Dicta voluptatem dolorum placeat quidem tempore sit et est. Soluta enim dolor et culpa repellendus.', 'Expedita excepturi vel repellat debitis quam in et. Pariatur nostrum exercitationem veritatis unde et suscipit ut. Sunt at nulla suscipit expedita incidunt accusantium ducimus. Corporis aperiam consequatur officiis repellendus quia ut dolorem.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(80, 'Dolores sint cupiditate nesciunt vero nihil ipsa nostrum. Nobis quia accusamus optio voluptatem aut. Quidem assumenda ex ratione odit tempora eum rerum. Nisi quo fuga laborum laudantium.', 'Illum quibusdam unde est esse id est occaecati. Quibusdam sit temporibus rerum. Maxime veritatis et similique quod possimus fugit neque aut.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(81, 'Quos quis est nostrum incidunt id aspernatur nostrum. Eum minus vitae repellendus debitis amet. Quia sed nisi facere.', 'Voluptatem non cupiditate quasi fugit fugit repellendus. Excepturi et omnis magnam deleniti illo fuga ut. Qui et non fugiat et velit ut.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(82, 'Enim eos aspernatur atque est aut doloribus. Est quaerat atque rem laborum occaecati. Veniam hic fugit nam quos reiciendis. Et temporibus quibusdam aut quam et soluta.', 'Quia sed odit eaque aliquid aspernatur dolorem ut. Fuga nihil reiciendis officiis aut ipsa omnis. Ipsam non itaque debitis cupiditate. Voluptate itaque ipsam ducimus atque.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(83, 'Esse distinctio nihil sint. Voluptatem ad deleniti est maiores laudantium aut laborum ut. Quisquam qui repellendus nihil maiores aut accusantium corporis sunt. Soluta placeat pariatur eos.', 'Ea totam ea odio iure. Rerum sint suscipit quas dignissimos. Illo ullam ipsam in magni cum.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(86, 'Ut est dolor qui molestiae ut. Quae ducimus natus accusantium numquam ea. Et et a rerum omnis doloremque minima ex. Repellendus non id sunt debitis.', 'Odit beatae quia quos et. Illum explicabo voluptatem pariatur omnis non. Voluptas molestiae voluptas aperiam a adipisci similique. Labore vitae aut nemo fuga commodi vero vel.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(87, 'Nihil quidem laudantium veritatis omnis. Non aliquid vel quaerat est commodi ad. Facere sunt sed provident. Et ipsa ad quia sed aliquid.', 'Enim perspiciatis ut omnis soluta sed. Natus corrupti delectus molestiae beatae rerum mollitia. Magnam quia a ad amet quo dicta.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(89, 'Ratione quo consequatur nemo magni et dolores. Dolore rerum ut est qui similique numquam qui. Qui modi dolores ut porro.', 'Culpa rem ad et autem qui. Earum itaque iusto alias inventore sint id minus. Ullam eos necessitatibus earum totam iure blanditiis nihil adipisci. Vel aut quam repudiandae accusamus sapiente. Voluptatum animi non accusamus et est.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(91, 'Et illum non fugit enim autem et veritatis non. Sit perferendis quo ea minus minima quam rerum voluptate. Saepe dicta veniam debitis vel suscipit. Quisquam accusantium esse iure mollitia.', 'Est magni modi pariatur asperiores. Vel ut quisquam ipsa est veritatis. Dicta voluptates molestiae doloremque quis molestias ab enim laboriosam. Asperiores et sunt veniam laboriosam.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(94, 'Voluptatem occaecati ex minima non. Non ut dolores consequatur voluptate illo. Aut quo perspiciatis et dignissimos sed. Enim sed tempore nam nihil. Consequuntur eius rerum et ipsam unde ex.', 'Harum sunt eligendi facere eaque. Animi qui dolor dolorem quia dignissimos error. Ut non accusamus laboriosam sint sit inventore aliquam. Doloribus magni beatae maxime voluptas unde.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(95, 'Facere eum nesciunt libero qui. Non vero consequatur amet corrupti quia in quidem autem. Molestiae omnis harum dolor facere eos illo architecto. Ut nihil esse natus harum molestias.', 'Est nihil sint numquam. Perferendis aut quaerat in voluptatem molestias vel. Consequatur a iste eos ab est autem. Perferendis fuga voluptate molestiae.', 1, 1, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(96, 'Perspiciatis aut omnis hic odit magni. Dolores cum magni qui cumque nam. Est cumque id cumque rerum eum dolores recusandae.', 'Recusandae nam quam velit optio. Est est distinctio eum sit est nihil error cupiditate. Vero quia corporis unde dolorum id eum sit.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(98, 'Voluptatem minima excepturi quia et omnis architecto. Tenetur quis eveniet commodi debitis beatae exercitationem deleniti qui. Fugit et aut aut sit accusamus.', 'Voluptas ut aperiam sint molestiae non quibusdam provident. Aspernatur magni ab sed voluptatum ea. Ea voluptates eos culpa est sint non eum inventore. Iure voluptatibus maxime natus consequatur tempora.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(100, 'Est enim dolorem eaque vel. Sit qui est reprehenderit dolores id neque.', 'Reiciendis dolore nostrum consectetur. Soluta inventore accusamus id sed qui sed qui blanditiis. Accusantium tempora totam officia odit at. Quibusdam aspernatur sit non vitae nihil et.', 1, 0, '2022-05-07 18:00:20', '2022-05-07 18:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retail_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `generic`, `packing`, `trade_price`, `retail_price`, `company_name`, `status`, `quantity`, `batch_number`, `expiry_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Cemox', 'Moxifloxacin 0.5%', '5ml', '270', '320', 'Origin Pharma', 'active', '100', 'BTH-256325po', '2024-10-08', 'Cemox Purchased', '2022-05-31 13:34:19', '2022-06-11 14:21:18'),
(4, 'Crestane', 'Propylene Glycol + Polythylane Glycol', '5ml', '270', '320', 'Origin Pharma', 'deactivate', '500', 'sdsdsd', '2022-12-31', 'fddf', '2022-06-01 09:11:18', '2022-06-11 14:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `p_labs`
--

CREATE TABLE `p_labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_lab_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_lab_pic` blob DEFAULT NULL,
  `p_lab_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_lab_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_lab_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_lab_remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_labs`
--

INSERT INTO `p_labs` (`id`, `p_lab_name`, `p_lab_pic`, `p_lab_address`, `p_lab_contact`, `p_lab_email`, `p_lab_remarks`, `created_at`, `updated_at`) VALUES
(2, 'Main', NULL, 'Garden Town', '03336323103', 'amhmultan@gmail.com', 'asasas', '2022-06-12 06:44:17', '2022-07-07 13:04:53'),
(7, 'Main', 0x61726f6f73682070616e74696e672e706e67, 'Garden Town', '03336323103', 'amhmultan@gmail.com', 'ddsdsdsd', '2022-07-07 13:05:20', '2022-07-07 13:05:20'),
(8, 'dsdd', NULL, 'Garden Town', '03336323103', 'amhmultan@gmail.com', 'sdsdsdsd', '2022-07-07 13:05:47', '2022-10-05 13:25:19');

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
(1, 'admin', 'web', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(2, 'Front Office', 'web', '2022-05-07 18:00:20', '2022-05-07 18:02:49'),
(3, 'Doctor', 'web', '2022-05-07 18:03:11', '2022-05-07 18:03:11'),
(4, 'Pharmacist', 'web', '2022-05-07 18:22:37', '2022-05-07 18:22:37');

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
(1, 3),
(2, 1),
(3, 1),
(3, 3),
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
(17, 2),
(17, 3),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(22, 1),
(22, 4),
(23, 1),
(23, 4),
(24, 1),
(24, 4),
(25, 1),
(25, 4),
(26, 1),
(34, 1),
(34, 2),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(60, 1);

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
(1, 'Hamza Medicine Company', 'Distributor', '64665655', '56656565', 'Shamsabad, Multan', '03006323103', 'kfdkdjfkdjf', '2022-10-01 11:20:10', '2022-10-01 11:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_patients_id` bigint(20) UNSIGNED NOT NULL,
  `fees` int(11) NOT NULL,
  `denomination` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `fk_patients_id`, `fees`, `denomination`, `balance`, `created_at`, `updated_at`) VALUES
(6, 5, 500, 500, 500, '2022-09-29 01:20:45', '2022-09-29 01:20:45'),
(7, 1, 1000, 500, 500, '2022-09-29 01:34:54', '2022-09-29 01:34:54'),
(8, 14, 1000, 1000, 0, '2022-09-29 10:46:32', '2022-09-29 10:47:17'),
(9, 15, 1000, 1000, 500, '2022-10-01 09:51:33', '2022-10-01 09:51:33'),
(10, 14, 1000, 1000, 0, '2022-10-02 07:32:18', '2022-10-02 07:32:18'),
(11, 15, 5000, 5000, 0, '2022-10-02 07:33:22', '2022-10-02 07:33:22'),
(12, 2, 1000, 1000, 0, '2022-10-02 07:36:04', '2022-10-02 07:36:04'),
(13, 14, 100, 100, 0, '2022-10-02 08:36:36', '2022-10-02 08:36:36'),
(14, 14, 1000, 1000, 0, '2022-10-06 09:00:37', '2022-10-06 09:00:37'),
(15, 16, 1000, 1000, 0, '2022-10-10 23:15:56', '2022-10-11 03:15:43'),
(16, 1, 1000, 1000, 0, '2022-10-11 03:40:37', '2022-10-11 04:00:23');

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$Aa2pvG.w7lh0BstOt65csu5tVa9SPOnxBy2U4FRFftT0fecfDV8Ny', 'TozK13WLXiXCU4Y7yAjQNOhKF3HkS7Lj8S3MCOfqO3uuMSmUeiQYT30FXyCm', '2022-05-07 18:00:20', '2022-05-07 18:00:20'),
(3, 'Arslan Majid', 'ph@ph.com', NULL, '$2y$10$GLCQOIpdUlVf5mvL4ANHS.68LpFbNQ0QDkUl.rL8uOz6TW66byftu', 'EBwIknVy8HCVrz0D0KQ3fqxmIYeIkPZ0lyP0pYnkWM0o3xtknLpNl03hYCoN', '2022-05-31 10:36:24', '2022-05-31 10:36:24'),
(5, 'nammultan', 'nammultan@gmail.com', NULL, '$2y$10$M5LI84HhDmMZfqP7Se.z1eIDlo6sy5oosDhGJyYzEYJHnB5zX2ry.', 'xy5gZg2YGp18LyqKVlXvPDQJiRdwriAwfzoQdIcBO9Jux17cLcyKbbVjX3Mg', '2022-09-29 01:32:57', '2022-10-10 23:08:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_notes_fk_patient_id_foreign` (`fk_patient_id`),
  ADD KEY `doctor_notes_fk_token_id_foreign` (`fk_token_id`),
  ADD KEY `doctor_notes_fk_patient_name_foreign` (`fk_patient_name`),
  ADD KEY `doctor_notes_fk_token_created_at_foreign` (`fk_token_created_at`);

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
  ADD KEY `name` (`name`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_labs`
--
ALTER TABLE `p_labs`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_patients_id` (`fk_patients_id`),
  ADD KEY `created_at` (`created_at`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p_labs`
--
ALTER TABLE `p_labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_notes`
--
ALTER TABLE `doctor_notes`
  ADD CONSTRAINT `doctor_notes_fk_patient_id_foreign` FOREIGN KEY (`fk_patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_notes_fk_patient_name_foreign` FOREIGN KEY (`fk_patient_name`) REFERENCES `patients` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_notes_fk_token_created_at_foreign` FOREIGN KEY (`fk_token_created_at`) REFERENCES `tokens` (`created_at`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`fk_patients_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
