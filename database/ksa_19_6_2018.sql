-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 11:51 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdad`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `used`, `created_at`, `updated_at`) VALUES
(2, '123456', '40', '0', '2018-06-02 18:47:31', '2018-06-07 18:26:29'),
(3, '123123', '20', '1', '2018-06-07 18:24:09', '2018-06-07 19:56:26');

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
(3, '2018_05_20_233227_create_sliders_table', 1),
(4, '2018_05_21_210117_create_sections_table', 1),
(5, '2018_05_21_220405_create_pages_table', 1),
(6, '2018_05_25_231213_create_ratings_table', 1),
(7, '2018_05_30_233234_create_projects_table', 1),
(8, '2018_06_02_205656_create_coupons_table', 2),
(9, '2018_06_02_220454_create_project_datas_table', 3),
(10, '2018_06_03_200402_create_replies_table', 4),
(11, '2018_06_04_232455_create_transaction_modals_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'a:2:{s:2:\"ar\";s:12:\"الأولى\";s:2:\"en\";s:10:\"First Page\";}', 'a:2:{s:2:\"ar\";s:1054:\"<div class=\"row\"><div class=\"col\"><h3 class=\"second-title mt-4\">about us:</h3><p class=\"paragraph\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p></div></div><div class=\"row\"><div class=\"col\"><h3 class=\"second-title mt-4\">Our vision:</h3><p class=\"paragraph\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p></div></div><div class=\"row mb-4\"><div class=\"col\"><h3 class=\"second-title mt-4\">Our goals:</h3><p class=\"paragraph\">Lorem ipsum dolor sit amet</p><ul class=\"list-number\"><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul></div></div>\";s:2:\"en\";s:1054:\"<div class=\"row\"><div class=\"col\"><h3 class=\"second-title mt-4\">about us:</h3><p class=\"paragraph\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p></div></div><div class=\"row\"><div class=\"col\"><h3 class=\"second-title mt-4\">Our vision:</h3><p class=\"paragraph\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p></div></div><div class=\"row mb-4\"><div class=\"col\"><h3 class=\"second-title mt-4\">Our goals:</h3><p class=\"paragraph\">Lorem ipsum dolor sit amet</p><ul class=\"list-number\"><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul></div></div>\";}', '2018-06-01 21:00:00', '2018-06-01 20:25:11'),
(2, 'a:2:{s:2:\"ar\";s:27:\"الصفحة الثانية\";s:2:\"en\";s:11:\"Second Page\";}', 'a:2:{s:2:\"ar\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";s:2:\"en\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";}', NULL, '2018-06-01 20:20:53'),
(3, 'a:2:{s:2:\"ar\";s:27:\"الصفحة الثالتة\";s:2:\"en\";s:10:\"Third Page\";}', 'a:2:{s:2:\"ar\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";s:2:\"en\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";}', NULL, '2018-06-01 20:21:36'),
(4, 'a:2:{s:2:\"ar\";s:27:\"الصفحة الرابعة\";s:2:\"en\";s:10:\"Forth Page\";}', 'a:2:{s:2:\"ar\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";s:2:\"en\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";}', NULL, '2018-06-01 20:21:52'),
(5, 'a:2:{s:2:\"ar\";s:27:\"الصفحة الخامسة\";s:2:\"en\";s:10:\"Fifth Page\";}', 'a:2:{s:2:\"ar\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";s:2:\"en\";s:759:\"<h3>About Us:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Vision:</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto aspernatur consectetur culpa cupiditate dolor et ex illo incidunt maiores natus nulla perferendis quo recusandae rerum, similique, soluta ut voluptatem.</p><h3>Our Goals:</h3><p>Lorem ipsum dolor sit amet</p><ul><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li><li>Lorem ipsum dolor sit amet, consectetur</li></ul>\";}', NULL, '2018-06-01 20:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('eng.nour.ziadaa@gmail.com', '$2y$10$3WPgC64Tz5clrLRBMcjZUu3/Q1jkQNHx3cDqZirCFgDx6gR/SW6D2', '2018-06-16 20:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tran_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recivied_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trans_documents` text COLLATE utf8mb4_unicode_ci,
  `payment_convert_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `doc_language`, `tran_language`, `doc_content`, `notes`, `recivied_date`, `payment_method`, `documents`, `coupon`, `user_id`, `status`, `price`, `trans_documents`, `payment_convert_number`, `reply_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 'العربية', '[\"\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"]', 'عام', 'test', '2', 'PayPal', '[\"\\/uploads\\/1528743260skysports-lionel-messi-neymar-barcelona_3903309.jpg\"]', NULL, '7', '3', NULL, NULL, NULL, '2018-06-12 12:06:49', '2018-06-11 15:54:20', '2018-06-12 09:06:49'),
