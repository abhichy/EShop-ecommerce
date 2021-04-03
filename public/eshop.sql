-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 02:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(12) NOT NULL,
  `vendor_id` int(12) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `brand_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `vendor_id`, `admin_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(16, NULL, 1, 'Related Products', '2020-07-01 22:44:27', '2020-07-01 22:44:27'),
(17, NULL, 1, 'Product Accessories', '2020-07-02 02:50:26', '2020-07-02 02:50:26'),
(19, NULL, 1, 'Dell', '2021-01-25 06:54:20', '2021-01-25 06:54:20'),
(20, NULL, 1, 'Bajaj', '2021-01-25 07:06:25', '2021-01-25 07:06:25'),
(21, 1, NULL, 'Mobile Phone', '2021-01-26 21:23:01', '2021-01-26 21:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `root_id` int(11) UNSIGNED DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page` int(11) DEFAULT 0,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `root_id`, `category_name`, `short_name`, `home_page`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Computer', 'comp', NULL, 'public/category_image/pexels-photo-1779487.jpeg', '2021-01-25 06:47:41', '2021-01-25 06:47:41'),
(2, 1, 'Laptop', 'lap', NULL, 'public/category_image/VLS_2759.0.jpg', '2021-01-25 06:49:20', '2021-01-25 06:49:20'),
(3, 0, 'Bike', 'bk', 1, 'public/category_image/bajaj-v-15-img01.jpg', '2021-01-25 07:05:00', '2021-01-25 07:05:00'),
(4, 0, 'Bags', 'bag', NULL, 'public/category_image/China-Wholesale-Nylon-latest-Design-Backpack-Type-Polyester-College-School-Bag-in-Laptop-Bags.jpg', '2021-01-26 21:00:58', '2021-02-24 04:27:06'),
(5, 0, 'Mobile', 'Android', NULL, 'public/category_image/zero8inhand.jpg', '2021-01-26 21:08:07', '2021-01-26 21:08:07'),
(7, 0, 'test', 'tes', NULL, 'public/category_image/bajaj-v-15-img01.jpg', '2021-03-02 07:07:46', '2021-03-02 07:07:46'),
(8, 7, 'test child', 'tc', NULL, 'public/category_image/China-Wholesale-Nylon-latest-Design-Backpack-Type-Polyester-College-School-Bag-in-Laptop-Bags.jpg', '2021-03-02 07:08:11', '2021-03-02 07:08:11'),
(9, 7, 'Mobile', 'mobile', NULL, 'public/category_image/zero8inhand.jpg', '2021-03-06 02:11:23', '2021-03-06 02:11:23'),
(10, 9, 'bag', 'bg', NULL, 'public/category_image/China-Wholesale-Nylon-latest-Design-Backpack-Type-Polyester-College-School-Bag-in-Laptop-Bags.jpg', '2021-03-06 02:11:58', '2021-03-06 02:11:58'),
(11, 7, 'Mobile', 'mobile', NULL, 'public/category_image/zero8inhand.jpg', '2021-03-06 05:01:43', '2021-03-06 05:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(20) DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `password`, `full_name`, `first_name`, `last_name`, `email`, `varify_token`, `status`, `contact_no`, `nid`, `present_address`, `permanent_address`, `activity`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$zWjm5ZAHlNk2H/mkok4n3ejI6J6o.tLn.W89WhTuBr1KYpNlG.EdO', 'ABHI CHOWDHURY', NULL, NULL, 'abhi.chy.06@gmail.com', NULL, 1, '01711226088', NULL, NULL, NULL, 1, NULL, '2021-03-01 05:30:05'),
(2, '$2y$10$ANRxmE4HbFhDdMl8zJlpk.aToid9X5uhtAdGHan9yknmXkGf3jTFC', 'ABHI CHY', NULL, NULL, '1610113@iub.edu.bd', 'DsmxRcJR8Ijh3thQOlapxb8dvnXVYYOKP45D6IHE', 1, '01711226089', NULL, NULL, NULL, 1, '2021-01-26 14:16:40', '2021-03-02 07:06:24'),
(3, '$2y$10$dit5SQW55scxx3T.MPdbP.7QEiYxd5td0eILxvItIhRiZoxpkrod2', 'ABHI CHOWDHURY 1', NULL, NULL, 'abc@gmail.com', NULL, 1, '017112260866', NULL, NULL, NULL, 1, '2021-02-25 07:26:19', '2021-03-06 05:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `color_sizes`
--

CREATE TABLE `color_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `min_amount` float NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `availability` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heading`
--

CREATE TABLE `heading` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `serial` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_unit_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `unit_x_quantity` double DEFAULT NULL,
  `invoice_discount` double NOT NULL,
  `invoice_after_discount` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=pending;2=processing;3=cancelled;4=adminAccept;5=delivered',
  `pdf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `client_id`, `vendor_id`, `product_id`, `product_unit_price`, `product_quantity`, `unit_x_quantity`, `invoice_discount`, `invoice_after_discount`, `status`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 120000, 1, 120000, 0, 120000, 1, NULL, '2021-01-26 15:21:59', '2021-01-26 15:21:59'),
(2, 1, 1, 1, 1, 120000, 1, 120000, 0, 120000, 1, NULL, '2021-01-26 15:21:59', '2021-01-26 15:21:59'),
(3, 2, 1, 1, 3, 1000, 1, 1000, 0, 1000, 2, NULL, '2021-01-27 00:50:32', '2021-02-17 02:59:44'),
(4, 2, 1, 1, 4, 22000, 1, 22000, 0, 22000, 4, NULL, '2021-01-27 00:50:32', '2021-02-17 06:18:35'),
(5, 3, 1, 1, 3, 1000, 2, 2000, 0, 2000, 3, NULL, '2021-01-27 02:55:13', '2021-01-30 03:24:04'),
(6, 3, 1, 1, 2, 120000, 1, 120000, 0, 120000, 3, NULL, '2021-01-27 02:55:13', '2021-01-30 03:23:58'),
(7, 4, 1, 1, 6, 170000, 1, 170000, 0, 170000, 3, NULL, '2021-02-08 04:22:40', '2021-02-17 03:08:51'),
(8, 4, 1, 1, 7, 10000, 1, 10000, 0, 10000, 2, NULL, '2021-02-08 04:22:40', '2021-02-17 02:58:24'),
(9, 5, 1, 1, 6, 170000, 1, 170000, 0, 170000, 4, NULL, '2021-02-22 03:47:21', '2021-02-22 03:48:12'),
(10, 6, 1, 1, 5, 35000, 2, 70000, 0, 70000, 3, NULL, '2021-02-23 11:00:10', '2021-02-23 11:00:48');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_24_133745_create_categories_table', 2),
(5, '2020_03_26_133428_create_sliders_table', 3),
(6, '2020_03_26_153428_create_types_table', 4),
(7, '2020_03_28_043013_create_products_table', 5),
(8, '2020_03_28_050921_create_vendor_auths_table', 6),
(9, '2020_03_28_112944_create_color_sizes_table', 7),
(10, '2020_03_28_130236_create_product_images_table', 8),
(11, '2020_03_29_111717_create_brands_table', 9),
(12, '2020_04_04_112209_create_notifications_table', 10),
(13, '2020_04_16_210240_create_clients_table', 11),
(16, '2020_04_18_095227_create_orders_table', 12),
(17, '2020_04_18_100917_create_payments_table', 12),
(18, '2020_04_20_171428_create_invoices_table', 13),
(19, '2020_04_24_203801_create_product_reviews_table', 14),
(20, '2020_05_07_094557_create_contact_us_table', 15),
(21, '2020_05_07_101122_create_contact_us_table', 16),
(22, '2020_05_11_081735_create_coupons_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` float NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alphonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = pending; 2=processing; 3=cancelled;4=delivered',
  `delivered` tinyint(4) DEFAULT 0 COMMENT 'no=0 ; yes=1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `client_id`, `sub_total`, `discount`, `total_cost`, `address`, `phone_number`, `alphonenumber`, `status`, `delivered`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'abhi.chy.06@gmail.com', 1, '240000', 0, '240000', 'dhk', '065866', NULL, 1, 0, '2021-01-26 15:21:59', '2021-01-26 15:21:59'),
(2, 'test', 'test', 'abhi.chy.06@gmail.com', 1, '23000', 0, '23000', 'dhk', '065866', NULL, 1, 0, '2021-01-27 00:50:32', '2021-01-27 00:50:32'),
(3, 'test', 'test', 'abhi.chy.06@gmail.com', 1, '122000', 0, '122000', 'dhk', '065866', NULL, 1, 0, '2021-01-27 02:55:12', '2021-01-27 02:55:12'),
(4, 'test', 'test', 'abhi.chy.06@gmail.com', 1, '180000', 0, '180000', 'dhk', '065866', NULL, 1, 0, '2021-02-08 04:22:40', '2021-02-08 04:22:40'),
(5, 'ABHI', 'CHOWDHURY', 'abhi.chy.06@gmail.com', 1, '170000', 0, '170000', '11/11 Jobeda Villa', '065866', NULL, 1, 0, '2021-02-22 03:47:21', '2021-02-22 03:47:21'),
(6, 'ABHI', 'CHOWDHURY', 'abhi.chy.06@gmail.com', 1, '70000', 0, '70000', '11/11 Jobeda Villa', '065866', NULL, 1, 0, '2021-02-23 11:00:10', '2021-02-23 11:00:10');

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
('sudiptoshil@outlook.com', '$2y$10$UZ7LMKheLDHAjpzFN4yw5O2T4D3JwJfLuu2j/ETWJJPHnPQgVK7Y.', '2020-05-27 22:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` int(255) NOT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` int(10) UNSIGNED DEFAULT NULL,
  `expireDate` date DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `client_id`, `payment_type`, `card_name`, `card_number`, `expireDate`, `comment`, `created_at`, `updated_at`) VALUES
(13, 15, 1, 1, NULL, NULL, NULL, NULL, '2021-01-26 15:09:12', '2021-01-26 15:09:12'),
(14, 1, 1, 1, NULL, NULL, NULL, NULL, '2021-01-26 15:11:38', '2021-01-26 15:11:38'),
(15, 1, 1, 1, NULL, NULL, NULL, NULL, '2021-01-26 15:13:15', '2021-01-26 15:13:15'),
(16, 2, 1, 1, NULL, NULL, NULL, NULL, '2021-01-26 15:14:17', '2021-01-26 15:14:17'),
(17, 1, 1, 1, NULL, NULL, NULL, NULL, '2021-01-26 15:16:23', '2021-01-26 15:16:23'),
(18, 1, 1, 1, NULL, NULL, NULL, NULL, '2021-01-26 15:21:59', '2021-01-26 15:21:59'),
(19, 2, 1, 1, NULL, NULL, NULL, NULL, '2021-01-27 00:50:32', '2021-01-27 00:50:32'),
(20, 3, 1, 1, NULL, NULL, NULL, NULL, '2021-01-27 02:55:13', '2021-01-27 02:55:13'),
(21, 4, 1, 1, NULL, NULL, NULL, NULL, '2021-02-08 04:22:41', '2021-02-08 04:22:41'),
(22, 5, 1, 1, NULL, NULL, NULL, NULL, '2021-02-22 03:47:21', '2021-02-22 03:47:21'),
(23, 6, 1, 1, NULL, NULL, NULL, NULL, '2021-02-23 11:00:10', '2021-02-23 11:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_specification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` int(255) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` int(255) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'active = 1 and inactive = 2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `type_id`, `brand_id`, `vendor_id`, `product_name`, `product_description`, `product_specification`, `product_price`, `model_number`, `sell_unit`, `product_quantity`, `discount`, `discount_percent`, `currency`, `product_image`, `popularity`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 1, 19, 1, 'Dell XPS 15 7590 Core i7', '<h3>Specification:</h3>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\">\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Basic Information</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Processor</td>\r\n			<td>Intel Core i7-9750H Processor (12M Cache, 2.60 GHz up to 4.50 GHz)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Display</td>\r\n			<td>15.6-inch 4K UHD (3840 x 2160) Anti-Reflective InfinityEdge Touch IPS 100% AdobeRGB 500-Nits Display</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Memory</td>\r\n			<td>32GB DDR4 2666MHz Ram</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Storage</td>\r\n			<td>1TB SSD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Graphics</td>\r\n			<td>NVIDIA GeForce GTX 1650 with 4GB GDDR5 Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Operating System</td>\r\n			<td>Windows 10 Home (64-Bit)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Battery</td>\r\n			<td>97 WHr, 6-Cell Battery</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Audio</td>\r\n			<td>Built-In Speakers: 2 x 2 W<br />\r\n			Built-In Microphones: 2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Special Feature</td>\r\n			<td>TouchPad<br />\r\n			Fingerprint</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Input Devices</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Keyboard</td>\r\n			<td>Backlit Keyboard</td>\r\n		</tr>\r\n		<tr>\r\n			<td>WebCam</td>\r\n			<td>User-Facing: 720p</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Card Reader</td>\r\n			<td>1 x SD (Unspecified Type)</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Network &amp; Wireless Connectivity</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Wi-Fi</td>\r\n			<td>Killer Wi-Fi 6 AX1650 (2x2)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bluetooth</td>\r\n			<td>Bluetooth 5.0</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Ports, Connectors &amp; Slots</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>USB (s)</td>\r\n			<td>2 x USB Type-A (USB 3.1 / USB 3.2 Gen 1)<br />\r\n			1 x Thunderbolt 3 (Supports DisplayPort and Power Delivery)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HDMI</td>\r\n			<td>1 x HDMI 2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Audio Jack Combo</td>\r\n			<td>1 x 1/8&quot; / 3.5 mm Headphone/Microphone Input/Output</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Physical Specification</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Dimensions (W x D x H)</td>\r\n			<td>14.06 x 9.7 x 0.45&quot; / 35.71 x 24.64 x 1.14 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight</td>\r\n			<td>4 lb / 1.81 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Color(s)</td>\r\n			<td>Silver</td>\r\n		</tr>\r\n	</tbody>\r\n	<thead>\r\n		<tr>\r\n			<td colspan=\"3\">Warranty</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Manufacturing Warranty</td>\r\n			<td>1 Year Warranty</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 120000, '132cc', '1', 20, '0', 0, 'BDT', 'public/product_image/Dell XPS 15 7590 Core i7 _1.jpg', 3, 1, '2021-01-25 07:03:21', '2021-01-30 03:23:14'),
(2, 0, NULL, 2, 20, 1, 'Bajaj v15', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\">\r\n			<p>Body Dimensions</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Length / Width / Height</td>\r\n			<td>2044 mm / 780 mm / 1070 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wheel base</td>\r\n			<td>1315 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ground clearance</td>\r\n			<td>165 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kerb weight</td>\r\n			<td>135.5 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fuel&nbsp;<a href=\"https://keyword-plus.com/s/?q=tank\" target=\"_blank\">tank</a>&nbsp;capacity</td>\r\n			<td>13 litres</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">\r\n			<p>Engine Details</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>Single cylinder, 4 stroke, SOHC 2 valve, Air cooled, DTS-i</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Displacement</td>\r\n			<td>149.5 cc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Max net power</td>\r\n			<td>11.83 BHP @ 7500 rpm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Max net torque</td>\r\n			<td>13 NM @ 5500 rpm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bore</td>\r\n			<td>56 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Starting method</td>\r\n			<td>Electric-Kick</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fuel System</td>\r\n			<td>Carburetor</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">\r\n			<p>Transmission Details</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Gear type</td>\r\n			<td>Manual</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Number Of Speed Gears</td>\r\n			<td>5 Speed</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">\r\n			<p>Tyres &amp; brakes</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Tyre Size (Front)</td>\r\n			<td>90/90 - 18 51P</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tyre Size (Rear)</td>\r\n			<td>120/80 -16 60P</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Wheel Size</td>\r\n			<td>Front :-18 inch, Rear :-16 inch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brakes Front</td>\r\n			<td>240mm Disc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Brakes Rear</td>\r\n			<td>130mm Drum</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">\r\n			<p>Frame &amp; Suspension</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Chassis Type</td>\r\n			<td>Double-cradle chassis</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suspension-Front</td>\r\n			<td>Telescopic Hydraulic Shock Absorbers</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Suspension-Rear</td>\r\n			<td>Swing Arm with 5 step Adjustable Hydraulic Shock Absorber</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">\r\n			<p>Electricals</p>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Battery</td>\r\n			<td>12 V, 2.5 Ah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Head Lamp</td>\r\n			<td>12V - 35W / 35W - Halogen bulb (Multi Reflector Type)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 120000, '238900', 'piece', 1, '0', 0, 'BDT', 'public/product_image/Bajaj v15 _2.jpg', 7, 2, '2021-01-25 07:10:19', '2021-02-08 03:58:25'),
(3, 0, NULL, 3, 16, 1, 'School Bags', '<h1>China Wholesale Nylon latest Design Backpack Type Polyester&nbsp;&nbsp;&nbsp;Bag in Laptop Bags</h1>\r\n\r\n<p><a href=\"javascript:;\">Get Latest Price&nbsp;</a><a href=\"javascript:void(\'Chat Now\')\">Chat with Supplier.</a></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\">Min.&nbsp;&nbsp;/ Reference FOB Price</th>\r\n		</tr>\r\n		<tr>\r\n			<td>500 Pieces</td>\r\n			<td><strong>US $4.2-4.6/ Piece</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Port:</th>\r\n			<td>Shenzhen, China&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Production Capacity:</th>\r\n			<td>100000 Piece/Month</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Payment Terms:</th>\r\n			<td>T/T, Western Union, Paypal</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Gender:</th>\r\n			<td>Unisex</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Type:</th>\r\n			<td>Double Shoulder</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Shape:</th>\r\n			<td>Shoulder Straps</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Material:</th>\r\n			<td>Polyester</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Style:</th>\r\n			<td>Leisure</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Hardness:</th>\r\n			<td>Medium Soft</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1000, '238900', 'piece', 1, '0', 0, 'BDT', 'public/product_image/School Bags _3.jpg', 2, 2, '2021-01-26 21:03:25', '2021-01-30 03:22:27'),
(4, 5, NULL, 1, 17, 1, 'Samsung', '<p>For the price of the A9, you get some pretty decent hardware. The spec sheet looks like this:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>OS:</strong>&nbsp;Android 10 with XOS 7</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Display:</strong>&nbsp;6.85&quot; full HD+ with 90Hz refresh rate and 180Hz touch sampling rate</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>CPU:</strong>&nbsp;Octa-core MediaTek Helio G90T SoC</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>RAM:</strong>&nbsp;8 GB</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Internal storage:</strong>&nbsp;128 GB</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Battery:</strong>&nbsp;4,500 mAh with support for 33 W fast charging</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cameras:</strong>&nbsp;Rear - 64 megapixel primary sensor and 8 megapixel secondary sensor, both with ultra-wide-angle lens, depth sensor, and ultra-night video/Selfie - 48 megapixel primary sensor with 8 megapixel secondary</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cooling:</strong>&nbsp;Multi-dimensional liquid cooling</p>\r\n	</li>\r\n	<li>\r\n	<p>Fingerprint scanner (side-mounted)</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>The spec sheet is fairly impressive for a mid-range phone and the device really does perform quite well. In fact, my first impression of the hardware was that it certainly punched above its weight. Apps opened quickly, network speeds were quite good, streaming of video was outstanding and the sound was on par with any smartphone I&#39;ve ever used.</p>', NULL, 22000, 'A9', 'piece', 3, '0', 0, 'BDT', 'public/product_image/Samsung _4.jpg', 1, 1, '2021-01-26 21:10:02', '2021-01-26 21:10:03'),
(5, 5, NULL, 1, 17, 1, 'IPhone', '<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"15\" scope=\"row\">NETWORK</th>\r\n			<td><a href=\"https://www.gsmarena.com/network-bands.php3\">Technology</a></td>\r\n			<td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\">GSM / HSPA / LTE</a></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"2\" scope=\"row\">LAUNCH</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=phone-life-cycle\">Announced</a></td>\r\n			<td>2017, September 12</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=phone-life-cycle\">Status</a></td>\r\n			<td>Available. Released 2017, November 03</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"6\" scope=\"row\">BODY</th>\r\n			<td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\" onclick=\"helpW(\'h_dimens.htm\');\">Dimensions</a></td>\r\n			<td>143.6 x 70.9 x 7.7 mm (5.65 x 2.79 x 0.30 in)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\" onclick=\"helpW(\'h_weight.htm\');\">Weight</a></td>\r\n			<td>174 g (6.14 oz)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=build\">Build</a></td>\r\n			<td>Glass front (<a href=\"https://keyword-plus.com/s/?q=Gorilla\" target=\"_blank\">Gorilla</a>&nbsp;Glass), glass back (<a href=\"https://keyword-plus.com/s/?q=Gorilla\" target=\"_blank\">Gorilla</a>&nbsp;Glass), stainless steel frame</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=sim\">SIM</a></td>\r\n			<td>Nano-SIM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>IP67 dust/<a href=\"https://keyword-plus.com/s/?q=water\" target=\"_blank\">water</a>&nbsp;resistant (up to 1m for 30 mins)<br />\r\n			Apple Pay (Visa, MasterCard, AMEX certified)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"5\" scope=\"row\">DISPLAY</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=display-type\">Type</a></td>\r\n			<td>Super Retina OLED, HDR10, 625 nits (typ)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/apple_iphone_x-8858.php#\" onclick=\"helpW(\'h_dsize.htm\');\">Size</a></td>\r\n			<td>5.8 inches, 84.4 cm2&nbsp;(~82.9% screen-to-body ratio)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=resolution\">Resolution</a></td>\r\n			<td>1125 x 2436 pixels, 19.5:9 ratio (~458 ppi density)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=screen-protection\">Protection</a></td>\r\n			<td>Scratch-resistant glass, oleophobic coating</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>Dolby Vision<br />\r\n			Wide color gamut<br />\r\n			3D Touch<br />\r\n			True-tone</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"4\" scope=\"row\">PLATFORM</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=os\">OS</a></td>\r\n			<td>iOS 11.1.1, upgradable to iOS 14.2</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=chipset\">Chipset</a></td>\r\n			<td>Apple A11 Bionic (10 nm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=cpu\">CPU</a></td>\r\n			<td>Hexa-core 2.39 GHz (2x Monsoon + 4x Mistral)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=gpu\">GPU</a></td>\r\n			<td>Apple GPU (three-core graphics)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"5\" scope=\"row\">MEMORY</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=memory-card-slot\">Card slot</a></td>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=dynamic-memory\">Internal</a></td>\r\n			<td>64GB 3GB RAM, 256GB 3GB RAM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>NVMe</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"4\" scope=\"row\">MAIN CAMERA</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\">Dual</a></td>\r\n			<td>12 MP, f/1.8, 28mm (wide), 1/3&quot;, 1.22&micro;m, dual pixel PDAF, OIS<br />\r\n			12 MP, f/2.4, 52mm (telephoto), 1/3.4&quot;, 1.0&micro;m, PDAF, OIS, 2x optical zoom</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\">Features</a></td>\r\n			<td>Quad-LED dual-tone flash, HDR (photo/panorama), panorama, HDR</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=camera\">Video</a></td>\r\n			<td>4K@24/30/60fps, 1080p@30/60/120/240fps</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"4\" scope=\"row\">SELFIE CAMERA</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\">Dual</a></td>\r\n			<td>7 MP, f/2.2, 32mm (standard)<br />\r\n			SL 3D, (depth/biometrics sensor)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\">Features</a></td>\r\n			<td>HDR</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=secondary-camera\">Video</a></td>\r\n			<td>1080p@30fps</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"3\" scope=\"row\">SOUND</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=loudspeaker\">Loudspeaker</a></td>\r\n			<td>Yes, with stereo speakers</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=audio-jack\">3.5mm jack</a></td>\r\n			<td>No</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"9\" scope=\"row\">COMMS</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=wi-fi\">WLAN</a></td>\r\n			<td>Wi-Fi 802.11 a/b/g/n/ac, dual-<a href=\"https://keyword-plus.com/s/?q=band\" target=\"_blank\">band</a>, hotspot</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=bluetooth\">Bluetooth</a></td>\r\n			<td>5.0, A2DP, LE</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=gps\">GPS</a></td>\r\n			<td>Yes, with A-GPS, GLONASS, GALILEO, QZSS</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=nfc\">NFC</a></td>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=fm-radio\">Radio</a></td>\r\n			<td>No</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=usb\">USB</a></td>\r\n			<td>Lightning, USB 2.0</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"9\" scope=\"row\">FEATURES</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=sensors\">Sensors</a></td>\r\n			<td>Face ID, accelerometer, gyro, proximity, compass, barometer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>Siri natural language commands and dictation</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"7\" scope=\"row\">BATTERY</th>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=rechargeable-battery-types\">Type</a></td>\r\n			<td>Li-Ion 2716 mAh, non-removable (10.35 Wh)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=battery-charging\">Charging</a></td>\r\n			<td>Fast charging 15W, 50% in 30 min (advertised)<br />\r\n			USB Power Delivery 2.0<br />\r\n			Qi wireless charging</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=talk-time\">Talk time</a></td>\r\n			<td>Up to 21 h (3G)</td>\r\n		</tr>\r\n		<tr>\r\n			<td><a href=\"https://www.gsmarena.com/glossary.php3?term=music-playback-time\">Music play</a></td>\r\n			<td>Up to 60 h</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 35000, '8+', 'piece', 10, '0', 0, 'BDT', 'public/product_image/IPhone _5.jpg', 1, 1, '2021-01-26 21:17:38', '2021-01-26 21:17:38'),
(6, 0, NULL, 2, 20, 1, 'Bajaj v15', '<p><strong>Type</strong>4-Stroke, 2-Valve, Twin Spark BSVI Compliant DTS-i FI Engine<strong>Displacement (cc)</strong>149.50<strong>Max power</strong>10.3 kW (14 PS) @ 8500 rpm<strong>Max torque (Nm @ rpm)</strong>13.25 @ 6500</p>', NULL, 170000, '132cc', 'piece', 1, '0', 0, 'BDT', 'public/product_image/Bajaj v15 _6.jpg', 2, 1, '2021-02-08 04:01:02', '2021-02-08 04:21:07'),
(7, 0, NULL, 3, 17, 1, 'Bag', '<h1>Factory wholesale price with multiple specifications&nbsp;bag for roll film for sale</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>10000 - 29999 Pieces\r\n	<p>$0.06</p>\r\n	</li>\r\n	<li>30000 - 49999 Pieces\r\n	<p>$0.05</p>\r\n	</li>\r\n	<li>&gt;=50000 Pieces\r\n	<p>$0.02</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>$100.00 OFF&nbsp;Order more than $2,000.00Get Coupon</p>\r\n\r\n<p>Color:</p>\r\n\r\n<p><img alt=\"Customized\" src=\"https://sc04.alicdn.com/kf/He807cb0e83ba4cdaa4a99df437e8ed6eg.jpg_100x100.jpg\" /></p>\r\n\r\n<p>Size:</p>\r\n\r\n<p>Customized</p>\r\n\r\n<p>Shipping:</p>\r\n\r\n<p>Support&nbsp;Sea freight</p>\r\n\r\n<p>Lead Time:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Quantity(Pieces)</td>\r\n			<td>1 - 10000</td>\r\n			<td>10001 - 50000</td>\r\n			<td>&gt;50000</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Est. Time(days)</td>\r\n			<td>15</td>\r\n			<td>30</td>\r\n			<td>Negotiable</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 10000, 'A427', 'piece', 1, '0', 0, 'BDT', 'public/product_image/Bag _7.jpg', 1, 1, '2021-02-08 04:03:30', '2021-02-08 04:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 152, 'public/product_image/pexels-photo-1779487.jpeg', NULL, '2021-01-25 06:59:42', '2021-01-25 06:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` tinyint(4) NOT NULL,
  `client_id` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_transections`
--

CREATE TABLE `product_transections` (
  `id` int(11) NOT NULL,
  `invoice_no` int(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `total_value` decimal(50,2) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_transection_invs`
--

CREATE TABLE `product_transection_invs` (
  `id` int(11) NOT NULL,
  `product_transection_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `net` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `specification` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2021-01-25 06:56:09', '2021-01-25 06:56:09'),
(2, 'vehicle', '2021-01-25 07:09:15', '2021-01-25 07:09:15'),
(3, 'Bags', '2021-01-26 20:55:05', '2021-01-26 20:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ABHI CHOWDHURY', 'abhi.chy.06@gmail.com', NULL, '$2y$10$chTJqQl.UH8DcwqbkuhSnOvTHX7WNhB8gLPZs6DstXSwYKNH.yL12', NULL, '2021-01-14 05:55:36', '2021-01-14 05:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_auths`
--

CREATE TABLE `vendor_auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` tinyint(4) NOT NULL DEFAULT 0,
  `nid` int(11) DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_auths`
--

INSERT INTO `vendor_auths` (`id`, `vendor_name`, `password`, `email`, `phone`, `location`, `email_verification`, `activity`, `nid`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'ABHI', '$2y$10$.oXPz1jJPf9Qh.AvFcCq2OCFUwbfUpwLBGzce5lCIJeMyLXoeWykK', 'spark.dash.bd@gmail.com', '884466', '11/11 Jobeda Villa', NULL, 1, 12, NULL, '2021-01-25 06:56:56', '2021-03-02 06:47:43'),
(2, 'test', '234678', 'test@gmail.com', '884466', 'dddeefe', NULL, 0, NULL, NULL, '2021-03-02 06:49:47', '2021-03-02 06:49:47'),
(3, 'ABHI', '12345678', 'abac@gmail.com', '6788', '2109 Zakir Hossain Road', NULL, 0, NULL, NULL, '2021-03-02 06:54:44', '2021-03-03 03:44:09'),
(4, 'bcd', '$2y$10$BwL7SEfoxI0V1ND4csFF8.3PTXtOYGbJ0RljoLeLZxkkgRvyXat9S', 'abcd@gmail.coma', '234', 'ctg', NULL, 0, NULL, 'public/vendor_photo/bajaj-v-15-img01.jpg', '2021-03-06 10:10:32', '2021-03-06 10:10:32'),
(5, 'ABCD', '$2y$10$3LdMltnBnpkPzGmIgZlQjelI65UcxhVsPEqZOH9EE6F.fvdEI3Qty', '1610113@iub.edu.bd', '223344', '2204 ZK villa', NULL, 1, NULL, 'public/vendor_photo/images.png', '2021-03-14 02:55:33', '2021-03-14 02:55:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `color_sizes`
--
ALTER TABLE `color_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heading`
--
ALTER TABLE `heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transections`
--
ALTER TABLE `product_transections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_transection_invs`
--
ALTER TABLE `product_transection_invs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_auths`
--
ALTER TABLE `vendor_auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_auths_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color_sizes`
--
ALTER TABLE `color_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heading`
--
ALTER TABLE `heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_transections`
--
ALTER TABLE `product_transections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_transection_invs`
--
ALTER TABLE `product_transection_invs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_auths`
--
ALTER TABLE `vendor_auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
