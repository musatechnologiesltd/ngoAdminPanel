-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 10:14 AM
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
-- Database: `ngofrontupdateversion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `position`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '123456789', 'admin', 'public/uploads/8b167af653c2399dd93b952a48740620 (1).jpg', 'superadmin@gmail.com', NULL, '$2y$10$5IMk9FBsTCjvVt95nbPDP.T37zu.Pd7puFGlVFHTS7D47QPW40bZW', NULL, '2023-05-08 23:13:23', '2023-05-09 01:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` varchar(2) DEFAULT NULL,
  `name_english` varchar(32) DEFAULT NULL,
  `name_bangla` varchar(25) DEFAULT NULL,
  `people_english` varchar(26) DEFAULT NULL,
  `people_bangla` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name_english`, `name_bangla`, `people_english`, `people_bangla`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'আফগানিস্তান', 'Afghan', 'আফগান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(2, 'AL', 'Albania', 'আলবেনিয়া', 'Albanian', 'আলবেনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(3, 'DZ', 'Algeria', 'আলজেরিয়া', 'Algerian', 'আলজেরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(5, 'AD', 'Andorra', 'অ্যান্ডোরা', 'Andorran', 'অ্যান্ডোরান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(6, 'AO', 'Angola', 'অ্যাঙ্গোলা', 'Angolan', 'অ্যাঙ্গোলান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(9, 'AG', 'Antigua and Barbuda', 'অ্যান্টিগুয়া ও বার্বুডা', 'Antiguan and Barbudan', 'অ্যান্টিগুয়ান এবং বারবুডান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(10, 'AR', 'Argentina', 'আর্জেন্টিনা', 'Argentinian', 'আর্জেন্টিনীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(11, 'AM', 'Armenia', 'আর্মেনিয়া', 'Armenian', 'আর্মেনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(12, 'AW', 'Aruba', 'আরুবা', 'Aruban', 'Aruban', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(13, 'AU', 'Australia', 'অস্ট্রেলিয়া', 'Australian', 'অস্ট্রেলিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(14, 'AT', 'Austria', 'অস্ট্রিয়া', 'Austrian', 'অস্ট্রিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(15, 'AZ', 'Azerbaijan', 'আজারবাইজান', 'Azerbaijani', 'আজারবাইজানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(16, 'BS', 'Bahamas', 'বাহামাস', 'Bahamian', 'বাহামিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(17, 'BH', 'Bahrain', 'বাহরাইন', 'Bahraini', 'বাহরাইনি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(18, 'BD', 'Bangladesh', 'বাংলাদেশ', 'Bangladeshi', 'বাংলাদেশী', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(19, 'BB', 'Barbados', 'বার্বাডোস', 'Barbadian', 'বার্বাডিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(20, 'BY', 'Belarus', 'বেলারুস', 'Belarusian', 'বেলারুশিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(21, 'BE', 'Belgium', 'বেলজিয়াম', 'Belgian', 'বেলজিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(22, 'BZ', 'Belize', 'বেলিজ', 'Belizean', 'বেলিজিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(23, 'BJ', 'Benin', 'বেনিন', 'Beninese', 'বেনিনীজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(25, 'BT', 'Bhutan', 'ভুটান', 'Bhutanese', 'ভুটানিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(26, 'BO', 'Bolivia', 'বলিভিয়া', 'Bolivian', 'বলিভিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(28, 'BW', 'Botswana', 'বতসোয়ানা', 'Batswana', 'বাতসোয়ানা', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(30, 'BR', 'Brazil', 'ব্রাজিল', 'Brazilian', 'ব্রাজিলিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(32, 'BN', 'BRUNEI DARUSSALAM', 'ব্রুনাই দারুসসালাম', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(33, 'BG', 'Bulgaria', 'বুলগেরিয়া', 'Bulgarian', 'বুলগেরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(34, 'BF', 'BURKINA FASO', 'বুর্কিনা ফাসো', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(35, 'BI', 'Burundi', 'বুরুন্ডি', 'Umurundi', 'উমুরুন্ডি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(36, 'KH', 'Cambodia', 'কাম্বোডিয়া', 'Cambodian', 'কম্বোডিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(37, 'CM', 'Cameroon', 'ক্যামেরুন', 'Cameroonian', 'ক্যামেরুনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(38, 'CA', 'Canada', 'কানাডা', 'Canadian', 'কানাডিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(39, 'CV', 'CAPE VERDE', 'কেপ ভার্দে', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(40, 'KY', 'CAYMAN ISLANDS', 'কেম্যান দ্বীপপুঞ্জ', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'মধ্য আফ্রিকান প্রজাতন্ত্র', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(42, 'TD', 'Chad', 'চাদ', 'Chadian', 'চাদিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(43, 'CL', 'Chile', 'চিলি', 'Chilean', 'চিলিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(44, 'CN', 'China', 'চীন', 'Chinese', 'চাইনিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(45, 'CX', 'CHRISTMAS ISLAND', 'ক্রিস্টমাস দ্বীপ', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'কোকোস (কিলিং) দ্বীপপুঞ্জ', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(47, 'CO', 'Colombia', 'কলম্বিয়া', 'Colombian', 'কলম্বিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(48, 'KM', 'COMOROS', 'কোমোরোস', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(49, 'CG', 'CONGO', 'কঙ্গো', 'Congolese', 'কঙ্গোলিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(51, 'CK', 'COOK ISLANDS', 'কুক দ্বীপপুঞ্জ', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(52, 'CR', 'Costa Rica', 'কোস্টারিকা', 'Costa Rican', 'কোস্টারিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(53, 'CI', 'COTE D\'IVOIRE', 'কোট ডি\'আইভোয়ার', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(54, 'HR', 'Croatia', 'ক্রোয়েশিয়া', 'Croatian', 'ক্রোয়েশিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(55, 'CU', 'Cuba', 'কিউবা', 'Cuban', 'কিউবান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(56, 'CY', 'CYPRUS', 'সাইপ্রাস', NULL, NULL, '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(57, 'CZ', 'Czech Republic', 'চেক প্রজাতন্ত্র', 'Czech', 'চেক', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(58, 'DK', 'Denmark', 'ডেনমার্ক', 'Danish', 'ড্যানিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(59, 'DJ', 'Djibouti', 'জিবুতি', 'Djiboutian', 'জিবুতিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(60, 'DM', 'Dominica', 'ডোমিনিকা', 'Dominican', 'ডোমিনিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(61, 'DO', 'Dominican Republic', 'ডোমিনিকান রিপাবলিক', 'Dominican', 'ডোমিনিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(62, 'EC', 'Ecuador', 'ইকুয়েডর', 'Ecuadorian', 'ইকুয়েডরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(63, 'EG', 'Egypt', 'মিশর', 'Egyptian', 'মিশরীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(64, 'SV', 'El Salvador', 'এল সালভাদর', 'Salvadorian', 'সালভাডোরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(65, 'GQ', 'Equatorial Guinea', 'বিষুবীয় গিনি', 'Equatoguinean', 'বিষুবীযয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(66, 'ER', 'Eritrea', 'ইরিত্রিয়া', 'Eritrean', 'ইরিত্রিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(67, 'EE', 'Estonia', 'এস্তোনিয়া', 'Estonian', 'এস্তোনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(68, 'ET', 'Ethiopia', 'ইথিওপিয়া', 'Ethiopian', 'ইথিওপিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(71, 'FJ', 'Fiji', 'ফিজি', 'Fijian', 'ফিজিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(72, 'FI', 'Finland', 'ফিনল্যান্ড', 'Finnish', 'ফিনিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(73, 'FR', 'France', 'ফ্রান্স', 'French', 'ফরাসি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(77, 'GA', 'Gabon', 'গ্যাবন', 'Gabonese', 'গ্যাবোনিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(78, 'GM', 'Gambia', 'গাম্বিয়া', 'Gambian', 'গাম্বিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(79, 'GE', 'Georgia', 'জর্জিয়া', 'Georgian', 'জর্জিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(80, 'DE', 'Germany', 'জার্মানি', 'German', 'জার্মান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(81, 'GH', 'Ghana', 'ঘানা', 'Ghanaian', 'ঘানাইয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(83, 'GR', 'Greece', 'গ্রীস', 'Greek', 'গ্রীক', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(84, 'GL', 'Greenland', 'গ্রীনল্যান্ড', 'Greenlander', 'গ্রীনল্যান্ডার', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(85, 'GD', 'Grenada', 'গ্রেনাডা', 'Grenadian', 'গ্রেনাডিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(88, 'GT', 'Guatemala', 'গুয়াতেমালা', 'Guatemalan', 'গুয়াতেমালান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(89, 'GN', 'Guinea', 'গিনি', 'Guinean', 'গিনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(90, 'GW', 'Guinea-Bissau', 'গিনি-বিসাউ', 'Bissau-Guinean', 'বিসাউ-গুইনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(91, 'GY', 'Guyana', 'গায়ানা', 'Guyanese', 'গায়ানিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(92, 'HT', 'Haiti', 'হাইতি', 'Haitian', 'হাইতিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(94, 'VA', 'Vatican City', 'ভ্যাটিকান সিটি', 'Vaticanian', 'ভ্যাটিকানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(95, 'HN', 'Honduras', 'হন্ডুরাস', 'Honduran', 'হন্ডুরান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(96, 'HK', 'Hong Kong', 'হংকং', 'Hongkonger', 'হংকংগার', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(97, 'HU', 'Hungary', 'হাঙ্গেরি', 'Hungarian', 'হাঙ্গেরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(98, 'IS', 'Iceland', 'আইসল্যান্ড', 'Icelandic', 'আইসল্যান্ডিক', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(99, 'IN', 'India', 'ভারত', 'Indian', 'ভারতীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(100, 'ID', 'Indonesia', 'ইন্দোনেশিয়া', 'Indonesian', 'ইন্দোনেশিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(101, 'IR', 'Iran', 'ইরান (ইসলামি প্রজাতন্ত্র)', 'Iranian', 'ইরানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(102, 'IQ', 'Iraq', 'ইরাক', 'Iraqi', 'ইরাকি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(103, 'IE', 'Ireland', 'আয়ারল্যান্ড', 'Irish', 'আইরিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(105, 'IT', 'Italy', 'ইতালি', 'Italian', 'ইতালীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(106, 'JM', 'Jamaica', 'জামাইকা', 'Jamaican', 'জ্যামাইকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(107, 'JP', 'Japan', 'জাপান', 'Japanese', 'জাপানিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(108, 'JO', 'Jordan', 'জর্ডান', 'Jordanian', 'জর্ডানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(109, 'KZ', 'Kazakhstan', 'কাজাখস্তান', 'Kazakhstani', 'কাজাখস্তানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(110, 'KE', 'Kenya', 'কেনিয়া', 'Kenyan', 'কেনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(111, 'KI', 'Kiribati', 'কিরিবাতি', 'I-Kiribati', 'আই-কিরিবাতি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(112, 'KP', 'South Korea', 'দক্ষিণ কোরিয়া', 'Korean', 'কোরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(113, 'KR', 'South Korea', 'দক্ষিণ কোরিয়া', 'South Korean', 'দক্ষিণ কোরীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(114, 'KW', 'Kuwait', 'কুয়েত', 'Kuwaiti', 'কুয়েতি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(115, 'KG', 'Kyrgyzstan', 'কিরগিজস্তান', 'Kyrgyz', 'কিরগিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(117, 'LV', 'Latvia', 'লাটভিয়া', 'Latvian', 'লাটভিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(118, 'LB', 'Lebanon', 'লেবানন', 'Lebanese', 'লেবানিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(119, 'LS', 'Lesotho', 'লেসোথো', 'Basotho', 'বাসোথো', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(120, 'LR', 'Liberia', 'লাইবেরিয়া', 'Liberian', 'লাইবেরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(121, 'LY', 'Libya', 'লিবিয়া', 'Libyan', 'লিবিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(122, 'LI', 'Liechtenstein', 'লিচেনস্টেইন', 'Liechtensteiner', 'লিচেনস্টাইনার', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(123, 'LT', 'Lithuania', 'লিথুয়ানিয়া', 'Lithuanian', 'লিথুয়ানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(124, 'LU', 'Luxembourg', 'লুক্সেমবার্গ', 'Luxembourger', 'লুক্সেমবার্গার', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(126, 'MK', 'North Macedonia', 'উত্তর মেসিডোনিয়া', 'Macedonian', 'ম্যাসেডোনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(127, 'MG', 'Madagascar', 'মাদাগাস্কার', 'Malagasy', 'মালাগাসি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(128, 'MW', 'Malawi', 'মালাউই', 'Malawian', 'মালাউইয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(129, 'MY', 'Malaysia', 'মালয়েশিয়া', 'Malaysian', 'মালয়েশিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(130, 'MV', 'Maldives', 'মালদ্বীপ', 'Maldivian', 'মালদ্বীপীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(131, 'ML', 'Mali', 'মালি', 'Malian', 'মালিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(132, 'MT', 'Malta', 'মাল্টা', 'Maltese', 'মাল্টিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(133, 'MH', 'Marshall Islands', 'মার্শাল দ্বীপপুঞ্জ', 'Marshallese', 'মার্শালিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(135, 'MR', 'Mauritania', 'মৌরিতানিয়া', 'Mauritanian', 'মৌরিতানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(136, 'MU', 'Mauritian', 'মরিশাস', 'Mauritian', 'মৌরিশিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(138, 'MX', 'Mexico', 'মেক্সিকো', 'Mexican', 'মেক্সিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(140, 'MD', 'Moldova', 'মলডোভা', 'Moldovan', 'মলডোভান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(141, 'MC', 'Monaco', 'মোনাকো', 'Monacan', 'মোনাকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(142, 'MN', 'Mongolia', 'মঙ্গোলিয়া', 'Mongolian', 'মঙ্গোলিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(144, 'MA', 'Morocco', 'মরক্কো', 'Moroccan', 'মরক্কান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(145, 'MZ', 'Mozambique', 'মোজাম্বিক', 'Mozambican', 'মোজাম্বিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(146, 'MM', 'Myanmar', 'মায়ানমার', 'Myanma', 'মায়ানমা', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(147, 'NA', 'Namibia', 'নামিবিয়া', 'Namibian', 'নামিবিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(148, 'NR', 'Nauru', 'নাউরু', 'Nauruan', 'নাউরুয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(149, 'NP', 'Nepal', 'নেপাল', 'Nepalese', 'নেপালি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(150, 'NL', 'Netherlands', 'নেদারল্যান্ডস', 'Dutch', 'ডাচ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(151, 'AN', 'Netherlands Antilles', 'নেদারল্যান্ডস এন্টিলস', 'Netherlands Antillean', 'নেদারল্যান্ডস এন্টিলয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(153, 'NZ', 'New Zealand', 'নিউজিল্যান্ড', 'New Zealander', 'নিউজিল্যান্ডীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(154, 'NI', 'Nicaragua', 'নিকারাগুয়া', 'Nicaraguan', 'নিকারাগুয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(155, 'NE', 'Niger', 'নাইগার', 'Nigerien', 'নাইগেরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(156, 'NG', 'Nigeria', 'নাইজেরিয়া', 'Nigerian', 'নাইজেরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(157, 'NU', 'Niue', 'নিউই', 'Niuean', 'নিউইয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(160, 'NO', 'Norway', 'নরওয়ে', 'Norwegian', 'নরওয়েজিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(161, 'OM', 'Oman', 'ওমান', 'Omani', 'ওমানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(162, 'PK', 'Pakistan', 'পাকিস্তান', 'Pakistani', 'পাকিস্তানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(163, 'PW', 'Palau', 'পালাউ', 'Palauan', 'পালাউয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(164, 'PS', 'State of Palestine', 'ফিলিস্তিন', 'Palestinian', 'ফিলিস্তিনি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(165, 'PA', 'Panama', 'পানামা', 'Panamanian', 'পানামানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(166, 'PG', 'Papua New Guinea', 'পাপুয়া নিউ গিনি', 'Papua New Guinean', 'পাপুয়া নিউ গিনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(167, 'PY', 'Paraguay', 'প্যারাগুয়ে', 'Paraguayan', 'প্যারাগুইয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(168, 'PE', 'Peru', 'পেরু', 'Peruvian', 'পেরুভিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(169, 'PH', 'Philippines', 'ফিলিপাইনস', 'Philippine', 'ফিলিপিনো', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(171, 'PL', 'Poland', 'পোল্যান্ড', 'Polish', 'পোলিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(172, 'PT', 'Portugal', 'পর্তুগাল', 'Portuguese', 'পর্তুগীজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(174, 'QA', 'Qatar', 'কাতার', 'Qatari', 'কাতারি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(176, 'RO', 'Romania', 'রোমানিয়া', 'Romanian', 'রোমানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(177, 'RU', 'Russia', 'রাশিয়ান', 'Russian', 'রাশিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(178, 'RW', 'Rwanda', 'রুয়ান্ডা', 'Rwandan', 'রুয়ান্ডান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(180, 'KN', 'Saint Kitts and Nevis', 'সেন্ট কিটস ও নেভিস', 'Nevisian', 'নেভিসিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(181, 'LC', 'Saint Lucia', 'সেন্ট লুসিয়া', 'Saint Lucian', 'সেন্ট লুসিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(183, 'VC', 'Saint Vincent and the Grenadines', 'ভিনসেন্ট এবং গ্রেনাডাইনস', 'Vincentian and Grenadinian', 'ভিনসেন্টিয়ান এবং গ্রেনাডিনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(184, 'WS', 'Samoa', 'সামোয়া', 'Samoan', 'সামোয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(185, 'SM', 'San Marino', 'সান মারিনো', 'Sammarinese', 'সামারিনিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(186, 'ST', 'Sao Tome & Principe', 'সাও টোমে এবং প্রিনসিপে', 'Santomean', 'সান্টোমিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(187, 'SA', 'Saudi Arabia', 'সৌদি আরব', 'Saudi', 'সৌদি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(188, 'SN', 'Senegal', 'সেনেগাল', 'Senegalese', 'সেনেগালিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(189, 'CS', 'Serbia', 'সার্বিয়া', 'Serbian', 'সার্বিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(190, 'SC', 'Seychelles', 'সেচেলস', 'Seychellois', 'সেচেলোইস', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(191, 'SL', 'Sierra Leone', 'সিয়েরা লিওন', 'Sierra Leonean', 'সিয়েরা লিওনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(192, 'SG', 'Singapore', 'সিঙ্গাপুর', 'Singaporean', 'সিঙ্গাপুরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(193, 'SK', 'Slovakia', 'স্লোভাকিয়া', 'Slovak', 'স্লোভাক', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(194, 'SI', 'Slovenia', 'স্লোভেনিয়া', 'Slovenian', 'স্লোভেনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(195, 'SB', 'SOLOMON ISLANDS', 'সলোমান দ্বীপপুঞ্জ', 'Solomon Islander', 'সলোমন দ্বীপবাসী', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(196, 'SO', 'SOMALIA', 'সোমালিয়া', 'Somali', 'সোমালি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(197, 'ZA', 'South Africa', 'দক্ষিন আফ্রিকা', 'South African', 'দক্ষিণ আফ্রিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(199, 'ES', 'Spain', 'স্পেন', 'Spanish', 'স্প্যানিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(200, 'LK', 'Sri Lanka', 'শ্রীলংকা', 'Sri Lankan', 'শ্রীলঙ্কান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(201, 'SD', 'Sudan', 'সুদান', 'Sudanese', 'সুদানিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(202, 'SR', 'Suriname', 'সুরিনাম', 'Surinamese', 'সুরিনামিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(204, 'SZ', 'Eswatini', 'এস্বাতিনী', 'Emaswati', 'এমস্বতী', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(205, 'SE', 'Sweden', 'সুইডেন', 'Swedish', 'সুইডিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(206, 'CH', 'Switzerland', 'সুইজারল্যান্ড', 'Swiss', 'সুইস', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(207, 'SY', 'Syria', 'সিরিয়া', 'Syrian', 'সিরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(208, 'TW', 'TAIWAN', 'তাইওয়ান', 'Taiwanese', 'তাইওয়ানিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(209, 'TJ', 'Tajikistan', 'তাজিকিস্তান', 'Tajikistani', 'তাজিকিস্তানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(210, 'TZ', 'Tanzania', 'তানজানিয়া', 'Tanzanian', 'তানজানিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(211, 'TH', 'Thailand', 'থাইল্যান্ড', 'Thai', 'থাই', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(212, 'TL', 'TIMOR-LESTE', 'টিমোর-লেস্টে', 'Timorese', 'তিমোরিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(213, 'TG', 'Togo', 'টোগো', 'Togolese', 'টোগোলিজ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(215, 'TO', 'Tonga', 'টোঙ্গা', 'Tongan', 'টোঙ্গান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'ত্রিনিদাদ ও টোবাগো', 'Trinidadian and Tobagonian', 'ত্রিনিদাদীয় এবং টোবাগোনিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(217, 'TN', 'Tunisia', 'তিউনিসিয়া', 'Tunisian', 'তিউনিসিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(218, 'TR', 'Turkey', 'তুরস্ক', 'Turkish', 'তুর্কি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(219, 'TM', 'Turkmenistan', 'তুর্কমেনিস্তান', 'Turkmenistani', 'তুর্কমেনিস্তানি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(221, 'TV', 'Tuvalu', 'টুভালু', 'Tuvaluan', 'টুভালুয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(222, 'UG', 'Uganda', 'উগান্ডা', 'Ugandan', 'উগান্ডান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(223, 'UA', 'Ukraine', 'ইউক্রেন', 'Ukrainian', 'ইউক্রেনীয়', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(224, 'AE', 'United Arab Emirates', 'সংযুক্ত আরব আমিরাত', 'Emirati', 'আমিরাতি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(225, 'GB', 'United Kingdom', 'যুক্তরাজ্য', 'British', 'ব্রিটিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(226, 'US', 'United States', 'যুক্তরাষ্ট্র', 'American', 'আমেরিকান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(228, 'UY', 'Uruguay', 'উরুগুয়ে', 'Uruguayan', 'উরুগুইয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(229, 'UZ', 'Uzbekistan', 'উজবেকিস্তান', 'Uzbekistani', 'উজবেকিস্তানী', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(230, 'VU', 'Vanuatu', 'ভানুয়াটু', 'Vanuatuan', 'ভানুয়াটুয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(231, 'VE', 'Venezuela', 'ভেনেজুয়েলা', 'Venezuelan', 'ভেনেজুয়েলান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(237, 'YE', 'Yemen', 'ইয়েমেন', 'Yemeni', 'ইয়েমেনি', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(238, 'ZM', 'Zambia', 'জাম্বিয়া', 'Zambian', 'জাম্বিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(239, 'ZW', 'Zimbabwe', 'জিম্বাবুয়ে', 'Zimbabwean', 'জিম্বাবুইয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(241, NULL, 'Laos', 'লাওস', 'Lao', 'লাও', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(242, NULL, 'Scotland', 'স্কটল্যান্ড', 'Scottish', 'স্কটিশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(243, NULL, 'Vietnam', 'ভিয়েতনাম', 'Vietnamese', 'ভিয়েতনামী', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(244, NULL, 'Wales', 'ওয়েলস', 'Welsh', 'ওয়েলশ', '2023-05-23 06:59:35', '2023-05-23 06:59:35'),
(245, NULL, 'North Korea', 'উত্তর কোরিয়া', 'Korean', 'কোরিয়ান', '2023-05-23 06:59:35', '2023-05-23 06:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `user_id`, `start_date`, `end_date`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-05-09', '2033-05-09', 'Accepted', NULL, '2023-05-09 03:05:43', '2023-05-09 03:05:43'),
(2, 3, '2023-05-09', '2033-05-09', 'Accepted', NULL, '2023-05-09 03:06:58', '2023-05-09 03:06:58'),
(3, 3, '2023-05-09', '2033-05-09', 'Accepted', NULL, '2023-05-09 03:09:19', '2023-05-09 03:09:19'),
(4, 3, '2023-05-09', '2033-05-09', 'Accepted', NULL, '2023-05-09 03:21:21', '2023-05-09 03:21:21'),
(5, 3, '2023-05-10', '2033-05-10', 'Accepted', NULL, '2023-05-10 02:00:04', '2023-05-10 02:00:04'),
(6, 3, '2023-05-10', '2033-05-10', 'Accepted', NULL, '2023-05-10 04:49:51', '2023-05-10 04:49:51');

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
  `email` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `plan_of_operation` text DEFAULT NULL,
  `local_address` varchar(255) DEFAULT NULL,
  `annual_budget` varchar(255) DEFAULT NULL,
  `treasury_number` text DEFAULT NULL,
  `attach_the__supporting_paper` text DEFAULT NULL,
  `vat_invoice_number` text DEFAULT NULL,
  `board_of_revenue_on_fees` text DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `complete_status` text DEFAULT NULL,
  `verified_fd_one_form` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fd_one_forms`
