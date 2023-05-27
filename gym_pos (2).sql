-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2023 at 05:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `balance` double NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `total_in` double DEFAULT NULL,
  `total_out` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `description`, `balance`, `account_number`, `total_in`, `total_out`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'Cash', 'Default account', 15000, '1', 15222, 0, '2021-11-28 05:06:59', '2023-05-17 05:03:14', NULL),
(9, 'K Pay', 'K Pay', 6000, '09134135315', 6000, NULL, '2023-05-02 04:16:42', '2023-05-16 04:47:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `f_name`, `l_name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `company_id`) VALUES
(2, 'Xplore', 'Gym', 'xplore@admin.com', '12345', '$2a$12$tqN2L7HMt1zqw.coJIlhQOHGt4CjxPuM8OiNmN5fX0LgHXToJUsme', NULL, '2023-04-27 04:48:44', '2023-05-02 10:17:44', '2023-05-02-6450e34820471.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_at`, `updated_at`, `company_id`) VALUES
(3, 'Royal D', '2023-04-27-644a27916ccfe.png', '2023-04-27 06:47:01', '2023-04-27 07:13:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'shop_logo', '2023-05-02-64508fa2ec43b.png', NULL, NULL, NULL),
(2, 'pagination_limit', '12', NULL, NULL, NULL),
(3, 'currency', 'MMK', NULL, NULL, NULL),
(4, 'shop_name', 'Xplore', NULL, NULL, NULL),
(5, 'shop_address', 'Yangon', NULL, NULL, NULL),
(6, 'shop_phone', '0123456789', NULL, NULL, NULL),
(7, 'shop_email', 'Xplore@gmail.com', NULL, NULL, NULL),
(8, 'footer_text', 'Xplore GYM', NULL, NULL, NULL),
(9, 'country', 'MM', NULL, NULL, NULL),
(10, 'stock_limit', '10', NULL, NULL, NULL),
(11, 'time_zone', 'Asia/Rangoon', NULL, NULL, NULL),
(12, 'vat_reg_no', '0000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `position`, `status`, `image`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'Juice', 0, 0, 1, '2023-04-27-644a29a9bd6c8.png', '2023-04-27 07:22:09', '2023-04-27 07:22:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkin_logs`
--

CREATE TABLE `checkin_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `current_package` varchar(255) DEFAULT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `datetime` varchar(255) DEFAULT NULL,
  `trainer_id` varchar(255) DEFAULT NULL,
  `expire_date` varchar(255) DEFAULT NULL,
  `is_pt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkin_logs`
--

INSERT INTO `checkin_logs` (`id`, `member_id`, `current_package`, `staff_id`, `datetime`, `trainer_id`, `expire_date`, `is_pt`, `created_at`, `updated_at`) VALUES
(4, '11', NULL, '0', '2023-05-09 10:18:39', NULL, NULL, '0', '2023-05-09 03:48:39', '2023-05-09 03:48:39'),
(5, '11', '2', '0', '2023-05-15 10:29:26', NULL, '2023-05-05 15:15:50', '0', '2023-05-15 03:59:26', '2023-05-15 03:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `sub_domain_prefix` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `coupon_type` varchar(255) NOT NULL DEFAULT 'default',
  `user_limit` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `min_purchase` decimal(8,2) NOT NULL DEFAULT 0.00,
  `max_discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_type` varchar(15) NOT NULL DEFAULT 'percentage',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `exchange_rate` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency_code`, `currency_symbol`, `exchange_rate`, `created_at`, `updated_at`) VALUES
(1, 'US Dollar', 'USD', '$', 1.00, NULL, NULL),
(2, 'Canadian Dollar', 'CAD', 'CA$', 1.00, NULL, NULL),
(3, 'Euro', 'EUR', '€', 1.00, NULL, NULL),
(4, 'United Arab Emirates Dirham', 'AED', 'د.إ.‏', 1.00, NULL, NULL),
(5, 'Afghan Afghani', 'AFN', '؋', 1.00, NULL, NULL),
(6, 'Albanian Lek', 'ALL', 'L', 1.00, NULL, NULL),
(7, 'Armenian Dram', 'AMD', '֏', 1.00, NULL, NULL),
(8, 'Argentine Peso', 'ARS', '$', 1.00, NULL, NULL),
(9, 'Australian Dollar', 'AUD', '$', 1.00, NULL, NULL),
(10, 'Azerbaijani Manat', 'AZN', '₼', 1.00, NULL, NULL),
(11, 'Bosnia-Herzegovina Convertible Mark', 'BAM', 'KM', 1.00, NULL, NULL),
(12, 'Bangladeshi Taka', 'BDT', '৳', 1.00, NULL, NULL),
(13, 'Bulgarian Lev', 'BGN', 'лв.', 1.00, NULL, NULL),
(14, 'Bahraini Dinar', 'BHD', 'د.ب.‏', 1.00, NULL, NULL),
(15, 'Burundian Franc', 'BIF', 'FBu', 1.00, NULL, NULL),
(16, 'Brunei Dollar', 'BND', 'B$', 1.00, NULL, NULL),
(17, 'Bolivian Boliviano', 'BOB', 'Bs', 1.00, NULL, NULL),
(18, 'Brazilian Real', 'BRL', 'R$', 1.00, NULL, NULL),
(19, 'Botswanan Pula', 'BWP', 'P', 1.00, NULL, NULL),
(20, 'Belarusian Ruble', 'BYN', 'Br', 1.00, NULL, NULL),
(21, 'Belize Dollar', 'BZD', '$', 1.00, NULL, NULL),
(22, 'Congolese Franc', 'CDF', 'FC', 1.00, NULL, NULL),
(23, 'Swiss Franc', 'CHF', 'CHf', 1.00, NULL, NULL),
(24, 'Chilean Peso', 'CLP', '$', 1.00, NULL, NULL),
(25, 'Chinese Yuan', 'CNY', '¥', 1.00, NULL, NULL),
(26, 'Colombian Peso', 'COP', '$', 1.00, NULL, NULL),
(27, 'Costa Rican Colón', 'CRC', '₡', 1.00, NULL, NULL),
(28, 'Cape Verdean Escudo', 'CVE', '$', 1.00, NULL, NULL),
(29, 'Czech Republic Koruna', 'CZK', 'Kč', 1.00, NULL, NULL),
(30, 'Djiboutian Franc', 'DJF', 'Fdj', 1.00, NULL, NULL),
(31, 'Danish Krone', 'DKK', 'Kr.', 1.00, NULL, NULL),
(32, 'Dominican Peso', 'DOP', 'RD$', 1.00, NULL, NULL),
(33, 'Algerian Dinar', 'DZD', 'د.ج.‏', 1.00, NULL, NULL),
(34, 'Estonian Kroon', 'EEK', 'kr', 1.00, NULL, NULL),
(35, 'Egyptian Pound', 'EGP', 'E£‏', 1.00, NULL, NULL),
(36, 'Eritrean Nakfa', 'ERN', 'Nfk', 1.00, NULL, NULL),
(37, 'Ethiopian Birr', 'ETB', 'Br', 1.00, NULL, NULL),
(38, 'British Pound Sterling', 'GBP', '£', 1.00, NULL, NULL),
(39, 'Georgian Lari', 'GEL', 'GEL', 1.00, NULL, NULL),
(40, 'Ghanaian Cedi', 'GHS', 'GH¢', 1.00, NULL, NULL),
(41, 'Guinean Franc', 'GNF', 'FG', 1.00, NULL, NULL),
(42, 'Guatemalan Quetzal', 'GTQ', 'Q', 1.00, NULL, NULL),
(43, 'Hong Kong Dollar', 'HKD', 'HK$', 1.00, NULL, NULL),
(44, 'Honduran Lempira', 'HNL', 'L', 1.00, NULL, NULL),
(45, 'Croatian Kuna', 'HRK', 'kn', 1.00, NULL, NULL),
(46, 'Hungarian Forint', 'HUF', 'Ft', 1.00, NULL, NULL),
(47, 'Indonesian Rupiah', 'IDR', 'Rp', 1.00, NULL, NULL),
(48, 'Israeli New Sheqel', 'ILS', '₪', 1.00, NULL, NULL),
(49, 'Indian Rupee', 'INR', '₹', 1.00, NULL, NULL),
(50, 'Iraqi Dinar', 'IQD', 'ع.د', 1.00, NULL, NULL),
(51, 'Iranian Rial', 'IRR', '﷼', 1.00, NULL, NULL),
(52, 'Icelandic Króna', 'ISK', 'kr', 1.00, NULL, NULL),
(53, 'Jamaican Dollar', 'JMD', '$', 1.00, NULL, NULL),
(54, 'Jordanian Dinar', 'JOD', 'د.ا‏', 1.00, NULL, NULL),
(55, 'Japanese Yen', 'JPY', '¥', 1.00, NULL, NULL),
(56, 'Kenyan Shilling', 'KES', 'Ksh', 1.00, NULL, NULL),
(57, 'Cambodian Riel', 'KHR', '៛', 1.00, NULL, NULL),
(58, 'Comorian Franc', 'KMF', 'FC', 1.00, NULL, NULL),
(59, 'South Korean Won', 'KRW', 'CF', 1.00, NULL, NULL),
(60, 'Kuwaiti Dinar', 'KWD', 'د.ك.‏', 1.00, NULL, NULL),
(61, 'Kazakhstani Tenge', 'KZT', '₸.', 1.00, NULL, NULL),
(62, 'Lebanese Pound', 'LBP', 'ل.ل.‏', 1.00, NULL, NULL),
(63, 'Sri Lankan Rupee', 'LKR', 'Rs', 1.00, NULL, NULL),
(64, 'Lithuanian Litas', 'LTL', 'Lt', 1.00, NULL, NULL),
(65, 'Latvian Lats', 'LVL', 'Ls', 1.00, NULL, NULL),
(66, 'Libyan Dinar', 'LYD', 'د.ل.‏', 1.00, NULL, NULL),
(67, 'Moroccan Dirham', 'MAD', 'د.م.‏', 1.00, NULL, NULL),
(68, 'Moldovan Leu', 'MDL', 'L', 1.00, NULL, NULL),
(69, 'Malagasy Ariary', 'MGA', 'Ar', 1.00, NULL, NULL),
(70, 'Macedonian Denar', 'MKD', 'Ден', 1.00, NULL, NULL),
(71, 'Myanma Kyat', 'MMK', 'K', 1.00, NULL, NULL),
(72, 'Macanese Pataca', 'MOP', 'MOP$', 1.00, NULL, NULL),
(73, 'Mauritian Rupee', 'MUR', 'Rs', 1.00, NULL, NULL),
(74, 'Mexican Peso', 'MXN', '$', 1.00, NULL, NULL),
(75, 'Malaysian Ringgit', 'MYR', 'RM', 1.00, NULL, NULL),
(76, 'Mozambican Metical', 'MZN', 'MT', 1.00, NULL, NULL),
(77, 'Namibian Dollar', 'NAD', 'N$', 1.00, NULL, NULL),
(78, 'Nigerian Naira', 'NGN', '₦', 1.00, NULL, NULL),
(79, 'Nicaraguan Córdoba', 'NIO', 'C$', 1.00, NULL, NULL),
(80, 'Norwegian Krone', 'NOK', 'kr', 1.00, NULL, NULL),
(81, 'Nepalese Rupee', 'NPR', 'Re.', 1.00, NULL, NULL),
(82, 'New Zealand Dollar', 'NZD', '$', 1.00, NULL, NULL),
(83, 'Omani Rial', 'OMR', 'ر.ع.‏', 1.00, NULL, NULL),
(84, 'Panamanian Balboa', 'PAB', 'B/.', 1.00, NULL, NULL),
(85, 'Peruvian Nuevo Sol', 'PEN', 'S/', 1.00, NULL, NULL),
(86, 'Philippine Peso', 'PHP', '₱', 1.00, NULL, NULL),
(87, 'Pakistani Rupee', 'PKR', 'Rs', 1.00, NULL, NULL),
(88, 'Polish Zloty', 'PLN', 'zł', 1.00, NULL, NULL),
(89, 'Paraguayan Guarani', 'PYG', '₲', 1.00, NULL, NULL),
(90, 'Qatari Rial', 'QAR', 'ر.ق.‏', 1.00, NULL, NULL),
(91, 'Romanian Leu', 'RON', 'lei', 1.00, NULL, NULL),
(92, 'Serbian Dinar', 'RSD', 'din.', 1.00, NULL, NULL),
(93, 'Russian Ruble', 'RUB', '₽.', 1.00, NULL, NULL),
(94, 'Rwandan Franc', 'RWF', 'FRw', 1.00, NULL, NULL),
(95, 'Saudi Riyal', 'SAR', 'ر.س.‏', 1.00, NULL, NULL),
(96, 'Sudanese Pound', 'SDG', 'ج.س.', 1.00, NULL, NULL),
(97, 'Swedish Krona', 'SEK', 'kr', 1.00, NULL, NULL),
(98, 'Singapore Dollar', 'SGD', '$', 1.00, NULL, NULL),
(99, 'Somali Shilling', 'SOS', 'Sh.so.', 1.00, NULL, NULL),
(100, 'Syrian Pound', 'SYP', 'LS‏', 1.00, NULL, NULL),
(101, 'Thai Baht', 'THB', '฿', 1.00, NULL, NULL),
(102, 'Tunisian Dinar', 'TND', 'د.ت‏', 1.00, NULL, NULL),
(103, 'Tongan Paʻanga', 'TOP', 'T$', 1.00, NULL, NULL),
(104, 'Turkish Lira', 'TRY', '₺', 1.00, NULL, NULL),
(105, 'Trinidad and Tobago Dollar', 'TTD', '$', 1.00, NULL, NULL),
(106, 'New Taiwan Dollar', 'TWD', 'NT$', 1.00, NULL, NULL),
(107, 'Tanzanian Shilling', 'TZS', 'TSh', 1.00, NULL, NULL),
(108, 'Ukrainian Hryvnia', 'UAH', '₴', 1.00, NULL, NULL),
(109, 'Ugandan Shilling', 'UGX', 'USh', 1.00, NULL, NULL),
(110, 'Uruguayan Peso', 'UYU', '$', 1.00, NULL, NULL),
(111, 'Uzbekistan Som', 'UZS', 'so\'m', 1.00, NULL, NULL),
(112, 'Venezuelan Bolívar', 'VEF', 'Bs.F.', 1.00, NULL, NULL),
(113, 'Vietnamese Dong', 'VND', '₫', 1.00, NULL, NULL),
(114, 'CFA Franc BEAC', 'XAF', 'FCFA', 1.00, NULL, NULL),
(115, 'CFA Franc BCEAO', 'XOF', 'CFA', 1.00, NULL, NULL),
(116, 'Yemeni Rial', 'YER', '﷼‏', 1.00, NULL, NULL),
(117, 'South African Rand', 'ZAR', 'R', 1.00, NULL, NULL),
(118, 'Zambian Kwacha', 'ZMK', 'ZK', 1.00, NULL, NULL),
(119, 'Zimbabwean Dollar', 'ZWL', 'Z$', 1.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `email`, `image`, `state`, `city`, `zip_code`, `address`, `balance`, `created_at`, `updated_at`, `company_id`) VALUES
(0, 'walking customer', '1', NULL, 'def.png', NULL, NULL, NULL, NULL, 0, '2021-11-28 05:37:48', '2021-11-28 05:37:48', NULL),
(7, 'Maung Maung', '123456', 'maungmaung@gmail.com', '2023-04-27-644a3c9b60ea1.png', '11111', '11111', '11111', '11111', 0, '2023-04-27 09:12:59', '2023-04-27 09:12:59', NULL);

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `nrc_number` varchar(255) DEFAULT NULL,
  `dateofbirth` varchar(255) DEFAULT NULL,
  `expire_date` varchar(255) DEFAULT NULL,
  `member_type` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `current_trainer` varchar(255) DEFAULT NULL,
  `is_guest` varchar(255) DEFAULT NULL,
  `remain_pt` varchar(255) DEFAULT '0',
  `status` varchar(255) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `code`, `name`, `phone`, `address`, `nrc_number`, `dateofbirth`, `expire_date`, `member_type`, `join_date`, `current_trainer`, `is_guest`, `remain_pt`, `status`, `created_at`, `updated_at`) VALUES
(11, 'XP000001', '2k', '2222', '2323', '2222', '2023-05-04', '2023-05-05 15:15:50', NULL, '2023-05-04', NULL, '0', '0', '1', '2023-05-04 08:45:50', '2023-05-04 09:04:26'),
(13, 'XPGuest000001', '2k', '2', '2', NULL, NULL, '2023-06-17 11:33:14', NULL, '2023-05-17', '3', '1', '25', '1', '2023-05-17 05:03:14', '2023-05-17 05:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `member_sections`
--

CREATE TABLE `member_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `trainer_id` varchar(255) DEFAULT NULL,
  `trainer_section` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `datetime` varchar(255) DEFAULT NULL,
  `section_amount` double DEFAULT 0,
  `trainer_amount` double DEFAULT 0,
  `total_amount` double DEFAULT 0,
  `amount` double DEFAULT NULL,
  `payment_method2` varchar(255) DEFAULT NULL,
  `amount2` double DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_sections`
--

INSERT INTO `member_sections` (`id`, `code`, `member_id`, `package_id`, `trainer_id`, `trainer_section`, `payment_method`, `datetime`, `section_amount`, `trainer_amount`, `total_amount`, `amount`, `payment_method2`, `amount2`, `note`, `created_at`, `updated_at`) VALUES
(10, 'Inv_000001', '11', '2', NULL, NULL, '1', '2023-05-04 15:15:50', 0, 0, 0, 255, NULL, NULL, NULL, '2023-05-04 08:45:50', '2023-05-04 08:45:50'),
(11, 'Inv_000001', '13', '1', '3', '4', '1', '2023-05-17 11:33:14', 10000, 25, 10025, 222, NULL, NULL, NULL, '2023-05-17 05:03:14', '2023-05-17 05:03:14');

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
(5, '2021_11_02_095022_create_business_settings_table', 1),
(6, '2021_11_02_114801_create_admins_table', 1),
(7, '2021_11_03_044923_create_categories_table', 1),
(8, '2021_11_03_090927_create_brands_table', 1),
(9, '2021_11_03_101237_create_products_table', 1),
(10, '2021_11_06_025604_create_currencies_table', 1),
(11, '2021_11_06_031804_create_orders_table', 1),
(12, '2021_11_06_084528_create_order_details_table', 1),
(13, '2021_11_08_094042_create_customers_table', 1),
(15, '2021_11_11_051704_create_coupons_table', 1),
(16, '2021_11_13_100539_create_units_table', 1),
(17, '2021_11_17_034203_create_accounts_table', 1),
(20, '2021_11_17_083502_create_transections_table', 2),
(21, '2021_11_09_064445_create_suppliers_table', 3),
(22, '2021_06_17_054551_create_soft_credentials_table', 4),
(23, '2021_12_01_141901_add_phone_col_admin', 4),
(24, '2021_12_02_092539_add_image_to_admin_tables', 4),
(25, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(26, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(27, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(28, '2016_06_01_000004_create_oauth_clients_table', 5),
(29, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(30, '2022_02_06_115834_create_companies_table', 5),
(31, '2022_02_06_121739_add_company_id_col_admin', 5),
(32, '2022_02_06_150041_add_company_id_category', 5),
(33, '2022_02_06_151731_add_company_id_brand', 5),
(34, '2022_02_06_152243_add_company_id_accounts', 5),
(35, '2022_02_06_152301_add_company_id_coupon', 5),
(36, '2022_02_06_152323_add_company_id_users', 5),
(37, '2022_02_06_152357_add_company_id_orders', 5),
(38, '2022_02_06_152412_add_company_id_order_details', 5),
(39, '2022_02_06_152429_add_company_id_products', 5),
(40, '2022_02_06_152453_add_company_id_suppliers', 5),
(41, '2022_02_06_152515_add_company_id_transactions', 5),
(42, '2022_02_06_152943_add_company_id_units', 5),
(43, '2022_02_06_154752_add_company_id_customers', 5),
(44, '2022_02_06_160446_add_company_id_business_settings', 5),
(45, '2022_06_19_194943_rename_columns_to_coupons_table', 5),
(46, '2023_04_22_033906_create_staff_table', 6),
(47, '2023_04_22_050031_create_members_table', 6),
(48, '2023_04_25_080918_create_sections_table', 6),
(49, '2023_04_26_031344_create_packages_table', 6),
(50, '2023_04_26_034206_create_member_sections_table', 6),
(51, '2023_04_26_040220_create_payment_methods_table', 6),
(52, '2023_05_02_135054_create_checkin_logs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'pXnxAxPSKhx4ovCCoO44x3oKqy0opH0N7mhLApV4', NULL, 'http://localhost', 1, 0, 0, '2022-07-27 12:47:21', '2022-07-27 12:47:21'),
(2, NULL, 'Laravel Password Grant Client', 'yuCn4ks9guHGCG2ZBOBa5Y7jPloMveS07BV9JKpN', 'users', 'http://localhost', 0, 1, 0, '2022-07-27 12:47:21', '2022-07-27 12:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-27 12:47:21', '2022-07-27 12:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_amount` double NOT NULL DEFAULT 0,
  `total_tax` double NOT NULL,
  `collected_cash` double DEFAULT NULL,
  `extra_discount` double DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_discount_amount` double NOT NULL DEFAULT 0,
  `coupon_discount_title` varchar(255) DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_amount`, `total_tax`, `collected_cash`, `extra_discount`, `coupon_code`, `coupon_discount_amount`, `coupon_discount_title`, `payment_id`, `transaction_reference`, `created_at`, `updated_at`, `company_id`) VALUES
(100001, 0, 9000, 0, 9000, NULL, NULL, 0, NULL, 1, NULL, '2023-04-27 07:23:46', '2023-04-27 07:23:46', NULL),
(100002, 3, 1500, 0, 1500, NULL, NULL, 0, NULL, 1, NULL, '2023-04-27 10:24:47', '2023-04-27 10:24:47', NULL),
(100003, 11, 4500, 0, 10000, NULL, NULL, 0, NULL, 1, NULL, '2023-05-16 04:46:29', '2023-05-16 04:46:29', NULL),
(100004, 11, 6000, 0, 6000, NULL, NULL, 0, NULL, 9, NULL, '2023-05-16 04:47:02', '2023-05-16 04:47:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `product_details` text DEFAULT NULL,
  `discount_on_product` double DEFAULT NULL,
  `discount_type` varchar(20) NOT NULL DEFAULT 'amount',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `tax_amount` double NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `price`, `product_details`, `discount_on_product`, `discount_type`, `quantity`, `tax_amount`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 1, 100001, 1500, '{\"id\":1,\"name\":\"Royal D\",\"product_code\":\"32895\",\"unit_type\":3,\"unit_value\":1000,\"brand\":\"3\",\"category_ids\":\"[{\\\"id\\\":\\\"1\\\",\\\"position\\\":1}]\",\"purchase_price\":2000,\"selling_price\":1500,\"discount_type\":\"percent\",\"discount\":0,\"tax\":0,\"quantity\":94,\"image\":\"2023-04-27-644a29da12d79.png\",\"order_count\":1,\"supplier_id\":null,\"created_at\":\"2023-04-27T07:52:58.000000Z\",\"updated_at\":\"2023-04-27T07:53:46.000000Z\",\"company_id\":null}', 0, 'discount_on_product', 6, 0, '2023-04-27 07:23:46', '2023-04-27 07:23:46', NULL),
(2, 1, 100002, 1500, '{\"id\":1,\"name\":\"Royal D\",\"product_code\":\"32895\",\"unit_type\":3,\"unit_value\":1000,\"brand\":\"3\",\"category_ids\":\"[{\\\"id\\\":\\\"1\\\",\\\"position\\\":1}]\",\"purchase_price\":2000,\"selling_price\":1500,\"discount_type\":\"percent\",\"discount\":0,\"tax\":0,\"quantity\":93,\"image\":\"2023-04-27-644a29da12d79.png\",\"order_count\":2,\"supplier_id\":null,\"created_at\":\"2023-04-27T07:22:58.000000Z\",\"updated_at\":\"2023-04-27T10:24:47.000000Z\",\"company_id\":null}', 0, 'discount_on_product', 1, 0, '2023-04-27 10:24:47', '2023-04-27 10:24:47', NULL),
(3, 1, 100003, 1500, '{\"id\":1,\"name\":\"Royal D\",\"product_code\":\"32895\",\"unit_type\":3,\"unit_value\":1000,\"brand\":\"3\",\"category_ids\":\"[{\\\"id\\\":\\\"1\\\",\\\"position\\\":1}]\",\"purchase_price\":2000,\"selling_price\":1500,\"discount_type\":\"percent\",\"discount\":0,\"tax\":0,\"quantity\":90,\"image\":\"2023-04-27-644a29da12d79.png\",\"order_count\":3,\"supplier_id\":null,\"created_at\":\"2023-04-27T07:22:58.000000Z\",\"updated_at\":\"2023-05-16T04:46:29.000000Z\",\"company_id\":null}', 0, 'discount_on_product', 3, 0, '2023-05-16 04:46:29', '2023-05-16 04:46:29', NULL),
(4, 1, 100004, 1500, '{\"id\":1,\"name\":\"Royal D\",\"product_code\":\"32895\",\"unit_type\":3,\"unit_value\":1000,\"brand\":\"3\",\"category_ids\":\"[{\\\"id\\\":\\\"1\\\",\\\"position\\\":1}]\",\"purchase_price\":2000,\"selling_price\":1500,\"discount_type\":\"percent\",\"discount\":0,\"tax\":0,\"quantity\":86,\"image\":\"2023-04-27-644a29da12d79.png\",\"order_count\":4,\"supplier_id\":null,\"created_at\":\"2023-04-27T07:22:58.000000Z\",\"updated_at\":\"2023-05-16T04:47:02.000000Z\",\"company_id\":null}', 0, 'discount_on_product', 4, 0, '2023-05-16 04:47:02', '2023-05-16 04:47:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `month`, `day`, `cost`, `created_at`, `updated_at`) VALUES
(1, NULL, '5', '10000', '2023-04-27 09:23:33', '2023-04-27 09:23:33'),
(2, '1', NULL, '12000', '2023-05-02 09:29:26', '2023-05-02 09:29:26');

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kpay', '1', '2023-04-27 09:24:26', '2023-04-27 09:24:26');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `unit_type` int(10) UNSIGNED DEFAULT NULL,
  `unit_value` double(8,2) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `category_ids` varchar(255) DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order_count` int(10) UNSIGNED DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_code`, `unit_type`, `unit_value`, `brand`, `category_ids`, `purchase_price`, `selling_price`, `discount_type`, `discount`, `tax`, `quantity`, `image`, `order_count`, `supplier_id`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'Royal D', '32895', 3, 1000.00, '3', '[{\"id\":\"1\",\"position\":1}]', 2000, 1500, 'percent', 0.00, 0.00, 86, '2023-04-27-644a29da12d79.png', 4, NULL, '2023-04-27 07:22:58', '2023-05-16 04:47:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `trainer_id`, `time`, `cost`, `created_at`, `updated_at`) VALUES
(1, '1', '5', '102', '2023-05-02 05:28:02', '2023-05-02 09:21:14'),
(2, '1', '5', '101', '2023-05-02 05:28:18', '2023-05-02 09:21:59'),
(4, '3', '25', '25', '2023-05-17 04:48:04', '2023-05-17 04:48:04'),
(5, '3', '26', '26', '2023-05-17 04:48:11', '2023-05-17 04:48:11'),
(6, '3', '27', '27', '2023-05-17 04:48:15', '2023-05-17 04:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `soft_credentials`
--

CREATE TABLE `soft_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dateofbirth` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nrc_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `permission` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `code`, `name`, `phone`, `dateofbirth`, `username`, `password`, `nrc_number`, `address`, `salary`, `join_date`, `image`, `type`, `permission`, `status`, `created_at`, `updated_at`) VALUES
(2, '22345', 'sithu', '11234', '2023-05-04', '1111', '$2a$12$pESlGg/TyoVAaNfIAQRvDeWu.w02w90rqQFTIv7C6jugzrSuk96Ny', '11112222', '11112222', 11112222, '2023-05-04', '11112222', 'Select', '[\"member\",\"staff\",\"setup\",\"pos\",\"checkin\"]', '1', NULL, '2023-05-04 08:44:38'),
(3, 'xpStaff_000002', 'si thu hein', '1234567', '2023-05-09', 'sithuhein25', '$2y$10$U8gGmu2aFn3VCDGvj3mCzeTeKhd3h.wvXUy0L/cu/LyAJka/FSTCW', '13/dedega(n)032991', '11112222', 100000, '2023-05-09', NULL, 'Trainer', '[\"report\",\"report\",\"report\",\"report\",\"checkin\"]', '1', '2023-05-09 03:42:17', '2023-05-09 03:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tran_type` varchar(255) DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `debit` tinyint(1) DEFAULT NULL,
  `credit` tinyint(1) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`id`, `tran_type`, `account_id`, `amount`, `description`, `debit`, `credit`, `balance`, `date`, `customer_id`, `supplier_id`, `order_id`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'Income', 1, 9000, 'POS order', 0, 1, 9000, '2023-04-27', 0, NULL, 100001, '2023-04-27 07:23:47', '2023-04-27 07:23:47', NULL),
(2, 'Income', 1, 1500, 'POS order', 0, 1, 10500, '2023-04-27', 3, NULL, 100002, '2023-04-27 10:24:48', '2023-04-27 10:24:48', NULL),
(3, 'Income', 1, 4500, 'POS order', 0, 1, 15000, '2023-05-16', 11, NULL, 100003, '2023-05-16 04:46:29', '2023-05-16 04:46:29', NULL),
(4, 'Income', 9, 6000, 'POS order', 0, 1, 6000, '2023-05-16', 11, NULL, 100004, '2023-05-16 04:47:02', '2023-05-16 04:47:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_type`, `created_at`, `updated_at`, `company_id`) VALUES
(1, 'kg', '2021-11-28 05:34:53', '2021-11-28 05:34:53', NULL),
(2, 'Ltr', '2021-11-28 05:35:05', '2021-11-28 05:35:05', NULL),
(3, 'Pc', '2021-11-28 05:35:14', '2021-11-28 05:35:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkin_logs`
--
ALTER TABLE `checkin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_sections`
--
ALTER TABLE `member_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soft_credentials`
--
ALTER TABLE `soft_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkin_logs`
--
ALTER TABLE `checkin_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `member_sections`
--
ALTER TABLE `member_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soft_credentials`
--
ALTER TABLE `soft_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
