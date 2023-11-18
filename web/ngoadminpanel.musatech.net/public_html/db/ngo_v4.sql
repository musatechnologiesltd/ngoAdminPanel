-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 01:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngo_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_name_ban` varchar(255) NOT NULL,
  `admin_mobile` varchar(255) NOT NULL,
  `designation_list_id` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `admin_sign` varchar(255) DEFAULT NULL,
  `admin_job_start_date` varchar(255) DEFAULT NULL,
  `admin_job_end_date` varchar(255) DEFAULT NULL,
  `admin_job_end_start_date` varchar(255) DEFAULT NULL,
  `admin_image` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `admin_email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_name_ban`, `admin_mobile`, `designation_list_id`, `branch_id`, `admin_sign`, `admin_job_start_date`, `admin_job_end_date`, `admin_job_end_start_date`, `admin_image`, `email`, `admin_email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'super admin ban', '123456789', '1', '1', NULL, NULL, NULL, NULL, NULL, 'superadmin@gmail.com', NULL, '$2y$10$edCA6a5zA4PmXvG.BeauZOZZFDEy4IZAGFnVJISqanGDmOvp89BCK', NULL, '2023-08-22 02:06:19', '2023-08-22 02:06:19'),
(2, 'Sheikh Md. Moniruzzaman', 'শেখ মোঃ মনিরুজ্জামান', '11111111111', '2', '2', 'public/uploads/adminImage/16926951171417581643bs-signature-demo_4_300x80.png', '2023-08-22', NULL, NULL, 'public/uploads/adminImage/16926951172436322600user.jpg', 'dg@gmail.com', NULL, '$2y$10$zpNHoYmbKBdrvyq8IltFveY.KK2zGuEvSYN8ZkBl4ztgBia4HaeDi', NULL, '2023-08-22 03:05:17', '2023-08-22 05:41:16'),
(3, 'Md. Anwar Hossain', 'মোঃ আনোয়ার হোসেন', '22222222222', '7', '4', 'public/uploads/adminImage/16926953614664500008bs-signature-demo_4_300x80.png', NULL, '2023-08-08', '2023-08-22', 'public/uploads/adminImage/169269536157710384236y.png', 'director1@gmail.com', NULL, '$2y$10$hnirzKU1K7h9LIS.rxkXweyAvc24GY.Yrl8xYSNSL5D27fVgQI/o.', NULL, '2023-08-22 03:09:21', '2023-08-22 06:07:15'),
(4, 'Tapan Kumar Biswas', 'তপন কুমার বিশ্বাস', '22222222222', '1', '1', 'public/uploads/adminImage/16926955485469691715bs-signature-demo_4_300x80.png', '2023-08-22', NULL, NULL, 'public/uploads/adminImage/16926955485199022640mainu.jpg', 'director2@gmail.com', NULL, '$2y$10$uMDJi10.5CIDj/SZYJmJ7.d2VScypgO4CVmRE7Vq7nT860jDPHRnu', NULL, '2023-08-22 03:12:28', '2023-08-22 03:17:12'),
(5, 'Md Mokhleshur Rahman', 'মোঃ মোখলেছুর রহমান', '33333333333', '3', '2', 'public/uploads/adminImage/16926956431290171163bs-signature-demo_4_300x80.png', '2023-08-28', NULL, NULL, 'public/uploads/adminImage/16926956439547936262demo.jpg', 'director3@gmail.com', NULL, '$2y$10$lz6FU1Tfqr38VNpSs/bug.7fjgu3X4v0moUxzPm3vNjS/zBLH/tHS', NULL, '2023-08-22 03:14:03', '2023-08-24 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_designation_histories`
--

CREATE TABLE `admin_designation_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `designation_list_id` varchar(255) DEFAULT NULL,
  `admin_job_start_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_designation_histories`
--

INSERT INTO `admin_designation_histories` (`id`, `admin_id`, `designation_list_id`, `admin_job_start_date`, `created_at`, `updated_at`) VALUES
(4, '2', '2', '2023-08-22', '2023-08-22 05:41:17', '2023-08-22 05:41:17'),
(6, '3', '7', '2023-08-22', '2023-08-22 05:41:44', '2023-08-22 05:41:44'),
(7, '5', '3', '2023-08-28', '2023-08-24 00:27:45', '2023-08-24 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `branch_step` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_code`, `branch_step`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'super admin', NULL, '2023-08-22 02:02:56', '2023-08-22 02:02:56'),
(2, 'মহাপরিচালক মহোদয়ের শাখা (২)', 'শাখা (২)', 1, '2023-08-22 02:24:21', '2023-08-22 02:24:21'),
(3, 'পরিচালক (নিবন্ধন) শাখা (২)', 'শাখা (২)', 2, '2023-08-22 02:24:41', '2023-08-22 02:24:41'),
(4, 'পরিচালক (প্রকল্প-১) শাখা (২)', 'শাখা (২)', 3, '2023-08-22 02:25:09', '2023-08-22 02:25:09'),
(5, 'পরিচালক (প্রকল্প-২) শাখা (২)', 'শাখা (২)', 4, '2023-08-22 02:25:26', '2023-08-22 02:25:26'),
(6, 'প্রশাসন  শাখা (২)', 'শাখা (২)', 5, '2023-08-22 02:25:40', '2023-08-22 02:25:40'),
(7, 'প্রকল্প-১ শাখা (১)', 'শাখা (১)', 6, '2023-08-22 02:25:57', '2023-08-22 02:25:57'),
(8, 'সহকারী পরিচালক-১ (নিবন্ধন ও নবায়ন) শাখা (১)', 'শাখা (১)', 7, '2023-08-22 02:26:17', '2023-08-22 02:26:17'),
(9, 'সহকারী পরিচালক-১ (সমন্বয়) শাখা (১)', 'শাখা (১)', 8, '2023-08-22 02:26:38', '2023-08-22 02:26:38'),
(10, 'পরিচালক (প্রকল্প-৩) শাখা (১)', 'শাখা (১)', 9, '2023-08-22 02:26:56', '2023-08-22 02:26:56'),
(11, 'পরিচালক (প্রকল্প-৪) শাখা (১)', 'শাখা (১)', 10, '2023-08-22 02:27:10', '2023-08-22 02:27:10'),
(12, 'পরিচালক (প্রকল্প-৫) শাখা (১)', 'শাখা (১)', 11, '2023-08-22 02:28:49', '2023-08-22 02:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_iso_code` varchar(255) DEFAULT NULL,
  `country_name_english` varchar(255) DEFAULT NULL,
  `country_name_bangla` varchar(255) DEFAULT NULL,
  `country_people_english` varchar(255) DEFAULT NULL,
  `country_people_bangla` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_iso_code`, `country_name_english`, `country_name_bangla`, `country_people_english`, `country_people_bangla`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'আফগানিস্তান', 'Afghanistan', 'আফগান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(2, 'AL', 'Albania', 'আলবেনিয়া', 'Albanian', 'আলবেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(3, 'DZ', 'Algeria', 'আলজেরিয়া', 'Algerian', 'আলজেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(4, 'AD', 'Andorra', 'অ্যান্ডোরা', 'Andorran', 'অ্যান্ডোরান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(5, 'AO', 'Angola', 'অ্যাঙ্গোলা', 'Angolan', 'অ্যাঙ্গোলান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(6, 'AG', 'Antigua and Barbuda', 'অ্যান্টিগুয়া ও বার্বুডা', 'Antiguan and Barbudan', 'অ্যান্টিগুয়ান এবং বারবুডান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(7, 'AR', 'Argentina', 'আর্জেন্টিনা', 'Argentinian', 'আর্জেন্টিনীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(8, 'AM', 'Armenia', 'আর্মেনিয়া', 'Armenian', 'আর্মেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(9, 'AW', 'Aruba', 'আরুবা', 'Aruban', 'আরুবান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(10, 'AU', 'Australia', 'অস্ট্রেলিয়া', 'Australian', 'অস্ট্রেলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(11, 'AT', 'Austria', 'অস্ট্রিয়া', 'Austrian', 'অস্ট্রিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(12, 'AZ', 'Azerbaijan', 'আজারবাইজান', 'Azerbaijani', 'আজারবাইজানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(13, 'BS', 'Bahamas', 'বাহামাস', 'Bahamian', 'বাহামিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(14, 'BH', 'Bahrain', 'বাহরাইন', 'Bahraini', 'বাহরাইনি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(15, 'BD', 'Bangladesh', 'বাংলাদেশ', 'Bangladeshi', 'বাংলাদেশী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(16, 'BB', 'Barbados', 'বার্বাডোস', 'Barbadian', 'বার্বাডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(17, 'BY', 'Belarus', 'বেলারুস', 'Belarusian', 'বেলারুশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(18, 'BE', 'Belgium', 'বেলজিয়াম', 'Belgian', 'বেলজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(19, 'BZ', 'Belize', 'বেলিজ', 'Belizean', 'বেলিজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(20, 'BJ', 'Benin', 'বেনিন', 'Beninese', 'বেনিনীজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(21, 'BT', 'Bhutan', 'ভুটান', 'Bhutanese', 'ভুটানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(22, 'BO', 'Bolivia', 'বলিভিয়া', 'Bolivian', 'বলিভিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(23, 'BW', 'Botswana', 'বতসোয়ানা', 'Batswana', 'বাতসোয়ানা', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(24, 'BR', 'Brazil', 'ব্রাজিল', 'Brazilian', 'ব্রাজিলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(25, 'BG', 'Bulgaria', 'বুলগেরিয়া', 'Bulgarian', 'বুলগেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(26, 'BI', 'Burundi', 'বুরুন্ডি', 'Umurundi', 'উমুরুন্ডি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(27, 'KH', 'Cambodia', 'কাম্বোডিয়া', 'Cambodian', 'কম্বোডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(28, 'CM', 'Cameroon', 'ক্যামেরুন', 'Cameroonian', 'ক্যামেরুনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(29, 'CA', 'Canada', 'কানাডা', 'Canadian', 'কানাডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(31, 'TD', 'Chad', 'চাদ', 'Chadian', 'চাদিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(32, 'CL', 'Chile', 'চিলি', 'Chilean', 'চিলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(33, 'CN', 'China', 'চীন', 'Chinese', 'চাইনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(34, 'CO', 'Colombia', 'কলম্বিয়া', 'Colombian', 'কলম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(35, 'CG', 'CONGO', 'কঙ্গো', 'Congolese', 'কঙ্গোলিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(36, 'CR', 'Costa Rica', 'কোস্টারিকা', 'Costa Rican', 'কোস্টারিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(37, 'HR', 'Croatia', 'ক্রোয়েশিয়া', 'Croatian', 'ক্রোয়েশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(38, 'CU', 'Cuba', 'কিউবা', 'Cuban', 'কিউবান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(39, 'CY', 'CYPRUS', 'সাইপ্রাস', 'Cyprus', 'সাইপ্রাস', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(40, 'CZ', 'Czech Republic', 'চেক প্রজাতন্ত্র', 'Czech', 'চেক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(41, 'DK', 'Denmark', 'ডেনমার্ক', 'Danish', 'ড্যানিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(42, 'DJ', 'Djibouti', 'জিবুতি', 'Djiboutian', 'জিবুতিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(43, 'DM', 'Dominica', 'ডোমিনিকা', 'Dominican', 'ডোমিনিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(44, 'DO', 'Dominican Republic', 'ডোমিনিকান রিপাবলিক', 'Dominican', 'ডোমিনিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(45, 'EC', 'Ecuador', 'ইকুয়েডর', 'Ecuadorian', 'ইকুয়েডরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(46, 'EG', 'Egypt', 'মিশর', 'Egyptian', 'মিশরীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(47, 'SV', 'El Salvador', 'এল সালভাদর', 'Salvadorian', 'সালভাডোরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(48, 'GQ', 'Equatorial Guinea', 'বিষুবীয় গিনি', 'Equatoguinean', 'বিষুবীযয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(49, 'ER', 'Eritrea', 'ইরিত্রিয়া', 'Eritrean', 'ইরিত্রিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(50, 'EE', 'Estonia', 'এস্তোনিয়া', 'Estonian', 'এস্তোনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(51, 'ET', 'Ethiopia', 'ইথিওপিয়া', 'Ethiopian', 'ইথিওপিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(52, 'FJ', 'Fiji', 'ফিজি', 'Fijian', 'ফিজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(53, 'FI', 'Finland', 'ফিনল্যান্ড', 'Finnish', 'ফিনিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(54, 'FR', 'France', 'ফ্রান্স', 'French', 'ফরাসি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(55, 'GA', 'Gabon', 'গ্যাবন', 'Gabonese', 'গ্যাবোনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(56, 'GM', 'Gambia', 'গাম্বিয়া', 'Gambian', 'গাম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(57, 'GE', 'Georgia', 'জর্জিয়া', 'Georgian', 'জর্জিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(58, 'DE', 'Germany', 'জার্মানি', 'German', 'জার্মান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(59, 'GH', 'Ghana', 'ঘানা', 'Ghanaian', 'ঘানাইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(60, 'GR', 'Greece', 'গ্রীস', 'Greek', 'গ্রীক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(61, 'GL', 'Greenland', 'গ্রীনল্যান্ড', 'Greenlander', 'গ্রীনল্যান্ডার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(62, 'GD', 'Grenada', 'গ্রেনাডা', 'Grenadian', 'গ্রেনাডিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(63, 'GT', 'Guatemala', 'গুয়াতেমালা', 'Guatemalan', 'গুয়াতেমালান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(64, 'GN', 'Guinea', 'গিনি', 'Guinean', 'গিনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(65, 'GW', 'Guinea-Bissau', 'গিনি-বিসাউ', 'Bissau-Guinean', 'বিসাউ-গুইনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(66, 'GY', 'Guyana', 'গায়ানা', 'Guyanese', 'গায়ানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(67, 'HT', 'Haiti', 'হাইতি', 'Haitian', 'হাইতিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(68, 'VA', 'Vatican City', 'ভ্যাটিকান সিটি', 'Vaticanian', 'ভ্যাটিকানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(69, 'HN', 'Honduras', 'হন্ডুরাস', 'Honduran', 'হন্ডুরান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(70, 'HK', 'Hong Kong', 'হংকং', 'Hongkonger', 'হংকংগার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(71, 'HU', 'Hungary', 'হাঙ্গেরি', 'Hungarian', 'হাঙ্গেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(72, 'IS', 'Iceland', 'আইসল্যান্ড', 'Icelandic', 'আইসল্যান্ডিক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(73, 'IN', 'India', 'ভারত', 'Indian', 'ভারতীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(74, 'ID', 'Indonesia', 'ইন্দোনেশিয়া', 'Indonesian', 'ইন্দোনেশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(75, 'IR', 'Iran', 'ইরান (ইসলামি প্রজাতন্ত্র)', 'Iranian', 'ইরানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(76, 'IQ', 'Iraq', 'ইরাক', 'Iraqi', 'ইরাকি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(77, 'IE', 'Ireland', 'আয়ারল্যান্ড', 'Irish', 'আইরিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(78, 'IT', 'Italy', 'ইতালি', 'Italian', 'ইতালীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(79, 'JM', 'Jamaica', 'জামাইকা', 'Jamaican', 'জ্যামাইকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(80, 'JP', 'Japan', 'জাপান', 'Japanese', 'জাপানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(81, 'JO', 'Jordan', 'জর্ডান', 'Jordanian', 'জর্ডানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(82, 'KZ', 'Kazakhstan', 'কাজাখস্তান', 'Kazakhstani', 'কাজাখস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(83, 'KE', 'Kenya', 'কেনিয়া', 'Kenyan', 'কেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(84, 'KI', 'Kiribati', 'কিরিবাতি', 'I-Kiribati', 'আই-কিরিবাতি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(85, 'KP', 'South Korea', 'দক্ষিণ কোরিয়া', 'Korean', 'কোরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(86, 'NK', 'North Korea', 'উত্তর কোরিয়া', 'Korean', 'কোরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(87, 'KR', 'South Korea', 'দক্ষিণ কোরিয়া', 'South Korean', 'দক্ষিণ কোরীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(88, 'KW', 'Kuwait', 'কুয়েত', 'Kuwaiti', 'কুয়েতি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(89, 'KG', 'Kyrgyzstan', 'কিরগিজস্তান', 'Kyrgyz', 'কিরগিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(90, 'LV', 'Latvia', 'লাটভিয়া', 'Latvian', 'লাটভিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(91, 'LB', 'Lebanon', 'লেবানন', 'Lebanese', 'লেবানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(92, 'LS', 'Lesotho', 'লেসোথো', 'Basotho', 'বাসোথো', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(93, 'LR', 'Liberia', 'লাইবেরিয়া', 'Liberian', 'লাইবেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(94, 'LY', 'Libya', 'লিবিয়া', 'Libyan', 'লিবিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(95, 'LI', 'Liechtenstein', 'লিচেনস্টেইন', 'Liechtensteiner', 'লিচেনস্টাইনার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(96, 'LT', 'Lithuania', 'লিথুয়ানিয়া', 'Lithuanian', 'লিথুয়ানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(97, 'LU', 'Luxembourg', 'লুক্সেমবার্গ', 'Luxembourger', 'লুক্সেমবার্গার', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(98, 'MK', 'North Macedonia', 'উত্তর মেসিডোনিয়া', 'Macedonian', 'ম্যাসেডোনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(99, 'MG', 'Madagascar', 'মাদাগাস্কার', 'Malagasy', 'মালাগাসি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(100, 'MW', 'Malawi', 'মালাউই', 'Malawian', 'মালাউইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(101, 'MY', 'Malaysia', 'মালয়েশিয়া', 'Malaysian', 'মালয়েশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(102, 'MV', 'Maldives', 'মালদ্বীপ', 'Maldivian', 'মালদ্বীপীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(103, 'ML', 'Mali', 'মালি', 'Malian', 'মালিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(104, 'MT', 'Malta', 'মাল্টা', 'Maltese', 'মাল্টিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(105, 'MH', 'Marshall Islands', 'মার্শাল দ্বীপপুঞ্জ', 'Marshallese', 'মার্শালিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(106, 'MR', 'Mauritania', 'মৌরিতানিয়া', 'Mauritanian', 'মৌরিতানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(107, 'MU', 'Mauritian', 'মরিশাস', 'Mauritian', 'মৌরিশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(108, 'MX', 'Mexico', 'মেক্সিকো', 'Mexican', 'মেক্সিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(109, 'MD', 'Moldova', 'মলডোভা', 'Moldovan', 'মলডোভান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(110, 'MC', 'Monaco', 'মোনাকো', 'Monacan', 'মোনাকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(111, 'MN', 'Mongolia', 'মঙ্গোলিয়া', 'Mongolian', 'মঙ্গোলিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(112, 'MA', 'Morocco', 'মরক্কো', 'Moroccan', 'মরক্কান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(113, 'MZ', 'Mozambique', 'মোজাম্বিক', 'Mozambican', 'মোজাম্বিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(114, 'MM', 'Myanmar', 'মায়ানমার', 'Myanma', 'মায়ানমা', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(115, 'NA', 'Namibia', 'নামিবিয়া', 'Namibian', 'নামিবিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(116, 'NR', 'Nauru', 'নাউরু', 'Nauruan', 'নাউরুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(117, 'NP', 'Nepal', 'নেপাল', 'Nepalese', 'নেপালি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(118, 'NL', 'Netherlands', 'নেদারল্যান্ডস', 'Dutch', 'ডাচ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(119, 'AN', 'Netherlands Antilles', 'নেদারল্যান্ডস এন্টিলস', 'Netherlands Antillean', 'নেদারল্যান্ডস এন্টিলয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(120, 'NZ', 'New Zealand', 'নিউজিল্যান্ড', 'New Zealander', 'নিউজিল্যান্ডীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(121, 'NI', 'Nicaragua', 'নিকারাগুয়া', 'Nicaraguan', 'নিকারাগুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(122, 'NE', 'Niger', 'নাইগার', 'Nigerien', 'নাইগেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(123, 'NG', 'Nigeria', 'নাইজেরিয়া', 'Nigerian', 'নাইজেরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(124, 'NU', 'Niue', 'নিউই', 'Niuean', 'নিউইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(125, 'NO', 'Norway', 'নরওয়ে', 'Norwegian', 'নরওয়েজিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(126, 'OM', 'Oman', 'ওমান', 'Omani', 'ওমানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(127, 'PK', 'Pakistan', 'পাকিস্তান', 'Pakistani', 'পাকিস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(128, 'PW', 'Palau', 'পালাউ', 'Palauan', 'পালাউয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(129, 'PS', 'State of Palestine', 'ফিলিস্তিন', 'Palestinian', 'ফিলিস্তিনি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(130, 'PA', 'Panama', 'পানামা', 'Panamanian', 'পানামানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(131, 'PG', 'Papua New Guinea', 'পাপুয়া নিউ গিনি', 'Papua New Guinean', 'পাপুয়া নিউ গিনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(132, 'PY', 'Paraguay', 'প্যারাগুয়ে', 'Paraguayan', 'প্যারাগুইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(133, 'PE', 'Peru', 'পেরু', 'Peruvian', 'পেরুভিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(134, 'PH', 'Philippines', 'ফিলিপাইনস', 'Philippine', 'ফিলিপিনো', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(135, 'PL', 'Poland', 'পোল্যান্ড', 'Polish', 'পোলিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(136, 'PT', 'Portugal', 'পর্তুগাল', 'Portuguese', 'পর্তুগীজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(137, 'QA', 'Qatar', 'কাতার', 'Qatari', 'কাতারি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(138, 'RO', 'Romania', 'রোমানিয়া', 'Romanian', 'রোমানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(139, 'RU', 'Russia', 'রাশিয়ান', 'Russian', 'রাশিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(140, 'RW', 'Rwanda', 'রুয়ান্ডা', 'Rwandan', 'রুয়ান্ডান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(141, 'KN', 'Saint Kitts and Nevis', 'সেন্ট কিটস ও নেভিস', 'Nevisian', 'নেভিসিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(142, 'LC', 'Saint Lucia', 'সেন্ট লুসিয়া', 'Saint Lucian', 'সেন্ট লুসিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(143, 'VC', 'Saint Vincent and the Grenadines', 'ভিনসেন্ট এবং গ্রেনাডাইনস', 'Vincentian and Grenadinian', 'ভিনসেন্টিয়ান এবং গ্রেনাডিনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(144, 'WS', 'Samoa', 'সামোয়া', 'Samoan', 'সামোয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(145, 'SM', 'San Marino', 'সান মারিনো', 'Sammarinese', 'সামারিনিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(146, 'ST', 'Sao Tome & Principe', 'সাও টোমে এবং প্রিনসিপে', 'Santomean', 'সান্টোমিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(147, 'SA', 'Saudi Arabia', 'সৌদি আরব', 'Saudi', 'সৌদি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(148, 'SN', 'Senegal', 'সেনেগাল', 'Senegalese', 'সেনেগালিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(149, 'CS', 'Serbia', 'সার্বিয়া', 'Serbian', 'সার্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(150, 'SC', 'Seychelles', 'সেচেলস', 'Seychellois', 'সেচেলোইস', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(151, 'SL', 'Sierra Leone', 'সিয়েরা লিওন', 'Sierra Leonean', 'সিয়েরা লিওনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(152, 'SG', 'Singapore', 'সিঙ্গাপুর', 'Singaporean', 'সিঙ্গাপুরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(153, 'SK', 'Slovakia', 'স্লোভাকিয়া', 'Slovak', 'স্লোভাক', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(154, 'SI', 'Slovenia', 'স্লোভেনিয়া', 'Slovenian', 'স্লোভেনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(155, 'SB', 'SOLOMON ISLANDS', 'সলোমান দ্বীপপুঞ্জ', 'Solomon Islander', 'সলোমন দ্বীপবাসী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(156, 'SO', 'SOMALIA', 'সোমালিয়া', 'Somali', 'সোমালি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(157, 'ZA', 'South Africa', 'দক্ষিন আফ্রিকা', 'South African', 'দক্ষিণ আফ্রিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(158, 'ES', 'Spain', 'স্পেন', 'Spanish', 'স্প্যানিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(159, 'LK', 'Sri Lanka', 'শ্রীলংকা', 'Sri Lankan', 'শ্রীলঙ্কান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(160, 'SD', 'Sudan', 'সুদান', 'Sudanese', 'সুদানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(161, 'SR', 'Suriname', 'সুরিনাম', 'Surinamese', 'সুরিনামিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(162, 'SZ', 'Eswatini', 'এস্বাতিনী', 'Emaswati', 'এমস্বতী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(163, 'SE', 'Sweden', 'সুইডেন', 'Swedish', 'সুইডিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(164, 'CH', 'Switzerland', 'সুইজারল্যান্ড', 'Swiss', 'সুইস', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(165, 'SY', 'Syria', 'সিরিয়া', 'Syrian', 'সিরিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(166, 'TW', 'TAIWAN', 'তাইওয়ান', 'Taiwanese', 'তাইওয়ানিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(167, 'TJ', 'Tajikistan', 'তাজিকিস্তান', 'Tajikistani', 'তাজিকিস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(168, 'TZ', 'Tanzania', 'তানজানিয়া', 'Tanzanian', 'তানজানিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(169, 'TH', 'Thailand', 'থাইল্যান্ড', 'Thai', 'থাই', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(170, 'TL', 'TIMOR-LESTE', 'টিমোর-লেস্টে', 'Timorese', 'তিমোরিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(171, 'TG', 'Togo', 'টোগো', 'Togolese', 'টোগোলিজ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(172, 'TO', 'Tonga', 'টোঙ্গা', 'Tongan', 'টোঙ্গান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(173, 'TT', 'TRINIDAD AND TOBAGO', 'ত্রিনিদাদ ও টোবাগো', 'Trinidadian and Tobagonian', 'ত্রিনিদাদীয় এবং টোবাগোনিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(174, 'TN', 'Tunisia', 'তিউনিসিয়া', 'Tunisian', 'তিউনিসিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(175, 'TR', 'Turkey', 'তুরস্ক', 'Turkish', 'তুর্কি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(176, 'TM', 'Turkmenistan', 'তুর্কমেনিস্তান', 'Turkmenistani', 'তুর্কমেনিস্তানি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(177, 'TV', 'Tuvalu', 'টুভালু', 'Tuvaluan', 'টুভালুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(178, 'UG', 'Uganda', 'উগান্ডা', 'Ugandan', 'উগান্ডান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(179, 'UA', 'Ukraine', 'ইউক্রেন', 'Ukrainian', 'ইউক্রেনীয়', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(180, 'AE', 'United Arab Emirates', 'সংযুক্ত আরব আমিরাত', 'Emirati', 'আমিরাতি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(181, 'GB', 'United Kingdom', 'যুক্তরাজ্য', 'British', 'ব্রিটিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(182, 'US', 'United States', 'যুক্তরাষ্ট্র', 'American', 'আমেরিকান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(183, 'Vi', 'Vietnam', 'ভিয়েতনাম', 'Vietnamese', 'ভিয়েতনামী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(184, 'UY', 'Uruguay', 'উরুগুয়ে', 'Uruguayan', 'উরুগুইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(185, 'UZ', 'Uzbekistan', 'উজবেকিস্তান', 'Uzbekistani', 'উজবেকিস্তানী', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(186, 'VU', 'Vanuatu', 'ভানুয়াটু', 'Vanuatuan', 'ভানুয়াটুয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(187, 'VE', 'Venezuela', 'ভেনেজুয়েলা', 'Venezuelan', 'ভেনেজুয়েলান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(188, 'YE', 'Yemen', 'ইয়েমেন', 'Yemeni', 'ইয়েমেনি', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(189, 'ZM', 'Zambia', 'জাম্বিয়া', 'Zambian', 'জাম্বিয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(190, 'ZW', 'Zimbabwe', 'জিম্বাবুয়ে', 'Zimbabwean', 'জিম্বাবুইয়ান', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(191, 'La', 'Laos', 'লাওস', 'Lao', 'লাও', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(192, 'Sc', 'Scotland', 'স্কটল্যান্ড', 'Scottish', 'স্কটিশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33'),
(193, 'Wa', 'Wales', 'ওয়েলস', 'Welsh', 'ওয়েলশ', '2023-07-15 02:09:33', '2023-07-15 02:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `dak_details`
--

CREATE TABLE `dak_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `decision_list` varchar(255) DEFAULT NULL,
  `decision_list_detail` varchar(255) DEFAULT NULL,
  `priority_list` varchar(255) DEFAULT NULL,
  `secret_list` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dak_details`
--

INSERT INTO `dak_details` (`id`, `sender_id`, `decision_list`, `decision_list_detail`, `priority_list`, `secret_list`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'registration', '2023-08-26 03:44:52', '2023-08-26 03:44:52'),
(5, '2', 'বিধি মোতাবেক বাবস্থা নিন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'বিশেষ গোপনীয়', 'renew', '2023-08-27 00:31:41', '2023-08-27 00:31:41'),
(6, '1', 'সিধান্ত নিজে নিন', 'পেশ করুন', 'অবিলম্বে', 'বিশেষ গোপনীয়', 'registration', '2023-08-29 01:28:21', '2023-08-29 01:28:21'),
(7, '2', 'নথিজাত করুন', NULL, 'অবিলম্বে', 'গোপনীয়', 'nameChange', '2023-08-31 01:49:53', '2023-08-31 01:49:53'),
(8, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:51:58', '2023-08-31 01:51:58'),
(9, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:52:57', '2023-08-31 01:52:57'),
(10, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:53:37', '2023-08-31 01:53:37'),
(11, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:54:56', '2023-08-31 01:54:56'),
(12, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 01:55:30', '2023-08-31 01:55:30'),
(13, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 02:02:49', '2023-08-31 02:02:49'),
(14, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'অতি গোপনীয়তা', 'nameChange', '2023-08-31 02:03:32', '2023-08-31 02:03:32'),
(15, '2', 'নথিতে উপস্থাপন করুন', NULL, 'অবিলম্বে', 'বিশেষ গোপনীয়', 'nameChange', '2023-08-31 02:08:28', '2023-08-31 02:08:28'),
(16, '2', 'নথিতে উপস্থাপন করুন', NULL, 'সর্বচ্চ অগ্রাধিকার', 'বিশেষ গোপনীয়', 'nameChange', '2023-08-31 02:10:15', '2023-08-31 02:10:15'),
(17, '2', 'বিধি মোতাবেক বাবস্থা নিন', NULL, 'অবিলম্বে', 'বিশেষ গোপনীয়', 'nameChange', '2023-08-31 02:15:27', '2023-08-31 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `designation_lists`
--

CREATE TABLE `designation_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `designation_serial` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_lists`
--

INSERT INTO `designation_lists` (`id`, `branch_id`, `designation_name`, `designation_serial`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', '1', '2023-08-22 02:06:19', '2023-08-22 02:06:19'),
(2, 2, 'মহাপরিচালক', '1.1', '2023-08-22 02:32:01', '2023-08-22 02:32:01'),
(3, 2, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '1.2', '2023-08-22 02:32:23', '2023-08-22 02:32:23'),
(4, 3, 'পরিচালক', '2.1', '2023-08-22 02:33:00', '2023-08-22 02:33:00'),
(5, 3, 'সার্টলিপিকার কম কম্পিউটার অপারেটর', '2.2', '2023-08-22 02:33:21', '2023-08-22 02:33:21'),
(6, 3, 'উচ্চমান সহকারী', '2.3', '2023-08-22 02:33:45', '2023-08-22 02:33:45'),
(7, 4, 'পরিচালক', '3.1', '2023-08-22 02:34:22', '2023-08-22 02:34:22'),
(8, 4, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '3.2', '2023-08-22 02:34:46', '2023-08-22 02:34:46'),
(9, 5, 'এনডিসি (পরিচালক)', '4.1', '2023-08-22 02:35:10', '2023-08-22 03:14:58'),
(10, 5, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '4.2', '2023-08-22 02:35:29', '2023-08-22 02:35:29'),
(11, 6, 'উপপরিচালক (সার্বিক))', '5.1', '2023-08-22 02:35:56', '2023-08-22 02:35:56'),
(12, 6, 'অফিস সহকারী-কাম-কম্পিউটার অপারেটর', '5.2', '2023-08-22 02:36:17', '2023-08-22 02:36:17'),
(13, 6, 'ডাটা এন্ট্রি কন্ট্রোল অপারেটর', '5.3', '2023-08-22 02:36:41', '2023-08-22 02:36:41'),
(14, 6, 'হিসাবরক্ষক (ক্যাশ))', '5.4', '2023-08-22 02:38:47', '2023-08-22 02:38:47'),
(15, 6, 'হিসাবরক্ষক', '5.5', '2023-08-22 02:39:30', '2023-08-22 02:39:30'),
(16, 6, 'ব্যাক্তিগত কর্মকর্তা', '5.6', '2023-08-22 02:39:59', '2023-08-22 02:39:59'),
(17, 6, 'উচ্চমান সহকারী', '5.7', '2023-08-22 02:40:17', '2023-08-22 02:40:17'),
(18, 6, 'এসাইনমেন্ট অফিসার', '5.8', '2023-08-22 02:40:49', '2023-08-22 02:40:49'),
(19, 6, 'ব্যাক্তিগত কর্মকর্তা', '5.9', '2023-08-22 02:41:17', '2023-08-22 02:41:17'),
(20, 7, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '6.1', '2023-08-22 02:41:57', '2023-08-22 02:41:57'),
(21, 7, 'উচ্চমান সহকারী', '6.2', '2023-08-22 02:42:17', '2023-08-22 02:42:17'),
(22, 7, 'ব্যাক্তিগত কর্মকর্তা', '6.3', '2023-08-22 02:43:36', '2023-08-22 02:43:36'),
(23, 7, 'উচ্চমান সহকারী', '6.4', '2023-08-22 02:44:10', '2023-08-22 02:44:10'),
(24, 7, 'এসাইনমেন্ট অফিসার', '6.5', '2023-08-22 02:44:47', '2023-08-22 02:44:47'),
(25, 8, 'সহকারী পরিচালক', '7.1', '2023-08-22 02:45:22', '2023-08-22 02:45:22'),
(26, 8, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '7.2', '2023-08-22 02:45:39', '2023-08-22 02:45:39'),
(27, 8, 'হিসাবরক্ষক (অতিরিক্ত দায়িত্ব))', '7.3', '2023-08-22 02:46:02', '2023-08-22 02:46:02'),
(28, 8, 'উচ্চমান সহকারী', '7.4', '2023-08-22 02:46:23', '2023-08-22 02:46:23'),
(29, 8, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '7.5', '2023-08-22 02:46:55', '2023-08-22 02:46:55'),
(30, 9, 'ব্যাক্তিগত কর্মকর্তা', '8.1', '2023-08-22 02:48:04', '2023-08-22 02:48:04'),
(31, 9, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '8.2', '2023-08-22 02:48:29', '2023-08-22 02:48:29'),
(32, 9, 'অফিস সহকারী-কাম-কম্পিউটার মুদ্রাক্ষরিক', '8.3', '2023-08-22 02:49:20', '2023-08-22 02:49:20'),
(33, 9, 'সহকারী পরিচালক', '8.4', '2023-08-22 02:49:53', '2023-08-22 02:49:53'),
(34, 9, 'উচ্চমান সহকারী', '8.5', '2023-08-22 02:50:21', '2023-08-22 02:50:21'),
(35, 9, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '8.6', '2023-08-22 02:50:46', '2023-08-22 02:50:46'),
(36, 10, 'পরিচালক', '9.1', '2023-08-22 02:54:42', '2023-08-22 02:54:42'),
(37, 10, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '9.2', '2023-08-22 02:54:56', '2023-08-22 02:54:56'),
(38, 11, 'পরিচালক', '10.1', '2023-08-22 02:55:14', '2023-08-22 02:55:14'),
(39, 11, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '10.2', '2023-08-22 02:55:33', '2023-08-22 02:55:33'),
(40, 12, 'পরিচালক', '11.1', '2023-08-22 02:55:55', '2023-08-22 02:55:55'),
(41, 12, 'সাঁটলিপিকার কম কম্পিউটার অপারেটর', '11.2', '2023-08-22 02:56:06', '2023-08-22 02:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `designation_steps`
--

CREATE TABLE `designation_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_list_id` bigint(20) UNSIGNED NOT NULL,
  `designation_step` varchar(255) DEFAULT NULL,
  `designation_serial` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_steps`
--

INSERT INTO `designation_steps` (`id`, `designation_list_id`, `designation_step`, `designation_serial`, `created_at`, `updated_at`) VALUES
(1, 1, 'super admin', 'super admin', '2023-08-22 02:06:19', '2023-08-22 02:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fd9_foreigner_employee_family_member_lists`
--

CREATE TABLE `fd9_foreigner_employee_family_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd9_form_id` bigint(20) UNSIGNED NOT NULL,
  `family_member_name` varchar(255) DEFAULT NULL,
  `family_member_age` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fd9_forms`
--

CREATE TABLE `fd9_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `fd9_foreigner_name` varchar(255) DEFAULT NULL,
  `fd9_father_name` varchar(255) DEFAULT NULL,
  `fd9_husband_or_wife_name` varchar(255) DEFAULT NULL,
  `fd9_mother_name` varchar(255) DEFAULT NULL,
  `fd9_birth_place` varchar(255) DEFAULT NULL,
  `fd9_dob` varchar(255) DEFAULT NULL,
  `fd9_passport_number` varchar(255) DEFAULT NULL,
  `fd9_passport_issue_date` varchar(255) DEFAULT NULL,
  `fd9_passport_expiration_date` varchar(255) DEFAULT NULL,
  `fd9_identification_mark_given_in_passport` varchar(255) DEFAULT NULL,
  `fd9_male_or_female` varchar(255) DEFAULT NULL,
  `fd9_marital_status` varchar(255) DEFAULT NULL,
  `fd9_nationality_or_citizenship` varchar(255) DEFAULT NULL,
  `fd9_details_if_multiple_citizenships` varchar(255) DEFAULT NULL,
  `fd9_previous_citizenship_is_grounds_for_non_retention` varchar(255) DEFAULT NULL,
  `fd9_current_address` varchar(255) DEFAULT NULL,
  `fd9_number_of_family_members` varchar(255) DEFAULT NULL,
  `fd9_academic_qualification` varchar(255) DEFAULT NULL,
  `fd9_technical_and_other_qualifications_if_any` varchar(255) DEFAULT NULL,
  `fd9_past_experience` varchar(255) DEFAULT NULL,
  `fd9_countries_that_have_traveled` varchar(255) DEFAULT NULL,
  `fd9_offered_post` varchar(255) DEFAULT NULL,
  `fd9_name_of_proposed_project` varchar(255) DEFAULT NULL,
  `fd9_date_of_appointment` varchar(255) DEFAULT NULL,
  `fd9_extension_date` varchar(255) DEFAULT NULL,
  `fd9_post_available_for_foreigner_and_working` varchar(255) DEFAULT NULL,
  `fd9_previous_work_experience_in_bangladesh` varchar(255) DEFAULT NULL,
  `fd9_total_foreigner_working` varchar(255) DEFAULT NULL,
  `fd9_other_information` varchar(255) DEFAULT NULL,
  `fd9_foreigner_passport_size_photo` varchar(255) DEFAULT NULL,
  `fd9_copy_of_passport` varchar(255) DEFAULT NULL,
  `verified_fd_nine_form` varchar(255) DEFAULT NULL,
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_forms`
--

INSERT INTO `fd9_forms` (`id`, `fd_one_form_id`, `fd9_foreigner_name`, `fd9_father_name`, `fd9_husband_or_wife_name`, `fd9_mother_name`, `fd9_birth_place`, `fd9_dob`, `fd9_passport_number`, `fd9_passport_issue_date`, `fd9_passport_expiration_date`, `fd9_identification_mark_given_in_passport`, `fd9_male_or_female`, `fd9_marital_status`, `fd9_nationality_or_citizenship`, `fd9_details_if_multiple_citizenships`, `fd9_previous_citizenship_is_grounds_for_non_retention`, `fd9_current_address`, `fd9_number_of_family_members`, `fd9_academic_qualification`, `fd9_technical_and_other_qualifications_if_any`, `fd9_past_experience`, `fd9_countries_that_have_traveled`, `fd9_offered_post`, `fd9_name_of_proposed_project`, `fd9_date_of_appointment`, `fd9_extension_date`, `fd9_post_available_for_foreigner_and_working`, `fd9_previous_work_experience_in_bangladesh`, `fd9_total_foreigner_working`, `fd9_other_information`, `fd9_foreigner_passport_size_photo`, `fd9_copy_of_passport`, `verified_fd_nine_form`, `chief_name`, `chief_desi`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'E8tqKGpuGJ', 'HeTkhTF7mM', '3fklbiufQ2', '38eff2rRjw', 'Pr2VRc0bi1', '15-09-2023', 'VoyHXEfVQ5', '20-09-2023', '25-09-2023', 'ECK2KXwWBV', 'পুরুষ', 'bga9eAjbSe', 'HJaf7Qdhco', 'v4aggWNnZd', 'u6uATWbOQC', 'Q8XetpHqmM', '55', 'uploads/fd9FormInfo/2023-13-0916946005359401455076.pdf', 'uploads/fd9FormInfo/2023-13-0916946005351060534004.pdf', 'uploads/fd9FormInfo/2023-13-0916946005352707206322.pdf', 'CTbYQZQ79r', 'uploads/fd9FormInfo/2023-13-0916946005356881506777.pdf', 'uploads/fd9FormInfo/2023-13-0916946005351964808197.pdf', 'নতুন', '30-09-2023', '55', 'OaVF6CFZmp', '0ijKGV0Tl6', 'AEYGURTptV', 'public/uploads/fd9FormInfo/2023-13-0916946005355275281155.jpg', 'uploads/fd9FormInfo/2023-13-0916946005359967263413.pdf', 'uploads/fd9FormInfo/2023-14-0916946756584772332468.pdf', 'rf', 'bb', 'Accepted', '2023-09-13 04:22:15', '2023-09-14 01:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `fd9_forwarding_letter_edits`
--

CREATE TABLE `fd9_forwarding_letter_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forwarding_letter_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_part_one` text NOT NULL,
  `pdf_part_two` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_forwarding_letter_edits`
--

INSERT INTO `fd9_forwarding_letter_edits` (`id`, `forwarding_letter_id`, `pdf_part_one`, `pdf_part_two`, `created_at`, `updated_at`) VALUES
(1, 4, 'উপযুক্ত বিষয় ও সূত্রস্থ পত্রের পরিপ্রেক্ষিতে বর্ণিত সংস্থার নিয়োগের নিমিত্তে\r\n                                                                               নিম্নবর্ণিত বিদেশী নাগরিকের নিয়োগ/নিরাপত্তা ছাড়পত্রের বিষয়ে প্রধানমন্ত্রীর\r\n                                                                               কার্যালয়ের ২৫ নভেম্বর, ২০২১ তারিখের পরিপত্রের নির্দেশ মোতাবেক সুরক্ষা সেবা\r\n                                                                               বিভাগের মতামত এনজিও বিষয়ক ব্যুরোতে প্রেরণের জন্য নির্দেশক্রমে অনুরোধ করা\r\n                                                                               হলো।', 'সচিব <br>\r\n                                                                              সুরক্ষা সেবা বিভাগ <br>\r\n                                                                              স্বরাষ্ট্র মন্ত্রণালয় <br>\r\n                                                                              বাংলাদেশ সচিবালয়, ঢাকা', '2023-09-14 03:27:42', '2023-09-14 03:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `fd9_one_forms`
--

CREATE TABLE `fd9_one_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `foreigner_name_for_subject` varchar(255) DEFAULT NULL,
  `sarok_number` varchar(255) DEFAULT NULL,
  `application_date` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `prokolpo_name` varchar(255) DEFAULT NULL,
  `designation_name` varchar(255) DEFAULT NULL,
  `foreigner_name_for_body` varchar(255) DEFAULT NULL,
  `expire_from_date` varchar(255) DEFAULT NULL,
  `expire_to_date` varchar(255) DEFAULT NULL,
  `attestation_of_appointment_letter` varchar(255) DEFAULT NULL,
  `copy_of_form_nine` varchar(255) DEFAULT NULL,
  `foreigner_image` varchar(255) DEFAULT NULL,
  `arrival_date_in_nvisa` varchar(255) DEFAULT NULL,
  `copy_of_nvisa` varchar(255) DEFAULT NULL,
  `proposed_from_date` varchar(255) DEFAULT NULL,
  `proposed_to_date` varchar(255) DEFAULT NULL,
  `verified_fd_nine_one_form` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd9_one_forms`
--

INSERT INTO `fd9_one_forms` (`id`, `fd_one_form_id`, `foreigner_name_for_subject`, `sarok_number`, `application_date`, `institute_name`, `prokolpo_name`, `designation_name`, `foreigner_name_for_body`, `expire_from_date`, `expire_to_date`, `attestation_of_appointment_letter`, `copy_of_form_nine`, `foreigner_image`, `arrival_date_in_nvisa`, `copy_of_nvisa`, `proposed_from_date`, `proposed_to_date`, `verified_fd_nine_one_form`, `status`, `chief_name`, `chief_desi`, `created_at`, `updated_at`) VALUES
(1, 13, 'dewqd', '2312323', '21-09-2023', 'wewqe', '1pc1it1t3H', 'DG', 'weqwe', '18-09-2023', '18-09-2023', 'uploads/fd9OneFormInfo/2023-14-0916946699324974828034.pdf', 'uploads/fd9OneFormInfo/2023-14-0916946699326761978943.pdf', 'public/uploads/fd9OneFormInfo/2023-14-0916946699322161442546.png', '20-09-2023', 'uploads/fd9OneFormInfo/2023-14-0916946699326889263652.pdf', '10-09-2023', '11-09-2023', 'uploads/fd9OneFormInfo/2023-14-0916946752973660281544.pdf', 'Submitted', 'aa', 'আমি কেউ না', '2023-09-13 23:38:52', '2023-09-14 01:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_adviser_lists`
--

CREATE TABLE `fd_one_adviser_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_adviser_lists`
--

INSERT INTO `fd_one_adviser_lists` (`id`, `fd_one_form_id`, `name`, `information`, `time_for_api`, `created_at`, `updated_at`) VALUES
(8, 14, 'rwqere', 'werwerew', '17:05:01 pm', '2023-09-10 05:05:01', '2023-09-10 05:05:01'),
(9, 16, 'report_add', '555', '17:27:11 pm', '2023-09-10 05:27:11', '2023-09-10 05:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_bank_accounts`
--

CREATE TABLE `fd_one_bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `name_of_bank` varchar(255) DEFAULT NULL,
  `branch_name_of_bank` varchar(255) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_bank_accounts`
--

INSERT INTO `fd_one_bank_accounts` (`id`, `fd_one_form_id`, `account_number`, `account_type`, `name_of_bank`, `branch_name_of_bank`, `bank_address`, `time_for_api`, `created_at`, `updated_at`) VALUES
(11, 13, '33', 'wqeqwe', 'ytryt', 'tyrty', 'rtyrt', '16:42:22 pm', '2023-09-10 04:42:22', '2023-09-10 04:42:22'),
(12, 14, '56756756', '56756', '65756', '56756', '6556', '17:05:07 pm', '2023-09-10 05:03:59', '2023-09-10 05:05:08'),
(13, 15, '33', '33', 'wqewq', 'qwe', 'qweqw', '17:14:32 pm', '2023-09-10 05:12:28', '2023-09-10 05:14:32'),
(14, 15, '33', '33', 'wqewq', 'qwe', 'qweqw', '17:14:21 pm', '2023-09-10 05:14:21', '2023-09-10 05:14:21'),
(15, 16, '33', 'rr', '33', 'qwe', '768678', '17:27:11 pm', '2023-09-10 05:27:11', '2023-09-10 05:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_forms`
--

CREATE TABLE `fd_one_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `registration_number_given_by_admin` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_name_ban` varchar(255) DEFAULT NULL,
  `organization_address` varchar(255) DEFAULT NULL,
  `address_of_head_office` varchar(255) DEFAULT NULL,
  `address_of_head_office_eng` varchar(255) DEFAULT NULL,
  `country_of_origin` varchar(255) DEFAULT NULL,
  `name_of_head_in_bd` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `tele_phone_number` varchar(255) DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `plan_of_operation` text DEFAULT NULL,
  `foregin_pdf` varchar(255) DEFAULT NULL,
  `copy_of_chalan` varchar(255) DEFAULT '0',
  `due_vat_pdf` varchar(255) DEFAULT '0',
  `change_ac_number` varchar(255) DEFAULT '0',
  `local_address` varchar(255) DEFAULT NULL,
  `annual_budget` varchar(255) DEFAULT NULL,
  `annual_budget_file` varchar(255) DEFAULT NULL,
  `treasury_number` text DEFAULT NULL,
  `attach_the__supporting_paper` text DEFAULT NULL,
  `vat_invoice_number` text DEFAULT NULL,
  `board_of_revenue_on_fees` text DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `org_phone` varchar(255) DEFAULT '0',
  `org_mobile` varchar(255) DEFAULT '0',
  `org_email` varchar(255) DEFAULT '0',
  `web_site_name` varchar(255) DEFAULT '0',
  `nationality` varchar(255) DEFAULT '0',
  `complete_status` text DEFAULT NULL,
  `verified_fd_one_form` text DEFAULT NULL,
  `verified_fd_eight_form_old` varchar(255) DEFAULT '0',
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `digital_signature` varchar(190) DEFAULT NULL,
  `digital_seal` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_forms`
--

INSERT INTO `fd_one_forms` (`id`, `user_id`, `registration_number`, `registration_number_given_by_admin`, `organization_name`, `organization_name_ban`, `organization_address`, `address_of_head_office`, `address_of_head_office_eng`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `address`, `district`, `phone`, `tele_phone_number`, `email`, `citizenship`, `profession`, `plan_of_operation`, `foregin_pdf`, `copy_of_chalan`, `due_vat_pdf`, `change_ac_number`, `local_address`, `annual_budget`, `annual_budget_file`, `treasury_number`, `attach_the__supporting_paper`, `vat_invoice_number`, `board_of_revenue_on_fees`, `time_for_api`, `org_phone`, `org_mobile`, `org_email`, `web_site_name`, `nationality`, `complete_status`, `verified_fd_one_form`, `verified_fd_eight_form_old`, `chief_name`, `chief_desi`, `digital_signature`, `digital_seal`, `created_at`, `updated_at`) VALUES
(13, 20, '0', '7741228071425465', 'wewqe', 'wqewe', 'ShDE0s9TPV', 'texLtHxH1g', 'W5tvP2gbaE', 'Algeria', 'cwXk0x1x9v', 'Part Time', 'nYLaSRlUUj', NULL, '17486822222', 'TjrcLTYrya', 'yhr7n@bmtw.com', 'Andorran', 'VTKRJSSvSL', NULL, 'uploads/FdOneForm/16943424309621205146sampl.pdf', 'uploads/copy_of_chalan/16943425428648569144sample (1).pdf', 'uploads/due_vat_pdf/16943425421279211481sample (1).pdf', 'uploads/change_ac_number/16943425424789806936sample (1).pdf', '0', '34324', 'uploads/FdOneForm/16943424301444870929sample (1).pdf', NULL, NULL, NULL, NULL, '16:39:57', '3eocIB8a59', '22222222222', 'axb6s@cmrn.com', 'gZKOEaplik', 'g8kxEtg4dw', 'save_and_exit_from_three', NULL, 'uploads/verifiedFdOneForm/16943430587871464507fd_eight_form (3).pdf', 'my name is khan', 'there is no title', 'public/uploads/ngoHead/16943423973475984949user.jpg', 'public/uploads/ngoHead/16943423972860082335logo.jpg', '2023-09-10 04:39:57', '2023-09-10 04:50:58'),
(14, 21, '455', '7015751541437625', 'ronzLkO9Os', 'AyA29G0CfR', 'vNCxISgCUo', 'a6lkNIg8DC', 'WuoRNRU7Tn', 'Algeria', 'KPiICrfiSU', 'Part Time', '0cWgMtYP3H', 'tryrty,yryrty', '71080933333', 'AYe9vIBQrZ', 'w2n7s@ubos.com', 'Algerian', 'upE9IuidZM', 'uploads/FdOneForm/16943435096487888680sample (1).pdf', NULL, '0', '0', '0', '0', 'fgfdgdfgdf', NULL, '23343', 'uploads/attach_the_supporting_papers/16943435684979427812sample (1).pdf', '4545', 'uploads/board_of_revenue_on_fees/16943435686409852279sample (1).pdf', '16:58:01', NULL, NULL, NULL, NULL, NULL, 'save_and_exit_from_three', 'uploads/verifiedFdOneForm/16943440428108485953fd_one_form (6).pdf', '0', 'wqewqe', 'qwewq', 'public/uploads/ngoHead/16943434816862451900user.jpg', 'public/uploads/ngoHead/16943434815713009288mainu.jpg', '2023-09-10 04:58:01', '2023-09-10 05:07:22'),
(15, 22, '0', '6036811392100942', 'pDd9r46Ytm', 't6PVF7vyQF', 'BAX2YxIkOE', 'ktKi63VvmO', 'Mjeq3ywmci', 'বাংলাদেশ', 'MgapsSXlDq', 'খণ্ডকালীন', 'ICmoGyk3ou', NULL, '58271266666', 'Fk0DMhPZiF', 'nnvk7@zhlv.com', 'আলবেনিয়ান', 'cVJeG3j4WM', NULL, 'uploads/FdOneForm/16943442711712346302sample (1).pdf', 'uploads/copy_of_chalan/16943444619017787712fd_one_form (3).pdf', 'uploads/due_vat_pdf/16943444618117880967form_eight (2).pdf', 'uploads/change_ac_number/16943444615508934665sample (1).pdf', '0', 'jukjkj', 'uploads/FdOneForm/16943442712169685095fd_eight_form (3).pdf', NULL, NULL, NULL, NULL, '17:10:40', '7TXW0UgG3s', '66666666666', 'ik4wb@sk0v.com', '0ltMe0IrRf', 'GxYtAFVmSC', 'save_and_exit_from_three', NULL, 'uploads/verifiedFdOneForm/16943446829634076386fd_eight_form (4).pdf', 'asdfdsf', 'fsdfd', 'public/uploads/ngoHead/16943442403023377584mainu.jpg', 'public/uploads/ngoHead/16943442405818626437user.jpg', '2023-09-10 05:10:40', '2023-09-10 05:18:02'),
(16, 23, '1863', '1338841278904096', 'Padma Hut', 'Padma Hut', 'Padma Hut', 'Rajshahi', 'Dhaka', 'বাংলাদেশ', 'Kamruzzaman kajol', 'খণ্ডকালীন', 'Rajshahi', 'tryrty', '01646735100', '01646735100', 'kkajol428@gmail.com', 'অ্যান্ডোরান', 'rfB52u0Sro', 'uploads/FdOneForm/16943451725425849149fd_eight_form (2).pdf', NULL, '0', '0', '0', '0', 'fghdfhh', NULL, '23343', 'uploads/attach_the_supporting_papers/16943452316031036433sample (1).pdf', '4545', 'uploads/board_of_revenue_on_fees/16943452315773032562sample (1).pdf', '17:25:52', NULL, NULL, NULL, NULL, NULL, 'save_and_exit_from_three', 'uploads/verifiedFdOneForm/16943455005900453380fd_one_form (7).pdf', '0', 'asdfdsf', 'fsdfd', 'public/uploads/ngoHead/16943451523596384168user.jpg', 'public/uploads/ngoHead/16943451529454622709user.jpg', '2023-09-10 05:25:52', '2023-09-10 05:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_member_lists`
--

CREATE TABLE `fd_one_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_join` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `salary_statement` text DEFAULT NULL,
  `other_occupation` text DEFAULT NULL,
  `now_working_at` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_member_lists`
--

INSERT INTO `fd_one_member_lists` (`id`, `fd_one_form_id`, `name`, `position`, `address`, `date_of_join`, `mobile`, `email`, `citizenship`, `salary_statement`, `other_occupation`, `now_working_at`, `time_for_api`, `created_at`, `updated_at`) VALUES
(78, 13, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'Algerian', 'Rajshahi', 'Padma Hut', 'BVyEFBdNqo', '16:41:07', '2023-09-10 04:41:07', '2023-09-10 04:41:07'),
(79, 13, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'Albanian', 'Rajshahi', 'Padma Hut', 'fIPdZwUyU5', '16:41:07', '2023-09-10 04:41:07', '2023-09-10 04:41:07'),
(80, 14, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'Rajshahi', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'Algerian', 'Rajshahi', 'Padma Hut', 'Ct535y5B6G', '16:58:53', '2023-09-10 04:58:53', '2023-09-10 04:58:53'),
(81, 14, 'Kamruzzaman kajol', 'dffMrbPMI0', 'Rajshahi', '2023-09-11', '01646735100', 'kkajol428@gmail.com', 'Algerian', 'Rajshahi', 'Padma Hut', 'FlMstlU87w', '16:58:53', '2023-09-10 04:58:53', '2023-09-10 04:58:53'),
(82, 15, 'Kamruzzaman kajol', 'NqUyYp2zac', '1AnE1iTgla', '2023-09-17', '01646735100', 'kkajol428@gmail.com', 'আলজেরিয়ান', 'Rajshahi', 'dFt4pIFaqz', NULL, '17:11:44', '2023-09-10 05:11:44', '2023-09-10 05:11:44'),
(83, 15, 'Kamruzzaman kajol', 'TGPpn9QFtC', 'ZkZQWo62Ts', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'আলজেরিয়ান', 'Rajshahi', 'ukuyuiuiuiu', NULL, '17:11:44', '2023-09-10 05:11:44', '2023-09-10 05:11:44'),
(84, 16, 'Kamruzzaman kajol', 'TGPpn9QFtC', '1AnE1iTgla', '2023-09-18', '01646735100', 'kkajol428@gmail.com', 'আলজেরিয়ান', 'Rajshahi', 'Padma Hut', NULL, '17:26:42', '2023-09-10 05:26:42', '2023-09-10 05:26:42'),
(85, 16, 'Kamruzzaman kajol', 'TGPpn9QFtC', '1AnE1iTgla', '2023-09-19', '01646735100', 'kkajol428@gmail.com', 'আলজেরিয়ান', 'Rajshahi', '4njS7dKOAO', NULL, '17:26:42', '2023-09-10 05:26:43', '2023-09-10 05:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_other_pdf_lists`
--

CREATE TABLE `fd_one_other_pdf_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `information_title` varchar(255) DEFAULT NULL,
  `information_pdf` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fd_one_source_of_funds`
--

CREATE TABLE `fd_one_source_of_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `letter_file` text DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_source_of_funds`
--

INSERT INTO `fd_one_source_of_funds` (`id`, `fd_one_form_id`, `name`, `address`, `letter_file`, `time_for_api`, `created_at`, `updated_at`) VALUES
(9, 14, 'report_add', 'frr', 'uploads/FdOneSourceOfFund/16943435094350805351sample (1).pdf', '16:58:29', '2023-09-10 04:58:29', '2023-09-10 04:58:29'),
(10, 16, 'report_add', 'frr', 'uploads/FdOneSourceOfFund/16943451722908579614sample (1).pdf', '17:26:12', '2023-09-10 05:26:12', '2023-09-10 05:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `form_complete_statuses`
--

CREATE TABLE `form_complete_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_step_one_status` tinyint(4) NOT NULL,
  `fd_one_form_step_two_status` tinyint(4) NOT NULL,
  `fd_one_form_step_three_status` tinyint(4) NOT NULL,
  `fd_one_form_step_four_status` tinyint(4) NOT NULL,
  `form_eight_status` tinyint(4) NOT NULL,
  `ngo_member_status` tinyint(4) NOT NULL,
  `ngo_member_nid_photo_status` tinyint(4) NOT NULL,
  `ngo_other_document_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_complete_statuses`
--

INSERT INTO `form_complete_statuses` (`id`, `user_id`, `fd_one_form_step_one_status`, `fd_one_form_step_two_status`, `fd_one_form_step_three_status`, `fd_one_form_step_four_status`, `form_eight_status`, `ngo_member_status`, `ngo_member_nid_photo_status`, `ngo_other_document_status`, `created_at`, `updated_at`) VALUES
(13, 20, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-10 04:39:57', '2023-09-10 04:50:20'),
(14, 21, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-10 04:58:01', '2023-09-10 05:06:44'),
(15, 22, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-10 05:10:40', '2023-09-10 05:17:37'),
(16, 23, 1, 1, 1, 1, 1, 1, 1, 1, '2023-09-10 05:25:52', '2023-09-10 05:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `form_eights`
--

CREATE TABLE `form_eights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_slug` varchar(255) DEFAULT NULL,
  `desi` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nid_no` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `name_supouse` varchar(255) DEFAULT NULL,
  `edu_quali` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `job_des` varchar(255) DEFAULT NULL,
  `service_status` varchar(255) DEFAULT NULL,
  `form_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `total_year` varchar(255) DEFAULT NULL,
  `time_for_api` text DEFAULT NULL,
  `complete_status` varchar(255) DEFAULT NULL,
  `verified_form_eight` varchar(255) DEFAULT NULL,
  `job_picture` varchar(255) DEFAULT NULL,
  `job_sign` varchar(255) DEFAULT NULL,
  `name_one` varchar(255) DEFAULT '0',
  `name_two` varchar(255) DEFAULT '0',
  `designation_one` varchar(255) DEFAULT '0',
  `designation_two` varchar(255) DEFAULT '0',
  `signature_one` varchar(255) DEFAULT '0',
  `signature_two` varchar(255) DEFAULT '0',
  `seal_one` varchar(255) DEFAULT '0',
  `seal_two` varchar(255) DEFAULT '0',
  `employee_add_status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_eights`
--

INSERT INTO `form_eights` (`id`, `fd_one_form_id`, `name`, `name_slug`, `desi`, `dob`, `nid_no`, `phone`, `father_name`, `present_address`, `permanent_address`, `name_supouse`, `edu_quali`, `profession`, `job_des`, `service_status`, `form_date`, `to_date`, `total_year`, `time_for_api`, `complete_status`, `verified_form_eight`, `job_picture`, `job_sign`, `name_one`, `name_two`, `designation_one`, `designation_two`, `signature_one`, `signature_two`, `seal_one`, `seal_two`, `employee_add_status`, `created_at`, `updated_at`) VALUES
(17, 15, 'hWm15r1dws', 'hwm15r1dws', 'rE6thmRddH', '14-08-2023', '6nTmOGJ9q4', '85078344444', 'OU178K10Ld', 'dF4CjLvO2t', 'ZhyxfZcbV2', 'zqhiHLYemw', 'N6C88pLU9r', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'MGts2TdqfR', 'হ্যাঁ', '2023-09-10', '2023-09-22', '0 বছর 1 মাস', '17:15:00', 'complete', 'uploads/FdOneOtherPdfList/16943447045005053554form_eight (5).pdf', 'public/uploads/FormEight/16943445003959954714bKash.jpg', 'public/uploads/FormEight/16943445007455960147mainu.jpg', 'Kamruzzaman kajol', 'Kamruzzaman kajol', 'fjfgjhg', 'fjfgjhg', 'public/uploads/FormEight/16943445514451929621mainu.jpg', 'public/uploads/FormEight/16943445681007730946bKash.jpg', 'public/uploads/seal_one/16943445512037808383user.jpg', 'public/uploads/seal_one/16943445688551777892event_photo-2-1 (1).avif', 'yes', '2023-09-10 05:15:00', '2023-09-10 05:18:24'),
(18, 15, '400', '400', 'admin', '28-08-2023', '5645654', '12344444444', 'hgj', 'jdIV6SkQoq', 'U4Wx0zi5yl', 'rrrr', 'kRqjglKpAa', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'dCyL4LxngE', 'হ্যাঁ', '2023-09-10', '2023-09-22', '0 বছর 1 মাস', '17:15:35', 'complete', NULL, 'public/uploads/FormEight/16943445357712862098mainu.jpg', 'public/uploads/FormEight/16943445355759138934user.jpg', 'Kamruzzaman kajol', 'Kamruzzaman kajol', 'fjfgjhg', 'fjfgjhg', 'public/uploads/FormEight/16943445514451929621mainu.jpg', 'public/uploads/FormEight/16943445681007730946bKash.jpg', 'public/uploads/seal_one/16943445512037808383user.jpg', 'public/uploads/seal_one/16943445688551777892event_photo-2-1 (1).avif', 'yes', '2023-09-10 05:15:35', '2023-09-10 05:16:19'),
(19, 16, 'oxflkFdLDD', 'oxflkfdldd', 'snZHedc1Ds', '14-08-2023', 'hIB0ShBvhp', '70108755555', 'FUkKqmBtIj', '72jqH6TcNN', 'Rhn5gsyPwA', 'jTAG5xnwI7', 'XD4qE2S6dU', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'w7LJ9hwND9', 'হ্যাঁ', '2023-09-10', '2023-09-29', '0 বছর 1 মাস', '17:27:47', 'complete', 'uploads/FdOneOtherPdfList/16943457157378127772fd_one_form (6).pdf', 'public/uploads/FormEight/16943452671967591521168310470920230503user_image.jpg', 'public/uploads/FormEight/16943452675885963244user.jpg', '43243', '234234', '34234', '234234', 'public/uploads/FormEight/16943453725801162565bKash.jpg', 'public/uploads/FormEight/16943453853689259389user.jpg', 'public/uploads/seal_one/16943453724113407708user.jpg', 'public/uploads/seal_one/16943453851783627565event_photo-2-1.avif', 'yes', '2023-09-10 05:27:47', '2023-09-10 05:35:15'),
(20, 16, 'xcvxc', 'xcvxc', 'vxcv', '20-09-2023', 'ZMQbF7OZFE', '12444444444', '2', 'Zriu1nitzR', 'xcvxcv', 'cvxcvxc', 'cxvxcv', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', 'xcvxc', 'হ্যাঁ', '2023-09-10', '2023-09-29', '0 বছর 1 মাস', '17:29:12', 'complete', NULL, 'public/uploads/FormEight/16943453524750170432bKash.jpg', 'public/uploads/FormEight/16943453527351545456logo.jpg', '43243', '234234', '34234', '234234', 'public/uploads/FormEight/16943453725801162565bKash.jpg', 'public/uploads/FormEight/16943453853689259389user.jpg', 'public/uploads/seal_one/16943453724113407708user.jpg', 'public/uploads/seal_one/16943453851783627565event_photo-2-1.avif', 'yes', '2023-09-10 05:29:12', '2023-09-10 05:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `forwarding_letters`
--

CREATE TABLE `forwarding_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `apply_date` varchar(255) NOT NULL,
  `apply_month_name` varchar(255) NOT NULL,
  `apply_year_name` varchar(255) NOT NULL,
  `sarok_number` varchar(255) NOT NULL,
  `fd9_form_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forwarding_letters`
--

INSERT INTO `forwarding_letters` (`id`, `admin_id`, `apply_date`, `apply_month_name`, `apply_year_name`, `sarok_number`, `fd9_form_id`, `created_at`, `updated_at`) VALUES
(2, 1, '14', 'September', '2023', '09-78880-000', '1', '2023-09-14 03:24:29', '2023-09-14 03:24:29'),
(3, 1, '14', 'September', '2023', '09-78880-000', '1', '2023-09-14 03:25:40', '2023-09-14 03:25:40'),
(4, 1, '14', 'September', '2023', '09-78880-000', '1', '2023-09-14 03:25:53', '2023-09-14 03:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `forwarding_letter_onulipis`
--

CREATE TABLE `forwarding_letter_onulipis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forwarding_letter_id` bigint(20) UNSIGNED NOT NULL,
  `onulipi_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forwarding_letter_onulipis`
--

INSERT INTO `forwarding_letter_onulipis` (`id`, `forwarding_letter_id`, `onulipi_name`, `created_at`, `updated_at`) VALUES
(2, 2, 'report_add', '2023-09-14 03:24:29', '2023-09-14 03:24:29'),
(3, 2, 'blog_add', '2023-09-14 03:24:29', '2023-09-14 03:24:29'),
(4, 3, 'report_add', '2023-09-14 03:25:40', '2023-09-14 03:25:40'),
(5, 3, 'blog_add', '2023-09-14 03:25:40', '2023-09-14 03:25:40'),
(8, 4, 'report_add', '2023-09-14 03:27:42', '2023-09-14 03:27:42'),
(9, 4, 'blog_add', '2023-09-14 03:27:42', '2023-09-14 03:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_histories`
--

CREATE TABLE `job_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `designation_list_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_02_19_141335_create_users_verify_table', 1),
(6, '2023_04_29_050937_create_ngo_type_and_languages_table', 1),
(7, '2023_04_29_051221_create_fd_one_forms_table', 1),
(8, '2023_04_29_062111_create_form_eights_table', 1),
(9, '2023_04_29_064036_create_ngo_member_nid_photos_table', 1),
(10, '2023_04_29_064124_create_ngo_other_docs_table', 1),
(11, '2023_04_29_073920_create_ngo_renew_infos_table', 1),
(12, '2023_04_29_075709_create_ngo_statuses_table', 1),
(13, '2023_04_29_080557_create_countries_table', 1),
(14, '2023_05_02_055346_create_ngo_member_lists_table', 1),
(15, '2023_06_03_053430_create_ngo_durations_table', 1),
(16, '2023_06_04_064656_create_fd_one_adviser_lists_table', 1),
(17, '2023_06_04_064838_create_fd_one_bank_accounts_table', 1),
(18, '2023_06_04_065340_create_fd_one_member_lists_table', 1),
(19, '2023_06_04_065416_create_fd_one_other_pdf_lists_table', 1),
(20, '2023_06_04_065630_create_fd_one_source_of_funds_table', 1),
(21, '2023_06_04_070023_create_ngo_name_changes_table', 1),
(22, '2023_06_04_074058_create_ngo_renews_table', 1),
(23, '2023_06_17_070207_create_form_complete_statuses_table', 1),
(24, '2023_06_24_064127_create_n_visas_table', 1),
(25, '2023_07_04_050859_create_n_visa_particular_of_sponsor_or_employers_table', 1),
(26, '2023_07_04_051156_create_n_visa_particulars_of_foreign_incumbnets_table', 1),
(27, '2023_07_04_051404_create_n_visa_employment_information_table', 1),
(28, '2023_07_04_051509_create_n_visa_work_place_addresses_table', 1),
(29, '2023_07_04_051617_create_n_visa_compensation_and_benifits_table', 1),
(30, '2023_07_04_051708_create_n_visa_manpower_of_the_offices_table', 1),
(31, '2023_07_04_051821_create_n_visa_necessary_document_for_work_permits_table', 1),
(32, '2023_07_04_061019_create_n_visa_authorized_personal_of_the_orgs_table', 1),
(33, '2023_07_08_074843_create_fd9_forms_table', 1),
(34, '2023_07_08_075015_create_fd9_foreigner_employee_family_member_lists_table', 1),
(35, '2023_07_09_063215_create_fd9_one_forms_table', 1),
(36, '2023_08_07_084905_create_name_change_docs_table', 1),
(37, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(38, '2023_05_05_080336_create_permission_tables', 2),
(39, '2023_05_06_060503_create_system_information_table', 2),
(40, '2023_07_15_072135_create_branches_table', 2),
(41, '2023_07_15_072327_create_designation_lists_table', 2),
(42, '2023_07_15_073752_create_designation_steps_table', 2),
(43, '2023_07_15_074320_create_admins_table', 2),
(44, '2023_07_15_075924_create_forwarding_letters_table', 2),
(45, '2023_07_15_075949_create_forwarding_letter_onulipis_table', 2),
(46, '2023_07_26_111721_create_secruity_checks_table', 2),
(47, '2023_08_01_054043_create_job_histories_table', 2),
(48, '2023_08_12_062314_create_notices_table', 2),
(49, '2023_08_20_092827_create_fd9_forwarding_letter_edits_table', 2),
(50, '2023_08_22_112242_create_admin_designation_histories_table', 3),
(51, '2023_08_24_101740_create_ngo_registration_daks_table', 4),
(52, '2023_08_26_065846_create_dak_details_table', 5),
(53, '2023_08_26_095546_create_ngo_renew_daks_table', 6),
(54, '2023_08_26_095622_create_ngo_name_change_daks_table', 6),
(55, '2023_08_26_095725_create_ngo_f_d_nine_daks_table', 6),
(56, '2023_08_26_095822_create_ngo_f_d_nine_one_daks_table', 6),
(57, '2023_09_04_105726_create_renewal_files_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 3),
(2, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `name_change_docs`
--

CREATE TABLE `name_change_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngo_name_change_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file_list` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `name_change_docs`
--

INSERT INTO `name_change_docs` (`id`, `ngo_name_change_id`, `pdf_file_list`, `time_for_api`, `file_size`, `created_at`, `updated_at`) VALUES
(71, 10, 'uploads/NameChangeDoc/2023-12-0916945171536744223167.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(72, 10, 'uploads/NameChangeDoc/2023-12-0916945171534871685592.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(73, 10, 'uploads/NameChangeDoc/2023-12-0916945171534931100580.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(74, 10, 'uploads/NameChangeDoc/2023-12-0916945171536004354460.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(75, 10, 'uploads/NameChangeDoc/2023-12-0916945171538152764937.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(76, 10, 'uploads/NameChangeDoc/2023-12-0916945171536348746626.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(77, 10, 'uploads/NameChangeDoc/2023-12-0916945171532423917847.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(78, 10, 'uploads/NameChangeDoc/2023-12-0916945171538935835243.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(79, 10, 'uploads/NameChangeDoc/2023-12-0916945171535195962961.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33'),
(80, 10, 'uploads/NameChangeDoc/2023-12-0916945171532705178591.pdf', '17:12:33 pm', '0.00', '2023-09-12 05:12:33', '2023-09-12 05:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_durations`
--

CREATE TABLE `ngo_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `ngo_duration_start_date` varchar(255) DEFAULT NULL,
  `ngo_duration_end_date` varchar(255) DEFAULT NULL,
  `ngo_status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_durations`
--

INSERT INTO `ngo_durations` (`id`, `fd_one_form_id`, `ngo_duration_start_date`, `ngo_duration_end_date`, `ngo_status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(7, 14, '2023-09-11', '2033-09-11', 'Accepted', NULL, '2023-09-11 02:28:22', '2023-09-11 02:28:22'),
(8, 16, '2023-09-11', '2033-09-11', 'Accepted', NULL, '2023-09-11 03:44:04', '2023-09-11 03:44:04'),
(9, 13, '2023-09-13', '2033-09-13', 'Accepted', NULL, '2023-09-13 00:06:25', '2023-09-13 00:06:25'),
(10, 13, '2023-09-13', '2033-09-13', 'Accepted', NULL, '2023-09-13 00:09:01', '2023-09-13 00:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_f_d_nine_daks`
--

CREATE TABLE `ngo_f_d_nine_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `f_d_nine_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_f_d_nine_one_daks`
--

CREATE TABLE `ngo_f_d_nine_one_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `f_d_nine_one_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_member_lists`
--

CREATE TABLE `ngo_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_name_slug` varchar(255) DEFAULT NULL,
  `member_designation` varchar(255) DEFAULT NULL,
  `member_dob` varchar(255) DEFAULT NULL,
  `member_nid_no` varchar(255) DEFAULT NULL,
  `member_mobile` varchar(255) DEFAULT NULL,
  `member_father_name` varchar(255) DEFAULT NULL,
  `member_present_address` text DEFAULT NULL,
  `member_permanent_address` text DEFAULT NULL,
  `member_name_supouse` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `verified_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_member_nid_photos`
--

CREATE TABLE `ngo_member_nid_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_image` varchar(255) DEFAULT NULL,
  `member_nid_copy` varchar(255) DEFAULT NULL,
  `member_nid_copy_size` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_name_changes`
--

CREATE TABLE `ngo_name_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `previous_name_eng` varchar(255) DEFAULT NULL,
  `previous_name_ban` varchar(255) DEFAULT NULL,
  `present_name_eng` varchar(255) DEFAULT NULL,
  `present_name_ban` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_name_changes`
--

INSERT INTO `ngo_name_changes` (`id`, `fd_one_form_id`, `previous_name_eng`, `previous_name_ban`, `present_name_eng`, `present_name_ban`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(10, 13, 'lSoRbNPxaj', 'm9HbVFEkj3', 'wewqe', 'wqewe', 'Accepted', '17:11:13 pm', '2023-09-12 05:11:13', '2023-09-12 05:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_name_change_daks`
--

CREATE TABLE `ngo_name_change_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `name_change_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_name_change_daks`
--

INSERT INTO `ngo_name_change_daks` (`id`, `sender_admin_id`, `receiver_admin_id`, `name_change_status_id`, `original_recipient`, `copy_of_work`, `informational_purposes`, `attraction_attention`, `dak_detail_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '5', '1', '1', '', '', '', '7', '1', '2023-08-31 00:12:29', '2023-08-31 01:49:53'),
(2, '2', '3', '1', '', '1', '', '', '7', '1', '2023-08-31 00:12:29', '2023-08-31 01:49:53'),
(3, '2', '5', '4', '1', '', '', '', '14', '1', '2023-08-31 01:51:29', '2023-08-31 02:03:32'),
(4, '2', '3', '4', '', '1', '', '', '14', '1', '2023-08-31 01:51:29', '2023-08-31 02:03:32'),
(5, '2', '5', '5', NULL, NULL, NULL, NULL, NULL, '0', '2023-08-31 02:08:10', '2023-08-31 02:08:10'),
(6, '2', '3', '5', NULL, NULL, NULL, NULL, NULL, '0', '2023-08-31 02:08:10', '2023-08-31 02:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_other_docs`
--

CREATE TABLE `ngo_other_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file_list` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_other_docs`
--

INSERT INTO `ngo_other_docs` (`id`, `fd_one_form_id`, `pdf_file_list`, `time_for_api`, `file_size`, `created_at`, `updated_at`) VALUES
(47, 14, 'uploads/NgoOtherDoc/16943439915521816517sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(48, 14, 'uploads/NgoOtherDoc/16943439918170492403sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(49, 14, 'uploads/NgoOtherDoc/16943439916053376485sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(50, 14, 'uploads/NgoOtherDoc/16943439911133548967sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(51, 14, 'uploads/NgoOtherDoc/16943439915988212056sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(52, 14, 'uploads/NgoOtherDoc/16943439918223252418sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(53, 14, 'uploads/NgoOtherDoc/16943439912732536082sample (1).pdf', '17:06:31 pm', '0.00', '2023-09-10 05:06:31', '2023-09-10 05:06:31'),
(54, 16, 'uploads/NgoOtherDoc/16943454703467212271sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:10', '2023-09-10 05:31:10'),
(55, 16, 'uploads/NgoOtherDoc/16943454703611891048sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:10', '2023-09-10 05:31:10'),
(56, 16, 'uploads/NgoOtherDoc/16943454707220658504sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:10', '2023-09-10 05:31:10'),
(57, 16, 'uploads/NgoOtherDoc/16943454703353839170sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:10', '2023-09-10 05:31:10'),
(58, 16, 'uploads/NgoOtherDoc/16943454719347573573sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:11', '2023-09-10 05:31:11'),
(59, 16, 'uploads/NgoOtherDoc/16943454713386767783sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:11', '2023-09-10 05:31:11'),
(60, 16, 'uploads/NgoOtherDoc/16943454718229610199sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:11', '2023-09-10 05:31:11'),
(61, 16, 'uploads/NgoOtherDoc/16943454718052686949sample (1).pdf', '17:31:10 pm', '0.00', '2023-09-10 05:31:11', '2023-09-10 05:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_registration_daks`
--

CREATE TABLE `ngo_registration_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `registration_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(110) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_registration_daks`
--

INSERT INTO `ngo_registration_daks` (`id`, `sender_admin_id`, `receiver_admin_id`, `registration_status_id`, `original_recipient`, `copy_of_work`, `informational_purposes`, `attraction_attention`, `status`, `dak_detail_id`, `created_at`, `updated_at`) VALUES
(14, '2', '5', '1', '1', '', '', '', '1', '2', '2023-08-26 02:44:06', '2023-08-26 03:44:52'),
(15, '2', '3', '1', '', '1', '', '', '1', '2', '2023-08-26 02:44:06', '2023-08-26 03:44:52'),
(16, '1', '2', '2', '', '', '', '', '1', '6', '2023-08-29 01:27:11', '2023-08-29 01:28:21'),
(17, '1', '5', '2', '', '', '', '', '1', '6', '2023-08-29 01:27:11', '2023-08-29 01:28:21'),
(18, '1', '3', '2', '', '', '', '', '1', '6', '2023-08-29 01:27:11', '2023-08-29 01:28:21'),
(19, '1', '2', '2', NULL, NULL, NULL, NULL, '0', NULL, '2023-08-29 01:28:41', '2023-08-29 01:28:41'),
(20, '1', '5', '2', NULL, NULL, NULL, NULL, '0', NULL, '2023-08-29 01:28:41', '2023-08-29 01:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renews`
--

CREATE TABLE `ngo_renews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renews`
--

INSERT INTO `ngo_renews` (`id`, `fd_one_form_id`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(5, 13, 'Accepted', '11:43:53 am', '2023-09-12 23:43:53', '2023-09-12 23:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renew_daks`
--

CREATE TABLE `ngo_renew_daks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_admin_id` varchar(255) DEFAULT NULL,
  `receiver_admin_id` varchar(255) DEFAULT NULL,
  `renew_status_id` varchar(255) DEFAULT NULL,
  `original_recipient` varchar(255) DEFAULT NULL,
  `copy_of_work` varchar(255) DEFAULT NULL,
  `informational_purposes` varchar(255) DEFAULT NULL,
  `attraction_attention` varchar(255) DEFAULT NULL,
  `dak_detail_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renew_daks`
--

INSERT INTO `ngo_renew_daks` (`id`, `sender_admin_id`, `receiver_admin_id`, `renew_status_id`, `original_recipient`, `copy_of_work`, `informational_purposes`, `attraction_attention`, `dak_detail_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '2', '5', '1', '1', '', '', '', '5', '1', '2023-08-27 00:31:27', '2023-08-27 00:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renew_infos`
--

CREATE TABLE `ngo_renew_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_address` varchar(255) DEFAULT NULL,
  `address_of_head_office` varchar(255) DEFAULT NULL,
  `country_of_origin` varchar(255) DEFAULT NULL,
  `name_of_head_in_bd` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `verified_form` varchar(255) DEFAULT NULL,
  `chief_name` varchar(255) DEFAULT NULL,
  `chief_desi` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_new` varchar(255) DEFAULT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_new` varchar(255) DEFAULT NULL,
  `telephone_number` varchar(255) DEFAULT NULL,
  `telephone_number_new` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `plan_of_operation` text DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `fee_paid_status` varchar(255) DEFAULT NULL,
  `supporting_paper` text DEFAULT NULL,
  `foregin_pdf` varchar(255) DEFAULT NULL,
  `yearly_budget` varchar(255) DEFAULT NULL,
  `copy_of_chalan` varchar(255) DEFAULT NULL,
  `due_vat_pdf` varchar(255) DEFAULT NULL,
  `change_ac_number` varchar(255) DEFAULT NULL,
  `main_account_number` varchar(255) DEFAULT NULL,
  `main_account_type` varchar(255) DEFAULT NULL,
  `main_account_name_of_branch` varchar(255) DEFAULT NULL,
  `name_of_bank` varchar(255) DEFAULT NULL,
  `bank_address_main` varchar(255) DEFAULT NULL,
  `web_site_name` varchar(255) DEFAULT NULL,
  `mobile_new` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `digital_signature` varchar(255) DEFAULT NULL,
  `digital_seal` varchar(255) DEFAULT NULL,
  `yearly_budget_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renew_infos`
--

INSERT INTO `ngo_renew_infos` (`id`, `user_id`, `registration_number`, `organization_name`, `organization_address`, `address_of_head_office`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `nationality`, `verified_form`, `chief_name`, `chief_desi`, `address`, `phone`, `phone_new`, `fd_one_form_id`, `email`, `email_new`, `telephone_number`, `telephone_number_new`, `citizenship`, `profession`, `plan_of_operation`, `district`, `sub_district`, `fee_paid_status`, `supporting_paper`, `foregin_pdf`, `yearly_budget`, `copy_of_chalan`, `due_vat_pdf`, `change_ac_number`, `main_account_number`, `main_account_type`, `main_account_name_of_branch`, `name_of_bank`, `bank_address_main`, `web_site_name`, `mobile_new`, `mobile`, `time_for_api`, `digital_signature`, `digital_seal`, `yearly_budget_file`, `created_at`, `updated_at`) VALUES
(6, 20, NULL, 'wewqe', 'ShDE0s9TPV', 'texLtHxH1g', NULL, 'cwXk0x1x9v', 'Part Time', 'g8kxEtg4dw', NULL, NULL, NULL, 'nYLaSRlUUj', '17486822222', '3eocIB8a59', 13, 'yhr7n@bmtw.com', 'axb6s@cmrn.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/NgoRenewInfo/2023-13-0916945837058070054534.pdf', '34324', 'uploads/NgoRenewInfo/2023-13-0916945838338298550023.pdf', 'uploads/NgoRenewInfo/2023-13-0916945838337848807225.pdf', 'uploads/NgoRenewInfo/2023-13-0916945838338627138795.pdf', '4545345345', 'personal', '4534', '45345', '345345', 'gZKOEaplik', '22222222222', 'TjrcLTYrya', NULL, NULL, NULL, 'uploads/NgoRenewInfo/2023-13-0916945837054801580698.pdf', '2023-09-12 23:41:45', '2023-09-12 23:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_statuses`
--

CREATE TABLE `ngo_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reg_type` varchar(255) DEFAULT NULL,
  `reg_id` varchar(255) DEFAULT NULL,
  `print_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_statuses`
--

INSERT INTO `ngo_statuses` (`id`, `fd_one_form_id`, `email`, `reg_type`, `reg_id`, `print_date`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(11, 13, 'kkajol428@gmail.com', NULL, NULL, NULL, 'Accepted', NULL, '2023-09-10 04:54:43', '2023-09-10 04:54:43'),
(12, 14, 'kajol1122018@gmail.com', 'NGO Registration', '7015751541437625', NULL, 'Accepted', NULL, '2023-09-10 05:07:32', '2023-09-10 05:07:32'),
(13, 15, 'kamruzzamankajol.cse@gmail.com', NULL, NULL, NULL, 'Accepted', NULL, '2023-09-10 05:18:34', '2023-09-10 05:18:34'),
(14, 16, 'kajolkamruzzaman.cse@gmail.com', 'NGO Registration', '1338841278904096', NULL, 'Accepted', NULL, '2023-09-10 05:35:28', '2023-09-10 05:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_type_and_languages`
--

CREATE TABLE `ngo_type_and_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ngo_type` varchar(255) NOT NULL,
  `ngo_type_new_old` varchar(255) NOT NULL,
  `registration` varchar(255) DEFAULT '0',
  `last_renew_date` varchar(255) DEFAULT '0',
  `ngo_language` varchar(255) NOT NULL,
  `first_one_form_check_status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_type_and_languages`
--

INSERT INTO `ngo_type_and_languages` (`id`, `user_id`, `ngo_type`, `ngo_type_new_old`, `registration`, `last_renew_date`, `ngo_language`, `first_one_form_check_status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(21, 20, 'Foreign', 'Old', '1234', '30-09-2023', 'sp', '1', '16:38:25', '2023-09-10 04:38:25', '2023-09-10 04:38:25'),
(22, 21, 'Foreign', 'New', '0', '0', 'sp', '1', '16:56:47', '2023-09-10 04:56:47', '2023-09-10 04:56:47'),
(23, 22, 'দেশিও', 'Old', '4534', '19-09-2023', 'en', '1', '17:09:49', '2023-09-10 05:09:49', '2023-09-10 05:09:49'),
(24, 23, 'দেশিও', 'New', '0', '0', 'en', '1', '17:25:19', '2023-09-10 05:25:19', '2023-09-10 05:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_visas`
--

CREATE TABLE `n_visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `fd9_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `period_validity` varchar(255) DEFAULT NULL,
  `permit_efct_date` varchar(255) DEFAULT NULL,
  `visa_ref_no` varchar(255) DEFAULT NULL,
  `visa_recomendation_letter_received_way` varchar(255) DEFAULT NULL,
  `visa_recomendation_letter_ref_no` varchar(255) DEFAULT NULL,
  `department_in` varchar(255) DEFAULT NULL,
  `visa_category` varchar(255) DEFAULT NULL,
  `applicant_photo` varchar(255) DEFAULT NULL,
  `forwarding_letter` varchar(255) DEFAULT NULL,
  `salary_remarks` varchar(255) DEFAULT NULL,
  `other_benefit` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visas`
--

INSERT INTO `n_visas` (`id`, `fd_one_form_id`, `fd9_one_form_id`, `period_validity`, `permit_efct_date`, `visa_ref_no`, `visa_recomendation_letter_received_way`, `visa_recomendation_letter_ref_no`, `department_in`, `visa_category`, `applicant_photo`, `forwarding_letter`, `salary_remarks`, `other_benefit`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 'weT2Pgohhd', '15-09-2023', 'rbU55hB6XB', 'Online', 'N92nulCGGX', 'NGO', 'N-Visa', 'public/uploads/applicant_photo/2023-14-0916946722487927631160.jpg', 'uploads/forwardingLetter/2023-14-0916946837563920417209.pdf', '4An3SRsBjj', 'vDAbWl50S9', NULL, '2023-09-14 00:17:28', '2023-09-14 00:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_authorized_personal_of_the_orgs`
--

CREATE TABLE `n_visa_authorized_personal_of_the_orgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `auth_person_org_name` varchar(255) DEFAULT NULL,
  `auth_person_org_house_no` varchar(255) DEFAULT NULL,
  `auth_person_org_flat_no` varchar(255) DEFAULT NULL,
  `auth_person_org_road_no` varchar(255) DEFAULT NULL,
  `auth_person_org_post_office` varchar(255) DEFAULT NULL,
  `auth_person_org_mobile` varchar(255) DEFAULT NULL,
  `auth_person_org_district` varchar(255) DEFAULT NULL,
  `auth_person_org_thana` varchar(255) DEFAULT NULL,
  `submission_date` varchar(255) DEFAULT NULL,
  `expatriate_name` varchar(255) DEFAULT NULL,
  `expatriate_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_authorized_personal_of_the_orgs`
--

INSERT INTO `n_visa_authorized_personal_of_the_orgs` (`id`, `n_visa_id`, `auth_person_org_name`, `auth_person_org_house_no`, `auth_person_org_flat_no`, `auth_person_org_road_no`, `auth_person_org_post_office`, `auth_person_org_mobile`, `auth_person_org_district`, `auth_person_org_thana`, `submission_date`, `expatriate_name`, `expatriate_email`, `created_at`, `updated_at`) VALUES
(1, 1, '3TUKNFe8No', 'NqgYA3888X', 'iViSzIIzpI', 'gNm323wFv4', 'Ydxo7knRzG', '89893822222', '9J37ROM2uF', 'DyfxLkyFmQ', '30-09-2023', 'OW975QWD78', 'yiq1q@jnov.com', '2023-09-14 00:17:29', '2023-09-14 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_compensation_and_benifits`
--

CREATE TABLE `n_visa_compensation_and_benifits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `salary_category` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_compensation_and_benifits`
--

INSERT INTO `n_visa_compensation_and_benifits` (`id`, `n_visa_id`, `salary_category`, `payment_type`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 'Annual Bonus', 'Yearly', 'jt1MaWZq7o', 'crjjJcPy8z', '2023-09-14 00:17:29', '2023-09-14 00:43:40'),
(2, 1, 'Medical Allowance', 'Yearly', 'Pno2GlXWog', 'Ko440M4zw8', '2023-09-14 00:17:29', '2023-09-14 00:17:29'),
(3, 1, 'Entertainment Allowance', 'Monthly', 'oYZrC9MuvC', 'YexqHxST6F', '2023-09-14 00:17:29', '2023-09-14 00:17:29'),
(4, 1, 'Conveyance', NULL, 'bRBY5tJOWu', 'R7wRawTMFY', '2023-09-14 00:17:29', '2023-09-14 00:17:29'),
(5, 1, 'House Rent', 'Monthly', 'NUR10JkqHF', 'XRfeWwa9mG', '2023-09-14 00:17:29', '2023-09-14 00:17:29'),
(6, 1, 'Overseas Allowance', 'Monthly', 'N03QzFM8JB', '7VOm5c5DKB', '2023-09-14 00:17:30', '2023-09-14 00:17:30'),
(7, 1, 'Basic Salary', 'Yearly', 'U8H7L7T5RQ', 'HAWwo6Agpb', '2023-09-14 00:17:30', '2023-09-14 00:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_employment_information`
--

CREATE TABLE `n_visa_employment_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `employed_designation` varchar(255) DEFAULT NULL,
  `date_of_arrival_in_bangladesh` varchar(255) DEFAULT NULL,
  `visa_type` varchar(255) DEFAULT NULL,
  `first_appoinment_date` varchar(255) DEFAULT NULL,
  `desired_effective_date` varchar(255) DEFAULT NULL,
  `travel_visa_cate` varchar(255) DEFAULT NULL,
  `visa_validity` varchar(255) DEFAULT NULL,
  `brief_job_description` varchar(255) DEFAULT NULL,
  `employee_justification` varchar(255) DEFAULT NULL,
  `desired_end_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_employment_information`
--

INSERT INTO `n_visa_employment_information` (`id`, `n_visa_id`, `employed_designation`, `date_of_arrival_in_bangladesh`, `visa_type`, `first_appoinment_date`, `desired_effective_date`, `travel_visa_cate`, `visa_validity`, `brief_job_description`, `employee_justification`, `desired_end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ct0eufKhrq', 'kwm7Bj9cBT', 'N-Visa', '29-09-2023', '22-09-2023', '2', 'fTx3wIlzP3', '5cXujeBVnF', 'E5kwWmyjKc', '13-09-2023', '2023-09-14 00:17:29', '2023-09-14 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_manpower_of_the_offices`
--

CREATE TABLE `n_visa_manpower_of_the_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `local_executive` varchar(255) DEFAULT NULL,
  `local_supporting_staff` varchar(255) DEFAULT NULL,
  `local_total` varchar(255) DEFAULT NULL,
  `foreign_executive` varchar(255) DEFAULT NULL,
  `foreign_supporting_staff` varchar(255) DEFAULT NULL,
  `foreign_total` varchar(255) DEFAULT NULL,
  `gand_total` varchar(255) DEFAULT NULL,
  `local_ratio` varchar(255) DEFAULT NULL,
  `foreign_ratio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_manpower_of_the_offices`
--

INSERT INTO `n_visa_manpower_of_the_offices` (`id`, `n_visa_id`, `local_executive`, `local_supporting_staff`, `local_total`, `foreign_executive`, `foreign_supporting_staff`, `foreign_total`, `gand_total`, `local_ratio`, `foreign_ratio`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fy68bdfjh8', '8bVZEmm1yj', 'avWbOx5chb', 'inxmcbfwR2', 'pu88jljvOL', 'EnqmTFOV3G', 'PWR4ArHZvx', 'Mc4iyrzCgA', 'NFg7oqzJqP', '2023-09-14 00:17:29', '2023-09-14 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_necessary_document_for_work_permits`
--

CREATE TABLE `n_visa_necessary_document_for_work_permits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `nomination_letter_of_buyer` varchar(255) DEFAULT NULL,
  `registration_letter_of_board_of_investment` varchar(255) DEFAULT NULL,
  `employee_contract_copy` varchar(255) DEFAULT NULL,
  `board_of_the_directors_sign_letter` varchar(255) DEFAULT NULL,
  `share_holder_copy` varchar(255) DEFAULT NULL,
  `passport_photocopy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_particulars_of_foreign_incumbnets`
--

CREATE TABLE `n_visa_particulars_of_foreign_incumbnets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_the_foreign_national` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `passport_issue_date` varchar(255) DEFAULT NULL,
  `passport_issue_place` varchar(255) DEFAULT NULL,
  `passport_expiry_date` varchar(255) DEFAULT NULL,
  `home_country` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `flat_no` varchar(255) DEFAULT NULL,
  `road_no` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `fax_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `martial_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_particulars_of_foreign_incumbnets`
--

INSERT INTO `n_visa_particulars_of_foreign_incumbnets` (`id`, `n_visa_id`, `name_of_the_foreign_national`, `nationality`, `passport_no`, `passport_issue_date`, `passport_issue_place`, `passport_expiry_date`, `home_country`, `house_no`, `flat_no`, `road_no`, `post_code`, `state`, `phone`, `city`, `fax_no`, `email`, `date_of_birth`, `martial_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'l8R61fDh6q', 'Algerian', 'Wk9dxwRMVP', '15-09-2023', 'cJTFHcRxtY', '27-09-2023', 'Algeria', 'dWZcwikrts', 'GBqFvXRdvl', 'Oapsppz5Qc', 'zHBYjrNIiE', 'Z8TdUfBwzb', '780204', '3iZdIxx7Za', 'VRnPyzubXN', 'u9yjy@meku.com', '30-09-2023', 'Married', '2023-09-14 00:17:29', '2023-09-14 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_particular_of_sponsor_or_employers`
--

CREATE TABLE `n_visa_particular_of_sponsor_or_employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `org_house_no` varchar(255) DEFAULT NULL,
  `org_flat_no` varchar(255) DEFAULT NULL,
  `org_road_no` varchar(255) DEFAULT NULL,
  `org_post_code` varchar(255) DEFAULT NULL,
  `org_post_office` varchar(255) DEFAULT NULL,
  `org_phone` varchar(255) DEFAULT NULL,
  `org_district` varchar(255) DEFAULT NULL,
  `org_thana` varchar(255) DEFAULT NULL,
  `org_fax_no` varchar(255) DEFAULT NULL,
  `org_email` varchar(255) DEFAULT NULL,
  `org_type` varchar(255) DEFAULT NULL,
  `nature_of_business` varchar(255) DEFAULT NULL,
  `authorized_capital` varchar(255) DEFAULT NULL,
  `paid_up_capital` varchar(255) DEFAULT NULL,
  `remittance_received` varchar(255) DEFAULT NULL,
  `industry_type` varchar(255) DEFAULT NULL,
  `recommendation_of_company_board` varchar(255) DEFAULT NULL,
  `company_share` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_particular_of_sponsor_or_employers`
--

INSERT INTO `n_visa_particular_of_sponsor_or_employers` (`id`, `n_visa_id`, `org_name`, `org_house_no`, `org_flat_no`, `org_road_no`, `org_post_code`, `org_post_office`, `org_phone`, `org_district`, `org_thana`, `org_fax_no`, `org_email`, `org_type`, `nature_of_business`, `authorized_capital`, `paid_up_capital`, `remittance_received`, `industry_type`, `recommendation_of_company_board`, `company_share`, `created_at`, `updated_at`) VALUES
(1, 1, '8P6bhRKUob', 'rTXET4jEUt', 'pSPXE2LjbH', 'DOE6AT2NfE', 'gxnMHrmlAO', 'yeshEnzaaN', '0626647801', 'DG4fN7w1NF', 'bs38VftQLz', 'w7utI9pSr3', 'b920y@hd9n.com', 'NGO', 'uIFcuUUJqS', '9WY1J8QKuR', 'TEJmV3VkCB', 'QrgcvVuxuL', 'NGO', 'DhDkqREr5n', 'fYGVRS9F11', '2023-09-14 00:17:29', '2023-09-14 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `n_visa_work_place_addresses`
--

CREATE TABLE `n_visa_work_place_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` bigint(20) UNSIGNED NOT NULL,
  `work_house_no` varchar(255) DEFAULT NULL,
  `work_flat_no` varchar(255) DEFAULT NULL,
  `work_road_no` varchar(255) DEFAULT NULL,
  `work_org_type` varchar(255) DEFAULT NULL,
  `contact_person_mobile_number` varchar(255) DEFAULT NULL,
  `work_district` varchar(255) DEFAULT NULL,
  `work_thana` varchar(255) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_visa_work_place_addresses`
--

INSERT INTO `n_visa_work_place_addresses` (`id`, `n_visa_id`, `work_house_no`, `work_flat_no`, `work_road_no`, `work_org_type`, `contact_person_mobile_number`, `work_district`, `work_thana`, `work_email`, `created_at`, `updated_at`) VALUES
(1, 1, 'sQuNbkOlDL', 'HxNfF0SGvm', 'VsKSRC8IFb', 'NGO', '09291822222', 'vJbixlDOVa', 'fFRniZO9XT', 'Dvq9TQJ29Y', '2023-09-14 00:17:29', '2023-09-14 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'dashboard', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(2, 'dashboard.edit', 'dashboard', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(3, 'employeeEndDate.view', 'employeeEndDate', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(4, 'employeeEndDate.edit', 'employeeEndDate', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(5, 'assignedEmployee.view', 'assignedEmployee', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(6, 'assignedEmployee.edit', 'assignedEmployee', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(7, 'systemInformationAdd', 'systemInformation', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(8, 'systemInformationView', 'systemInformation', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(9, 'systemInformationDelete', 'systemInformation', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(10, 'systemInformationUpdate', 'systemInformation', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(11, 'countryAdd', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(12, 'countryView', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(13, 'countryDelete', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(14, 'countryUpdate', 'country', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(15, 'noticeAdd', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(16, 'noticeView', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(17, 'noticeDelete', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(18, 'noticeUpdate', 'notice', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(19, 'postAdd', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(20, 'postView', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(21, 'postDelete', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(22, 'postUpdate', 'post', 'admin', '2023-08-22 02:02:50', '2023-08-22 02:02:50'),
(23, 'fd9FormAdd', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(24, 'fd9FormView', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(25, 'fd9FormDelete', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(26, 'fd9FormUpdate', 'fd9Form', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(27, 'branchAdd', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(28, 'branchView', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(29, 'branchDelete', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(30, 'branchUpdate', 'branch', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(31, 'designationAdd', 'designation', 'admin', '2023-08-22 02:02:51', '2023-08-22 02:02:51'),
(32, 'designationView', 'designation', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(33, 'designationDelete', 'designation', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(34, 'designationUpdate', 'designation', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(35, 'designationStepAdd', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(36, 'designationStepView', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(37, 'designationStepDelete', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(38, 'designationStepUpdate', 'designationStep', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(39, 'fd9OneFormAdd', 'fd9OneForm', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(40, 'fd9OneFormView', 'fd9OneForm', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(41, 'fd9OneFormDelete', 'fd9OneForm', 'admin', '2023-08-22 02:02:52', '2023-08-22 02:02:52'),
(42, 'fd9OneFormUpdate', 'fd9OneForm', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(43, 'name_change_add', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(44, 'name_change_view', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(45, 'name_change_delete', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(46, 'name_change_update', 'nameChange', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(47, 'register_list_add', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(48, 'register_list_view', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(49, 'register_list_delete', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(50, 'register_list_update', 'registrationList', 'admin', '2023-08-22 02:02:53', '2023-08-22 02:02:53'),
(51, 'renew_add', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(52, 'renew_view', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(53, 'renew_delete', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(54, 'renew_update', 'renew', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(55, 'userAdd', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(56, 'userView', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(57, 'userDelete', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(58, 'userUpdate', 'user', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(59, 'roleAdd', 'role', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(60, 'roleView', 'role', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(61, 'roleDelete', 'role', 'admin', '2023-08-22 02:02:54', '2023-08-22 02:02:54'),
(62, 'roleUpdate', 'role', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(63, 'permissionAdd', 'permission', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(64, 'permissionView', 'permission', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(65, 'permissionDelete', 'permission', 'admin', '2023-08-22 02:02:55', '2023-08-22 02:02:55'),
(66, 'permissionUpdate', 'permission', 'admin', '2023-08-22 02:02:56', '2023-08-22 02:02:56'),
(67, 'profile.view', 'profile', 'admin', '2023-08-22 02:02:56', '2023-08-22 02:02:56'),
(68, 'profile.edit', 'profile', 'admin', '2023-08-22 02:02:56', '2023-08-22 02:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renewal_files`
--

CREATE TABLE `renewal_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `constitution_of_the_organization_has_changed` varchar(255) DEFAULT NULL,
  `list_of_board_of_directors_or_board_of_trustees` varchar(255) DEFAULT NULL,
  `organization_by_laws_or_constitution` varchar(255) DEFAULT NULL,
  `work_procedure_of_organization` varchar(255) DEFAULT NULL,
  `last_ten_years_audit_report_and_annual_report_of_the_company` varchar(255) DEFAULT NULL,
  `registration_certificate` varchar(255) DEFAULT NULL,
  `attested_copy_of_latest_registration_or_renewal_certificate` varchar(255) DEFAULT NULL,
  `right_to_information_act` varchar(255) DEFAULT NULL,
  `the_constitution_of_the_company_along_with_fee_if_changed` varchar(255) DEFAULT NULL,
  `constitution_approved_by_primary_registering_authority` varchar(255) DEFAULT NULL,
  `clean_copy_of_the_constitution` varchar(255) DEFAULT NULL,
  `payment_of_change_fee` varchar(255) DEFAULT NULL,
  `section_sub_section_of_the_constitution` varchar(255) DEFAULT NULL,
  `previous_constitution_and_current_constitution_compare` varchar(255) DEFAULT NULL,
  `constitution_of_the_organization_if_unchanged` varchar(255) DEFAULT NULL,
  `nid_and_image_of_executive_committee_members` varchar(255) DEFAULT NULL,
  `approval_of_executive_committee` varchar(255) DEFAULT NULL,
  `committee_members_list` varchar(255) DEFAULT NULL,
  `registration_renewal_fee` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renewal_files`
--

INSERT INTO `renewal_files` (`id`, `fd_one_form_id`, `constitution_of_the_organization_has_changed`, `list_of_board_of_directors_or_board_of_trustees`, `organization_by_laws_or_constitution`, `work_procedure_of_organization`, `last_ten_years_audit_report_and_annual_report_of_the_company`, `registration_certificate`, `attested_copy_of_latest_registration_or_renewal_certificate`, `right_to_information_act`, `the_constitution_of_the_company_along_with_fee_if_changed`, `constitution_approved_by_primary_registering_authority`, `clean_copy_of_the_constitution`, `payment_of_change_fee`, `section_sub_section_of_the_constitution`, `previous_constitution_and_current_constitution_compare`, `constitution_of_the_organization_if_unchanged`, `nid_and_image_of_executive_committee_members`, `approval_of_executive_committee`, `committee_members_list`, `registration_renewal_fee`, `time_for_api`, `created_at`, `updated_at`) VALUES
(3, 13, 'No', 'uploads/RenewalFile/16943426475577468231sample (1).pdf', 'uploads/RenewalFile/16943426478612827436sample (1).pdf', 'uploads/RenewalFile/16943426479561793346sample (1).pdf', 'uploads/RenewalFile/16943426472996798984sample (1).pdf', 'uploads/RenewalFile/16943426479519736899sample (1).pdf', 'uploads/RenewalFile/16943426477580440273sample (1).pdf', 'uploads/RenewalFile/16943426479697005060sample (1).pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/16943426475588799587sample (1).pdf', NULL, NULL, NULL, NULL, NULL, '2023-09-10 04:44:07', '2023-09-10 04:44:07'),
(4, 15, 'No', NULL, 'uploads/RenewalFile/16943446512139858620sample (1).pdf', 'uploads/RenewalFile/16943446511646731235sample (1).pdf', 'uploads/RenewalFile/16943446517590901724sample (1).pdf', NULL, 'uploads/RenewalFile/16943446517615566321sample (1).pdf', 'uploads/RenewalFile/16943446516636374672sample (1).pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/16943446515777234851sample (1).pdf', 'uploads/RenewalFile/16943446517011593087fd_eight_form (3).pdf', 'uploads/RenewalFile/16943446516663392075sample (1).pdf', 'uploads/RenewalFile/16943446513386565837sample (1).pdf', 'uploads/RenewalFile/16943446513771874670sample (1).pdf', NULL, '2023-09-10 05:17:31', '2023-09-10 05:17:31'),
(5, 13, 'No', 'uploads/RenewalFile/16945035498603312172ff.pdf', 'uploads/RenewalFile/16945035493851171436ff.pdf', 'uploads/RenewalFile/16945035494358547420ff.pdf', 'uploads/RenewalFile/16945035494388140014ff.pdf', 'uploads/RenewalFile/16945035491685846277ff.pdf', 'uploads/RenewalFile/16945035497231720388ff.pdf', 'uploads/RenewalFile/16945035497709579684ff.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/16945035499765871919ff.pdf', NULL, NULL, NULL, NULL, NULL, '2023-09-12 01:25:49', '2023-09-12 01:25:49'),
(6, 15, NULL, NULL, 'uploads/RenewalFile/16945099924489960105ff.pdf', 'uploads/RenewalFile/16945099928699970996ff.pdf', 'uploads/RenewalFile/16945099929522997114ff.pdf', NULL, 'uploads/RenewalFile/16945099928106386862ff.pdf', 'uploads/RenewalFile/16945099921165048672ff.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/16945099921358893069ff.pdf', 'uploads/RenewalFile/16945099922023523484ff.pdf', 'uploads/RenewalFile/16945099927684181334ff.pdf', 'uploads/RenewalFile/16945099925763665335ff.pdf', 'uploads/RenewalFile/16945099924787328585ff.pdf', NULL, '2023-09-12 03:13:12', '2023-09-12 03:13:12'),
(7, 13, 'No', 'uploads/RenewalFile/2023-13-0916945838333016758574.pdf', 'uploads/RenewalFile/2023-13-0916945838335767433613.pdf', 'uploads/RenewalFile/2023-13-0916945838336941193062.pdf', 'uploads/RenewalFile/2023-13-0916945838339117777629.pdf', 'uploads/RenewalFile/2023-13-0916945838335041432041.pdf', 'uploads/RenewalFile/2023-13-0916945838333228738831.pdf', 'uploads/RenewalFile/2023-13-0916945838334293520525.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/RenewalFile/2023-13-0916945838338228912040.pdf', NULL, NULL, NULL, NULL, NULL, '2023-09-12 23:43:53', '2023-09-12 23:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-08-22 02:02:48', '2023-08-22 02:02:48'),
(2, 'admin', 'admin', '2023-08-22 02:02:48', '2023-08-22 02:02:48'),
(3, 'editor', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49'),
(4, 'user', 'admin', '2023-08-22 02:02:49', '2023-08-22 02:02:49');

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
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
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
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
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
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2);

-- --------------------------------------------------------

--
-- Table structure for table `secruity_checks`
--

CREATE TABLE `secruity_checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `n_visa_id` varchar(255) NOT NULL,
  `request_id` varchar(255) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `statusName` varchar(255) DEFAULT NULL,
  `statusId` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `secruity_checks`
--

INSERT INTO `secruity_checks` (`id`, `n_visa_id`, `request_id`, `tracking_no`, `statusName`, `statusId`, `created_at`, `updated_at`) VALUES
(2, '1', 'BjrHYrfIvT', 'WPN-14September2023-1694685490Xy5Z7p', 'Submitted', '1', '2023-09-14 03:58:17', '2023-09-14 03:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_name` varchar(255) NOT NULL,
  `system_phone` varchar(255) NOT NULL,
  `system_email` varchar(255) NOT NULL,
  `system_address` text NOT NULL,
  `system_url` text NOT NULL,
  `system_admin_url` text DEFAULT NULL,
  `system_logo` varchar(255) NOT NULL,
  `system_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `system_name`, `system_phone`, `system_email`, `system_address`, `system_url`, `system_admin_url`, `system_logo`, `system_icon`, `created_at`, `updated_at`) VALUES
(1, 'NGO AB', '454543', 'm@gmail.com', 'NGO Affairs Bureau. Prime Minister\'s Office. Plot-E-13/B, Agargaon. Sher-e-Bangla Nagar, Dhaka-1207.', 'http://localhost/databaseUpdate/front/', 'http://localhost/databaseUpdate/admin/', 'public/uploads/169269169920230822logo.png', 'public/uploads/169269169920230822logo.png', '2023-08-22 02:08:20', '2023-08-22 02:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` text DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `ngo_type` varchar(255) DEFAULT NULL,
  `registration` varchar(255) DEFAULT NULL,
  `last_renew_date` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_phone`, `user_address`, `user_image`, `ngo_type`, `registration`, `last_renew_date`, `email`, `user_email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(20, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kkajol428@gmail.com', NULL, '$2y$10$gwRmSamVzd5boASjnoY2TOTuAmBJgmKPuuaGKNdqgQxbkFDiNNphu', NULL, '2023-09-10 04:34:20', '2023-09-10 04:35:13', 1),
(21, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kajol1122018@gmail.com', NULL, '$2y$10$Du1MdPsKJ52ja7SzUokYRuj3.xQo8hDzYFQfgYCRkHnRlzvNaTF4y', NULL, '2023-09-10 04:55:29', '2023-09-10 04:56:15', 1),
(22, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kamruzzamankajol.cse@gmail.com', NULL, '$2y$10$MD0nlkz5VV0UbiAOT8LRJudSLmhvUKGmMERNs6zyuKSXFBOaLaINq', NULL, '2023-09-10 05:08:33', '2023-09-10 05:08:51', 1),
(23, 'Kamruzzaman kajol', '01646735100', NULL, NULL, NULL, NULL, NULL, 'kajolkamruzzaman.cse@gmail.com', NULL, '$2y$10$mbLN2scv2vS0edNSjCrCd.DAAXoXi4.ffwc.ZStfmDxkzbnJN5/kq', NULL, '2023-09-10 05:19:36', '2023-09-10 05:20:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_verify`
--

CREATE TABLE `users_verify` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_verify`
--

INSERT INTO `users_verify` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'L2NCkBzG2c', '2023-08-22 03:30:36', '2023-08-22 03:30:36'),
(2, 'BHJphfKcmh', '2023-08-28 03:45:41', '2023-08-28 03:45:41'),
(3, 'gPXKyUE0lk', '2023-08-29 05:43:30', '2023-08-29 05:43:30'),
(4, '4rVxGwBzXb', '2023-08-29 09:07:32', '2023-08-29 09:07:32'),
(5, 'fi3zjDkCKt', '2023-08-30 00:40:49', '2023-08-30 00:40:49'),
(6, '5h2PXxoUMs', '2023-08-30 00:41:00', '2023-08-30 00:41:00'),
(7, 'KU8PWzlh4J', '2023-08-30 00:41:42', '2023-08-30 00:41:42'),
(8, '1XMPKTNCNN', '2023-08-30 00:41:49', '2023-08-30 00:41:49'),
(9, 'tw8gCBSMqG', '2023-08-30 00:42:04', '2023-08-30 00:42:04'),
(10, 'UhRkyjHSZ3', '2023-08-30 00:42:44', '2023-08-30 00:42:44'),
(11, '54eQaonnxT', '2023-08-30 00:46:49', '2023-08-30 00:46:49'),
(12, '0LTkUMTkqL', '2023-08-30 00:47:02', '2023-08-30 00:47:02'),
(13, 'SVLKsnXhe3', '2023-08-30 00:52:22', '2023-08-30 00:52:22'),
(14, '4VTSqV8meH', '2023-08-30 00:57:55', '2023-08-30 00:57:55'),
(15, 'aAGWWHLOqg', '2023-08-30 04:18:08', '2023-08-30 04:18:08'),
(16, '9x7U3dU7hd', '2023-08-30 04:38:40', '2023-08-30 04:38:40'),
(17, '5fohU9Igg7', '2023-09-06 01:15:52', '2023-09-06 01:15:52'),
(18, 'B5OYT0TKCL', '2023-09-08 22:43:15', '2023-09-08 22:43:15'),
(19, 'cD7zWf84gl', '2023-09-10 02:38:21', '2023-09-10 02:38:21'),
(20, 'bQguZC8MVl', '2023-09-10 04:34:20', '2023-09-10 04:34:20'),
(21, 'Qed2yLLvzX', '2023-09-10 04:55:29', '2023-09-10 04:55:29'),
(22, 'FfgZ9Dzxhr', '2023-09-10 05:08:33', '2023-09-10 05:08:33'),
(23, 'btnfGTvcbN', '2023-09-10 05:19:36', '2023-09-10 05:19:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_designation_histories`
--
ALTER TABLE `admin_designation_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dak_details`
--
ALTER TABLE `dak_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_lists`
--
ALTER TABLE `designation_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_lists_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `designation_steps`
--
ALTER TABLE `designation_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designation_steps_designation_list_id_foreign` (`designation_list_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_foreigner_employee_family_member_lists_fd9_form_id_foreign` (`fd9_form_id`);

--
-- Indexes for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_forms_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd9_forwarding_letter_edits`
--
ALTER TABLE `fd9_forwarding_letter_edits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_forwarding_letter_edits_forwarding_letter_id_foreign` (`forwarding_letter_id`);

--
-- Indexes for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd9_one_forms_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_adviser_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_bank_accounts_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_forms_user_id_foreign` (`user_id`);

--
-- Indexes for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_member_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_other_pdf_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_source_of_funds_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_complete_statuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_eights`
--
ALTER TABLE `form_eights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_eights_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forwarding_letters_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forwarding_letter_onulipis_forwarding_letter_id_foreign` (`forwarding_letter_id`);

--
-- Indexes for table `job_histories`
--
ALTER TABLE `job_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_histories_admin_id_foreign` (`admin_id`),
  ADD KEY `job_histories_designation_list_id_foreign` (`designation_list_id`);

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
-- Indexes for table `name_change_docs`
--
ALTER TABLE `name_change_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_change_docs_ngo_name_change_id_foreign` (`ngo_name_change_id`);

--
-- Indexes for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_durations_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_f_d_nine_daks`
--
ALTER TABLE `ngo_f_d_nine_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_f_d_nine_one_daks`
--
ALTER TABLE `ngo_f_d_nine_one_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_member_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_member_nid_photos_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_name_changes_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_name_change_daks`
--
ALTER TABLE `ngo_name_change_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_other_docs_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_registration_daks`
--
ALTER TABLE `ngo_registration_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_renews_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_renew_daks`
--
ALTER TABLE `ngo_renew_daks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_renew_infos_user_id_foreign` (`user_id`),
  ADD KEY `ngo_renew_infos_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_statuses_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_type_and_languages_user_id_foreign` (`user_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_visas`
--
ALTER TABLE `n_visas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visas_fd_one_form_id_foreign` (`fd_one_form_id`),
  ADD KEY `n_visas_fd9_one_form_id_foreign` (`fd9_one_form_id`);

--
-- Indexes for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_authorized_personal_of_the_orgs_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_compensation_and_benifits_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_employment_information_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_manpower_of_the_offices_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_necessary_document_for_work_permits_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_particulars_of_foreign_incumbnets_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_particular_of_sponsor_or_employers_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_visa_work_place_addresses_n_visa_id_foreign` (`n_visa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `renewal_files`
--
ALTER TABLE `renewal_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renewal_files_fd_one_form_id_foreign` (`fd_one_form_id`);

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
-- Indexes for table `secruity_checks`
--
ALTER TABLE `secruity_checks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_information`
--
ALTER TABLE `system_information`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_designation_histories`
--
ALTER TABLE `admin_designation_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `dak_details`
--
ALTER TABLE `dak_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `designation_lists`
--
ALTER TABLE `designation_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `designation_steps`
--
ALTER TABLE `designation_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fd9_forwarding_letter_edits`
--
ALTER TABLE `fd9_forwarding_letter_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form_eights`
--
ALTER TABLE `form_eights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_histories`
--
ALTER TABLE `job_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `name_change_docs`
--
ALTER TABLE `name_change_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ngo_f_d_nine_daks`
--
ALTER TABLE `ngo_f_d_nine_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_f_d_nine_one_daks`
--
ALTER TABLE `ngo_f_d_nine_one_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ngo_name_change_daks`
--
ALTER TABLE `ngo_name_change_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ngo_registration_daks`
--
ALTER TABLE `ngo_registration_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ngo_renew_daks`
--
ALTER TABLE `ngo_renew_daks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_visas`
--
ALTER TABLE `n_visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renewal_files`
--
ALTER TABLE `renewal_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `secruity_checks`
--
ALTER TABLE `secruity_checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designation_lists`
--
ALTER TABLE `designation_lists`
  ADD CONSTRAINT `designation_lists_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designation_steps`
--
ALTER TABLE `designation_steps`
  ADD CONSTRAINT `designation_steps_designation_list_id_foreign` FOREIGN KEY (`designation_list_id`) REFERENCES `designation_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_foreigner_employee_family_member_lists`
--
ALTER TABLE `fd9_foreigner_employee_family_member_lists`
  ADD CONSTRAINT `fd9_foreigner_employee_family_member_lists_fd9_form_id_foreign` FOREIGN KEY (`fd9_form_id`) REFERENCES `fd9_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_forms`
--
ALTER TABLE `fd9_forms`
  ADD CONSTRAINT `fd9_forms_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_forwarding_letter_edits`
--
ALTER TABLE `fd9_forwarding_letter_edits`
  ADD CONSTRAINT `fd9_forwarding_letter_edits_forwarding_letter_id_foreign` FOREIGN KEY (`forwarding_letter_id`) REFERENCES `forwarding_letters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd9_one_forms`
--
ALTER TABLE `fd9_one_forms`
  ADD CONSTRAINT `fd9_one_forms_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_adviser_lists`
--
ALTER TABLE `fd_one_adviser_lists`
  ADD CONSTRAINT `fd_one_adviser_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_bank_accounts`
--
ALTER TABLE `fd_one_bank_accounts`
  ADD CONSTRAINT `fd_one_bank_accounts_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  ADD CONSTRAINT `fd_one_forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_member_lists`
--
ALTER TABLE `fd_one_member_lists`
  ADD CONSTRAINT `fd_one_member_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_other_pdf_lists`
--
ALTER TABLE `fd_one_other_pdf_lists`
  ADD CONSTRAINT `fd_one_other_pdf_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_source_of_funds`
--
ALTER TABLE `fd_one_source_of_funds`
  ADD CONSTRAINT `fd_one_source_of_funds_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_complete_statuses`
--
ALTER TABLE `form_complete_statuses`
  ADD CONSTRAINT `form_complete_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_eights`
--
ALTER TABLE `form_eights`
  ADD CONSTRAINT `form_eights_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forwarding_letters`
--
ALTER TABLE `forwarding_letters`
  ADD CONSTRAINT `forwarding_letters_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forwarding_letter_onulipis`
--
ALTER TABLE `forwarding_letter_onulipis`
  ADD CONSTRAINT `forwarding_letter_onulipis_forwarding_letter_id_foreign` FOREIGN KEY (`forwarding_letter_id`) REFERENCES `forwarding_letters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_histories`
--
ALTER TABLE `job_histories`
  ADD CONSTRAINT `job_histories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_histories_designation_list_id_foreign` FOREIGN KEY (`designation_list_id`) REFERENCES `designation_lists` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `name_change_docs`
--
ALTER TABLE `name_change_docs`
  ADD CONSTRAINT `name_change_docs_ngo_name_change_id_foreign` FOREIGN KEY (`ngo_name_change_id`) REFERENCES `ngo_name_changes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_durations`
--
ALTER TABLE `ngo_durations`
  ADD CONSTRAINT `ngo_durations_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  ADD CONSTRAINT `ngo_member_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  ADD CONSTRAINT `ngo_member_nid_photos_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_name_changes`
--
ALTER TABLE `ngo_name_changes`
  ADD CONSTRAINT `ngo_name_changes_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD CONSTRAINT `ngo_other_docs_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_renews`
--
ALTER TABLE `ngo_renews`
  ADD CONSTRAINT `ngo_renews_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  ADD CONSTRAINT `ngo_renew_infos_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ngo_renew_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  ADD CONSTRAINT `ngo_statuses_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  ADD CONSTRAINT `ngo_type_and_languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visas`
--
ALTER TABLE `n_visas`
  ADD CONSTRAINT `n_visas_fd9_one_form_id_foreign` FOREIGN KEY (`fd9_one_form_id`) REFERENCES `fd9_one_forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `n_visas_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_authorized_personal_of_the_orgs`
--
ALTER TABLE `n_visa_authorized_personal_of_the_orgs`
  ADD CONSTRAINT `n_visa_authorized_personal_of_the_orgs_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_compensation_and_benifits`
--
ALTER TABLE `n_visa_compensation_and_benifits`
  ADD CONSTRAINT `n_visa_compensation_and_benifits_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_employment_information`
--
ALTER TABLE `n_visa_employment_information`
  ADD CONSTRAINT `n_visa_employment_information_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_manpower_of_the_offices`
--
ALTER TABLE `n_visa_manpower_of_the_offices`
  ADD CONSTRAINT `n_visa_manpower_of_the_offices_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_necessary_document_for_work_permits`
--
ALTER TABLE `n_visa_necessary_document_for_work_permits`
  ADD CONSTRAINT `n_visa_necessary_document_for_work_permits_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_particulars_of_foreign_incumbnets`
--
ALTER TABLE `n_visa_particulars_of_foreign_incumbnets`
  ADD CONSTRAINT `n_visa_particulars_of_foreign_incumbnets_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_particular_of_sponsor_or_employers`
--
ALTER TABLE `n_visa_particular_of_sponsor_or_employers`
  ADD CONSTRAINT `n_visa_particular_of_sponsor_or_employers_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `n_visa_work_place_addresses`
--
ALTER TABLE `n_visa_work_place_addresses`
  ADD CONSTRAINT `n_visa_work_place_addresses_n_visa_id_foreign` FOREIGN KEY (`n_visa_id`) REFERENCES `n_visas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `renewal_files`
--
ALTER TABLE `renewal_files`
  ADD CONSTRAINT `renewal_files_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