--

INSERT INTO `fd_one_forms` (`id`, `user_id`, `registration_number`, `registration_number_given_by_admin`, `organization_name`, `organization_name_ban`, `organization_address`, `address_of_head_office`, `address_of_head_office_eng`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `address`, `district`, `phone`, `email`, `citizenship`, `profession`, `plan_of_operation`, `local_address`, `annual_budget`, `treasury_number`, `attach_the__supporting_paper`, `vat_invoice_number`, `board_of_revenue_on_fees`, `time_for_api`, `complete_status`, `verified_fd_one_form`, `created_at`, `updated_at`) VALUES
(3, 3, '1863', '4795787754453186', 'Padma Hut', 'Padma Hut', 'Padma Hut', 'বাড্ডা ,ঢাকা', 'Badda,Dhaka', 'বাংলাদেশ', 'Kamruzzaman kajol', 'Part-Time', 'Rajshahi', 'tryrty', '01646735100', 'kkajol428@gmail.com', 'Afghan', 'পেশা নাই', 'uploads/168371529420230510sample.pdf', '0', '7777777', '23343', 'uploads/168371537020230510sample.pdf', '4545', 'uploads/168371537020230510sample.pdf', '16:39:31', 'all_complete', 'uploads/168371538820230510sample.pdf', '2023-05-10 04:39:31', '2023-05-10 04:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `form_eights`
--

CREATE TABLE `form_eights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_eights`
--

INSERT INTO `form_eights` (`id`, `user_id`, `name`, `name_slug`, `desi`, `dob`, `nid_no`, `phone`, `father_name`, `present_address`, `permanent_address`, `name_supouse`, `edu_quali`, `profession`, `job_des`, `service_status`, `form_date`, `to_date`, `total_year`, `time_for_api`, `complete_status`, `verified_form_eight`, `created_at`, `updated_at`) VALUES
(7, 3, '4dk1YHhUZv34', '4dk1yhhuzv34', '5eH02ZkkYJ', '2023-05-11', 'Cn4qo3xIO4', '651990', 'LPKQM7eST3', '1VCV3C9Upq', 'a32rj2XhfL', '9GXguz2ldm', 'h1IipJJby6', 'সরকারি/আধা/সরকারি স্বায়ত্তশাসিত', '1IePXn7uLl', 'হ্যাঁ', '10/05/2023', '01/06/2023', '0 বছর 1 মাস', '15:43:55', 'complete', 'uploads/168371553720230510sample.pdf', '2023-05-10 03:43:55', '2023-05-10 04:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `form_one_adviser_lists`
--

CREATE TABLE `form_one_adviser_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_one_adviser_lists`
--

INSERT INTO `form_one_adviser_lists` (`id`, `fd_one_form_id`, `name`, `information`, `time_for_api`, `created_at`, `updated_at`) VALUES
(3, 3, 'report_add', '555', '16:42:50 pm', '2023-05-10 04:42:50', '2023-05-10 04:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `form_one_bank_accounts`
--

CREATE TABLE `form_one_bank_accounts` (
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
-- Dumping data for table `form_one_bank_accounts`
--

INSERT INTO `form_one_bank_accounts` (`id`, `fd_one_form_id`, `account_number`, `account_type`, `name_of_bank`, `branch_name_of_bank`, `bank_address`, `time_for_api`, `created_at`, `updated_at`) VALUES
(2, 3, '33', 'rr', '33', '33', 'rtyrty', '16:42:50 pm', '2023-05-10 04:42:50', '2023-05-10 04:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `form_one_member_lists`
--

CREATE TABLE `form_one_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_join` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `salary_statement` text DEFAULT NULL,
  `other_occupation` text DEFAULT NULL,
  `now_working_at` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_one_member_lists`
--

INSERT INTO `form_one_member_lists` (`id`, `fd_one_form_id`, `name`, `position`, `address`, `date_of_join`, `citizenship`, `salary_statement`, `other_occupation`, `now_working_at`, `time_for_api`, `created_at`, `updated_at`) VALUES
(16, 3, 'WpTvtmqNJ7', 'fSw27guaNL', 'n7ZInEy7GZ', 'Xwz2Hoog7S', 'Afghan', 'IoxwfIajk5', 'TwEqwVAbXz', NULL, '16:42:17', '2023-05-10 04:42:17', '2023-05-10 04:42:17'),
(17, 3, 'Y1SIE8zNnc', '3zXytn0KVI', 'K1o2WU4x26', 'NcR216MuK9', 'Afghan', '0BylNngCBH', 'PsP5rUHKFR', NULL, '16:42:17', '2023-05-10 04:42:17', '2023-05-10 04:42:17'),
(18, 3, 'glJB21bkaM', 'w07Hm8r4Xb', 'jZNco2DRuV', '28UlPmBoOV', 'Afghan', 'hp6Igp79iP', 'yBSIZ61UAM', NULL, '16:42:17', '2023-05-10 04:42:17', '2023-05-10 04:42:17'),
(19, 3, 's7xP8u9Yxx', 'iOOKpMj1FB', 'c2MVo6DICI', 'Yl5x3EoA2G', 'Bangladeshi,Afghan', 'Sw3VFOQdXC', 'W3gfKoGn9a', NULL, '16:42:17', '2023-05-10 04:42:17', '2023-05-10 04:42:17'),
(20, 3, 'PqzIAjXQAA', 'dksfSAgh2T', 'OLMxMk6rnF', '68bHVY8Sov', 'Afghan', 'i8UzHI0bhW', 'qqWEIRKVVG', NULL, '16:42:17', '2023-05-10 04:42:17', '2023-05-10 04:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_one_other_pdf_lists`
--

CREATE TABLE `form_one_other_pdf_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` bigint(20) UNSIGNED NOT NULL,
  `information_pdf` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_one_other_pdf_lists`
--

INSERT INTO `form_one_other_pdf_lists` (`id`, `fd_one_form_id`, `information_pdf`, `time_for_api`, `created_at`, `updated_at`) VALUES
(3, 3, 'uploads/16837153707731782632.pdf', '16:42:50 pm', '2023-05-10 04:42:50', '2023-05-10 04:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `form_one_source_of_funds`
--

CREATE TABLE `form_one_source_of_funds` (
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
-- Dumping data for table `form_one_source_of_funds`
--

INSERT INTO `form_one_source_of_funds` (`id`, `fd_one_form_id`, `name`, `address`, `letter_file`, `time_for_api`, `created_at`, `updated_at`) VALUES
(2, 3, 'blog_add', 'frr', 'uploads/16837152947832405965.pdf', '16:41:34', '2023-05-10 04:41:34', '2023-05-10 04:41:34');

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
(8, '2023_04_29_053439_create_form_one_member_lists_table', 1),
(9, '2023_04_29_053550_create_form_one_bank_accounts_table', 1),
(10, '2023_04_29_053644_create_form_one_adviser_lists_table', 1),
(11, '2023_04_29_053738_create_form_one_source_of_funds_table', 1),
(12, '2023_04_29_053930_create_form_one_other_pdf_lists_table', 1),
(13, '2023_04_29_062111_create_form_eights_table', 1),
(14, '2023_04_29_064036_create_ngo_member_nid_photos_table', 1),
(15, '2023_04_29_064124_create_ngo_other_docs_table', 1),
(17, '2023_04_29_073746_create_durations_table', 2),
(18, '2023_04_29_073828_create_name_changes_table', 2),
(19, '2023_04_29_073920_create_ngo_renew_infos_table', 2),
(20, '2023_04_29_075507_create_renews_table', 2),
(21, '2023_04_29_075709_create_ngo_statuses_table', 2),
(22, '2023_04_29_080557_create_countries_table', 3),
(23, '2023_05_02_055346_create_ngo_member_lists_table', 4),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(25, '2023_05_05_080336_create_permission_tables', 5),
(26, '2023_05_05_080405_create_admins_table', 5),
(27, '2023_05_06_060503_create_system_information_table', 5);

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
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `name_changes`
--

CREATE TABLE `name_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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
-- Dumping data for table `name_changes`
--

INSERT INTO `name_changes` (`id`, `user_id`, `previous_name_eng`, `previous_name_ban`, `present_name_eng`, `present_name_ban`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(3, 3, 'Padma Hut', 'Padma Hut', 'Test Ngo1', 'টেস্ট এনজিও1', 'Ongoing', '17:12:32 pm', '2023-05-11 05:12:32', '2023-05-11 05:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_member_lists`
--

CREATE TABLE `ngo_member_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_slug` varchar(255) DEFAULT NULL,
  `desi` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nid_no` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `name_supouse` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `verified_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_member_lists`
--

INSERT INTO `ngo_member_lists` (`id`, `user_id`, `name`, `name_slug`, `desi`, `dob`, `nid_no`, `phone`, `father_name`, `present_address`, `permanent_address`, `name_supouse`, `time_for_api`, `verified_file`, `created_at`, `updated_at`) VALUES
(5, 3, 'ADMINISTRATION11', 'administration11', 'HWM2eRXQJN', '2023-05-19', '9rXHKqaMC2', '15111111111', 'M0lPp4Y0kJ', 'nnpnBO5wLb', 'v6QaCDrCHx', 'S0fe9pfXMb', '16:16:45', '0', '2023-05-10 04:16:45', '2023-05-10 04:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_member_nid_photos`
--

CREATE TABLE `ngo_member_nid_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `person_name` varchar(255) DEFAULT NULL,
  `person_image` varchar(255) DEFAULT NULL,
  `person_nid_copy` varchar(255) DEFAULT NULL,
  `person_nid_copy_size` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_member_nid_photos`
--

INSERT INTO `ngo_member_nid_photos` (`id`, `user_id`, `person_name`, `person_image`, `person_nid_copy`, `person_nid_copy_size`, `time_for_api`, `created_at`, `updated_at`) VALUES
(3, 3, 'test name', 'public/uploads/1683714781202305108b167af653c2399dd93b952a48740620 (1).jpg', 'uploads/168371478120230510sample.pdf', '0.00', '16:33:01', '2023-05-10 04:33:01', '2023-05-10 04:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_other_docs`
--

CREATE TABLE `ngo_other_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pdf_file_list` varchar(255) DEFAULT NULL,
  `file_size` varchar(110) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_other_docs`
--

INSERT INTO `ngo_other_docs` (`id`, `user_id`, `pdf_file_list`, `file_size`, `time_for_api`, `created_at`, `updated_at`) VALUES
(7, 3, 'uploads/168371415820230510sample.pdf', '0.00', '16:22:38 pm', '2023-05-10 04:22:39', '2023-05-10 04:22:39'),
(8, 3, 'uploads/168371415820230510sample.pdf', '0.00', '16:22:38 pm', '2023-05-10 04:22:39', '2023-05-10 04:22:39'),
(9, 3, 'uploads/168371415820230510sample.pdf', '0.00', '16:22:38 pm', '2023-05-10 04:22:39', '2023-05-10 04:22:39'),
(10, 3, 'uploads/168371415820230510sample.pdf', '0.00', '16:22:38 pm', '2023-05-10 04:22:39', '2023-05-10 04:22:39'),
(11, 3, 'uploads/168371415820230510sample.pdf', '0.00', '16:22:38 pm', '2023-05-10 04:22:39', '2023-05-10 04:22:39'),
(12, 3, 'uploads/168371415820230510sample.pdf', '0.00', '16:22:38 pm', '2023-05-10 04:22:39', '2023-05-10 04:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_renew_infos`
--

CREATE TABLE `ngo_renew_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` varchar(110) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `organization_address` varchar(255) DEFAULT NULL,
  `address_of_head_office` varchar(255) DEFAULT NULL,
  `country_of_origin` varchar(255) DEFAULT NULL,
  `name_of_head_in_bd` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone_new` varchar(255) DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_renew_infos`
--

INSERT INTO `ngo_renew_infos` (`id`, `user_id`, `fd_one_form_id`, `registration_number`, `organization_name`, `organization_address`, `address_of_head_office`, `country_of_origin`, `name_of_head_in_bd`, `job_type`, `address`, `phone`, `phone_new`, `email`, `email_new`, `telephone_number`, `telephone_number_new`, `citizenship`, `profession`, `plan_of_operation`, `district`, `sub_district`, `fee_paid_status`, `supporting_paper`, `foregin_pdf`, `yearly_budget`, `copy_of_chalan`, `due_vat_pdf`, `change_ac_number`, `main_account_number`, `main_account_type`, `main_account_name_of_branch`, `name_of_bank`, `bank_address_main`, `web_site_name`, `mobile_new`, `mobile`, `time_for_api`, `created_at`, `updated_at`) VALUES
(2, 3, '3', '1863', 'Padma Hut', 'Padma Hut', 'বাড্ডা ,ঢাকা', NULL, 'Kamruzzaman kajol', 'খণ্ডকালীন', 'Rajshahi', '01646735100', '01646735100', 'kkajol428@gmail.com', 'kkajol428@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/168397639620230513fd_one_form.pdf', 'uploads/168397639620230513Invoice_main.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ww.ggg.com', '01646735100', '01646735100', NULL, '2023-05-13 05:13:16', '2023-05-13 05:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_statuses`
--

CREATE TABLE `ngo_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `ngo_statuses` (`id`, `user_id`, `email`, `reg_type`, `reg_id`, `print_date`, `status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(2, 3, 'kkajol428@gmail.com', 'NGO Registration', '0', NULL, 'Accepted', NULL, '2023-05-10 04:45:50', '2023-05-10 04:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_type_and_languages`
--

CREATE TABLE `ngo_type_and_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ngo_type` varchar(255) NOT NULL,
  `ngo_language` varchar(255) NOT NULL,
  `first_one_form_check_status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngo_type_and_languages`
--

INSERT INTO `ngo_type_and_languages` (`id`, `user_id`, `ngo_type`, `ngo_language`, `first_one_form_check_status`, `time_for_api`, `created_at`, `updated_at`) VALUES
(4, 3, 'দেশিও', 'en', '1', '15:10:48', '2023-05-10 03:10:48', '2023-05-10 03:10:48');

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
  `group_name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'dashboard', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(2, 'dashboard.edit', 'dashboard', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(3, 'systemInformationAdd', 'systemInformation', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(4, 'systemInformationView', 'systemInformation', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(5, 'systemInformationDelete', 'systemInformation', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(6, 'systemInformationUpdate', 'systemInformation', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(7, 'userAdd', 'user', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(8, 'userView', 'user', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(9, 'userDelete', 'user', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(10, 'userUpdate', 'user', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(11, 'roleAdd', 'role', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(12, 'roleView', 'role', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(13, 'roleDelete', 'role', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(14, 'roleUpdate', 'role', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(15, 'permissionAdd', 'permission', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(16, 'permissionView', 'permission', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(17, 'permissionDelete', 'permission', 'admin', '2023-05-08 23:13:22', '2023-05-08 23:13:22'),
(18, 'permissionUpdate', 'permission', 'admin', '2023-05-08 23:13:23', '2023-05-08 23:13:23'),
(19, 'profile.view', 'profile', 'admin', '2023-05-08 23:13:23', '2023-05-08 23:13:23'),
(20, 'profile.edit', 'profile', 'admin', '2023-05-08 23:13:23', '2023-05-08 23:13:23'),
(21, 'countryAdd', 'country', 'admin', NULL, NULL),
(22, 'countryView', 'country', 'admin', NULL, NULL),
(23, 'countryDelete', 'country', 'admin', NULL, NULL),
(24, 'countryUpdate', 'country', 'admin', NULL, NULL),
(25, 'register_list_add', 'registrationList', 'admin', NULL, NULL),
(26, 'register_list_view', 'registrationList', 'admin', NULL, NULL),
(27, 'register_list_delete', 'registrationList', 'admin', NULL, NULL),
(28, 'register_list_update', 'registrationList', 'admin', NULL, NULL),
(29, 'register_reject_list', 'registrationList', 'admin', NULL, NULL),
(30, 'register_new_list', 'registrationList', 'admin', NULL, NULL),
(31, 'name_change_add', 'nameChange', 'admin', NULL, NULL),
(32, 'name_change_view', 'nameChange', 'admin', NULL, NULL),
(33, 'name_change_delete', 'nameChange', 'admin', NULL, NULL),
(34, 'name_change_update', 'nameChange', 'admin', NULL, NULL),
(35, 'renew_add', 'renew', 'admin', NULL, NULL),
(36, 'renew_view', 'renew', 'admin', NULL, NULL),
(37, 'renew_delete', 'renew', 'admin', NULL, NULL),
(38, 'renew_update', 'renew', 'admin', NULL, NULL);

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
-- Table structure for table `renews`
--

CREATE TABLE `renews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fd_one_form_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `time_for_api` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'superadmin', 'admin', '2023-05-08 23:13:20', '2023-05-08 23:13:20'),
(2, 'admin', 'admin', '2023-05-08 23:13:20', '2023-05-08 23:13:20'),
(3, 'editor', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21'),
(4, 'user', 'admin', '2023-05-08 23:13:21', '2023-05-08 23:13:21');

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
(38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_information`
--

CREATE TABLE `system_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_information`
--

INSERT INTO `system_information` (`id`, `name`, `url`, `phone`, `email`, `address`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'NGO AB', 'http://localhost/ngoFrontUpdateVersion/', '1111', 'm@gmail.com', 'mirpur', 'public/uploads/168361449820230509bangladesh-govt-logo.jpg', 'public/uploads/168361449820230509bangladesh-govt-logo.jpg', '2023-05-09 00:41:38', '2023-05-09 00:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_email_verified`) VALUES
(3, 'Kamruzzaman kajol', '01646735100', NULL, NULL, 'kkajol428@gmail.com', NULL, '$2y$10$/g8Fjvjtst0RMXbGL2n1DOBDvV93uCpTcp.8drQoSDGM504infA3C', NULL, '2023-04-29 02:35:38', '2023-04-29 02:36:22', 1);

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
(1, 'aHoSHnQSzp', '2023-04-29 02:18:33', '2023-04-29 02:18:33'),
(2, 'LmbvcgMazN', '2023-04-29 02:23:04', '2023-04-29 02:23:04'),
(3, 'EFy0XYm9gd', '2023-04-29 02:35:38', '2023-04-29 02:35:38');

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `durations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fd_one_forms_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_eights`
--
ALTER TABLE `form_eights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_eights_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_one_adviser_lists`
--
ALTER TABLE `form_one_adviser_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_one_adviser_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `form_one_bank_accounts`
--
ALTER TABLE `form_one_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_one_bank_accounts_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `form_one_member_lists`
--
ALTER TABLE `form_one_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_one_member_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `form_one_other_pdf_lists`
--
ALTER TABLE `form_one_other_pdf_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_one_other_pdf_lists_fd_one_form_id_foreign` (`fd_one_form_id`);

--
-- Indexes for table `form_one_source_of_funds`
--
ALTER TABLE `form_one_source_of_funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_one_source_of_funds_fd_one_form_id_foreign` (`fd_one_form_id`);

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
-- Indexes for table `name_changes`
--
ALTER TABLE `name_changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_changes_user_id_foreign` (`user_id`);

--
-- Indexes for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_member_lists_user_id_foreign` (`user_id`);

--
-- Indexes for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_member_nid_photos_user_id_foreign` (`user_id`);

--
-- Indexes for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_other_docs_user_id_foreign` (`user_id`);

--
-- Indexes for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_renew_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_statuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ngo_type_and_languages_user_id_foreign` (`user_id`);

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
-- Indexes for table `renews`
--
ALTER TABLE `renews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renews_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_eights`
--
ALTER TABLE `form_eights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `form_one_adviser_lists`
--
ALTER TABLE `form_one_adviser_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_one_bank_accounts`
--
ALTER TABLE `form_one_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_one_member_lists`
--
ALTER TABLE `form_one_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `form_one_other_pdf_lists`
--
ALTER TABLE `form_one_other_pdf_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_one_source_of_funds`
--
ALTER TABLE `form_one_source_of_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `name_changes`
--
ALTER TABLE `name_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renews`
--
ALTER TABLE `renews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_information`
--
ALTER TABLE `system_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `durations`
--
ALTER TABLE `durations`
  ADD CONSTRAINT `durations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fd_one_forms`
--
ALTER TABLE `fd_one_forms`
  ADD CONSTRAINT `fd_one_forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_eights`
--
ALTER TABLE `form_eights`
  ADD CONSTRAINT `form_eights_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_one_adviser_lists`
--
ALTER TABLE `form_one_adviser_lists`
  ADD CONSTRAINT `form_one_adviser_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_one_bank_accounts`
--
ALTER TABLE `form_one_bank_accounts`
  ADD CONSTRAINT `form_one_bank_accounts_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_one_member_lists`
--
ALTER TABLE `form_one_member_lists`
  ADD CONSTRAINT `form_one_member_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_one_other_pdf_lists`
--
ALTER TABLE `form_one_other_pdf_lists`
  ADD CONSTRAINT `form_one_other_pdf_lists_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_one_source_of_funds`
--
ALTER TABLE `form_one_source_of_funds`
  ADD CONSTRAINT `form_one_source_of_funds_fd_one_form_id_foreign` FOREIGN KEY (`fd_one_form_id`) REFERENCES `fd_one_forms` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `name_changes`
--
ALTER TABLE `name_changes`
  ADD CONSTRAINT `name_changes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_member_lists`
--
ALTER TABLE `ngo_member_lists`
  ADD CONSTRAINT `ngo_member_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_member_nid_photos`
--
ALTER TABLE `ngo_member_nid_photos`
  ADD CONSTRAINT `ngo_member_nid_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_other_docs`
--
ALTER TABLE `ngo_other_docs`
  ADD CONSTRAINT `ngo_other_docs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_renew_infos`
--
ALTER TABLE `ngo_renew_infos`
  ADD CONSTRAINT `ngo_renew_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_statuses`
--
ALTER TABLE `ngo_statuses`
  ADD CONSTRAINT `ngo_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ngo_type_and_languages`
--
ALTER TABLE `ngo_type_and_languages`
  ADD CONSTRAINT `ngo_type_and_languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `renews`
--
ALTER TABLE `renews`
  ADD CONSTRAINT `renews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