(2, 'تطبيق برق الاخباري ، تصميم مميز ومحتوى فريد 6', 'English', '[\"\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"]', 'عام', 'تطبيق برق الاخباري ، تصميم مميز ومحتوى فريد 6', '4', 'PayPal', '[\"\\/uploads\\/1528813895v1.0.1.docx\"]', NULL, '7', '2', '150', NULL, NULL, '2018-06-16 22:53:50', '2018-06-12 11:31:35', '2018-06-16 19:53:50'),
(3, 'بس', 'يسب', '[\"\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"]', 'عام', 'بيس', '516', 'PayPal', '[\"\\/uploads\\/1529187161\\u0627\\u0644\\u062a\\u0642\\u0627\\u06372.PNG\"]', NULL, '7', '1', NULL, NULL, NULL, NULL, '2018-06-16 19:12:41', '2018-06-16 19:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `project_datas`
--

CREATE TABLE `project_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_datas`
--

INSERT INTO `project_datas` (`id`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(2, 'a:2:{s:2:\"ar\";s:58:\"كيف تستخدم استمارة طلب الترجمة؟\";s:2:\"en\";s:40:\"How to use the translation request form?\";}', 'a:2:{s:2:\"ar\";s:165:\"أبجد هوز دولور الجلوس امات، إيليت. التشهير، المتهم، أو من الجسم مع عملائنا. ولكن إما اتهاما\";s:2:\"en\";s:117:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accusamus et aut corporis cum elit. Accusamus at aut corpori\";}', '2018-06-02 19:41:39', '2018-06-02 19:41:39'),
(3, 'a:2:{s:2:\"ar\";s:50:\"اللغات التي ترغب في ترجمتها\";s:2:\"en\";s:37:\"Languages ​​you wish to translate\";}', 'a:2:{s:2:\"ar\";s:165:\"أبجد هوز دولور الجلوس امات، إيليت. التشهير، المتهم، أو من الجسم مع عملائنا. ولكن إما اتهاما\";s:2:\"en\";s:118:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at aut corporis cum elit. Accusamus at aut corpori\";}', '2018-06-02 19:42:20', '2018-06-02 19:42:20'),
(4, 'a:2:{s:2:\"ar\";s:38:\"وثيقة / محتوى الفيديو\";s:2:\"en\";s:24:\"Document / video content\";}', 'a:2:{s:2:\"ar\";s:233:\"وثيقة / محتوى الفيديو وثيقة / محتوى الفيديو وثيقة / محتوى الفيديو وثيقة / محتوى الفيديو وثيقة / محتوى الفيديو وثيقة / محتوى الفيديو\";s:2:\"en\";s:93:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at aut corporis cum elit.\";}', '2018-06-02 19:42:55', '2018-06-02 19:42:55'),
(5, 'a:2:{s:2:\"ar\";s:36:\"إيضاحات حول الترجمة\";s:2:\"en\";s:23:\"Notes to the translator\";}', 'a:2:{s:2:\"ar\";s:221:\"إيضاحات حول الترجمة إيضاحات حول الترجمة إيضاحات حول الترجمة إيضاحات حول الترجمة إيضاحات حول الترجمة إيضاحات حول الترجمة\";s:2:\"en\";s:95:\"Notes to the translator Notes to the translator Notes to the translator Notes to the translator\";}', '2018-06-02 19:43:19', '2018-06-02 19:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `project_id`, `rating`, `review`, `user_id`, `verified`, `created_at`, `updated_at`) VALUES
(1, '1', '4', 'مشروع ممتاز جداً', '7', '1', '2018-06-11 15:55:22', '2018-06-11 15:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `project_id`, `content`, `files`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '3', 'بسم الله الرحمن الرحيم ، نبدا المشروع \r\nفي المرفقات جزء من ملف المشروع', '[]', '1', '2018-06-03 17:19:57', '2018-06-03 17:19:57'),
(2, '3', 'لملفات بالمرفقات', '[\"\\/uploads\\/1528059151NourEldeen_Ziada_cv.docx\"]', '1', '2018-06-03 17:52:31', '2018-06-03 17:52:31'),
(3, '3', 'وهذه مجموعة من الملفات \r\nبالمرفقات', '[\"\\/uploads\\/1528059169Notes_180602_122708_494.pdf\",\"\\/uploads\\/1528059169NourEldeen_Ziada_cv.docx\"]', '1', '2018-06-03 17:52:49', '2018-06-03 17:52:49'),
(4, '4', 'good project , in trans', NULL, '1', '2018-06-03 20:23:37', '2018-06-03 20:23:37'),
(5, '4', 'in trans', NULL, '1', '2018-06-03 20:25:09', '2018-06-03 20:25:09'),
(6, '4', 'in trans', NULL, '1', '2018-06-03 20:26:28', '2018-06-03 20:26:28'),
(7, '8', 'good trans , keep going', NULL, '5', '2018-06-03 21:07:21', '2018-06-03 21:07:21'),
(8, '8', 'ok ,', NULL, '1', '2018-06-03 21:08:52', '2018-06-03 21:08:52'),
(9, '13', 'تم تحويل المبلغ على حساب ، رقم الحوالة هو  : 123456789', NULL, '7', '2018-06-08 21:10:38', '2018-06-08 21:10:38'),
(10, '1', 'تم تحويل المبلغ على حساب ، البنك المحمول منه : البنك المحمولالبنك المحول اليه : البنك المحمولتاريخ التحويل : 1651-06-05تاريخ التحويل : 1651-06-05وقت التحويل : 18:51', NULL, '7', '2018-06-12 09:06:49', '2018-06-12 09:06:49'),
(11, '2', 'روابط سريعة ، تعرف المزيد', NULL, '7', '2018-06-12 11:34:50', '2018-06-12 11:34:50'),
(12, '2', 'روابط سريعة ، تعرف المزيد', NULL, '7', '2018-06-12 11:35:13', '2018-06-12 11:35:13'),
(13, '2', 'تم تحويل المبلغ <br>البنك المحمول منه : بنك فلسطين <br>  البنك المحول اليه : بنك فلسطين <br>  تاريخ التحويل : 2018-06-14 <br>  وقت التحويل : 06:31 <br>  اسم المحول ثلاثي : نورالدين زيادة <br> ', NULL, '7', '2018-06-14 11:32:47', '2018-06-14 11:32:47'),
(14, '2', 'مشروع جميل', NULL, '7', '2018-06-14 16:39:46', '2018-06-14 16:39:46'),
(15, '2', 'ddddd', NULL, '7', '2018-06-14 16:52:56', '2018-06-14 16:52:56'),
(16, '2', 'ممتاز جداً', NULL, '7', '2018-06-16 19:07:26', '2018-06-16 19:07:26'),
(17, '2', 'تم تحويل المبلغ <br>البنك المحمول منه : بنك فلسطين <br>  البنك المحول اليه : بنك الراجحي <br>  تاريخ التحويل : 2018-06-16 <br>  وقت التحويل : 06:17 <br>  اسم المحول ثلاثي : نورالدين زيادة <br> ', NULL, '7', '2018-06-16 19:53:50', '2018-06-16 19:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'a:2:{s:2:\"ar\";s:36:\"ترجمة موقع وتطبيقات\";s:2:\"en\";s:19:\"Website Translation\";}', 'a:2:{s:2:\"ar\";s:665:\"ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات ترجمة موقع وتطبيقات\";s:2:\"en\";s:153:\"is based on a professional translation team to ensure the quality of translation and rely on a multinational team of qualified translators and reviewers.\";}', '123', NULL, NULL, '2018-06-01 20:19:09'),
(2, 'a:2:{s:2:\"ar\";s:36:\"ترجمة بريد إلكتروني\";s:2:\"en\";s:17:\"Email Translation\";}', 'a:2:{s:2:\"ar\";s:237:\"تعتمد على فريق عمل متخصص في مجال ترجمة النصوص لضمان جودة الترجمة و تعتمد على فريق متعدد الجنسيات من المترجمين و المراجعين الأكفاء.\";s:2:\"en\";s:178:\"It is based on a team that specializes in the translation of texts to ensure the quality of translation and depends on a multinational team of qualified translators and auditors.\";}', '123', NULL, NULL, '2018-06-01 20:17:19'),
(3, 'a:2:{s:2:\"ar\";s:30:\"ترجمة وثائق سرية\";s:2:\"en\";s:18:\"Trans confidential\";}', 'a:2:{s:2:\"ar\";s:237:\"تعتمد على فريق عمل متخصص في مجال ترجمة النصوص لضمان جودة الترجمة و تعتمد على فريق متعدد الجنسيات من المترجمين و المراجعين الأكفاء.\";s:2:\"en\";s:178:\"It is based on a team that specializes in the translation of texts to ensure the quality of translation and depends on a multinational team of qualified translators and auditors.\";}', '123', NULL, NULL, '2018-06-01 20:18:58'),
(4, 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', '/uploads/1527895419e-commerce-payment-gateway-rqmnh.png', 'http://127.0.0.1:8000', NULL, '2018-06-01 20:23:39'),
(5, 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', '/uploads/1527895428e-commerce-shop-rqmnh-com.png', 'http://127.0.0.1:8000', NULL, '2018-06-01 20:23:48'),
(6, 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', '/uploads/1527895439e-commerce-payment-gateway-rqmnh.png', 'http://127.0.0.1:8000', NULL, '2018-06-01 20:23:59'),
(7, 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', 'a:2:{s:2:\"ar\";s:48:\"الخدمات المصرفية والمالية\";s:2:\"en\";s:30:\"Banking and financial services\";}', '123', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `desc`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'a:2:{s:2:\"ar\";s:38:\"الترجمة على الانترنت\";s:2:\"en\";s:18:\"Online Translation\";}', 'a:2:{s:2:\"ar\";s:95:\"إن كنت تحتاج إلى مترجم عبر الانترنت، فقد وجدت الأفضل\";s:2:\"en\";s:55:\"If you need an online translator, I have found the best\";}', 'http://127.0.0.1:8000', '/uploads/1527894856rqmnh-banner-2.png', '2018-06-01 20:14:16', '2018-06-01 20:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_modals`
--

CREATE TABLE `transaction_modals` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_modals`
--

INSERT INTO `transaction_modals` (`id`, `payment_id`, `payment_status`, `payment_method`, `payer_email`, `payer_first_name`, `payer_last_name`, `payer_phone`, `payment_amount`, `project_id`, `created_at`, `updated_at`) VALUES
(2, 'PAY-30F35102B8544250CLMK47KY', 'approved', 'paypal', 'eng.nour.1993@gmail.com', 'Nour', 'Ziada', '4082231014', '250.00', '9', '2018-06-04 20:48:36', '2018-06-04 20:48:37'),
(3, '123456', '123456', '123456', 'eng.nour.ziadaa@gmail.com', 'Nour Ahmed Ziada', 'Nour Ahmed Ziada', '123456', '123456', '13', '2018-06-08 21:02:41', '2018-06-08 21:02:41'),
(4, '123456789', '123456789', '123456789', 'eng.nour.ziadaa@gmail.com', 'Nour Ahmed Ziada', 'Nour Ahmed Ziada', '123456789', '123456789', '13', '2018-06-08 21:10:37', '2018-06-08 21:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `country`, `city`, `verified`, `image`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$9SKSz2fUCJlZcRlSO2hztesthhexFmwegEh/4sLQEMJR1.z2W4ILG', '123', '123', '123', '1', '123', '1', 'XA8S5UwChOb2EblRq0qVUURIhZd94TTTGe8ig7rerGMaiTksJLq2BVv31Cl4', '2018-06-01 21:00:00', '2018-06-01 21:00:00'),
(2, 'Nour Ziada', 'eng.nour.ziada@gmail.com', '$2y$10$eNvGzIX5Vhnw3YjfNI0JleAtFYGXFxJDw.uaRANrVhBT0J9OejN6u', '0599691321', 'Palestine', 'gaza', '0', '/uploads/1527896179avatar.png', '0', 'nhD0LBJNguNpHLxWGyw5ihqxV8LQpPlHtklUTfLILd3UNVBOhMpxTC1PY08A', '2018-06-01 20:36:20', '2018-06-01 20:36:20'),
(3, 'نورالدين زيادة', 'eng@gmail.com', '$2y$10$GSLUDzfnqMP8HSci79g9xuOHdiYGECBZXMWPyY/wAkZSV8QQuA4hK', 'text', 'Palestine', 'text', '0', 'text', '2', NULL, '2018-06-03 17:21:36', '2018-06-03 17:21:36'),
(4, 'خالد الأحمد', 'k@k.com', '$2y$10$kNkaOSogbl8QNF3kaddtUuh2qRDo.YTDRAoypRm9rK.jiADWuETfy', 'text', 'Palestine', 'text', '0', 'text', '2', 'TWobeoaY5I8xW1yoNY4imF9gWZrmykcu3j4gqzOTnUKdHuU9NwSogLgWbl8Q', '2018-06-03 20:32:51', '2018-06-03 20:32:51'),
(5, 'Hamza Eta', 'h@gmail.com', '$2y$10$GPlA5PSQjKALmblhWA/Om.zbdXn0gN7sCieGT88WeW1TCS14HBq8C', '351651', 'Palestine', 'gaza', '0', '/uploads/1528070510sami.png', '0', NULL, '2018-06-03 21:01:50', '2018-06-03 21:01:50'),
(6, 'Khaled Ahmed', 'khaled@gmail.com', '$2y$10$3BOXY28.mLoYxdK5.sDFHO5g/qkR9sElHbxtHlv83Syhx1b4/yw8e', '1234567', 'Palestine', 'gaza', '0', '/uploads/logo.png', '0', NULL, '2018-06-06 17:55:37', '2018-06-06 17:55:37'),
(7, 'Nour Ziada', 'eng.nour.ziadaaa@gmail.com', '$2y$10$9SKSz2fUCJlZcRlSO2hztesthhexFmwegEh/4sLQEMJR1.z2W4ILG', '00972599691321', 'Palestine', 'gaza', '0', '/uploads/1528798556team-3.jpg', '0', 'JweDj0MSclNmYdmn7o0maAL51soikevmvQUyBziJJDBXOXOp0a3BxD5Etchu', '2018-06-07 17:16:18', '2018-06-16 20:19:15'),
(8, 'Nour Super', 'eng.nour.ziadaa@gmail.com', '$2y$10$wQ2E3EkiD8PcdirPHzQvhet883LpamN.5CBJt0qOXm2GctVIU4Vw.', 'text', 'Pales', 'text', '0', 'text', '2', NULL, '2018-06-12 11:25:37', '2018-06-12 11:25:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_datas`
--
ALTER TABLE `project_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_modals`
--
ALTER TABLE `transaction_modals`
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
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_datas`
--
ALTER TABLE `project_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_modals`
--
ALTER TABLE `transaction_modals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
