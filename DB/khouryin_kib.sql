-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2019 at 02:48 AM
-- Server version: 5.7.26-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khouryin_kib`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(8,2) NOT NULL,
  `lang` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `address`, `lat`, `lang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'asd', 'شارع الامين', 40.73, -73.82, '2019-04-02 08:08:15', '2019-04-02 08:08:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_options`
--

CREATE TABLE `application_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_options`
--

INSERT INTO `application_options` (`id`, `application_id`, `option_id`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 20, 4, 'hello', '2019-05-24 21:00:18', '2019-05-24 21:00:18'),
(2, 20, 11, 'test', '2019-05-24 21:00:18', '2019-05-24 21:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `ar_title`, `en_title`, `city_id`, `created_at`, `updated_at`) VALUES
(4, 'سوريا', 'Syria', 0, '2019-05-12 14:25:51', '2019-05-12 14:25:51'),
(5, 'دمشق', 'damascus', 4, '2019-05-12 14:25:59', '2019-05-12 14:25:59'),
(6, 'حمص', 'homs', 4, '2019-05-12 14:26:14', '2019-05-12 14:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'facebook1', 'facebook.com', '2019-04-02 08:18:36', '2019-04-02 08:18:41', NULL),
(2, 'phone', '+963111234567', '2019-05-17 22:54:14', '2019-05-17 22:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `en_title`, `ar_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asdasd', 'sadasda', '2019-04-06 19:29:31', '2019-04-06 19:29:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `url`, `media_type`, `content_id`, `content_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, '/1554589771commercial.jpg', 'image', 1, 'gallery', '2019-04-06 19:29:32', '2019-04-06 19:29:32', NULL),
(20, '/1554589772download.jpg', 'image', 1, 'gallery', '2019-04-06 19:29:32', '2019-04-06 19:29:32', NULL),
(21, '/1554589794slide4.jpg', 'image', 1, 'news', '2019-04-06 19:29:54', '2019-04-06 19:29:54', NULL),
(22, '/1554589794vo28ssjt25l21.jpg', 'image', 1, 'news\r\n', '2019-04-06 19:29:54', '2019-04-06 19:29:54', NULL),
(43, '1558487748.jpg', 'image', 1, 'service', '2019-05-21 22:15:48', '2019-05-21 22:15:48', NULL),
(44, '1558487894.jpg', 'image', 3, 'service', '2019-05-21 22:18:14', '2019-05-21 22:18:14', NULL),
(45, '1558487941.jpg', 'image', 2, 'service', '2019-05-21 22:19:01', '2019-05-21 22:19:01', NULL),
(46, '/1558488809general_carpentry.jpg', 'image', 4, 'service', '2019-05-21 22:33:29', '2019-05-21 22:33:29', NULL),
(47, '/1558488809.pdf', 'quotation', 4, 'service', '2019-05-21 22:33:29', '2019-05-21 22:33:29', NULL),
(48, '/1558488841bespoke carpentry 1.jpg', 'image', 5, 'service', '2019-05-21 22:34:01', '2019-05-21 22:34:01', NULL),
(49, '/1558488841.pdf', 'quotation', 5, 'service', '2019-05-21 22:34:01', '2019-05-21 22:34:01', NULL),
(50, '/1558487278.pdf', 'quotation', 1, 'service', '2019-05-21 22:07:58', '2019-05-21 22:07:58', NULL),
(51, '/1558487479.pdf', 'quotation', 2, 'service', '2019-05-21 22:11:19', '2019-05-21 22:11:19', NULL),
(52, '/1558487548.pdf', 'quotation', 3, 'service', '2019-05-21 22:12:28', '2019-05-21 22:12:28', NULL),
(55, '/1558490519bespoke carpentry 1.jpg', 'image', 10, 'product', '2019-05-21 23:01:59', '2019-05-21 23:01:59', NULL),
(57, '/1558490961bespoke carpentry 1.jpg', 'image', 11, 'product', '2019-05-21 23:09:21', '2019-05-21 23:09:21', NULL),
(58, '/15585186301_e7X-rfqUmez-yI_DdsyOCw.jpeg', 'image', 12, 'service', '2019-05-22 06:50:30', '2019-05-22 06:50:30', NULL),
(59, '/1558518630.pdf', 'quotation', 12, 'service', '2019-05-22 06:50:30', '2019-05-22 06:50:30', NULL),
(60, '1558894494.jpg', 'image', 13, 'service', '2019-05-22 06:52:38', '2019-05-26 15:14:54', NULL),
(61, '/1558518758.pdf', 'quotation', 13, 'service', '2019-05-22 06:52:38', '2019-05-22 06:52:38', NULL),
(62, '/15585189031_e7X-rfqUmez-yI_DdsyOCw.jpeg', 'image', 14, 'service', '2019-05-22 06:55:03', '2019-05-22 06:55:03', NULL),
(63, '/1558518903.pdf', 'quotation', 14, 'service', '2019-05-22 06:55:03', '2019-05-22 06:55:03', NULL),
(64, '/1558519194197114_123000644521275_1514087001_n.jpg', 'image', 15, 'service', '2019-05-22 06:59:54', '2019-05-22 06:59:54', NULL),
(65, '/1558519194.pdf', 'quotation', 15, 'service', '2019-05-22 06:59:54', '2019-05-22 06:59:54', NULL),
(66, '/155851926362e1689077473530b980617881817f30.jpg', 'image', 16, 'service', '2019-05-22 07:01:03', '2019-05-22 07:01:03', NULL),
(67, '/1558519263.pdf', 'quotation', 16, 'service', '2019-05-22 07:01:03', '2019-05-22 07:01:03', NULL),
(68, '/1558519340197114_123000644521275_1514087001_n.jpg', 'image', 17, 'service', '2019-05-22 07:02:20', '2019-05-22 07:02:20', NULL),
(69, '/1558519340.pdf', 'quotation', 17, 'service', '2019-05-22 07:02:20', '2019-05-22 07:02:20', NULL),
(70, '/15585200731_e7X-rfqUmez-yI_DdsyOCw.jpeg', 'image', 18, 'service', '2019-05-22 07:14:33', '2019-05-22 07:14:33', NULL),
(71, '/1558520073.pdf', 'quotation', 18, 'service', '2019-05-22 07:14:33', '2019-05-22 07:14:33', NULL),
(72, '/15585212186201205-2016-08-19154114-1471610456-650-039f7e0c77-1471963830.jpg', 'image', 19, 'service', '2019-05-22 07:33:38', '2019-05-22 07:33:38', NULL),
(73, '/1558521218.pdf', 'quotation', 19, 'service', '2019-05-22 07:33:38', '2019-05-22 07:33:38', NULL),
(74, '/15585214200d3aba266b24344bfeecc7e7ba5f81a2.jpg', 'image', 20, 'service', '2019-05-22 07:37:00', '2019-05-22 07:37:00', NULL),
(75, '/1558521420.pdf', 'quotation', 20, 'service', '2019-05-22 07:37:00', '2019-05-22 07:37:00', NULL),
(76, '1558894559.jpg', 'image', 21, 'service', '2019-05-22 07:41:51', '2019-05-26 15:15:59', NULL),
(77, '/1558521711.pdf', 'quotation', 21, 'service', '2019-05-22 07:41:51', '2019-05-22 07:41:51', NULL),
(78, '/15585408080d3aba266b24344bfeecc7e7ba5f81a2.jpg', 'image', 22, 'service', '2019-05-22 13:00:08', '2019-05-22 13:00:08', NULL),
(79, '/1558540808.pdf', 'quotation', 22, 'service', '2019-05-22 13:00:08', '2019-05-22 13:00:08', NULL),
(80, '/15585408920d3aba266b24344bfeecc7e7ba5f81a2.jpg', 'image', 23, 'service', '2019-05-22 13:01:32', '2019-05-22 13:01:32', NULL),
(81, '/1558540892.pdf', 'quotation', 23, 'service', '2019-05-22 13:01:32', '2019-05-22 13:01:32', NULL),
(82, '/15585414381_e7X-rfqUmez-yI_DdsyOCw.jpeg', 'image', 24, 'product', '2019-05-22 13:10:38', '2019-05-22 13:10:38', NULL),
(83, '/15588951171-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 25, 'service', '2019-05-26 15:25:17', '2019-05-26 15:25:17', NULL),
(84, '/1558895117.pdf', 'quotation', 25, 'service', '2019-05-26 15:25:17', '2019-05-26 15:25:17', NULL),
(85, '/15588952301-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 26, 'service', '2019-05-26 15:27:10', '2019-05-26 15:27:10', NULL),
(86, '/1558895230.pdf', 'quotation', 26, 'service', '2019-05-26 15:27:10', '2019-05-26 15:27:10', NULL),
(87, '/15588953561-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 27, 'service', '2019-05-26 15:29:16', '2019-05-26 15:29:16', NULL),
(88, '/1558895356.pdf', 'quotation', 27, 'service', '2019-05-26 15:29:16', '2019-05-26 15:29:16', NULL),
(89, '/15588954481-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 28, 'service', '2019-05-26 15:30:48', '2019-05-26 15:30:48', NULL),
(90, '/1558895448.pdf', 'quotation', 28, 'service', '2019-05-26 15:30:48', '2019-05-26 15:30:48', NULL),
(91, '/15588955321-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 29, 'service', '2019-05-26 15:32:12', '2019-05-26 15:32:12', NULL),
(92, '/1558895532.pdf', 'quotation', 29, 'service', '2019-05-26 15:32:12', '2019-05-26 15:32:12', NULL),
(93, '/15588960591-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 30, 'service', '2019-05-26 15:40:59', '2019-05-26 15:40:59', NULL),
(94, '/1558896059.pdf', 'quotation', 30, 'service', '2019-05-26 15:40:59', '2019-05-26 15:40:59', NULL),
(95, '/15588962531-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 31, 'service', '2019-05-26 15:44:13', '2019-05-26 15:44:13', NULL),
(96, '/1558896253.pdf', 'quotation', 31, 'service', '2019-05-26 15:44:13', '2019-05-26 15:44:13', NULL),
(97, '/15590450271_e7X-rfqUmez-yI_DdsyOCw.jpeg', 'image', 32, 'product', '2019-05-28 09:03:47', '2019-05-28 09:03:47', NULL),
(98, '/15590451301-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 33, 'product', '2019-05-28 09:05:30', '2019-05-28 09:05:30', NULL),
(99, '/15590460381-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 34, 'product', '2019-05-28 09:20:39', '2019-05-28 09:20:39', NULL),
(100, '/15590461201-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 35, 'product', '2019-05-28 09:22:00', '2019-05-28 09:22:00', NULL),
(101, '/15590465921-cyLnRNls8F_Z9cqFBr1l5A.png', 'image', 36, 'product', '2019-05-28 09:29:52', '2019-05-28 09:29:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_21_204936_create_media_table', 1),
(4, '2019_03_21_211201_create_services_table', 1),
(5, '2019_03_21_211635_create_news_table', 1),
(6, '2019_03_21_213546_create_galleries_table', 2),
(7, '2019_03_21_213732_create_contacts_table', 3),
(8, '2019_03_21_213841_create_about_us_table', 4),
(10, '2019_03_21_224526_create_sliders_table', 5),
(11, '2019_03_21_224759_create_partners_table', 6),
(15, '2019_03_21_225155_create_complaints_table', 7),
(16, '2019_03_21_225843_create_notifications_table', 8),
(27, '2019_03_21_230302_create_companies_table', 9),
(31, '2019_05_10_214019_create_cities_table', 9),
(32, '2019_05_06_125507_create_options_table', 10),
(33, '2019_05_14_011211_create_applications_table', 11),
(34, '2019_03_21_230422_create_banks_table', 12),
(37, '2019_05_21_152639_create_prices_table', 13),
(38, '2019_05_21_181854_create_option_services_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `en_title`, `ar_title`, `en_body`, `ar_body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sadasda', 'asdasd', 'asdasdasdasdasdasdasdasd', 'asdasdasdasdasdasdasdasd', '2019-04-06 19:29:54', '2019-04-06 19:29:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `title`, `type`, `value`, `service_id`, `created_at`, `updated_at`) VALUES
(4, 'data', 'dropdown', 'hello@test', 5, '2019-05-17 21:47:14', '2019-05-19 21:26:20'),
(10, 'data123', 'input', '', 5, '2019-05-19 20:59:08', '2019-05-19 21:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `option_services`
--

CREATE TABLE `option_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `option_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `image`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(2, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(3, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(4, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(5, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(6, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(7, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL),
(8, 'bemo', '1558313616.jpg', 'https://www.bemobank.com/', '2019-05-19 21:53:36', '2019-05-19 21:53:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner_services`
--

CREATE TABLE `partner_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parnter_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portals`
--

CREATE TABLE `portals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `portal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `en_title`, `ar_title`, `en_subtitle`, `ar_subtitle`, `ar_description`, `en_description`, `parent_id`, `active`, `company_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Medical insurance', 'تأمين صحي', 'Medical insurance', 'تأمين صحي', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 0, 1, NULL, 'service', '2019-05-22 06:50:30', '2019-05-26 15:54:40', NULL),
(14, 'Life insurance', 'التأمين على الحياة', 'Life insurance', 'التأمين على الحياة', 'التأمين على الحياة هو عقد بين شركة تأمين وحامل بوليصة يضمن فيه المؤمن دفع استحقاقات الوفاة للمستفيدين المعينين عند وفاة المؤمن عليه. او دفع تعويض للمؤمن له في حال تعرضه لاصابة سببت له عجز  جزئي او كلي دائم او مؤقت', 'Life insurance is a contract between an insurer and a policyholder in which the insurer guarantees payment of a death benefit to named beneficiaries upon the death of the insured. The insurance company promises a death benefit in consideration of the payment of premium by the insured', 0, 1, 0, 'service', '2019-05-22 06:55:03', '2019-05-22 06:55:03', NULL),
(15, 'Travel insurance', 'التأمين على السفر', 'Travel insurance', 'التأمين على السفر', 'التأمين على السفر هو تأمين يهدف إلى تغطية النفقات الطبية و الاضرار الناتجة عن إلغاء الرحلة و فقدان الأمتعة ا وحادث الطيران وغيرها من الخسائر المتكبدة أثناء السفر ، سواء على الصعيد الدولي أو المحلي.', 'Travel insurance is insurance that is intended to cover medical expenses, trip cancellation, lost luggage, flight accident and other losses incurred while traveling, either internationally or domestically.', 0, 1, 0, 'service', '2019-05-22 06:59:54', '2019-05-22 06:59:54', NULL),
(16, 'Cyber risk insurance', 'التأمين ضد  الاخطار المرتبطة بالجرائم الالكترونية', 'Cyber risk insurance', 'التأمين ضد  الاخطار المرتبطة بالجرائم الالكترونية', 'التأمين ضد  الاخطار المرتبطة بالجرائم الالكترونية: هو تأمين يستخدم لحماية الشركات والمستخدمين الأفراد من المخاطر المستندة إلى الإنترنت ، وبشكل أعم من المخاطر المتعلقة بالبنية التحتية لأنشطة تكنولوجيا المعلومات وأنشطتها', 'Cyber risk insurance:  is insurance used to protect businesses and individual users from Internet-based risks, and more generally from risks relating to information technology infrastructure and activities', 0, 1, 0, 'service', '2019-05-22 07:01:03', '2019-05-22 07:01:03', NULL),
(17, 'Motor insurance', 'التأمين على السيارات', 'Motor insurance', 'التأمين على السيارات', 'تأمين   يحمي سيارتك وسائقي السيارات الآخرين من المسؤولية في حالة وقوع حادث. يوفر تعويضًا ماليًا لتغطية أي إصابات تحدث للناس أو ممتلكاتهم', 'It protects you, your vehicle and other motorists against liability in case there is an accident. It provides financial compensation to cover any injuries caused to people or their property', 0, 1, 0, 'service', '2019-05-22 07:02:20', '2019-05-22 07:02:20', NULL),
(18, 'Marine insurance', 'التأمين البحري و تأمين النقل', 'Marine insurance', 'التأمين البحري و تأمين النقل', 'يغطي فقدان أو تلف السفن ، البضائع ، المحطات الطرفية ، وأي نقل يتم بواسطته نقل الممتلكات أو حيازتها أو حجزها بين نقاط المنشأ والوجهة النهائية عندما يتم نقل البضائع عن طريق البريد أو البريد السريع ، يتم استخدام التأمين على الشحن بدلاً من ذلك.', 'covers the loss or damage of ships, cargo, terminals, and any transport by which the property is transferred, acquired, or held between the points of origin and the final destination. ... When goods are transported by mail or courier, shipping insurance is used instead', 0, 1, 0, 'service', '2019-05-22 07:14:33', '2019-05-22 07:14:33', NULL),
(19, 'Property insurance', 'تأمين الممتلكات', 'Property insurance', 'تأمين الممتلكات', 'يوفر التأمين على الممتلكات و الحماية ضد معظم المخاطر على الممتلكات ، مثل الحريق والسرقة وبعض الأضرار الناجمة عن الطقس و العواصف  ويشمل ذلك أشكال التأمين المتخصصة مثل التأمين ضد الحريق أو التأمين ضد الفيضانات أو التأمين ضد الزلازل أو التأمين على المنازل أو تأمين المراجل .', 'Property insurance provides protection against most risks to property, such as fire, theft and some weather damage. This includes specialized forms of insurance such as fire insurance, flood insurance, earthquake insurance, home insurance, or boiler insurance.', 0, 1, 0, 'service', '2019-05-22 07:33:38', '2019-05-22 07:33:38', NULL),
(20, 'Engineering insurance', 'التأمين الهندسي', 'Engineering insurance', 'التأمين الهندسي', 'يوفر تعويض مادي  للمخاطر التي قد يتعرض لها  مشروع البناء ، والآلات والمعدات  المرتبطة بالمشروع', 'Refers to the insurance that provides economic safeguard to the risks faced by the ongoing construction project, installation project, and machines and equipment in project operation', 0, 1, 0, 'service', '2019-05-22 07:37:00', '2019-05-22 07:37:00', NULL),
(25, 'Individual insurance - Super insurance', 'التأمين الفردي - التأمين المميز', 'Individual insurance - Super insurance', 'التأمين الفردي - التأمين المميز', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 12, 1, 0, 'service', '2019-05-26 15:25:17', '2019-05-26 15:25:17', NULL),
(26, 'Individual insurance - Your plan', 'التأمين الفردي - اختر خطتك', 'Individual insurance - Your plan', 'التأمين الفردي - اختر خطتك', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 12, 1, 0, 'service', '2019-05-26 15:27:10', '2019-05-26 15:27:10', NULL),
(27, 'Family insurance  - My family insurance', 'التأمين العائلي - تأمين عائلتي', 'Family insurance  - My family insurance', 'التأمين العائلي - تأمين عائلتي', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 12, 1, 0, 'service', '2019-05-26 15:29:16', '2019-05-26 15:29:16', NULL),
(28, 'Family insurance  - Super insurance', 'التأمين العائلي - التأمين المميز', 'Family insurance  - Super insurance', 'التأمين العائلي - التأمين المميز', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 12, 1, 0, 'service', '2019-05-26 15:30:48', '2019-05-26 15:30:48', NULL),
(29, 'Group insurance', 'تأمين جماعي', 'Group insurance', 'تأمين جماعي', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 12, 1, 0, 'service', '2019-05-26 15:32:12', '2019-05-26 15:32:12', NULL),
(30, 'Individual insurance', 'التأمين الفردي', 'Individual insurance', 'التأمين الفردي', 'التأمين على الحياة هو عقد بين شركة تأمين وحامل بوليصة يضمن فيه المؤمن دفع استحقاقات الوفاة للمستفيدين المعينين عند وفاة المؤمن عليه. او دفع تعويض للمؤمن له في حال تعرضه لاصابة سببت له عجز  جزئي او كلي دائم او مؤقت', 'Life insurance is a contract between an insurer and a policyholder in which the insurer guarantees payment of a death benefit to named beneficiaries upon the death of the insured. The insurance company promises a death benefit in consideration of the payment of premium by the insured', 14, 1, 0, 'service', '2019-05-26 15:40:59', '2019-05-26 15:40:59', NULL),
(31, 'Family insurance', 'تأمين عائلي', 'Family insurance', 'تأمين عائلي', 'التأمين على الحياة هو عقد بين شركة تأمين وحامل بوليصة يضمن فيه المؤمن دفع استحقاقات الوفاة للمستفيدين المعينين عند وفاة المؤمن عليه. او دفع تعويض للمؤمن له في حال تعرضه لاصابة سببت له عجز  جزئي او كلي دائم او مؤقت', 'Life insurance is a contract between an insurer and a policyholder in which the insurer guarantees payment of a death benefit to named beneficiaries upon the death of the insured. The insurance company promises a death benefit in consideration of the payment of premium by the insured', 14, 1, 0, 'service', '2019-05-26 15:44:13', '2019-05-26 15:44:13', NULL),
(34, 'Medical insurance', 'تأمين صحي', 'Medical insurance', 'تأمين صحي', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 0, 1, 0, 'product', '2019-05-28 09:20:38', '2019-05-28 09:20:38', NULL),
(35, 'Medical insurance', 'تأمين صحي', 'Medical insurance', 'تأمين صحي', 'تغطية تأمينية تدفع مقابل المصاريف الطبية والجراحية التي يتحملها المؤمن عليه. يمكن أن يسدد التأمين الصحي للمؤمن له عن المصاريف التي تكبدها بسبب المرض أو الإصابة ، أو دفع  مباشر الى مقدم الخدمة الطبية من خلال شبكة مقدمي الخدمات', 'Insurance coverage that pays for medical and surgical expenses incurred by the insured. Health insurance can reimburse the insured for expenses incurred from illness or injury, or pay the care provider directly', 34, 1, NULL, 'https://google.com', '2019-05-28 09:22:00', '2019-05-28 09:22:00', NULL),
(36, 'Life insurance', 'التأمين على الحياة', 'Life insurance', 'التأمين على الحياة', 'التأمين على الحياة هو عقد بين شركة تأمين وحامل بوليصة يضمن فيه المؤمن دفع استحقاقات الوفاة للمستفيدين المعينين عند وفاة المؤمن عليه. او دفع تعويض للمؤمن له في حال تعرضه لاصابة سببت له عجز  جزئي او كلي دائم او مؤقت', 'Life insurance is a contract between an insurer and a policyholder in which the insurer guarantees payment of a death benefit to named beneficiaries upon the death of the insured. The insurance company promises a death benefit in consideration of the payment of premium by the insured', 0, 1, 0, 'product', '2019-05-28 09:29:52', '2019-05-28 09:29:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `fcmtoken` text COLLATE utf8mb4_unicode_ci,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_options`
--
ALTER TABLE `application_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_services`
--
ALTER TABLE `option_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_services`
--
ALTER TABLE `partner_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portals`
--
ALTER TABLE `portals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_options`
--
ALTER TABLE `application_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `option_services`
--
ALTER TABLE `option_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `partner_services`
--
ALTER TABLE `partner_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portals`
--
ALTER TABLE `portals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
